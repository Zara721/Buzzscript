<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["concat-username"];
    $passwd = $_POST["passwd"];


    try {
        require_once "dbh.inc.php";

        $query = "SELECT * FROM users WHERE username = ? AND passwd = ?;";
        $statement = $pdo->prepare($query);
        $statement->execute([$username, $passwd]);

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        echo $result;

        if ($result) {
            $pdo = null;
            $statement = null;

            session_start();

            // set session variables
            $_SESSION["username"] = $username;
            $_SESSION["id"] = $result['id'];
            $_SESSION['profile_config'] = $result['profile_config'];

            header("Location: ../index.php");
            die();
        } else {
            
            // login credentials not found in database
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
