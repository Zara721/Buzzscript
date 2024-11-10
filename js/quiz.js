// Since there's already markup on the HTML, to add the question and options you can use selectors
// like get element by Id and just change the textContent
// So the js needs to change the textContent then when the submit button (the arrow) is click
// which you can know through the submit event, the textContent should be changed to the next
//question. Once all the questions are done, the you can make the question header display 
//thanks for playing for now as a placeholder

document.addEventListener("DOMContentLoaded", () => {
    //load data from the JSON file
    const questions_json = JSON.parse(questions);
    const horror_questions = questions_json.horror_characters

    for (let q of horror_questions) {
        console.log(q.question)
    }
})
