@extends('layouts.app')

@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block ">          
                </div>
            <div class="col-lg-7"> 
                
                <div class="p-5">
                    <h3 class="page-title padding">Add New Department</h3>
                    {!! Form::open(['method' => 'POST', 'route' => ['departments.store']]) !!}      
                    {!! Form::label('title', 'College/School*', ['class' => 'control-label']) !!}
                    <select name="college_id"  id="" class="form-control">
                    @foreach ($college as $colleg)
                     <option value= "{{ $colleg->id }}">{{ $colleg->title }}</option>
                    @endforeach
                    </select>
                        {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                        {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                             <p class="help-block"></p>
                            @if($errors->has('title'))
                             <p class="help-block">
                            {{ $errors->first('title') }}
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

