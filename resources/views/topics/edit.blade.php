@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.topics.title')</h3>
    
    {!! Form::model($topic, ['method' => 'PUT', 'route' => ['topics.update', $topic->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    
                    <select  name="department"  id="" class="form-control">
                        @foreach($departments as $department) 
                    <option value= "{{ $department->id }}" @if($topic->department_id == $department->id) selected @endif> {{ $department->title }} </option>
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

    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

