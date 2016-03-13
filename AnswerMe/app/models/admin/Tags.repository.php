<?php

    require_once __DIR__ . "/Tag.model.php";

    class TagRepository {
        
        protected $db;
        
        public function __construct( $db ) {
            $this->db = $db;
        }
        
        public function getTags( $offset=0, $limit=100 ) {
            $query = $this->db->prepare( "SELECT * FROM tags LIMIT :limit OFFSET :offset;" );
            $query->bindValue( ":limit", $limit );
            $query->bindValue( ":offset", $offset );
            $result = $query->execute();
            $tags = array();
            while( $row = $result->fetchArray( SQLITE3_ASSOC ) ) {
                array_push( $tags, new Tag( $row["id"], $row["name"] ) );
            }
            return $tags;
        }
        
        public function addTag( $tagName ) {
            $this->db->exec("INSERT INTO tags(name) VALUES('$tagName');");
        }
        
        public function deleteTag( $tagId ) {
            $this->db->exec("DELETE FROM tags WHERE id == $tagId;");
            $this->db->exec("DELETE FROM tag_relationship WHERE tag_id == $tagId;");
        }
        
    }

?>