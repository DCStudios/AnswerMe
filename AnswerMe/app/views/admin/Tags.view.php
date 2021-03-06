<?php

    require_once __DIR__ . "/../View.cls.php";
    
    class TagsView extends View {
        
        public function __construct() {
            parent::__construct( "AnswerMe - Tags", NULL );
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
                    <div class="dummy"></div>
                    <label for="tagname">Create a new tag</label>
                    <input type="text" id="tagname">
                    <a class="button" id="createbtn" href="/AnswerMe/Admin/tags/add">Create</a>
                    <div class="dummy"></div>
                <?php foreach( $this->getModel() as $tag ) { ?>
                    <div class="half">
                        <a class="button red bar" href="/AnswerMe/Admin/tags/delete/<?php echo $tag->getId(); ?>">Delete</a>
                        <h1><?php echo $tag->getName(); ?></h1>
                    </div>
                <?php } ?>
                    <div class="dummy"></div>
                    <div class="spacer"></div>
                </div>
            </div>
        </div>
        
        <script type="text/javascript">
            document.getElementById("createbtn").addEventListener("click",onCreate);
            document.getElementById("tagname").addEventListener("keypress",onKeyDown);
            
            function onKeyDown( e ) {
                var event;
                event = e || window.event;
                if( e.keyCode == 13 ) onCreate( null );
            }
            
            function onCreate( e ) {
                var event,txt;
                if( e !== null ) {
                    event = e || window.event;
                    event.preventDefault();
                    event.stopImmediatePropagation();
                }
                txt = document.getElementById("tagname");
                window.location.href = "/AnswerMe/Admin/tags/add/"+encodeURIComponent(txt.value);
            }
        </script>
    </body>
</html>
        <?php
        }
        
    }

?>