<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentTitles = $_POST["currentTitles"];
    $newTitle = $_POST["newTitle"];
    $achList = $_POST["achList"];
    $userId = $_SESSION["id"];
    $darkMode = "off";
    $selectedQuiz = $_POST["selectedQuiz"];

    // check if darkMode is passed in
    if (isset($_GET['darkMode'])) {
        $darkMode = $_GET['darkMode'];
    }
    
    ///check if new title is in title list
    function checkNewTitle($newTitle, $currentTitles) {
    
        $titlesArray = explode("#", $currentTitles);


        foreach ($titlesArray as $title) {
            echo $title ." ". $newTitle ."<br>";
            if ($newTitle == $title) {
                return false;
            }
        }

        return true;
    }

    $isNewTitle = checkNewTitle($newTitle, $currentTitles);

    $title_list = $currentTitles;
    if ($isNewTitle) {
        $title_list = $currentTitles . "#" . $newTitle;
    }

    $quiz_title_data = '{
        "horror_character": ["The One Who Knows", "The Survivor", "The Skeptic", "The Leader", "The Film Buff", "The Final Girl", "The Twist Villain", "The Fool"],
        "murder": ["Criminally Inept", "In for the Long Haul", "True Crime Infamy", "Silver Tongue", "Dead Men Tell No Tales"],
        "vacation": ["Romania", "Canada", "Thailand", "Greece", "France", "Germany"],
        "witch": ["Cat Whisperer", "All-Seeing Eyes", "Plant Affinity", "Pyromancy", "Summoner"],
        "pigeon": ["English Carrier", "Old Dutch", "Reverse Wing", "Brunner Pouter", "Rock Pigeon", "Fairy Swallow"]
    }';

    $quizTitleArray = json_decode($quiz_title_data, true);

    $quiz_ach_config = '{
        "horror_character": "Horror Fanatic",
        "murder": "Criminal Mastermind",
        "vacation": "Bucket List Beginnings",
        "witch": "Wicked Witch",
        "pigeon": "Pigeon Expert"
    }';

    $quizAchArray = json_decode($quiz_ach_config, true);

    function checkNewAch($titleList, $achList) {
        global $quizTitleArray, $quizAchArray, $selectedQuiz;
    
        // check if title list has all the titles for the selected quiz
        $quizTitles = $quizTitleArray[$selectedQuiz];
        $numOfQuizTitles = count($quizTitles);

        if (count(array_intersect($titleList, $quizTitles )) != $numOfQuizTitles) {
            return false; //have not got all titles for quiz, no ach unlocked
        }

        $correspondingAchievement = $quizAchArray[$selectedQuiz];
    
        // Check if the achievement is in the achList
        if (in_array($correspondingAchievement, $achList)) {
            return false; // ach has already beein added to ach list, don't add again
        }
    
        return true; //new ach unlocked
    }

    $titleArray = explode("#", $title_list );
    $achArray = explode("#", $achList);

    $isNewAch = checkNewAch($titleArray, $achArray);
    $ach_config = $achList;
    if ($isNewAch) {
        $ach_config = $achList . "#" . $quizAchArray[$selectedQuiz];
    }
    
    // foreach (explode("#", $currentTitles) as $title) {
    //     echo $title . " ";
    // }

    // echo $currentTitles;
    // echo $newTitle;
    // echo $userId;

    try{
        require_once "dbh.inc.php";

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "UPDATE users SET title_list = ?, ach_config = ? WHERE id = ?;";

        $statement = $pdo->prepare($query);

        $statement->execute([$title_list, $ach_config, $userId]);

        $pdo = null;
        $statement = null;

        $homeLink = "Location: ../index.php?darkMode=$darkMode";

        if ($isNewTitle) {
            $homeLink .= "&newTitle=" . $newTitle;
        } else {
            $homeLink .= "&newTitle=none";
        }

        if ($isNewAch) {
            $homeLink .= "&newAch=" . $quizAchArray[$selectedQuiz];
        } else {
            $homeLink .= "&newAch=none";
        }

        header($homeLink);
        die();
        
    } catch (PDOException $e){
        echo "Query Failed: " . $e->getMessage();
    }
}

