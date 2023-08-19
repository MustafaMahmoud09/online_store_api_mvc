<?php
    
       namespace LOMU\core\api;

       class Request{
              
           static function defineDataResponseStructure(){
                       
                   header('Access-Control-Allow_Origin: application/json');

                   header('Content-Type: application/json');

            }//end defineDataResponseStructure 

           static function checkClientUsedMethodCorrect( $clientMethod , $correctMethod ){

                      if( $clientMethod == $correctMethod ){
                           
                            return true; 

                      }//end if
                      
                      else {
                        
                            return false;

                      }//end else

            }//end checkClientUsedMethodCorrect

             
            static function convertRequestFromJsonToArray(){

                     return json_decode( Request::getRequest() , true ); 

            }//end convertRequestFromJsonToArray
            
            private static function getRequest(){
                   
                  return file_get_contents('php://input');
            
            }//end getRequest

       }//end Header

?>