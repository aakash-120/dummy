<?php

use Phalcon\Mvc\Controller;


class IndexController extends Controller
{
    public function indexAction()
    {
        // $aakash = [];
        // $a=  scandir("../app/controllers");
        // foreach($a as $k => $v)
        // {                   
        //     if(strlen($v) > 10)
        //     {
        //           $className = basename($v, '.php');
        //           $aakash[$className] = [];
        //           $methods2 = (new \ReflectionClass($className))->getMethods(\ReflectionMethod::IS_PUBLIC);
        //           foreach ($methods2 as $method) {
        //             if (\Phalcon\Text::endsWith($method->name, 'Action')) {
        //                 $method_trimed_name =  substr($method->name, 0, strpos($method->name, "Action"));
        //                 $aakash[$className][] = $method_trimed_name;
        //             }
        //         }
        //     }
        // }
        // echo "<pre>";
        // print_r($aakash);
        // echo "</pre>";
        // die();
    
    }
}