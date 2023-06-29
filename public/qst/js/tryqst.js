url = "http://127.0.0.1:8000/api/questions"
let questions; 
let index = 0;
var correct=0;
var wrong=0;
var answered = new Array();
 fetch(url)
.then((response) => response.json())
.then((data) => {
   console.log(data);
   questions = data;
   document.getElementById('question').innerHTML = questions[index]['question_text'];
   document.getElementById('first_choice').innerHTML = questions[index]['options'][0]['option'];
   document.getElementById('second_choice').innerHTML = questions[index]['options'][1]['option'];
   document.getElementById('third_choice').innerHTML = questions[index]['options'][2]['option'];
   document.getElementById('fourth_choice').innerHTML = questions[index]['options'][3]['option'];
});
function myclick() {
   console.log(questions);
}

function increamental() {

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
    console.log(index);
    // document.getElementById('questionNumber').innerHTML = index+1;
    let question = document.getElementById('question');
    
    // console.log(questions[index]['choice'][1]['content']);
    question.innerHTML = questions[index]['question']

    document.getElementById('question').innerHTML = questions[index]['question_text'];
   document.getElementById('first_choice').innerHTML = questions[index]['options'][0]['option'];
   document.getElementById('second_choice').innerHTML = questions[index]['options'][1]['option'];
   document.getElementById('third_choice').innerHTML = questions[index]['options'][2]['option'];
   document.getElementById('fourth_choice').innerHTML = questions[index]['options'][3]['option'];

var count = index+1;
   document.getElementById('quiz_number').innerHTML= "Quiz Number " + count;
  
}
function decreamental() {

   window.addEventListener('online', () => console.log('Became online'));
   window.addEventListener('offline', () => console.log('Became offline'));
   if(index!=0)
   {
     index = index - 1;  
     var count = index+1;
     document.getElementById('quiz_number').innerHTML= "Question Number " + count;
   }
  
   console.log(index);
   // document.getElementById('questionNumber').innerHTML = index+1;
   let question = document.getElementById('question');
   
   // console.log(questions[index]['choice'][1]['content']);
   question.innerHTML = questions[index]['question']

   document.getElementById('question').innerHTML = questions[index]['question_text'];
  document.getElementById('first_choice').innerHTML = questions[index]['options'][0]['option'];
  document.getElementById('second_choice').innerHTML = questions[index]['options'][1]['option'];
  document.getElementById('third_choice').innerHTML = questions[index]['options'][2]['option'];
  document.getElementById('fourth_choice').innerHTML = questions[index]['options'][3]['option'];
 

}

// const answered = [];
function setAnswer(answer)
{
   console.log(answer)
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
if(questions[index]['options'][answer]['correct'])
{

answered[index]=1;

}
else
{
 answered[index]=0;
}
}
// Tracks index of question on quiz
let currentQuestionIndex = 0

// Shortcut for removing duplicates from arrays
const uniq = (a) => {
    return Array.from(new Set(a));
}

// Accepts a parent id to remove all children
const removeAllChildren = (parent) => {
    let node = document.getElementById(parent)
    node.innerHTML = ``
}

// Initialization functions go here
const init = () => {
    cr_ContinueButton()
    ad_QuestionIteration()
    loadQuestion(questions[0], true)
}

// Loads a multiple choice quiz question
const loadQuestion = async (questions, init) => {
    updateProgessBarStatus()
    cr_QuizQuestionText(questions.question)
    if (question.type == `multiple` || questions.type == `single`) {
        loadMultipleChoiceQuestion(questions)
        loadPreviousEnteredChoice(questions.entered)
    } else if (question.type == `short` || questions.type == `long`) {
        loadTextFormQuestion()
        loadPreviousEnteredText(questions.entered)
    }
    // Skips loading animation on initialization
    if (!init) {
        await MoveQuestionContainerMiddle()
    }
    ShowHideContinueButton(questions[currentQuestionIndex])
}

