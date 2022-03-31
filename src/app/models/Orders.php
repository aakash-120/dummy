<?php

use Phalcon\Mvc\Model;

class Orders extends Model
{
    public $id;
    public $name;
    public $address;
    public $zipcode;
    public $product;
    public $quantity;
    public $pid;
}