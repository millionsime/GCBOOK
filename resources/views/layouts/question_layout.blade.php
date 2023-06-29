<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from jthemes.net/themes/html/quizo/version-5/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Jan 2023 13:47:20 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MILL - QUESTIONS</title>
    <!-- FontAwesome-cdn include -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/all.min.css') }}">
    <!-- Google fonts include -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700;800&amp;family=Sen:wght@400;700;800&amp;display=swap"
        rel="stylesheet">
    <!-- Bootstrap-css include -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap.min.css') }}">
    <!-- Animate-css include -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/animate.min.css') }}">
    <!-- Main-StyleSheet include -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/m_style.css') }}">
    @livewireStyles

</head>

<body>
    <div class="wrapper">
        <!-- Top content -->


        <div>
            <div class="my-box" id="myloading" style="position:fixed; background-color:#000424d1; z-index:999999999999999999999;
                top:0px; left:0px; width:100%; height:100%;"  >
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            style="margin: auto; margin-top:10%; display: block;" width="200px" height="200px" viewBox="0 0 100 100"
            preserveAspectRatio="xMidYMid">
            <g transform="translate(50 50)">
                <g transform="translate(-19 -19) scale(0.6)">
                    <g>
                        <animateTransform attributeName="transform" type="rotate" values="0;45" keyTimes="0;1"
                            dur="0.2s" begin="0s" repeatCount="indefinite"></animateTransform>
                        <path
                            d="M31.359972760794346 21.46047782418268 L38.431040572659825 28.531545636048154 L28.531545636048154 38.431040572659825 L21.46047782418268 31.359972760794346 A38 38 0 0 1 7.0000000000000036 37.3496987939662 L7.0000000000000036 37.3496987939662 L7.000000000000004 47.3496987939662 L-6.999999999999999 47.3496987939662 L-7 37.3496987939662 A38 38 0 0 1 -21.46047782418268 31.35997276079435 L-21.46047782418268 31.35997276079435 L-28.531545636048154 38.431040572659825 L-38.43104057265982 28.531545636048158 L-31.359972760794346 21.460477824182682 A38 38 0 0 1 -37.3496987939662 7.000000000000007 L-37.3496987939662 7.000000000000007 L-47.3496987939662 7.000000000000008 L-47.3496987939662 -6.9999999999999964 L-37.3496987939662 -6.999999999999997 A38 38 0 0 1 -31.35997276079435 -21.460477824182675 L-31.35997276079435 -21.460477824182675 L-38.431040572659825 -28.531545636048147 L-28.53154563604818 -38.4310405726598 L-21.4604778241827 -31.35997276079433 A38 38 0 0 1 -6.999999999999992 -37.3496987939662 L-6.999999999999992 -37.3496987939662 L-6.999999999999994 -47.3496987939662 L6.999999999999977 -47.3496987939662 L6.999999999999979 -37.3496987939662 A38 38 0 0 1 21.460477824182686 -31.359972760794342 L21.460477824182686 -31.359972760794342 L28.531545636048158 -38.43104057265982 L38.4310405726598 -28.53154563604818 L31.35997276079433 -21.4604778241827 A38 38 0 0 1 37.3496987939662 -6.999999999999995 L37.3496987939662 -6.999999999999995 L47.3496987939662 -6.999999999999997 L47.349698793966205 6.999999999999973 L37.349698793966205 6.999999999999976 A38 38 0 0 1 31.359972760794346 21.460477824182686 M0 -23A23 23 0 1 0 0 23 A23 23 0 1 0 0 -23"
                            fill="#ff3b16"></path>
                    </g>
                </g>
                <g transform="translate(19 19) scale(0.6)">
                    <g>
                        <animateTransform attributeName="transform" type="rotate" values="45;0" keyTimes="0;1"
                            dur="0.2s" begin="-0.1s" repeatCount="indefinite"></animateTransform>
                        <path
                            d="M-31.35997276079435 -21.460477824182675 L-38.431040572659825 -28.531545636048147 L-28.53154563604818 -38.4310405726598 L-21.4604778241827 -31.35997276079433 A38 38 0 0 1 -6.999999999999992 -37.3496987939662 L-6.999999999999992 -37.3496987939662 L-6.999999999999994 -47.3496987939662 L6.999999999999977 -47.3496987939662 L6.999999999999979 -37.3496987939662 A38 38 0 0 1 21.460477824182686 -31.359972760794342 L21.460477824182686 -31.359972760794342 L28.531545636048158 -38.43104057265982 L38.4310405726598 -28.53154563604818 L31.35997276079433 -21.4604778241827 A38 38 0 0 1 37.3496987939662 -6.999999999999995 L37.3496987939662 -6.999999999999995 L47.3496987939662 -6.999999999999997 L47.349698793966205 6.999999999999973 L37.349698793966205 6.999999999999976 A38 38 0 0 1 31.359972760794346 21.460477824182686 L31.359972760794346 21.460477824182686 L38.431040572659825 28.531545636048158 L28.53154563604818 38.4310405726598 L21.460477824182703 31.35997276079433 A38 38 0 0 1 6.9999999999999964 37.3496987939662 L6.9999999999999964 37.3496987939662 L6.999999999999995 47.3496987939662 L-7.000000000000009 47.3496987939662 L-7.000000000000007 37.3496987939662 A38 38 0 0 1 -21.46047782418263 31.359972760794385 L-21.46047782418263 31.359972760794385 L-28.531545636048097 38.43104057265987 L-38.431040572659796 28.531545636048186 L-31.35997276079433 21.460477824182703 A38 38 0 0 1 -37.34969879396619 7.000000000000032 L-37.34969879396619 7.000000000000032 L-47.34969879396619 7.0000000000000355 L-47.3496987939662 -7.000000000000002 L-37.3496987939662 -7.000000000000005 A38 38 0 0 1 -31.359972760794346 -21.46047782418268 M0 -23A23 23 0 1 0 0 23 A23 23 0 1 0 0 -23"
                            fill="#ffffff"></path>
                    </g>
                </g>
            </g>
        </svg>
    </div>





            <script>
                let index = 0;
                let questions;
                let answer = 0;
                let correct = 0;
                let wrong = 0;
                let questionNumber = document.getElementById('questionNumber');

                function selectedAnswers(answer1) {
                    this.answers = answer1;


                }



                function increamental() {

                    if (questions.length == index + 1) {
                        console.log(this.answers + 'fffffffffffffff');

                        if (questions[questions.length - 1]['choice'][this.answers]['is_answer'] != null) {
                            console.log('answer')
                            correct = correct + 1;
                            document.getElementById('correctQuestion').innerHTML = 'correct:' + correct;
                        } else {
                            wrong = wrong + 1;
                            console.log('not answer');
                            document.getElementById('wrongQuestion').innerHTML = 'wrong:' + wrong;
                        }
                        Livewire.emit('postAdded', answer, correct, wrong)


                    } else {
                        if (questions[index]['choice'][this.answers]['is_answer'] != null) {
                            console.log('answer')
                            correct = correct + 1;
                            document.getElementById('correctQuestion').innerHTML = 'correct:' + correct;
                        } else {
                            wrong = wrong + 1;
                            console.log('not answer');
                            document.getElementById('wrongQuestion').innerHTML = 'wrong:' + wrong;
                        }



 
                        index = index + 5;
                        document.getElementById('questionNumber').innerHTML = index + 1;
                        let question = document.getElementById('question');

                        // console.log(questions[index]['choice'][1]['content']);
                        question.innerHTML = questions[index]['question']

                        document.getElementById('question').innerHTML = questions[index]['question'];
                        document.getElementById('first_choice').innerHTML = questions[index]['choice'][0]['content'];
                        document.getElementById('second_choice').innerHTML = questions[index]['choice'][1]['content'];
                        document.getElementById('third_choice').innerHTML = questions[index]['choice'][2]['content'];
                        document.getElementById('fourth_choice').innerHTML = questions[index]['choice'][3]['content'];


                        document.getElementById('question2').innerHTML = questions[index+1]['question'];
                        document.getElementById('first_choice2').innerHTML = questions[index+1]['choice'][0]['content'];
                        document.getElementById('second_choice2').innerHTML = questions[index+1]['choice'][1]['content'];
                        document.getElementById('third_choice2').innerHTML = questions[index+1]['choice'][2]['content'];
                        document.getElementById('fourth_choice2').innerHTML = questions[index+1]['choice'][3]['content'];
                        
                        document.getElementById('question3').innerHTML = questions[index+2]['question'];
                        document.getElementById('first_choice3').innerHTML = questions[index+2]['choice'][0]['content'];
                        document.getElementById('second_choice3').innerHTML = questions[index+2]['choice'][1]['content'];
                        document.getElementById('third_choice3').innerHTML = questions[index+2]['choice'][2]['content'];
                        document.getElementById('fourth_choice3').innerHTML = questions[index+2]['choice'][3]['content'];

                        document.getElementById('question4').innerHTML = questions[index+3]['question'];
                        document.getElementById('first_choice4').innerHTML = questions[index+3]['choice'][0]['content'];
                        document.getElementById('second_choice4').innerHTML = questions[index+3]['choice'][1]['content'];
                        document.getElementById('third_choice4').innerHTML = questions[index+3]['choice'][2]['content'];
                        document.getElementById('fourth_choice4').innerHTML = questions[index+3]['choice'][3]['content'];

                        document.getElementById('question5').innerHTML = questions[index+4]['question'];
                        document.getElementById('first_choice5').innerHTML = questions[index+4]['choice'][0]['content'];
                        document.getElementById('second_choice5').innerHTML = questions[index+4]['choice'][1]['content'];
                        document.getElementById('third_choice5').innerHTML = questions[index+4]['choice'][2]['content'];
                        document.getElementById('fourth_choice5').innerHTML = questions[index+4]['choice'][3]['content'];

                    }

                }

                console.log('Start Question.........')
                var session = 5
                
                console.log(session);
                var url = 'http://127.0.0.1:8001/api/users/' + session;
                console.log(url);
                fetch(url)
                    .then((response) => response.json())
                    .then((data) => {
                        console.log(data);
                                document.getElementById('myloading').style.display = 'none';
                        questions = data;
                        // console.log( 'https://ibexvlog.com/'+ data[index]['image'])

                        document.getElementById('question').innerHTML = data[index]['question'];

                        let first = document.getElementById('first_choice').innerHTML = data[index][
                            'choice'
                        ][0]['content'];
                        let second = document.getElementById('second_choice').innerHTML = data[index][
                            'choice'
                        ][1][
                            'content'
                        ];
                        let third = document.getElementById('third_choice').innerHTML = data[index][
                            'choice'
                        ][2]['content'];
                        let fourth = document.getElementById('fourth_choice').innerHTML = data[index][
                            'choice'
                        ][3][
                            'content'
                        ];


                        question.innerHTML = data[index]['question']


                        document.getElementById('question2').innerHTML = questions[index+1]['question'];
                        document.getElementById('first_choice2').innerHTML = questions[index+1]['choice'][0]['content'];
                        document.getElementById('second_choice2').innerHTML = questions[index+1]['choice'][1]['content'];
                        document.getElementById('third_choice2').innerHTML = questions[index+1]['choice'][2]['content'];
                        document.getElementById('fourth_choice2').innerHTML = questions[index+1]['choice'][3]['content'];
                        
                        document.getElementById('question3').innerHTML = questions[index+2]['question'];
                        document.getElementById('first_choice3').innerHTML = questions[index+2]['choice'][0]['content'];
                        document.getElementById('second_choice3').innerHTML = questions[index+2]['choice'][1]['content'];
                        document.getElementById('third_choice3').innerHTML = questions[index+2]['choice'][2]['content'];
                        document.getElementById('fourth_choice3').innerHTML = questions[index+2]['choice'][3]['content'];

                        document.getElementById('question4').innerHTML = questions[index+3]['question'];
                        document.getElementById('first_choice4').innerHTML = questions[index+3]['choice'][0]['content'];
                        document.getElementById('second_choice4').innerHTML = questions[index+3]['choice'][1]['content'];
                        document.getElementById('third_choice4').innerHTML = questions[index+3]['choice'][2]['content'];
                        document.getElementById('fourth_choice4').innerHTML = questions[index+3]['choice'][3]['content'];

                        document.getElementById('question5').innerHTML = questions[index+4]['question'];
                        document.getElementById('first_choice5').innerHTML = questions[index+4]['choice'][0]['content'];
                        document.getElementById('second_choice5').innerHTML = questions[index+4]['choice'][1]['content'];
                        document.getElementById('third_choice5').innerHTML = questions[index+4]['choice'][2]['content'];
                        document.getElementById('fourth_choice5').innerHTML = questions[index+4]['choice'][3]['content'];











                        // let k;
                        // for (k in data) {
                        //     console.log(data[k]['question']);
                        //     question.innerHTML = data[k]['question'];

                        // }

                    });





                // console.log(address);
                // console.log(users[5]);
            </script>
            <div class="question-box" id="question_boxx">
                <div class="container" style="margin-bottom: -7rem;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="logo_area ps-5 pt-5">
                                <a href="#">
                                    <img src="{{ asset('front/logo.png') }}" alt="image-not-found">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 time-counter d-md-block pt-5" id="offline2">
                            <div
                                class="count_box pe-3 me-5 rounded-pill d-flex align-items-center justify-content-center float-end">
                                <div class="count_clock ps-2">
                                    <img src="{{ asset('front/assets/images/clock.png') }}"
                                        alt="image-not-found">
                                </div>
                                <div class="count_title">
                                    <h4 class="ps-1" wire:click="selectCategory11()">Quiz</h4>
                                    <span class="px-1">Time start</span>
                                </div>
                                <div class="count_number rounded-pill px-3 d-flex justify-content-around
                                    align-items-center position-relative overflow-hidden countdown_timer" data-countdown="2022/10/24">
                                    <div class="count_min">
                                        <h3 id="min">01</h3><span class="text-uppercase">min</span>
                                    </div>
                                    <div class="count_sec ml-2">
                                        <h3 id="sec"> 58</h3><span class="text-uppercase">sec</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <!-- no connection  -->
                    <form style="display:none" id="offline" class="multisteps_form 
                         overflow-hidden position-relative" method="POST">
                        <div class="row pt-">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <img src="{{ asset('front/No_connection.gif') }}" alt="">
                                <h2 style="text-align: center">oops!!! no connection</h2>
                            </div>
                        </div>
                    </form>
                    <form class="multisteps_form overflow-hidden position-relative" id="wizard111" method="POST">

                      
                    <span class="p" style="background:#008f5d; width:4rem; padding:17px 5px;  border-radius:50%; 
                    color:white;     text-align: center;" id="questionNumber">1 </span>
                       
                        <div class="ww" id="online" style="margin-top:-20rem">
                            <div class="multisteps_form_panel">
                                <div class="question_title">
                                    
                                          
                                        <span class="p" style="background:#008f5d;z-index:999999999; width:4rem; padding:17px 5px;  border-radius:50%; 
                               color:white;     text-align: left    ;" id="questionNumber">1 </span>
                                    <h1 wire:click="selectCategory11()" id="question"
                                        class="text-center py-5 animate__animated animate__fadeInRight animate_25ms">

                                        Some asked question about the specifile subject
                                    </h1>
                                </div>
                                <div class="row pt-3">
                                    <ul class="text-center">
                                        <li onclick="selectedAnswers(0)"
                                            class="position-relative step_1 d-inline-block animate__animated animate__fadeInRight animate_50ms active">
                                            <input id="opt_1" type="checkbox" name="stp_1_select_option"
                                                value="sea grass bed">
                                            <label for="opt_1" id="first_choice">sea grass bed</label>
                                            <span class="position-absolute">A</span>
                                        </li>
                                        <li onclick="selectedAnswers(1)"
                                            class="step_1 position-relative d-inline-block animate__animated animate__fadeInRight animate_100ms">
                                            <input id="opt_2" type="checkbox" name="stp_1_select_option"
                                                value="coral1 reef2s">
                                            <label for="opt_2" id="second_choice">coral reefs</label>
                                            <span class="position-absolute">B</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <ul class="text-center">
                                        <li onclick="selectedAnswers(2)"
                                            class="step_1 position-relative d-inline-block animate__animated animate__fadeInRight animate_150ms">
                                            <input id="opt_3" type="checkbox" name="stp_1_select_option"
                                                value="None of the above">
                                            <label for="opt_3" id="third_choice">None of the above</label>
                                            <span class="position-absolute">C</span>
                                        </li>
                                        <li onclick="selectedAnswers(3)"
                                            class="step_1 position-relative d-inline-block animate__animated animate__fadeInRight animate_200ms">
                                            <input id="opt_4" type="checkbox" name="stp_1_select_option"
                                                value="hot spots">
                                            <label for="opt_4" id="fourth_choice">hot spots</label>
                                            <span class="position-absolute">D</span>
                                        </li>
                                    </ul>
                                    <!-- Progress bar -->

                                </div>
                            </div>

                            <div class="f"  style="margin-top:-18rem">
                                <div class="question_title">
                                    
                                             
                                    <h1 wire:click="selectCategory11()" id="question2"
                                        class="  py-5 animate__animated animate__fadeInRight animate_25ms">
                                      
                                        Some asked question about the specifile subject
                                    </h1>
                                </div>
                                <div class="row pt-3">
                                    <ul class="text-center">
                                        <li onclick="selectedAnswers(0)"
                                            class="position-relative step_1 d-inline-block animate__animated animate__fadeInRight animate_50ms active">
                                            <input id="opt_1" type="checkbox" name="stp_1_select_option"
                                                value="sea grass bed">
                                            <label for="opt_1" id="first_choice2">sea grass bed</label>
                                            <span class="position-absolute">A</span>
                                        </li>
                                        <li onclick="selectedAnswers(1)"
                                            class="step_1 position-relative d-inline-block animate__animated animate__fadeInRight animate_100ms">
                                            <input id="opt_2" type="checkbox" name="stp_1_select_option"
                                                value="coral1 reef2s">
                                            <label for="opt_2" id="second_choice2">coral reefs</label>
                                            <span class="position-absolute">B</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <ul class="text-center">
                                        <li onclick="selectedAnswers(2)"
                                            class="step_1 position-relative d-inline-block animate__animated animate__fadeInRight animate_150ms">
                                            <input id="opt_3" type="checkbox" name="stp_1_select_option"
                                                value="None of the above">
                                            <label for="opt_3" id="third_choice2">None of the above</label>
                                            <span class="position-absolute">C</span>
                                        </li>
                                        <li onclick="selectedAnswers(3)"
                                            class="step_1 position-relative d-inline-block animate__animated animate__fadeInRight animate_200ms">
                                            <input id="opt_4" type="checkbox" name="stp_1_select_option"
                                                value="hot spots">
                                            <label for="opt_4" id="fourth_choice2">hot spots</label>
                                            <span class="position-absolute">D</span>
                                        </li>
                                    </ul>
                                    <!-- Progress bar -->

                                </div>
                            </div>

                            <div class="f"  style="margin-top:-18rem">
                                <div class="question_title">
                                    
                                             
                                    <h1 wire:click="selectCategory11()" id="question3"
                                        class="text-center py-5 animate__animated animate__fadeInRight animate_25ms">
                                         
                                        Some asked question about the specifile subject
                                    </h1>
                                </div>
                                <div class="row pt-3">
                                    <ul class="text-center">
                                        <li onclick="selectedAnswers(0)"
                                            class="position-relative step_1 d-inline-block animate__animated animate__fadeInRight animate_50ms active">
                                            <input id="opt_1" type="checkbox" name="stp_1_select_option"
                                                value="sea grass bed">
                                            <label for="opt_1" id="first_choice3">sea grass bed</label>
                                            <span class="position-absolute">A</span>
                                        </li>
                                        <li onclick="selectedAnswers(1)"
                                            class="step_1 position-relative d-inline-block animate__animated animate__fadeInRight animate_100ms">
                                            <input id="opt_2" type="checkbox" name="stp_1_select_option"
                                                value="coral1 reef2s">
                                            <label for="opt_2" id="second_choice3">coral reefs</label>
                                            <span class="position-absolute">B</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <ul class="text-center">
                                        <li onclick="selectedAnswers(2)"
                                            class="step_1 position-relative d-inline-block animate__animated animate__fadeInRight animate_150ms">
                                            <input id="opt_3" type="checkbox" name="stp_1_select_option"
                                                value="None of the above">
                                            <label for="opt_3" id="third_choice3">None of the above</label>
                                            <span class="position-absolute">C</span>
                                        </li>
                                        <li onclick="selectedAnswers(3)"
                                            class="step_1 position-relative d-inline-block animate__animated animate__fadeInRight animate_200ms">
                                            <input id="opt_4" type="checkbox" name="stp_1_select_option"
                                                value="hot spots">
                                            <label for="opt_4" id="fourth_choice3">hot spots</label>
                                            <span class="position-absolute">D</span>
                                        </li>
                                    </ul>
                                    <!-- Progress bar -->

                                </div>
                            </div>

                            <div class="f"  style="margin-top:-18rem">
                                <div class="question_title">
                                    
                                             
                                    <h1 wire:click="selectCategory11()" id="question4"
                                        class="text-center py-5 animate__animated animate__fadeInRight animate_25ms">
                                         
                                        Some asked question about the specifile subject
                                    </h1>
                                </div>
                                <div class="row pt-3">
                                    <ul class="text-center">
                                        <li onclick="selectedAnswers(0)"
                                            class="position-relative step_1 d-inline-block animate__animated animate__fadeInRight animate_50ms active">
                                            <input id="opt_1" type="checkbox" name="stp_1_select_option"
                                                value="sea grass bed">
                                            <label for="opt_1" id="first_choice4">sea grass bed</label>
                                            <span class="position-absolute">A</span>
                                        </li>
                                        <li onclick="selectedAnswers(1)"
                                            class="step_1 position-relative d-inline-block animate__animated animate__fadeInRight animate_100ms">
                                            <input id="opt_2" type="checkbox" name="stp_1_select_option"
                                                value="coral1 reef2s">
                                            <label for="opt_2" id="second_choice4">coral reefs</label>
                                            <span class="position-absolute">B</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <ul class="text-center">
                                        <li onclick="selectedAnswers(2)"
                                            class="step_1 position-relative d-inline-block animate__animated animate__fadeInRight animate_150ms">
                                            <input id="opt_3" type="checkbox" name="stp_1_select_option"
                                                value="None of the above">
                                            <label for="opt_3" id="third_choice4">None of the above</label>
                                            <span class="position-absolute">C</span>
                                        </li>
                                        <li onclick="selectedAnswers(3)"
                                            class="step_1 position-relative d-inline-block animate__animated animate__fadeInRight animate_200ms">
                                            <input id="opt_4" type="checkbox" name="stp_1_select_option"
                                                value="hot spots">
                                            <label for="opt_4" id="fourth_choice4">hot spots4</label>
                                            <span class="position-absolute">D</span>
                                        </li>
                                    </ul>
                                    <!-- Progress bar -->

                                </div>
                            </div>
                            
                            <div class="f"  style="margin-top:-18rem">
                                <div class="question_title">
                                    
                                             
                                    <h1 wire:click="selectCategory11()" id="question5"
                                        class="text-center py-5 animate__animated animate__fadeInRight animate_25ms">
                                         
                                        Some asked question about the specifile subject
                                    </h1>
                                </div>
                                <div class="row pt-3">
                                    <ul class="text-center">
                                        <li onclick="selectedAnswers(0)"
                                            class="position-relative step_1 d-inline-block animate__animated animate__fadeInRight animate_50ms active">
                                            <input id="opt_1" type="checkbox" name="stp_1_select_option"
                                                value="sea grass bed">
                                            <label for="opt_1" id="first_choice5">sea grass bed</label>
                                            <span class="position-absolute">A</span>
                                        </li>
                                        <li onclick="selectedAnswers(1)"
                                            class="step_1 position-relative d-inline-block animate__animated animate__fadeInRight animate_100ms">
                                            <input id="opt_2" type="checkbox" name="stp_1_select_option"
                                                value="coral1 reef2s">
                                            <label for="opt_2" id="second_choice">coral reefs</label>
                                            <span class="position-absolute">B</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <ul class="text-center">
                                        <li onclick="selectedAnswers(2)"
                                            class="step_1 position-relative d-inline-block animate__animated animate__fadeInRight animate_150ms">
                                            <input id="opt_3" type="checkbox" name="stp_1_select_option"
                                                value="None of the above">
                                            <label for="opt_3" id="third_choice5">None of the above</label>
                                            <span class="position-absolute">C</span>
                                        </li>
                                        <li onclick="selectedAnswers(3)"
                                            class="step_1 position-relative d-inline-block animate__animated animate__fadeInRight animate_200ms">
                                            <input id="opt_4" type="checkbox" name="stp_1_select_option"
                                                value="hot spots">
                                            <label for="opt_4" id="fourth_choice">hot spots</label>
                                            <span class="position-absolute">D</span>
                                        </li>
                                    </ul>
                                    <!-- Progress bar -->

                                </div>
                            </div>

                            <!---------- Form Button ---------->
                            <button type="button" class="f_btn prev_btn text-uppercase position-absolute" id="prevBtn"
                                onclick="nextPrev(-1)"><span><i class="fas fa-arrow-left"></i></span> Last
                                Question</button>
                            <button type="button" class="f_btn next_btn text-uppercase position-absolute" id="nextBtn"
                                onclick="increamental()">Next Question</button>
                        </div>

                    </form>
                </div>
            </div>


            <!-- <div class="row align-items-center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form style="margin-top:4rem;    "
                    class="row py-3 multisteps_form bg-white position-relative overflow-hidden" id="wizard"
                    method="POST" action="#">
                  
                    <div class="container">
            <div class="row text-center">
                <div class="shap_content position-relative">
                    <img class="w-50" src="Completed.gif" alt="image_not_found">
                     <h2 style="color:#0426a1">በዚህ ምድብ ውስጥ ለዚህ ሳምንት ጨርሰዋል</h2>  
                     <a href="#" class="f_btn next_btn  " style="text-decoration:none; color:white" 
                     wire:click="selectCategory11()"> ተመለስ</a>
                </div>
            </div>
        </div>


                </form>
            </div>

        </div> -->






        </div>



    </div>
    @livewireScripts
    <!-- jQuery-js include -->
    <script src="{{ asset('front/assets/js/jquery-3.6.0.min.js') }}"></script>
    <!-- jquery-count-down include -->
    <script src="{{ asset('front/assets/js/countdown.js') }}"></script>
    <!-- Bootstrap-js include -->
    <script src="{{ asset('front/assets/js/bootstrap.min.js') }}"></script>
    <!-- jQuery-validate-js include -->
    <script src="{{ asset('front/assets/js/jquery.validate.min.js') }}"></script>
    <!-- Custom-js include -->
    <script src="{{ asset('front/assets/js/script.js') }}"></script>
    <script src="{{ asset('front/assets/js/main.js') }}"></script>
    <!-- <script type="text/javascript">
        $('#getting-started').countdown('2020/07/25', function(event) {
            $(this).html(event.strftime('%w weeks %d days %H:%M:%S'));
        });
    </script> -->

</body>

<!-- Mirrored from jthemes.net/themes/html/quizo/version-5/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Jan 2023 13:47:24 GMT -->

</html>