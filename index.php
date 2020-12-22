<?php
    // Ceci est le FRONT CONTROLLER
    // C'est le seul fichier qui dialogue avec l'utilisateur

    require "vendor/autoload.php";
    require "config.php";

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
    ob_start(); //tamporisation de sortie output buffer
    
    //tous les affichages à partir de ob_start() se stockent dans un tampon de sortie
    include TEMPLATE_DIR.$response["view"];
   

    //ici je récupère ce qu'il y a dans le tampon et le met dans une variable
    //(au lieu de l'afficher directement)
    $page = ob_get_contents();

    // je vide le tampon, qui ne me sert plus à rien depuis qu'on a stocké dans une variable
    // le contenu de celui-ci

    ob_end_clean();

    include TEMPLATE_DIR."/layout.php";
?>

