<?php

namespace App\Common;

/**
 * 
 * Classe que instancia os dados das variaveis de ambiente
 * 
 */
class Enviroment{
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
     * Carregar as variaveis da .env para o programa
     * 
     * @param string
     * 
     * @return boolean 
     */
    public static function load($dir){
            if(!file_exists($dir.'/.env')){

                return false;
            }else{
                $lines = file($dir.'/.env');
                foreach ($lines as $line) {
                    putenv(trim($line)); 

            }
          return true;
        }
      
    }
}