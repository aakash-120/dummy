<?php

use Phalcon\Mvc\Controller;


class TestController extends Controller
{
    public function indexAction()
    {
    }
    public function EventTestAction()
    {
        echo "hi";
        die;
    }
}