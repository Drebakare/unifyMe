@extends('layouts.landing.user_app')
@section('contents')

        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="dash-item">
                    <h6 class="item-title"><i class="fa fa-info-circle"></i>Add Students Grade</h6>
                    <div class="inner-item">
                        <form method="post" action="{{route('user.process-student-result')}}">
                            @csrf
                            <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th><i class="fa fa-user"></i>Name</th>
                                    <th><i class="fa fa-code"></i>Matric Number</th>
                                    <th><i class="fa fa-cogs"></i>Faculty</th>
                                    <th><i class="fa fa-cogs"></i>Department</th>
                                    <th><i class="fa fa-address-card"></i>Total Point</th>
                                    <th><i class="fa fa-address-card"></i>Total Unit</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $key => $student)
                                    <tr>
                                        <td>{{$student->student_name}}</td>
                                        <td><input name="matric_no_{{$key}}" value="{{$student->student_matric_no}}" type="text" placeholder="{{$student->student_matric_no}}" class="datatable-input"  /></td>
                                        <td>{{$student->faculty->faculty_name}}</td>
                                        <td>{{$student->department->department_name}}</td>
                                        <td><input name="total_point_{{$key}}" type="number" placeholder="Total Point" class="datatable-input" required/></td>
                                        <td><input name="total_unit_{{$key}}" type="number" placeholder="Total Unit" class="datatable-input" required/></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <input name="semester_yr_id" value="{{$semester}}" hidden />
                            <input name="maximum_number" value="{{count($students)}}" hidden />
                            <div class="table-action-box">
                                <button id="submit-button"><i class="fa fa-check"></i>Upload Result</button>
                            </div>
                        </form>
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
