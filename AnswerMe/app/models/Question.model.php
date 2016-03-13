<?php

    class Question {
        
        protected $id;
        protected $title;
        protected $description;
        protected $state;
        protected $stateName;
        
        public function __construct( $id, $name, $description, $state, $stateName ) {
            $this->setId( $id );
            $this->setTitle( $name );
            $this->setDescription( $description );
            $this->setState( $state );
            $this->setStateName( $stateName );
        }
        
        public function getId() { return $this->id; }
        public function setId($id) { $this->id = $id; }
        
        public function getTitle() { return $this->title; }
        public function setTitle($title) { $this->title = $title; }
        
        public function getDescription() { return $this->description; }
        public function setDescription($description) { $this->description = $description; }
        
        public function getState() { return $this->state; }
        public function setState($state) { $this->state = $state; }
        
        public function getStateName() { return $this->stateName; }
        public function setStateName($stateName) { $this->stateName = $stateName; }
        
    }

?>