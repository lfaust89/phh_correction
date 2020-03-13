<?php
    include_once('../../core/mysql.php');
    $db=new BaseDeDonnees();

    function getCopyrightImage($idp){
        global $db;
        //header("content-type: image/png");
        $produitImage=$db->get_produit($idp)["imgurl"];
        //echo getcwd().'/../img/'.$produitImage;
        $mime= mime_content_type($produitImage);
        //var_dump($mime);
        switch ($mine) {
            case 'image/png':
                $copyrightImage=imagecreatefrompng($produitImage);
                break;
            case 'image/jpeg':
                $copyrightImage=imagecreatefromjpeg($produitImage);
                break;
            
            default:
                return;
        }
       
        imagepng($copyrightImage);
    }

    getCopyrightImage(1);
?>