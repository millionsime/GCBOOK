// ==================================================
// Project Name  :  Quizo
// File          :  JS Base
// Version       :  1.0.0
// Author        :  jthemes (https://themeforest.net/user/jthemes)
// ==================================================
$(function () {
    "use strict";
    // ========== Form-select-option ========== //
    $(".step_1").on('click', function () {
        $(".step_1").removeClass("active");
        $(this).addClass("active");
    });
    $(".step_2").on('click', function () {
        $(".step_2").removeClass("active");
        $(this).addClass("active");
    });
    $(".step_3").on('click', function () {
        $(".step_3").removeClass("active");
        $(this).addClass("active");
    });
    $(".step_4").on('click', function () {
        $(".step_4").removeClass("active");
        $(this).addClass("active");
    });

    
    myTime();
    var minutes, seconds;
    var timer = 10;
    var temp1, temp2;
    var clTime;



    function myTime() {

        clearInterval(clTime);
        timer = 15
        var fiveMinutes = 1 * 0,
            display = document.querySelector('#time');
        startTimer(fiveMinutes, display);

    }

    function startTimer(duration, display) {

       

        clTime = setInterval(function () {
            var imageUrl;
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            document.getElementById('min').innerHTML = minutes  ;
            document.getElementById('sec').innerHTML = seconds ;
            // if(navigator.onLine){
               
                
            //     document.getElementById("online").style.display = "block";
            //     document.getElementById("offline").style.display = "none";
            //    } else {
             
            //    imageUrl = document.getElementById("wizard111").src;
                 
            //     document.getElementById("online").style.display = "none";
            //     document.getElementById("offline").style.display = "block";
            //    }
         

            if (seconds == 1) {
                console.log('hello world!!!!!!!!')
                // Livewire.emit('postAdded')
            }
            if (seconds == 30) {
                var audio1 = new Audio("front/second.mp3");
                audio1.play();
                audio1.loop = true;
            }
            if (seconds == 90) {
                var audio = new Audio("front/first.mp3");
                audio.play();
                audio.loop = true;
            }
            if (--timer < 0) {
                timer = duration;
            }
        }, 1000);
    }
















});

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("multisteps_form_panel");
    x[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Next Question";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next Question" + ' <span><i class="fas fa-arrow-right"></i></span>';
    }
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("multisteps_form_panel");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form... :
    if (currentTab >= x.length) {
        //...the form gets submitted:
        document.getElementById("wizard").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("multisteps_form_panel");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false:
            valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class to the current step:
    x[n].className += " active";
}
