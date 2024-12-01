<?php

function logoutUser() {
    
    if (!isset($_SESSION)) {
        session_start();
    }

    session_unset();
    session_destroy();

    // redirect to home page
    header("Location: ../index.php?darkMode=off");
    exit();
}

logoutUser();
