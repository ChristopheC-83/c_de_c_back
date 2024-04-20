<?php

require_once( './models/Main.model.php' );

class ArticlesManager extends MainManager
 {

    public function getAllTypesArticles(){
        $req = 'SELECT * FROM article_types';
        $stmt = $this->getDB()->prepare( $req );
        $stmt->execute();
        $types = $stmt->fetchAll( PDO::FETCH_ASSOC );
        $stmt->closeCursor();
        return $types;
    }

    public function  sendNewArticleToDB( $title,$position, $type, $text ){
        $req = 'INSERT INTO articles ( title,position, type, text ) VALUES ( :title,:position, :type, :text )';
        $stmt = $this->getDB()->prepare( $req );
        $stmt->bindValue( ':title', $title, PDO::PARAM_STR );
        $stmt->bindValue( ':position', $position, PDO::PARAM_INT );
        $stmt->bindValue( ':type', $type, PDO::PARAM_STR );
        $stmt->bindValue( ':text', $text, PDO::PARAM_STR );
        $stmt->execute();
        $isCreate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isCreate;
    
    }

    public function getAllArticles(){
        $req = 'SELECT * FROM articles';
        $stmt = $this->getDB()->prepare( $req );
        $stmt->execute();
        $articles = $stmt->fetchAll( PDO::FETCH_ASSOC );
        $stmt->closeCursor();
        return $articles;
        
    }


 }