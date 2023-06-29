@extends('layouts.app')

@section('content')
@if (count($exams) > 0)
   <div class="form-group">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
            </div>
@foreach ($exams as $exam)

<div class="col-xl-7col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
         
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Exam Name
                        </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $exam->exam_name }}</div>
                </div>
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                       Duration
                        </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $exam->exam_duration }} <code>min</code></div>
                </div>
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                         Questions Added 
                        </div>
                       
                    <div class="h5 mb-0 font-weight-bold items-center ">
                    {{$exam->numquestion($exam->id)}} 
                        <a href="{{ route('questions.showexam', [$exam->id]) }}" class="btn btn-info fa fa-question">Add Question</a>
                    </div>
                </div>
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Maximum Grade 
                        </div>
                    <div class="h5 mb-0 font-weight-bold items-center ">{{ $exam->exam_grade }} </a>
                    </div>
                </div>
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Exam Status
                        </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                         @if($exam->status==0)          
                        <a href="{{ route('update_stat',[$exam->id]) }}"><code class="text-danger">off </code>&nbsp;<p class="btn btn-primary">   Start </p></a>
                        @else  
                             <a href="{{ route('update_status',[$exam->id]) }}"><code class="text-primary">on </code>&nbsp;<p class="btn btn-danger">   Stop </p></a>
                        @endif  </div>
                </div>
            </div>
            <div class="justify-content-end">
            <a class="btn fa fa-edit" href="{{ route('editexam',[$exam->id]) }}">Edit</a>
            {{-- <a class="btn fa fa-delete" href="{{ route('update_status',[$exam->id]) }}">Delete</a> --}}
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
