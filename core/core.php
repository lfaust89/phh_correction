<?php
    function d_vardump($variable){
        global $_DEBUG;
        if(isset($_DEBUG) && $_DEBUG==true)var_dump($variable);
    }

    function disconnect(){
        session_destroy();
    }

    function checkauthent(){

        if(isset($_GET["deconnexion"])){
            disconnect();
            header('Location:index.php?page=authentification');
        }

        else if(isset($_POST["login"]))
        {
            global $db;
            $valid=$db->authent($_POST["login"],$_POST["password"]);
            //echo $valid? 'user OK': 'pb user';
            if($valid)
            {
                $_SESSION['uid']=$_POST["login"];
                header("Location:index.php");
            }
        }
    }
    include_once('mysql.php');
    //je crée l'objet sql pour ma page
    $db=new BaseDeDonnees();
checkauthent();
    //d_vardump($db);

?>