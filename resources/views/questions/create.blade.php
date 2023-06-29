 
@extends('layouts.app')
@section('content')
    <h3 class="page-title">@lang('quickadmin.questions.title')</h3>
    <script>
      document.getElementById('interface-output').onchange = function() {
        localStorage.setItem('selectedtem', document.getElementById('interface-output').value);
        
      };

      if (localStorage.getItem('selectedtem')) {
        document.getElementById('interface-output').options[localStorage.getItem('selectedtem')].selected = true;
      }
</script>
    {!! Form::open(['method' => 'POST', 'route' => ['questions.store']]) !!}
    <?php 
    $dpt = Auth::User()->dept_id;
    ?>
   <p>
                <a href="{{ route('excel') }}" class="btn btn-success left fa fa-book col-xs-2">Upload excel</a>
                {{-- <a href="{{ route('QuestionEssay.essay_create') }}" class="btn btn-success"> @lang('quickadmin.add_new_essay')  </a> --}}
            </p>
        <div class="panel-body">
        <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
                    <div class="form-group">
                    
        @if(session()->has('message'))
        <div class="alert alert-success">
                  {{ session()->get('message') }}
                         </div>
                     @endif
                    </div>
                    <div class="row">
                        <div class="col-lg-7 d-none d-lg-block "> 
                            <div class="p-2">
                                  {!! Form::label('section', 'Exam*', ['class' => 'control-label']) !!}
                            <select name="exam_id"  id="interface-output" class="form-control" >
                                    @foreach($exams as $exam) 
                                <option  id="{{ $exam->id }}" value= "{{ $exam->id }}" > {{ $exam->exam_name }} </option>
                                
                                    @endforeach 
                                </select>
                            {!! Form::textarea('question_text', old(''), ['class' => 'ckeditor form-control ', 'placeholder' => 'Write the question here!']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('question_text'))
                                <p class="help-block">
                                    {{ $errors->first('question_text') }}
                                </p>
                            @endif         
                        </div> </div>
<div class="col-lg-5"> 
                            
                            <div class="p-2">

               
                        
                    <p class="help-block"></p>
                    @if($errors->has('exam_id'))
                        <p class="help-block">
                            {{ $errors->first('exam_id') }}
                        </p>
                    @endif
                   <div class="form-group">
                                    <input id="department_id" type="hidden" class="form-control @error('department_id') is-invalid @enderror" name="department_id" value="{{ Auth::user()->dept_id}}" placeholder="{{Auth::user()->dept_id }}" required readonly autocomplete="department_id">
                
                                    @error('department_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="teacher_id" type="hidden" class="form-control @error('teacher_id') is-invalid @enderror" name="teacher_id" value="{{ Auth::user()->id}}" placeholder="{{Auth::user()->id }}" required readonly autocomplete="teacher_id">
                
                                    @error('teacher_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                    {!! Form::text('option1', old('option1'), ['class' => 'form-control ', 'placeholder' => 'A']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('option1'))
                        <p class="help-block">
                            {{ $errors->first('option1') }}
                        </p>
                    @endif
                    <div class="form-group">
                    {!! Form::text('option2', old('option2'), ['class' => 'form-control ', 'placeholder' => 'B']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('option2'))
                        <p class="help-block">
                            {{ $errors->first('option2') }}
                        </p>
                    @endif
                    </div>
                    <div class="form-group">
                    {!! Form::text('option3', old('option3'), ['class' => 'form-control ', 'placeholder' => 'C']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('option3'))
                        <p class="help-block">
                            {{ $errors->first('option3') }}
                        </p>
                    @endif  
                    </div>
                    <div class="form-group">
                    {!! Form::text('option4', old('option4'), ['class' => 'form-control ', 'placeholder' => 'D']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('option4'))
                        <p class="help-block">
                            {{ $errors->first('option4') }}
                        </p>
                    @endif
                    </div>
                    <div class="form-group">
                        
                    {!! Form::label('correct', 'Correct', ['class' => 'control-label']) !!}
                    <code>be carefull on the correct answer</code>
                    {!! Form::select('correct', $correct_options, old('correct'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('correct'))
                        <p class="help-block">
                            {{ $errors->first('correct') }}
                        </p>
                    @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    {!! Form::submit(trans('quickadmin.save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    <script src="{{ asset('//cdn.ckeditor.com/4.14.1/standard/ckeditor.js') }}"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
    </script>
    </div>
</div>
@stop
