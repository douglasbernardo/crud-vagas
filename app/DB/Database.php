<?php

namespace App\DB;

use Exception;
use PDO;

class Database{
    
    const HOST ='localhost';
    const NAME ='dev_vagas';
    const USER = 'root';
    const PASSWORD = 'douglas@melo';

    /**
     * nome tabela a ser manipulada
     */
    private $table;

    /**
     * Instanciaconexao do banco de dados
     * @var string
     */
    private $conection;
    
    public function __construct($table=null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection(){
        try{
            $this->connection = new PDO(
            'mysql:host='
            .self::HOST.
            ';dbname='.self::NAME,self::USER,self::PASSWORD
        );
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die("Error".$e->getMessage());
        }
    }
}