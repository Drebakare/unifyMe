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
                                                <a class="edit" href="{{route('user.update-user-biodata', ['id' => $student->id])}}" ><i class="fa fa-edit"></i></a>
                                                <a class="edit" href="#" title="Update Student Details" data-toggle="modal" data-target="#editDetailModal{{$key}}"><i class="fa fa-plus"></i></a>
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
                        <h4 class="modal-title"><i class="fa fa-edit"></i>Edit Student Details</h4>
                    </div>
                    <form action="{{route('user.update-student-info', ["id" => $student->id])}}" method="post">
                        @csrf
                        <div class="modal-body dash-form">
                            <div class="col-sm-4">
                                <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>Student Name</label>
                                <input type="text" placeholder="Student Name" name="student_name" value="{{$student->student_name}}" required />
                            </div>
                            <div class="col-sm-4">
                                <label class="clear-top-margin"><i class="fa fa-sort-numeric-asc"></i>Student Matric No</label>
                                <input type="text" placeholder="Matric No" name="matric_no" value="{{$student->student_matric_no}}" required/>
                            </div>
                            <div class="col-sm-4">
                                <label class="clear-top-margin"><i class="fa fa-university"></i>University</label>
                                <select name="university_id" required>
                                    <option  value="{{Auth::user()->university_id}}" selected>{{Auth::user()->university->name}}</option>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-4" style="padding-top: 15px;">
                                <label class="clear-top-margin"><i class="fa fa-home"></i>Faculty</label>
                                <select name="faculty_id">
                                    @foreach($faculties as $faculty)
                                        <option name="faculty_id" value="{{$faculty->id}}" @if($student->faculty_id == $faculty->id) selected @endif>{{$faculty->faculty_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4" style="padding-top: 15px;">
                                <label class="clear-top-margin"><i class="fa fa-venus"></i>Department</label>
                                <select name="department_id" required>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}" @if($student->department_id == $department->id) selected @endif>{{$department->department_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4" style="padding-top: 15px;">
                                <label class="clear-top-margin"><i class="fa fa-clock-o"></i>Year of Admittance</label>
                                <select name="year_of_admission" required>
                                    @foreach($years as $year)
                                        <option value="{{$year->year}}" @if($year->year == $student->year) selected @endif>{{$year->year}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="modal-footer">
                            <div class="table-action-box">
                                <button type="submit" id="submit-button"><i class="fa fa-check"></i>SAVE</button>
                                <a href="#" class="cancel" data-dismiss="modal"><i class="fa fa-ban"></i>CLOSE</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
@endsection
