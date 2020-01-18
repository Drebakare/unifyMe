@extends('layouts.landing.user_app')
@section('contents')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <h5 class="page-title"><i class="fa fa-user"></i>Add / Update Student Bio-Data</h5>
                    <div class="section-divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <div class="col-md-12">
                        <div class="dash-item first-dash-item">
                            <h6 class="item-title"><i class="fa fa-user"></i>Student Bio-Data</h6>
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
                                @if(!$biodata)
                                    <form method="post" action="{{route("user.submit-add-student-biodata", ["id" => $id])}}">
                                    @csrf
                                    <div class="dash-form">
                                        <div class="col-sm-4 hidden">
                                            <input type="text" name="student_id" value="{{$id}}" required hidden />
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="clear-top-margin"><i class="fa fa-sort-numeric-asc"></i>Email</label>
                                            <input type="email" placeholder="Email" name="email"  required/>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="clear-top-margin"><i class="fa fa-sort-numeric-asc"></i>Phone Number</label>
                                            <input type="tel" placeholder="Phone Number" name="phone_number" max="11"  required/>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="clear-top-margin"><i class="fa fa-sort-numeric-asc"></i>DOB</label>
                                            <input type="date" placeholder="Date of Birth" name="dob" max="11"  required/>
                                        </div>
                                        <div class="col-sm-4" style="padding-top: 15px;">
                                            <label class="clear-top-margin"><i class="fa fa-home"></i>Nationality</label>
                                            <select name="nationality" required>
                                                @foreach($nations as $nation)
                                                    <option  value="{{$nation->name}}"> {{$nation->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-4" style="padding-top: 15px;">
                                            <label class="clear-top-margin"><i class="fa fa-home"></i>State</label>
                                            <select name="state" required>
                                                @foreach($states as $state)
                                                    <option  value="{{$state->name}}"> {{$state->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-4" style="padding-top: 15px;">
                                            <label class="clear-top-margin"><i class="fa fa-sort-numeric-asc"></i>Town</label>
                                            <input type="text" placeholder="Town" name="town"  required/>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-sm-12">
                                            <button type="submit" id="submit-button"><i class="fa fa-paper-plane"></i> SAVE</button>
                                        </div>
                                    </div>
                                </form>
                                @else
                                        <form method="post" action="{{route("user.submit-update-student-biodata", ["id" =>$id])}}">
                                            @csrf
                                            <div class="dash-form">
                                                <div class="col-sm-4 hidden">
                                                    <input type="text" name="student_id" value="{{$id}}" required hidden />
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="clear-top-margin"><i class="fa fa-sort-numeric-asc"></i>Email</label>
                                                    <input type="email" placeholder="Email" name="email" value="{{$biodata->email_address}}"  required/>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="clear-top-margin"><i class="fa fa-sort-numeric-asc"></i>Phone Number</label>
                                                    <input type="tel" placeholder="Phone Number" name="phone_number" value="{{$biodata->phone_number}}" max="11"  required/>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="clear-top-margin"><i class="fa fa-sort-numeric-asc"></i>DOB</label>
                                                    <input type="date" placeholder="Date of Birth" name="dob" max="11" value="{{$biodata->dob}}"  required/>
                                                </div>
                                                <div class="col-sm-4" style="padding-top: 15px;">
                                                    <label class="clear-top-margin"><i class="fa fa-home"></i>Nationality</label>
                                                    <select name="nationality" required>
                                                        @foreach($nations as $nation)
                                                            <option  value="{{$nation->name}}" @if($nation->name == $biodata->nationality) selected @endif> {{$nation->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-4" style="padding-top: 15px;">
                                                    <label class="clear-top-margin"><i class="fa fa-home"></i>State</label>
                                                    <select name="state" required>
                                                        @foreach($states as $state)
                                                            <option  value="{{$state->name}}" @if($state->name == $biodata->state) selected @endif> {{$state->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-4" style="padding-top: 15px;">
                                                    <label class="clear-top-margin"><i class="fa fa-sort-numeric-asc"></i>Town</label>
                                                    <input type="text" placeholder="Town" name="town" value="{{$biodata->town}}" required/>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-sm-12">
                                                    <button type="submit" id="submit-button"><i class="fa fa-paper-plane"></i>Update</button>
                                                </div>
                                            </div>
                                        </form>
                                @endif
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
