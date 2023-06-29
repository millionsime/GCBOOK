<p>
Hold the exam will start when all of your friends are ready. thank you for your pacience
</p>

<button id="time" class="btn button-primary padding">
	Start Timer
</button>


<p id="gfg"></p>
<script>
	url = "http://127.0.0.1:8000/api/status"
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
   document.getElementById('time').innerHTML = questions[index]['status'];
});
let counter = 0;
let interval = setInterval(() => {
  ajax().next(() => {
    clearInterval(interval);
  }).catch(() => {
    if (counter >= 10) {
      clearInterval(interval);
      document.getElementById('time').innerHTML= counter;
    } else {
      counter++;
    }
  })
}, 5000);
</script>
