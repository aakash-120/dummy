<?php

use Phalcon\Mvc\Controller;


class OrderController extends Controller
{
    public function indexAction()
    {
        $orderTable = Orders::find();
        $j = json_encode($orderTable);
        $de = json_decode($j);
        $total_entries = count($de);
        $this->view->d = $de;
        // print_r($de);
        // die();
    }

    public function addAction()
    {
    }

    public function addtodbAction()
    {
        $order = new Orders();
        print_r($this->request->getPost());
        //   die();

        $values = $_POST;
        $eventmanager = $this->di->get('eventManager');
        $settings = Settings::find();
        $array = $eventmanager->fire('notifications:afterSend', (object)$values, $settings);

        echo "returned value<pre>";
        print_r($array);
        echo "</pre>";
        echo $array->name;
        //die();

        $order->name = $array->cname;
        $order->address = $array->caddress;
        $order->zipcode = $array->czipcode;
        $order->product = $array->available_product;
        $order->quantity = $array->cquantity;

        $success = $order->save();
        $this->response->redirect('/order');
    }
}
