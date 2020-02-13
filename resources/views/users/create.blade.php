@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('User Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('user.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
<<<<<<< HEAD
              <div class="card-header card-header-warning">
=======
              <div class="card-header card-header-primary">
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
                <h4 class="card-title">{{ __('Add User') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
<<<<<<< HEAD
                      <a href="{{ route('user.index') }}" class="btn btn-sm btn-warning">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('School Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('school_name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('school_name') ? ' is-invalid' : '' }}" name="school_name" id="input-name" type="text" placeholder="{{ __('School Name') }}" value="{{ old('school_name') }}" required="true" aria-required="true"/>
                      @if ($errors->has('school_name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('school_name') }}</span>
                      @endif
                    </div>
=======
                      <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required />
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
<<<<<<< HEAD
                  <label class="col-sm-2 col-form-label">{{ __('Motto') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('motto') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('motto') ? ' is-invalid' : '' }}" name="motto" id="input-motto" type="text" placeholder="{{ __('Motto') }}" value="{{ old('motto') }}" required="true" aria-required="true"/>
                      @if ($errors->has('motto'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('motto') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Phone Number') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('phone_number') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" id="input-motto" type="text" placeholder="{{ __('phone number') }}" value="{{ old('phone_number') }}" required="true" aria-required="true"/>
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
                      <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="input-motto" type="text" placeholder="{{ __('Address') }}" value="{{ old('address') }}" required="true" aria-required="true"/>
                      @if ($errors->has('address'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('address') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
=======
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __(' Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="password" name="password" id="input-password" placeholder="{{ __('Password') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm Password') }}" value="" required />
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
<<<<<<< HEAD
                <button type="submit" class="btn btn-warning">{{ __('Add User') }}</button>
=======
                <button type="submit" class="btn btn-primary">{{ __('Add User') }}</button>
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
