<<<<<<< HEAD
<div class="sidebar" data-color="orange" data-background-color="black" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
=======
<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
<<<<<<< HEAD
    <a href="{{route('home')}}" class="simple-text logo-normal">
      {{$data['school_name'] ?? 'E-School MGT' }}
=======
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Creative Tim') }}
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
<<<<<<< HEAD
          <i><img style="width:25px" src="{{ asset('material') }}/img/defualt.png"></i>
          <p>{{ Auth::user()->name }}
=======
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Laravel Examples') }}
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
<<<<<<< HEAD
                <i class="material-icons">person</i>
                <span class="sidebar-normal">{{ __('Profile') }} </span>
=======
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
              </a>
            </li>
          </ul>
        </div>
      </li>
<<<<<<< HEAD

      @if (Auth::user()->user_category == '77889' )
      <li class="nav-item{{ $activePage == 'school' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('user.index') }}">
          <i class="fas fa-school"></i>
          <span class="sidebar-normal"> {{ __('Schools') }} </span>
        </a>
      </li>
      @endif
      <li class="nav-item{{ $activePage == 'student' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('student.index') }}">
          <i class="material-icons">school</i>
          <span class="sidebar-normal">{{ __('Students') }} </span>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'teacher' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('teacher.index') }}">
          <!-- <i class="material-icons">content_paste</i> -->
          <i class="fas fa-chalkboard-teacher"></i>
          <span class="sidebar-normal">{{ __('Teachers') }} </span>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'parent' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('parents.index') }}">
          <i class="fa fa-user-friends"></i>
          <p>{{ __('Parents') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'message' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('message.index') }}">
          <i class="fa fa-envelope"></i>
          <p>{{ __('Messages') }}</p>
=======
      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('table') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Table List') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('typography') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Typography') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('icons') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('map') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Maps') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('language') }}">
          <i class="material-icons">language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li>
      <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('upgrade') }}">
          <i class="material-icons">unarchive</i>
          <p>{{ __('Upgrade to PRO') }}</p>
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
        </a>
      </li>
    </ul>
  </div>
</div>
