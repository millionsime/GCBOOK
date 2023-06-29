@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>
    
    {!! Form::model($user, ['method' => 'PUT', 'route' => ['add_stud.update', $user->id]]) !!}
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
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                    {!! Form::label('email', 'Id*', ['class' => 'control-label']) !!}
                    {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                    {!! Form::label('section', 'Section*', ['class' => 'control-label']) !!}
                    {!! Form::number('section', old('section'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('section'))
                        <p class="help-block">
                            {{ $errors->first('section') }}
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

