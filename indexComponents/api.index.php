<?php

// afin de ne pas avoir un index.php à rallonge,
// ici, la partie location
// swith( $url[ 1 ] ) sera toujours api/

// echo "truc";

switch ($url[1]) {

    case 'api_projets':
        $apiController->sendAllArticlesByType("projet");
        break;
    case 'api_last_projet':
        $apiController->sendLastArticleByType("projet");
        break;


    case 'api_tutos':
        $apiController->sendAllArticlesByType("tuto");
        break;
        case 'api_last_tuto':
            $apiController->sendLastArticleByType("tuto");
            break;


    case 'api_shares':
        $apiController->sendAllArticlesByType("partage");
        break;
    case 'api_last_share':
        $apiController->sendLastArticleByType("partage");
        break;
}
