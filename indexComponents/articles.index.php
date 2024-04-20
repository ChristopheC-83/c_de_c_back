<?php

// afin de ne pas avoir un index.php à rallonge,
// ici, la partie location
// swith( $url[ 1 ] ) sera toujours admin/articles/

switch ( $url[ 2 ] ) {

    case 'write_new_article':
        $articlesController->newArticlePage();
        break;

    case 'send_new_article':
        // Tools::showArray( $_POST );
        $title = Tools::secureHTML( $_POST[ 'title' ] );
        $position = Tools::secureHTML( $_POST[ 'position' ] );
        $type = Tools::secureHTML( $_POST[ 'type' ] );
        $pitch = Tools::secureHTML( $_POST[ 'pitch' ] );
        $text = Tools::secureHTML( $_POST[ 'text' ] );
        if( !empty( $title )&& !empty( $position ) && !empty( $type ) && !empty( $pitch ) ){
            $articlesController->sendNewArticleToDB( $title,$position, $type,$pitch, $text );
        } else {
            Tools::showAlert( 'Il faut remplir tous les champs !', 'alert-warning' );
            header( 'Location: ' . URL . 'admin/articles/write_new_article' );
        }
        break;

        case "view_all_articles":
            $articlesController->viewAllArticles();
            break;



}