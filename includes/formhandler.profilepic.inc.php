<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newProfileConfig = $_POST["profile-config"];
    //echo $newProfileConfig;

    $userId = $_SESSION["id"];
    //echo $userId;


    try{
        require_once "dbh.inc.php";

        require_once "updateprofilepic.inc.php";

        // start a session or continue an existing one
        session_start();

        // update session variables
        $_SESSION["profile_config"] = $newProfileConfig;

        header("Location: ../index.php");
        die();
    } catch (PDOException $e){
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
}
