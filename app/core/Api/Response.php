<?php
    
       namespace LOMU\core\api;

       class Response{

                private static function defineStatusCodeResponse( $code ){

                        http_response_code( $code ); 

                }//end defineStatusCodeResponse

                private static function responseResult( $code , $message ){

                        $response = [

                            'status' => $code,
                            'msg' => $message          

                        ];   
                      
                        echo json_encode($response); 

                }//end responseResult 

                static function responseResultFinally( $code , $message ){

                        Response::defineStatusCodeResponse($code);
  
                        Response::responseResult($code,$message); 
  
              }//end responseResult

              static function defineMethodUsedInRequest( $method ){

                header('Access-Control-Allow-Method: '.$method); 

              }//end defineMethodUsedInRequest
                
      }//end Response

?>