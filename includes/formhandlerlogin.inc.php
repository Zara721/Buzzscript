<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username-adj"] . $_POST["username-noun"];
    $passwd = $_POST["password"];

    try {
        require_once "dbh.inc.php";

        $query = "SELECT id FROM users WHERE username = ? AND passwd = ?;";
        $statement = $pdo->prepare($query);
        $statement->execute([$username, $passwd]);

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $pdo = null;
            $statement = null;

            session_start();

            // set session variables
            $_SESSION["username"] = $username;
            $_SESSION["id"] = $result['id'];

            header("Location: ../index.php");
            die();
        } else {
            // Login credentials not found in database
            
            
            
            
            
            
            
            
            
            
            header("Location: ../index.php?error=loginfailed&username=' . $username . '&password=' . $passwd");
            die();
        }
    } catch (PDOException $e) {
        echo "Query Failed: " . $e->getMessage();
        die();
    }
} else {
    header("Location: ../index.php");
}
