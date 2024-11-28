<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username-adj"] . $_POST["username-noun"];
    $passwd = $_POST["passwd"];
    $profile_config = "top_hat#orange#orange";
    $ach_config = "created_account";
    $title = "Honey_Newbie";

    try{
        require_once "dbh.inc.php";

        $query = "INSERT INTO users (username, passwd, profile_config, ach_config, title) 
        VALUES (?, ?, ?, ?, ?);";

        $statement = $pdo->prepare($query);

        $statement->execute([$username, $passwd, $profile_config, $ach_config, $title]);

        $pdo = null;
        $statement = null;

        // Start a session or continue an existing one
        session_start();

        // Set session variables
        $_SESSION["username"] = $username;

        header("Location: ../index.php");
        die();
    } catch (PDOException $e){
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
}
