<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username-adj"] . $_POST["username-noun"];
    $passwd = $_POST["passwd"];
    $profile_config = "Top#Orange#Orange";
    $ach_config = "Welcome to the Hive";
    $selected_title = "Honey Newbie";
    $title_list = "Honey Newbie";


    try{
        require_once "dbh.inc.php";

        $query = "INSERT INTO users (username, passwd, profile_config, ach_config, title, title_list) 
        VALUES (?, ?, ?, ?, ?, ?);";

        $statement = $pdo->prepare($query);

        $statement->execute([$username, $passwd, $profile_config, $ach_config, $selected_title, $title_list]);

        $last_id = $pdo->lastInsertId();

        $pdo = null;
        $statement = null;

        // Start a session or continue an existing one
        session_start();

        // Set session variables
        $_SESSION["username"] = $username;
        $_SESSION["id"] = $last_id;
        $_SESSION["profile_config"] = $profile_config;


        header("Location: ../index.php");
        die();
    } catch (PDOException $e){
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
}
