@php
$CourseYearnavs=DB::table('course_years')->where('status',1)->orderBy('display_order','ASC')->get();
@endphp
<header>
  <div class="container-main">
    <nav class="navbar" style="position: relative;
    z-index: 12;">
      <a href="{{route('index')}}" class="navbar-logo"><img src="{{ asset('home/images/IGNOU DOST-ORG.png') }}" alt=""></a>
      <ul class="navbar-links ">
        <div class="dropdown course-drpdown">
          <a style="color: #8A8888; font-weight: 500;" class="nav-link drpdown-title-name dropdown-toggle " href="index.html" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">COURSES </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach($CourseYearnavs as $CourseYearnav)
            @php
            $Coursenavs=DB::table('courses')->where('course_year',$CourseYearnav->id)->where('status',1)->get();
            @endphp
            <li>
              <a class="dropdown-item" href="#">{{$CourseYearnav->course_year}} &raquo;</a>
              <ul class="dropdown-menu dropdown-submenu dropdown-submenu-two">
                <div class="tile-course-nav">
                  <div class="row">
                    @foreach($Coursenavs as $Coursenav)
                    @php
                    $colors = ['darkorange','darkblue', 'darkgreen', 'red', 'brown']; // Add more colors if needed
                    @endphp
                    <div class="col-lg-6 mb-3">
                      <a href="{{ $Coursenav->enroll_now}}" target="_blank">
                        <div class="main-tile">
                          <div class="course-tile"style="background-color: {{ $colors[$loop->index % count($colors)] }}">
                            <h3 class="tile-course-name">{{ $Coursenav->course_name}}</h3>
                            <h4 class="tile-course-name">{{$Coursenav->batch}}</h4>
                          </div>
                          <div class="tile-course-dv">
                            <h5 class="mb-0 tile-year">{{ $Coursenav->duration}}</h5>
                            <h5 class="mb-0 tile-unversity">{{ $Coursenav->university}}</h5>
                          </div>
                        </div>
                      </a>
                    </div>
                    @endforeach

                  </div>
                </div>
              </ul>
            </li>
            @endforeach
          </ul>
        </div>
        <li class="nav-item">
          <a class="nav-link {{'blog-page' == request()->path() ? 'active-nav' : '' }}" href="{{route('blogpage')}}">IGNOUPEDIA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{'free-trial' == request()->path() ? 'active-nav' : '' }}" href="{{route('landingpage')}}">FREE TRIAL</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{'join-community' == request()->path() ? 'active-nav' : '' }}" href="{{route('course')}}">JOIN COMMUNITY</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{'ignoutube' == request()->path() ? 'active-nav' : '' }}" href="{{route('ignoutube')}}">IGNOUTUBE </a>
          </li>
        <li class="nav-item">
          <a class="nav-link" target="_blank"  href="https://learn.ignoudost.com/login/">LOGIN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" target="_blank" href="https://learn.ignoudost.com/register/">SIGN UP</a>
        </li>
        <div class="menulogo d-md-block d-lg-none" onclick="toggleCartt()"><img src="/home/images/menu-line.png" alt=""></div>
      </ul>
    </nav>
  </div>
</header>
<!-- sidebar  -->
<div class="sidebar">
  <div class="navbar-sidebar">
    <ul>
      <li><a href="https://learn.ignoudost.com">Courses</a></li>
      <li><a class="{{'blogpage' == request()->path() ? 'active' : '' }}" href="{{route('blogpage')}}">IGNOUPedia</a></li>
      <li><a class="{{'landingpage' == request()->path() ? 'active' : '' }}" href="{{route('landingpage')}}">Free Trial</a></li>
      <li><a class="{{'courses' == request()->path() ? 'active' : '' }}" href="{{route('course')}}">Join Community</a></li>
      <li><a class="{{'ignoutube' == request()->path() ? 'active' : '' }}" href="{{route('ignoutube')}}">IGNOUTube</a></li>

      <li><a href="https://learn.ignoudost.com/login/" >Login</a></li>
      <li><a href="https://learn.ignoudost.com/register/">Sign Up</a></li>
    </ul>
  </div>
  <div class="d-inline closse" onclick="toggleCartt()"><i class="ri-close-circle-line"></i></div>
</div>
<!-- sidebar end  -->
