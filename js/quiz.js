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
    const horror_questions = questions_json.horror_character

    for (let q of horror_questions) {
            console.log(q.question)
        }
    
        let currentQuestionIndex = 0;
        loadQuestion();

    function loadQuestion(){
        const currentQuestion = horror_questions[currentQuestionIndex];
        document.getElementById(`question`).textContent = currentQuestion.question;
                // Update the option labels
        document.querySelector("label[for='option_a']").textContent = currentQuestion.option_a;
        document.querySelector("label[for='option_b']").textContent = currentQuestion.option_b;
        document.querySelector("label[for='option_c']").textContent = currentQuestion.option_c;
        document.querySelector("label[for='option_d']").textContent = currentQuestion.option_d;
    }

        //document.querySelector(``)
        // Event listener for form submission (answering the question)
        document.getElementById("choices").addEventListener("submit", function(event) {
            event.preventDefault();  // Prevent form submission from refreshing the page
    
            // Get the selected option
            const selectedOption = document.querySelector('input[name="choice"]:checked');
            
            if (selectedOption) {
                const selectedAnswer = selectedOption.nextElementSibling.textContent;
                console.log("You selected: " + selectedAnswer);
                
                // Move to the next question
                currentQuestionIndex++;
    
                // If there are more questions, load the next one
                if (currentQuestionIndex < horror_questions.length) {
                    loadQuestion();

                } else {

                    document.getElementById(`question`).textContent = `Thanks for playing`;
                    document.getElementById(`choices`).style.display = `none`;
                }
            } else {
                alert("Please select an option.");
            }
        });

    })


