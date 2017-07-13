<!DOCTYPE html>
<html lang="ar" class="rtl" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="admin-themes-lab">
    <meta name="author" content="themes-lab">
    <link rel="shortcut icon" href="{{ url('/') }}/assets/backend/images/favicon.png" type="image/png">
    <title>{{ Config::get('app.name') . ' - ' }} {{ isset($page) ? $page['title'] : 'dashboard' }}</title>
    <link href="{{ url('/') }}/assets/backend/css/style.css" rel="stylesheet">
    <link href="{{ url('/') }}/assets/backend/plugins/sweetalert-master/dist/sweetalert.css" rel="stylesheet">
    <link href="{{ url('/') }}/assets/backend/plugins/datatables/dataTables.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/assets/backend/css/theme.css" rel="stylesheet">
    <link href="{{ url('/') }}/assets/backend/css/ui.css" rel="stylesheet">
    <link href="{{ url('/') }}/assets/backend/css/rtl.css" rel="stylesheet">
    <link href="{{ url('/') }}/assets/backend/css/custom.css" rel="stylesheet">

    @yield('header')

    <script src="{{ url('/') }}/assets/backend/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <!-- LAYOUT: Apply "submenu-hover" class to body element to have sidebar submenu show on mouse hover -->
  <!-- LAYOUT: Apply "sidebar-collapsed" class to body element to have collapsed sidebar -->
  <!-- LAYOUT: Apply "sidebar-top" class to body element to have sidebar on top of the page -->
  <!-- LAYOUT: Apply "sidebar-hover" class to body element to show sidebar only when your mouse is on left / right corner -->
  <!-- LAYOUT: Apply "submenu-hover" class to body element to show sidebar submenu on mouse hover -->
  <!-- LAYOUT: Apply "fixed-sidebar" class to body to have fixed sidebar -->
  <!-- LAYOUT: Apply "fixed-topbar" class to body to have fixed topbar -->
  <!-- LAYOUT: Apply "rtl" class to body to put the sidebar on the right side -->
  <!-- LAYOUT: Apply "boxed" class to body to have your page with 1200px max width -->

  <!-- THEME STYLE: Apply "theme-sdtl" for Sidebar Dark / Topbar Light -->
  <!-- THEME STYLE: Apply  "theme sdtd" for Sidebar Dark / Topbar Dark -->
  <!-- THEME STYLE: Apply "theme sltd" for Sidebar Light / Topbar Dark -->
  <!-- THEME STYLE: Apply "theme sltl" for Sidebar Light / Topbar Light -->
  
  <!-- THEME COLOR: Apply "color-default" for dark color: #2B2E33 -->
  <!-- THEME COLOR: Apply "color-primary" for primary color: #319DB5 -->
  <!-- THEME COLOR: Apply "color-red" for red color: #C9625F -->
  <!-- THEME COLOR: Apply "color-green" for green color: #18A689 -->
  <!-- THEME COLOR: Apply "color-orange" for orange color: #B66D39 -->
  <!-- THEME COLOR: Apply "color-purple" for purple color: #6E62B5 -->
  <!-- THEME COLOR: Apply "color-blue" for blue color: #4A89DC -->
  <!-- BEGIN BODY -->
  <body class="fixed-topbar fixed-sidebar theme-sdtl color-default">
    <!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <section>
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar">
        <div class="logopanel">
          <h1>
            <a href="dashboard.html"></a>
          </h1>
        </div>
        <div class="sidebar-inner">
          <div class="sidebar-top">
            <!-- <form action="search-result.html" method="post" class="searchform" id="search-results">
              <input type="text" class="form-control" name="keyword" placeholder="Search...">
            </form> -->
            <div class="userlogged clearfix">
              <i class="icon icons-faces-users-01"></i>
              <div class="user-details">
                <h4>{{ Auth::user()->name }}</h4>
                <div class="dropdown user-login">
                  <button class="btn btn-xs dropdown-toggle btn-rounded" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" data-delay="300">
                  <i class="online"></i><span>{{ 'test' }}</span></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <ul class="nav nav-sidebar">
            @include('layouts.sidebar')
          </ul>
          
          <!-- <div class="sidebar-footer clearfix">
            <a class="pull-left footer-settings" href="#" data-rel="tooltip" data-placement="top" data-original-title="Settings">
            <i class="icon-settings"></i></a>
            <a class="pull-left toggle_fullscreen" href="#" data-rel="tooltip" data-placement="top" data-original-title="Fullscreen">
            <i class="icon-size-fullscreen"></i></a>
            <a class="pull-left" href="#" data-rel="tooltip" data-placement="top" data-original-title="Lockscreen">
            <i class="icon-lock"></i></a>
            <a class="pull-left btn-effect" href="#" data-modal="modal-1" data-rel="tooltip" data-placement="top" data-original-title="Logout">
            <i class="icon-power"></i></a>
          </div> -->
        </div>
      </div>
      <!-- END SIDEBAR -->
      <div class="main-content">
        <!-- BEGIN TOPBAR -->
        <div class="topbar">
          <div class="header-left">
            <div class="topnav">
              <a class="menutoggle" href="#" data-toggle="sidebar-collapsed"><span class="menu__handle"><span>Menu</span></span></a>
              <ul class="nav nav-icons">
                <li><a href="{!! url('/') !!}"><span class="fa fa-home"></span></a></li>
               <!--  <li><a href="mailbox.html"><span class="octicon octicon-mail-read"></span></a></li>
                <li><a href="#"><span class="octicon octicon-flame"></span></a></li>
                <li><a href="builder-page.html"><span class="octicon octicon-rocket"></span></a></li> -->
              </ul>
            </div>
          </div>
          <div class="header-right">
            <ul class="header-menu nav navbar-nav">
              <!-- BEGIN NOTIFICATION DROPDOWN -->
              <!-- <li class="dropdown" id="notifications-header">
                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <i class="icon-bell"></i>
                <span class="badge badge-danger badge-header">6</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="dropdown-header clearfix">
                    <p class="pull-left">12 Pending Notifications</p>
                  </li>
                  <li>
                    <ul class="dropdown-menu-list withScroll" data-height="220">
                      <li>
                        <a href="#">
                        <i class="fa fa-star p-r-10 f-18 c-orange"></i>
                        Steve have rated your photo
                        <span class="dropdown-time">Just now</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                        <i class="fa fa-heart p-r-10 f-18 c-red"></i>
                        John added you to his favs
                        <span class="dropdown-time">15 mins</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                        <i class="fa fa-file-text p-r-10 f-18"></i>
                        New document available
                        <span class="dropdown-time">22 mins</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                        <i class="fa fa-picture-o p-r-10 f-18 c-blue"></i>
                        New picture added
                        <span class="dropdown-time">40 mins</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                        <i class="fa fa-bell p-r-10 f-18 c-orange"></i>
                        Meeting in 1 hour
                        <span class="dropdown-time">1 hour</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                        <i class="fa fa-bell p-r-10 f-18"></i>
                        Server 5 overloaded
                        <span class="dropdown-time">2 hours</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                        <i class="fa fa-comment p-r-10 f-18 c-gray"></i>
                        Bill comment your post
                        <span class="dropdown-time">3 hours</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                        <i class="fa fa-picture-o p-r-10 f-18 c-blue"></i>
                        New picture added
                        <span class="dropdown-time">2 days</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown-footer clearfix">
                    <a href="#" class="pull-left">See all notifications</a>
                    <a href="#" class="pull-right">
                    <i class="icon-settings"></i>
                    </a>
                  </li>
                </ul>
              </li> -->
              <!-- END NOTIFICATION DROPDOWN -->
              <!-- BEGIN MESSAGES DROPDOWN -->
              <!-- <li class="dropdown" id="messages-header">
                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <i class="icon-paper-plane"></i>
                <span class="badge badge-primary badge-header">
                8
                </span>
                </a>
                <ul class="dropdown-menu">
                  <li class="dropdown-header clearfix">
                    <p class="pull-left">
                      You have 8 Messages
                    </p>
                  </li>
                  <li class="dropdown-body">
                    <ul class="dropdown-menu-list withScroll" data-height="220">
                      <li class="clearfix">
                        <span class="pull-left p-r-5">
                        <img src="{{ url('/') }}/assets/backend/images/avatars/avatar3.png" alt="avatar 3">
                        </span>
                        <div class="clearfix">
                          <div>
                            <strong>Alexa Johnson</strong> 
                            <small class="pull-right text-muted">
                            <span class="glyphicon glyphicon-time p-r-5"></span>12 mins ago
                            </small>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur...</p>
                        </div>
                      </li>
                      <li class="clearfix">
                        <span class="pull-left p-r-5">
                        <img src="{{ url('/') }}/assets/backend/images/avatars/avatar4.png" alt="avatar 4">
                        </span>
                        <div class="clearfix">
                          <div>
                            <strong>John Smith</strong> 
                            <small class="pull-right text-muted">
                            <span class="glyphicon glyphicon-time p-r-5"></span>47 mins ago
                            </small>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur...</p>
                        </div>
                      </li>
                      <li class="clearfix">
                        <span class="pull-left p-r-5">
                        <img src="{{ url('/') }}/assets/backend/images/avatars/avatar5.png" alt="avatar 5">
                        </span>
                        <div class="clearfix">
                          <div>
                            <strong>Bobby Brown</strong>  
                            <small class="pull-right text-muted">
                            <span class="glyphicon glyphicon-time p-r-5"></span>1 hour ago
                            </small>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur...</p>
                        </div>
                      </li>
                      <li class="clearfix">
                        <span class="pull-left p-r-5">
                        <img src="{{ url('/') }}/assets/backend/images/avatars/avatar6.png" alt="avatar 6">
                        </span>
                        <div class="clearfix">
                          <div>
                            <strong>James Miller</strong> 
                            <small class="pull-right text-muted">
                            <span class="glyphicon glyphicon-time p-r-5"></span>2 days ago
                            </small>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur...</p>
                        </div>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown-footer clearfix">
                    <a href="mailbox.html" class="pull-left">See all messages</a>
                    <a href="#" class="pull-right">
                    <i class="icon-settings"></i>
                    </a>
                  </li>
                </ul>
              </li> -->
              <!-- END MESSAGES DROPDOWN -->
              <!-- BEGIN USER DROPDOWN -->
              <li class="dropdown" id="user-header">
                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <!-- <img src="{{ url('/images/normal/'.Auth::user()->profileImg) }}" alt="user image"> -->
                <span class="username">Hi, {{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- <li>
                    <a href="#"><i class="icon-user"></i><span>My Profile</span></a>
                  </li>
                  <li>
                    <a href="#"><i class="icon-calendar"></i><span>My Calendar</span></a>
                  </li>
                  <li>
                    <a href="#"><i class="icon-settings"></i><span>Account Settings</span></a>
                  </li> -->
                  <li>
                    <a href="{!! url('logout') !!}"><i class="icon-logout"></i><span>Logout</span></a>
                  </li>
                </ul>
              </li>
              <!-- END USER DROPDOWN -->
            </ul>
          </div>
          <!-- header-right -->
        </div>
        <!-- END TOPBAR -->
        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content">
          <div class="header">
            <h2><strong>{{ $page['header'] }}</strong></h2>
            @if(array_key_exists('breadcrumb',$page))
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                @foreach($page['breadcrumb'] as $name => $link)
                <li class="{{ $link == 'active' ? $link : '' }}">@if($link == 'active') {{ $name }} @else<a href="{{ $link }}">{{ $name }}</a>@endif</li>
                @endforeach
              </ol>
            </div>
            @endif
          </div>
          <div class="row">
            <div class="col-lg-12">
              <!-- HERE COMES YOUR CONTENT -->
              @yield('content')
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT -->
      </div>
      <!-- END MAIN CONTENT -->

    </section>

    <!-- BEGIN PRELOADER -->
    <div class="loader-overlay">
      <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
    <!-- END PRELOADER -->
    <a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a> 
    <script src="{{ url('/') }}/assets/backend/plugins/jquery/jquery-1.11.1.min.js"></script>
    <script src="{{ url('/') }}/assets/backend/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
    <script src="{{ url('/') }}/assets/backend/plugins/jquery-ui/jquery-ui-1.11.2.min.js"></script>
    <script src="{{ url('/') }}/assets/backend/plugins/gsap/main-gsap.min.js"></script>
    <script src="{{ url('/') }}/assets/backend/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/assets/backend/plugins/jquery-cookies/jquery.cookies.min.js"></script> <!-- Jquery Cookies, for theme -->
    <script src="{{ url('/') }}/assets/backend/plugins/jquery-block-ui/jquery.blockUI.min.js"></script> <!-- simulate synchronous behavior when using AJAX -->
    <script src="{{ url('/') }}/assets/backend/plugins/bootbox/bootbox.min.js"></script> <!-- Modal with Validation -->
    <script src="{{ url('/') }}/assets/backend/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script> <!-- Custom Scrollbar sidebar -->
    <script src="{{ url('/') }}/assets/backend/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script> <!-- Show Dropdown on Mouseover -->
    <script src="{{ url('/') }}/assets/backend/plugins/retina/retina.min.js"></script> <!-- Retina Display -->
    <script src="{{ url('/') }}/assets/backend/plugins/select2/select2.min.js"></script> <!-- Select Inputs -->
    <script src="{{ url('/') }}/assets/backend/plugins/icheck/icheck.min.js"></script> <!-- Checkbox & Radio Inputs -->
    <script src="{{ url('/') }}/assets/backend/plugins/backstretch/backstretch.min.js"></script> <!-- Background Image -->
    <script src="{{ url('/') }}/assets/backend/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> <!-- Animated Progress Bar -->
    <script src="{{ url('/') }}/assets/backend/plugins/charts-chartjs/Chart.min.js"></script>
    <script src="{{ url('/') }}/assets/backend/js/plugins.js"></script> <!-- Main Plugin Initialization Script -->
    <script src="{{ url('/') }}/assets/backend/js/application.js"></script> <!-- Main Application Script -->
    <script src="{{ url('/') }}/assets/backend/plugins/cke-editor/ckeditor.js"></script>
    <script src="{{ url('/') }}/assets/backend/plugins/bootstrap/js/jasny-bootstrap.min.js"></script> <!-- File Upload and Input Masks -->
    <script src="{{ url('/') }}/assets/backend/plugins/noty/jquery.noty.packaged.min.js"></script>
    <script src="{{ url('/') }}/assets/backend/js/pages/notifications.js"></script>
    <script src="{{ url('/') }}/assets/backend/js/notify.js"></script>
    <script src="{{ url('/') }}/assets/backend/plugins/sweetalert-master/dist/sweetalert.min.js"></script>
    <script src="{{ url('/') }}/assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
    <script>

        function alertDelete(formId){
            swal({
                    title: "Are you sure",
                    text: "You will not be able to retrieve these data",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(isConfirm){
                    if (isConfirm) {

                        $('#'+formId).submit();

                    }
                });
        }

    </script>
    <script>
    $(document).ready(function(){

      @if(is_array($page['active']))
        $('#{{ $page["active"]["main"] }}, #{{ $page["active"]["sub"] }}').addClass('active');
      @else
        $('#'+'{{ $page["active"] }}').addClass('active');
      @endif
      
    }); 
    </script>
    <!-- Start notification -->
    @if($errors->any())
    <script>
    $(document).ready(function(){
        @foreach($errors->all() as $message)
            notify("{{ $message }}","danger","bottomRight");
        @endforeach
    });
    </script>
    @endif

    @if(Session::get('error') != '')
    <script>
    $(document).ready(function(){
        notify("{{ Session::get('error') }}","danger","bottomRight");
    });
    </script>
    {{ Session::forget('error') }}
    @endif

    @if(Session::get('success') != '')
    <script>
    $(document).ready(function(){
        notify("{{ Session::get('success') }}","success","topCenter");
    });
    </script>
    {{ Session::forget('success') }}
    @endif
    <!-- End notification -->
    @yield('footer')
  </body>
</html>