<?php

include_once  'DB.php';
include_once 'Person.php';

class Course {
         
           public $id;
           public $name;
           public $description;
           public $image;
          
                    
      function __construct($id,$name,$description,$image) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        
}


    public function count() {
        $conn = DB::getInstance()->getConnection();
        if ($conn->errno) {echo $conn->error; die();}
        $result = $conn->query("SELECT * FROM courses" );
        if ($result->num_rows > 0)
        {
            $count = $result->num_rows;
            echo json_encode($count);
        }
        else{
            echo "0";
        }
    }

    public function save() {
        $conn = DB::get_instance()->get_connection();
        if ($conn->errno) {echo $conn->error; die();}
        
      
        $stmt = $conn->prepare("INSERT INTO courses (name, description ,image) VALUES (?, ?,?)");
        $stmt->bind_param('sss', $this->name, $this->description , $this->image);
        $stmt->execute();
        if ($stmt->error){
            echo $stmt->error;
        
        } else {
            echo "Insert new Course: ". $this->name ." success";
        }
    }
	public function edit() {
//            echo 'hi';
            $conn = DB::get_instance()->get_connection();
        if ($conn->errno) {echo $conn->error; die();}
        print_r($this);
        $stmt = $conn->prepare("UPDATE COURSES SET name=?, description=?, image=? where id = ?");
        $stmt->bind_param('sssi', $this->name, $this->description, $this->image, $this->id);
        $stmt->execute();
        echo 'work';
        }
        
	public function delete() {
            $conn = DB::get_instance()->get_connection();
        if ($conn->errno) {echo $conn->error; die();}
        
         $result = $conn->query("DELETE FROM courses WHERE id = '$this->id'");
        if ($result){
            echo "delete course success";
        }else{
            echo "delete course failed";
        }
        }       
        
        
        public static function print_all() {
            
             $conn = DB::get_instance()->get_connection();
        if ($conn->errno) {echo $conn->error; die();}
        
             $result = $conn->query("SELECT * FROM courses");
        $rows = array();
          $image_prefix = "../uploads/course/";
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc()){
                $rows[] = $row;
//            echo json_encode($rows);
//            print_r($rows[0]['name']);
             $html = '<ul>';
                         
                 $html .= '<a href="school.php?action=edit&class_name=course&id='. $row["id"].
                         '&name=' . $row["name"]. '&description='  . $row["description"].  '&image=' .$row["image"].'">
                         <li class="list-item">
                             <img width="50" src="'. $image_prefix . $row["image"] .'" alt="" class="small-icon">
                             <p class="course-name">' . $row["name"]. '</p>
                             <p class="course-description">' . $row["description"] .'</p>
                         </li>
                     </a>';
                 $html .='</ul>';
                 echo $html;
                 
        }
        }
        else {
            echo "0 results";
        return $rows;
    }
        
}}

