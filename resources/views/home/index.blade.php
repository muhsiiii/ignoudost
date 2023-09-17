@include('home.layouts.header')
@include('home.layouts.nav')
<!-- swipper slider home  -->
<div class="container-main">
    <swiper-container class="mySwiper" pagination="true" pagination-dynamic-bullets="true">
        @foreach ($banners as $banner)
            <swiper-slide><img class="" src="{{ asset('/Banner/' . $banner->banner) }}"
                    alt="First slide"></swiper-slide>
        @endforeach
    </swiper-container>
</div>
<!-- swipper slider home end -->
<div class="container-main mt-3 mb-4">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="main-btn-home">
                <a href="https://learn.ignoudost.com/" class="btn ignou-primary-bg btns-home"> EXPLORE OUR COURSES</a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="main-btn-home">
                <a href="#" data-toggle="modal" data-target="#loginModal" class="btn ignou-primary-bg btns-home">
                    TALK TO OUR ACADEMIC COUNSELORS</a>
            </div>
        </div>
    </div>
</div>
<!-- modal form course  -->
<div style="z-index: 1200;" class="modal fade modal-home" id="loginModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div style="background: #ffff;width: 100%;border-radius: 20px;margin: auto;"
            class="modal-content login-modal-home-p">
            <i class="ri-close-circle-line close" data-dismiss="modal" aria-label="Close"></i>
            <div class="modal-body modal-loginform pt-0">
                <h3 class="dunes-secondary-color text-center login-haeding">GET A FREE EXPERT CONSULTATION</h3>
                <form id="consultationsave">
                    <div class="form-group">
                        <input type="text" placeholder="Name" class="form-control" name="name" id="name"
                            aria-describedby="emailHelp">
                        <div class="nameerror" style="color: red;font-size: 14px;"></div>
                    </div>
                    <div class="form-group">
                        <input type="number" placeholder="Mobile Number" class="form-control" name="mobile"
                            id="mobile" aria-describedby="emailHelp">
                        <div class="mobileerror" style="color: red;font-size: 14px;"></div>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="qualification" name="qualification">
                            <option value="">Highest Educational Qualification*</option>
                            @foreach ($DropdownQualifications as $DropdownQualification)
                                <option value="{{ $DropdownQualification->content }}">
                                    {{ $DropdownQualification->content }}</option>
                            @endforeach

                        </select>
                        <div class="qualificationerror" style="color: red;font-size: 14px;"></div>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="course" name="course">
                            <option value="">Program (Course) Interested*</option>
                            @foreach ($DropdownsProgramorCourses as $DropdownsProgramorCourse)
                                <option value="{{ $DropdownsProgramorCourse->content }}">
                                    {{ $DropdownsProgramorCourse->content }}</option>
                            @endforeach
                        </select>
                        <div class="courseerror" style="color: red;font-size: 14px;"></div>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="reason" name="reason">
                            <option value="">Reason for Interest in Joining *</option>
                            @foreach ($DropdownsReasons as $DropdownsReason)
                                <option value="{{ $DropdownsReason->content }}">{{ $DropdownsReason->content }}</option>
                            @endforeach
                        </select>
                        <div class="reasonerror" style="color: red;font-size: 14px;"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" id="consultationsavebutton" data-target="#exampleModal11"
                                data-toggle="modal" data-dismiss="" class="btn ignou-primary-bg login-modal-btn"
                                onclick="formsave()">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- sign up modal  -->
<div style="z-index: 1200;" class="modal fade modal-home" id="loginModal1" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div style="background: #ffff;width: 100%;border-radius: 20px;margin: auto;"
            class="modal-content login-modal-home-p">
            <i class="ri-close-circle-line close" data-dismiss="modal" aria-label="Close"></i>
            <div class="modal-body modal-loginform pt-0">
                <h3 class="dunes-secondary-color text-center login-haeding">REGISTER HERE</h3>
                <form>
                    <div class="form-group">
                        <input type="text" placeholder="Name" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <input type="number" placeholder="Mobile Number" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <input type="number" placeholder="Email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <input type="number" placeholder="Password" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <input type="number" placeholder="Confirm Password" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="#" data-target="#exampleModal11" href="exampleModal11"
                                data-toggle="modal" data-dismiss="modal"
                                class="btn ignou-primary-bg login-modal-btn">REGISTER</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- login  -->
<div style="z-index: 1200;" class="modal fade modal-home" id="loginModal2" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div style="background: #ffff;width: 100%;border-radius: 20px;margin: auto;"
            class="modal-content login-modal-home-p">
            <i class="ri-close-circle-line close" data-dismiss="modal" aria-label="Close"></i>
            <div class="modal-body modal-loginform pt-0">
                <h3 class="dunes-secondary-color text-center login-haeding">WELCOME BACK</h3>
                <form>
                    <div class="form-group">
                        <input type="number" placeholder="Mobile Number" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <input type="number" placeholder="Email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <input type="number" placeholder="Enter Password" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="#" data-target="#exampleModal11" href="exampleModal11"
                                data-toggle="modal" data-dismiss="modal"
                                class="btn ignou-primary-bg login-modal-btn">LOGIN</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- sub btns  -->
