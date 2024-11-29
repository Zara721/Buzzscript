document.addEventListener("DOMContentLoaded", () => {
    console.log("connected")
    // let selectedQuiz = new URLSearchParams(window.location.search).get('selectedQuiz');
    let selectedQuiz = "countries"
    console.log(selectedQuiz);

    //load data from the JSON file
    const questions_json = JSON.parse(questions);
    const currentQuiz = questions_json[selectedQuiz];

    // convert answers to lowercase
    const answerLists = currentQuiz.answer_list.map(subArray => 
        subArray.map(answer => answer.toLowerCase())
    );

    // create a dictionary with answers delimenated by commas as keys
    const answersDict = {};
    answerLists.forEach(list => {
        const key = list.join(',');
        answersDict[key] = false;
    });
    console.log(answersDict);

    const answerType = currentQuiz.answer_type;

    const bio = currentQuiz.bio;
    document.getElementById("quiz-question").textContent = bio;

    const retake_link = document.getElementById("retake")
    retake_link.href = `timed_questions.html?selectedQuiz=${selectedQuiz}`

    const countdown = document.getElementById("countdown");
    let minutes = 1;
    let seconds = 0;
      
    function updateCountdown() {
        countdown.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
        if (seconds === 0 && minutes > 0) {
            minutes--;
            seconds = 59;
        } else if (seconds === 0 && minutes === 0) {
            //logic for when timer ends
            console.log("Time's up!");
            answer_field.style.display = "none";

            const final_score_msg = document.getElementById("final-score");
            final_score_msg.textContent = `You got ${score} ${answerType}!`

            document.getElementById("final-score").style.display = "block"

            // Stop the timer here 
            clearInterval(countdownInterval);
            return;
        }

        seconds--;
    }

    const start_btn = document.getElementById("start-btn");
    const answer_field = document.getElementById("answer");

    start_btn.addEventListener("click", () => {
        start_btn.style.display = "none";
        answer_field.style.display = "block";
        scoreElement.textContent = score
        countdownInterval= setInterval(updateCountdown, 1000);
    })

    answer_field.addEventListener("keydown", (e) => {
        if (e.key == "Enter") {
            console.log(answer_field.value);
            const enteredAnswer = answer_field.value.toLowerCase().trim();
    
            // check if the answer is a value of any key list in answersDict
            for (const key of Object.keys(answersDict)) {
                const validAnswers = key.split(',');
                if (validAnswers.includes(enteredAnswer) && !answersDict[key]) {
                    console.log(answersDict[key]);
                    answersDict[key] = true;
                    console.log(answersDict[key]);

                    updateScore();

                    //add valid answer on screen
                    const user_answer = document.querySelector("#user-answers p");
                    user_answer.textContent += enteredAnswer[0].toUpperCase() + enteredAnswer.substring(1) + " · ";
                    break; // exit the loop once we've found a match
                }
            }
    
            answer_field.value = ""; // clear text field
        }
    });
    
    const scoreElement = document.getElementById("score");
    let score = 0;

    function updateScore() {
        score++;
        scoreElement.textContent = score;
    }

});