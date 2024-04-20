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


    public function  sendNewArticleToDB( $title,$position, $type,$pitch, $text ){

        while ( $this->articlesManager->isPositionUnavailable( $position, $type ) ) {
            $position++;
        }
        
        if($this->articlesManager->sendNewArticleToDB( $title,$position, $type,$pitch, $text ))
        {
            Tools::showAlert( 'Article bien enregistré à la position '.$position.' !', 'alert-success' );
        } else {
            Tools::showAlert( 'Problème lors de l\'enregistrement de l\'article !', 'alert-danger' );
        }
        header( 'Location: ' . URL . 'admin/articles/write_new_article' );
    
    
    }

    public function  viewAllArticles(){ 
        
        $types = $this->articlesManager->getAllTypesArticles();
        $allArticles = $this->articlesManager->getAllArticles();
        $data_page = [
            'page_description' => 'All Articles',
            'page_title' => 'All Articles',
            'view' => './views/pages/articles/viewAllArticles.view.php',
            'template' => './views/common/template.php',
            'allArticles' => $allArticles,
            'types' => $types,
        ];
        $this->functions->generatePage( $data_page );
    
    }

    public function  deleteArticle( $id,$type ){

        // $this->articlesManager->deleteArticleDB( $id, $type );
        if($this->articlesManager->deleteArticleDB( $id, $type )){
            Tools::showAlert( 'Article bien supprimé !', 'alert-success' );
        } else {
            Tools::showAlert( 'Problème lors de la suppression de l\'article !', 'alert-danger' );
        }
        header( 'Location: ' . URL . 'admin/articles/view_all_articles' );
    }
}