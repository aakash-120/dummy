<?php

use Phalcon\Mvc\Controller;


class SettingController extends Controller
{
    public function indexAction()
    {
        // echo "seeting action";
        // die();
    }

    public function updateAction()
    {
        echo "i am inside update action ";
        print_r($this->request->getPost());
      //  die();
        $to  = $this->request->getPost('to');
        $dp =  $this->request->getPost('dp');
        $ds =  $this->request->getPost('ds');
        $dz =  $this->request->getPost('dz');

        $particular_column = Settings::findFirst(
            [
                "ID = 1",
            ]
        );

        $particular_column->Title_Optimization = $to;
        $particular_column->Default_price = $dp;
        $particular_column->Default_Stock = $ds;
        $particular_column->Default_Zipcode = $dz;

        $particular_column->save();
        $this->response->redirect('/setting');
    }


}