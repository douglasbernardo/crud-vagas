<?php 

require __DIR__ . "./vendor/autoload.php";

define('TITLE','Editar Vaga');
use \App\Entity\Vaga;

//validação do id
//if(!isset($_GET['id']) or !is_numeric($_GET['id'])){

    //echo $id;
//}

$objVAga = Vaga::getVaga($_GET['id']);
echo "<pre>"; print_r($objVAga); echo "</pre>";

//validação da vaga
if(!$objVAga instanceof Vaga){
    header('location:index.php?status=error');
    exit;
}

//validação do post
if(isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])){
    $objVAga->titulo = $_POST['titulo'];
    $objVAga->descricao = $_POST['descricao'];
    $objVAga->ativo = $_POST['ativo'];

    header('location:index.php?status=success');
    exit;
}

include __DIR__ . "./includes/header.php";
include __DIR__ . "./includes/formulario.php";
include __DIR__ . "./includes/footer.php";

