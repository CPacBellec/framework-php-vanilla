<?php
require_once "./src/dbConnect.php";

//fonction getAll
function getAll($connection){
    $statement = $connection->query("SELECT * FROM `contacts` WHERE 1");
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}
  
//fonction getById
function getById($connection, $id){
    $statement = $connection->prepare("SELECT * FROM `contacts` WHERE id = ? ");
    $statement->bindParam(1,$id);
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

//fonction create 
function create($connection, $name, $surname, $status){
    $statement = $connection->prepare("INSERT INTO `contacts` (`name`, `surname`, `status`) VALUES (?, ?, 'online') ");
    $statement->bindParam(1,$name);
    $statement->bindParam(2,$surname);
    $statement->execute();
}


//fonction delete
function delete($connection, $id){
    $statement = $connection->prepare("DELETE FROM `contacts` WHERE id = ?");
    $statement->bindParam(1,$id);
    $statement->execute();    
}

//fonction update
function update($connection, $id){
    $statement = $connection->prepare("UPDATE `contacts` SET `status` = 'offline' WHERE id = ?");
    $statement->bindParam(1, $id);
    $statement->execute();    
}
