<body class="hold-transition sidebar-mini layout-fixed">
    <style>
        .dost {
            color: #C4A2FC !important;
        }

        .ignou {
            color: #151A6A;
        }
    </style>

    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light nav-compact">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        &nbsp;SuperAdmin
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">
                        <i class="fas fa-sign-out-alt"></i> &nbsp;Logout
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ route('home') }}" class="brand-link">
                <img src="{{ asset('home/images/logo-only.png') }}" alt="Logo"
                    class="brand-image img-circle " style="opacity:1; width:36px;">
                <span class="brand-text ignou"><b>IGNOU<span class="dost">DOST</span></b></span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview"
                        role="menu" data-accordion="false">

                        <li class="nav-item has-treeview">
                            <a href="{{ route('home') }}"
                                class="nav-link {{ 'admin-home' == request()->path() ? 'active' : '' }} ">
                                <i class="ri-home-2-fill"></i>
                                <p><b>Dashboard</b></p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('banner') }}"
                                class="nav-link {{ in_array(request()->path(), ['baner', 'add-banner']) ? 'active' : '' }}">
                                <i class="ri-image-fill"></i>
                                <p><b>Banner</b></p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('department') }}"
                                class="nav-link {{ in_array(request()->path(), ['departments', 'add-departments']) || preg_match('/departments-edit\/\d+/', request()->url()) ? 'active' : '' }}">
                                <i class="ri-file-copy-line"></i>
                                <p><b>Departments</b></p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('courseyearlist') }}"
                                class="nav-link {{ in_array(request()->path(), ['course-year-list','course-year-add']) || preg_match('/course-year-edit\/\d+/', request()->url()) ? 'active' : '' }}">
                                <i class="ri-time-fill"></i>
                                <p><b>Course Year</b></p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('coursetable') }}"
                                class="nav-link {{ in_array(request()->path(), ['course', 'add-course']) || preg_match('/course-edit\/\d+/', request()->url()) ? 'active' : '' }}">
                                <i class="ri-git-repository-line"></i>
                                <p><b>Course</b></p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('freeresource') }}"
                                class="nav-link {{ in_array(request()->path(), ['free-resource']) || preg_match('/free-resource-edit\/\d+/', request()->url()) || preg_match('/sub-folders-sub\/\d+/', request()->url()) || preg_match('/sub-folders-sub-edit\/\d+/', request()->url()) || preg_match('/sub-folders-filelist\/\d+/', request()->url()) || preg_match('/sub-folders-file-edit\/\d+/', request()->url()) ? 'active' : '' }}">
                                <i class="ri-folder-2-fill"></i>
                                <p><b>Free Resource</b></p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('ignouplaylist') }}"
                                class="nav-link {{ in_array(request()->path(), ['ignou-playlist']) ? 'active' : '' }}">
                                <i class="ri-live-fill"></i>
                                <p><b>Ignou Playlist</b></p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('ignoutubelist') }}"
                                class="nav-link {{ in_array(request()->path(), ['ignoutube-list', 'ignoutube-add']) || preg_match('/ignoutube-edit\/\d+/', request()->url()) ? 'active' : '' }}">
                                <i class="ri-youtube-fill"></i>
                                <p><b>Ignoutube</b></p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('whatsapplist') }}"
                                class="nav-link {{ in_array(request()->path(), ['whatsapp-list', 'whatsapp-add']) || preg_match('/whatsapp-edit\/\d+/', request()->url()) ? 'active' : '' }}">
                                <i class="ri-whatsapp-fill"></i>
                                <p><b>Whatsapp</b></p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('consultation') }}"
                                class="nav-link {{ 'consultation' == request()->path() ? 'active' : '' }}">
                                <i class="ri-file-list-3-fill"></i>
                                <p><b>Consultation</b></p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('academics') }}"
                                class="nav-link {{ in_array(request()->path(), ['academics', 'add-academics']) ? 'active' : '' }}">
                                <i class="ri-book-3-fill"></i>
                                <p><b>Academic</b></p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('blogcatlist') }}"
                                class="nav-link {{ in_array(request()->path(), ['blog-category-list', '']) ? 'active' : '' }}">
                                <i class="ri-bar-chart-fill"></i>
                                <p><b>Blog Category</b></p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('blog') }}"
                                class="nav-link {{ in_array(request()->path(), ['blog-table', 'add-blog']) || preg_match('/blog-edit\/\d+/', request()->url()) ? 'active' : '' }}">
                                <i class="ri-bar-chart-horizontal-fill"></i>
                                <p><b>Blog</b></p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('learnerslist') }}"
                                class="nav-link {{ in_array(request()->path(), ['learnerslist', ''])  ? 'active' : '' }}">
                                <i class="ri-bank-fill"></i>
                                <p><b>Learners</b></p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('dropdownlist') }}"
                                class="nav-link {{ in_array(request()->path(), ['dropdownslist', ''])? 'active' : '' }}">
                                <i class="ri-arrow-down-circle-fill"></i>
                                <p><b>Forms Drpdowns</b></p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('comments') }}"
                                class="nav-link {{ 'comments' == request()->path() ? 'active' : '' }}">
                                <i class="ri-chat-1-fill"></i>
                                <p><b>Comments</b></p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('testimoniallist') }}"
                                class="nav-link {{ in_array(request()->path(), ['testimonial-list', 'testimonial-add']) || preg_match('/testimonial-edit\/\d+/', request()->url()) ? 'active' : '' }}">
                                <i class="ri-user-voice-fill"></i>
                                <p><b>Testimonial</b></p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('faq') }}"
                                class="nav-link {{ in_array(request()->path(), ['faq', 'add-faq']) || preg_match('/faq-edit\/\d+/', request()->url()) ? 'active' : '' }}">
                                <i class="ri-questionnaire-fill"></i>
                                <p><b>FAQ</b></p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link {{ 'password-change' == request()->path() ? 'active' : '' }}">
                                <i class="ri-settings-5-fill"></i>
                                <p><b>Settings</b><i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('passwordchange') }}" class="nav-link  ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="fs-15">Change Password</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('logout') }}" class="nav-link  ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="fs-15">Logout</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
