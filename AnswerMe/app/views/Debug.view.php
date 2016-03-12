<?php

    require_once __DIR__ . "/View.cls.php";
    
    class DebugView extends View {
        
        public function __construct( $title ) {
            parent::__construct( $title, NULL );
            $this->addStyle( "//fonts.googleapis.com/css?family=Palanquin:400,700" );
            $this->addStyle( "/AnswerMe/css/reset.css" );
            $this->addStyle( "/AnswerMe/css/styles.css" );
        }
        
        protected function generateBody() {
        ?>
    <body>
        <div id="topbar">
            <ul>
                <li><a href="/AnswerMe/Home" class="selected">Home</a></li>
                <li><a href="/AnswerMe/Search">Search for an answer</a></li>
                <li><a href="/AnswerMe/Ask">Ask me something</a></li>
                <li><a href="/AnswerMe/About">About me</a></li>
            </ul>
            <div class="dummy"></div>
        </div>
        <h1>Debug View</h1>
    </body>
</html>
        <?php
        }
        
    }

?>