<div class="row nav-row trans-menu">
    <div class="container nav-container">
        <div class="top-navbar">
            <div class = "pull-right">
                <div class="top-nav-social pull-left">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                </div>
                @if(!Auth::check())
                    <div class="top-nav-login-btn pull-right">
                        <a href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-registered"></i>Login</a>
                    </div>
                @else
                    <div class="top-nav-logout-btn pull-right">
                        <a href="{{route("logout")}}" ><i class="fa fa-close"></i>Logout</a>
                    </div>
                @endif
                <!--<div class="top-navbar-search pull-right">
                    <i class="fa fa-search"></i>
                    <input type = "text" placeholder = "Search"/>
                </div>-->
            </div>
            <div class = "clearfix"></div>
        </div>
        <div class = "clearfix"></div>
        <nav id="pathshalaNavbar" class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#pathshalaNavbarCollapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('homepage')}}">Unify System</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="pathshalaNavbarCollapse">
                <ul class="nav navbar-nav">
                    <li><a href="#"><i class="fa fa-home"></i>HOME</a></li>
                    {{--<li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-graduation-cap"></i>ACADEMICS <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="academic.html"><i class="fa fa-certificate"></i>UPPER</a></li>
                            <li><a href="academic.html"><i class="fa fa-child"></i>MIDDLE</a></li>
                            <li><a href="academic.html"><i class="fa fa-puzzle-piece"></i>LOWER</a></li>
                            <li><a href="preschool.html"><i class="fa fa-cube"></i>PRESCHOOL</a></li>
                        </ul>
                    </li>--}}
                    {{--<li><a href="admission.html"><i class="fa fa-users"></i>ADMISSIONS</a></li>--}}
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-calendar-check-o"></i>EVENTS <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-calendar"></i>EVENTS</a></li>
                            <li><a href="#"><i class="fa fa-calendar-o"></i>EVENT SINGLE</a></li>
                        </ul>
                    </li>
                    {{--@if(Auth::check())
                         <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-dashboard"></i>DASHBOARD <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="dashboard/admin-dashboard.html"><i class="fa fa-user-secret"></i>ADMIN</a></li>
                            <li><a href="dashboard/teacher-dashboard.html"><i class="fa fa-user"></i>TEACHER</a></li>
                            <li><a href="dashboard/student-dashboard.html"><i class="fa fa-child"></i>STUDENT</a></li>
                        </ul>
                    </li>
                    @endif--}}
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-meetup"></i>Contact <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-picture-o"></i>CAMPUS GALLERY</a></li>
                            <li><a href="#"><i class="fa fa-info-circle"></i>ABOUT</a></li>
                            <li><a href="#"><i class="fa fa-phone-square"></i>CONTACT US</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>
</div>
