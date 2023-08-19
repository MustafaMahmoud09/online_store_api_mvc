<?php
    
       namespace LOMU\models\v1;
       use Exception;
       use LOMU\core\Model;
       use PDO;

       class ProductModel extends Model{

              function insert($data){
                                    
                     try{ 
                         
                             return parent::connectinon()->insert('product', $data );
                     
                     }//end try
                    
                     catch(Exception){

                              return -1;   

                     }//end catch       

             }//end insert 

             function delete($id){

                     try{

                            parent::connectinon()->delete('order_1', ['product_id'=>$id]);
                            return parent::connectinon()->deleteById('product', $id);

                     }catch(Exception ){
                            
                            

                     }
             }//end delete

             function update($id,$data){

                       return parent::connectinon()->update('product', $data , $id);
         
             }//end update

             function selectAll(){

                       return parent::connectinon()->rows("SELECT * FROM product"); 

             }//end selectAll

             function select($id){

                       return parent::connectinon()->run("SELECT * FROM product WHERE id = ?", [$id])->fetch(PDO::FETCH_ASSOC);

             }//end select
        
       }

?>