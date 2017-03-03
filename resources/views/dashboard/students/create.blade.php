@extends('layouts.app')

@section('page_title')
    Add New User
@endsection

@section('extra_css')

@endsection

@section('page_content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
            <small>Create</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
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
            </div>
        </div>

        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">

                <!-- Form Element sizes -->
                <div class="box box-success">
                    <form role="form" method="post">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add New User</h3>
                        </div>

                        <div class="box-body">
                            <input name="_token" hidden value="{!! csrf_token() !!}" />
                            <!-- text input -->
                            <div class="form-group col-lg-12">
                                <label>User Name</label>
                                <input type="text" class="form-control" name="name" placeholder="(required)">
                            </div>

                            <div class="form-group col-lg-12">
                                <label>User Email</label>
                                <input type="text" class="form-control" name="email" placeholder="(required)">
                            </div>

                            <div class="form-group col-lg-12">
                                <label>User Password</label>
                                <input type="password" class="form-control" name="password" placeholder="(required)">
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Permissions Level</label>
                                <select name="permissions" class="form-control">
                                    @foreach($permissions as $p)
                                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->

        </div>   <!-- /.row -->
    </section>

@endsection

@section('extra_scripts')
<script type="text/javascript">

</script>
@endsection
