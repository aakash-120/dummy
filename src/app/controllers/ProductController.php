<?php

use Phalcon\Mvc\Controller;


class ProductController extends Controller
{

   
    public function indexAction()
    {
         $productTable = Products::find();
        $j = json_encode($productTable);
        $de = json_decode($j);
        $total_entries = count($de);
        $this->view->d = $de;
    }

    public function addAction()
    {

    }

    public function addtodbAction()
    {
        // echo "aakash";
        // die();
        $product = new Products();
        print_r($this->request->getPost());





// code
      
        $value = $_POST;
        $eventmanager = $this->di->get('eventManager');
        $settings = Settings::find();
        $array= $eventmanager->fire('notifications:beforeSend', (object)$value, $settings);
        echo"after event manager in product add<br>";
 print_r($array);
 echo $array->name;
       // die();




        $product->name = $array->name;
        $product->description = $array->description;
        $product->tags = $array->tags;
        $product->price= $array->price;
        $product->stock = $array->stock;
      //  echo $name.$description.$tags.$price.$stock;


        // $product->assign(
        //     $this->request->getPost(),
        //     [
        //         'name',
        //         'email',
        //         'password',            
        //     ]
        // );

        // $product->name = $name;
        // $product->description = $description;
        // $product->tags = $tags;
        // $product->price = $price;
        // $product->stock = $stock;
    

      
        $success = $product->save();
        $this->response->redirect('/product');


        // $this->view->success = $success;

        // if($success){
        //     $this->view->message = "Register succesfully";
        // }else{
        //     $this->view->message = "Not Register succesfully due to following reason: <br>".implode("<br>", $user->getMessages());
        // }
        // die();
    }

}