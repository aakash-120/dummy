<?php

use Phalcon\Mvc\Controller;
use Phalcon\Acl\Adapter\Memory;
use Phalcon\Acl\Role;
use Phalcon\Acl\Component;

class SecureController extends Controller
{
    public function indexAction()
    {
        // echo "inside secure index";
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
        // $this->view->d3 = $aakash; 
        //  die();
    }

    public function BuildACLAction()
    {
        $aclFile = APP_PATH . '/security/acl.cache';


        $allowed = Alloweds::find();
        $data = '';
        echo "<pre>";
        $arr = json_decode($allowed[0]->controllerAction, true);
        $newArr = [];

        $controllerArray = [];
        $actionArray = [];


        foreach (array_keys($arr) as $i) {
            if ($i != 'role' && $i != 'submit') {
                $d = explode('_', $i);
                $controllerName = strtolower(substr($d[0], 0, strlen($d[0]) - strlen("Controller")));
                $controllerName = $d[0];
                $actionName = $d[1];
                array_push($controllerArray, $controllerName);
                // print_r($controllerName);
                // echo "<br>";
                // print_r($actionName);
                // echo "<br>";
            }
        }
        foreach (array_unique($controllerArray) as $ctr) {
            print_r($ctr);
            $ctr = strtolower(substr($ctr, 0, strlen($ctr) - strlen("Controller")));
            $newArr[$ctr] = array();
            foreach (array_keys($arr) as $i) {
                $d = explode('_', $i);
                $d[0] = strtolower(substr($d[0], 0, strlen($d[0]) - strlen("Controller")));
                if ($d[0] == $ctr) {
                    echo "<br>";
                    print_r("----" . $d[1]);
                    array_push($newArr[$ctr], $d[1]);
                    // $newArr[$ctr][] = $d[1];
                }
            }
            echo "<br>";
        }
        print_r($newArr);

        die();
        echo "after database";
        $encoded = json_encode($allowed);
        $decoded = json_decode($encoded);
        print_r($decoded);
        foreach ($decoded as $k => $v) {
            foreach ($v as $k1 => $v1) {
                if ($k1 == 'controllerAction') {
                    $data = $v1;
                }
            }
        }
        $data_encoded = json_decode($data);
        //    echo "data = ";
        //    print_r($data_encoded);
        //     echo "</pre>";
        $myarray = array();
        foreach ($data_encoded as $k2 => $v2) {
            if ($k2 == 'role' or $k2 == 'submit') {
            } else {
                $pos = strpos($k2, "_");
                $prefix = substr($k2, 0, $pos);
                $suffix = substr($k2, $pos + 1, strlen($k2));
                //   echo $prefix."      ".$suffix;
                //  echo "<br>"; 
                // $temp = array($prefix=>$suffix);
                //  array_push($myarray,$temp);    
                $myarray[$prefix] = $suffix;
            }
        }

        echo "<pre>";
        print_r($myarray);
        echo "</pre>";





        die();








        if (true !== is_file($aclFile)) {
            $acl = new Memory();
            $acl->addRole('admin');
            $acl->addRole('customer');
            $acl->addRole('guest');

            //addComponent(contoller name ,[action name])
            $acl->addComponent(
                'test',
                [
                    'eventtest'
                ]
            );
            $acl->allow('admin', 'test', 'eventtest');
            $acl->deny('guest', '*', '*');

            //  $acl->deny('guest','*','*');

            file_put_contents(
                $aclFile,
                serialize($acl)
            );
        } else {
            $acl = unserialize(
                file_get_contents($aclFile)
            );
        }

        if (true == $acl->isAllowed('admin', 'test', 'eventtest')) {
            echo "Access Granted";
        } else {
            echo "Access denied";
        }
    }


    public function addroleAction()
    {
    }


    public function addtodbAction()
    {
        print_r($this->request->getPost());


        $role = new Roles();
        $role->role = $this->request->getPost('addrole');
        $role->save();
        // die();
    }

    public function componentsAction()
    {
    }

    public function componentsaddtodbAction()
    {
        print_r($this->request->getPost());


        $components = new Components();
        $components->controller = $this->request->getPost('addcomponent');
        $components->save();
        // die();
    }

    public function allowcomponentsAction()
    {
        $productTable = Components::find();
        $j = json_encode($productTable);
        $de = json_decode($j);
        $this->view->d = $de;

        $productTable2 = Roles::find();
        $j2 = json_encode($productTable2);
        $de2 = json_decode($j2);
        $this->view->d2 = $de2;



        echo "inside secure index";
        $aakash = [];
        $a =  scandir("../app/controllers");
        foreach ($a as $k => $v) {
            if (strlen($v) > 10) {
                $className = basename($v, '.php');
                $aakash[$className] = [];
                $methods2 = (new \ReflectionClass($className))->getMethods(\ReflectionMethod::IS_PUBLIC);
                foreach ($methods2 as $method) {
                    if (\Phalcon\Text::endsWith($method->name, 'Action')) {
                        $method_trimed_name =  substr($method->name, 0, strpos($method->name, "Action"));
                        $aakash[$className][] = $method_trimed_name;
                    }
                }
            }
        }
        echo "<pre>";
        print_r($aakash);
        echo "</pre>";
        $this->view->d3 = $aakash;
    }


    public function allowedaddtodbAction()
    {
        echo "i am allowedaddtodb functoin";
        echo "<pre>";
        print_r($this->request->getPost());
        echo "</pre>";

        $data = json_encode($this->request->getPost());
        $allowed = new Alloweds();
        $allowed->controllerAction = $data;
        $allowed->save();
        print_r($data);
        print_r($allowed->controllerAction);

        // die();
    }
}
