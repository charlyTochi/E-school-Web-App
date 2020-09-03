@extends('layouts.app', ['activePage' => 'parents', 'titlePage' => __('Parents')])

@section('content')
<div>
<!-- <header style="height:100px">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox"> -->
      <!-- Slide One - Set the background image for this slide in the line below -->
      <!-- <div class="carousel-item active" style="background-image:  url({{ asset('/material/img/login.jpg') }})">

        <div class="color-overlay">
          <div class="carousel-caption d-none d-md-block">
            <h2 class="display-4">Welcome To {{$data['school_name']}} Schools</h2>
            <p class="lead">This is a description for the first slide.</p>
          </div>
        </div>
      </div> -->
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <!-- <div class="carousel-item" style="background-image:  url({{ asset('/material/img/sch2.jpg') }})">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">Second Slide</h2>
          <p class="lead">This is a description for the second slide.</p>
        </div>
        <div class="color-overlay"></div>
      </div> -->
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <!-- <div class="carousel-item" style="background-image: url({{ asset('/material/img/sch3.jpg') }})">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4" style="z-index:1">Third Slide</h2>
          <p class="lead">This is a description for the third slide.</p>
        </div>
        <div class="color-overlay"></div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
  </div>
</header> -->

<!--Carousel Wrapper-->
<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-1z" data-slide-to="1"></li>
    <li data-target="#carousel-example-1z" data-slide-to="2"></li>
    <li data-target="#carousel-example-1z" data-slide-to="3"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <!--First slide-->
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(130).jpg"
        alt="First slide">
    </div>
    <!--/First slide-->
    <!--Second slide-->
    <div class="carousel-item">
      <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(129).jpg"
        alt="Second slide">
    </div>
    <!--/Second slide-->
    <!--Third slide-->
    <div class="carousel-item">
      <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(70).jpg"
        alt="Third slide">
    </div>

      <div class="color-overlay">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">Welcome To {{$data['school_name']}} Schools</h2>
          <p class="lead">This is a description for the first slide.</p>
        </div>
      </div>
    </div>

    <!--/Third slide-->
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->
<!-- Page Content -->
<section class="py-5">
  <div class="row">
    @foreach($data['children'] as $child)
  <div class="col-md-4">
    <div class="card">
        <div class="card-header card-header-danger">
            <h4 class="card-title">{{$child['first_name']}}</h4>
            <p class="category">View your child data</p>
        </div>
        <div class="card-body">
          <h4 class="card-title"></h4>
          <h6 class="card-subtitle mb-2 text-muted">School Name</h6>
          <p class="card-text">{{$child['class_name']}}</p>
          <a href="{{ route('studentView', $child['id']) }}" class="card-link">View full details</a>
        </div>
    </div>
  </div>
  @endforeach
</div>
</section>
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
