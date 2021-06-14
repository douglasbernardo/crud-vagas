<?php

namespace App\Entity;

use App\DB\Database;
use \PDO;

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
    public function cadastrar()
    {
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

    /**
     * Metodo responsavel por obter as vagas do banco de dados
     */
    public static function getVagas($where=null,$order=null,$limit=null)
    {
        return (new Database('vagas'))
                                ->select($where,$order,$limit)
                                ->fetchAll(PDO::FETCH_CLASS,self::class);
    } 

    /**
     * Metodo responsavel por buscar uma vaga com base no seu id
     * @param integer $id
     * @return Vaga
     */
    public static function getVaga($id)
    {
        return (new Database('vagas'))
                                ->select(' id = '.$id)
                                ->fetchObject(self::class);//instancia de classe vaga
    }
}