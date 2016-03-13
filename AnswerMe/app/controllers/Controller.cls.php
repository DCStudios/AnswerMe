<?php

    class Controller {
        
        protected $model;
        protected $view;
        
        public function __construct( $model, $view ) {
            $this->setModel( $model );
            $this->setView( $view );
        }
        
        public function getModel() { return $this->model; }
        public function setModel( $m ) { $this->model = $m; }
        
        public function getView() { return $this->view; }
        public function setView( $v ) { $this->view = $v; }
        
    }

?>