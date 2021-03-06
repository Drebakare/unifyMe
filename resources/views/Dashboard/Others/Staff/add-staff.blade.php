@extends('layouts.landing.user_app')
@section('contents')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <h5 class="page-title"><i class="fa fa-user"></i>ADD STAFF</h5>
                    <div class="section-divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <div class="col-md-12">
                        <div class="dash-item first-dash-item">
                            <h6 class="item-title"><i class="fa fa-user"></i>Staff Info</h6>
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
                                <form method="post" action="{{route("user.submit-add-staff-form")}}">
                                    @csrf
                                    <div class="dash-form">
                                        <div class="col-sm-4">
                                            <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>Staff Name</label>
                                            <input type="text" placeholder="Staff Name" name="name" required />
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="clear-top-margin"><i class="fa fa-phone"></i>Staff Phone No</label>
                                            <input type="tel" placeholder="Phone Number" name="phone_number" required/>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="clear-top-margin"><i class="fa fa-university"></i>University</label>
                                            <select name="university_id" required>
                                                <option  value="{{Auth::user()->university_id}}" selected>{{Auth::user()->university->name}}</option>
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-sm-4" style="padding-top: 15px;">
                                            <label class="clear-top-margin"><i class="fa fa-universal-access"></i>Faculty</label>
                                            <select name="faculty_id" required>
                                                @foreach($faculties as $faculty)
                                                   <option  value="{{$faculty->id}}">{{$faculty->faculty_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-4" style="padding-top: 15px;">
                                            <label class="clear-top-margin"><i class="fa fa-mail-forward"></i>Staff Email Address</label>
                                            <input type="email" placeholder="Email" name="email" required/>
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
        </div>
@endsection
