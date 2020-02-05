@extends('layouts.landing.user_app')
@section('contents')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <h5 class="page-title"><i class="fa fa-user"></i>ADD Faculty</h5>
                    <div class="section-divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <div class="col-md-12">
                        <div class="dash-item first-dash-item">
                            <h6 class="item-title"><i class="fa fa-user"></i>Faculty Info</h6>
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
                                <form method="post" action="{{route("user.update-add-department")}}">
                                    @csrf
                                    <div class="dash-form">
                                        <div class="col-sm-4" >
                                            <label class="clear-top-margin"><i class="fa fa-home"></i>Faculty</label>
                                            <select name="faculty_id">
                                                @foreach($faculties as $faculty)
                                                    <option name="faculty_id" value="{{$faculty->id}}" @if(Auth::user()->faculty_id != null && Auth::user()->faculty_id == $faculty->faculty_id) selected @endif>{{$faculty->faculty_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>New Department</label>
                                            <input type="text" placeholder="Department Name" name="department_name" required />
                                        </div>

                                        <div class="col-sm-4">
                                            <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>Duration</label>
                                            <input type="number" placeholder="Course Duration" name="duration" required />
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
            {{--<div class="row">
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
            </div>--}}
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <div class="col-lg-12">
                        <div class="dash-item first-dash-item">
{{--
                            <h6 class="item-title"><i class="fa fa-user"></i>Faculties</h6>
--}}
                            <div class="inner-item">
                                <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th><i class="fa fa-user"></i>Name</th>
                                        @if(Auth::user()->faculty_id == null)
                                            <th><i class="fa fa-user"></i>Faculty Name</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($departments as $key => $department)
                                        <tr>
                                            <td>{{$department->department_name}}</td>
                                            @if(Auth::user()->faculty_id == null)
                                                <td>{{$department->faculty->faculty_name}}</td>
                                            @endif
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
@endsection
