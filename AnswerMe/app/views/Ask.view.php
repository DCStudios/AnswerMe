<?php

    require_once __DIR__ . "/View.cls.php";
    
    class AskView extends View {
        
        public function __construct() {
            parent::__construct( "AnswerMe - Ask something", NULL );
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
                        <li><a href="/AnswerMe/Ask" class="selected">Ask me something</a></li>
                        <li><a href="/AnswerMe/About">About me</a></li>
                    </ul>
                    <div class="dummy"></div>
                </div>
            </div>
            <div id="page">
                <div id="content">
                    <div id="rulefold" class="closed">
                        <div class="fold" data-target="rulefold"></div><h1>Rules to get an answer</h1>
                        <h2>Rule 1:</h2>
                        <p>
                            I am the <b>only one</b> who answers on this website. Any other answers, even if right,
                            will immediatltly be deleted!
                        </p>
                        <h2>Rule 2:</h2>
                        <p>
                            When you ask your question, make sure it goes right to the point, I don't want any general 
                            questions like <i>"How do I make a platform game"</i>.
                        </p>
                        <h2>Rule 3:</h2>
                        <p>
                            There is no registering needed, and as such anyone can reply to any question.
                            I will repeat that <b>no one other than me</b> can answer the question.
                        </p>
                        <h2>Examples:</h2>
<pre>Title: Player movements
Description:
    I have a platformer 2 direction movement character.
    I want to make it so that when he collides with a wall, he doesn't change to the walking sprite.
    Right now, when I move, it shows the first sub-image of the sprite, then plays the idle animation.
    Can you help me?</pre>
<pre>Title: Skill system
Description:
    I would like to implement a skill system in my game.
    I simply want to make my attack and defense value change depending on your level.
    A simple operation like <i><b>var damage = attack + attack*(level/8);</b></i>.
    What would be the simplest way of implementing something of the sort?</pre>
<pre>Title: Help required
Description:
    I would like to have some of your help regarding my project.
    I have a bug and can't seem to find its cause, would you help me debug my code?
</pre>
                    </div>
                    <div class="spacer"></div>
                </div>
            </div>
        </div>
        
        <script type="text/javascript">
            var i,folds;
            folds = document.getElementsByClassName("fold");
            for( i=0; i<folds.length; i++ ) {
                folds[i].addEventListener( "click", onFoldClicked );
            }
            
            function onFoldClicked( e ) {
                var event,target,foldElement;
                event = e || window.event;
                target = event.target || event.srcElement;
                foldElement = document.getElementById( target.getAttribute("data-target") );
                foldElement.classList.toggle("closed");
            }
        </script>
    </body>
</html>
        <?php
        }
        
    }

?>