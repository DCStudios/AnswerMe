<?php

    require_once __DIR__ . "/../View.cls.php";
    
    class DashboardView extends View {
        
        public function __construct() {
            parent::__construct( "AnswerMe - Dashboard", NULL );
            $this->addStyle( "//fonts.googleapis.com/css?family=Palanquin:100,400,700" );
            $this->addStyle( "/AnswerMe/css/reset.css" );
            $this->addStyle( "/AnswerMe/css/styles.css" );
            $this->addStyle( "/AnswerMe/css/admin.css" );
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
                        <li><a href="/AnswerMe/About">About me</a></li>
                    </ul>
                    <div class="dummy"></div>
                </div>
            </div>
            <div id="page">
                <div id="content">
                    <fieldset>
                        <legend>Tags and States</legend>
                        <a href="/AnswerMe/Admin/tags" class="button">Edit Tags</a>
                        <a href="/AnswerMe/Admin/states" class="button">Edit States</a>
                    </fieldset>
                    <fieldset>
                        <legend>Questions</legend>
                        <a href="/AnswerMe/Admin/manage/Pending" class="button">Pending</a>
                        <a href="/AnswerMe/Admin/manage/Open" class="button">Open</a>
                        <a href="/AnswerMe/Admin/manage/Closed" class="button">Closed</a>
                        <a href="/AnswerMe/Admin/manage/Duplicate" class="button">Duplicate</a>
                        <a href="/AnswerMe/Admin/manage/Answered" class="button">Answered</a>
                    </fieldset>
                </div>
            </div>
        </div>
    </body>
</html>
        <?php
        }
        
    }

?>