@extends('layouts.landing.user_app')
@section('contents')

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <h5 class="page-title"><i class="fa fa-address-card"></i>Select University, Faculty and Department</h5>
                    <div class="section-divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <div class="col-lg-12">
                        <div class="dash-item first-dash-item">
                            <h6 class="item-title"><i class="fa fa-address-book"></i>Kindly fill the following form to request for student result</h6>
                            <form method="post" action="{{route("user.request-for-student")}}">
                                @csrf
                                <div class="inner-item dash-search-form">
                                    <div class="col-md-4 col-sm-6">
                                        <label>University</label>
                                        <select name="university_id">
                                            @foreach($universities as $university)
                                                <option value="{{$university->id}}">{{$university->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Faculty</label>
                                        <select name="faculty_id">
                                            @foreach($faculties as $faculty)
                                                <option value="{{$faculty->id}}">{{$faculty->faculty_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="clearfix visible-sm"></div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Department</label>
                                        <select  name="department_id">
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}">{{$department->department_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="inner-item">
                                    <div class="table-action-box">
                                        <button id="submit-button"><i class="fa fa-check"></i>Next</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="menu-togggle-btn">
            <a href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></a>
        </div>
        <div class="dash-footer col-lg-12">
            <p>Copyright Pathshala</p>
        </div>--}}
@endsection
