<div class="sidebar-nav-wrapper" id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li>
            <a href="{{route('admin.dashboard')}}"><i class="fa fa-home menu-icon"></i> HOME</a>
        </li>
        <li>
            <a href="{{route('admin.view-request')}}"><i class="fa fa-plus menu-icon"></i> View Requests</a>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-users menu-icon"></i> Add Stakeholders <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="{{route("user.add-university")}}"><i class="fa fa-plus-circle"></i>Add University</a>
                </li>
                <li>
                    <a href="{{route("user.add-nuc-staff")}}"><i class="fa fa-plus-circle"></i>Add NUC Staff</a>
                </li>
                <li>
                    <a href="{{route("user.add-company")}}"><i class="fa fa-plus-circle"></i>Add Company</a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </li>
        <li>
            <a href="{{route('admin.add-year')}}"><i class="fa fa-plus menu-icon"></i>Add Academic Year</a>
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
        </li>
        <li>
            <a href="{{route('logout')}}"><i class="fa fa-close menu-icon"></i>Logout</a>
        </li>
        <li class="dropdown hidden">
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
        </li>
    </ul>
</div>