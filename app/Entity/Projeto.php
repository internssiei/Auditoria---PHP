<?php

namespace App\Entity;

use App\Db\Database; 
use \PDO;



class Projeto{
    

/**
 * 
 * Identificador  Projeto
 *  @var string
 * 
 * 
 */
public $projeto;


/**
 * 
 * Identificador area
 *  @var string
 * 
 * 
 */
public $area;


/**
 * 
 * Identificador operacao
 *  @var string
 * 
 * 
 */
public $operacao;


/**
 * 
 * Identificador plataforma
 *  @var string
 * 
 * 
 */
public $plataforma;

/**
 * 
 * Identificador clienteUn
 *  @var string
 * 
 * 
 */
public $clienteUn;

/**
 * 
 * Identificador titulo
 *  @var string
 * 
 * 
 */
public $titulo;

/**
 * 
 * Identificador local
 *  @var string
 * 
 * 
 */
public $situacao;

/**
 * 
 * Identificador local
 *  @var string
 * 
 * 
 */
public $local;


/**
 * 
 * Identificador local
 *  @var string
 * 
 * 
 */
public $liberacao;



/** 
 * 
 *
 * Cadastrar novo projeto
 * 
 * @return boolean
 */

public function cadastrar(){


    $obDatabase = new Database('Audit_Projetos');
    $this->ID = $obDatabase->insert([
                            'projeto'=> $this->projeto,
                            'area'=> $this->area,
                            'operacao'=> $this->operacao,
                            'plataforma'=> $this->plataforma,
                            'clienteUn'=> $this->clienteUn,
                            'titulo'=> $this->titulo,
                            'situacao'=> $this->situacao,
                            'local'=> $this->local
                        ]);
                                    
                return true;
            
            }
/** 
 * 
 *
 * Atualizar novo projeto
 * 
 * @return boolean
 */

 public function atualizar(){
    $obDatabase = new Database('Audit_Projetos');
    return $obDatabase->update('ID = '.$this->id, [
                            'projeto'=> $this->projeto,
                            'area'=> $this->area,
                            'operacao'=> $this->operacao,
                            'plataforma'=> $this->plataforma,
                            'clienteUn'=> $this->clienteUn,
                            'titulo'=> $this->titulo,
                            'situacao'=> $this->situacao,
                            'local'=> $this->local
                        ]);
              
            }
            /** 
 * 
 *
 * Excluir projeto
 * 
 * @return boolean
 */

 public function excluir(){
    $obDatabase = new Database('Audit_Projetos');
    return $obDatabase->delete('ID ='.$this->ID);                                
                return true;         
            }







    /**
     * METODO QUE RETORNA LISTA DE PROJETO
     * 
     * @param string
     * @param string
     * @param string
     * 
     * @return array
     *  */        
    public static function getProjetos($where=null, $order=null, $limit=null){

        return(new Database('Audit_Projetos'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * METODO QUE RETORNA PROJETO POR ID
     * 
     * @param integer   
     * 
     * 
     * 
     * @return Projeto
     *  */
    public static function getProjeto($id){ 
        print_r((new Database('Audit_Projetos'))->select('ID ='.$id)->fetchObject(self::class));  
        return (new Database('Audit_Projetos'))->select('ID ='.$id)->fetchObject(self::class);

    }
}