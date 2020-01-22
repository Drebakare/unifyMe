@extends('layouts.landing.user_app')
@section('contents')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <h5 class="page-title"><i class="fa fa-users"></i>Student Result</h5>
                    <div class="section-divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <div class="col-lg-12">
                        <div class="dash-item first-dash-item">
                            <h6 class="item-title"><i class="fa fa-check-circle-o"></i>{{$student->student_name }} Academic Result ({{$student->student_matric_no}})</h6>
                            <div class="inner-item">
                                <table class="col-12">
                                    <thead>
                                    <tr>
                                        <td colspan="4" class="col-sm-12">Result Details</td>
                                        <td rowspan="3"> Total Point</td>
                                        <td rowspan="3"> Total Unit</td>
                                        <td colspan="2"> GP</td>
                                    </tr>
                                    <tr>
                                        <td>Year</td>
                                        <td colspan="2">Semester</td>
                                        <td> Status</td>
                                        <td> Grade</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($results as $result)
                                        <tr>
                                            <td>{{$result->semesteryears->year->year}}</td>
                                            <td colspan="2">{{$result->semesteryears->semesters->semester}}</td>
                                            <td> Active</td>
                                            <td> {{$result->total_point}}</td>
                                            <td>{{$result->total_unit}}</td>
                                            <td>{{round(($result->total_unit/$result->total_point)*$school_grade_point, 2)}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="4" class="footer">Total</td>
                                        <td>
                                           <?php
                                                $total_point= 0 ;
                                                $total_unit = 0;
                                            ?>
                                            @foreach($results as $result)
                                                @php
                                                    $total_point = $total_point + $result->total_point
                                                @endphp
                                            @endforeach
                                            {{$total_point}}
                                        </td>
                                        <td colspan="2">
                                            @foreach($results as $result)
                                                @php
                                                    $total_unit = $total_unit + $result->total_unit
                                                @endphp
                                            @endforeach
                                            {{$total_unit}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="footer">CGPA</td>
                                        <td colspan="3">{{round(($total_unit/$total_point)*$school_grade_point, 2)}} out of {{$school_grade_point}}.00 </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section("page_css")
    <style>
        td {
            border: 1px solid #726E6D;
            padding: 15px;
        }

        thead{
            font-weight:bold;
            text-align:center;
            background: #625D5D;
            color:white;
        }

        table {
            border-collapse: collapse;
        }

        .footer {
            text-align:right;
            font-weight:bold;
        }

        tbody >tr:nth-child(odd) {
            background: #D1D0CE;
        }
    </style>
@endsection
