@include('layouts.navbars.navs.guest')
<div class="container-fluid" style="height: 100vh;">
  <div class="row">
    <div class="col-md-6" style="padding: 0 !important">
      <div class="page-header login-page" 
        {{-- style="background-image: url('{{ asset('material') }}/img/proffessor.png'); 
        background-size: contain; background-position: left; background-attachment: fixed; align-items: center;" --}}
        data-color="purple">        
      </div>
    </div>
    <div class="col-md-6" style="background: #010e0f;">
        @yield('content')
        @include('layouts.footers.guest')
    </div>
  </div>
</div>
