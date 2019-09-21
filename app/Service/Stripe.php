<?php
namespace App\Service;
//just another example how to binding an function
class Stripe{
    protected $key;
    public function __construct($key)
    {
        $this->key = $key;
    }
}
