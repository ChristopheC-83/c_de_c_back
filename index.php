<?php

session_start();

define( 'URL', str_replace( 'index.php', '', ( isset( $_SERVER[ 'HTTPS' ] ) ? 'https' : 'http' ) . '://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'PHP_SELF' ] ) );
define( 'IMG_PATH', URL . 'public/assets/images/' );
define( 'AVATARS_PATH', IMG_PATH . 'avatars/' );
define( 'MEDIA_PATH', 'public/assets/articles_media/article_' );

require_once( './controllers/Tools.controller.php' );
require_once( './controllers/Main.controller.php' );
require_once( './controllers/Home.controller.php' );
require_once( './controllers/articles.controller.php' );

$mainController = new MainController();
$homeController = new HomeController();
$articlesController= new ArticlesController();

try {
    if ( !isset( $_GET[ 'page' ] ) ) {
        $mainController->homePage();
    } else {
        $url = explode( '/', filter_var( $_GET[ 'page' ], FILTER_SANITIZE_URL ) );
        // on découpe l'url à chaque "/", on récupère les morceaux d'url pour nous diriger
        $page = $url[ 0 ];

        switch ( $url[ 0 ] ) {

            case 'home':
            $mainController->homePage();
            break;

            case 'validation_login':
            // Tools::showArray( $_POST );
            if ( !empty( $_POST[ 'name' ] ) && !empty( $_POST[ 'password' ] ) ) {
                $name = Tools::secureHTML( $_POST[ 'name' ] );
                $password = Tools::secureHTML( $_POST[ 'password' ] );
                $mainController->validation_login( $name, $password );
            } else {
                Tools::showAlert( 'Il faut remplir les 2 champs !', 'alert-warning' );
                header( 'Location: ' . URL . 'connection' );
            }
            break;

            case 'admin':
            if ( !Tools::isConnected() ) {
                Tools::showAlert( 'Vous devez vous connecter pour accéder à cet espace.', 'alert-danger' );
                header( 'Location: ' . URL . 'connection' );
            } else {
                switch ( $url[ 1 ] ) {

                    case 'logout':
                    $mainController->logout();
                    break;

                    // Gestion page de la location et des routes associées dans le fichier 
                    case "articles":
                        require_once("indexComponents/articles.index.php");
                        break;


                    // Gestion page de la location et des routes associées dans le fichier

                    default:
                    throw new Exception( "La page demandée n'existe pas..." );
                }
            }
            break;

            // Les apis

            // case 'api_workshop':
            //     $workshopController->sendCategoriesAndTasksWorkshop();
            //     break;
            case 'api_articles':
                $articlesController->sendAllArticles();
                break;
            case 'api_shares':
                $articlesController->sendAllShares();
                break;

            default:
            throw new Exception( "La page demandée n'existe pas..." );
        }
    }
} catch ( Exception $msg ) {
    $mainController->errorPage( $msg->getMessage() );
}