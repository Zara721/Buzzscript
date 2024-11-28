<?php

function logoutUser() {
    
    if (!isset($_SESSION)) {
        session_start();
    }

    $_SESSION = array();

    session_destroy();

    session_regenerate_id(true);

    // if(isset($_SESSION["username"])) {
    //     $_SESSION["userStatus"]= "loggedOut";
    //     unset($_SESSION["username"]);
    //     unset($_SESSION["id"]);
    // }

    // Redirect to login page or home page
    header("Location: ../index.php");
    exit();
}

logoutUser();
