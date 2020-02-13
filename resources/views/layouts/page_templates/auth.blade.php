<<<<<<< HEAD
@if (Auth::user()->user_category == '77889' || Auth::user()->user_category == '44556')
  <div class="wrapper ">
    @include('layouts.navbars.sidebar')
    <div class="main-panel">
    @include('layouts.navbars.navs.auth')
    @yield('content')
    @include('layouts.footers.auth')
    </div>
  </div>
@else
<!-- <div class="wrapper "> -->
  <div class="main-panel" style="width: 100% !important">
    @include('layouts.navbars.navs.auth')
    @yield('content')
    @include('layouts.footers.auth')
  <!-- </div> -->
</div>
@endif
=======
<div class="wrapper ">
  @include('layouts.navbars.sidebar')
  <div class="main-panel">
    @include('layouts.navbars.navs.auth')
    @yield('content')
    @include('layouts.footers.auth')
  </div>
</div>
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
