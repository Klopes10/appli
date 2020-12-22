<?php

    namespace App\Controller;

use App\Manager\ProductManager;

class StoreController
    {
        private $manager;

        public function __construct(){
            $this->manager = new ProductManager();
        }

        public function indexAction(){
            $products = $this->manager->getAll();

            return [
                "view" => "store/list.php",
                "data" => $products

            ];
        }

        public function voirAction($id){

            $product= $this->manager->getOneById($id);

            return[
                "view" => "store/voir.php",
                "data" => $product

            ];
        }
        
    }