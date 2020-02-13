@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('E-School')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8 mt-5 pt-5">
          <h1 class="text-white text-center">{{ __('Welcome to Efull School Management.') }}</h1>
      </div>
  </div>
</div>
@endsection
