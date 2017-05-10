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

    public function save() {}
	public function edit() {}
	public function delete() {}
}
