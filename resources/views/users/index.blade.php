<<<<<<< HEAD
@extends('layouts.app', ['activePage' => 'school', 'titlePage' => __('Schools')])
=======
@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('User Management')])
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
<<<<<<< HEAD
              <div class="card-header card-header-warning">
=======
              <div class="card-header card-header-primary">
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
                <h4 class="card-title ">{{ __('Users') }}</h4>
                <p class="card-category"> {{ __('Here you can manage users') }}</p>
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
                <div class="row">
                  <div class="col-12 text-right">
<<<<<<< HEAD
                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-warning">{{ __('Add user') }}</a>
=======
                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Add user') }}</a>
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Name') }}
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
<<<<<<< HEAD
                      @foreach($school as $user)
                        <tr>
                          <td>
                            {{ $user->school_name }}
=======
                      @foreach($users as $user)
                        <tr>
                          <td>
                            {{ $user->name }}
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
                          </td>
                          <td>
                            {{ $user->email }}
                          </td>
                          <td>
                            {{ $user->created_at->format('Y-m-d') }}
                          </td>
                          <td class="td-actions text-right">
<<<<<<< HEAD
                            @if ($user[auth()->id()]['id'] != auth()->id())
                              <form action="{{ route('user.destroy', $user) }}" method="post">
                                  @csrf
                                  @method('delete')

=======
                            @if ($user->id != auth()->id())
                              <form action="{{ route('user.destroy', $user) }}" method="post">
                                  @csrf
                                  @method('delete')
                              
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('user.edit', $user) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
<<<<<<< HEAD
                                  <a rel="tooltip" class="btn btn-dark btn-link" data-toggle="modal" data-target="#exampleModalLong{{$user->id}}">
                                    <i class="material-icons">remove_red_eye</i>
                                    <div class="ripple-container"></div>
                                  </a>
=======
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                            @else
<<<<<<< HEAD
                              <a rel="tooltip" id="delete" class="btn btn-success btn-link" href="{{ route('profile.edit') }}" data-original-title="" title="">
=======
                              <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('profile.edit') }}" data-original-title="" title="">
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                              </a>
                            @endif
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
<<<<<<< HEAD

  <!-- modal view -->
  @foreach($school as $user)
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
          <p>{{$user->school_name}}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endsection
=======
@endsection
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
