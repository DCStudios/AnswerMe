<?php

    require_once __DIR__ . "/Controller.cls.php";
    require_once __DIR__ . "/../views/Search.view.php";
    require_once __DIR__ . "/../models/Search.model.php";
    
    class CtlSearch extends Controller {
        
        public function __construct() {
            parent::__construct( new SearchModel(), new SearchView() );
            $this->getView()->setModel( $this->getModel() );
            $this->getView()->addStyle("/AnswerMe/css/search.css" );
        }
        
        public function index() {
            $this->getView()->generate();
        }
        
        public function query( $arguments ) {
            if( count( $arguments ) > 0 ) {
                $this->getModel()->setQuery( urldecode($arguments[0]) );
            }
            $this->index();
        }
        
    }

?>