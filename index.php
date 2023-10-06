<?php 
require_once './configs/bootstrap.php';
//include './src/toolkit.php';
//dd($globalConfigs); 
ob_start();

//fromInc("menu");
//dd($_GET);
//rooting("Accueil");
if (isset($_GET['page'])) {
    fromInc($_GET['page']);
}
$pageContent = [
"html" => ob_get_clean()
] ;
include "./templates/layouts/". $_GET["layout"] .".layout.php";
getAll($connection);


