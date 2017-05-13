<?php

    class DB {
    
    private $conn;
    private static $instance;
    
    private function __construct(){
        $this->conn = new mysqli('localhost', 'root', '', 'school');
        if($this->conn->errno){
            echo $this->conn->error;
            die();
        }
    }
    
    public static function get_instance(){
        if (empty(self::$instance)){
        return self::$instance = new self();
        } else {
        return self::$instance;        
            }
        
    }
    
    public function get_connection(){
        return $this->conn;
    } 
    }