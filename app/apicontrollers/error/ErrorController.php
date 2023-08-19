<?php
    
       namespace LOMU\apicontrollers\error;
       use LOMU\core\Api;

       class ErrorController extends Api{
            
             function __construct(){

                  parent::defineDataResponseStructure(); 

             }//end construct 
             function notFound(){
                       
                    parent::errorRequest();

             }//end notFound

       }//end ErrorController

?>