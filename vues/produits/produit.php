<style>
    .produit label{
        font-size:20pt;
    }
    .produit h2, .produit h3{
        margin-left:15%;
        padding:0;
    }
    .produit h3{
        text-decoration:underline;
    }
    .produit .content{
        margin-left:15%;
        vertical-align:top;
        width:60%
    }
    .produit .image{
        padding-top:20px;
    }
    .produit .btn{
        width : 130px;
        font-size:22pt;
    }
</style>

    <?php
    if(isset($_GET['idp'])){
        
        $arrProduits=$db->get_produit($_GET["idp"]);
    
    //var_dump($arrProduits);
    ?>
    <div class="produit">
    <h2>Edition d'un produit > id : <?=$arrProduits["idp"]?>
    </h2>
    <div class="button-container">
        <hr/>
    </div>
    <div class="content inline-block">
        <h3>Titre :</h3>
        <h2><?=$arrProduits["titre"]?></h2>
        <br/>
        <h3>Description : </h3>
        <br/>
        <h2><?=$arrProduits["description"]?></h2>
        <br/>
        <h3>Prix : </h3> 
        <h2><?=$arrProduits["prix"]?> &euro; </h2>
        
    </div>
    <div class="image inline-block">
        <img src="core/image.php?idp=<?=$arrProduits["idp"]?>">
        <br/>
        <button class="btn">Ajouter</button>
        <a href="?page=produit&idp=<?= $arrProduits["idp"] ?>&edit"><button type="button" class="btn btn-primary">Editer</button></a>
                 
    </div>
    </div>

<?php
}
else include('vues/404.php');   

?>
