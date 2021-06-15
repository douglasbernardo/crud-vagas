<?php 

require __DIR__ . "./vendor/autoload.php";

use \App\Entity\Vaga;

//validação do id
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
   echo "ops";
    exit;
}

$objVaga = Vaga::getVaga($_GET['id']); 

//validação da vaga
if(!$objVaga instanceof Vaga){
    echo "erro";
    exit;
}

//validação do post
if(isset($_POST['excluir'])){

    $objVaga->excluir($_GET['id']);

    header('location:index.php?status=success');
    exit;
}

include __DIR__ . "./includes/header.php";
include __DIR__ . "./includes/confirme-exclusao.php";
include __DIR__ . "./includes/footer.php";

