<?php 

require __DIR__ . "./vendor/autoload.php";

define('TITLE','Cadastrar Vaga');
use \App\Entity\Vaga;


//validação do post
if(isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])){
    $objVAga = new Vaga;
    $objVAga->titulo = $_POST['titulo'];
    $objVAga->descricao = $_POST['descricao'];
    $objVAga->ativo = $_POST['ativo'];
    $objVAga->cadastrar();

    header('location:index.php?status=success');
    exit;
}

include __DIR__ . "./includes/header.php";
include __DIR__ . "./includes/formulario.php";
include __DIR__ . "./includes/footer.php";

