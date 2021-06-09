<?php

namespace App\Entity;

use App\DB\Database;
use DateTime;

class Vaga{

    /**
     * Identificador único da vaga
     */
    public $id;
    /**
     * Titulo da vaga
     * @var string
     */
    public $titulo;

    /**
     * Descrição da Vaga
     */
    public $descricao;

    /**
     * Ativo ou Inativo
     * @var string(s/n)
     */
    public $ativo;

    /**
     * Data da publicação da vaga
     */
    public $data;

    /**
     * Metodo responsavel por cadastrar uma nova vaga no banco
     * @var boolean
     */
    public function cadastrar(){
        $this->data = date('Y-m-d H:i:s');

        //inserir vaga no banco
        $objDatabase = new Database('vagas');

        echo "<pre>"; print_r($objDatabase); echo "</pre>"; die();

        //atribuir id da vaga na instancia

        //retornar sucesso
    }
}