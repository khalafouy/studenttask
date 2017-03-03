<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">

    <!-- Website CSS style -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">

    <!-- Website Font style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <title>Admin</title>
</head>
<body>
<div class="container">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong>
            There were some problems with your input.
            <br>
            <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
            <ul>
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                    <a href="#"
                       class="close"
                       data-dismiss="alert"
                       aria-label="close">&times;</a>
                </p>
            </ul>
        @endif
    @endforeach

    <form class="form-horizontal" role="form" method="post" action="{{URL::route("Post.Student.Register")}}"  enctype="multipart/form-data">
        <h2>Registration Form</h2>

        {{ csrf_field() }}
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">First Name</label>
            <div class="col-sm-9">
                <input type="text" id="firstName" placeholder="First Name" class="form-control"  name="firstName"
                       value="{{old('firstName')}}" autofocus>
            </div>
        </div>
        <div class="form-group">
            <label for="lastName" class="col-sm-3 control-label">Last Name</label>
            <div class="col-sm-9">
                <input type="text" id="lastName" placeholder="Full Name" class="form-control" name="lastName"
                       value="{{old('lastName')}}" autofocus>
            </div>
        </div>

        <div class="form-group">
            <label for="surName" class="col-sm-3 control-label">Sur Name</label>
            <div class="col-sm-9">
                <input type="text" id="surName" placeholder="Sur Name" class="form-control" name="surName"
                       value="{{old('surName')}}" autofocus>
            </div>
        </div>
        <div class="form-group">
            <label for="personalPhoto" class="col-sm-3 control-label">Personal Photo</label>
            <div class="col-sm-9">
                <input type="file" id="personalPhoto" class="form-control" name="personalPhoto">
            </div>
        </div>
        <div class="form-group">
            <label for="birthDate" class="col-sm-3 control-label">Date of Birth</label>
            <div class="col-sm-9">
                <input type="date" id="birthDate" class="form-control" name="birthDate" value="{{old('birthDate')}}">
            </div>
        </div>

        <div class="form-group">
            <label for="nationality" class="col-sm-3 control-label">Nationality</label>
            <div class="col-sm-9">
                <select id="nationality" class="form-control" name ='nationality'>
                    <option value="">Select Your Nationality </option>
                    @foreach($countries as $country)
                        <option value="{{$country->country_name}}"
                                {{ old('nationality') == $country->country_name ? "selected" : null }}>
                            {{$country->country_name}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>



        <div class="form-group">
            <label for="country" class="col-sm-3 control-label">Country</label>
            <div class="col-sm-9">
                <select id="country" class="form-control" name="birthCountry">
                    <option value="">Select Your Nationality </option>
                    @foreach($countries as $country)
                        <option value="{{$country->country_name}}"
                                {{ old('birthCountry') == $country->country_name ? "selected" : null }}>
                            {{$country->country_name}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div> <!-- /.form-group -->
        <div class="form-group">
            <label class="control-label col-sm-3">Gender</label>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" id="maleRadio" value="Male" name="gender" checked >Male
                        </label>
                    </div>

                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" id="femaleRadio" value="Female" name="gender">Female
                        </label>
                    </div>

                </div>
            </div>
        </div> <!-- /.form-group -->
        <div class="form-group">
            <label for="PassportImage" class="col-sm-3 control-label">Passport Image</label>
            <div class="col-sm-9">
                <input type="file" id="passportImage" name="passportImage" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="graduationDegree" class="col-sm-3 control-label">Grad Degree</label>
            <div class="col-sm-9">
                <select id="graduationDegree" class="form-control" name="graduationDegree">
                    <option value="">Select Your Degree </option>
                    @foreach($degrees as $degree)
                        <option value="{{$degree->degree_name}}"
                                {{ old('graduationDegree') == $degree->degree_name ? "selected" : null }}>
                            {{$degree->degree_name}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div> <!-- /.form-group -->


        <div class="form-group">
            <label for="graduationCertImages" class="col-sm-3 control-label">graduationCertImages</label>
            <div class="col-sm-9">
                <input type="file" id="graduationCertImages" name="graduationCertImages[]" class="form-control" multiple="multiple">
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
        </div>
    </form> <!-- /form -->
</div> <!-- ./container -->

<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</body>
</html>