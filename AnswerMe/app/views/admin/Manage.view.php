<?php

    require_once __DIR__ . "/../View.cls.php";
    
    class ManageView extends View {
        
        public function __construct( $model ) {
            parent::__construct( "AnswerMe - Manage Questions", $model );
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
                <?php foreach( $this->getModel() as $question ) { ?>
                    <div>
                        <a class="button red bar" href="/AnswerMe/Admin/manage/delete/<?php echo $question->getId(); ?>">Delete</a>
                        <h1><small>[<?php echo $question->getStateName(); ?>]</small> <?php echo $question->getTitle(); ?></h1>
                        <p><?php echo $question->getDescription(); ?></p>
                    </div>
                <?php } ?>
                    <div class="dummy"></div>
                    <div class="spacer"></div>
                </div>
            </div>
        </div>
    </body>
</html>
        <?php
        }
        
    }

?>