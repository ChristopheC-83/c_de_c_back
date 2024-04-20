<?php

abstract class Tools {
    public static function showArray( $array ) {
        // fonction pour afficher un tableau de manière lisible
        echo '<pre>';
        print_r( $array );
        echo '</pre>';
    }

    public static function showAlert( $message, $type = 'alert-danger' ) {
        // fonction pour ajouter un message d'alerte à la session. un fichier JS permet de supprimer le message au bout de 3 secondes.
        $_SESSION['alert']['message'] = $message;
        $_SESSION['alert']['type'] = $type;
    }
    public static function secureHTML($string)
    {
        return htmlentities($string);
    }

    public static function isConnected()
    {
        return (!empty($_SESSION['name']));
    }

    public static function  sendJson($data)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public static function  sendJson_get($data)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function hashFunction($psw)
    {
        $hashedPsw = password_hash($psw, PASSWORD_DEFAULT);
        return $hashedPsw;
    }

    public static function addImage($uploadedFile, $dir)
    {
        // echo "function addImage";
        // echo "<br>";
        // Tools::showArray($uploadedFile);
        // echo "<br>";
        // echo $dir;
        if ((!isset($uploadedFile['name']) || empty($uploadedFile['name']))) {
            throw new Exception("Il faut choisir un fichier !");
        }

        $extension = strtolower(pathinfo($uploadedFile['name'], PATHINFO_EXTENSION));
        $random = rand(0, 999999);
        $targetFile = $dir . $random . "_" . $uploadedFile['name'];

        if (!getimagesize($uploadedFile['tmp_name'])) {
            throw new Exception("Le fichier n'est pas une image");
        }
        if ($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif" && $extension !== "webp") {
            throw new Exception("L'extension n'est pas reconnue.");
        }
        if (file_exists($targetFile)) {
            throw new Exception("Le fichier existe déjà.");
        }
        if ($uploadedFile['size'] >  768000) {
            throw new Exception("Le fichier est trop lourd, 750Ko maximum.");
        }
        // upload de l'image dans le dossier
        if (!move_uploaded_file($uploadedFile['tmp_name'], $targetFile))
            throw new Exception("l'ajout de l'image n'a pas fonctionné dans : " . $dir);

        else return ($random . "_" . $uploadedFile['name' ] );
    }

    public static function deleteImage( $file, $dir ) {
        $eltToDelete = $dir . $file;
        if ( unlink( $eltToDelete ) ) {
            Tools::showAlert( 'Le fichier '.$file.' a été supprimé avec succès.', 'alert-success' );
            return true;
        } else {
            Tools::showAlert( 'Impossible de supprimer le fichier '.$file, 'alert-danger' );
            return false;
        }

    }
    public static function deleteImageMute( $file, $dir ) {
        $eltToDelete = $dir . $file;
        if ( unlink( $eltToDelete ) ) {
            // Tools::showAlert( 'Le fichier '.$file.' a été supprimé avec succès.', 'alert-success' );
            return true;
        } else {
            Tools::showAlert( 'Impossible de supprimer le fichier '.$file, 'alert-danger' );
            return false;
        }

    }
}
