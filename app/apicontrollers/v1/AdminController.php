<?php
    
       namespace LOMU\apicontrollers\v1;
       use LOMU\core\Api;
       use LOMU\models\v1\AdminModel;

       class AdminController extends Api{

                  private AdminModel $adminModelObj;    

                  function __construct(){

                          $this->adminModelObj = new AdminModel(); 
                          parent::defineDataResponseStructure();               

                  }//end construct
                  
                  
                  function login(){

                          $check = true; 

                          if( parent::checkClientUsedMethodCorrect( $_SERVER['REQUEST_METHOD'] , 'POST' ) ){

                                      $data =  parent::convertRequestFromJsonToArray();
                                    
                                      if( isset($data['email']) && isset($data['password']) && count($data) ==2 ){

                                             $resultRegister = $this->adminModelObj->login( $data );                                       

                                             parent::selectDataEmpty( $resultRegister , 'POST' );  

                                      }//end if
                                      
                                      else{

                                             $check = false;    

                                      }//end else


                          }//end if
                          
                          else{
                                 
                                  $check = false; 
                                 
                          }//end else


                          if(!$check){

                                  parent::errorRequest();         

                          }//end if

                  }//end login
                

       }//end AdminController

?>