<?php

    require_once __DIR__ . "/State.model.php";

    class StatesRepository {
        
        protected $db;
        
        public function __construct( $db ) {
            $this->db = $db;
        }
        
        public function getStates( $offset=0, $limit=100 ) {
            $query = $this->db->prepare( "SELECT * FROM states LIMIT :limit OFFSET :offset;" );
            $query->bindValue( ":limit", $limit );
            $query->bindValue( ":offset", $offset );
            $result = $query->execute();
            $states = array();
            while( $row = $result->fetchArray( SQLITE3_ASSOC ) ) {
                array_push( $states, new Tag( $row["id"], $row["name"] ) );
            }
            return $states;
        }
        
        public function addState( $stateName ) {
            $this->db->exec("INSERT INTO states(name) VALUES('$stateName');");
        }
        
        public function deleteState( $stateId ) {
            $this->db->exec("DELETE FROM states WHERE id == $stateId;");
            
            $open = $this->db->querySingle( "SELECT id FROM states WHERE name == 'Pending Approval';" );
            if( $open != NULL ) $this->db->exec("UPDATE questions SET state = $open;");
        }
        
        public function findId( $stateName ) {
            $name = $this->db->querySingle( "SELECT id FROM states WHERE name == '$stateName';" );
            return $name;
        }
        
    }

?>