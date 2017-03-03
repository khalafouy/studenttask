@extends('layouts.app')

@section('page_title')
    {{ $student->first_name  }}
@endsection

@section('extra_css')
@endsection

@section('page_content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-xs-6">
                <h4>Detailed View</h4>
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
                <div class="panel panel-default">
                    <div class="panel-heading">
                      {{--<div class="row">
                        <div class="col-xs-9">
                          <h4>{{ $event->ar_name }}</h4>
                        </div>
                        <div class="col-xs-3">
                          <a href="{{ URL::route('get.EventEdit', $event->id) }}"
                            class="btn btn-info pull-right">
                            Edit
                          </a>
                        </div>
                      </div>--}}
                    </div>
                    <!-- /.box-header -->
                    <div class="panel-body">
                        <div class="row">
                          <div class="col-xs-4">
                            <small>Student Name</small>
                            <h4>{{ $student->first_name ." ".$student->last_name}}</h4>
                          </div>
                          <div class="col-xs-4">
                              <h4><small>Student Country</small> {{ $student->birth_country}}</h4>
                          </div>
                          <div class="col-xs-4">
                              <h4><small>Student Gender</small> {{ $student->gender}}</h4>
                          </div>
                        </div>
                        <h4 class="text-muted">student Image</h4>
                        <hr >
                        <img src="/{{"uploads/".$student->personal_photo }}" width="680" class="img-responsive">

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('extra_scripts')
@endsection
