@extends('layouts.landing.user_app')
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
                            <h6 class="item-title"><i class="fa fa-folder-open-o"></i>Requests</h6>
                            <div class="inner-item">
                                <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th><i class="fa fa-user"></i>Request From</th>
                                        <th><i class="fa fa-id-card"></i>Email Address</th>
                                        <th><i class="fa fa-id-card"></i>Phone Number</th>
                                        <th><i class="fa fa-book"></i>Student Name</th>
                                        <th><i class="fa fa-book"></i>Matric No</th>
                                        <th><i class="fa fa-cogs"></i>Department</th>
                                        <th><i class="fa fa-cogs"></i>Status</th>
                                        <th><i class="fa fa-tasks"></i>ACTION</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($requests as $key => $request)
                                        <tr>
                                            <td>{{$request->user->name}}</td>
                                            <td>{{$request->user->email}}</td>
                                            <td>{{$request->user->phone_number}}</td>
                                            <td>{{$request->student->student_name}}</td>
                                            <td>{{$request->student->student_matric_no}}</td>
                                            <td>{{$request->department->department_name}}</td>
                                            <td>
                                                @if($request->request_status == 0)
                                                    Pending
                                                @else
                                                    Request Granted
                                                @endif
                                            </td>
                                            <td class="action-link">
                                                @if($request->request_status == 0)
                                                    <a class="edit" href="{{route('user.accept-requests', ['id' => $request->student->id, 'request_id' => $request->id])}}" ><i class="fa fa-edit"></i></a>
                                                @else
                                                    <a class="delete" href="{{route('user.reject-requests', ['id' => $request->student->id, 'request_id' => $request->id])}}" ><i class="fa fa-remove"></i></a>
                                                @endif
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

@endsection
