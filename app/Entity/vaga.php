<?php

namespace App\Entity;

use App\DB\Database;

class Vaga{

    /**
     * Identificador único da vaga
     * @var integer
     */
    public $id;
    /**
     * Titulo da vaga
     * @var string
     */
    public $titulo;

    /**
     * Descrição da Vaga
     * @var string
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

        $this->id = $objDatabase->insert([
                'titulo' => $this->titulo,
                'descricao' => $this->descricao,
                'ativo' => $this->ativo,
                'data' => $this->data,
        ]);
        //atribuir id da vaga na instancia

        //retornar sucesso
        return true;
    }
}