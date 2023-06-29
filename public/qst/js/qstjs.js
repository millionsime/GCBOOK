url = "https://ofijan.com/api/questions/" + student_id +"/"+ exam_id;
url3 = "https://ofijan.com/api/submitedResult";
let questions; 
let index = 0;
var correct=0;
var wrong=0;
var answered = new Array();
var answeredList = new Array();

var minutes, seconds;
var timer;
var temp1, temp2;
var clTime;
 fetch(url)
.then((response) => response.json())
.then((data) => {
   console.log(data);
   console.log('out');
   
   questions = data['questions'];
   questions  = questions .sort(() => Math.random() - 0.5);
   console.log(data['result'])
   if(data['result'])
   {
    console.log("here")
    document.getElementById('questionsContent').style.display="none"
    document.getElementById('thankyou').style.display="block"

    document.getElementById('firstQuestion').innerHTML = data['result']['correct']
    document.getElementById('totalQuestion').innerHTML = questions.length
    clearInterval(clTime);
   }
   else{
   document.getElementById('question').innerHTML = questions[index]['question_text'];
   document.getElementById('first_choice').innerHTML = questions[index]['options'][0]['option'];
   document.getElementById('second_choice').innerHTML = questions[index]['options'][1]['option'];
   document.getElementById('third_choice').innerHTML = questions[index]['options'][2]['option'];
   document.getElementById('fourth_choice').innerHTML = questions[index]['options'][3]['option'];
   var count = index+1;
console.log(questions.length)
document.getElementById('quiz_number').innerHTML= count + "/" + questions.length;
 
console.log(questions[1]['exam']['exam_duration'])


if(questions[1]['exam']['status']==1)
{
   
    timer = 60* (questions[1]['exam']['exam_duration'])
    myTime();
    document.getElementById('start').style.display="block"; 
    document.getElementById('wait').style.display="none";
}
else
{
    document.getElementById('wait').style.display="block"; 
    document.getElementById('start').style.display="none"; 
    clTime = setInterval(function () {
  url2 = '/api/checkexam/' + exam_id;
        fetch(url2)
        .then((response) => response.json())
        .then((data) => {
            
            if(data['status'] ){
              
                timer = 60* (questions[1]['exam']['exam_duration'])
                myTime();
                document.getElementById('start').style.display="block"; 
                document.getElementById('wait').style.display="none";
                 
                console.log(data['status']+'inside')
            }
            else{
                console.log('else ......')
            }
         
        });

    }, 1000);
    
}
   }
});




function myclick() {
   console.log(questions);
}

   // Assigning attributes
  

