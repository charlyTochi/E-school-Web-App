@extends('layouts.app', ['activePage' => 'teacher', 'titlePage' => __('Teachers')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-warning">
                <h4 class="card-title ">{{ __('Teachers') }}</h4>
                <p class="card-category"> {{ __('Here you can manage your school Teachers') }}</p>
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
                    <a href="{{ route('teacher.create') }}" class="btn btn-sm btn-warning">{{ __('Add user') }}</a>
                  </div>
                  @endif
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Teachers Name') }}
                      </th>
                      <th>
                        {{ __('Profile') }}
                      </th>
                      <th>
                        {{ __('Email') }}
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
                        <tr>
                          <td>
                            {{ $user->first_name . ' '. $user->last_name }}
                          </td>
                          <td>
                            <img class="image" id="image" src="{{ asset('public/image')}}/<?php echo $user->profile_image ? $user->profile_image : "defualt.png"?>" width="50" height="50">
                          </td>
                          <td>
                            {{ $user->email }}
                          </td>
                          <td>
                            {{ $user->created_at->format('Y-m-d') }}
                          </td>
                          <td class="td-actions text-right">

                              <form action="{{ route('teacher.destroy', $user) }}" method="post">
                                  @csrf
                                  @method('delete')

                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('teacher.edit', $user) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <a rel="tooltip" class="btn btn-dark btn-link" data-toggle="modal" data-target="#exampleModalLong{{$user->id}}">
                                    <i class="material-icons">remove_red_eye</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="submit" class="btn btn-danger btn-link delete" msg="{{$user->first_name}}" data-original-title="" title="">
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
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>{{$user->first_name}}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endsection
