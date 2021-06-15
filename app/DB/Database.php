<?php

namespace App\DB;

use Exception;
use PDO;
use PDOException;

class Database{
    
    const HOST ='localhost';
    const NAME ='dev_vagas';
    const USER = 'root';
    const PASSWORD = 'douglas@melo';

    /**
     * nome tabela a ser manipulada
     * @var string
     */
    private $table;

    /**
     * Instanciaconexao do banco de dados
     * @var PDO
     */
    private $connection;
    
    public function __construct($table=null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection()
    {
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
    /**
     * Metodo responsavel por executar as queries dentro do bd
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */

    public function execute($query,$params=[])
    {
        try{
            $stmt = $this->connection->prepare($query);
            $stmt->execute($params);
            return $stmt;
        }catch(PDOException $e){
            die("Erro".$e->getMessage());
        }
    }

    /**
     * Metodo responsavel por inserir dados no banco
     * @param array $values [field=>value]
     * @return integer
     * @return integer ID inserido  
     */

    public function insert($values)
    {

        $fields = array_keys($values);
        $binds = array_pad([],count($fields),'?'); //tamanho do array tem que ser do tamnho dos campos que é 4 
        
        $query =  'INSERT INTO '. $this->table.'('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';
        
        $this->execute($query,array_values($values));

        return $this->connection->lastInsertId(); //ultimo id inserido
    }

    /**
     * Metodo responsavel por fazer uma consulta no banco
     * @param string $where
     * @param string $order
     * @return PDOStatement
     */
    public function select($where=null,$order=null,$limit=null,$fields="*")
    {
        
        $where = strlen($where) ? "WHERE".$where:"";
        $order = strlen($order) ? "ORDER".$order:"";
        $limit = strlen($limit) ? "LIMIT".$limit:"";

        $query = 'SELECT '.$fields.'FROM '. $this->table. '  ' . $where. '  '. $order.'  '. $limit;

        return $this->execute($query);
    }

    public function update($where,$values){

        $fields = array_keys($values);
        $query = 'UPDATE '.$this->table.' SET '. implode('=?,',$fields).'=? WHERE '.$where;
        $this->execute($query,array_values($values));

        return true;
    }

    public function delete($where){
        $query = 'DELETE FROM '.$this->table.' WHERE ' .$where;
        $this->execute($query);

        return true;

    }
}