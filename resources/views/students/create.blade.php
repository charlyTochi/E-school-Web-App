@extends('layouts.app', ['activePage' => 'student', 'titlePage' => __('Students')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('student.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-warning">
                <h4 class="card-title">{{ __('Add User') }}</h4>
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
                      <input type="file" class="form-control{{ $errors->has('profile_image') ? ' is-invalid' : '' }}" name="profile_image" id="inputGroupFile04" value="{{ old('profile_image') }}" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <img class="image" id="image" src="{{ asset('public/image')}}/defualt.png" width="100" height="100">
                  </div>
                </div>                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('First Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" id="input-name" type="text" placeholder="{{ __('First Name') }}" value="{{ old('first_name') }}" required="true" aria-required="true"/>
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
                      <input class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" id="input-last_name" type="text" placeholder="{{ __('Last Name') }}" value="{{ old('last_name') }}" required="true" aria-required="true"/>
                      @if ($errors->has('last_name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('last_name') }}</span>
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
                  <label class="col-sm-2 col-form-label">{{ __('Father') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('father_id') ? ' has-danger' : '' }}">
                      <select class="form-control" name="father_id"  data-style="btn btn-link" id="father_id" value="{{ old('father_id') }}" required>
                        <option>Select Father</option>
                        @foreach($data['fathers'] as $father)
                          <option  value="{{$father['id']}}">{{$father['first_name']. ' '. $father['last_name']}}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('father_id'))
                        <span id="father_id-error" class="error text-danger" for="input-father_id">{{ $errors->first('father_id') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Mother') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('mother_id') ? ' has-danger' : '' }}">
                      <select class="form-control" name="mother_id"  data-style="btn btn-link" id="exampleFormControlSelect1" value="{{ old('mother_id') }}" required>
                        <option>Select Mother</option>
                        @foreach($data['mothers'] as $mother)
                          <option value="{{$mother['id']}}">{{$mother['first_name']. ' '. $mother['last_name']}}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('mother_id'))
                        <span id="mother_id-error" class="error text-danger" for="input-mother_id">{{ $errors->first('mother_id') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Card Code') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('card_code') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('card_code') ? ' is-invalid' : '' }}" type="text" name="card_code" id="input-card_code" placeholder="{{ __('Card Code') }}" value="{{ old('card_code') }}" required="true" aria-required="true" maxlength="11" />
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
                      <select class="form-control{{ $errors->has('class_name') ? ' is-invalid' : '' }}" name="class_id"  data-style="btn btn-link" id="class_name" value="{{ old('class_name') }}" required>
                        <option>Select Class</option>
                        @foreach($data['classes'] as $klass)
                          <option value="{{$klass['id']}}">{{$klass['class_name']}}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('class_name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('class_name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Sex') }}</label>
                  <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('sex') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('sex') ? ' is-invalid' : '' }}" name="sex"  data-style="btn btn-link" id="sex" value="{{ old('sex') }}" required>
                        <option>Select Sex</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                      @if ($errors->has('sex'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('sex') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Primary Contact Person') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('primary_contact_id') ? ' has-danger' : '' }}">
                      <!-- <input class="form-control{{ $errors->has('primary_contact_id') ? ' is-invalid' : '' }}" name="primary_contact_id" id="input-primary_id" type="text" placeholder="{{ __('Pri Contact') }}" value="{{ old('primary_contact_id') }}" required="true" aria-required="true"/> -->
                      <select class="form-control" name="primary_contact_id"  data-style="btn btn-link" id="exampleFormControlSelect1" value="{{ old('primary_contact_id') }}" required>
                        <option>Select Primary Contact Person</option>
                        @foreach($data['parents'] as $parent)
                          <option value="{{$parent['id']}}">{{$parent['first_name']. ' '. $parent['last_name']}}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('primary_contact_id'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('primary_contact_id') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Secondary Contact Person') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('secondary_contact_id') ? ' has-danger' : '' }}">
                      <!-- <input class="form-control{{ $errors->has('secondary_contact_id') ? ' is-invalid' : '' }}" name="secondary_contact_id" id="input-secondary_id" type="text" placeholder="{{ __('Sec Contact') }}" value="{{ old('secondary_contact_id') }}" required="true" aria-required="true"/> -->
                      <select class="form-control" name="secondary_contact_id"  data-style="btn btn-link" id="exampleFormControlSelect1" value="{{ old('secondary_contact_id') }}" required>
                        <option>Select Secondary Contact Person</option>
                        @foreach($data['parents'] as $parent)
                          <option value="{{$parent['id']}}">{{$parent['first_name']. ' '. $parent['last_name']}}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('secondary_contact_id'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('secondary_contact_id') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Primary Contact Relationship') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('primary_contact_rel') ? ' has-danger' : '' }}">
                      <!-- <input class="form-control{{ $errors->has('primary_contact_rel') ? ' is-invalid' : '' }}" name="primary_contact_rel" id="input-relationship" type="text" placeholder="{{ __('Pri. Contact Rel.') }}" value="{{ old('primary_contact_rel') }}" required="true" aria-required="true"/> -->
                      <select class="form-control" name="primary_contact_rel"  data-style="btn btn-link" id="exampleFormControlSelect1" value="{{ old('primary_contact_rel') }}" required>
                        <option>Select Primary Contact Relationship</option>
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
                      <!-- <input class="form-control{{ $errors->has('secondary_contact_rel') ? ' is-invalid' : '' }}" name="secondary_contact_rel" id="input-relationship" type="text" placeholder="{{ __('Sec Contact Rel.') }}" value="{{ old('secondary_contact_rel') }}" required="true" aria-required="true"/> -->
                      <select class="form-control" name="secondary_contact_rel"  data-style="btn btn-link" id="exampleFormControlSelect1" value="{{ old('secondary_contact_rel') }}" required>
                        <option>Select Primary Contact Person</option>
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
                      <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="input-address" type="text" placeholder="{{ __('Address') }}" value="{{ old('address') }}" required="true" aria-required="true"/>
                      @if ($errors->has('address'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('address') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Date Of Birth') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('date_of_birth') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}" name="date_of_birth" id="input-date_of_birth" type="date" placeholder="{{ __('Date Of Birth') }}" value="{{ old('date_of_birth') }}" required="true" aria-required="true"/>
                      @if ($errors->has('date_of_birth'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('date_of_birth') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nationality') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('nationality') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('nationality') ? ' is-invalid' : '' }}" name="nationality" id="input-nationality" type="text" placeholder="{{ __('nationality') }}" value="{{ old('Nationality') }}" required="true" aria-required="true"/>
                      @if ($errors->has('nationality'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('nationality') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('State Of Origin') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('state_of_origin') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('state_of_origin') ? ' is-invalid' : '' }}" name="state_of_origin" id="input-state_of_origin" type="text" placeholder="{{ __('State Of Origin') }}" value="{{ old('state_of _origin') }}" required="true" aria-required="true"/>
                      @if ($errors->has('state_of_origin'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('state_of_origin') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Local Govt') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('local_govt') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('local_govt') ? ' is-invalid' : '' }}" name="local_govt" id="input-local_govt" type="text" placeholder="{{ __('Local Govt') }}" value="{{ old('local_govt') }}" required="true" aria-required="true"/>
                      @if ($errors->has('local_govt'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('local_govt') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Religion') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('religion') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('religion') ? ' is-invalid' : '' }}" name="religion" id="input-religion" type="text" placeholder="{{ __('religion') }}" value="{{ old('Religion') }}" required="true" aria-required="true"/>
                      @if ($errors->has('religion'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('religion') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
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
                <button type="submit" class="btn btn-warning">{{ __('Add User') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
