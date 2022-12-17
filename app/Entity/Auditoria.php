<?php

namespace App\Entity;

use App\Db\Database; 
use \PDO;

class Auditoria{
/**
 * 
 * Identificador Unico do Projeto
 *  @var integer
 * 
 * 
 */
public $id;


/**
 * 
 * Identificador  Projeto
 *  @var string
 * 
 * 
 */
public $evidencia;


/**
 * 
 * Identificador area
 *  @var string
 * 
 * 
 */
public $descricao;


/**
 * 
 * Identificador operacao
 *  @var string
 * 
 * 
 */
public $disciplina;


/**
 * 
 * Identificador plataforma
 *  @var string
 * 
 * 
 */
public $localizacao;

/**
 * 
 * Identificador clienteUn
 *  @var string
 * 
 * 
 */
public $situacao;

/**
 * 
 * Identificador titulo
 *  @var string
 * 
 * 
 */
public $resposta;

/**
 * 
 * Identificador local
 *  @var integer
 * 
 * 
 */
public $Projeto_Id;

/**
 * 
 * Identificador local
 *  @var string
 * 
 * 
 */
public $ultima_modificacao;

/** 
 * 
 *
 * Cadastrar novo projeto
 * 
 * @return boolean
 */

public function cadastrar(){

    $this->ultima_modificacao = date('y-m-d');
    

    $obDatabase = new Database('itensauditoria');
    $this->ID = $obDatabase->insert([
                            'evidencia'=> $this->evidencia,
                            'descricao'=> $this->descricao,
                            'disciplina'=> $this->disciplina,
                            'localizacao'=> $this->localizacao,
                            'situacao'=> $this->situacao,
                            'resposta'=> $this->resposta,
                            'Projeto_Id'=> $this->Projeto_Id,
                            'ultima_modificacao'=> $this->ultima_modificacao
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
    $obDatabase = new Database('itensauditoria');
    return $obDatabase->update('Id = '.$this->Id, [
                             'evidencia'=> $this->evidencia,
                            'descricao'=> $this->descricao,
                            'disciplina'=> $this->disciplina,
                            'localizacao'=> $this->localizacao,
                            'situacao'=> $this->situacao,
                            'resposta'=> $this->resposta,
                            'Projeto_Id'=> $this->Projeto_Id,
                            'ultima_modificacao'=> $this->ultima_modificacao
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
    $obDatabase = new Database('itensauditoria');
    return $obDatabase->delete('Id ='.$this->Id);                                
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
    public static function getAuditorias($where=null, $order=null, $limit=null){

        return(new Database('itensauditoria'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS, self::class);
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
    public static function getAuditoria($id){ 
        //print_r((new Database('itensauditoria'))->select('Id ='.$id)->fetchObject(self::class));  
        return (new Database('itensauditoria'))->select('Id ='.$id)->fetchObject(self::class);

    }
}