// Creates elements for multiple choice questions (checkboxes & radios)
const loadMultipleChoiceQuestion = (question) => {
    // Generating answer elements
    let quizAnswersUL = document.getElementById(`quiz-answer-list`)
    // questionHTML.id
    for (let i = 0; i < question.answers.length; i++) {
        let quizQuestionDIV = document.createElement(`div`)
        quizQuestionDIV.className = `quiz-answer-text-container-single unselected-answer`
        // Assigns ID as ASCII values (A = 65, B = 66, etc.)
        quizQuestionDIV.id = (i + 65).toString()
        ad_QuizSelectAnswer(quizQuestionDIV)
        // Generate elements
        let quizQuestionPress = document.createElement(`li`)
        let quizQuestionNumerator = document.createElement(`li`)
        let quizQuestionText = document.createElement(`li`)
        // Adding elements to quiz answers
        ed_QuizQuestionElements(question.type, quizQuestionPress, quizQuestionNumerator, quizQuestionDIV, quizQuestionText)
        // Convert ASCII code to text for multiple choice selection
        quizQuestionNumerator.innerText = String.fromCharCode(i + 65)
        quizQuestionText.innerText = question.answers[i]
        // Psuedoparent append
        quizQuestionDIV.append(quizQuestionPress, quizQuestionNumerator, quizQuestionText)
        // Main parent append
        quizAnswersUL.appendChild(quizQuestionDIV)
    }
}

const loadTextFormQuestion = () => {
    // Generating answer elements
    let quizAnswersUL = document.getElementById(`quiz-answer-list`)
    let questionTextarea = document.createElement(`div`);
    questionTextarea.contentEditable = true
    questionTextarea.className = `form-control question-text-form answer-typed-input-form`;
    questionTextarea.setAttribute(`id`, `questionTextarea`);
    questionTextarea.setAttribute(`data-text`, `Enter answer here...`)
    questionTextarea.setAttribute(`onkeydown`, `SaveWrittenAnswers()`)
    questionTextarea.innerHTML = ``
    quizAnswersUL.append(questionTextarea)
}

// Saves short and long form objects to local object
const SaveWrittenAnswers = () => {
    quiz.questions[currentQuestionIndex].entered[0] = document.getElementById(`questionTextarea`).innerHTML
}


// Assigns answered question attributes to elements that have been entered by user previously
const loadPreviousEnteredChoice = (entered) => {
    for (let i = 0; i < entered.length; i++) {
        selectAnswer(entered[i], true)
    }
}

// re-assigns text to short/long form questions
const loadPreviousEnteredText = () => {
    let entered = quiz.questions[currentQuestionIndex].entered
    if (entered.length > 0) {
        let answer = document.getElementById(`questionTextarea`)
        answer.innerHTML = entered[0]
    }
}

// Moves question off screen in a given direction
const MoveQuestionContainer = (first = `up`, second = `down`) => {
    return new Promise((resolve, reject) => {
        // Assigning correct class
        first = `move-container-` + first
        second = `move-container-` + second
        let parent = document.getElementById(`quiz-question-container`);
        parent.classList.add(first, `fadeout`, `fast-transition`);
        setTimeout(() => {
            parent.classList.remove(first, `fast-transition`)
            parent.classList.add(`no-transition`, second)
            resolve()
        }, 200)
    })

}

// Re-centers question on page
const MoveQuestionContainerMiddle = () => {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            let parent = document.getElementById(`quiz-question-container`);
            parent.classList.remove(`no-transition`, `fadeout`);
            parent.classList.add(`fast-transition`, `fadein`)
            parent.style.top = `0`
            parent.classList.remove(`move-container-down`, `move-container-up`)
            setTimeout(() => {
                parent.classList.remove(`fadein`)
                resolve()
            }, 200)
        }, 50)
    })
}

// Adds class names to quiz question based on which type of which it is
const ed_QuizQuestionElements = (type, press, numerator, container, text) => {
    // Append classes for different types of questions
    if (type == `single`) {
        // Radio button classes
        press.className = `press-key-label press-label-radio answer-key-numerator unselected-answer-button`
        numerator.className = `answer-key-numerator numerator-radio unselected-answer-button`
        container.classList.add(`question-type-single`)
    } else if (type == `multiple`) {
        // Checkbox classes
        press.className = `press-key-label press-label-checkbox answer-key-numerator unselected-answer-button`
        numerator.className = `answer-key-numerator numerator-checkbox unselected-answer-button`
        container.classList.add(`question-type-multiple`)
    }
    text.className = `quiz-answer-text-item`
    press.innerText = `Press`
}

