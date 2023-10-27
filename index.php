<?php
require "vendor/autoload.php";
use wolfpac\Controller\Database;
$db = new Database();
echo $db->table("Toto")->post(['filters'], true)->getFormat();


//echo sprintf("Salut les %s, comment ça va?", "Zouzou");
//echo "Hello World";
/*
require_once './configs/bootstrap.php';
ob_start();

if(isset($_GET["page"])){
    fromInc($_GET['page']);
}

$pageContent = [
    "html" => ob_get_clean(),

];

//include "./templates/layouts/". $_GET["layout"] .".layout.php";
include "./templates/layouts/html.layout.php";
//getAll($connection);
//getById($connection,1);
//create($connection, "Clapton", "Eric", "online");
//update($connection,8);
//delete($connection,10);
*/

