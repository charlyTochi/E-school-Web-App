@extends('layouts.app', ['activePage' => 'class', 'titlePage' => __('Classes')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          @if(Auth::user()->user_category == '77889')
            <form method="post" action="/classes/{{$id}}/create" autocomplete="off" class="form-horizontal">
          @else
            <form method="post" action="{{ route('classes.store') }}" autocomplete="off" class="form-horizontal">
          @endif
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-warning">
                <h4 class="card-title">{{ __('Add Class') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('classes.index') }}" class="btn btn-sm btn-warning">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Class') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('class') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('class') ? ' is-invalid' : '' }}" name="class_name" id="input-name" type="text" placeholder="{{ __('Class') }}" value="{{ old('class') }}" required="true" aria-required="true"/>
                      @if ($errors->has('class'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('class') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Department') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('department') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('department') ? ' is-invalid' : '' }}" name="department" id="input-name" type="text" placeholder="{{ __('Department') }}" value="{{ old('department') }}" required="true" aria-required="true"/>
                      @if ($errors->has('department'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('department') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-warning">{{ __('Add Class') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
