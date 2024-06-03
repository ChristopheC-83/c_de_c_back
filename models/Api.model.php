<?php

require_once('./models/Main.model.php');

class ApiManager extends MainManager
{

    public function getAllVisibleArticlesByType($type)
    {
        $req = 'SELECT * FROM articles WHERE visible = 1 AND type= :type ORDER BY position';
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(':type', $type, PDO::PARAM_STR);
        $stmt->execute();
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $articles;
    }

    public function getLastVivibleArticleByType($type)
    {
        $req = 'SELECT * FROM articles WHERE visible = 1 AND type=:type ORDER BY id DESC LIMIT 1';
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(':type', $type, PDO::PARAM_STR);
        $stmt->execute();
        $article = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $article;
    }
}
