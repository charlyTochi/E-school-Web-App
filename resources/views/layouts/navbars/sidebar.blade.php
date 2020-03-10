<div class="sidebar" data-color="orange" data-background-color="black" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{route('home')}}" class="simple-text logo-normal">
      {{$data['school_name'] ?? 'E-School MGT' }}
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
          <i><img style="width:25px" src="{{ asset('material') }}/img/defualt.png"></i>
          <p>{{ Auth::user()->name }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <i class="material-icons">person</i>
                <span class="sidebar-normal">{{ __('Profile') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>

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
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'class' || $activePage == 'class') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample1" aria-expanded="true">
          <i class="fa fa-book"></i>
          <p>{{ __('Accademic')}}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample1">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'class' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('classes.index') }}">
                <i class="material-icons">person</i>
                <span class="sidebar-normal">{{ __('Class') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</div>
