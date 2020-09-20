@extends('layouts.app', ['activePage' => 'student', 'titlePage' => __('Students')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="">
            <a href="{{ route('user.index')}}" class="btn btn-sm btn-warning">{{ __('School') }}</a>
            <a href="#" class="btn btn-sm btn-default">{{ __('Students') }}</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="card">
            @if(count($users) > 0)
              <div class="card-header card-header-warning">
                <h4 class="card-title ">{{ __('Students') }}</h4>
                <p class="card-category"> {{ __('Here you can manage your students') }}</p>
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
                          {{ __('Full Name') }}
                      </th>
                      <th>
                        {{ __('Class') }}
                      </th>
                      <th>
                        {{ __('Picture') }}
                      </th>
                      <th>
                        {{ __('Email') }}
                      </th>
                      <th>
                        {{ __('Student Code') }}
                      </th>
                      <th>
                        {{ __('Creation date') }}
                      </th>
                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                      <!--  -->
                        <tr>
                          <td>
                            {{ $user->first_name. ' '. $user->last_name }}
                          </td>
                          <td>
                            {{ $user->class_name->class_name }}
                          </td>
                          <td>
                          <img class="image" id="image" src="{{ asset('public/image')}}/<?php echo $user->profile_image ? $user->profile_image : "defualt.png"?>" width="50" height="50">
                          </td>
                          <th>
                            {{ $user->email }}
                          </th>
                          <th>
                            {{ $user->card_code }}
                          </th>
                          <td>
                            {{ $user->created_at->format('Y-m-d') }}
                          </td>
                          <td class="td-actions text-right">

                              <form action="{{ route('student.destroy', $user) }}" method="post">
                                  @csrf
                                  @method('delete')

                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('student.edit', $user) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <a rel="tooltip" class="btn btn-dark btn-link" data-toggle="modal" data-target="#exampleModalLong{{$user->id}}">
                                    <i class="material-icons">remove_red_eye</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="submit" class="btn btn-danger btn-link delete" msg="{{$user->first_name}}" data-original-title="" title="" >
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>

                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            @else
              <div class="customInfo">
                No information for this school
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
  @foreach($users as $user)
  <div class="modal fade" id="exampleModalLong{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Student Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <img class="image" id="image" src="{{ asset('public/image')}}/<?php echo $user->profile_image ? $user->profile_image : "defualt.png"?>" width="100" height="100">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <h4>Student Name</h4>
            </div>
            <div class="col-md-6">
              <p>{{$user->first_name . ' '. $user->last_name}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <h4 class="text-dark">Class</h4>
            </div>
            <div class="col-md-6">
              <p>{{$user->class_name}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <h4>Sex</h4>
            </div>
            <div class="col-md-6">
              <p>{{$user->sex}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <h4>Primary contact</h4>
            </div>
            <div class="col-md-6">
              <h4>{{$user->id}}</h4>
            </div>
          </div>
          <div class="row">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="" class="btn btn-warning" data-dismiss="modal">View All</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endsection
