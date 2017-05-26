<?php

include_once 'interface.php';
abstract class Person implements CRUD {
    protected $id;
    protected $name;
    protected $phone;
    protected $email;
    
    public function __construct($id,$name,$phone,$email) {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
    }
}