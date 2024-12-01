document.addEventListener("DOMContentLoaded", () => {
    // let highestOutcome = new URLSearchParams(window.location.search).get('highestOutcome');
    console.log(highestOutcome);

    console.log(selectedQuiz);

    if (darkMode == "on") {
        document.querySelector("body").classList.toggle("dark-mode");
    }

    const questions_json = JSON.parse(questions);
    const currentQuiz = questions_json[selectedQuiz];

    //populate outcome card
    const quiz_name = document.getElementById("quiz-name");
    const outcome = document.getElementById("outcome");
    const outcome_bio = document.getElementById("bio");
    const outcome_img = document.getElementById("outcome-img");

    quiz_name.textContent = currentQuiz.bio;
    console.log(currentQuiz.outcomes);
    outcome.textContent = currentQuiz.outcomes[highestOutcome][0];
    outcome_bio.textContent = currentQuiz.outcomes[highestOutcome][1];
    outcome_img.src = `../images/${selectedQuiz}/${currentQuiz.outcomes[highestOutcome][2]}`;

    // const retake_link = document.getElementById("retake")
    // retake_link.href = `basic_question.php?selectedQuiz=${selectedQuiz}`
    console.log("working update");

    const form = document.querySelector('form');
    if (form) {
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
    
            const newTitle = document.getElementById("newTitle");
            newTitle.value = currentQuiz.outcomes[highestOutcome][0];
    
            this.submit();
        });
    }
});