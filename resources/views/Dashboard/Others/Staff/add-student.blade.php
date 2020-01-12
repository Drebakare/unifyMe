@extends('layouts.landing.user_app')
@section('contents')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <h5 class="page-title"><i class="fa fa-user"></i>ADD STUDENT</h5>
                    <div class="section-divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <div class="col-md-12">
                        <div class="dash-item first-dash-item">
                            <h6 class="item-title"><i class="fa fa-user"></i>STUDENT INFO</h6>
                            <div class="inner-item">
                                @if(count($errors)>0)
                                    @foreach($errors->all() as $error)
                                        <div class="alert alert-danger"  style="margin-top: 10px; margin-left: 10px;">
                                            {{$error}}
                                        </div>
                                    @endforeach
                                @endif
                                @if(session('failure'))
                                    <div class="alert alert-danger" style="margin-top: 10px; margin-left: 10px;">
                                        {{session('failure')}}
                                    </div>
                                @endif
                                @if(session('success'))
                                    <div class="alert alert-success" style="margin-top: 10px; margin-left: 10px;">
                                        {{session('success')}}
                                    </div>
                                @endif
                                <form method="post" action="{{route("user.submit-add-student-form")}}">
                                    @csrf
                                    <div class="dash-form">
                                        <div class="col-sm-4">
                                            <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>Student Name</label>
                                            <input type="text" placeholder="Student Name" name="student_name" required />
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="clear-top-margin"><i class="fa fa-sort-numeric-asc"></i>Student Matric No</label>
                                            <input type="text" placeholder="Matric No" name="matric_no" required/>
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
                                                    <option name="faculty_id" value="{{$faculty->id}}">{{$faculty->faculty_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-4" style="padding-top: 15px;">
                                            <label class="clear-top-margin"><i class="fa fa-venus"></i>Department</label>
                                            <select name="department_id" required>
                                                @foreach($departments as $department)
                                                    <option value="{{$department->id}}">{{$department->department_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-4" style="padding-top: 15px;">
                                            <label class="clear-top-margin"><i class="fa fa-clock-o"></i>Year of Admittance</label>
                                            <select name="year_of_admission" required>
                                                @foreach($years as $year)
                                                    <option value="{{$year->year}}">{{$year->year}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-sm-12">
                                            <button type="submit" id="submit-button"><i class="fa fa-paper-plane"></i> SAVE</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <div class="col-md-12">
                        <div class="dash-item">
                            <h6 class="item-title"><i class="fa fa-users"></i>Add Multiple Students</h6>
                            <form method="post" action="{{route("user.submit-add-multiple-students")}}" enctype="multipart/form-data">
                                @csrf
                                <div class="inner-item">
                                    <div class="dash-form">
                                        <div class="col-sm-3">
                                            <label><i class="fa fa-file-picture-o"></i>Upload Student List</label>
                                            <input name="student_list" type="file" placeholder="Upload student list" accept=".xls, .xlsx" />
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-sm-12">
                                            <button type="submit" id="submit-button"><i class="fa fa-paper-plane"></i> SAVE</button>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
