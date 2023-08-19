<?php
    
       namespace LOMU\apicontrollers\v1;
       use LOMU\core\Api;
       use LOMU\models\v1\ProductModel;

       class ProductController extends Api{

              private ProductModel $productModelObj;

              function __construct(){

                    $this->productModelObj = new ProductModel();
                    
                    parent::defineDataResponseStructure();

              }//end construct
                       
              function insert(){

                     $check = true;

                     if( parent::checkClientUsedMethodCorrect( $_SERVER['REQUEST_METHOD'] , 'POST' ) ){
                                            
                              $data = parent::convertRequestFromJsonToArray();

                              if( 
                                   isset($data['title']) && isset($data['description'])
                                   && isset($data['quantity']) && isset($data['price']) 
                                   && isset($data['category_id']) && isset($data['admin_id'])
                                   && count($data) == 6     
                                   ){
  
                                      $id = $this->productModelObj->insert($data);
                                     
                                      parent::checkInsert( $id , "POST" );

                              }else{

                                      $check = false;  

                              }

                     }//end if 

                     else{

                          $check = false;

                     }//end else


                     if(!$check){
                              
                           parent::errorRequest(); 

                     }

            }//end insert
            
            function delete( $id ){

                   $check = true;
                   
                   if( parent::checkClientUsedMethodCorrect( $_SERVER['REQUEST_METHOD'] , 'DELETE' ) ){

                           if(!empty($id)){ 

                                    $checkDelete = $this->productModelObj->delete($id);

                                    parent::checkDelete( $checkDelete , "DELETE" );
                           
                          }else{

                                $check = false;  

                          }

                   }//end if 

                   else{

                        $check = false;

                   }//end else


                   if(!$check){
                            
                         parent::errorRequest(); 

                   }//end if       
                     

            }//end delete

            function update(){
                  
                   $check = true;
                   
                   if( parent::checkClientUsedMethodCorrect( $_SERVER['REQUEST_METHOD'] , 'PUT' ) ){
                                          
                            $data = parent::convertRequestFromJsonToArray();

                            if(
                                 isset($data['id']) && 
                                 (
                                         isset($data['quantity']) || isset($data['date']) 
                                         || isset($data['customer_id'])||isset($data['product_id']))
                                
                                 ){

                                    $id = ['id' => $data['id']];
                                    
                                    unset($data['id']);
                                        
                                    $checkUpdate = $this->productModelObj->update($id,$data);
                                   
                                    parent::checkDelete($checkUpdate , "PUT");

                            }else{

                                    $check = false;  

                            }

                   }//end if 

                   else{

                        $check = false;

                   }//end else


                   if(!$check){
                            
                         parent::errorRequest(); 

                   }


            }//end update

            function selectAll(){

                   $check = true; 

                   if( parent::checkClientUsedMethodCorrect( $_SERVER['REQUEST_METHOD'] , 'GET' ) ){

                                      $selectAllResult = $this->productModelObj->selectAll();                                      

                                      parent::selectDataEmpty( $selectAllResult , 'GET' );  


                   }//end if
                   
                   else{
                          
                           $check = false; 
                          
                   }//end else


                   if(!$check){

                           parent::errorRequest();         

                   }//end if  

            }//end selectAll 

            function select( $id ){
                 
                   $check = true;
                   
                   if( parent::checkClientUsedMethodCorrect( $_SERVER['REQUEST_METHOD'] , 'GET' ) ){

                           if(!empty($id)){ 

                                    $categorySelected = $this->productModelObj->select($id);

                                    parent::selectDataEmpty( $categorySelected , "GET" );
                           
                          }else{

                                $check = false;  

                          }

                   }//end if 

                   else{

                        $check = false;

                   }//end else


                   if(!$check){
                            
                         parent::errorRequest(); 

                   }//end if       
                      

            }//end select   
        
       }

?>