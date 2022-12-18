<?php

namespace App\Common;

class Enviroment{

    /**
     * 
     * 
     * 
     * @param string
     * 
     */
    public static function load($dir){
            if(!file_exists($dir.'\.env')){
                echo $dir.'\.env';
            }else{

                $lines = file($dir.'\.env');
                //print_r($lines);
                foreach ($lines as $line) {
                    putenv(trim($line));
                    //echo $line;   
                    
            }
          
        }
      
    }
}