<?php

    require_once __DIR__ . "/View.cls.php";
    
    class HomeView extends View {
        
        public function __construct() {
            parent::__construct( "AnswerMe - Home", NULL );
            $this->addStyle( "//fonts.googleapis.com/css?family=Palanquin:100,400,700" );
            $this->addStyle( "/AnswerMe/css/reset.css" );
            $this->addStyle( "/AnswerMe/css/styles.css" );
        }
        
        protected function generateBody() {
        ?>
    <body>
        <div id="wrapper">
            <div id="topbar-wrapper">
                <div id="topbar">
                    <img src="/AnswerMe/medias/logo.png">
                    <h1>AnswerMe</h1>
                    <ul>
                        <li><a href="/AnswerMe/Home" class="selected">Home</a></li>
                        <li><a href="/AnswerMe/Search">Search for an answer</a></li>
                        <li><a href="/AnswerMe/Ask">Ask me something</a></li>
                        <li><a href="/AnswerMe/About">About me</a></li>
                    </ul>
                    <div class="dummy"></div>
                </div>
            </div>
            <div id="page">
                <div id="content">
                    <div class="half"><h1>Lastest Questions</h1>
                        <a href="/AnswerMe/Home">How do you create a moving platform?</a>
                        <a href="/AnswerMe/Home">What's the difference between ds_list and arrays? What are the perfomance costs?</a>
                        <a href="/AnswerMe/Home">RPG NPC bug. Need help!</a>
                    </div>
                    <div class="half"><h1>Lastest Answers</h1>
                        
                    </div>
                    <div class="dummy"></div>
                    <div>
                        <h1>All Questions</h1>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
        <?php
        }
        
    }

?>