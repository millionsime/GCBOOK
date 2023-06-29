@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.questions.title')</h3>
   
     <p>
        <a href="{{ route('questions.create') }}" class="btn btn-success mr-2 fa fa-create">Create Question</a>
        <a href="{{ route('excel') }}" class="btn btn-success fa fa-book">Upload Excel</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
             @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($questions) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>@lang('quickadmin.questions.fields.question-text')</th>
                        <th>&nbsp;</th>
                    </tr> 
                </thead>
                
                <tbody>
                     <script>
                         function changeOption(questionId, optionId, option)    
                         {
                             console.log(questionId, optionId, option);
                             var questId = 'im' + questionId;
                             var questDiv = 'div' + questionId;
                             console.log(option, questId);
                             document.getElementById('div' + questionId).style.display = 'block';
                             
                             document.getElementById('im' + questionId).value= option;
                             document.getElementById('ih' + questionId).value= optionId;
                            //   document.getElementById('quiz-continue-button-container')
                         }
                    </script>
                    @if (count($questions) > 0)
                        @foreach ($questions as $question)
                            <tr data-entry-id="{{ $question->id }}">
                                <td></td>
                                <td>{!! $question->question_text !!}
                                <br>
                                
                                 <hr class="sidebar-divider my-0"> 
                                @foreach($question->choices($question->id) as $option)
                                @if($option->correct==1)
                        
                         <span class="col-3 text text-danger border-right" onclick="changeOption('{{$question->id}}', '{{$option->id}}', '{{$option->option}}')">#{{$option->option }} 
                                </span>   
                        @else
                                
                                <span class="col-3 text text-primary border-right" onclick="changeOption('{{$question->id}}', '{{$option->id}}', '{{$option->option}}')"># {{$option->option }}
                                </span>
                                
                                @endif
                                @endforeach
                               
                                <form action="{{ route('updateOption')}}" method= "POST">
                                   @csrf
                                  <div class="p-3 mb-2 bg-primary text-white"> <div class="row" id="div{{ $question->id }}" style="display:none">
                                       <input type="text" name="option" id="im{{ $question->id}}" class="mb-2  form-control"/> &nbsp; &nbsp; &nbsp;
                                       <input type="hidden" name="theHidden"  id="ih{{ $question->id}}" class="mb-2 form-control"/> &nbsp; &nbsp; &nbsp;
                                    <button type ="submit" class="btn btn-primary col-2">
                                        update
                                    </button>
                                   </div> </div>
                                </form>
                                </td>
                                <td>
                                    
                                    <a href="{{ route('questions.edit',[$question->id]) }}" class="txt txt-xs txt-info">@lang('quickadmin.edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['questions.destroy', $question->id])) !!}
                                    {!! Form::submit(trans('quickadmin.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('questions.mass_destroy') }}';
    </script>
@endsection