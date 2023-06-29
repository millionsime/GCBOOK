
@extends('layouts.app')

@section('content')
@if (count($exams) > 0)
@foreach ($exams as $exam)

<div class="col-xl-7col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="form-group">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
            </div>
            <div class="col no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Exam Name
                        </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $exam->exam_name }}</div>
                </div>
                
                <div class="col mr-2">
                  
                       
                    <div class="h5 mb-0 font-weight-bold items-center ">
                    {{$exam->numquestion($exam->id)}} 
                        <a href="{{ route('questions.showexam', [$exam->id]) }}" class="btn btn-info fa fa-question">Open Questions</a>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
</div>

@endforeach
@else
<p class="text text-danger">You have not created any exam yet!</p>
<a href="{{ route('exam.create') }}" class="btn btn-primary"> Create Exam</a>
@endif





@endsection