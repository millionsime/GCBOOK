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
                                      {!! Form::text('last_word',  old('last_word'), ['class' => 'form-control', 'placeholder' => 'write your last word', 'id'=>'demo']) !!}
                </div>
            </div>
        </div>
    </div> 
    {!! Form::submit(trans('quickadmin.save'), ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
</div>
@else
<h3 class="page-title">You can edit your lastword!</h3>
<div class="card o-hidden border-0 shadow-lg my-5">
    
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            
            <div class="col-lg-2 d-none d-lg-block "></div>
            <div class="form-group">
            </div>
            <div class="col-lg-7"> 
            <div class="form-group">
        @if(session()->has('lastwordupdate'))
        <div class="alert alert-success">
            {{ session()->get('lastwordupdate') }}
        </div>
        @endif
    </div>
    
                <div class="p-5">
                  
                    {!! Form::open(['method' => 'POST', 'route' => ['editlastword', $lw->id]]) !!} 
                                      @csrf()
                                      {!! Form::label('typetitle', 'Edit Your Last word*', ['class' => 'control-label fa fa-edit']) !!}
                                     <input type="text" id="demo" name="lastword" value="{{$lw->lastword}}" class="form-control text text-danger" autofocus/>
                                    </div>
            </div>
        </div>
    </div> 
    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
</div>
@endif
<div class="card o-hidden border-0 shadow-lg my-5">
    
    <div class="card-body p-0 m-2">
        <h3> Suggestions</h3>
        <div class="ml-2">
            @foreach($prelast as $prelastword)
            <span class="ml-2 mr-2" onclick="myFunction('{{$prelastword->lastword}}')" style="cursor: pointer;" >{{ $prelastword->lastword}}</span>
            @endforeach
        </div>
<script>
function myFunction(values) {
  document.getElementById("demo").value = values;
}
</script>
    </div>
</div>
@stop

