<?php 

require __DIR__ . "./vendor/autoload.php";

use \App\Entity\Vaga;

//validação do post
if(isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])){
    $objVAga = new Vaga;
    $objVAga->titulo = $_POST['titulo'];
    $objVAga->descricao = $_POST['descricao'];
    $objVAga->ativo = $_POST['ativo'];
    $objVAga->cadastrar();

   //echo "<pre>"; print_r($objVAga); echo "</pre>"; die();
}

include __DIR__ . "./includes/header.php";
include __DIR__ . "./includes/listagem.php";
include __DIR__ . "./includes/footer.php";

