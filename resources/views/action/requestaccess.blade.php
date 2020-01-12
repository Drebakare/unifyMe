@extends('layouts.landing.app')
@section('contents')
    <!-- Page Title Section -->
    <div class="row page-title page-title-about">
        <div class="container">
            <h2><i class="fa fa-universal-access"></i>REQUEST FOR AN ACCESS</h2>
        </div>
    </div>

    <!-- contact row -->
    <div class="row contact-row">
        <div class="container">
            <div class="contact-form col-sm-6">
                <div class="col-xs-12">
                    <h3><i class="fa fa-edit"></i>Kindly Fill the Form Below</h3>
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
                </div>
                <form method="post" action="{{route('submit-request-form')}}">
                    @csrf
                    <div class="col-xs-6">
                        <label>Full Name</label>
                        <input type="text" placeholder="Full Name" class="form-control" name="full_name" required>
                    </div>
                    <div class="col-xs-6">
                        <label>Staff Id</label>
                        <input type="text" placeholder="Staff Id" class="form-control" name="staff_id" required>
                    </div>
                    <div class="col-xs-12">
                        <label>Institution</label>
                        <select name="institution" class="form-control" required>
                            <option>- Select -</option>
                            @foreach($universities as $university)
                                <option value="{{$university->id}}">{{$university->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-6">
                        <label>Phone Number</label>
                        <input type="tel" placeholder="Phone Number" class="form-control" name="phone_number" max="11" required>
                    </div>
                    <div class="col-xs-6">
                        <label>Email Address</label>
                        <input type="email" placeholder="Email Address" class="form-control" name="email_address" required>
                    </div>
                    <div class="col-xs-12">
                        <button  type="submit" class="submit-contact-form"><i class="fa fa-paper-plane"></i> SEND</button>
                    </div>
                </form>

                <div class="clearfix"></div>
            </div>
            <div class="col-sm-6 address-box">
                <h3><i class="fa fa-phone"></i>CONTACT US.</h3>
                <div class="address-body">
                    <div class="address-item">
                        <div class="col-xs-1">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="col-xs-11">
                            <p>Computer Center Building, Obafemi Awolowo University, Ile-Ife.</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="address-item">
                        <div class="col-xs-1">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <div class="col-xs-11">
                            <p>emmanueldmle@gmail.com</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="address-item">
                        <div class="col-sm-1">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="col-xs-11">
                            <p>+2348102780566</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="address-item no-border">
                        <div class="col-xs-1">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <div class="col-xs-11">
                            <p>MON to FRI: 09:00 AM - 03:00 PM </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@endsection