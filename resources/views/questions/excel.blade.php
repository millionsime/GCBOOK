@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.questions.title')</h3>
    <div class="card o-hidden border-0 shadow-lg my-5">
        
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block "></div>
                <div class="col-lg-7"> 
                    <div class="p-5">
    @if (Session::has('success'))
        <div class="row">
          <div class="col-md-8 col-md-offset-1">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="false">×</button>
                <h5>{!! Session::get('success') !!}</h5>   
            </div>
          </div>
        </div>
    @endif
                    
                    {!! Form::open(['method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'route' => ['questions.upload_excel']]) !!}
                    <select name="exam_id"  id="" class="form-control">
                            @foreach($exams as $exam) 
                        <option value= "{{ $exam->id }}"> {{ $exam->exam_name }} </option>
                            @endforeach
                        </select>
                    <br>
                    <input class = "col-xs-4 form-control" type="file" name = "files"  />
                </div>
            </div>
            </div>
        </div>
            {!! Form::submit(trans('quickadmin.save'), ['class' => 'btn btn-primary center']) !!}
            {!! Form::close() !!}
        </div>

@stop


