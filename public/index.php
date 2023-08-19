<?php

    use LOMU\core\App;

     //path
     
     define('DS',DIRECTORY_SEPARATOR);
     define('ROOT',dirname(__DIR__));
  
     define('APP',ROOT.DS.'app');
     define('VENDOR',ROOT.DS.'vendor');
  
     define('APICONTROLLERS',APP.DS.'apicontrollers');
     define('CORE',APP.DS.'core');
     define('MODELS',APP.DS.'models'); 
  
     define('V1_CONTROLLERS',APICONTROLLERS.DS.'v1');
     define('V1_MODELS',MODELS.DS.'v1');
       

     //constant

     define('APICONTROLLERNAME','apicontrollers');

     //connection global database

     define('HOST','localhost');
     define('PORT','3306');
   
     define('USERNAME','root');
     define('PASSWORD','');
   
     define('TYPE','mysql');
     define('DBNAME','store_api');


     //require

     require_once VENDOR.DS.'autoload.php';  


     //objects

     $objApp = new App(); 

?>