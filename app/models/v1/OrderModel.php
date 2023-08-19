<?php
    
       namespace LOMU\models\v1;
       use LOMU\core\Model;
       use PDO;

       class OrderModel extends Model{

              function insert($data){
                                    
                     try{ 
                         
                             return parent::connectinon()->insert('order_1', $data );
                     
                     }//end try
                    
                     catch(Exception){

                              return -1;   

                     }//end catch       

             }//end insert 

             function delete($id){

                            return parent::connectinon()->deleteById('order_1', $id);

             }//end delete

             function selectAll(){

                       return parent::connectinon()->rows("SELECT * FROM order_1"); 

             }//end selectAll

             function select($id){

                       return parent::connectinon()->run("SELECT * FROM order_1 WHERE id = ?", [$id])->fetch(PDO::FETCH_ASSOC);

             }//end select
       }

?>