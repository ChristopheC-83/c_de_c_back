
<?php

require_once('./controllers/Main.controller.php');
require_once('controllers/Tools.controller.php');
require_once('controllers/Functions.controller.php');
require_once('./models/Articles.model.php');
require_once('./models/Api.model.php');

class ApiController extends MainController
{

    private $functions;
    private $articlesManager;
    private $apiManager;

    public function __construct()
    {
        $this->functions = new Functions();
        $this->apiManager = new ApiManager();
    }


    public function  sendAllArticlesByType($type)
    {
        $articles = $this->apiManager->getAllVisibleArticlesByType($type);
        $datas_articles = [
            'articles' => $articles,
        ];
        Tools::sendJson_get($datas_articles);
    }

    public function  sendLastArticleByType($type)
    {
        $article = $this->apiManager->getLastVivibleArticleByType($type);

        Tools::sendJson_get($article);
    }
}
