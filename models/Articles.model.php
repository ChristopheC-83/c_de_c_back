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

    public function  sendNewArticleToDB($title,$position, $type,$pitch, $text ){
        $req = 'INSERT INTO articles ( title,position, type,pitch, text ) VALUES ( :title,:position, :type,:pitch, :text )';
        $stmt = $this->getDB()->prepare( $req );
        $stmt->bindValue( ':title', $title, PDO::PARAM_STR );
        $stmt->bindValue( ':position', $position, PDO::PARAM_INT );
        $stmt->bindValue( ':type', $type, PDO::PARAM_STR );
        $stmt->bindValue( ':pitch', $pitch, PDO::PARAM_STR );
        $stmt->bindValue( ':text', $text, PDO::PARAM_STR );
        $stmt->execute();
        $isCreate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isCreate;
    
    }

    public function getAllArticles(){
        $req = 'SELECT * FROM articles ORDER BY type,position';
        $stmt = $this->getDB()->prepare( $req );
        $stmt->execute();
        $articles = $stmt->fetchAll( PDO::FETCH_ASSOC );
        $stmt->closeCursor();
        return $articles;
        
    }

    public function  getArticleById($id){
        $req = 'SELECT * FROM articles WHERE id = :id';
        $stmt = $this->getDB()->prepare( $req );
        $stmt->bindValue( ':id', $id, PDO::PARAM_INT );
        $stmt->execute();
        $article = $stmt->fetch( PDO::FETCH_ASSOC );
        $stmt->closeCursor();
        return $article;
    }

    public function isPositionUnavailable( $position, $type ){
        $req= 'SELECT * FROM articles WHERE position = :position AND type = :type';
        $stmt = $this->getDB()->prepare( $req );
        $stmt->bindValue( ':position', $position, PDO::PARAM_INT );
        $stmt->bindValue( ':type', $type, PDO::PARAM_STR );
        $stmt->execute();
        $isUnavailable = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isUnavailable;
    
    }

    public function deleteArticleDB($id){
        // echo 'id : '.$id.' type : '.$type;
        $req = 'DELETE FROM articles WHERE id = :id';
        $stmt = $this->getDB()->prepare( $req );
        $stmt->bindValue( ':id', $id, PDO::PARAM_INT );
        $stmt->execute();
        $isDelete = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isDelete;
    }

    public function updateThisArticleDB( $id, $title, $position,$visible, $type, $pitch, $text ){
        $req = 'UPDATE articles SET title = :title, position = :position,visible = :visible, type = :type, pitch = :pitch, text = :text WHERE id = :id';
        $stmt = $this->getDB()->prepare( $req );
        $stmt->bindValue( ':id', $id, PDO::PARAM_INT );
        $stmt->bindValue( ':title', $title, PDO::PARAM_STR );
        $stmt->bindValue( ':position', $position, PDO::PARAM_INT );
        $stmt->bindValue( ':visible', $visible, PDO::PARAM_INT );
        $stmt->bindValue( ':type', $type, PDO::PARAM_STR );
        $stmt->bindValue( ':pitch', $pitch, PDO::PARAM_STR );
        $stmt->bindValue( ':text', $text, PDO::PARAM_STR );
        $stmt->execute();
        $isUpdate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isUpdate;
    }


 }