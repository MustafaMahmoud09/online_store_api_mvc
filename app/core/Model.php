<?php
    
       namespace LOMU\core;
       use Dcblogdev\PdoWrapper\Database;

       class Model{
             
              protected function decrypt( $password ){
                            
                     return bin2hex( $password );

              }//end decrypt
           
              protected function encrypt( $passwordD ){

                     return hex2bin( $passwordD );

              }//end encrypt 


              protected function connectinon(){

                     // make a connection to mysql here
                     $options = [
                          //required
                         'username' => USERNAME,
                         'database' => DBNAME,
                         //optional
                         'password' => PASSWORD,
                         'type' => TYPE,
                         'charset' => 'utf8',
                         'host' => HOST,
                         'port' => PORT
                    ]; 

                    return new Database($options);

               }//end connection

       }//end Model

?>