@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <!-- users statiscs start here -->
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="fa fa-gear"></i>
              </div>
            <p class="card-category">Class</p>
              <h3 class="card-title"> {{number_format($data['classes'])}}
                <small>Classes</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="fa fa-users text-danger"></i> All Classes
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <a href="/{{$data['school_id']}}/parent">
            <div class="card card-stats">
              <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                  <i class="fa fa-user-friends"></i>
                </div>
                <p class="card-category">Parents</p>
                <h3 class="card-title">{{number_format($data['parents'])}}
                  <small>Parents</small>
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="fa fa-user-friends text-warning"></i> All parent
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <a href="/{{$data['school_id']}}/teacher"> 
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <p class="card-category">Teachers</p>
                        <h3 class="card-title">{{number_format($data['teacher'])}}
                            <small> Teachers</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="fas fa-chalkboard-teacher"></i> All teacher
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <a href="/{{$data['school_id']}}/student"> 
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="fa fa-users"></i>
                </div>
                <p class="card-category">Total Student</p>
                <h3 class="card-title">{{number_format($data['student'])}}
                    <small>Student</small>
                </h3>
                </div>
                <div class="card-footer">
                <div class="stats">
                    <i class="fa fa-users text-danger"></i> All student
                </div>
                </div>
            </div>
          </a>
        </div>
      </div>
      <div class="row ">
        <div class="col-md-4">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="fa fa-mail-bulk"></i>
              </div>
              <p class="card-category">All Message</p>
              <h3 class="card-title">{{number_format($data['student'])}}
                <small>All Message</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="fa fa-mail-bulk text-warning"></i> All messsages
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="fa fa-envelope-open-text"></i>
              </div>
              <p class="card-category">Message Delivered</p>
              <h3 class="card-title">0
                <small>Message Delivered</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="fa fa-envelope-open-text text-warning"></i> All delivered messsage
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="fa fa-envelope"></i>
              </div>
              <p class="card-category">Message failed</p>
              <h3 class="card-title">0
                <small>Message failed</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="fa fa-envelope text-warning"></i> All failed messsage
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <a href="/school/{{$data["school_id"]}}/settings">
            <div class="card card-stats">
              <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                  <i class="fa fa-gear"></i>
                </div>
                <p class="card-category">Settings</p>
                <h3 class="card-title">
                  <small>Settings</small>
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="fa fa-gear text-warning"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="/school/{{$data["school_id"]}}/student_logs">
            <div class="card card-stats">
              <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                  <i class="fa fa-gear"></i>
                </div>
                <p class="card-category">Student Logs</p>
                <h3 class="card-title">
                  <small>Student Logs</small>
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="fa fa-gear text-warning"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush
