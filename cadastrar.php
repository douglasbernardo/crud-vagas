<?php 

require __DIR__ . "./vendor/autoload.php";

define('TITLE','Cadastrar vaga');
define('BUTTON','Cadastrar');

use \App\Entity\Vaga;

$objVaga = new Vaga();

//validação do post
if(isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])){
    $objVaga->titulo = $_POST['titulo'];
    $objVaga->descricao = $_POST['descricao'];
    $objVaga->ativo = $_POST['ativo'];


    if(validar($_POST['titulo'],$_POST['descricao']) == true){
        $objVaga->cadastrar();
        header("location:index.php?status=success");
    }
}

function validar(string $titulo, string $descricao) : bool
{  
    if($titulo && $descricao == ""){
        echo "Preencha os dados corretamente";
        return false;
    }
    if($titulo == ""){
        echo "Preencha o titulo corretamente";
        return false;
    }
    if($descricao == ""){
        echo "Preencha a descrição corretamente";
        return false;
    }

    return true;
}


include __DIR__ . "./includes/header.php";
include __DIR__ . "./includes/formulario.php";
include __DIR__ . "./includes/footer.php";