<?php

namespace App\Http\Controllers;

use App\Country;
use App\Degree;
use App\Student;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use URL;
use View;
use Webpatser\Uuid\Uuid;

class StudentController extends Controller
{
    public function getRegisterStudent()
    {
        $countries = Country::all();
        $degrees = Degree::all();
        return \View::make("students.register")->with(['countries' => $countries, 'degrees' => $degrees]);
    }

    public function postRegisterStudent(Request $request)
    {
        $rules = [
            'firstName' => 'required|regex:/^([^0-9]*)$/',
            'lastName' => 'required|regex:/^([^0-9]*)$/',
            'surName' => 'required|regex:/^([^0-9]*)$/',
            'birthDate' => 'required|date',
            'personalPhoto' => 'required|image',
            'nationality' => 'required',
            'birthCountry' => 'required',
            'gender' => 'required',
            'passportImage' => 'required'


        ];

        $graduationDegree = Degree::where('degree_id', '=', $request->get('graduationDegree'))->first();
        if ($graduationDegree && $graduationDegree->required_certificat_images != 0) {
            $rules['graduationCertImages'] = 'required|image|size:' . $graduationDegree->required_certificat_images;
        }


        $valid = \Validator::make($request->all(), $rules);
        if ($valid->fails()) {
            return redirect(url("/student/register"))->withErrors($valid)->withInput();
        } else {
            $student = new Student();
            $student->file_no = Uuid::generate()->string;
            $student->first_name = $request->get('firstName');
            $student->last_name = $request->get('lastName');
            $student->surname = $request->get('surName');

            if ($request->hasFile("personalPhoto")) {
                $personal_image = "personal_images/" . $student->file_no . ".jpg";

                Image::make($request->file('personalPhoto'))->save(public_path("uploads/" . $personal_image), 60);
                $student->personal_photo = $personal_image;
            }
            if ($request->hasFile("passportImage")) {
                $passport_image = "passport_images/" . $student->file_no . ".jpg";
                Image::make($request->file('passportImage'))->save(public_path("uploads/" . $passport_image), 60);
                $student->passport_image = $passport_image;
            }

            if ($request->hasFile("graduationCertImages")) {
                $images = $request->file("graduationCertImages");
                $images_paths = [];
                foreach ($images as $index => $image) {
                    $cert_image = "cert_images/" . $student->file_no . "_" . $index . ".jpg";
                    Image::make($image)->save(public_path("uploads/" . $cert_image), 60);
                    array_push($images_paths, $cert_image);

                }

                $student->graduation_certificates_photos = json_encode($images_paths);
            }


            $student->birth_date = $request->get('birthDate');
            $student->birth_country = $request->get('birthCountry');
            $student->nationality = $request->get('nationality');
            $student->gender = $request->get('gender');
            $student->graduation_degree = $request->get('graduationDegree');

            $student->save();
            $request->session()->flash('alert-success', 'Done!');
            return redirect(url("/student/register"));
        }
    }


    public function getAllStudent()
    {
        $students = Student::paginate(20);
        return View::make('dashboard.students.list')->with(['students' => $students]);

    }

    public function getViewStudent($file_no)
    {
        if ($file_no) {
            $student = Student::where('file_no', '=', $file_no)->first();
            return View::make('dashboard.students.view')->with(['student' => $student]);
        }
    }

    public function getSearchStudent(Request $request)
    {
        $name = $request->get('name');
        $students = Student::where(function ($query) use ($name) {
            if ($name) {
                $query->whereRaw("concat(first_name,' ', last_name) like '%$name%' ");
            }
        })->paginate(20);
        $students->setPath(URL::current() . "?name=" . $name);
        return View::make('dashboard.students.list')->with(['students' => $students]);

    }

    public function deleteStudent($fileNo)
    {

        $student = Student::where('file_no', '=', $fileNo)->get();

        if (count($student) > 0) {
            DB::statement("delete from students WHERE file_no = '$fileNo'");
        }
        $students = Student::paginate(20);
        return View::make('dashboard.students.list')->with(['students' => $students]);
    }

    public function changeStudentStatus($fileNo)
    {

        $student = Student::where('file_no', '=', $fileNo)->first();

        if ($student) {
            $student->status = 1 - $student->status;
            $student->save();
        }

        return redirect(url("dashboard/students/list"));
    }
}
