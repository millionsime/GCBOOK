

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('qst/css/qstcss.css') }}">
</head>
<body >
 {{-- <div class="">
        <div class="container-fluid px-5">
           <div class="step_bar_content ps-5 pt-5">
    {!! Form::open(['method' => 'GET', 'route' => ['landing']]) !!}  --}}

{{-- <div class="row">
    <div class="panel-heading" class="form-group">
            @lang('Select Your Department')      
            <div class="row">
                <div class="form-group">
                    <select name="department"  id="" class="form-control">
                        @foreach($departments as $department) 
                    <option value= "{{ $department->id }}"> {{ $department->title }} </option>
                        @endforeach
                    </select>
                    {!! Form::submit(trans('Go'), ['class' => 'btn btn-save']) !!}
                    {!! Form::close() !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>   
    </div>   
 </div> --}}

{{-- the quiz section --}}
<div class="quiz-page-template-container">
        
        <div class="quiz-main-page" id="quiz-main-page">
            <div class="quiz-question-container" id="quiz-question-container">
                <div class="quiz-question-text-container" id="quiz-question-text-container">
                </div>
                <div class="quiz-answer-text-container" id="quiz-answer-text-container">
                    <ul class="quiz-answer-list" id="quiz-answer-list">
                    </ul>
                </div>
            </div>
            <div class="question-iteration-container">
                <div class="progress-bar-container">
                    <span class="progress-bar-text" id="progress-bar-text"></span>
                    <div class="progress quiz-completion-outer-progress-bar" style="height: 3px;">
                        <div class="quiz-completion-inner-progress-bar" id="quiz-progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="question-iteration-container-single" id="previous-question-load">
                    <span class="question-iteration-icon"> ^ </span>
                </div>
                <div class="icon-flipped question-iteration-container-single" id="next-question-load">
                    <span class="question-iteration-icon"> ^ </span>  
                </div>
            </div>
        </div>       
    </div>
        <div class="quiz-name-text-container">
            {{-- @include('layouts.timer') --}}
            {{-- <span class="quiz-name-text"> Buy for 20 BIRR only</span>
              <form method="POST" action="{{ route('pay') }}" id="paymentForm">  
                @csrf  
                <input type="submit" class="page-header-button" value="Buy" />
              </form>
        </div> --}}
   
    <script type="text/javascript" src="{{ asset('qst/js/tryqst.js') }}"></script>
</body>
</html>
