@extends('layouts.app')

@section('content')
    <h3 class="page-title">Exams</h3>
    
    {!! Form::model($exams, ['method' => 'PUT', 'route' => ['exams.update', $exams->id]]) !!}
    @csrf
    <div class="card o-hidden border-0 shadow-lg my-5">
        
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block "></div>
                <div class="col-lg-7"> 
                <div class="form-group">
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
    </div>
                    <div class="p-5">
                    {!! Form::label('exam_name', 'Exam Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('exam_name', old('exam_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('exam_name'))
                        <p class="help-block">
                            {{ $errors->first('exam_name') }}
                        </p>
                    @endif
                    {!! Form::label('exam_duration', 'Exam_Duration*', ['class' => 'control-label']) !!}
                    {!! Form::number('exam_duration', old('exam_duration'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('exam_duration'))
                        <p class="help-block">
                            {{ $errors->first('exam_duration') }}
                        </p>
                    @endif
                    {!! Form::label('exam_grade', 'Grade*', ['class' => 'control-label']) !!}
                    {!! Form::number('exam_grade', old('exam_grade'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('grade'))
                        <p class="help-block">
                            {{ $errors->first('grade') }}
                        </p>
                    @endif
                    
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    </div>
@stop

