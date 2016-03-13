<?php

    // First step, we remove the root folder from the path
    $rootFolder = "/AnswerMe";
    $path = str_replace( $rootFolder, "", $_SERVER["REQUEST_URI"] );
    // Before doing anything, check if its resource file, in which
    // case we have to return it's content
    $skip = false;
    $matches = array();
    if( preg_match( '/\.(jpg|jpeg|png|gif|ico|css|js)$/', $path, $matches ) ) {
        if( file_exists( __DIR__ . $path ) ) {
            switch( $matches[1] ) {
                case "jpg": case "jpeg": case "png": case "gif":
                    switch( getimagesize( __DIR__ . $path )[2] ) {
                        case IMAGETYPE_JPEG: header( "Content-type: image/jpg" ); break;
                        case IMAGETYPE_GIF: header( "Content-type: image/gif" ); break;
                        case IMAGETYPE_PNG: header( "Content-type: image/png" ); break;
                    }
                    header('Content-Length: ' . filesize( __DIR__ . $path ) );
                    readfile( __DIR__ . $path );
                break;
                case "ico":
                    header( "Content-type: image/x-icon" );
                    header( "Content-Length: ".filesize( __DIR__.$path ) );
                    readfile( __DIR__ . $path );
                case "css": header( "Content-type: text/css" ); break;
                case "js": header( "Content-type: text/javascript" ); break;
                default: header( "Content-type: text/html" );
            }
            echo file_get_contents( __DIR__ . $path );
            $skip = true;
        }
    }
    
    if( !$skip ) {
        // Second step, we remove the leading "/"
        if( $path[0] == "/" ) $path = substr( $path, 1 );
        
        // Third step, we create an array by splitting the path over all '/'
        $request = explode( "/", $path );
        
        // Fourth step, we find the controller
        $controller = "";
        $controllerFilename = "";
        if( $request[0] == "" ) $controllerFilename = "Home";
        else {
            $controllerFilename = ucfirst( strtolower( $request[0] ) );
            if( !file_exists( __DIR__ . "/app/controllers/$controllerFilename.ctl.php" ) ) {
                echo __DIR__ . "/controllers/$controllerFilename.ctl.php";
                $controllerFilename = "Home";
            }
        }
        $controller = "Ctl$controllerFilename";
        
        // Fifth step, we check if the action is defined
        $action = "";
        if( count( $request ) >= 2 ) {
            if( $request[1] == "" ) $action = "index";
            else $action = strtolower( $request[1] );
        }
        else $action = "index";
        
        // Sixth step, we get all the remaining request values into an array
        $arguments = array();
        for( $i=2; $i<count( $request ); $i++ ) array_push( $arguments, $request[ $i ] );
        
        // Finally, we import the controller, instanciate it, and call the action.
        require_once __DIR__ . "/app/controllers/$controllerFilename.ctl.php";
        $ctl = new $controller();
        if( is_callable( array( $ctl, $action ) ) ) $ctl->$action( $arguments );
        else $ctl->index( $arguments );
    }
    
?>