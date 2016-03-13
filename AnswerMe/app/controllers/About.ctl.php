<?php

    require_once __DIR__ . "/Controller.cls.php";
    require_once __DIR__ . "/../views/About.view.php";
    
    class CtlAbout extends Controller {
        
        public function __construct() {
            parent::__construct( NULL, new AboutView() );
        }
        
        public function index() {
            $this->getView()->generate();
        }
        
    }

?>