<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizo HTML Template - V.1</title>
    <!-- FontAwesome-cdn include -->
    <link rel="stylesheet" href="../../../../../cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;600&amp;display=swap" rel="stylesheet">
    <!-- Bootstrap-css include -->
    <link rel="stylesheet" href="front/css/bootstrap.min.css">
    <!-- Animate-css include -->
    <link rel="stylesheet" href="front/css/animate.min.css">
    <!-- Main-StyleSheet include -->
    <link rel="stylesheet" href="front/css/style.css">

</head>
<body >
 <div class="">
        <div class="container-fluid px-5">
           <div class="step_bar_content ps-5 pt-5">
    {!! Form::open(['method' => 'GET', 'route' => ['welcome']]) !!} 

<div class="row">
    <div class="panel-heading">
            @lang('Select Your Department')
        </div>        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
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
</div>

<div class="">
    
       <div class="step_bar_content ps-5 pt-5">
          <h5 class="text-black text-uppercase d-inline-block">Quiz Questions and Answers</h5>
       </div>
       <div class="progress_bar steps_bar mt-3 ps-5 d-inline-block">
          <div class="step rounded-pill d-inline-block text-center position-relative active current">1</div>
          <div class="step rounded-pill d-inline-block text-center position-relative">2</div>
          <div class="step rounded-pill d-inline-block text-center position-relative">3</div>
          <div class="step rounded-pill d-inline-block text-center position-relative">4</div>
       </div>
       <form class="multisteps_form position-relative" id="wizard" method="POST" action="https://jthemes.net/themes/html/quizo/thankyou/index-1.html">
          <!------------------------- Step-1 ----------------------------->
          <div class="multisteps_form_panel active" data-animation="slideVert">
             
                <div class="row">
                    <div class="form_title ps-5">
                        <h5 class="text-black">What First International Yoga Day is Observed?</h5>
                </div>
                <div class="row">
                    <div class="form_items radio-list">
                         <ul class="text-uppercase list-unstyled">
                            <li>
                               <label for="opt_1" class="step_1  animate__animated animate__fadeInRight animate_25ms active">
                                  <span class="label-pointer text-center">A</span>
                                  <input type="radio" id="opt_1" name="stp_1_select_option" value="21 June 2014" checked>
                                  <span class="label-content d-inline-block text-center ">21 June 2014</span>
                               </label>
                          
                               <label for="opt_2" class="step_1   animate__animated animate__fadeInRight animate_50ms">
                                  <span class="label-pointer  text-center">B</span>
                                  <input type="radio" id="opt_2" name="stp_1_select_option" value="21 June 2015">
                                  <span class="label-content d-inline-block text-center">21 June 2015</span>
                               </label>
                            </li>
                         </ul>
                         <ul class="text-uppercase list-unstyled">
                            <li>
                               <label for="opt_3" class="step_1 animate__animated animate__fadeInRight animate_100ms">
                                  <span class="label-pointer  text-center">C</span>
                                  <input type="radio" id="opt_3" name="stp_1_select_option" value="8 June 2016">
                                  <span class="label-content d-inline-block text-center ">8 June 2016</span>
                               </label>
            
                               <label for="opt_4" class="step_1 animate__animated animate__fadeInRight animate_150ms">
                                  <span class="label-pointer text-center">D</span>
                                  <input type="radio" id="opt_4" name="stp_1_select_option" value="21 September 2015">
                                  <span class="label-content d-inline-block text-center">21 Sept 2015</span>
                               </label>
                            </li>
                         </ul>
                      </div>
                   </div>
                </div>
             <!---------- Form Button ---------->
             <div class="form_btn py-5 d-flex justify-content-center align-items-center">
                <button type="button" class="js-btn-next f_btn rounded-pill active text-uppercase" id="nextBtn"> Next Question <span><i class="fas fa-arrow-right ps-1"></i></span></button>
             </div>
          </div>
          <!------------------------- Step-2 ----------------------------->
          <div class="multisteps_form_panel" data-animation="slideVert">
            <div class="row">
               <div class="form_title ps-5">
                   <h5 class="text-black">What First International Yoga Day is Observed?</h5>
           </div>
           <div class="row">
               <div class="form_items radio-list">
                    <ul class="text-uppercase list-unstyled">
                       <li>
                          <label for="opt_1" class="step_1  animate__animated animate__fadeInRight animate_25ms active">
                             <span class="label-pointer text-center">A</span>
                             <input type="radio" id="opt_1" name="stp_1_select_option" value="21 June 2014" checked>
                             <span class="label-content d-inline-block text-center ">21 June 2014</span>
                          </label>
                     
                          <label for="opt_2" class="step_1   animate__animated animate__fadeInRight animate_50ms">
                             <span class="label-pointer  text-center">B</span>
                             <input type="radio" id="opt_2" name="stp_1_select_option" value="21 June 2015">
                             <span class="label-content d-inline-block text-center">21 June 2015</span>
                          </label>
                       </li>
                    </ul>
                    <ul class="text-uppercase list-unstyled">
                       <li>
                          <label for="opt_3" class="step_1 animate__animated animate__fadeInRight animate_100ms">
                             <span class="label-pointer  text-center">C</span>
                             <input type="radio" id="opt_3" name="stp_1_select_option" value="8 June 2016">
                             <span class="label-content d-inline-block text-center ">8 June 2016</span>
                          </label>
       
                          <label for="opt_4" class="step_1 animate__animated animate__fadeInRight animate_150ms">
                             <span class="label-pointer text-center">D</span>
                             <input type="radio" id="opt_4" name="stp_1_select_option" value="21 September 2015">
                             <span class="label-content d-inline-block text-center">21 Sept 2015</span>
                          </label>
                       </li>
                    </ul>
                 </div>
              </div>
           </div>
             <!---------- Form Button ---------->
             <div class="form_btn py-5 d-flex justify-content-center align-items-center">
                <button type="button" class="js-btn-prev f_btn rounded-pill disable text-uppercase" id="prevBtn"><span><i class="fas fa-arrow-left pe-1"></i></span> Last Question</button>
                <button type="button" class="js-btn-next f_btn rounded-pill active text-uppercase" id="nextBtn"> Next Question <span><i class="fas fa-arrow-right ps-1"></i></span></button>
             </div>
          </div>
          <!------------------------- Step-3 ----------------------------->
          <div class="multisteps_form_panel" data-animation="slideVert">
            <div class="row">
               <div class="form_title ps-5">
                   <h5 class="text-black">What First International Yoga Day is Observed?</h5>
           </div>
           <div class="row">
               <div class="form_items radio-list">
                    <ul class="text-uppercase list-unstyled">
                       <li>
                          <label for="opt_1" class="step_1  animate__animated animate__fadeInRight animate_25ms active">
                             <span class="label-pointer text-center">A</span>
                             <input type="radio" id="opt_1" name="stp_1_select_option" value="21 June 2014" checked>
                             <span class="label-content d-inline-block text-center ">21 June 2014</span>
                          </label>
                     
                          <label for="opt_2" class="step_1   animate__animated animate__fadeInRight animate_50ms">
                             <span class="label-pointer  text-center">B</span>
                             <input type="radio" id="opt_2" name="stp_1_select_option" value="21 June 2015">
                             <span class="label-content d-inline-block text-center">21 June 2015</span>
                          </label>
                       </li>
                    </ul>
                    <ul class="text-uppercase list-unstyled">
                       <li>
                          <label for="opt_3" class="step_1 animate__animated animate__fadeInRight animate_100ms">
                             <span class="label-pointer  text-center">C</span>
                             <input type="radio" id="opt_3" name="stp_1_select_option" value="8 June 2016">
                             <span class="label-content d-inline-block text-center ">8 June 2016</span>
                          </label>
       
                          <label for="opt_4" class="step_1 animate__animated animate__fadeInRight animate_150ms">
                             <span class="label-pointer text-center">D</span>
                             <input type="radio" id="opt_4" name="stp_1_select_option" value="21 September 2015">
                             <span class="label-content d-inline-block text-center">21 Sept 2015</span>
                          </label>
                       </li>
                    </ul>
                 </div>
              </div>
           </div>
             <!---------- Form Button ---------->
             <div class="form_btn py-5 d-flex justify-content-center align-items-center">
                <button type="button" class="js-btn-prev f_btn rounded-pill disable text-uppercase" id="prevBtn"><span><i class="fas fa-arrow-left pe-1"></i></span> Last Question</button>
                <button type="button" class="js-btn-next f_btn rounded-pill active text-uppercase" id="nextBtn"> Next Question <span><i class="fas fa-arrow-right ps-1"></i></span></button>
             </div>
          </div>
          <!------------------------- Step-4 ----------------------------->
          <div class="multisteps_form_panel" data-animation="slideVert">
            <div class="row">
               <div class="form_title ps-5">
                   <h5 class="text-black">What First International Yoga Day is Observed?</h5>
           </div>
           <div class="row">
               <div class="form_items radio-list">
                    <ul class="text-uppercase list-unstyled">
                       <li>
                          <label for="opt_1" class="step_1  animate__animated animate__fadeInRight animate_25ms active">
                             <span class="label-pointer text-center">A</span>
                             <input type="radio" id="opt_1" name="stp_1_select_option" value="21 June 2014" checked>
                             <span class="label-content d-inline-block text-center ">21 June 2014</span>
                          </label>
                     
                          <label for="opt_2" class="step_1   animate__animated animate__fadeInRight animate_50ms">
                             <span class="label-pointer  text-center">B</span>
                             <input type="radio" id="opt_2" name="stp_1_select_option" value="21 June 2015">
                             <span class="label-content d-inline-block text-center">21 June 2015</span>
                          </label>
                       </li>
                    </ul>
                    <ul class="text-uppercase list-unstyled">
                       <li>
                          <label for="opt_3" class="step_1 animate__animated animate__fadeInRight animate_100ms">
                             <span class="label-pointer  text-center">C</span>
                             <input type="radio" id="opt_3" name="stp_1_select_option" value="8 June 2016">
                             <span class="label-content d-inline-block text-center ">8 June 2016</span>
                          </label>
       
                          <label for="opt_4" class="step_1 animate__animated animate__fadeInRight animate_150ms">
                             <span class="label-pointer text-center">D</span>
                             <input type="radio" id="opt_4" name="stp_1_select_option" value="21 September 2015">
                             <span class="label-content d-inline-block text-center">21 Sept 2015</span>
                          </label>
                       </li>
                    </ul>
                 </div>
              </div>
           </div>
             <!---------- Form Button ---------->
             <div class="form_btn py-5 d-flex justify-content-center align-items-center">
                <button type="button" class="js-btn-prev f_btn rounded-pill disable text-uppercase" id="prevBtn"><span><i class="fas fa-arrow-left pe-1"></i></span> Last Question</button>
                <button type="submit" class="f_btn rounded-pill active text-uppercase" id="nextBtn"> Submit</button>
             </div>
          </div>
       </form>
 </div>
 <!-- jQuery-js include -->
 <script src="front/js/jquery-3.6.0.min.js"></script>
 <!-- Bootstrap-js include -->
 <script src="front/js/bootstrap.min.js"></script>
 <!-- jQuery-validate-js include -->
 <script src="front/js/jquery.validate.min.js"></script>
 <!-- Custom-js include -->
 <script src="front/js/script.js"></script>
</body>

</body>
</html>
