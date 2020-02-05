@extends('layouts.landing.admin_app')
@section('contents')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <h5 class="page-title"><i class="fa fa-folder-open"></i>All Requests</h5>
                    <div class="section-divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <div class="col-lg-12">
                        <div class="dash-item first-dash-item">
                            <h6 class="item-title"><i class="fa fa-folder-open-o"></i>Requests Status</h6>
                            <div class="inner-item">
                                <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th><i class="fa fa-user"></i>Name</th>
                                        <th><i class="fa fa-id-card"></i>University</th>
                                        <th><i class="fa fa-book"></i>Staff ID</th>
                                        <th><i class="fa fa-book"></i>Phone number</th>
                                        <th><i class="fa fa-book"></i>Email Address</th>
                                        <th><i class="fa fa-tasks"></i>ACTION</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($requests as $key => $request)
                                        @foreach($requests as $request)
                                            <tr>
                                                <td>{{$request->name}}</td>
                                                <td>{{$request->institution_name}}</td>
                                                <td>{{$request->staff_id}}</td>
                                                <td>{{$request->phone_number}}</td>
                                                <td>{{$request->email_address}}</td>
                                                <td class="action-link">
                                                    <a class="edit" href="{{route('admin.add-staff', ['staff_id' => $request->staff_id])}}" title="Add Staff" ><i class="fa fa-plus-circle"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
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
