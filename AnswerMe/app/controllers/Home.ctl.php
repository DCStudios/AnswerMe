<?php

    require_once __DIR__ . "/Controller.cls.php";
    require_once __DIR__ . "/../views/Home.view.php";
    
    class CtlHome extends Controller {
        
        public function __construct() {
            parent::__construct( NULL, new HomeView() );
        }
        
        public function index() {
            $this->getView()->generate();
        }
        
    }

?>