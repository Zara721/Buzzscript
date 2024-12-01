<?php
    session_start();

    if ($_SESSION["userStatus"] = "loggedIn" && isset($_SESSION["id"])) {
        $userId = $_SESSION["id"];

        try{
            require_once "../includes/dbh.inc.php";
    
            require_once "../includes/getUserInfo.inc.php";
    
            $result = getUserInfo($userId, $pdo);
    
        } catch (PDOException $e){
            die("Failed to retrive user info: " . $e->getMessage());
        }
    
        $currentTitles = $result["title_list"];
        $achList = $result["ach_config"];
    }

?>
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

        //update title based on quiz outcome

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
        <?php if ($_SESSION["userStatus"] == "loggedIn") : ?>
            <form action="../includes/formhandler.updatetitle.inc.php?darkMode=<?php echo $darkMode?>" method="post">
                <input type="hidden" name="currentTitles" value="<?php echo $currentTitles ?>">
                <input type="hidden" name="achList" value="<?php echo $achList ?>">
                <input type="hidden" name="selectedQuiz" value="<?php echo $selectedQuiz ?>">
                <input type="hidden" name="newTitle" id="newTitle">
                <button type="submit" id="home">Home</button>
            </form>
        <?php else : ?>
            <a href="../index.php?darkMode=<?php echo $darkMode?>" id="home">Home</a>
        <?php endif; ?>
    </main>
</body>
</html>