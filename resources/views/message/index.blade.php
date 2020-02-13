@extends('layouts.app', ['activePage' => 'message', 'titlePage' => __('Message')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-warning">
                <h4 class="card-title ">{{ __('Messages') }}</h4>
                <p class="card-category"> {{ __('Here you can manage your school Messages') }}</p>
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
                    <a href="{{ route('message.create') }}" class="btn btn-sm btn-warning">{{ __('Add Message') }}</a>
                  </div>
                </div>
                @endif
                <div class="row">
                @foreach($msgs as $msg)
                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-header card-header-danger">
                        <h4 class="card-title ">{{ $msg->title }}</h4>
                      </div>
                      <div class="card-body">
                        <p class="card-category"> {{ $msg->content }}</p>
                        <br>
                        <form action="{{ route('message.destroy', $msg) }}" method="post" class="float-right">
                            @csrf
                            @method('delete')

                            <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('message.edit', $msg) }}" data-original-title="" title="">
                              <i class="material-icons">edit</i>
                            </a>
                            <a rel="tooltip" class="btn btn-dark btn-link" data-toggle="modal" data-target="#exampleModalLong{{$msg->id}}">
                              <i class="material-icons">remove_red_eye</i>
                              <div class="ripple-container"></div>
                            </a>
                            <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this message?") }}') ? this.parentElement.submit() : ''">
                                <i class="material-icons">delete</i>
                            </button>
                        </form>
                      </div>
                    </div>
                  </div>
                @endforeach
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <!-- modal view -->
  @foreach($msgs as $msg)
  <div class="modal fade" id="exampleModalLong{{$msg->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{$msg-> type}} Message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-dark">
          <h3 class="text-center ">{{$msg-> title}}</h3>
          <b>{{$msg-> subject}}</b><br>
          <p>{{$msg-> content}}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Ok</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endsection
