<?php
    
     namespace LOMU\core;

     use LOMU\core\Api\Request;
     use LOMU\core\Api\Response;

     class Api{

            protected function defineDataResponseStructure(){

                     Request::defineDataResponseStructure();        

            }//end defineDataResponseStructure()  
    

           protected  function checkClientUsedMethodCorrect( $clientMethod , $correctMethod ){

                     return Request::checkClientUsedMethodCorrect( $clientMethod,$correctMethod );

            }//end checkClientUsedMethodCorrect


            protected function convertRequestFromJsonToArray(){

                     return Request::convertRequestFromJsonToArray();
                   
            }//end convertRequestFromJsonToArray

           protected function selectDataEmpty( $data , $method ){

                  Response::defineMethodUsedInRequest( $method );

                  if(!empty( $data )){

                         Response::responseResultFinally( 200 , $data );  

                  }//end if     

                  else{
                   
                         Response :: responseResultFinally( 300 , 'Not Data  Selected' ); 

                   }//end else

       }//end selectDataEmpty

       protected function errorRequest(){
                            
                    Response::defineMethodUsedInRequest("NULL");

                    Response:: responseResultFinally( 400 , "Error");

       }//end errorRequest
  
       protected function checkInsert( $id , $method ){
             
              Response::defineMethodUsedInRequest( $method );

              if($id>0){

                    Response::responseResultFinally( 201 , true );  

              }//end if

              else{
 
                   Response::responseResultFinally(301,false); 

              }//end else

       }//end ceckInsert

       protected function checkDelete( $id , $method ){

              Response::defineMethodUsedInRequest( $method ); 

              if( $id == 1 ){
                  
                    Response::responseResultFinally( 200 , true );  

              }//end if

              else{

                   Response::responseResultFinally(300,false); 

              }//end else

       }//end checkDelete 

     }//end Api

?>