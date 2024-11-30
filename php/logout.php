<?php

function logoutUser() {
    
    if (!isset($_SESSION)) {
        session_start();
    }

    $_SESSION = array();

    session_destroy();

    session_regenerate_id(true);

    // redirect to home page
    header("Location: ../index.php?darkMode=off");
    exit();
}

logoutUser();
