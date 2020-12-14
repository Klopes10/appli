<?php
    // Ceci est le FRONT CONTROLLER
    // C'est le seul fichier qui dialogue avec l'utilisateur

    require "vendor/autoload.php";

    use App\Service\RouterService;

    session_start(); 
    
    /*
        $response est le retour du contrôleur nécessaire à la requête du client
        [
            "view" => la vue à afficher au client,
            "data"=> les données pour remplir la vue
        ]
    */

    $response = RouterService::handleRequest($_GET);


/*----------------CHARGEMENT DE LA REPONSE AU CLIENT----------------*/
    include "template/store/".$response["view"];
?>

