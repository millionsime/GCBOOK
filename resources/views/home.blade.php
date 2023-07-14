@extends('layouts.app')
{{-- @extends('dashs.index') --}}
@section('content')
    <div class="row">
       
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading ">Welcome! </div>
            
                    @if(Auth::user()->isAdmin())

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Total Number of New Requests
                                                    </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totaladrequest }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                
                                    Total Number of Approved Requests</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $totaladapprrequest }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info  shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                
                                                    Total Number of Requests</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalsstud }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            
                                                <h1></h1>
                                                Total</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalpay  }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    @endif


                @if(Auth::user()->isStudent())
                <div class="panel-body">
                    <div class="row">
                        <div class="col col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <h1>GC Book &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <i class="fas fa-info text-red-300"></i>
                                            </h1>
                                            </div>
                                                    <p align="justify">If you apply for GC Book Service you will get 
                                                        two main services provided in the form of 
                                                        Web-site and Mobile application
                                                    </p> 
                                        
                                            <p class="text text-danger bg-gray" align="justify">Please click on GC Book menu and click on request to start your GC book request</p>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="col col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        <h1>Videos</h1>
                                                    <div> 
                                                        Mobile App Video
                                                    </div>
                                                    <div> 
                                                        Web-site Video
                                                    </div> 
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-video fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif 


                @if(Auth::user()->isTeacher())
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Total Number of New Requests
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $totalgcbookrequest }}
                                                </div>
                                            </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Number of Approved Requests
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"> 
                                            {{ $totalapproved }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info  shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                               
                                                Total Number of students</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalsstud }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endif
            </div>
        </div>
    </div>
@endsection