function increamental() {

    if(questions.length-2 == index){
       document.getElementById('quiz-continue-button-container').style.display = 'none';
       document.getElementById('lastQuestion').style.display = 'block';
    }


   var first = document.getElementById('first')
   var second = document.getElementById('second')
   var third = document.getElementById('third')
   var fourth = document.getElementById('fourth')
   second.classList.remove(`selected-answer-button`)
   third.classList.remove(`selected-answer-button`)
   fourth.classList.remove(`selected-answer-button`)
   first.classList.remove(`selected-answer-button`)
   first.classList.remove(`unselected-answer-button`)

   window.addEventListener('online', () => console.log('Became online'));
    window.addEventListener('offline', () => console.log('Became offline'));
    index = index + 1;
     
    document.getElementById('question').innerHTML = questions[index]['question_text'];
   document.getElementById('first_choice').innerHTML = questions[index]['options'][0]['option'];
   document.getElementById('second_choice').innerHTML = questions[index]['options'][1]['option'];
   document.getElementById('third_choice').innerHTML = questions[index]['options'][2]['option'];
   document.getElementById('fourth_choice').innerHTML = questions[index]['options'][3]['option'];
   var count = index+1;

   document.getElementById('quiz_number').innerHTML= count + "/" + questions.length;
  

   if(answeredList[index]){
    
    if (answeredList[index] == 0)
    {
       var first = document.getElementById('first')
       var second = document.getElementById('second')
       var third = document.getElementById('third')
       var fourth = document.getElementById('fourth')
       second.classList.remove(`selected-answer-button`)
       third.classList.remove(`selected-answer-button`)
       fourth.classList.remove(`selected-answer-button`)
      first.classList.add(`selected-answer-button`)
            first.classList.remove(`unselected-answer-button`)
    }
    else if (answeredList[index] == 1)
    {
       var first = document.getElementById('first')
       var second = document.getElementById('second')
       var third = document.getElementById('third')
       var fourth = document.getElementById('fourth')
       first.classList.remove(`selected-answer-button`)
       third.classList.remove(`selected-answer-button`)
       fourth.classList.remove(`selected-answer-button`)
      second.classList.add(`selected-answer-button`)
            first.classList.remove(`unselected-answer-button`)
    }
    else if (answeredList[index] == 2)
    {
       var first = document.getElementById('first')
       var second = document.getElementById('second')
       var third = document.getElementById('third')
       var fourth = document.getElementById('fourth')
       second.classList.remove(`selected-answer-button`)
       first.classList.remove(`selected-answer-button`)
       fourth.classList.remove(`selected-answer-button`)
      third.classList.add(`selected-answer-button`)
            first.classList.remove(`unselected-answer-button`)
    }
    else 
    {
       var first = document.getElementById('first')
       var second = document.getElementById('second')
       var third = document.getElementById('third')
       var fourth = document.getElementById('fourth')
       second.classList.remove(`selected-answer-button`)
       third.classList.remove(`selected-answer-button`)
       first.classList.remove(`selected-answer-button`)
      fourth.classList.add(`selected-answer-button`)
            first.classList.remove(`unselected-answer-button`)
    }
}



}
function decreamental() {
    
        document.getElementById('quiz-continue-button-container').style.display = 'block';
        document.getElementById('lastQuestion').style.display = 'none';
    
    
   window.addEventListener('online', () => console.log('Became online'));
   window.addEventListener('offline', () => console.log('Became offline'));
   if(index!=0)
   {
     index = index - 1;  
     var count = index+1;
     document.getElementById('quiz_number').innerHTML= count + "/100";
   }
  
    // document.getElementById('questionNumber').innerHTML = index+1;
   let question = document.getElementById('question');
   
   // console.log(questions[index]['choice'][1]['content']);
   question.innerHTML = questions[index]['question']

   document.getElementById('question').innerHTML = questions[index]['question_text'];
  document.getElementById('first_choice').innerHTML = questions[index]['options'][0]['option'];
  document.getElementById('second_choice').innerHTML = questions[index]['options'][1]['option'];
  document.getElementById('third_choice').innerHTML = questions[index]['options'][2]['option'];
  document.getElementById('fourth_choice').innerHTML = questions[index]['options'][3]['option'];
   
  if(answeredList[index]){
    
    if (answeredList[index] == 0)
    {
       var first = document.getElementById('first')
       var second = document.getElementById('second')
       var third = document.getElementById('third')
       var fourth = document.getElementById('fourth')
       second.classList.remove(`selected-answer-button`)
       third.classList.remove(`selected-answer-button`)
       fourth.classList.remove(`selected-answer-button`)
      first.classList.add(`selected-answer-button`)
            first.classList.remove(`unselected-answer-button`)
    }
    else if (answeredList[index] == 1)
    {
       var first = document.getElementById('first')
       var second = document.getElementById('second')
       var third = document.getElementById('third')
       var fourth = document.getElementById('fourth')
       first.classList.remove(`selected-answer-button`)
       third.classList.remove(`selected-answer-button`)
       fourth.classList.remove(`selected-answer-button`)
      second.classList.add(`selected-answer-button`)
            first.classList.remove(`unselected-answer-button`)
    }
    else if (answeredList[index] == 2)
    {
       var first = document.getElementById('first')
       var second = document.getElementById('second')
       var third = document.getElementById('third')
       var fourth = document.getElementById('fourth')
       second.classList.remove(`selected-answer-button`)
       first.classList.remove(`selected-answer-button`)
       fourth.classList.remove(`selected-answer-button`)
      third.classList.add(`selected-answer-button`)
            first.classList.remove(`unselected-answer-button`)
    }
    else 
    {
       var first = document.getElementById('first')
       var second = document.getElementById('second')
       var third = document.getElementById('third')
       var fourth = document.getElementById('fourth')
       second.classList.remove(`selected-answer-button`)
       third.classList.remove(`selected-answer-button`)
       first.classList.remove(`selected-answer-button`)
      fourth.classList.add(`selected-answer-button`)
            first.classList.remove(`unselected-answer-button`)
    }
}
}



