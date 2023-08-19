<?php
    
       namespace LOMU\apicontrollers\v1;
       use LOMU\core\Api;
       use LOMU\models\v1\CustomerModel;

       class CustomerController extends Api{

              private CustomerModel $customerModelObj;    

              function __construct(){

                      $this->customerModelObj = new CustomerModel(); 
                      parent::defineDataResponseStructure();               

              }//end construct
              
              
              function login(){

                      $check = true; 

                      if( parent::checkClientUsedMethodCorrect( $_SERVER['REQUEST_METHOD'] , 'POST' ) ){

                                  $data =  parent::convertRequestFromJsonToArray();
                                
                                  if( isset($data['email']) && isset($data['password']) && count($data) ==2 ){

                                         $resultRegister = $this->customerModelObj->login( $data );                                       

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
            
              function register(){

                     $check = true;
                   
                     if( parent::checkClientUsedMethodCorrect( $_SERVER['REQUEST_METHOD'] , 'POST' ) ){
                                            
                              $data = parent::convertRequestFromJsonToArray();

                              if( isset($data['email']) && isset($data['fname'])
                                   && isset($data['lname']) && isset($data['birth_date']) &&  isset($data['password'])
                                   && count($data) == 5 ){
  
                                      $id = $this->customerModelObj->register($data);
                                     
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

            }//end register
        
       }//end CustomerController

?>