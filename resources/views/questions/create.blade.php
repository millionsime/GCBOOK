@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.questions.title')</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                  
                    {!! Form::open(['method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'route' => ['questions.store']]) !!}
                    <select name="topic"  id="" class="form-control">
                            @foreach($topics as $topic) 
                        <option value= "{{ $topic->id }}"> {{ $topic->title }} </option>
                            @endforeach
                        </select>
                    <input class = "col-xs-12 form-control" type="file" name = "files"  />
                 {!! Form::submit(trans('quickadmin.save'), ['class' => 'btn btn-danger']) !!}
                 {!! Form::close() !!}
                </div>
            </div>

            

        </div>
    </div>

    
@stop

