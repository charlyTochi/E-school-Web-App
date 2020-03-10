@extends('layouts.app', ['activePage' => 'class', 'titlePage' => __('Classes')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-warning">
                <h4 class="card-title ">{{ __('Classes') }}</h4>
                <p class="card-category"> {{ __('Here you can manage your clases') }}</p>
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
                    <a href="{{ route('classes.create') }}" class="btn btn-sm btn-warning">{{ __('Add Class') }}</a>
                  </div>
                </div>
                @endif
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Class') }}
                      </th>
                      <th>
                        {{ __('Department') }}
                      </th>
                      <th>
                        {{ __('Creation date') }}
                      </th>
                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($classes as $class)
                        <tr>
                          <td>
                            {{ $class->class}}
                          </td>
                          <td>
                            {{ $class->department }}
                          </td>
                          <td>
                            {{ $class->created_at->format('Y-m-d') }}
                          </td>
                          <td class="td-actions text-right">

                              <form action="{{ route('classes.destroy', $class) }}" method="post">
                                  @csrf
                                  @method('delete')

                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('classes.edit', $class) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this message?") }}') ? this.parentElement.submit() : ''">
                                    <i class="material-icons">delete</i>
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

@endsection
