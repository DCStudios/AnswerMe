<?php

    require_once __DIR__ . "/Question.model.php";

    class QuestionsRepository {
        
        protected $db;
        
        public function __construct( $db ) {
            $this->db = $db;
        }
        
        public function getQuestions( $offset=0, $limit=100, $state=NULL ) {
            $query;
            if( $state == NULL ) $query = $this->db->prepare( "SELECT * FROM questions LIMIT :limit OFFSET :offset;" );
            else $query = $this->db->prepare( "SELECT * FROM questions LIMIT :limit OFFSET :offset WHERE state == :state;" );
            $query->bindValue( ":limit", $limit );
            $query->bindValue( ":offset", $offset );
            if( $state != NULL ) $query->bindValue( ":state", $state );
            $result = $query->execute();
            $questions = array();
            while( $row = $result->fetchArray( SQLITE3_ASSOC ) ) {
                $stateName = $this->db->querySingle( "SELECT name FROM states WHERE id == ".$row["state"].";" );
                array_push( $questions, new Question( $row["id"], $row["title"], $row["description"], $row["state"], $stateName ) );
            }
            return $questions;
        }
        
        public function addQuestion( $qTitle, $qDesc ) {
            $pending = $this->db->querySingle( "SELECT id FROM states WHERE name == 'Pending Approval';" );
            if( $pending == NULL ) $pending = 1;
            $this->db->exec("
                INSERT INTO questions(title,description,state)
                VALUES('$qTitle','$qDesc',$pending);
            ");
        }
        
        public function deleteQuestion( $questionId ) {
            $this->db->exec("DELETE FROM questions WHERE id == $questionId;");
            $this->db->exec("DELETE FROM tag_relationship WHERE question_id == $questionId;");
        }
        
    }

?>