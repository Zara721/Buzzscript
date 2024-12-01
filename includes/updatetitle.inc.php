<?php

try{
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "UPDATE users SET title = ? WHERE id = ?;";

    $statement = $pdo->prepare($query);

    $statement->execute([$newTitle, $userId]);

    $pdo = null;
    $statement = null;

    return $result;
    
} catch (PDOException $e){
    echo "Query Failed: " . $e->getMessage();
    return null;
}