// Assigns the question's text 
const cr_QuizQuestionText = (question) => {
    // Generating question text
    let quizQuestionTextDIV = document.getElementById(`quiz-question-text-container`)
    let quizQuestionTextSPAN = document.createElement(`span`)
    quizQuestionTextSPAN.className = `quiz-question-text-item`
    quizQuestionTextSPAN.innerText = question
    quizQuestionTextDIV.appendChild(quizQuestionTextSPAN)
}

// Creates continue button
const cr_ContinueButton = () => {
    let continueDIV = document.createElement(`div`)
    let continueBUTTON = document.createElement(`button`)
    let continueSPAN = document.createElement(`span`)
    continueDIV.id = `quiz-continue-button-container`
    continueDIV.className = `quiz-continue-button-container`
    continueBUTTON.className = `quiz-continue-button`
    continueSPAN.className = `quiz-continue-text`
    continueSPAN.id = `quiz-continue-text`
    continueBUTTON.innerHTML = `Next`
    // Moves to next question on click
    continueBUTTON.onclick = function() {
        loadNewQuestion(`next-question-load`)
    }
    continueSPAN.innerHTML = `press ENTER`
    continueDIV.append(continueBUTTON, continueSPAN)
    let parent = document.getElementById(`quiz-question-container`)
    parent.append(continueDIV)
    // Discerns whether or not to show continue button, based on whether or not an answer has been input/selected
    ShowHideContinueButton(quiz.questions[currentQuestionIndex])
}

// Only shows a continue button if a question is selected
const ShowHideContinueButton = (question) => {
    if (question.type == 'short' || question.type == `long`) {
        document.getElementById(`quiz-continue-button-container`).style.display = `initial`
        document.getElementById(`quiz-continue-text`).style.display = `none`
    } else {
        let show = document.getElementById(`quiz-answer-list`).children
        let buttonContainer = document.getElementById(`quiz-continue-button-container`)
        document.getElementById(`quiz-continue-text`).style.display = `initial`
        // Checks if an answer has been selected. If so, shows continue button
        for (let i = 0; i < show.length; i++) {
            if (show[i].classList.contains(`selected-answer`)) {
                buttonContainer.style.display = `initial`
                return
            }
        }
        // If no answer is selected, don't display button
        buttonContainer.style.display = `none`
    }
}

// Function to load next question & possible answers in object
const loadNewQuestion = async (adjustment) => {
    // Saves written answers before moving on to next question
    let type = quiz.questions[index].type
    if (type == 'long' || type == 'short') {
        SaveWrittenAnswers()
    }
    // Removes previous question & answers
    if (canLoadNewQuestion(adjustment)) {
        await QuestionContainerLoad(adjustment)
        removeAllChildren(`quiz-answer-list`)
        removeAllChildren(`quiz-question-text-container`)
        // Displays previous questions. Does nothing if no questions to load.
        if (adjustment == `previous-question-load`) {
            loadQuestion(quiz.questions[currentQuestionIndex])
            // Displays next question. Does nothing if no questions to load.
        } else if (adjustment == `next-question-load` && currentQuestionIndex <= quiz.questions.length) {
            loadQuestion(quiz.questions[currentQuestionIndex])
        }
    }
}

// Checks if we have reached the first or last question
const canLoadNewQuestion = (adjustment) => {
    // In/de-crement based on if user is loading next or previous question
    if (adjustment == `next-question-load`) {
        currentQuestionIndex++
    } else {
        currentQuestionIndex--
    }
    // Fail safe if we have reached last quesiton
    if (currentQuestionIndex > quiz.questions.length - 1) {
        currentQuestionIndex--
        return false
        // Fail safe if trying to move before first question
    } else if (currentQuestionIndex < 0) {
        currentQuestionIndex++
        return false
    }
    return true

}

// Discerns which direction the question will fly on/off the page
const QuestionContainerLoad = (adjustment) => {
    return new Promise(async (resolve, reject) => {
        if (adjustment == 'next-question-load') {
            // Moves container up off the screen
            await MoveQuestionContainer(`up`, `down`)
        } else {
            // Moves container down off the screen
            await MoveQuestionContainer(`down`, `up`)
        }
        resolve()
    })
}

