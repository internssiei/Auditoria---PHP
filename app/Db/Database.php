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
private $HOST = null;

/**
 * 
 * nome da USUARIO a ser utilizada
 * @var string
 */
private $USUARIO = null;
/**
 * 
 * nome da SENHA a ser utilizada
 * @var string
 */
private $SENHA = null;

/**
 * 
 * nome da DB a ser utilizada
 * @var string
 */
private $DB = null;
    
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
   //$this->Ambientacao = new Enviroment();
   
    $this->HOST = getenv('HOST');

    $this->USUARIO =  getenv('USUARIO');

    $this->SENHA =  getenv('SENHA');

    $this->DB =  getenv('DB');
    


$this->table = $table;
$this->setConnection();

}
/**
 * 
 * 
 * Constrói a conexão com o banco
 * 
 * 
 */
public function setConnection(){

    try{  
        
        $this->connection = new PDO("mysql:host=". $this->HOST.";dbname=". $this->DB."", $this->USUARIO, $this->SENHA);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e) 
            {
                die('setConnection: Não foi possivel se conectar');         
            }
    }

/** 
 * 
 * Função para insert de valores
 * 
 * @param array
 * 
 * @return integer
 * 
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
 *  Função para Update de valores
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
 *  Função para Delete de valores
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
 *  Função para executar a query
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
 *  Função para trazer uma lista de valores
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












