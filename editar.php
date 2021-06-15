<?php 

require __DIR__ . "./vendor/autoload.php";

define('TITLE','Editar vaga');
define('BUTTON','Editar');

use \App\Entity\Vaga;

//validação do id
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location:index.php?status=error');
    exit;
}

$objVaga = Vaga::getVaga($_GET['id']); 

//validação da vaga
if(!$objVaga instanceof Vaga){
    echo "erro";
    exit;
}

//validação do post
if(isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])){
    $objVaga->titulo = $_POST['titulo'];
    $objVaga->descricao = $_POST['descricao'];
    $objVaga->ativo = $_POST['ativo'];
    $objVaga->atualizar();

    header('location:index.php?status=success');
    exit;
}

include __DIR__ . "./includes/header.php";
include __DIR__ . "./includes/formulario.php";
include __DIR__ . "./includes/footer.php";

