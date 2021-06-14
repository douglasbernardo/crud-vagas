<?php 

require __DIR__ . "./vendor/autoload.php";

define('TITLE','Editar vaga');

use \App\Entity\Vaga;

//validação do id
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location:index.php?status=error');
    exit;
}

$obVaga = Vaga::getVaga($_GET['id']);

//validação da vaga
if(!$obVaga instanceof Vaga){
    echo "erro";
    exit;
}

//validação do post
if(isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])){
    $obVaga->titulo = $_POST['titulo'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->ativo = $_POST['ativo'];
   // $objVAga->atualizar();

    header('location:index.php?status=success');
    exit;
}

include __DIR__ . "./includes/header.php";
include __DIR__ . "./includes/formulario.php";
include __DIR__ . "./includes/footer.php";

