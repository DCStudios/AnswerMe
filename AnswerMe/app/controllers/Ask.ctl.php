<?php

    require_once __DIR__ . "/Controller.cls.php";
    require_once __DIR__ . "/../views/Ask.view.php";
    
    class CtlAsk extends Controller {
        
        public function __construct() {
            parent::__construct( NULL, new AskView() );
        }
        
        public function index() {
            $this->getView()->generate();
        }
        
    }

?>