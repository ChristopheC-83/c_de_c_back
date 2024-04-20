<?php

// fichier avec des fonctions récurrentes
// importé par injection de dépendances dans chaque classe controller qui le nécessite
class Functions
{
    // cette fonction permet de récupérer les données sous forme d'un tableau dans les controllers 
    // pour en faire une page accessible à l'utilisateur .
    public function generatePage($data)
    {
        extract($data);
        ob_start();
        require_once($view);
        $page_content = ob_get_clean();
        require_once($template);
    }
    // pour hasher et sécuriser les mdp utilisateurs avant envoi dans la DB
    public function hashFunction($psw)
    {
        $hashedPsw = password_hash($psw, PASSWORD_DEFAULT);
        return $hashedPsw;
    }    

};
