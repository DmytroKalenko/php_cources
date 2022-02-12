<?php

class Autoloader
{
 public static function registerAutoload(){
     spl_autoload_register(function($class) {
         $file = __DIR__.'/'.$class.'.php';
         $fn =  str_replace('\\', '/', $file);
//         echo $fn;
         if (file_exists($fn)) require $fn;
     });


 }
}