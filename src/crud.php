<?php
require_once "./src/dbConnect.php";

//fonction getAll
function getAll($connection){
    $statement = $connection->query("SELECT * FROM contacts WHERE 1");
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
}
  
//fonction getById
function getById($connection, $name, $surname, $status){
    $statement = $connection->query("SELECT * FROM contacts WHERE `name` =  'Bellec' AND `surname` = '".htmlspecialchars( $_GET["surname"])."'");

    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
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
    $id = 3;
    $statement->bindParam(1, $id);
    $statement->execute();    
}

//fonction update
function update($connection){
    $statement = $connection->prepare("UPDATE `contacts` SET `status` = 'offline' WHERE id = ?");
    $id = 2;
    $statement->bindParam(1, $id);
    $statement->execute();    
}
