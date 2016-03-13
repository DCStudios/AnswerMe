<?php

    class SearchModel {
        
        protected $query;
        protected $results;
        
        public function __construct( $query="", $results=NULL ) {
            $this->setQuery( $query );
            if( $results == NULL ) $this->setResults( array() );
            else $this->results = $results;
        }
        
        public function getQuery() { return $this->query; }
        public function setQuery( $q ) { $this->query = $q; }
        
        public function getResults() { return $this->results; }
        public function setResults( $r ) { $this->results = $r; }
        public function addResult( $r ) { array_push( $this->results, $r ); }
        
    }

?>