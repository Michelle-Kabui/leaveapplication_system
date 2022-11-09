@extends('layouts.master')

@section('content')

<div class="container-fluid px-4 dashboard-container">
                        <h1 class="mt-4 dashboard-heading">Dashboard</h1>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">
                                        Total Employees
                                        <h3>{{$users}}</h3>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('admin/viewusers')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        Total Employees on Leave
                                        <h3>{{$onleave}}</h3>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small stretched-link" href="{{url('admin/usersonleave')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">
                                        Total Employees at work
                                        <h3>{{$atwork}}</h3>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('admin/usersatwork')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">
                                        Total Pending Leaves
                                        <h3>{{$pleaves}}</h3>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('admin/viewpleaves')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">
                                        Total Approved Leaves
                                        <h3>{{$aleaves}}</h3>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('admin/viewaleaves')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">
                                        Total Rejected Leaves
                                        <h3>{{$rleaves}}</h3>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('admin/viewrleaves')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="departments">
                            <h1>Departments</h1>
                            @foreach ($departments as $department)
                            <div class="department">
                                <h1>{{ $department->departmentname }} staff at work</h1>
                                @php
                                $count = 0;
                                @endphp
                                @foreach($usersArray as $user)
                                    @php
                                    if ($user->department == 'Finance') {

                                        $count = $count + 1;
                                    }
                                    @endphp
                                @endforeach
                                @php
                                $totalUsers = $usersArray->count();
                                @endphp
                                <p>{{$count}} Employees | {{$count/$totalUsers*100}}% </p>
                                <div class="percent" style="width: 10vw;">
                                    <div class="percent-child" style="width:{{$count/$totalUsers*10 }}vw"></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @php
                        $novCount = 0;
                        foreach($leaves as $leave) {
                            if(str_contains($leave->from_date, '-11-')){
                                $novCount++;
                            }
                        }
                        
                        @endphp
                        <div class="employee-graph">
                            <div class="graph">
                                <div class="y-scale">
                                    <p>60</p>
                                    <p>50</p>
                                    <p>40</p>
                                    <p>30</p>
                                    <p>20</p>
                                    <p>10</p>
                                    <p>0</p>
                                </div>
                                <div class="bars-and-x-scale">
                                    <div class="bars">
                                        <div class="aug" style="height: 5vh; width: 3vw; background-color: #001535; border-radius: 10px; margin: 0 2vw;"></div>
                                        <div class="sep" style="height: 10vh; width: 3vw; background-color: #001535; border-radius: 10px; margin: 0 2vw;"></div>
                                        <div class="oct" style="height: 5vh; width: 3vw; background-color: #001535; border-radius: 10px; margin: 0 2vw;"></div>
                                        <div class="nov" style="width: 3vw; background-color: #a4b31d; border-radius: 10px; margin: 0 2vw;height: {{ $novCount }}"></div>
                                    </div>
                                    <div class="x-scale">
                                        <p>Aug</p>
                                        <p>Sep</p>
                                        <p>Oct</p>
                                        <p>Nov</p>
                                    </div>
                                </div>
                            </div>
                            <div class="graph-description">
                                <h1>No. of Employees on Leave</h1>
                            </div>
                        </div>
                    </div>

@endsection