<?php

require "./configs/global.php";
$connection = new PDO('mysql:host='.$globalConfigs["database"]["host"].
 ";port=". $globalConfigs['database']['port'] .
 ';dbname='. $globalConfigs['database']['db_name'] . ""
 , $globalConfigs['database']['user'] , $globalConfigs['database']['password']);

//$statement = $connection->prepare("INSERT INTO `contacts` (`name`, `surname`, `status`) VALUES ('Bellec', 'Cyril', 'online') ");
//$statement->bindParam(1, $id);
//$statement ->execute();

