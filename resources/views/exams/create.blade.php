@extends('layouts.app')

@section('content')
    <h3 class="page-title"> Add Exam</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['exams.store']]) !!}

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block ">          
                    </div>
                <div class="col-lg-7"> 
                    
                    <div class="p-5">
                    {!! Form::label('typetitle', 'Exam name*', ['class' => 'control-label']) !!}
                    {!! Form::text('exam_name', old('exam_name'), ['class' => 'form-control', 'placeholder' => 'Model Exam 1']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('exam_name'))
                        <p class="help-block">
                            {{ $errors->first('exam_name') }}
                        </p>
                    @endif
             
                    {!! Form::label('datetitle', 'Date Created*', ['class' => 'control-label']) !!}
                    {!! Form::date('exam_date', old('exam_date'), ['class' => 'form-control', 'placeholder' => 'DD/MM/YYYY']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('exam_date'))
                        <p class="help-block">
                            {{ $errors->first('exam_date') }}
                        </p>
                    @endif
              
                    {!! Form::label('typetitle', 'Exam Duration(in minutes)*', ['class' => 'control-label']) !!}
                    {!! Form::number('exam_duration', old('exam_duration'), ['class' => 'form-control', 'placeholder' => 'put it in minutes']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('exam_duration'))
                        <p class="help-block">
                            {{ $errors->first('exam_duration') }}
                        </p>
                    @endif
          
                    {!! Form::label('gradetitle', 'Maximum Grade*', ['class' => 'control-label']) !!}
                    {!! Form::number('exam_grade', old('exam_grade'), ['class' => 'form-control', 'placeholder' => '100']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('exam_grade'))
                        <p class="help-block">
                            {{ $errors->first('exam_grade') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {!! Form::submit("Add", ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    </div>
    

    
@stop

