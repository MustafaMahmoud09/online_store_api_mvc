<?php
    
       namespace LOMU\apicontrollers\v1;
       use LOMU\core\Api;
       use LOMU\models\v1\CategoryModel;

       class CategoryController extends Api{
                 
              private CategoryModel $categoryModelObj;

              function __construct(){

                       $this->categoryModelObj = new CategoryModel();  

                       parent::defineDataResponseStructure();

              }//end construct 

              function insert(){

                       $check = true;
                     
                       if( parent::checkClientUsedMethodCorrect( $_SERVER['REQUEST_METHOD'] , 'POST' ) ){
                                              
                                $data = parent::convertRequestFromJsonToArray();

                                if( isset($data['title']) && isset($data['description'])
                                     && isset($data['date']) && isset($data['admin_id']) && count($data) == 4 ){
    
                                        $id = $this->categoryModelObj->insert($data);
                                       
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

                                      $checkDelete = $this->categoryModelObj->delete($id);

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
                                           isset($data['title']) || isset($data['description']) || isset($data['date'])
                                   )
                                   ){

                                      $id = ['id' => $data['id']];
                                      
                                      unset($data['id']);
                                          
                                      $checkUpdate = $this->categoryModelObj->update($id,$data);
                                     
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

                                        $selectAllResult = $this->categoryModelObj->selectAll();                                      

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

                                      $categorySelected = $this->categoryModelObj->select($id);

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