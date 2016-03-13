<?php

    require_once __DIR__ . "/View.cls.php";
    
    class SearchView extends View {
        
        public function __construct() {
            parent::__construct( "AnswerMe - Seach", NULL );
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
                        <li><a href="/AnswerMe/Search" class="selected">Search for an answer</a></li>
                        <li><a href="/AnswerMe/Ask">Ask me something</a></li>
                        <li><a href="/AnswerMe/About">About me</a></li>
                    </ul>
                    <div class="dummy"></div>
                </div>
            </div>
            <div id="page">
                <div id="content">
                    <div class="dummy" style="border:none"></div>
                    <label for="searchtext">Search:</label>
                    <input type="text" id="searchtext" value="<?php echo $this->getModel()->getQuery(); ?>">
                    <a id="searchbtn" href="/AnswerMe/Search/query" class="button">Search</a>
                </div>
            </div>
        </div>
        
        <script type="text/javascript">
            document.getElementById("searchbtn").addEventListener("click",onSearch);
            document.getElementById("searchtext").addEventListener("keypress",onKeyDown);
            
            function onKeyDown( e ) {
                var event;
                event = e || window.event;
                if( e.keyCode == 13 ) onSearch( null );
            }
            
            function onSearch( e ) {
                var event,txt;
                if( e !== null ) {
                    event = e || window.event;
                    event.preventDefault();
                    event.stopImmediatePropagation();
                }
                txt = document.getElementById("searchtext");
                window.location.href = "/AnswerMe/Search/query/"+encodeURIComponent(txt.value);
            }
        </script>
    </body>
</html>
        <?php
        }
        
        
        
    }

?>