<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results!</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/quiz_outcome.css">
    <script src="../js/data/questions.json"></script>
    <?php
        $quizList = ['horror_character', 'murder', 'pigeon', 'vacation', 'witch', 'country'];
        $defaultQuiz = 'horror_character';

        // Check if selected quiz exists
        if (isset($_GET['selectedQuiz'])) {
            $selectedQuiz = $_GET['selectedQuiz'];
            
            if (!in_array($selectedQuiz, $quizList)) {
                $selectedQuiz = $defaultQuiz;
            }

        }
        else {
            $selectedQuiz = $defaultQuiz;
        }

        if (isset($_GET['highestOutcome'])) {
            $highestOutcome= $_GET['highestOutcome'];
        }
        else {
            $highestOutcome = "FG";
        }

        $darkMode = "off";
        // check if selected quiz exists
        if (isset($_GET['darkMode'])) {
            $darkMode = $_GET['darkMode'];
        }

    ?>
    <script>
        const selectedQuiz = '<?php echo $selectedQuiz ?>'
        const highestOutcome = '<?php echo $highestOutcome ?>'
        const darkMode = '<?php echo $darkMode ?>';
    </script>
    <script src="../js/quiz_outcome.js"></script>
</head>
<body>
    <!-- change main to article -->
    <main>
        <h1 id="quiz-name">Quiz name goes here</h1>
        <section id="display-outcome">
            <header>
                <h2 id="outcome">Outcome</h2>
                <p id="bio">A quipy outcome bio!</p>
            </header>
            <img src="" id="outcome-img">
        </section>
        <a href="basic_question.php?selectedQuiz=<?php echo $selectedQuiz?>&darkMode=<?php echo $darkMode?>" id="retake">Retake</a>
        <a href="../index.php?darkMode=<?php echo $darkMode?>" id="home">Home</a>
    </main>
</body>
</html>