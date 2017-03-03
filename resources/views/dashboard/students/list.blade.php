@extends('layouts.app')

@section('page_title')
    List Students
    @endsection

    @section('extra_css')
    @endsection

    @section('page_content')
            <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-xs-6">
                <h1>
                    Students
                    <small>list</small>
                </h1>
            </div>

            <div class="col-xs-6">
                <div class="pull-right">
                    <br>
                    <!--<a href="" class="btn btn-success">Add About Islam Content</a>-->
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                @if(Session::has('message'))
                    <div class="alert alert-{{Session::get('message')}}" role="alert">
                        @if(Session::get('message')=='danger')
                            @foreach($errors->all() as $error)
                                <p>- {{$error}}</p>
                            @endforeach
                        @endif
                        @if(Session::get('message')=='success')
                            <p>- {{Session::get('data')}}</p>
                        @endif

                    </div>
                @endif
                <div class="box">
                    <div class="box-header">
                        <form class="form-inline" method="get" action="{{URL::route('Get.Student.Search')}}">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Search By Name" value="{{Request::get('name')}}">
                            </div>
                            <button type="submit" class="btn btn-default">search</button>
                        </form>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>File No</th>
                                <th>Student Name</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($students as $key => $student)
                                <tr>
                                    <td>{{$student->file_no}}</td>
                                    <td>{{$student->first_name." ".$student->last_name}}</td>
                                    <td>{{$student->status_message}}</td>
                                    <td>{{$student->created_at}}</td>
                                    <td>
                                        <a href="{{ URL::route('Get.Student.View', $student->file_no) }}" class="btn  btn-success ">
                                            View
                                        </a>
                                        <a href="{{URL::route('Get.Student.Change',$student->file_no)}}" class="btn  btn-info">
                                            Change Status
                                        </a>
                                        <a href="{{URL::route('Get.Student.Delete',$student->file_no)}}" class="btn  btn-danger">
                                            Delete
                                        </a>
                                    </td>



                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {{$students->render()}}
                    </div>
                    <!-- /.box-footer -->

                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>

@endsection
@section('extra_scripts')

@endsection
