<?php

require_once( './controllers/Main.controller.php' );
require_once( 'controllers/Tools.controller.php' );
require_once( 'controllers/Functions.controller.php' );
require_once( './models/Articles.model.php' );

class ArticlesController extends MainController
 {

    private $functions;
    private $articlesManager;

    public function __construct()
 {
        $this->functions = new Functions();
        $this->articlesManager = new ArticlesManager();
    }

    public function  newArticlePage()
 {
        $types = $this->articlesManager->getAllTypesArticles();
        $data_page = [
            'page_description' => 'New Article',
            'page_title' => 'New Article',
            'view' => './views/pages/articles/writeNewArticle.view.php',
            'template' => './views/common/template.php',
            'types' => $types
        ];
        $this->functions->generatePage( $data_page );
    }

    public function  sendNewArticleToDB( $title, $type, $text ){
        
        if($this->articlesManager->sendNewArticleToDB( $title, $type, $text ))
        {
            Tools::showAlert( 'Article bien enregistré !', 'alert-success' );
        } else {
            Tools::showAlert( 'Problème lors de l\'enregistrement de l\'article !', 'alert-danger' );
        }
        header( 'Location: ' . URL . 'admin/articles/write_new_article' );
    
    
    }
}