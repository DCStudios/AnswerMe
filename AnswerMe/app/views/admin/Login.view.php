<?php

    require_once __DIR__ . "/../View.cls.php";
    
    class LoginView extends View {
        
        protected $errorMessage;
        
        public function __construct( $error="" ) {
            parent::__construct( "AnswerMe - Admin Login", NULL );
            $this->addStyle( "//fonts.googleapis.com/css?family=Palanquin:100,400,700" );
            $this->addStyle( "/AnswerMe/css/reset.css" );
            $this->addStyle( "/AnswerMe/css/styles.css" );
            $this->addStyle( "/AnswerMe/css/admin.css" );
            $this->addScript( "/AnswerMe/js/sha256.js" );
            $this->errorMessage = $error;
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
                <?php if( $this->errorMessage != "" ) { ?>
                    <div>
                        <h1>Error</h1>
                        <p><?php echo $this->errorMessage; ?></p>
                    </div>
                <?php } else { ?>
                    <div class="dummy"></div>
                <?php } ?>
                    <label for="password">Please login to access this section:</label>
                    <input id="password" type="password">
                    <a id="loginbtn" href="/AnswerMe/Admin/login" class="button">Login</a>
                </div>
            </div>
        </div>
        
        <script type="text/javascript">
            /* global define Sha256 */
            document.getElementById("loginbtn").addEventListener("click",onLogin);
            document.getElementById("password").addEventListener("keypress",onKeyDown);
            
            function onKeyDown( e ) {
                var event;
                event = e || window.event;
                if( e.keyCode == 13 ) onLogin( null );
            }
            
            function onLogin( e ) {
                var event,txt,encoded;
                if( e !== null ) {
                    event = e || window.event;
                    event.preventDefault();
                    event.stopImmediatePropagation();
                }
                txt = document.getElementById("password");
                encoded = Sha256.hash( txt.value );
                window.location.href = "/AnswerMe/Admin/login/"+encodeURIComponent( encoded );
            }
        </script>
    </body>
</html>
        <?php
        }
        
    }

?>