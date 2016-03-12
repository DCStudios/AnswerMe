<?php

    class View {
        
        protected $model;
        protected $styles;
        protected $scripts;
        protected $title;
        
        public function __construct( $title="New View", $model=NULL ) {
            $this->model = $model;
            $this->styles = array();
            $this->scripts = array();
            $this->title = $title;
        }
        
        public function addStyle( $styleLink ) {
            array_push( $this->styles, $styleLink );
        }
        
        public function addScript( $scriptLink ) {
            array_push( $this->scripts, $scriptLink );
        }
        
        public function generate() {
            $this->generateHead();
            $this->generateBody();
        }
        
        protected function generateHead() {
        ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $this->title; ?></title>
        <link rel="shortcut icon" href="/AnswerMe/medias/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/AnswerMe/medias/favicon.ico" type="image/x-icon">
        <?php foreach( $this->styles as $style ) echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$style\">"; ?>
        <?php foreach( $this->scripts as $script ) echo "<script type=\"text/javascript\" href=\"$script\"></script>"; ?>
    </head>
        <?php
        }
        
        protected function generateBody() {
            echo "<body></body></html>";
        }
    }

?>