<?php

    namespace App\Service;

    abstract class RouterService
    {
        /**
         * prise en charge des paramètres d'une requete GET
         *
         * @param array $param les para de l'url($_GET)
         * @return array la réponse correspondate au return d'un contrôleur
         */
        public static function handleRequest($params) :array
        {
            /*-----------------APPEL DU CONTROLLEUR------------------*/

            $class = ucfirst(DEFAULT_CTRL); // controler par défaut.
        
            if(isset($params['ctrl'])){   //ctrl=admin
                $uri_class = ucfirst($params['ctrl']); //$uri_class = "Admin"
                //on vérifie que App\Controller\\AdminController existe!
                if(class_exists("App\Controller\\".$uri_class."Controller")){
                //$params['ctrl'] = store
                $class = $uri_class;
               } 
               
            } 
           
            // App\Controller\StoreController => Fully Qualified class Name (FQCN)
            $classname = "App\Controller\\".$class."Controller";
            $controller = new $classname();
        
        /*-------------------APPEL DE LA METHODE DANS LE CONTROLLER------------------*/
            $method = DEFAULT_ACTION."Action";    // la méthode par défaut
            
            if(isset($params['action'])){ // action = list
                $uri_method = $params['action']."Action"; // $uri_method = "listAction"
                //On vérifie si la méthode listAction est une méthode du contrôleur
                if(method_exists($controller, $uri_method)){
                    //la méthode à appeler est celle provenant de l'uri
                    $method= $uri_method;
                }
            }
        
        /*-----------------Prise en charge du paramètre optionnel ID $params['id']-------------*/
            $id=null;
            
            if(isset($params['id'])){
                $id = $params['id'];       
            }
            //StoreController::listAction()
            return $controller->$method($id);

        }

        public static function redirect($ctrl = null, $action = null, $id = null){
            $ctrl = $ctrl ?? DEFAULT_CTRL ;
            $action = $action ?? DEFAULT_ACTION ;
            
            header("Location:?ctrl=$ctrl&action=$action&id=$id");
            return;     // juste pour dire que la fonction est fini
        }
    }