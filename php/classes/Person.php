<?php

include_once 'interface.php';
abstract class Person {
    protected $id;
    protected $name;
    protected $phone;
    protected $email;
    // protected $image;  //a string which will  be a link to the image file
    
    public function __construct($id,$name,$phone,$email) {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
    }
}