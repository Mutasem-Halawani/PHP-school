<?php

include 'DB.php';
include 'Person.php';

class Course implements CRUD{
           public $name;
           public $description;
           public $image;
                    
      function __construct($name,$description,$image) {
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        
}

    public function save() {
//        $conn = DB::get_instance()->get_connection();
        if ($conn->errno) {echo $conn->error; die();}
    }
	public function edit() {
            $conn = DB::get_instance()->get_connection();
        if ($conn->errno) {echo $conn->error; die();}
        }
	public function delete() {
            $conn = DB::get_instance()->get_connection();
        if ($conn->errno) {echo $conn->error; die();}
        }
}
