@extends('layouts.app')

@section('content')
    <h3 class="page-title">Create students</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                  
                    {!! Form::open(['method' => 'POST','files' => 'true','enctype'=>'multipart/form-data', 'route' => ['add_stud.store']]) !!}
                    
                    <select name="topic"  id="" class="form-control">
                            @foreach($depts as $topic) 
                        <option value= "{{ $topic->id }}"> {{ $topic->title }} </option>
                            @endforeach
                        </select>
                        <select name="section"  id="" class="form-control">
                        <option value= "1">1</option>
                        <option value= "2">2</option>
                        <option value= "3">3</option>
                        <option value= "4">4</option>
                        <option value= "5">5</option>
                           
                        </select>
                    <input class = "col-xs-12 form-control" type="file" name = "files"  />
                 {!! Form::submit(trans('quickadmin.save'), ['class' => 'btn btn-danger']) !!}
                 {!! Form::close() !!}
                </div>
            </div>

            

        </div>
    </div>

    
@stop

