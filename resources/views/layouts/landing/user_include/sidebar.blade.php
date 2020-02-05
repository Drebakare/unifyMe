<div class="sidebar-nav-wrapper" id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li>
            <a href="{{route('user.dashboard')}}"><i class="fa fa-home menu-icon"></i>Home</a>
        </li>
        @if(Auth::user()->user_type == 1)
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-users menu-icon"></i> Add Stakeholders <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{route("user.add-student")}}"><i class="fa fa-plus-circle"></i>Add Student</a>
                    </li>
                    <li>
                        <a href="{{route("user.add-staff")}}"><i class="fa fa-plus-circle"></i>Add Staff</a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-upload menu-icon"></i>Student Bio-data <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{route('update-bio-data')}}"><i class="fa fa-caret-right"></i>Update Individual Bio-Data</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-caret-right"></i> Update Bio-Data using Excel</a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-upload menu-icon"></i>Upload Students' Result<span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{route('staff.upload-student-result')}}"><i class="fa fa-caret-right"></i>Upload Individual Result</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-caret-right"></i> Update Result using Excel</a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </li>
            <li>
                <a href="{{route('user.view-results')}}"><i class="fa fa-tasks menu-icon"></i>View Students' Result</a>
            </li>
            <li>
                <a href="{{route('user.view-requests')}}"><i class="fa fa-folder-open menu-icon"></i>View All Requests</a>
            </li>
            <li>
                <a href="{{route('user.system-settings')}}"><i class="fa fa-magnet menu-icon"></i>System settings</a>
            </li>
            @if((Auth::user()->university_id != null )&& (Auth::user()->faculty_id == null) )
                <li>
                    <a href="{{route('user.add-faculty')}}"><i class="fa fa-magnet menu-icon"></i>Add Faculty</a>
                </li>
            @endif
            <li>
                <a href="{{route('user.add-department')}}"><i class="fa fa-magnet menu-icon"></i>Add Department</a>
            </li>
        @endif

        @if(Auth::user()->user_type == 1 && Auth::user()->user_type == 1 )
            <li>
                <a href="{{route('user.request-result')}}"><i class="fa fa-check menu-icon"></i>Request Result</a>
            </li>
            <li>
                <a href="{{route('user.view-request-status')}}"><i class="fa fa-calendar-times-o menu-icon"></i>Request Status</a>
            </li>
        @endif
        @if(Auth::user()->user_type == 3)
            <li>
                <a href="{{route('nuc.update-bio-data')}}"><i class="fa fa-openid menu-icon"></i>View Student Biodata</a>
            </li>
            <li>
                <a href="{{route('nuc.view-results')}}"><i class="fa fa-check menu-icon"></i>View Student Result</a>
            </li>
        @endif
        {{--<li class="dropdown hidden">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-users menu-icon"></i> STUDENTS <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="admin-add-student.html"><i class="fa fa-caret-right"></i>ADD</a>
                </li>
                <li>
                    <a href="admin-student-list.html"><i class="fa fa-caret-right"></i>ALL STUDENT  </a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </li>
        <li class="dropdown hidden">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user-secret menu-icon"></i> TEACHERS <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="admin-add-teacher.html"><i class="fa fa-caret-right"></i>ADD</a>
                </li>
                <li>
                    <a href="admin-teacher-list.html"><i class="fa fa-caret-right"></i>ALL TEACHER</a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </li>
        <li class="hidden">
            <a href="message.html"><i class="fa fa-envelope menu-icon"></i> MY MESSAGES</a>
        </li>
        <li class="hidden">
            <a href="admin-add-announcement.html"><i class="fa fa-bullhorn menu-icon"></i> ANNOUNCEMENTS</a>
        </li>--}}
        <li>
            <a href="{{route('logout')}}"><i class="fa fa-close menu-icon"></i>Logout</a>
        </li>
        {{--<li class="dropdown hidden">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-file-o menu-icon"></i> CLASSES <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="admin-add-class.html"><i class="fa fa-caret-right"></i>ADD CLASS</a>
                </li>
                <li>
                    <a href="admin-add-section.html"><i class="fa fa-caret-right"></i>ADD SECTION</a>
                </li>
                <li>
                    <a href="admin-add-class.html"><i class="fa fa-caret-right"></i>VIEW SECTIONS</a>
                </li>
                <li>
                    <a href="admin-add-section.html"><i class="fa fa-caret-right"></i>VIEW CLASSES</a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </li>
        <li class="dropdown hidden">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-book menu-icon"></i> SUBJECTS <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="admin-add-subject.html"><i class="fa fa-caret-right"></i>ADD</a>
                </li>
                <li>
                    <a href="admin-add-subject.html"><i class="fa fa-caret-right"></i>VIEW SUBJECTS</a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </li>
        <li class="dropdown hidden">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-calendar menu-icon"></i> TIMETABLE <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="admin-create-timetable.html"><i class="fa fa-caret-right"></i>CREATE</a>
                </li>
                <li>
                    <a href="admin-class-timetable.html"><i class="fa fa-caret-right"></i>VIEW</a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </li>
        <li class="dropdown hidden">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-address-card menu-icon"></i> REPORTS <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="teacher-attendence-report.html"><i class="fa fa-caret-right"></i>ATTENDENCE</a>
                </li>
                <li>
                    <a href="teacher-marks-report.html"><i class="fa fa-caret-right"></i>MARKS</a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </li>--}}
    </ul>
</div>