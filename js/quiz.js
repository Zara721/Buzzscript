
document.addEventListener("DOMContentLoaded", () => {
    // let selectedQuiz = new URLSearchParams(window.location.search).get('selectedQuiz');
    console.log(selectedQuiz);

    if (darkMode == "on") {
        document.querySelector("header").classList.add("dark-mode");
        document.querySelector("main").classList.add("dark-mode");

        const labelElements = document.querySelectorAll("label");
        labelElements.forEach(element => {
            element.classList.add("dark-mode")
        })

        const radioElements = document.querySelectorAll(`input[type="radio"]`)
        radioElements.forEach(element => {
            element.classList.add("dark-mode")
        })
    }

    //load data from the JSON file
    const questions_json = JSON.parse(questions);
    const currentQuiz = questions_json[selectedQuiz];
    let currentQuestionIndex = 0;

    const outcomes = Object.keys(currentQuiz.outcomes);
    const outcomeDict = outcomes.reduce((acc, key) => ({...acc, [key]: 0}), {});
    console.log(outcomeDict);

    const optionType = currentQuiz.option_type;
    console.log(optionType);

    if (optionType == "images") {
        //change the css to add classes that show images appropriately
        document.getElementById("choices").classList.add("images");

        const optionElements = document.querySelectorAll(".option");
        optionElements.forEach(element => {
            element.classList.add("images")
        })

        const radioElements = document.querySelectorAll(`input[type="radio"]`)
        radioElements.forEach(element => {
            element.classList.add("images")
        })

        const labelElements = document.querySelectorAll("label");
        labelElements.forEach(element => {
            element.classList.add("images")

            //add img elements to label
            const imgElement = document.createElement("img");
            element.appendChild(imgElement)
        })

    }

    loadQuestion();

    function loadQuestion() {
        const currentQuestions = currentQuiz.questions[currentQuestionIndex];
        document.getElementById("question").textContent = currentQuestions.question;

        const options = ['a', 'b', 'c', 'd'];

        options.forEach(option => {
            const labelElement = document.querySelector(`label[for='option_${option}']`);
            const optionText = currentQuestions[`option_${option}`]

            if (labelElement) {
                if (optionType == "text") {
                    labelElement.textContent = optionText;
                } else if (optionType == "images")  {
                    const imgElement = document.querySelector(`label[for='option_${option}'] img`)
                    imgElement.src = `../question_images/${selectedQuiz}/${currentQuestionIndex}/${optionText}`                
                }
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

        const form = document.getElementById("choices");
        form.reset();
    });

    function showResults() {
        console.log(outcomeDict)
        const highestOutcome = Object.keys(outcomeDict).reduce((a, b) => outcomeDict[a] > outcomeDict[b] ? a : b);
        window.location.href = `../php/quiz_outcome.php?highestOutcome=${highestOutcome}&selectedQuiz=${selectedQuiz}&darkMode=${darkMode}`;
    }

})


