<?php
echo '


<style>
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
  }
  body {
    height: 100vh;
  }
  .start-screen,
  .score-container {    
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }
  button {
    border: none;
    outline: none;
    cursor: pointer;
  }
  #start-button,
  #restart {
    font-size: 1.3em;
    padding: 0.5em 1.8em;
    border-radius: 0.2em;
    box-shadow: 0 20px 30px rgba(0, 0, 0, 0.4);
  }
  #restart {
    margin-top: 0.9em;
  }
  #display-container {
  width: 80%;
    background-color: #ffffff;
    padding: 3.1em 1.8em;
    margin: 0 auto;
    border-radius: 0.6em;
  }
  .header {
    margin-bottom: 1.8em;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 0.6em;
    border-bottom: 0.1em solid #c0bfd2;
  }
  .timer-div {
    background-color: #e1f5fe;
    width: 7.5em;
    border-radius: 1.8em;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0.7em 1.8em;
  }
  .question {
    margin-bottom: 1.25em;
    font-weight: 600;
  }
  .option-div {
    font-size: 0.9em;
    width: 100%;
    padding: 1em;
    margin: 0.3em 0;
    text-align: left;
    outline: none;
    background: transparent;
    border: 1px solid #c0bfd2;
    border-radius: 0.3em;
  }
  .option-div:disabled {
    color: #000000;
    cursor: not-allowed;
  }
  #next-button {
    font-size: 1em;
    margin-top: 1.5em;
    background-color: #8754ff;
    color: #ffffff;
    padding: 0.7em 1.8em;
    border-radius: 0.3em;
    float: right;
    box-shadow: 0px 20px 40px rgba(0, 0, 0, 0.3);
  }
  .hide {
    display: none;
  }
  .incorrect {
    background-color: #ffdde0;
    color: #d32f2f;
    border-color: #d32f2f;
  }
  .correct {
    background-color: #e7f6d5;
    color: #689f38;
    border-color: #689f38;
  }
  #user-score {
    font-size: 1.5em;
    color: #ffffff;
  }
  </style>

  <div class="start-screen">
<button id="start-button">Start</button>
</div>
<div id="display-container">
<div class="header">
    <div class="number-of-count">
        <span class="number-of-question">1 of 3 questions</span>
    </div>
    <div class="timer-div">
        <img src="https://uxwing.com/wp-content/themes/uxwing/download/time-and-date/stopwatch-icon.png"
            width="20px" />
        <span class="time-left">10s</span>
    </div>
</div>
<div id="container">
    <!-- questions and options will be displayed here -->
</div>
<button id="next-button">Next</button>
</div>
<div class="score-container hide">
<div id="user-score">Demo Score</div>
<button id="restart">Restart</button>
</div>

<script src="js/quiz.js"></script>

';	
?>