<div class="container-main">
    <div class="row" style="justify-content: center;">
        @foreach ($Tests as $Test)
            <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                <div class="sub-btn-home text-center">
                    <span class="btn list-item-home ignou-primary-color"> <img class="icon-img-btn"
                            src="{{ $Test->icon }}" alt="">{{ $Test->title }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- courses tab btn section  -->
<div class="container-main">
    <div class="row align-items-center">
        <div class="col-lg-12">
            <h2 class="home-tabcourse-heading">Our Courses</h2>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-4 col-4 mb-2">
            <div class="courses-btns">

                <h3 class="course-name   ignou-primary-bg active-course-btn  mb-0" id="fbt"
                    style="cursor:pointer;text-align:center;" onclick="Department('{{ $first_dept->id }}')">
                    {{ $first_dept->departments }}</h3>
            </div>
        </div>
        @foreach ($Departments as $Department)
            <div class="col-lg-2 col-md-2 col-sm-4 col-4 mb-2">
                <div class="courses-btns">

                    <h3 class="course-name     mb-0" style="cursor:pointer;text-align:center;"
                        onclick="Department('{{ $Department->id }}')">{{ $Department->departments }}</h3>
                </div>
            </div>
        @endforeach

    </div>
</div>
<div class="container-main">
    <div class="row align-items-center" id="coursediv">
        <!-- course tile  -->
        @foreach ($first_course as $Course)
            <div id8="course-tab-content" class="col-lg-4 col-md-4 col-sm-6 mt-4">
                <div class="course-list">
                    <div class="course-img-dv">
                        <img class="course-img" src="{{ $Course->image }}" alt="">
                        <h5 class="postn-course-name  mb-0">{{ $Course->batch }}</h5>
                        <p class="mentor">Mentorship Included</p>
                    </div>
                    <div class="course-details">
                        <h2 class="course-name  tpl-fifty pt-top">{{ $Course->course_name }}</h2>
                        <h4 class="grey-text mb-2 course-year pl-fifty"> {{ $Course->batch }}</h4>
                        <h4 class="grey-text mb-2 pl-fifty">Duration: {{ $Course->duration }}</h4>
                        <h4 class="grey-text mb-3 pl-fifty">University: {{ $Course->university }}</h4>
                        <hr style="margin-bottom: 0px !important;">
                        <div class="course-navigate-btns">
                            <h3 class="timetable mb-0"><i style="vertical-align: middle;"
                                    class="ri-download-2-line"></i><a href="{{ $Course->time_table }}"
                                    download="">BROCHURE</a> </h3>
                            <h3 class="enroll mb-0"><a href="{{ $Course->enroll_now }}" target="_blank">ENROLL
                                    NOW</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="container-main mt-4">
    <div class="row align-items-center">
        <!-- course tile end -->
        <!-- why ignou dosth section  -->
        <div class="col-lg-12 mb-3">
            <h1 class="why-ignou-main-heading">Why choose IGNOU Dost?</h1>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-6">
            <div class="why-dosth">
                <img class="dosth-img" src="/home/images/Group 13435.png" alt="">
                <h3 class="text-center why-ignou-head mt-3">Led by IIT/IIM/ JNU/TISS Alumni</h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-6">
            <div class="why-dosth">
                <img class="dosth-img" src="/home/images/Group 13434.png" alt="">
                <h3 class="text-center why-ignou-head mt-3">Live & Recorded Video Lectures</h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-6">
            <div class="why-dosth">
                <img class="dosth-img" src="/home/images/Group 13433.png" alt="">
                <h3 class="text-center why-ignou-head mt-3">Dedicated Mentors</h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-6">
            <div class="why-dosth">
                <img class="dosth-img" src="/home/images/Group 13432.png" alt="">
                <h3 class="text-center why-ignou-head mt-3">Value Added Notes</h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-6">
            <div class="why-dosth">
                <img class="dosth-img" src="/home/images/Group 13441.png" alt="">
                <h3 class="text-center why-ignou-head mt-3">Exampedia</h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-6">
            <div class="why-dosth">
                <img class="dosth-img" src="/home/images/Group 13460.png" alt="">
                <h3 class="text-center why-ignou-head mt-3">Assignment Answer Guide Books</h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-6">
            <div class="why-dosth">
                <img class="dosth-img" src="/home/images/Group 13443.png" alt="">
                <h3 class="text-center why-ignou-head mt-3">Objective Tests</h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-6">
            <div class="why-dosth">
                <img class="dosth-img" src="/home/images/Group 13442.png" alt="">
                <h3 class="text-center why-ignou-head mt-3">Previous Year Question Papers Analysis</h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-6">
            <div class="why-dosth">
                <img class="dosth-img" src="/home/images/Group 13450.png" alt="">
                <h3 class="text-center why-ignou-head mt-3">Exam Special Guides</h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-6">
            <div class="why-dosth">
                <img class="dosth-img" src="/home/images/Group 13449.png" alt="">
                <h3 class="text-center why-ignou-head mt-3">Workbooks & Answer Files</h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-6">
            <div class="why-dosth">
                <img class="dosth-img" src="/home/images/Group 13451.png" alt="">
                <h3 class="text-center why-ignou-head mt-3">Mock Exams</h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-6">
            <div class="why-dosth">
                <img class="dosth-img" src="/home/images/Group 13452.png" alt="">
                <h3 class="text-center why-ignou-head mt-3">Personal & Social Development Programs</h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-6">
            <div class="why-dosth">
                <img class="dosth-img" src="/home/images/Group 13456.png" alt="">
                <h3 class="text-center why-ignou-head mt-3">Career Assessment & Guidance Services</h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-6">
            <div class="why-dosth">
                <img class="dosth-img" src="/home/images/Group 13455.png" alt="">
                <h3 class="text-center why-ignou-head mt-3">Upskilling Programs</h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-6">
            <div class="why-dosth">
                <img class="dosth-img" src="/home/images/Group 13454.png" alt="">
                <h3 class="text-center why-ignou-head mt-3">Job-Readiness Training</h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-6">
            <div class="why-dosth">
                <img class="dosth-img" src="/home/images/Group 13453.png" alt="">
                <h3 class="text-center why-ignou-head mt-3">Competitive Exam Preparation Support</h3>
            </div>
        </div>
    </div>
</div>
<!-- courses tab btn section  -->
<!-- details section  -->
<div class="container-main">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="reg-enrolment">
                <img class="reg-img" src="/home/images/enrolement.png" alt="">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="reg-enrolment">
                <div class="pink-border"></div>
                <h1 class="registertion-heading mb-3 mt-2">Registration & Enrollment</h1>
                <p class="registertion-sub-head grey-text">IGNOU Dost runs 56 batches through the year. Apart from
                    fresh students, registration is also open to those who have already taken admission with IGNOU. For
                    fresh students, we will assist with all the necessary admission procedures with IGNOU.
                <p>
                <p class="registertion-sub-head grey-text"> The program fee comprises of fees stipulated by IGNOU for
                    pursuing the degree, and fee for the IGNOU Dost Program. For students already registered with IGNOU
                    fee structure will only consist of the fee for the IGNOU Dost Program.</p>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="who-we-are who-we-are-main">
                <div class="pink-border"></div>
                <h1 class="mt-2 mb-4 who-we-are">Who we are</h1>
                <p class="who-we-are-descrptn grey-text">We are a team of passionate individuals educated from premier
                    institutes across India, who feel grateful for the educational and career opportunities we've got
                    and earnestly wish to create a platform that opens up such possibilities to anyone, regardless of
                    their socio-cultural backgrounds and previous academic track records! IGNOU Dost is an Online
                    Platform for Higher Education, that provides personalized learning support for pursuing UG and PG
                    degrees from reputed universities through a consistent Mentorship program, all through a mobile
                    application. Alongside learning, the program also takes care of the individuals' career needs
                    through individually tailored Career Coaching, Job-Readiness Training and industry relevant add-on
                    Up-Skilling programs.</p>
            </div>
        </div>
        <div class="col-lg-12 mt-4 mb-4">
            <img src="/home/images/D3 1.png" alt="">
        </div>
        <div class="col-lg-6 mb-4">
            <div class="about-ignou">
                <div class="pink-border"></div>
                <h1 class="why-ignou-heading mb-3 mt-3">About IGNOU</h1>
                <p class="why-ignou-subhead grey-text">For the present program, we have chosen IGNOU (Indira Gandhi
                    National Open University) as the Institute we enroll our students with for obtaining their degrees.
                    Along with registration with our learning program, the student enrolls with IGNOU as anyone would
                    normally do. The difference here being that IGNOU Dost will be supporting the student's learning
                    whilst pursuing their degree from IGNOU
                </p>
                <p class="learn-more" onclick="ShowStaticModal()">learn more <img
                        style="width: 30px;margin-left: 10px;" src="/home/images/arrow.png" alt=""> </p>
            </div>
        </div>

        <div class="col-lg-6 mt-2">
            <div class="about-ignou">
                <img class="why-ignou-img-main" src="/home/images/img1.jpg" alt="">
            </div>
        </div>
        <div class="col-lg-6 mt-5">
            <div class="about-ignou">
                <img class="why-ignou-img" src="{{ $academics->image }}" alt="">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="about-ignou dynamic-content">
                <div class="pink-border"></div>
                <h1 class="academic-headingmt-2 mb-0 mt-3">{{ $academics->title }}</h1>
                <!-- <h1 class="academic-heading"></h1> -->
                <p class="acadamic-subhead academic-main-sub-head grey-text">{!! Str::limit($academics->description, 394) !!}</p>
                <p class="acadamic-subhead grey-text mb-0">Warm regards,</p>
                <p class="acadamic-subhead grey-text mb-0"> {{ $academics->name }}</p>
                <p class="acadamic-subhead grey-text mb-3">{{ $academics->position }}</p>

                <p class="learn-more" style="color: #272B73" onclick="ShowModal()">learn more <img
                        style="width: 30px;margin-left: 10px;" src="/home/images/arrow.png" alt=""> </small>
            </div>
        </div>
    </div>
</div>
<!-- slider clients  -->
<!-- slider  -->
<div class="container-main slider-logos mt-4">
    <div class="row">
        <div class="col-lg-12 mt-4 mb-4">
            <div class="slider-home">
                <h2 class="slider-head">Brought to you by people from</h2>
            </div>
        </div>
    </div>
    <div class="custom-slider mb-4 mt-2">
        <div class="custom-box">
            <img class="logo-sliders" src="/home/images/IIT Kharkpur.png" alt="">
        </div>
        <div class="custom-box">
            <img class="logo-sliders" src="/home/images/IIT_Madras_Logo.png" alt="">
        </div>
        <div class="custom-box">
            <img class="logo-sliders" src="/home/images/University_of_Delhi.png" alt="">
        </div>
        <div class="custom-box">
            <img class="logo-sliders" src="/home/images/University_of_Hyderabad_Logo.png" alt="">
        </div>
        <div class="custom-box">
            <img class="logo-sliders" src="/home/images/JNU.png" alt="">
        </div>
        <div class="custom-box">
            <img class="logo-sliders" src="/home/images/IIT Hyderabad Logo_Final Design.png" alt="">
        </div>
        <div class="custom-box">
            <img class="logo-sliders" src="/home/images/1280px-TUe_Logo.png" alt="">
        </div>
    </div>
</div>
<!-- details section end  -->
<!-- help section and form section starts -->
<div class="container-main">
    <div class="row align-items-start">
        <div class="col-lg-12 ">
            <div class="slider-home">
                <h2 class="form-head pb-4">We Help You Choose The Right Degree/PG Programs to Fit your Career & Life
                </h2>
            </div>
        </div>
        <div class="col-lg-6 mt-4">
            <div class="row-main-help">
                <div class="help-colmn mt-2">
                    <img class="help-img hlp-img-one" src="/home/images/20944810 [Converted] 1.png" alt="help-img">
                    <h3 class="help-main-head">Select Your Desired course</h3>
                    <p class="grey-text help-sub-head mb-0">Trust our Admission Executives & Counsellors to help you
                        select the ideal IGNOU undergrad or postgrad program to meet your aspirations & goals.</p>
                </div>
                <div class="help-colmn mt-2">
                    <img class="help-img hlp-img-two" src="/home/images/tourist_va_03 [Converted] [Recovered] 1.png"
                        alt="help-img">
                    <h3 class="help-main-head">Fill In the Basic Details</h3>
                    <p class="grey-text help-sub-head mb-0">Fill out the admission form to help us understand your
                        educational history & qualifications, enabling us to better address your needs.
                    </p>
                </div>
            </div>
            <div class="row-main-help">
                <div class="help-colmn bottom-space bottom-help-colmn mt-2">
                    <img class="help-img hlp-img-three" src="/home/images/tourist_va_03 [Converted] [Recovered] 2.png"
                        alt="help-img">
                    <h3 class="help-main-head">Ensuring IGNOU Admission</h3>
                    <p class="grey-text help-sub-head mb-0">Already secured IGNOU admission? Great! If not, our
                        dedicated admissions team is here to streamline your admission process.
                    </p>
                </div>
                <div class="help-colmn bottom-space bottom-help-colmn mt-2">
                    <img class="help-img hlp-img-four" src="/home/images/5374794 1.png" alt="help-img">
                    <h3 class="help-main-head">Onboarding & Orientation</h3>
                    <p class="grey-text help-sub-head mb-0">Worried about a study break? Our mentors will assess your
                        academics during onboarding & guide you with our unique orientation program.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mt-4">
            <div class="form-box" style="margin-top: 10px !important;">
                <h3 class="mb-3 mt-3 apply-now-txt text-center">Apply Now</h3>
                <h3 class="text-center later-text mb-3 never-later-min">Later = Never!</h3>
                <h4 class="text-center mb-5 fil-text-sub">Fill out this form & Let us call you to give relevent course
                    details</h4>
                <form id="consultationsave">
                    <div class="form-group">
                        <input type="text" class="form-control" id="2name" name="2name"
                            placeholder="Name*">
                        <div class="2nameerror" style="color: red;font-size: 14px;"></div>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="2mobile" name="2mobile"
                            placeholder="Mobile Number*">
                        <div class="2mobileerror" style="color: red;font-size: 14px;"></div>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="2qualification" name="2qualification">
                            <option value="">Highest Educational Qualification *</option>
                            @foreach ($DropdownQualifications as $DropdownQualification)
                                <option value="{{ $DropdownQualification->content }}">
                                    {{ $DropdownQualification->content }}</option>
                            @endforeach
                        </select>
                        <div class="2qualificationerror" style="color: red;font-size: 14px;"></div>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="2course" name="2course">
                            <option value="">Program (Course) Interested*</option>
                            @foreach ($DropdownsProgramorCourses as $DropdownsProgramorCourse)
                                <option value="{{ $DropdownsProgramorCourse->content }}">
                                    {{ $DropdownsProgramorCourse->content }}</option>
                            @endforeach
                        </select>
                        <div class="2courseerror" style="color: red;font-size: 14px;"></div>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="2reason" name="2reason">
                            <option value="">Reason for Interest in Joining *</option>
                            @foreach ($DropdownsReasons as $DropdownsReason)
                                <option value="{{ $DropdownsReason->content }}">{{ $DropdownsReason->content }}
                                </option>
                            @endforeach
                        </select>
                        <div class="2reasonerror" style="color: red;font-size: 14px;"></div>
                    </div>
                    <button class="btn ignou-primary-bg btn-submit-home" type="button"
                        onclick="SecondFormSave()">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container-main">
    <div class="col-lg-12 mt- mb-4">
        <div class="slider-home">
            <h2 class="form-head text-blue-form learner-txt">Learner Testimonials <br> <span>What our learners have to
                    say</span> </h2>
        </div>
    </div>
    <div class="slider">
        @foreach ($Testimonials as $Testimonial)
            <div class="item" data-toggle="modal" data-target="#exampleModalCenter{{ $Testimonial->id }}">
                <div class="slide-box">
                    <i class="ri-double-quotes-l quatotion"></i>
                    <h4 class="testimonial-user">{{ $Testimonial->user_name }}</h4>
                    <h4 class="user-university">{{ $Testimonial->user_university }}</h4>
                    <h4 class="testimonial-content">{{ $Testimonial->user_content }}</h4>
                </div>
            </div>
        @endforeach
    </div>
</div>
@foreach ($Testimonials as $Testimonial)
    <div class="modal fade" id="exampleModalCenter{{ $Testimonial->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-testimonial-comments" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- <h4 class="testimonial-user pb-1">{{ $Testimonial->user_name }}</h4> -->
                    <!-- <h4 class="user-university pb-2">{{ $Testimonial->user_university }}</h4> -->
                    <h4 class="testimonial-contenttt" style="line-height: 1.4;font-weight:400;">
                        {{ $Testimonial->user_content }}</h4>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!-- ignou youtube section  -->
<div class="container-main mt-4">
    <div class="ignoutube"
        style="background-image: url(/home/images/bg-ignoutube.png);background-repeat: no-repeat;background-size: 100% auto;background-position: center;background-repeat: no-repeat;background-size: cover;">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="main-head-ignoutube">IGNOUTube</h2>
            </div>
            @foreach ($IgnouTubes as $IgnouTube)
                <div class="col-lg-4">
                    <div class="inner-ignoutube">
                        {!! $IgnouTube->embeded_url !!}
                        <h3 class="ignoutube-head pt-2">{{ $IgnouTube->title }}</h3>
                        <h4 class="ignoutube-sub-head">{{ $IgnouTube->name }}</h4>
                    </div>
                </div>
            @endforeach
            <div class="col-lg-12">
                <div class="btn-see-more">
                    <a href="{{ route('ignoutube') }}" class="btn see-more-btns">see more</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ignou youtube section end -->
<!-- faq section starts  -->
<div class="container-main faq-sectn">
    <div class="row">
        <div class="col-lg-12 mt-4 mb-4">
            <h1 class="faq-main-head-home">Frequently Asked Questions (FAQs)</h1>
        </div>
        <div class="col-lg-12 mb-2">
            <div id="accordion" class="mb-3">
                @foreach ($FAQs as $key => $FAQ)
                    <div class="card{{ $key >= 5 ? ' hidden' : '' }} mb-3">
                        <div class="card-header" id="heading{{ $FAQ->id }}">
                            <h3 class="mb-0 faq-qstn-head" data-toggle="collapse"
                                data-target="#collapse{{ $FAQ->id }}" aria-expanded="true"
                                aria-controls="collapse{{ $FAQ->id }}">{{ $FAQ->title }}</h3>
                            <i class="ri-arrow-down-s-line faq-arrow"></i>
                        </div>
                        <div id="collapse{{ $FAQ->id }}" class="collapse"
                            aria-labelledby="heading{{ $FAQ->id }}" data-parent="#accordion">
                            <div class="card-body">
                                <h4 class="faq-answr-head vl">{{ $FAQ->description }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-12 mt-2">
            <div class="view-all-btn-home">
                <a href="#" class="view-all-btn">View all <i style="vertical-align: middle;"
                        class="ri-arrow-down-s-line"></i></a>
            </div>
        </div>
    </div>
</div>

<div class="container-main">
    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="counsil-div">
                <div class="counsil-div-half-lft">
                    <img src="/home/images/Rectangle 16.png" alt="">
                </div>
                <div class="counsil-div-half-rgt">
                    <h1 class="counsil-main-head">One to One Counselling</h1>
                    <p class="counsil-sub-head">Schedule your Chat, Call or Video, your comfort is our priority. Choose
                        a suitable mode to get counselled by our team.</p>
                    <div class="btns-consil">
                        <a href="tel:7594939297" class="talk-btn"> <img class="call-img"
                                src="/home/images/Call 1.png" alt=""> Talk to an IGNOU Expert</a>
                        <a href=" https://wa.me/+917594939297" target="_blank" class="talk-btn ml-4"> <img
                                class="call-img" src="/home/images/Call 1.png" alt=""> Send WhatsApp
                            Message</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- counsil section end  -->
<!-- download section  -->
<div class="container-main mb-5 mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="download-now" data-toggle="modal" data-target="#loginModal-downloaad">
                <div class="download-main-div">
                    <h1 class="download-main-head">Download Now</h1>
                    <p class="download-sub-head">Take the first step towards your future by downloading the app now and
                        unlocking endless opportunities for personal and professional growth</p>
                </div>
                <img class="download-img" src="/home/images/Screen Contents.png" alt="">
                <div class="download-main-div-rgt">
                    <img class="star-icon" src="/home/images/star.png" alt="">
                    <h4 class="grey-text review-nmbr mt-2 mb-3"> <span style="color: black;font-weight: 600;">5/5
                            -</span> 361 REVIEWS</h4>
                    <h6 class="btn downld-btn-home ignou-primary-bg">DOWNLOAD NOW</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal form course  -->
<div style="z-index: 1200;" class="modal fade modal-home " id="about" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div style="background: #ffff;width: 100%;border-radius: 20px;margin: auto;"
            class="modal-content modal-popup-about-dv">
            <i class="ri-close-circle-line close"
                style="font-size: 30px;margin-top: 9px;margin-bottom: 10px;margin-right: 7px;" data-dismiss="modal"
                aria-label="Close"></i>
            <div class="modal-body modal-loginform pt-0">
                <div class="container-main">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="about-dv-modal">
                                <p class="about-ignou-sub-head" style="text-align: justify" id="desc">
                                    {!! $academics->description !!}</p>
                                <p class="acadamic-subhead grey-text mb-0">Warm regards,</p>
                                <p class="acadamic-subhead grey-text mb-0"> {{ $academics->name }}</p>
                                <p class="acadamic-subhead grey-text mb-3">{{ $academics->position }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- modal for statis --}}
<div style="z-index: 1200;" class="modal fade modal-home " id="static-modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div style="background: #ffff;width: 100%;border-radius: 20px;margin: auto;"
            class="modal-content modal-popup-about-dv">
            <i class="ri-close-circle-line close"
                style="font-size: 30px;margin-top: 9px;margin-bottom: 10px;margin-right: 7px;" data-dismiss="modal"
                aria-label="Close"></i>
            <div class="modal-body modal-loginform pt-0">
                <div class="container-main">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="about-dv-modal">
                                <p class="about-ignou-sub-head" style="text-align: justify" id="desc">For the
                                    present program, we have chosen IGNOU (Indira Gandhi National Open University) as
                                    the Institute we enroll our students with for obtaining their degrees. Along with
                                    registration with our learning program, the student enrolls with IGNOU as anyone
                                    would normally do. The difference here being that IGNOU Dost will be supporting the
                                    student's learning whilst pursuing their degree from IGNOU.</p>
                                <p class="about-ignou-sub-head" style="text-align: justify" id="desc">The Indira
                                    Gandhi National Open University is the world’s largest University imparting
                                    education through open and distance mode. Established in 1985, IGNOU is an
                                    internationally awarded Central University which aims to provide quality higher
                                    education opportunities to all segments of the society. It is a University that
                                    constantly strives to raise the standards of distance education and actively
                                    researches best practices in open education. Currently, it has 21 schools of
                                    studies, 67 regional centers, 3500 study centres, 12 overseas study centers, and
                                    offers 200+ programs, ranging from certificate courses, diplomas, bachelors, masters
                                    to doctoral programs.</p>
                                <p class="about-ignou-sub-head" style="text-align: justify" id="desc">Every
                                    student enrolled with IGNOU will be assigned a Study Center, usually nearest to
                                    their place of residence. This Study Center will be the contact point for all the
                                    IGNOU coursework requirements including the practical or tutorials, submission of
                                    assignments, reports or record-books, and academic counselling sessions. </p>
                                <p class="about-ignou-sub-head" style="text-align: justify" id="desc">In
                                    registering with IGNOU Dost, over and above engaging with our learning platform, a
                                    student will have to complete the coursework requirements and connect with IGNOU
                                    their Regional and Study Centers in all stages and for all procedures that IGNOU
                                    mandates. What we will do is help you complete these requirements and enable you to
                                    finish the IGNOU coursework with as much ease as possible. </p>
                                <p class="about-ignou-sub-head" style="text-align: justify" id="desc">We will
                                    also assist you with the IGNOU admission process, which we will initiate along with
                                    your registration process with IGNOU Dost. At the outset we wish to make it clear
                                    that IGNOU Dost does not "collaborate" or "associate" with IGNOU but we merely
                                    provide academic support, as well as career development services, for students who
                                    will essentially be pursuing degrees offered by IGNOU.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="call-btn-mobile">
    <div class="half-btn">
        <a href="tel:7594939297">
            <h5 class="call-now mb-0"><i class="ri-phone-fill"></i> Call Now</h5>
        </a>
    </div>
    <div class="half-btn">
        <a href="https://wa.me/+917594939297">
            <h5 class="whtspp-now mb-0"><i class="ri-whatsapp-fill"></i>WhatsApp</h5>
        </a>
    </div>
</div>
<!-- modal form course  -->
<div style="z-index: 1200;" class="modal fade modal-home" id="loginModal-downloaad" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div style="background: #ffff;width: 100%;border-radius: 20px;margin: auto;"
            class="modal-content login-modal-home-p">
            <i class="ri-close-circle-line close" style="font-size: 30px;margin-top: -7px;margin-bottom: 10px;"
                data-dismiss="modal" aria-label="Close"></i>
            <div class="modal-body modal-loginform pt-0">
                <div class="container-main">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="https://play.google.com/store/apps/details?id=com.ignoudost.learn"
                                target="_blank"><img class="icon-store"
                                    src="/home/images/png-transparent-google-play-logo-google-play-android-app-store-play-now-button-text-label-logo 1.png"
                                    alt=""></a>
                        </div>
                        <div class="col-lg-6">
                            <a href="https://apps.apple.com/app/id1665031621" target="_blank"><img class="icon-store"
                                    src="/home/images/download (2) 1.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('home.layouts.footer')
@include('admin.layouts.messages')
<script>
    $('.custom-slider').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        dots: true,
        infinite: false,
        responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 900,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1,

                }
            },
            {
                breakpoint: 550,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            }
        ]
    });

    function ShowModal() {
        // alert(val);


        $('#about').modal('show');


    }


    function ShowStaticModal() {
        $('#static-modal').modal('show');
    }




    function formsave() {

        var name = $('input#name').val();
        var mobile = $('input#mobile').val();
        var qualification = $('#qualification option:selected').val();
        var course = $('#course option:selected').val();
        var reason = $('#reason option:selected').val();


        if (name == '') {
            $('#name').focus();
            $('#name').css({
                'border': '1px solid red'
            });
            $('.nameerror').show();
            $('.nameerror').text("enter your name*");
            return false;
        } else

            $('#name').css({
                'border': '1px solid #CCC'
            });
        $('.nameerror').hide();


        if (mobile == '') {
            $('#mobile').focus();
            $('#mobile').css('border', '1px solid red');
            $('.mobileerror').show().css('color', 'red').text("Enter Mobile Number*");
            return false;
        } else {
            $('#mobile').css('border', '1px solid #CCC');
            $('.mobileerror').hide();
        }

        var mobileRegex = /^[0-9]{10}$/;
        if (!mobileRegex.test(mobile)) {
            $('#mobile').focus();
            $('#mobile').css('border', '1px solid red');
            $('.mobileerror').show().css('color', 'red').text("Enter a valid mobile number*");
            return false;
        } else {
            $('#mobile').css('border', '1px solid #CCC');
            $('.mobileerror').hide();
        }

        if (qualification == '') {
            $('#qualification').focus();
            $('#qualification').css({
                'border': '1px solid red'
            });
            $('.qualificationerror').show();
            $('.qualificationerror').text("choose anyone*");
            return false;
        } else

            $('#qualification').css({
                'border': '1px solid #CCC'
            });

        $('.qualificationerror').hide();

        if (course == '') {
            $('#course').focus();
            $('#course').css({
                'border': '1px solid red'
            });
            $('.courseerror').show();
            $('.courseerror').text("choose anyone*");
            return false;
        } else

            $('#course').css({
                'border': '1px solid #CCC'
            });

        $('.courseerror').hide();

        if (reason == '') {
            $('#reason').focus();
            $('#reason').css({
                'border': '1px solid red'
            });
            $('.reasonerror').show();
            $('.reasonerror').text("choose anyone*");
            return false;
        } else

            $('#reason').css({
                'border': '1px solid #CCC'
            });

        $('.reasonerror').hide();


        data = new FormData();

        data.append('name', name);
        data.append('mobile', mobile);
        data.append('qualification', qualification);
        data.append('course', course);
        data.append('reason', reason);

        data.append('_token', '{{ csrf_token() }}');
        $.ajax({

            type: "POST",
            url: "/consultation-save",
            data: data,
            dataType: "json",
            contentType: false,
            //cache: false,
            processData: false,

            success: function(data) {
                if (data['success']) {
                    Toastify({
                        text: "Submitted Successfully",
                        duration: 3000,
                        newWindow: true,
                        // close: true,
                        gravity: "top", // `top` or `bottom`
                        position: "right", // `left`, `center` or `right`
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                        style: {
                            background: "linear-gradient(to right, #12a00f, #12a00f)",
                        },
                        callback: function() {
                            // alert("sss");
                            window.location.href = window.location.href
                        },
                    }).showToast();
                } else {
                    Toastify({
                        text: "Some Thing Went Wrong",
                        duration: 3000,
                        newWindow: true,
                        // close: true,
                        gravity: "top", // `top` or `bottom`
                        position: "right", // `left`, `center` or `right`
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                        style: {
                            background: "linear-gradient(to right, red, red)",
                        },
                        callback: function() {
                            // alert("sss");
                            window.location.href = window.location.href
                        },
                    }).showToast();
                }
            }
        })
    }

    function SecondFormSave() {

        var name = $('input#2name').val();
        var mobileNumber = $('input#2mobile').val();
        var qualification = $('#2qualification option:selected').val();
        var course = $('#2course option:selected').val();
        var reason = $('#2reason option:selected').val();


        if (name == '') {
            $('#2name').focus();
            $('#2name').css({
                'border': '1px solid red'
            });
            $('.2nameerror').show();
            $('.2nameerror').text("enter your name*");
            return false;
        } else

            $('#2name').css({
                'border': '1px solid #CCC'
            });
        $('.2nameerror').hide();




        if (mobileNumber == '') {
            $('#2mobile').focus();
            $('#2mobile').css('border', '1px solid red');
            $('.2mobileerror').show().css('color', 'red').text("Enter Mobile Number*");
            return false;
        } else {
            $('#2mobile').css('border', '1px solid #CCC');
            $('.2mobileerror').hide();
        }

        var mobileRegex = /^[0-9]{10}$/;
        if (!mobileRegex.test(mobileNumber)) {
            $('#2mobile').focus();
            $('#2mobile').css('border', '1px solid red');
            $('.2mobileerror').show().css('color', 'red').text("Enter a valid mobile number*");
            return false;
        } else {
            $('#2mobile').css('border', '1px solid #CCC');
            $('.2mobileerror').hide();
        }



        if (qualification == '') {
            $('#2qualification').focus();
            $('#2qualification').css({
                'border': '1px solid red'
            });
            $('.2qualificationerror').show();
            $('.2qualificationerror').text("choose anyone*");
            return false;
        } else

            $('#2qualification').css({
                'border': '1px solid #CCC'
            });

        $('.2qualificationerror').hide();

        if (course == '') {
            $('#2course').focus();
            $('#2course').css({
                'border': '1px solid red'
            });
            $('.2courseerror').show();
            $('.2courseerror').text("choose anyone*");
            return false;
        } else

            $('#2course').css({
                'border': '1px solid #CCC'
            });

        $('.2courseerror').hide();

        if (reason == '') {
            $('#2reason').focus();
            $('#2reason').css({
                'border': '1px solid red'
            });
            $('.2reasonerror').show();
            $('.2reasonerror').text("choose anyone*");
            return false;
        } else

            $('#2reason').css({
                'border': '1px solid #CCC'
            });

        $('.2reasonerror').hide();


        data = new FormData();

        data.append('name', name);
        data.append('mobile', mobileNumber);
        data.append('qualification', qualification);
        data.append('course', course);
        data.append('reason', reason);

        data.append('_token', '{{ csrf_token() }}');
        $.ajax({

            type: "POST",
            url: "/consultation-save",
            data: data,
            dataType: "json",
            contentType: false,
            //cache: false,
            processData: false,

            success: function(data) {
                if (data['success']) {
                    Toastify({
                        text: "Submitted Successfully",
                        duration: 3000,
                        newWindow: true,
                        // close: true,
                        gravity: "top", // `top` or `bottom`
                        position: "right", // `left`, `center` or `right`
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                        style: {
                            background: "linear-gradient(to right, #12a00f, #12a00f)",
                        },
                        callback: function() {
                            // alert("sss");
                            window.location.href = window.location.href
                        },
                    }).showToast();
                } else {
                    Toastify({
                        text: "Some Thing Went Wrong",
                        duration: 3000,
                        newWindow: true,
                        // close: true,
                        gravity: "top", // `top` or `bottom`
                        position: "right", // `left`, `center` or `right`
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                        style: {
                            background: "linear-gradient(to right, red, red)",
                        },
                        callback: function() {
                            // alert("sss");
                            window.location.href = window.location.href
                        },
                    }).showToast();
                }
            }
        })
    }


    $('.course-name').click(function() {

        // Remove 'active' class from all buttons
        $('.course-name').removeClass('ignou-primary-bg active-course-btn');

        // Add 'active' class to the clicked button
        $(this).addClass('ignou-primary-bg active-course-btn');
    });


    function Department(val) {


        $.post("/get-course", {
            Department_id: val,
            _token: "{{ csrf_token() }}"
        }, function(result) {

            $('#coursediv').html(result);
        });
    }

    $(document).ready(function() {
        var maxVisible = 5; // Set the maximum number of visible FAQs
        var $cards = $('.card');
        var $viewAllBtn = $('.view-all-btn');

        // Hide FAQs beyond the maximum visible count
        $cards.slice(maxVisible).hide();

        $viewAllBtn.on('click', function(e) {
            e.preventDefault();
            var $hiddenCards = $cards.filter(':hidden');

            $hiddenCards.toggle(); // Toggle visibility of hidden FAQs

            if ($hiddenCards.length > 0) {
                $viewAllBtn.text('View less');
            } else {
                $cards.slice(maxVisible).hide();
                $viewAllBtn.text('View all');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".slider").slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            speed: 500,
            autoplaySpeed: 3000,
            infinite: true,
            autoplay: true,
            centerMode: true,
            centerPadding: "0",
            arrows: false,
            responsive: [{
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });

    });
</script>
