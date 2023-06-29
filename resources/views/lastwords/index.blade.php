@extends('layouts.app')

@section('content')
   

@if(!$lastword_check)
<h3 class="page-title">Add your lastword that appear in your Year book</h3>
<div class="card o-hidden border-0 shadow-lg my-5">
    
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            
            <div class="col-lg-2 d-none d-lg-block "></div>
            <div class="form-group">
            </div>
            <div class="col-lg-7"> 
            <div class="form-group">
        @if(session()->has('lastwordsent'))
        <div class="alert alert-success">
            {{ session()->get('lastwordsent') }}
        </div>
        @endif
    </div>
    
                <div class="p-5">
                  
                    {!! Form::open(['method' => 'POST', 'route' => ['savelastword']]) !!} 
                                      @csrf()
                                      {!! Form::label('typetitle', 'Add Last word*', ['class' => 'control-label']) !!}
                                      {!! Form::text('last_word', old('last_word'), ['class' => 'form-control', 'placeholder' => 'write your last word']) !!}
                </div>
            </div>
        </div>
    </div> 
    {!! Form::submit(trans('quickadmin.save'), ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
</div>
@section