// Since there's already markup on the HTML, to add the question and options you can use selectors
// like get element by Id and just change the textContent
// So the js needs to change the textContent then when the submit button (the arrow) is click
// which you can know through the submit event, the textContent should be changed to the next
//question. Once all the questions are done, the you can make the question header display 
//thanks for playing for now as a placeholder
console.log(`workign`);  // Test if the JS file is running

document.addEventListener("DOMContentLoaded", () => {
    console.log(`dom wormking`);
    //load data from the JSON file
    const questions_json = JSON.parse(questions);
    let currentQuiz = questions_json.horror_character
    let currentQuestionIndex = 0;
    const outcomes = Object.keys(currentQuiz.outcomes);
    const outcome_dict = {};
    outcomes.forEach(key => {
        outcome_dict[key] = 0;
    });

    console.log(outcome_dict)

    loadQuestion();

    function loadQuestion(){
        const currentQuestion = currentQuiz.questions[currentQuestionIndex];
        document.getElementById(`question`).textContent = currentQuestion.question;
        
        // Update the option labels
        document.querySelector("label[for='option_a']").textContent = currentQuestion.option_a;
        document.querySelector("label[for='option_b']").textContent = currentQuestion.option_b;
        document.querySelector("label[for='option_c']").textContent = currentQuestion.option_c;
        document.querySelector("label[for='option_d']").textContent = currentQuestion.option_d;
    }

    function updateOutcome(chosen_outcome) {
        // Update the outcome dictionary based on the parsed outcomes
        let outcome_array = currentQuiz.questions[currentQuestionIndex][chosen_outcome];

        outcome_array.forEach(([outcome, points]) => {
            if (outcome in outcome_dict) {
                outcome_dict[outcome] += parseInt(points);
            }
        });
        console.log(outcome_dict)
    }

    //document.querySelector(``)
    // Event listener for form submission (answering the question)
    document.getElementById("choices").addEventListener("submit", function(event) {
        event.preventDefault();  // Prevent form submission from refreshing the page

        // Get the selected option
        const selectedOption = document.querySelector('input[name="choice"]:checked');
        chosen_outcome = selectedOption.id.replace("option", "outcome")
        console.log(chosen_outcome)
        // console.log(currentQuiz.questions[currentQuestionIndex][chosen_outcome])

        updateOutcome(chosen_outcome)
        
        if (selectedOption) {
            const selectedAnswer = selectedOption.nextElementSibling.textContent;
            console.log("You selected: " + selectedAnswer);
            
            // Move to the next question
            currentQuestionIndex++;

            // If there are more questions, load the next one
            if (currentQuestionIndex < currentQuiz.questions.length) {
                loadQuestion();

            } else {
                let users_outcome = Object.keys(outcome_dict).reduce((a, b) => outcome_dict[a] > outcome_dict[b] ? a : b);
                users_outcome = currentQuiz.outcomes[users_outcome]

                document.getElementById(`question`).textContent = `Thanks for playing. \n You got ${users_outcome}.`;
                document.getElementById(`choices`).style.display = `none`;
            }
        } else {
            alert("Please select an option.");
        }
      });

    })


