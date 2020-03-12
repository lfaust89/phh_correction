<?php
    $_DEBUG = 'true';
    class BaseDeDonnees{

    private $ADR_MYSQL;
    private $USR_MYSQL;
    private $PSW_MYSQL;
    private $DB_MYSQL;
    
    private $linkDB=NULL;

    function __construct($adr='127.0.0.1',$user='root',$psw='',$db='boutique')
    {
        $this->ADR_MYSQL=$adr;
        $this->USR_MYSQL=$user;
        $this->PSW_MYSQL=$psw;
        $this->DB_MYSQL=$db;
        $this->connectDB();
    }


    private function connectDB() {
        
        if($this->linkDB==NULL)
        {
            $this->linkDB=mysqli_connect($this->ADR_MYSQL,$this->USR_MYSQL,$this->PSW_MYSQL,$this->DB_MYSQL);
        }
        
    }

    private function query($requete){
        
        $this->connectDB();
        return mysqli_query($this->linkDB,$requete);

    }
    public function authent($login,$mdp){
        $ret=$this->query("SELECT count(`idcl`) as ISVALIDUSER FROM `client` WHERE `login` = '$login' and `password` = '$mdp'");
        //var_dump($ret);
        $result=mysqli_fetch_array($ret);
        //var_dump($result);
                    return($result["ISVALIDUSER"]==1) ? true : false;
    }

    public function get_produit($id){
        $retprod=$this->query("SELECT `titre`, `description` FROM `produit` WHERE `idp` =$id");
        var_dump($retprod);
        if($retprod->num_rows==0)return NULL;
        $result=mysqli_fetch_array($retprod);
        //var_dump($result);
        return $result;
        
            

    }
}
    $db=new BaseDeDonnees();
    //var_dump($db->authent('azerty','test1'));
    var_dump($db->get_produit(1));
    //var_dump($db);
  
?>