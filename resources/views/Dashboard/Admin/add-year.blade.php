@extends('layouts.landing.admin_app')
@section('contents')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <h5 class="page-title"><i class="fa fa-calendar-times-o"></i>Add New Academic Year</h5>
                    <div class="section-divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <div class="col-md-12">
                        <div class="dash-item first-dash-item">
                            <h6 class="item-title"><i class="fa fa-calendar-times-o"></i>Year Info</h6>
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
                                <form method="post" action="{{route("admin.submit-add-year-form")}}">
                                    @csrf
                                    <div class="dash-form">
                                        <div class="col-sm-4">
                                            <label class="clear-top-margin"><i class="fa fa-calendar-times-o"></i>Staff Name</label>
                                            <input type="number" placeholder="Year" name="year" required min="2019" />
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-sm-12">
                                        <button type="submit" id="submit-button"><i class="fa fa-paper-plane"></i> SAVE</button>
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
                    <div class="col-lg-12">
                        <div class="dash-item first-dash-item">
                            <div class="inner-item">
                                <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th><i class="fa fa-calendar-times-o"></i>Year</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($years as $key => $year)
                                        <tr>
                                            <td>{{$year->year}}</td>
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
