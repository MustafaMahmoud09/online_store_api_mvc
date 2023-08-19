<?php
    
       namespace LOMU\apicontrollers\v1;
       use LOMU\core\Api;
       use LOMU\models\v1\OrderModel;

       class OrderController extends Api{

              private OrderModel $orderModelObj;

              function __construct(){

                    $this->orderModelObj = new OrderModel();
                    
                    parent::defineDataResponseStructure();

              }//end construct
                       
              function insert(){

                     $check = true;

                     if( parent::checkClientUsedMethodCorrect( $_SERVER['REQUEST_METHOD'] , 'POST' ) ){
                                            
                              $data = parent::convertRequestFromJsonToArray();

                              if( 
                                   isset($data['quantity']) && isset($data['date'])
                                   && isset($data['customer_id']) && isset($data['product_id']) 
                                   && count($data) == 4   
                                   ){
  
                                      $id = $this->orderModelObj->insert($data);
                                     
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

                                    $checkDelete = $this->orderModelObj->delete($id);

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

            function selectAll(){

                   $check = true; 

                   if( parent::checkClientUsedMethodCorrect( $_SERVER['REQUEST_METHOD'] , 'GET' ) ){

                                      $selectAllResult = $this->orderModelObj->selectAll();                                      

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

                                    $categorySelected = $this->orderModelObj->select($id);

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