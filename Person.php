<?php

include 'interface.php';
abstract class Person implements ISavable{
    public $id;
    public $name;
    public $phone;
    public $email;
    
    public function __construct() {
        ;
    }
}