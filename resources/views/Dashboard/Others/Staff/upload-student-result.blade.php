@extends('layouts.landing.user_app')
@section('contents')

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <h5 class="page-title"><i class="fa fa-address-card"></i>Add Grade</h5>
                    <div class="section-divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <div class="col-lg-12">
                        <div class="dash-item first-dash-item">
                            <h6 class="item-title"><i class="fa fa-address-book"></i>Kindly fill the following form to add students' result</h6>
                            <form method="post" action="{{route("user.select-semester")}}">
                                @csrf
                                <div class="inner-item dash-search-form">
                                    <div class="col-md-3 col-sm-6">
                                        <label>Year</label>
                                        <select name="year_id">
                                            @foreach($years as $year)
                                                <option value="{{$year->id}}">{{$year->year}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <label>Semester</label>
                                        <select name="semester_id">
                                            @foreach($semesters as $semester)
                                                <option value="{{$semester->id}}">{{$semester->semester}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="clearfix visible-sm"></div>
                                    <div class="col-md-3 col-sm-6">
                                        <label>University</label>
                                        <select  name="university_id" disabled>
                                            <option value="{{Auth::user()->university_id}}" selected >{{Auth::user()->university->name}}</option>
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
