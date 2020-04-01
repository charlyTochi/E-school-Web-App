@extends('layouts.app', ['activePage' => 'student', 'titlePage' => __('Students')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- <form method="post" action="{{ route('student.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post') -->

            <div class="card ">
              <div class="card-header card-header-warning">
                <h4 class="card-title">{{ __('Student Details') }}</h4>
                <!-- <p class="card-category"></p> -->
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('student.index') }}" class="btn btn-sm btn-warning">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                      <img class="image" id="image" src="{{ asset('public/image')}}/<?php echo $user->profile_image ? $user->profile_image : "defualt.png"?>" width="100" height="100">
                    </div>
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-md-6">
                          <label>{{ __('First Name') }}</label>
                        </div>
                        <div class="col-md-6">
                          <h4 class="text-dark">{{$user->first_name}}</h4 class="text-dark">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <label>{{ __('Last Name') }}</label>
                        </div>
                        <div class="col-md-6">
                          <h4 class="text-dark">{{$user->last_name}}</h4 class="text-dark">
                        </div>
                      </div>
                    </div>
                </div>
              </div>
                               
                
            </div>
          </div>
        </div>
      </div>
@endsection
