<?php
    include_once('mysql.php');
    //je creer l'objet sql pour ma page 
    $db=new BaseDeDonnees();  // var_dump($db);
    
    function getNoImage(){
        header("Content-type: image/png");
        $img=imagecreatetruecolor(20, 20);
        imagepng($img);
    }


    function getCopyrigtedImage($idp){
        global $db;
        header("Content-type: image/png");
  
        $produitImage=$db->get_produit($idp)["imgurl"];
        $mime=mime_content_type ( '../img/'.$produitImage );
        //var_dump($mime);
        switch ($mime) {
            case 'image/png':
                $copyrigtedImage=imagecreatefrompng('../img/'.$produitImage);
                break;
            case 'image/jpeg':
                    $copyrigtedImage=imagecreatefromjpeg('../img/'.$produitImage);
                    break;
            default:
                return ;
        }
        
// Définir la variable d'environnement pour GD
putenv('GDFONTPATH=' . realpath('.'));

// Nommez la police à utiliser (Notez l'absence de l'extension .ttf)
$text = 'Formation PHP';
$font = '../fonts/Admiration_Pains.ttf';
$black = imagecolorallocate($copyrigtedImage, 255, 0, 0);
// Ajout du texte
imagettftext($copyrigtedImage, 50, 45, 200, 500, $black, $font, $text);

        imagepng($copyrigtedImage);
    }
    if(isset($_GET["idp"])) getCopyrigtedImage($_GET["idp"]);
    else getNoImage();
?>