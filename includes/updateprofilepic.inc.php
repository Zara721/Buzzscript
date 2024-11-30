<?php

try{
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "UPDATE users SET profile_config = ? WHERE id = ?;";

    $statement = $pdo->prepare($query);

    $statement->execute([$newProfileConfig, $userId]);

    $pdo = null;
    $statement = null;

    return $result;
    
} catch (PDOException $e){
    echo "Query Failed: " . $e->getMessage();
    return null;
}

