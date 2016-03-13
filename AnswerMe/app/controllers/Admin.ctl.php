<?php

    require_once __DIR__ . "/Controller.cls.php";
    require_once __DIR__ . "/../views/admin/Login.view.php";
    require_once __DIR__ . "/../views/admin/Tags.view.php";
    require_once __DIR__ . "/../views/admin/States.view.php";
    require_once __DIR__ . "/../views/admin/Manage.view.php";
    require_once __DIR__ . "/../views/admin/Dashboard.view.php";
    require_once __DIR__ . "/../models/admin/Tags.repository.php";
    require_once __DIR__ . "/../models/admin/States.repository.php";
    require_once __DIR__ . "/../models/Questions.repository.php";
    
    class CtlAdmin extends Controller {
        
        public function __construct() {
            parent::__construct( NULL, NULL );
        }
        
        protected function isLogged() {
            session_start();
            if( isset( $_SESSION["logged"] ) ) {
                if( $_SESSION["logged"] == true ) {
                    return true;
                }
                else $this->index( array( "error", "You aren't logged anymore." ) );
            }
            else $this->index( array( "error", "You do not have access to the page you requested." ) );
            
            return false;
        }
        
        public function index( $arguments ) {
            if( count( $arguments ) >= 2 ) {
                if( $arguments[0] == "error" ) {
                    $this->setView( new LoginView( $arguments[1] ) );
                }
                else $this->setView( new LoginView() );
            }
            else $this->setView( new LoginView() );
            
            $this->getView()->generate();
        }
        
        public function login( $arguments ) {
            if( count( $arguments ) > 0 ) {
                $code = hash("sha256","#Ced_dub123" );
                if( $code == $arguments[0] ) {
                    session_start();
                    $_SESSION["logged"]=true;
                    header("Location: /AnswerMe/Admin/dashboard" );
                }
                $this->index( array( "error", "Invalid login information." ) );
            }
            else $this->index( array( "error", "You need to provide valid login information." ) );
        }
        
        public function dashboard( $arguments=NULL ) {
            if( $this->isLogged() ) {
                $this->setView( new DashboardView() );
                $this->getView()->generate();
            }
        }
        
        public function tags( $arguments ) {
            if( $this->isLogged() ) {
                $tagRep = new TagRepository( new SQLite3( __DIR__ . "/../data/database.db" ) );
                
                if( count( $arguments ) >= 1 ) {
                    switch( strtolower( $arguments[0] ) ) {
                        case "delete": if( count( $arguments ) >= 2 ) $tagRep->deleteTag( $arguments[1] ); break;
                        case "add": if( count( $arguments ) >= 2 ) $tagRep->addTag( urldecode( $arguments[1] ) ); break;
                    }
                    header( "Location: /AnswerMe/Admin/tags" );
                }
                
                $tags = $tagRep->getTags();
                $this->setView( new TagsView() );
                $this->getView()->setModel( $tags );
                $this->getView()->generate();
            }
        }
        
        public function states( $arguments ) {
            if( $this->isLogged() ) {
                $stateRep = new StatesRepository( new SQLite3( __DIR__ . "/../data/database.db" ) );
                
                if( count( $arguments ) >= 1 ) {
                    switch( strtolower( $arguments[0] ) ) {
                        case "delete": if( count( $arguments ) >= 2 ) $stateRep->deleteState( $arguments[1] ); break;
                        case "add": if( count( $arguments ) >= 2 ) $stateRep->addState( urldecode( $arguments[1] ) ); break;
                    }
                    header( "Location: /AnswerMe/Admin/states" );
                }
                
                $states = $stateRep->getStates();
                $this->setView( new StatesView() );
                $this->getView()->setModel( $states );
                $this->getView()->generate();
            }
        }
        
        public function manage( $arguments ) {
            if( count( $arguments ) == 1 ) {
                $sql = new SQLite3( __DIR__ . "/../data/database.db" );
                $sRep = new StatesRepository( $sql );
                $qRep = new QuestionsRepository( $sql );
                $questions = $qRep->getQuestions( 0,100, $sRep->findId( ucfirst(strtolower($arguments[0])) ) );
                $this->setView( new ManageView( $questions ) );
                $this->getView()->generate();
            }
            else if( count($arguments) >= 2 ) {
                $qRep = new QuestionsRepository( new SQLite3( __DIR__ . "/../data/database.db" ) );
                switch( strtolower($arguments[0]) ) {
                    case "delete": $qRep->deleteQuestion( $arguments[1] ); break;
                    case "add":
                        if( count( $arguments ) >= 3 ) {
                            $title = urldecode($arguments[1]);
                            $description = urldecode($arguments[2]);
                            $qRep->addQuestion( $title, $description );
                        }
                    break;
                }
                header( "Location: /AnswerMe/Admin/manage/Pending" );
            }
            else $this->dashboard();
        }
        
    }

?>