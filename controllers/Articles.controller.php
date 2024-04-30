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

    public function  sendNewArticleToDB( $title, $position,$thumbnail,  $type, $pitch, $text ) {

        while ( $this->articlesManager->isPositionUnavailable( $position, $type ) ) {
            $position++;
        }

        if ( $this->articlesManager->sendNewArticleToDB( $title, $position,$thumbnail, $type, $pitch, $text ) )
 {
            Tools::showAlert( 'Article bien enregistré à la position '.$position.' !', 'alert-success' );
        } else {
            Tools::showAlert( 'Problème lors de l\'enregistrement de l\'article !', 'alert-danger' );
        }
        header( 'Location: ' . URL . 'admin/articles/view_all_articles' );

    }

    public function  viewAllArticles() {

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
    public function  viewAllShares() {

        $types = $this->articlesManager->getAllTypesArticles();
        $allArticles = $this->articlesManager->getAllArticles();
        $data_page = [
            'page_description' => 'All Articles',
            'page_title' => 'All Articles',
            'view' => './views/pages/articles/viewAllShare.view.php',
            'template' => './views/common/template.php',
            'allArticles' => $allArticles,
            'types' => $types,
        ];
        $this->functions->generatePage( $data_page );

    }

    public function  deleteArticle( $id ) {

        // $this->articlesManager->deleteArticleDB( $id, $type );
        if ( $this->articlesManager->deleteArticleDB( $id ) ) {
            Tools::showAlert( 'Article bien supprimé !', 'alert-success' );
        } else {
            Tools::showAlert( 'Problème lors de la suppression de l\'article !', 'alert-danger' );
        }
        header( 'Location: ' . URL . 'admin/articles/view_all_articles' );
    }

    public function updateArticlePage( $id ){ 
    
        $types = $this->articlesManager->getAllTypesArticles();
        $article = $this->articlesManager->getArticleById($id);
        $data_page = [
            'page_description' => 'Update one Article',
            'page_title' => 'Update one Article',
            'view' => './views/pages/articles/updateArticle.view.php',
            'template' => './views/common/template.php',
            'article' => $article,
            'types' => $types,
        ];
        $this->functions->generatePage( $data_page );
    }

    public function updateThisArticle( $id, $title, $position,$visible, $type, $pitch, $text ){
        $odlPosition = $this->articlesManager->getArticleById($id)['position'];
        if($odlPosition != $position){
        while ( $this->articlesManager->isPositionUnavailable( $position, $type ) ) {
            $position++;
        }}
        if($this->articlesManager->updateThisArticleDB( $id, $title, $position,$visible, $type, $pitch, $text )){
            Tools::showAlert( 'Article bien modifié à la position '.$position.' !', 'alert-success' );
        } else {
            Tools::showAlert( 'Problème lors de la modification de l\'article !', 'alert-danger' );
        }

        header( 'Location: ' . URL . 'admin/articles/view_all_articles' );
    }

    public function  sendAllArticles(){
        $articles = $this->articlesManager->getAllVisibleArticles();
        $datas_articles = [
            'articles' => $articles,
        ];
        Tools::sendJson_get($datas_articles);
    }

    public function  sendAllShares(){
        $articles = $this->articlesManager->getAllVisibleShares();
        $datas_articles = [
            'articles' => $articles,
        ];
        Tools::sendJson_get($datas_articles);
    }
}