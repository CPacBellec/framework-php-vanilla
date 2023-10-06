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
$contacts = $connection->query(queryBuilder("c", "contacts", ["name" =>"Anderson"], ["surname" => "Karl" ], ["status" => "online"]));
$pageContent = [
    "html" => ob_get_clean(),
    "data" => [
        'contacts' => $contacts,
    ]
];
include "./templates/layouts/". $_GET["layout"] .".layout.php";
//getAll($connection);
//getById($connection,1);
//create($connection, "Clapton", "Eric", "online");
//update($connection,8);
//delete($connection,10);


