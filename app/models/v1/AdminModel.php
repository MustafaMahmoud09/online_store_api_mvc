<?php
    
       namespace LOMU\models\v1;
       use LOMU\core\Model;
       use PDO;

       class AdminModel extends Model{

                  
                  function login( $data ){

                         
                        return  parent::connectinon()->run("SELECT * FROM admin WHERE email = ? AND password = ? ",
                                  [ $data ['email'] , $data ['password'] ])->fetch(PDO::FETCH_ASSOC);

                  }//end login



       }//end AdminModel

?>