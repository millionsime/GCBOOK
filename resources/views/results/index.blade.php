@extends('layouts.app')

@section('content')

<h3 class="page-title"></h3>
<div class="card o-hidden border-0 shadow-lg my-5">
    
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            
            <div class="col-lg-4"> 
               
               <div class="p-3">
                   <label>Exam name</label>
                   <form action="{{ route('resultpage')}}" method= "GET">
                                   @csrf
                    <select name="exam"  id="" class="form-control">
                        @foreach($exams as $exam)
                        <option value= "{{ $exam->id}}">{{ $exam->exam_name}}</option>
                        @endforeach
                        
                    </select>
                </div> 
                </div>
                </div>
                <div class="col-lg-4">
                    <div class="p-3">
                        <p></p>
                      
                        <div>
                             <button type ="submit" class="btn btn-success">Show</button>
                                      
                                    </div>
                                    </form>
                
                    </div>
                </div>
                </div>
            </div>
             
        </div>
    </div> 
   
</div>
@stop

