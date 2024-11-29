<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuzzScript Quiz</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/timed_questions.css">
    <script src="../js/data/timed_questions.json"></script>
    <script src="../js/timed_quiz.js"></script>
</head>
<body>
    <article>
        <header>
            <a href="../index.html" id="retake">Replay</a>
            <a href="../index.php" id="home">Home</a>
            <p id="countdown">-:--</p>
        </header>
        
        <section id="option-input">
            <label for="answer" id="quiz-question">Question being asked</label>
            <input type="text" id="answer" name="answer">
            <button type="button" id="start-btn">Start Quiz</button>
            <p id="final-score"></p>
        </section>
        <footer>
            <p id="score"></p>
        </footer>
    </article>
    <section id="user-answers">
            <p></p>
    </section>
</body>
</html>