// const answered = [];
function setAnswer(answer)
{
 if (answer==0)
{
   var first = document.getElementById('first')
   var second = document.getElementById('second')
   var third = document.getElementById('third')
   var fourth = document.getElementById('fourth')
   second.classList.remove(`selected-answer-button`)
   third.classList.remove(`selected-answer-button`)
   fourth.classList.remove(`selected-answer-button`)
  first.classList.add(`selected-answer-button`)
        first.classList.remove(`unselected-answer-button`)
}
else if (answer==1)
{
   var first = document.getElementById('first')
   var second = document.getElementById('second')
   var third = document.getElementById('third')
   var fourth = document.getElementById('fourth')
   first.classList.remove(`selected-answer-button`)
   third.classList.remove(`selected-answer-button`)
   fourth.classList.remove(`selected-answer-button`)
  second.classList.add(`selected-answer-button`)
        first.classList.remove(`unselected-answer-button`)
}
else if (answer==2)
{
   var first = document.getElementById('first')
   var second = document.getElementById('second')
   var third = document.getElementById('third')
   var fourth = document.getElementById('fourth')
   second.classList.remove(`selected-answer-button`)
   first.classList.remove(`selected-answer-button`)
   fourth.classList.remove(`selected-answer-button`)
  third.classList.add(`selected-answer-button`)
        first.classList.remove(`unselected-answer-button`)
}
else 
{
   var first = document.getElementById('first')
   var second = document.getElementById('second')
   var third = document.getElementById('third')
   var fourth = document.getElementById('fourth')
   second.classList.remove(`selected-answer-button`)
   third.classList.remove(`selected-answer-button`)
   first.classList.remove(`selected-answer-button`)
  fourth.classList.add(`selected-answer-button`)
        first.classList.remove(`unselected-answer-button`)
}
if(questions[index]['options'][answer]['correct']==1)
{

answered[index]=1;
answeredList[index] = answer;
//  console.log("right" + answered[index]);
}
else
{
    
 answered[index]=0;
 answeredList[index] = answer;
//  console.log("wrong" + answered[index]);
}


 

// Indicate previous is true in order to skip storing answers in the local object
const storeAnswers = (add, key) => {
   // For adding user's answers to the local object
   if (add) {
       if (quiz.questions[currentQuestionIndex].type == `single`) {
           quiz.questions[currentQuestionIndex].entered.length = 0
       }
       quiz.questions[currentQuestionIndex].entered.push(key)
       // For removing user's answers from the local object
   } else {
       quiz.questions[currentQuestionIndex].entered = quiz.questions[currentQuestionIndex].entered.filter(item => item !== key)
   }
   // Ensures there are no duplicate answers in array
   quiz.questions[currentQuestionIndex].entered = uniq(quiz.questions[currentQuestionIndex].entered)
}

// Changes answer button appearance to show as selected
const indicateSelectedAnswer = (answer) => {
   let button = answer.querySelectorAll('.answer-key-numerator')
   for (let i = 0; i < button.length; i++) {
       button[i].classList.add(`selected-answer-button`)
       button[i].classList.remove(`unselected-answer-button`)
   }
}
}




function myTime() {

    clearInterval(clTime);
    // timer = 15
    var fiveMinutes = 20 * 1
        
    startTimer(fiveMinutes);

}
function startTimer(duration) {

   
    clTime = setInterval(function () {
  
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        
document.getElementById('demo').innerHTML = minutes +":" + seconds;

if(questions[1]['exam']['status']==1)
{
    // timer = 60* (questions[1]['exam']['exam_duration'])
    myTime();
    document.getElementById('start').style.display="block"; 
    document.getElementById('wait').style.display="none";
}
else
{
    console.log("jhgj");
}

if(navigator.onLine){
               
                
    document.getElementById("online").style.display = "block";
    document.getElementById("offline").style.display = "none";
    } else {
    
     
    document.getElementById("online").style.display = "none";
    document.getElementById("offline").style.display = "block";
   }
      
        if (--timer < 0) {
            timer = duration;
        }
        if(timer == 0){
            var exam_id = questions[index]['exam_id'];

    var result = answered.filter(x => x==1).length;
    let formData = new FormData();
    formData.append('student_id', student_id);
    formData.append('exam_id', exam_id);
    formData.append('result', result);
  
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
        console.log(answered.filter(x => x==1).length);

    }, 1000);

}