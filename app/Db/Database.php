<?php

namespace App\Db;
use \PDO;
use \PDOException;

class Database{

/**
 * 
 * nome da HOST a ser utilizada
 * @var string
 */
    const HOST ='localhost';

/**
 * 
 * nome da USUARIO a ser utilizada
 * @var string
 */
    const USUARIO = 'root';
/**
 * 
 * nome da SENHA a ser utilizada
 * @var string
 */
    const SENHA = '';

/**
 * 
 * nome da DB a ser utilizada
 * @var string
 */
    const DB = 'auditoria';
    
/**
 * 
 * nome da tabela a ser utilizada
 * @var string
 */

    private $table;
/**
 * 
 * 
 * @var PDO
 */
private $connection;

/**
 * 
 * Definir tabela e conexão
 * 
 * @param string
 *  
 */

public function __construct($table){

$this->table = $table;
$this->setConnection();

}
/**
 * 
 * 
 * 
 * 
 * 
 */
public function setConnection(){

    try{  
        $this->connection = new PDO("mysql:host=".self::HOST.";dbname=".self::DB."",self::USUARIO,self::SENHA);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e) 
            {
                die('setConnection: Não foi possivel se conectar');         
            }
    }
/** 
 * @param array
 * 
 * @return integer
 */
public function insert($values){
        $fields = array_keys($values);
        $binds = array_pad([],count($fields),'?');
        $query = 'INSERT INTO '.$this->table.' ('.implode(' ,', $fields).') VALUES ('.implode(' ,', $binds).')';
       
        $this->execute($query,array_values($values));
        return $this->connection->lastInsertId();;
}


 /**
 * 
 * 
 * @param string
 * @param array
 * @return boolean
 * 
 */
  public function update($where, $values){
    $fields = array_keys($values);

    $query = 'UPDATE '.$this->table.' SET '.implode('=?, ',$fields).'=? WHERE '.$where;
    
        $this->execute($query,array_values($values));
    
    return true;
}     


/**
 * 
 * 
 * @param string
 * 
 * @return boolean
 * 
 */
public function delete($where){
    
    $deleteQuery = 'DELETE FROM '.$this->table.' WHERE '.$where;
    //   echo  $deleteQuery;
    //   exit;
        $this->execute($deleteQuery);
    
    return true;
}     


/**
 * 
 * 
 * @param string
 * @param array
 * @return PDOStatement
 * 
 */
public function execute($query, $params = []){
            try {
            
                $statement = $this->connection->prepare($query);
                
                $statement->execute($params);
                return $statement;
                //code...
            } catch (PDOException $e){
                
                die('ERROR: '.$e->getMessage());
        }
    }


/**
 * 
 * 
 * @param string
 * @param string
 * @param string
 * @return PDOStatement
 * 
 */
public function select($where =null, $order =null, $limit=null, $fields='*'){
        
            $where = strlen($where) ? 'WHERE '.$where : '';
            $order = strlen($order) ? 'ORDER BY '.$order : '';
            $limit = strlen($limit) ? 'LIMIT '.$limit : '';

            $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
                

            return $this->execute($query);
          
        } 
 
        
}












