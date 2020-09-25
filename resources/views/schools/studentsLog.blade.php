@extends('layouts.app', ['activePage' => 'student_log', 'titlePage' => __('Students Log')])


@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="">
            <a href="{{ route('user.index')}}" class="btn btn-sm btn-warning">{{ __('School') }}</a>
            <a href="#" class="btn btn-sm btn-default">{{ __('Students Logs') }}</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="card">
            @if(count($data) > 0)
              <div class="card-header card-header-warning">
                <h4 class="card-title ">{{ __('Students Logs') }}</h4>
                <p class="card-category"> {{ __('Displayed here are the entry and departure logs of each student') }}</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                @if (Auth::user()->user_category != '77889' )
                <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('student.create') }}" class="btn btn-sm btn-warning">{{ __('Add Student') }}</a>
                  </div>
                </div>
                @endif
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Card code') }}
                      </th>
                      <th>
                        {{ __('Is Logged in') }}
                      </th>
                      <th>
                        {{ __('Log Timestamp') }}
                      </th>
                      <th>
                        {{ __('Log day') }}
                      </th>
                      <th>
                        {{ __('Log month') }}
                      </th>
                      <th>
                        {{ __('Log year') }}
                      </th>
                      <th>
                        {{ __('Log Hour') }}
                      </th>
                      <th>
                        {{ __('Log Minute') }}
                      </th>
                      <th>
                        {{ __('Log Second') }}
                      </th>
                      <th>
                        {{ __('Creation date') }}
                      </th>
                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($data as $value)
                        <tr>
                          <td>
                            {{$value->card_code}}
                          </td>
                          <td>
                            {{$value->is_logged_in}}
                          </td>
                          <td>
                            {{$value->log_timestamp}}
                          </td>
                          <td>
                            {{$value->log_day}}
                          </td>
                          <td>
                            {{$value->log_month}}
                          </td>
                          <td>
                            {{$value->log_year}}
                          </td>
                          <td>
                            {{$value->log_hour}}
                          </td>
                          <td>
                            {{$value->log_min}}
                          </td>
                          <td>
                            {{$value->log_sec}}
                          </td>
                          <td>
                            {{$value->created_at}}
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            @else
              <div class="customInfo">
                No log information for this school
                @if (Auth::user()->user_category == '77889' )
                <div class="row">
                  <div class="col-12">
                    <a href="{{ route('student.create') }}" class="btn btn-sm btn-warning">{{ __('Add Student') }}</a>
                  </div>
                </div>
                @endif
              </div>
            @endif
            </div>
        </div>
      </div>
    </div>
  </div>

  <!-- modal view -->
  
@endsection
