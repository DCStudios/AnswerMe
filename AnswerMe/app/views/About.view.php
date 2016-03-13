<?php

    require_once __DIR__ . "/View.cls.php";
    
    class AboutView extends View {
        
        public function __construct() {
            parent::__construct( "AnswerMe - About me", NULL );
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
                        <li><a href="/AnswerMe/Home">Home</a></li>
                        <li><a href="/AnswerMe/Search">Search for an answer</a></li>
                        <li><a href="/AnswerMe/Ask">Ask me something</a></li>
                        <li><a href="/AnswerMe/About" class="selected">About me</a></li>
                    </ul>
                    <div class="dummy"></div>
                </div>
            </div>
            <div id="page">
                <div id="content">
                    <div><h1>Cedrik Dubois, CedSharp, Cdrdub8</h1>
                        <p>
                            The above 3 names are the 3 way you might know me.<br>
                            <i>Cedrik Dubois</i> is my real name.<br>
                            <i>CedSharp</i> is my current and new username.<br>
                            <i>Cdrdub8</i> is my old username.
                        </p>
                        <p>
                            I live in Canada, close to montreal. I love coding small scripts and see their result
                            instantly. For that reason, I've never finished any of my big projects up to now :( .
                            I aspire to become a programming teacher in the future because I love helping people.
                            I started to help on a forum for GameMaker called the <i>GameMaker Comunity</i> forum,
                            also known as <b>GMC</b>.
                        </p>
                        <p>
                            Since people often ask the exact same question and that GMC is quite huge, I decided to
                            build this website so that you can easily search for your answer, and if its a new matter
                            that wasn't previously asked, well, simply ask it to me directly!
                        </p>
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