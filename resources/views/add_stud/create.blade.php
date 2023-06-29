@extends('layouts.app')

@section('content')

<h3 class="page-title">Register New Student</h3>
<div class="card o-hidden border-0 shadow-lg my-5">
    
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block "></div>
            <div class="col-lg-7"> 
            <div class="form-group">
        @if(session()->has('done'))
        <div class="alert alert-success">
            {{ session()->get('done') }}
        </div>
        @endif
    </div>
                <div class="p-5">
                  
                    {!! Form::open(['method' => 'POST', 'route' => ['savestud']]) !!} 
                                      @csrf()
                             
                                    {!! Form::label('email', 'Id*', ['class' => 'control-label']) !!}
                                    {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('email'))
                                        <p class="help-block">
                                            {{ $errors->first('email') }}
                                        </p>
                                    @endif
                                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('name'))
                                        <p class="help-block">
                                            {{ $errors->first('name') }}
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
                </div>
            </div>
        </div>
    </div> 
    {!! Form::submit(trans('quickadmin.save'), ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
</div>
    
@stop

