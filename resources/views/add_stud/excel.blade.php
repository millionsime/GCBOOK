@extends('layouts.app')

@section('content')
    <h3 class="page-title">Upload Student Information</h3>
    
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block ">          
                    </div>
                <div class="col-lg-7"> 
                    
                    <div class="p-5">
                  
                    {!! Form::open(['method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'route' => ['add_stud.store']]) !!}
                      <!--{!! Form::label('department', 'Select Department*', ['class' => 'control-label fa']) !!}-->
                    <!--<select name="topic"  id="" class="form-control">-->
                    <!--        @foreach($depts as $topic) -->
                    <!--    <option value= "{{ $topic->id }}"> {{ $topic->title }} </option>-->
                    <!--        @endforeach-->
                    <!--    </select>-->
                        <p class="help-block"></p>
                    @if($errors->has('exam_type'))
                        <p class="help-block">
                            {{ $errors->first('exam_type') }}
                        </p>
                    @endif
                    {!! Form::label('Section', 'Section*', ['class' => 'control-label fa']) !!}
                        <select name="section"  id="" class="form-control">
                        <option value= "1">1</option>
                        <option value= "2">2</option>
                        <option value= "3">3</option>
                        <option value= "4">4</option>
                        <option value= "5">5</option>
                           
                        </select>
                            {!! Form::label('upload', 'Upload Excel*', ['class' => 'control-label fa fa-excel']) !!}
                            <input class = "col-xs-12 form-control" type="file" name = "files"  />
                            
                                <p class="help-block"></p>
                            @if($errors->has('exam_type'))
                                <p class="help-block">
                                    {{ $errors->first('files') }}
                                </p>
                            @endif
                        </div>
                </div>
            </div>
        </div>
        {!! Form::submit(trans('quickadmin.save'), ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>

    
@stop

