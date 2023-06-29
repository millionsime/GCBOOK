@extends('layouts.app')

@section('content')
    <h3 class="page-title">Edit Question Text</h3>
    
    {!! Form::model($question, ['method' => 'PUT', 'route' => ['questions.update', $question->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::textarea('question_text', old('question_text'), ['class' => 'ckeditor form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('question_text'))
                        <p class="help-block">
                            {{ $errors->first('question_text') }}
                        </p>
                    @endif
                </div>
            </div> {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
        </div>

    
    <script src="{{ asset('//cdn.ckeditor.com/4.14.1/standard/ckeditor.js') }}"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
@stop

