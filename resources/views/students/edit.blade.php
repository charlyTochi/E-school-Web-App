@extends('layouts.app', ['activePage' => 'student', 'titlePage' => __('Students')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('student.update', $user) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-warning">
                <h4 class="card-title">{{ __('Edit User') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('student.index') }}" class="btn btn-sm btn-warning">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <div class="input-group col-md-4">
                    <div class="custom-file">
                      <input type="file" class="form-control{{ $errors->has('profile_image') ? ' is-invalid' : '' }}" name="profile_image" id="inputGroupFile04" value="{{ old('profile_image', $user->profile_image) }}" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <img class="image" id="image" src="{{ asset('public/image')}}/<?php echo $user->profile_image ? $user->profile_image : "defualt.png"?>" width="100" height="100">
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('First Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" id="input-name" type="text" placeholder="{{ __('First Name') }}" value="{{ old('first_name', $user->first_name) }}" required="true" aria-required="true"/>
                      @if ($errors->has('first_name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('first_name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Last Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" id="input-last_name" type="text" placeholder="{{ __('Last Name') }}" value="{{ old('last_name', $user->last_name) }}" required="true" aria-required="true"/>
                      @if ($errors->has('last_name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('last_name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Card Number') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('card_code') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('card_code') ? ' is-invalid' : '' }}" name="card_code" id="input-card_code" type="text" placeholder="{{ __('Card Number') }}" value="{{ old('card_code', $user->card_code) }}" maxlength="11" required="true" aria-required="true"/>
                      @if ($errors->has('card_code'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('card_code') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Class') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('class_name') ? ' has-danger' : '' }}">
                      <!-- <input class="form-control{{ $errors->has('class_name') ? ' is-invalid' : '' }}" name="class_name" id="input-class_name" type="text" placeholder="{{ __('Class Name') }}" value="{{ old('class_name') }}" required="true" aria-required="true"/> -->
                      <select class="form-control{{ $errors->has('class_name') ? ' is-invalid' : '' }}" name="class_name"  data-style="btn btn-link" id="class_name" value="{{ old('class_name')}}" required>
                        <option>{{$user->class_name}}</option>
                        @foreach($data['classes'] as $klass)
                          <option >{{$klass['class']}}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('class_name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('class_name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Primary Contact Relationship') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('primary_contact_rel') ? ' has-danger' : '' }}">
                      <select class="form-control" name="primary_contact_rel"  data-style="btn btn-link" id="exampleFormControlSelect1" value="{{ old('primary_contact_rel') }}" required>
                        <option>{{$user->secondary_contact_rel}}</option>
                        <option>Father</option>
                        <option>Mother</option>
                        <option>Step Mother</option>
                        <option>Step Father</option>
                        <option>Guidiance</option>
                        <option>Foster Father</option>
                        <option>Foster Mother</option>
                      </select>
                      @if ($errors->has('primary_contact_rel'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('primary_contact_rel') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Secondary Contact Relationship') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('secondary_contact_rel') ? ' has-danger' : '' }}">
                      <select class="form-control" name="secondary_contact_rel"  data-style="btn btn-link" id="exampleFormControlSelect1" value="{{ old('secondary_contact_rel') }}" required>
                        <option>{{$user->primary_contact_rel}}</option>
                        <option>Father</option>
                        <option>Mother</option>
                        <option>Step Mother</option>
                        <option>Step Father</option>
                        <option>Guidiance</option>
                        <option>Foster Father</option>
                        <option>Foster Mother</option>
                      </select>
                      @if ($errors->has('secondary_contact_rel'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('secondary_contact_rel') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Address') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="input-address" type="text" placeholder="{{ __('Address') }}" value="{{ old('address', $user->address) }}" required="true" aria-required="true"/>
                      @if ($errors->has('address'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('address') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-warning">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
