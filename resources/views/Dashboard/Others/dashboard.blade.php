@extends('layouts.landing.user_app')
@section('contents')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <h5 class="page-title"><i class="fa fa-home"></i>HOME</h5>
                <div class="section-divider"></div>
                @if(Auth::user()->user_type != 1)
                    <div class="dashboard-stats">
                    <div class="col-sm-6 col-md-3">
                        <div class="stat-item">
                            <div class="stats">
                                <div class="col-xs-8 count">
                                    <h1>199</h1>
                                    <p>STUDENTS</p>
                                </div>
                                <div class="col-xs-4 icon">
                                    <i class="fa fa-users ex-icon"></i>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="stat-item">
                            <div class="stats">
                                <div class="col-xs-8 count">
                                    <h1>111</h1>
                                    <p>Universities</p>
                                </div>
                                <div class="col-xs-4 icon">
                                    <i class="fa fa-university success-icon"></i>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix visible-sm"></div>
                    <div class="col-sm-6 col-md-3">
                        <div class="stat-item">
                            <div class="stats">
                                <div class="col-xs-8 count">
                                    <h1>900</h1>
                                    <p>Companies</p>
                                </div>
                                <div class="col-xs-4 icon">
                                    <i class="fa fa-globe look-icon"></i>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                @endif
                @if(Auth::user()->user_type ==1)
                    <div class="dashboard-stats">
                        <div class="col-sm-6 col-md-6">
                            <div class="stat-item">
                                <div class="stats">
                                    <div class="col-xs-8 count">
                                        <h1>{{count($students)}}</h1>
                                        <p>STUDENTS</p>
                                    </div>
                                    <div class="col-xs-4 icon">
                                        <i class="fa fa-users ex-icon"></i>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="stat-item">
                                <div class="stats">
                                    <div class="col-xs-8 count">
                                        <h1>{{count($staffs)}}</h1>
                                        <p>Staffs</p>
                                    </div>
                                    <div class="col-xs-4 icon">
                                        <i class="fa fa-university success-icon"></i>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix visible-sm"></div>
                    </div>
                @endif
            </div>
        </div>
        @if(Auth::user()->user_type == 1)
             <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <div class="col-sm-6">
                    <div>
                        <div class="my-msg dash-item">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h6 class="item-title"><i class="fa fa-user"></i>Recently Added Students</h6>
                                </div>
                                <div class="col-sm-6">
                                   <a href="#"><h6 class="item-title"> view all <i class="fa fa-arrow-right"></i></h6></a>
                                </div>
                            </div>
                            <div class="inner-item">
                                <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th><i class="fa fa-user"></i>Name</th>
                                        <th><i class="fa fa-id-card"></i>University</th>
                                        <th><i class="fa fa-book"></i>Matric No</th>
                                        <th><i class="fa fa-tasks"></i>ACTION</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($latest_students as $latest_student)
                                        <tr>
                                            <td>{{$latest_student->student_name}}</td>
                                            <td>{{$latest_student->university->name}}</td>
                                            <td>{{$latest_student->student_matric_no}}</td>
                                            <td class="action-link">
                                                <a class="edit" href="#" title="Edit" data-toggle="modal" data-target="#editDetailModal"><i class="fa fa-edit"></i></a>
                                                <a class="delete" href="#" title="Delete" data-toggle="modal" data-target="#deleteDetailModal"><i class="fa fa-remove"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div>
                        <div class="my-msg dash-item">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h6 class="item-title"><i class="fa fa-user"></i>Last {{count($latest_staffs)}} added staffs</h6>
                                </div>
                                <div class="col-sm-6">
                                    <a href="#"><h6 class="item-title"> view all <i class="fa fa-arrow-right"></i></h6></a>
                                </div>
                            </div>
                            <div class="inner-item">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th><i class="fa fa-user"></i>Name</th>
                                        <th><i class="fa fa-id-card"></i>Email</th>
                                        <th><i class="fa fa-book"></i>Univesity</th>
                                        <th><i class="fa fa-tasks"></i>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($latest_staffs) > 0)
                                        @foreach($latest_staffs as $latest_staff)
                                            <tr>
                                                <td>{{$latest_staff->name}}</td>
                                                <td>{{$latest_staff->email}}</td>
                                                <td>{{$latest_staff->university->name}}</td>
                                                <td class="action-link">
                                                    <a class="edit" href="{{--{{route('admin.add-staff', ['staff_id' => $request->staff_id])}}--}}" title="Add Staff" ><i class="fa fa-plus-circle"></i></a>
                                                    <a class="delete" href="{{--{{route('admin.delete-request', ["staff_id" => $request->staff_id])}}--}}" title="Delete Request"><i class="fa fa-remove"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>
                                                <h6><i class="fa fa-info-circle"></i> No recent access request, all requests successfully handled</h6>
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{--<div class="col-sm-6">
                    <div>
                        <div class="my-msg dash-item">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h6 class="item-title"><i class="fa fa-user"></i>Recent Access Request</h6>
                                </div>
                                <div class="col-sm-6">
                                    <a href="#"><h6 class="item-title"> view all <i class="fa fa-arrow-right"></i></h6></a>
                                </div>
                            </div>
                            <div class="inner-item">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th><i class="fa fa-user"></i>Name</th>
                                        <th><i class="fa fa-id-card"></i>University</th>
                                        <th><i class="fa fa-book"></i>Staff ID</th>
                                        <th><i class="fa fa-tasks"></i>ACTION</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($requests) > 0)
                                        @foreach($requests as $request)
                                            <tr>
                                                <td>{{$request->name}}</td>
                                                <td>{{$request->institution_name}}</td>
                                                <td>{{$request->staff_id}}</td>
                                                <td class="action-link">
                                                    <a class="edit" href="{{route('admin.add-staff', ['staff_id' => $request->staff_id])}}" title="Add Staff" ><i class="fa fa-plus-circle"></i></a>
                                                    <a class="delete" href="{{route('admin.delete-request', ["staff_id" => $request->staff_id])}}" title="Delete Request"><i class="fa fa-remove"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>
                                                  <h6><i class="fa fa-info-circle"></i> No recent access request, all requests successfully handled</h6>
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div>
                            <div>
                                <div class="my-msg dash-item">
                                    <h6 class="item-title"><i class="fa fa-pie-chart"></i>Users' Analysis</h6>
                                    <div class="chart-item">
                                        <canvas id="studentPie" height = 250px></canvas>
                                        <div class="chart-legends">
                                            <span class="red">Companies</span>
                                            <span class="orange">Universities</span>
                                            <span class="green">Students</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>--}}
            </div>
        </div>
        @endif
        {{--<div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <div class="col-sm-8">
                    <div>
                        <div class="my-msg dash-item">
                            <h6 class="item-title"><i class="fa fa-bar-chart"></i>TODAY'S STUDENT ATTENDENCE</h6>
                            <div class="inner-item">
                                <div class="summary-chart">
                                    <canvas id="studentAttendenceBar" height="100px"></canvas>
                                    <div class="chart-legends">
                                        <span class="red">ABSENT</span>
                                        <span class="orange">ON LEAVE</span>
                                        <span class="green">PRESENT</span>
                                    </div>
                                    <div class="chart-title">
                                        <h6 class="bottom-title">STUDENT ATTENDENCE BAR</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <div class="my-msg dash-item">
                            <h6 class="item-title"><i class="fa fa-pie-chart"></i>TEACHER ATTENDENCE</h6>
                            <div class="chart-item">
                                <canvas id="studentPie" height = 250px></canvas>
                                <div class="chart-legends">
                                    <span class="red">ABSENT</span>
                                    <span class="orange">PRESENT</span>
                                    <span class="green">LEAVE</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <div class="col-md-12">
                    <div class="my-msg dash-item">
                        <h6 class="item-title"><i class="fa fa-bullhorn"></i>ANNOUNCEMENTS</h6>
                        <div class="inner-item dashboard-tabs">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a  href="#1" data-toggle="tab"><i class="fa fa-graduation-cap"></i><span>ACADEMICS</span></a>
                                </li>
                                <li>
                                    <a href="#2" data-toggle="tab"><i class="fa fa-users"></i><span>ADMISSIONS</span></a>
                                </li>
                                <li>
                                    <a href="#3" data-toggle="tab"><i class="fa fa-trophy"></i><span>SPORTS</span></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="1">
                                    <div class="announcement-item">
                                        <h5>Guest lecture on fine arts by Smith.<span class="new">New</span></h5>
                                        <h6><i class="fa fa-clock-o"></i>06-24-2017, 13:34</h6>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                        <div class="posted-by">
                                            <p>Thanks,</p>
                                            <h6>John Doe, Principal</h6>
                                        </div>
                                    </div>
                                    <div class="announcement-item">
                                        <h5>Guest lecture on fine arts by Smith</h5>
                                        <h6><i class="fa fa-clock-o"></i>06-24-2017, 13:34</h6>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                        <div class="posted-by">
                                            <p>Thanks,</p>
                                            <h6>John Doe, Principal</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="2">
                                    <div class="announcement-item">
                                        <h5>2</h5>
                                    </div>
                                </div>
                                <div class="tab-pane" id="3">
                                    <div class="announcement-item">
                                        <h5>3</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
    </div>
@endsection
