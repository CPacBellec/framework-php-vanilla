<?php 

function dd(...$params){
    foreach ($params as $key => $param) {
        echo "<pre>";
        var_dump($param);
        echo "</pre>";
    }
    return;
}
function ddd(...$params){
    echo "<pre>";
    var_dump($params);
    echo "</pre>";
    die(); 
}

function debugMode($active){
    if($active){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    }
    return;
}

function fromInc($name){
    if (file_exists("./templates/includes/" . $name . ".inc.php")) {
        include "./templates/includes/" . $name . ".inc.php";
    } else {
        return false;
    }
}

function getLayouts($name){
    //if (file_exists("./templates/layouts/" . $name . ".layout.php")) {
        include "./templates/layouts/" . $name . ".layout.php";
   // } else {
    //    return false;
    //}
}

/*function rooting($page){
    foreach ($_GET as $key => $page) {
        if ($page === "accueil") {
            echo "Je suis à l'accueil";
        } else if ($page === "about") {
            echo "A propos de nous";
        } else {
            echo "Erreur 404 : Page inconnu !";
        }
    }
}*/



?>