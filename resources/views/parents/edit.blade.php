@extends('layouts.app', ['activePage' => 'parent', 'titlePage' => __('Parents')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('parents.update', $user) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
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
                      <a href="{{ route('parents.index') }}" class="btn btn-sm btn-warning">{{ __('Back to list') }}</a>
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
                  <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text" placeholder="{{ __('Title') }}" value="{{ old('title', $user->title) }}" required="true" aria-required="true"/>
                      @if ($errors->has('title'))
                        <span id="title-error" class="error text-danger" for="input-title">{{ $errors->first('title') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('First Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" id="input-first_name" type="text" placeholder="{{ __('First Name') }}" value="{{ old('first_name', $user->first_name) }}" required="true" aria-required="true"/>
                      @if ($errors->has('first_name'))
                        <span id="first_name-error" class="error text-danger" for="input-first_name">{{ $errors->first('first_name') }}</span>
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
                        <span id="last_name-error" class="error text-danger" for="input-last_name">{{ $errors->last('last_name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Phone Number') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('phone_number') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" id="input-motto" type="text" placeholder="{{ __('phone number') }}" value="{{ old('phone_number', $user->phone_number) }}" required="true" aria-required="true"/>
                      @if ($errors->has('phone_number'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('phone_number') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Address') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="input-motto" type="text" placeholder="{{ __('Address') }}" value="{{ old('address', $user->address) }}" required="true" aria-required="true"/>
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
