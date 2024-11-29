<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuzzScript Quiz</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/question.css">
    <link rel="stylesheet" href="../css/question.css">
    <script src="../js/data/questions.json"></script>

    <?php

        $quizList = ['horror_character', 'murder', 'pigeon', 'vacation', 'witch', 'country'];
        $defaultQuiz = 'horror_character';

        // check if selected quiz exists
        if (isset($_GET['selectedQuiz'])) {
            $selectedQuiz = $_GET['selectedQuiz'];
            
            if (!in_array($selectedQuiz, $quizList)) {
                $selectedQuiz = $defaultQuiz;
            }
        }
        else {
            $selectedQuiz = $defaultQuiz;
        }

        $darkMode = "off";
        // check if selected quiz exists
        if (isset($_GET['darkMode'])) {
            $darkMode = $_GET['darkMode'];
        }
        
    ?>
    <script>
        const selectedQuiz = '<?php echo $selectedQuiz ?>';
        const darkMode = '<?php echo $darkMode ?>';
    </script>
    <script src="../js/quiz.js"></script>
</head>
<body>
    <main>
        <header>
            <h1 id="question"></h1>
        </header>
        <form id="choices">
            <div class="option">
                <input type="radio" id="option_a" name="choice">
                <label for="option_a"></label>
            </div>

            <div class="option">
                <input type="radio" id="option_b" name="choice">
                <label for="option_b"></label>
            </div>

            <div class="option">
                <input type="radio" id="option_c" name="choice">
                <label for="option_c"></label>
            </div>

            <div class="option">
                <input type="radio" id="option_d" name="choice">
                <label for="option_d"></label>
            </div>

            <button type="submit" id="submit">
                <img src="../assets/Miscellaneous/Next Button.png" alt="">
            </button>
        </from>
    </main>
</body>
</html>