@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('qst/css/qstcss.css') }}">
</head>

<body>
<div class="quiz-page-template-container">
    <div class="waiting" id="wait" style="display:none">
        <div class="row">
            <div class="col-sm-2">

            </div>
            <div class="col-sm-10 items-center">
                <img style="width:30%" src="{{ asset('front/images/waiting.gif') }}" alt="">
                    <h3 class="text-primary">Please wait!!! Your Exam will start soon! </h3>
            </div>
            <div class="col-sm-2">

                </div>
        </div>
       
    </div>
    

    <div id="start" >
        <div class="page-header-button-container">
            @include('layouts.timer')
        </div>
        <div class="offline" id="offline" style="display:none">
            <div class="row">
                <div class="col-sm-2">

                </div>
                <div class="col-sm-8">
                    <img style="width:100%" src="{{ asset('front/images/No_connection.gif') }}" alt="">
                        <h3 class="text-center text-danger" >Ooops!!! Please Check you connection </h3>
                </div>
                <div class="col-sm-2">

                    </div>
            </div>
        </div>
        <div class="online" id="online" >

            <div class='content' id="thankyou" style="display:none">
                <div class="wrapper-1">
                    <div class="wrapper-2">
                        <h1>Thank you!</h1>
                        <p>We appriciate your participation</p>
                        <button class="go-home">
                            
                             <a  href="{{ route('home')}}">Back To Home Page</a> 
                        </button>
                    </div>
                    <div class="footer-like">
                        <p>You have answered
                            <a href="#"> <span class="text-danger" id="firstQuestion">4</span> Question Out Of
                                <span class="text-danger" id="totalQuestion">100</span></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="" id="questionsContent">
                <div class="quiz-header-container">
                    <div class="quiz-name-text-container">
                        <span class="quiz-name-text" id="quiz_number">0/0</span>
                    </div>
                    <div class="page-header-button-container">
                        <p id="demo"></p>
                    </div>
                </div>
    
                <div class="quiz-main-page" id="quiz-main-page">
    
                    <div class="quiz-question-container" id="quiz-question-container">
                        <div class="quiz-question-text-container" id="quiz-question-text-container">
                            <span class="quiz-question-text-item" id="question">Loading...</span>
                        </div>
                        <div class="quiz-answer-text-container" id="quiz-answer-text-container">
                            <ul class="quiz-answer-list" id="quiz-answer-list">
                                <div onclick="setAnswer(0)"
                                    class="quiz-answer-text-container-single question-type-single unselected-answer"
                                    id="first">
                                    <li
                                        class="press-key-label press-label-radio answer-key-numerator unselected-answer-button">
                                        Press</li>
                                    <li class="answer-key-numerator numerator-radio unselected-answer-button">A</li>
                                    <li id="first_choice" class="quiz-answer-text-item">Loading...</li>
                                </div>
    
                                <div onclick="setAnswer(1)"
                                    class="quiz-answer-text-container-single unselected-answer question-type-single"
                                    id="second">
                                    <li
                                        class="press-key-label press-label-radio answer-key-numerator unselected-answer-button">
                                        Press</li>
                                    <li class="answer-key-numerator numerator-radio unselected-answer-button">B</li>
                                    <li id="second_choice" class="quiz-answer-text-item">Loading...</li>
                                </div>
                                <div onclick="setAnswer(2)"
                                    class="quiz-answer-text-container-single unselected-answer question-type-single"
                                    id="third">
                                    <li
                                        class="press-key-label press-label-radio answer-key-numerator unselected-answer-button">
                                        Press</li>
                                    <li class="answer-key-numerator numerator-radio unselected-answer-button">C</li>
                                    <li id="third_choice" class="quiz-answer-text-item">Loading...</li>
                                </div>
                                <div onclick="setAnswer(3)"
                                    class="quiz-answer-text-container-single unselected-answer question-type-single"
                                    id="fourth">
                                    <li
                                        class="press-key-label press-label-radio answer-key-numerator unselected-answer-button">
                                        Press</li>
                                    <li class="answer-key-numerator numerator-radio unselected-answer-button">D</li>
                                    <li id="fourth_choice" class=" quiz-answer-text-item">Loading...</li>
                                </div>
    
                            </ul>
                        </div>
    
    
                        <div id="quiz-continue-button-container" class="quiz-continue-button-container"
                            style="display: initial;">
                            <button onclick="increamental()" class="quiz-continue-button">Next</button>
    
                            <span class="quiz-continue-text" id="quiz-continue-text" style="display: initial;"></span>
                        </div>
                        <button style="display:none" onclick="submitRequest()" id="lastQuestion"
                            class=" btn btn-primary">Submit Question</button>
                    </div>
    
                    <div class="question-iteration-container">
                        <div class="progress-bar-container">
                            <span class="progress-bar-text" id="progress-bar-text"></span>
                            <div class="progress quiz-completion-outer-progress-bar" style="height: 3px;">
                                <div class="quiz-completion-inner-progress-bar" id="quiz-progress-bar" role="progressbar"
                                    style="width: 25%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="question-iteration-container-single" onclick="decreamental()"
                            id="previous-question-load">
                            <span class="question-iteration-icon"> ^ </span>
                        </div>
                        <div class="icon-flipped question-iteration-container-single" onclick="increamental()"
                            id="next-question-load">
                            <span class="question-iteration-icon"> ^ </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
    <script>
        var student_id = "{{Auth::user()->id}}";
        var exam_id = "{{$id}}";
        function submitRequest() {

    
     
     
     
    var exam_id = questions[index]['exam_id'];

    var result = answered.filter(x => x==1).length;
    let formData = new FormData();
    formData.append('student_id', student_id);
    formData.append('exam_id', exam_id);
    formData.append('result', result);
    var url3  = "https://ofijan.com/api/submitedResult";
    fetch(url3,
        {
            body: formData,
            method: "post"


            
        });

            document.getElementById('questionsContent').style.display="none"
            document.getElementById('thankyou').style.display="block"

            document.getElementById('firstQuestion').innerHTML = answered.filter(x => x==1).length
            document.getElementById('totalQuestion').innerHTML = questions.length
            clearInterval(clTime);
    }
    </script>
    <script type="text/javascript" src="{{ asset('qst/js/qstjs.js') }}"></script>
</body>

@stop