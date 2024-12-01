<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newTitle = $_POST["title"];
    echo $newTitle;

    $userId = $_SESSION["id"];
    //echo $userId;

    try{
        require_once "dbh.inc.php";

        require_once "updatetitle.inc.php";

        // start a session or continue an existing one
        session_start();
        header("Location: ../index.php");
        die();
    } catch (PDOException $e){
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
}
