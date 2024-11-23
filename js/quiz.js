
document.addEventListener("DOMContentLoaded", () => {
    console.log(`dom wormking`);
    let selectedQuiz = new URLSearchParams(window.location.search).get('selectedQuiz');
    console.log(selectedQuiz);
    //load data from the JSON file
    const questions_json = JSON.parse(questions);
    const currentQuiz = questions_json[selectedQuiz];
    let currentQuestionIndex = 0;

    const outcomes = Object.keys(currentQuiz.outcomes);
    const outcomeDict = outcomes.reduce((acc, key) => ({...acc, [key]: 0}), {});
    console.log(outcomeDict)

    loadQuestion();

    function loadQuestion() {
        const currentQuestions = currentQuiz.questions[currentQuestionIndex];
        document.getElementById("question").textContent = currentQuestions.question;
    
        const options = ['a', 'b', 'c', 'd'];
        options.forEach(option => {
            const optionElement = document.querySelector(`label[for='option_${option}']`);
            if (optionElement) {
                optionElement.textContent = currentQuestions[`option_${option}`];
            }
        });
    }
    
    function updateOutcome(chosen_outcome) {
        // Update the outcome dictionary based on the parsed outcomes
        const currentQuestions = currentQuiz.questions[currentQuestionIndex];
        let outcome_array = currentQuestions[chosen_outcome];

        outcome_array.forEach(([outcome, points]) => {
            if (outcome in outcomeDict) {
                outcomeDict[outcome] += parseInt(points);
            }
        });
    }

    // Set up event listener for the qiestion's form submission 
    document.getElementById("choices").addEventListener("submit", function(event) {
        event.preventDefault();  // Prevent form submission from refreshing the page

        // Try to get the selected option
        const selectedOption = document.querySelector('input[name="choice"]:checked');
        
        if (selectedOption) {
            const selectedAnswer = selectedOption.nextElementSibling.textContent;
            console.log(`You selected: ${selectedAnswer}`);

            const chosen_outcome = selectedOption.id.replace("option", "outcome")
            updateOutcome(chosen_outcome)

            currentQuestionIndex++;
            currentQuestionIndex >= currentQuiz.questions.length ? showResults() : loadQuestion();
        } else {
            alert("Please select an option.");
        }

        const form = document.getElementById("choices")
        form.reset()
    });

    function showResults() {
        console.log(outcomeDict)
        const highestOutcome = Object.keys(outcomeDict).reduce((a, b) => outcomeDict[a] > outcomeDict[b] ? a : b);
        window.location.href = `quiz_outcome.html?highestOutcome=${highestOutcome}&selectedQuiz=${selectedQuiz}`;

        // const resultMessage = `Thanks for playing. You got ${currentQuiz.outcomes[highestOutcome][0]}.`;
        // document.getElementById("question").textContent = resultMessage;
        // document.getElementById("choices").style.display = "none";
    }

})


