<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentTitles = $_POST["currentTitles"];
    $newTitle = $_POST["newTitle"];

    $userId = $_SESSION["id"];

    
    $darkMode = "off";
    
    // check if darkMode is passed in
    if (isset($_GET['darkMode'])) {
        $darkMode = $_GET['darkMode'];
    } 
    
    //check if new title is in title list
    foreach (explode("#", $currentTitles) as $title) {
        echo $newTitle . " " . $title ."<br>";
        echo strlen($newTitle) . " " . strlen($title) ."<br>";
        if ($newTitle == $title) {
            header("Location: ../index.php?darkMode=$darkMode"); //return to home page if title has already been gained
            exit();
        }
    }

    foreach (explode("#", $currentTitles) as $title) {
        echo $title . " ";
    }

    // echo $currentTitles;
    // echo $newTitle;
    // echo $userId;

    $title_list = $currentTitles . "#" . $newTitle;

    try{
        require_once "dbh.inc.php";

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "UPDATE users SET title_list = ? WHERE id = ?;";

        $statement = $pdo->prepare($query);

        $statement->execute([$title_list, $userId]);

        $pdo = null;
        $statement = null;

        header("Location: ../index.php?darkMode=$darkMode");
        die();
        
    } catch (PDOException $e){
        echo "Query Failed: " . $e->getMessage();
    }
}

