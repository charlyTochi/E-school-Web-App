@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content" style="background: #f2f2f2">
    <div class="container-fluid">
      <!-- users statiscs start here -->
      <div class="row">
        <div class="col-md-12">
          <div class="badge badge-info p-2">
            <i class="fa fa-info-circle" style="color: white"></i>
              Ensure to create classes before creating parents => create parents before creating teachers => create teachers before creating students <br/>
          </div>
        </div>
      </div>
      <div class="row">
        @if (Auth::user()->user_category == '77889' )
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats p-3">
            <div class="card-header card-header-warning card-header-icon">
              {{-- <div class="card-icon">
                <i class="fa fa-users"></i>
              </div> --}}
              <p class="card-category">Total Users</p>
              <h3 class="card-title">{{number_format($data['total'])}}
                <small>Users</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="fa fa-users text-danger"></i>
              </div>
            </div>
          </div>
        </div>
        @endif
        <div class="col-lg-3 col-md-6 col-sm-6">
          @if(Auth::user()->user_category != '77889')
            <a href="classes">
              <div class="card card-stats p-3">
                <div class="card-header card-header-warning card-header-icon">
                  {{-- <div class="card-icon">
                    <i class="fas fa-school"></i>
                  </div> --}}
                  <p class="card-category">Classes</p>
                  <h3 class="card-title">{{number_format($data['classes'])}}
                      <small>Classes</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="fas fa-school text-primary"></i>
                  </div>
                </div>
              </div>
            </a>
          @else
            <div class="card card-stats p-3">
              <div class="card-header card-header-warning card-header-icon">
                {{-- <div class="card-icon">
                  <i class="fas fa-school"></i>
                </div> --}}
                <p class="card-category">Classes</p>
                <h3 class="card-title">{{number_format($data['classes'])}}
                    <small>Classes</small>
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="fas fa-school text-primary"></i>
                </div>
              </div>
            </div>
          @endif
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          @if(Auth::user()->user_category != '77889')
            <a href="parents">
              <div class="card card-stats p-3">
                <div class="card-header card-header-warning card-header-icon">
                  {{-- <div class="card-icon">
                    <i class="fa fa-user-friends"></i>
                  </div> --}}
                  <p class="card-category">Parents</p>
                  <h3 class="card-title">{{number_format($data['parents'])}}
                    <small>Parents</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="fa fa-user-friends text-warning"></i>
                  </div>
                </div>
              </div>
            </a>
          @else
            <div class="card card-stats p-3">
              <div class="card-header card-header-warning card-header-icon">
                {{-- <div class="card-icon">
                  <i class="fa fa-user-friends"></i>
                </div> --}}
                <p class="card-category">Parents</p>
                <h3 class="card-title">{{number_format($data['parents'])}}
                  <small>Parents</small>
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="fa fa-user-friends text-warning"></i>
                </div>
              </div>
            </div>
          @endif
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          @if(Auth::user()->user_category != '77889')
            <a href="teacher">
              <div class="card card-stats p-3">
                <div class="card-header card-header-warning card-header-icon">
                  {{-- <div class="card-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                  </div> --}}
                  <p class="card-category">Teachers</p>
                  <h3 class="card-title">{{number_format($data['teacher'])}}
                    <small> Teachers</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="fas fa-chalkboard-teacher"></i>
                  </div>
                </div>
              </div>
            </a>
          @else
            <div class="card card-stats p-3">
              <div class="card-header card-header-warning card-header-icon">
                {{-- <div class="card-icon">
                  <i class="fas fa-chalkboard-teacher"></i>
                </div> --}}
                <p class="card-category">Teachers</p>
                <h3 class="card-title">{{number_format($data['teacher'])}}
                  <small> Teachers</small>
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="fas fa-chalkboard-teacher"></i>
                </div>
              </div>
            </div>
          @endif
        </div>
        @if (Auth::user()->user_category != '77889' )
          <div class="col-lg-3 col-md-6 col-sm-6">
            <a href="student">
              <div class="card card-stats p-3">
                <div class="card-header card-header-warning card-header-icon">
                  {{-- <div class="card-icon">
                    <i class="fa fa-users"></i>
                  </div> --}}
                  <p class="card-category">Total Students</p>
                  <h3 class="card-title">{{number_format($data['student'])}}
                    <small>Student</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="fa fa-users text-danger"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
        @endif
      </div>
      <div class="row ">
        <div class="col-md-4">
          <div class="card card-stats p-3">
            <div class="card-header card-header-warning card-header-icon">
              {{-- <div class="card-icon">
                <i class="fa fa-mail-bulk"></i>
              </div> --}}
              <p class="card-category">All Message</p>
              <h3 class="card-title">{{number_format($data['student'])}}
                <small>All Message</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="fa fa-mail-bulk text-warning"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-stats p-3">
            <div class="card-header card-header-warning card-header-icon">
              {{-- <div class="card-icon">
                <i class="fa fa-envelope-open-text"></i>
              </div> --}}
              <p class="card-category">Message Delivered</p>
              <h3 class="card-title">0
                <small>Message Delivered</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="fa fa-envelope-open-text text-warning"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-stats p-3">
            <div class="card-header card-header-warning card-header-icon">
              {{-- <div class="card-icon">
                <i class="fa fa-envelope"></i>
              </div> --}}
              <p class="card-category">Message failed</p>
              <h3 class="card-title">0
                <small>Message failed</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="fa fa-envelope text-warning"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="bottom_image"></div>
        </div>
      </div>
      <!-- users statistics end here -->
      @if (Auth::user()->user_category == '77889' )
      <!-- charts start here -->
      {{-- <div class="row">
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-success">
              <canvas id="canvas" class="ct-chart"></canvas>
            </div>
            <div class="card-body">
              <h4 class="card-title">All Users Data</h4>
              <p class="card-category">
                {{-- <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p> --}}
            {{-- </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> updated just now
              </div>
            </div>
          </div>
        </div>  --}}
        {{-- <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-warning">
              <div class="ct-chart" id="websiteViewsChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Total Student Present</h4>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
            </div>
          </div>
        </div> --}}
        {{-- <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-danger">
              <div class="ct-chart" id="completedTasksChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Total Student Absent</h4>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
            </div>
          </div>
        </div> --}}
      </div>
      @endif
      <!-- charts end here -->
      <!-- <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <span class="nav-tabs-title">Tasks:</span>
                  <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#profile" data-toggle="tab">
                        <i class="material-icons">bug_report</i> Bugs
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#messages" data-toggle="tab">
                        <i class="material-icons">code</i> Website
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#settings" data-toggle="tab">
                        <i class="material-icons">cloud</i> Server
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="profile">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Sign contract for "What are conference organizers afraid of?"</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Create 4 Invisible User Experiences you Never Knew About</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane" id="messages">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Sign contract for "What are conference organizers afraid of?"</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane" id="settings">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Sign contract for "What are conference organizers afraid of?"</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Employees Stats</h4>
              <p class="card-category">New employees on 15th September, 2016</p>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Salary</th>
                  <th>Country</th>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Dakota Rice</td>
                    <td>$36,738</td>
                    <td>Niger</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Minerva Hooper</td>
                    <td>$23,789</td>
                    <td>Curaçao</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Sage Rodriguez</td>
                    <td>$56,142</td>
                    <td>Netherlands</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Philip Chaney</td>
                    <td>$38,735</td>
                    <td>Korea, South</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> -->

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
