<?php

function getUserInfo($userId, $pdo) {
    try{
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM users WHERE id = ?;";

        $statement = $pdo->prepare($query);

        $statement->execute([$userId]);

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        $pdo = null;
        $statement = null;

        return $result;
        
    } catch (PDOException $e){
        echo "Query Failed: " . $e->getMessage();
        return null;
    }
}
