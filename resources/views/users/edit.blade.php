@extends('layouts.app')

@section('content')
    <h3 class="page-title">Teachers</h3>
    <small class="muted">@lang('quickadmin.edit')</small>
    {!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update', $user->id]]) !!}
    @csrf
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block ">          
                    </div>
                <div class="col-lg-7"> 
                    
                    <div class="p-5">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
           
                    {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
             
                    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
           
                    {!! Form::label('dept_id', 'Department*', ['class' => 'control-label']) !!}
                    {!! Form::select('dept_id', $depts, old('dept_id'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dept_id'))
                        <p class="help-block">
                            {{ $errors->first('dept_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@stop

