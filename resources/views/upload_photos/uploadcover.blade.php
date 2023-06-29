@extends('layouts.app')

@section('content')
<h3 class="page-title">Upload Images that appear in your Year book</h3>
<div class="card o-hidden border-0 shadow-lg my-5">
    
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-2 d-none d-lg-block "></div>
            <div class="col-lg-7"> 
            <div class="form-group">
    </div>
                <div class="p-5">
                  
                    {!! Form::open(['method' => 'POST', 'route' => ['profilestore'], 'enctype'=>'multipart/form-data']) !!} 
                                      @csrf()
                        <div class="row no-gutters align-items-center">
                        </div>
                        <div class="row no-gutters align-items-center">         
                       </div>
                       <div class="row no-gutters align-items-center">         
                                <div class="col-lg-7 mr-2">
                                    {!! Form::label('cover', 'Select cover picture*', ['class' => 'control-label']) !!}
                                    <input type="file" name = "image" class="form-control"/>
                                    <p class="help-block"></p>
                                </div>
                                {{ Form::hidden('type', 'cover_picture') }}
                                <div class="col-lg-5">
                                {!! Form::label('access', 'Visible for*', ['class' => 'control-label fa']) !!}
                                    <select name="visible" class="form-control">
                                    <option value= "1">Everyone</option>
                                    <option value= "2">Only Me</option>
                                    <option value= "3">My Class Mates</option>
                                    </select>
                                </div>
                   </div>
                   <div class="row no-gutters align-items-center">         
               </div>
                            
                </div>
            </div>
        </div>
    </div> 
    {!! Form::submit(trans('Upload'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>
@stop



