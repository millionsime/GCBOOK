@extends('layouts.app')

@section('content')
    <h3 class="page-title">Edit Your Profile</h3>
    
    {!! Form::model($user, ['method' => 'PUT', 'route' => ['profiles.update', $user->id]]) !!}
    @csrf()
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
                    {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
             
                    {!! Form::label('password', 'Add New Password', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                     {!! Form::label('confirmpassword', 'Confirm New Password', ['class' => 'control-label']) !!}
                    {!! Form::password('confirmpassword',  ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('confirmpassword'))
                        <p class="help-block">
                            {{ $errors->first('confirmpassword') }}
                        </p>
                    @endif
                </div>
            </div>
            <script>
                var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
            </script>
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    </div>
@stop

