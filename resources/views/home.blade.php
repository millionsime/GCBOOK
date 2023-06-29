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
                                           
                            Exam</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalExams }}</div>
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
                                          
                            Total Question in database</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $questions }}</div>
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
                                           
                                            Total Number of candidates</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $students }}</div>
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
                                        Exam Given Yet</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $quizzes  }}</div>
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
                       
                      @if (count($examInfo) > 0)
                           @foreach($examInfo as $exami) 
                           @if($exami->checkQuestion($exami->id))
                         
                           <div class="col mb-5" >
                                 <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-5">
                                        
                                        <div class="mb-1 center">
                                           
                           
                                         <p>This  <strong class =" text-xs font-weight-bold  text-uppercase">{{$exami->exam_name }}
                                        </strong> from &nbsp;&nbsp;&nbsp;
                                         <strong class="text-xs font-weight-bold text-uppercase">{{$exami->department->title}}</strong> Department</p>
                                        </p>Maximum Time Given is!
                                         <strong class="text-xs font-weight-bold  text-uppercase"> {{$exami->exam_duration}} min</strong> </p> 
                                         <p> It Contains  
                                         <strong class="text-xs font-weight-bold  text-danger text-uppercase">
                                             {{$exami->numquestionstud($exami->id)}}
                                         </strong>  Questions</p></div> 
                                   </div>
                                </div>
                                 <div>
                                    @if(!$exami->checkResult($exami->id))
                                    <div class="text-xs font-weight-bold text-underlined text-upercase ">
                                        
                                        <h5><strong><u> Please Read the following instruction before starting the exam</u></strong></h5>
                                     </div>
                                    <a class="btn btn-primary" href="{{ route('taketest',[$exami->id]) }}">Take Exam</a>   
                                @else
                                <p class="text text-danger bg-gray">Exam Taken!</p>
                                <strong class="text-xs font-weight-bold  text-uppercase">You have Scored  {{$exami->result($exami->id)->correct}} / {{ $exami->numquestionstud($exami->id) }}</strong> </p> 
                                         
                                @endif    
                                </div>
                            </div>
                        </div>
                    </div> 
                    <hr>
                @endif
                    @endforeach 
                    @endif
                    {{-- @else
                    
                    
                    
                  
                     <div class="col-xl-10 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                               
                                <p>We Have no exams For You Yet!  Thank you for your visit!</p>
                                </div>
                                
                                </div>
                            </div>
                        </div></div></div>
                        
                        
                    @endif --}}
                     
              
                @endif 


                @if(Auth::user()->isTeacher())
                <p>{{$changepass}}</p>
                    <div class="panel-body">
                        <div class="row">
 <div class="col-xl-3 col-md-6 mb-4">
     
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                               
                                Exam</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalExams }}</div>
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
                                              
                                Total Question in database</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $totalQuestion }}</div>
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
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $students }}</div>
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
