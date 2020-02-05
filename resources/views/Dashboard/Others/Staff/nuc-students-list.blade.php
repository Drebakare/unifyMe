@extends('layouts.landing.user_app')
@section('contents')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <h5 class="page-title"><i class="fa fa-users"></i>All Students</h5>
                    <div class="section-divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <div class="col-lg-12">
                        <div class="dash-item first-dash-item">
                            <h6 class="item-title"><i class="fa fa-user"></i>Students</h6>
                            <div class="inner-item">
                                <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th><i class="fa fa-user"></i>Name</th>
                                        <th><i class="fa fa-id-card"></i>Matric Number</th>
                                        <th><i class="fa fa-book"></i>Year Admitted</th>
                                        <th><i class="fa fa-book"></i>Status</th>
                                        <th><i class="fa fa-cogs"></i>Department</th>
                                        <th><i class="fa fa-puzzle-piece"></i>Faculty</th>
                                        <th><i class="fa fa-tasks"></i>ACTION</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $key => $student)
                                        <tr>
                                            <td>{{$student->student_name}}</td>
                                            <td>{{$student->student_matric_no}}</td>
                                            <td>{{$student->year_of_admission}}</td>
                                            <td>@if($student->status == 1) Active @elseif($student->status == 2) Graduated @else Not a Student @endif</td>
                                            <td>{{$student->department->department_name}}</td>
                                            <td>{{$student->faculty->faculty_name}}</td>
                                            <td class="action-link">
                                                <a class="edit" href="#" title="view Student Details" data-toggle="modal" data-target="#editDetailModal{{$key}}"><i class="fa fa-plus"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       {{-- <div class="menu-togggle-btn">
            <a href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></a>
        </div>
        <div class="dash-footer col-lg-12">
            <p>Copyright Pathshala</p>
        </div>--}}


        <!-- Delete Modal -->
        <div id="deleteDetailModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-trash"></i>DELETE STUDENT</h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-action-box">
                            <a href="#" class="save"><i class="fa fa-check"></i>YES</a>
                            <a href="#" class="cancel" data-dismiss="modal"><i class="fa fa-ban"></i>CLOSE</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>


        <!--Edit details modal-->
        @foreach($students as $key => $student)
            <div id="editDetailModal{{$key}}" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i>View Student Details</h4>
                    </div>

                        <div class="modal-body dash-form">
                            <div class="col-sm-4">
                                <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>Student Name</label>
                                <input type="text" placeholder="Student Name" name="student_name" value="{{$student->student_name}}" disabled />
                            </div>
                            <div class="col-sm-4">
                                <label class="clear-top-margin"><i class="fa fa-sort-numeric-asc"></i>Student Matric No</label>
                                <input type="text" placeholder="Matric No" name="matric_no" value="{{$student->student_matric_no}}" disabled/>
                            </div>
                            <div class="col-sm-4">
                                <label class="clear-top-margin"><i class="fa fa-sort-numeric-asc"></i>University</label>
                                <input type="text" placeholder="Matric No" name="matric_no" value="{{$student->university->name}}" disabled/>
                            </div>
                            <div class="col-sm-4">
                                <label class="clear-top-margin"><i class="fa fa-sort-numeric-asc"></i>Faculty</label>
                                <input type="text" placeholder="Matric No" name="matric_no" value="{{$student->faculty->faculty_name}}" disabled/>
                            </div>
                            <div class="col-sm-4">
                                <label class="clear-top-margin"><i class="fa fa-sort-numeric-asc"></i>Department</label>
                                <input type="text" placeholder="Matric No" name="matric_no" value="{{$student->department->department_name}}" disabled/>
                            </div>
                            @if($student->biodata)
                                <div class="col-sm-4">
                                    <label class="clear-top-margin"><i class="fa fa-sort-numeric-asc"></i>Nationality</label>
                                    <input type="text" placeholder="Matric No" name="matric_no" value="{{$student->biodata->nationality}}" disabled/>
                                </div>
                                <div class="col-sm-4">
                                    <label class="clear-top-margin"><i class="fa fa-sort-numeric-asc"></i>State</label>
                                    <input type="text" placeholder="Matric No" name="matric_no" value="{{$student->biodata->state}}" disabled/>
                                </div>
                                <div class="col-sm-4">
                                    <label class="clear-top-margin"><i class="fa fa-sort-numeric-asc"></i>DOB</label>
                                    <input type="text" placeholder="Matric No" name="matric_no" value="{{$student->biodata->dob}}" disabled/>
                                </div>
                                <div class="col-sm-4">
                                    <label class="clear-top-margin"><i class="fa fa-sort-numeric-asc"></i>Phone Number</label>
                                    <input type="text" placeholder="Matric No" name="matric_no" value="{{$student->biodata->phone_number}}" disabled/>
                                </div>
                                <div class="col-sm-4">
                                    <label class="clear-top-margin"><i class="fa fa-sort-numeric-asc"></i>Email Address</label>
                                    <input type="text" placeholder="Matric No" name="matric_no" value="{{$student->biodata->email_address}}" disabled/>
                                </div>
                            @endif
                            <div class="clearfix"></div>
                        </div>
                </div>
            </div>
        </div>
        @endforeach
@endsection