// Highlights and unhighlights given answers when a keytap is pressed 
// key indicates the id of the given answer, invoking previous will prevent the function from editing the local answered questions object
const selectAnswer = (key, previous) => {
    let answer = document.getElementById(key)
    if (answer) {
        // If only one answer can be given, unselect all answers before reselecting new answer
        if (answer.classList.contains(`question-type-single`)) {
            unselectAllAnswers(document.getElementById('quiz-answer-list'))
        }
        // If answer is not yet selected, select it
        if (answer.classList.contains(`unselected-answer`)) {
            answer.classList.add(`selected-answer`)
            answer.classList.remove(`unselected-answer`)
            indicateSelectedAnswer(answer)
            if (!previous) {
                storeAnswers(true, key)
            }
            // If answer is already selected, unselect it
        } else if (answer.classList.contains(`selected-answer`)) {
            answer.classList.add(`unselected-answer`)
            answer.classList.remove(`selected-answer`)
            // Unhighlight selected answer buttons
            unselectAnswerButton(answer.children)
            if (!previous) {
                storeAnswers(false, key)
            }
        }
    }
    // Triggers a check to see if we should display continue button
    ShowHideContinueButton(quiz.questions[currentQuestionIndex])
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

// Unselects all answers in a question
const unselectAllAnswers = (answerList) => {
    for (let i = 0; i < answerList.childElementCount; i++) {
        let child = answerList.children[i]
        if (child.classList.contains(`selected-answer`)) {
            child.classList.add(`unselected-answer`)
            child.classList.remove(`selected-answer`)
        }
        // re/un-assigns children attribute elements, such as button coloring classes
        unselectAnswerButton(child.children)
    }
}

// Unselects individual quiz answer buttons (e.g. Press A)
const unselectAnswerButton = (child) => {
    for (let j = 0; j < child.length; j++) {
        let childButton = child[j]
        if (childButton && childButton.classList.contains(`selected-answer-button`)) {
            childButton.classList.add(`unselected-answer-button`)
            childButton.classList.remove(`selected-answer-button`)
        }
    }
}

// Change progress bar styling as quiz is completed
const updateProgessBarStatus = () => {
    // Assigning attributes
    let progress = document.getElementById('quiz-progress-bar')
    let text = document.getElementById('progress-bar-text')
    // Value of progress is set in terms of 0 to 100
    let value = Math.floor((calculateQuizProgress(quiz.questions) / quiz.questions.length) * 100)
    // Changing width and aria value 
    progress.setAttribute('aria-valuenow', value)
    progress.style.width = value + `%`
    // Updates progress bar text
    text.innerText = value + '% complete'
}

// Finds quiz progress by comparing num of questions answers to total number of questions
const calculateQuizProgress = (questions) => {
    let answers = 0
    for (let i = 0; i < questions.length; i++) {
        if (questions[i].entered.length > 0) {
            answers++
        }
    }
    return answers
}

// Assigns function to change answer attributes with given id
const ad_QuizSelectAnswer = (answer) => {
    answer.onclick = () => {
        selectAnswer(answer.id)
    }
}

// Adds iteration capabilities to previous & next buttons 
const ad_QuestionIteration = () => {
    let prev = document.getElementById(`previous-question-load`)
    let next = document.getElementById(`next-question-load`)
    prev.onclick = () => {
        loadNewQuestion(prev.id)
    }
    next.onclick = () => {
        loadNewQuestion(next.id)
    }
}

// Listener for key presses for quiz interaction.
document.onkeydown = function(evt) {
    evt = evt || window.event;
    // console.log(evt.keyCode)
    // Registers key selectors for A to J on multiple choice questions.
    if (evt.keyCode >= 65 && evt.keyCode < 90 || evt.keyCode == 8 || evt.keyCode == 46) {
        selectAnswer(evt.keyCode.toString())
    }
    if (evt.keyCode == 38) {
        loadNewQuestion('previous-question-load')
    }
    // Moves to next question on down arrow tap or enter. Disables iteration using enter key for open ended questions
    let type = quiz.questions[currentQuestionIndex].type
    if (evt.keyCode == 40 || ((type == `single` || type == `multiple`) && evt.keyCode == 13)) {
        loadNewQuestion('next-question-load')
    }
};

init()