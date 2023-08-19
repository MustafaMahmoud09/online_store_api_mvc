<?php
    
       namespace LOMU\core;

       class App{
  
              private $api = '';
              private $version = '';
              private $controller = '';
              private $method = '';
              private $params = [];

              function __construct(){

                       $this->url();
                       $this->render();        

              }//end constructor

              private function url(){
          
                       $queryString = $_SERVER['QUERY_STRING'];  
                     
                       if(!empty($queryString)){

                               $url = explode('/' , $queryString); 
                               
                               $this->api = (isset($url[0])) ? $url[0] : '';
                           
                               $this->version = (isset($url[1])) ? $url[1] : '';

                               $this->controller = (isset($url[2])) ? $url[2].'Controller': ''; 

                               $this->method = (isset($url[3])) ? $url[3] : '';

                               unset($url[0],$url[1],$url[2],$url[3]);
                               
                               $this->params = array_values($url);

                       }//end if 

              }//end url

              private function render(){
                 
                      $check = false;
                     
                      if( $this->api == APICONTROLLERNAME ){

                              if( file_exists(APICONTROLLERS.DS.$this->version) ){
                               
                                          $this->controller = 'LOMU\\'.APICONTROLLERNAME.'\\'
                                                                       .$this->version.'\\'
                                                                       .$this->controller;
                                        
                                           if( class_exists($this->controller) ){

                                                      $this->controller = new $this->controller; 

                                                      if( method_exists($this->controller,$this->method) ){

                                                               call_user_func_array(
                                                                
                                                                [$this->controller,$this->method],
                                                                 $this->params
                                                             
                                                            );

                                                      }//end if 

                                                      else{

                                                              $check = true;

                                                      }//end else
                                                
                                           }//end if 
                                           
                                           else{

                                                     $check = true; 

                                           }//end else

                               }//end if
                      
                               else{

                                       $check = true;                                  

                               }//end else
                                 

                      }//end if

                      else {
                        
                              $check = true;    

                      }//end else  


                      if( $check ){

                              $this->setDataError();     

                              call_user_func_array(
                                                                
                                [$this->controller,$this->method],
                                 $this->params
                             
                            );                              

                      }//end if

              }//end render

  
              private function setDataError(){

                      $this->controller = new  ('LOMU\apicontrollers\error\ErrorController');
                      $this->method = 'notFound'; 
                      $this->params = [];    

              }//end setDataError
              
       }//end App

?>