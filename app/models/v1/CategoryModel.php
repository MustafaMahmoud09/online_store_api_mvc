<?php
    
       namespace LOMU\models\v1;
       use Exception;
       use LOMU\core\Model;
       use PDO;

       class CategoryModel extends Model{

                function insert($data){
                                    
                        try{ 
                            
                                return parent::connectinon()->insert('category', $data );
                        
                        }//end try
                       
                        catch(Exception){

                                 return -1;   

                        }//end catch       

                }//end insert 

                function delete($id){
                         
                         
                         $ids= parent::connectinon()->run("SELECT id FROM product WHERE category_id = ?", [$id])->fetch(PDO::FETCH_ASSOC);

                         if(!empty($ids)){

                             foreach($ids as $id){

                                   parent::connectinon()->delete('order_1',['product_id'=>$id]);    

                               }//end foreach   
                      
                        }
                        parent::connectinon()->delete('product', ['category_id' => $id ]);
                        return parent::connectinon()->deleteById('category', $id);
                       
                }//end delete

                function update($id,$data){

                          return parent::connectinon()->update('category', $data , $id);
            
                }//end update

                function selectAll(){

                          return parent::connectinon()->rows("SELECT * FROM category"); 

                }//end selectAll

                function select($id){

                          return parent::connectinon()->run("SELECT * FROM category WHERE id = ?", [$id])->fetch(PDO::FETCH_ASSOC);

                }//end select

       }

?>