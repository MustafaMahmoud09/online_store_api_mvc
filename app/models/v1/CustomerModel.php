<?php
    
       namespace LOMU\models\v1;
       use Exception;
       use LOMU\core\Model;
       use PDO;

       class CustomerModel extends Model{
              function login( $data ){
                         
                     return  parent::connectinon()->run("SELECT * FROM customer WHERE email = ? AND password = ? ",
                               [ $data ['email'] , $data ['password'] ])->fetch(PDO::FETCH_ASSOC);

               }//end login

               function register($data){
                   
                     try{ 
                    
                            return parent::connectinon()->insert('customer', $data );

                    }//end try
                   
                    catch(Exception){

                             return -1;   

                    }//end catch   

               }//end register
        
       }

?>