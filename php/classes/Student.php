<?php

include_once  'DB.php';
include_once 'Person.php';

class Student extends Person {
        public $id;
        public $name;
        public $phone;
        public $email;
	public $image;
        public $course_id;

	function __construct($id, $name, $phone, $email, $image,$course_id) {
                 parent::__construct($id, $name, $phone, $email);
		$this->image = $image;
		$this->course_id = $course_id;
	}

	public function save() {
        $conn = DB::get_instance()->get_connection();
        if ($conn->errno) {echo $conn->error; die();}
        
           $stmt = $conn->prepare("INSERT INTO students (name, phone, email, image) VALUES (?, ?, ?,?)");
        $stmt->bind_param('ssss', $this->name, $this->phone, $this->email , $this->image);
        $stmt->execute();
        if ($stmt->error){
            echo $stmt->error;
        }
        else{
            echo "Insert new Student: ". $this->name ." success";
        }
        }
        
        public static function print_all(){
            $conn = DB::get_instance()->get_connection();
        if ($conn->errno) {echo $conn->error; die();}
        
//         $result = $conn->query("SELECT students.id as id, students.name as name,"
//                 . " students.phone as phone, students.email as email,"
//                 . " students.image as image, courses.name as course "
//                 . "FROM students INNER JOIN courses on students.course_id = courses.id");
        
        $result = $conn->query("SELECT * FROM students");
//        print_r($result);
        $rows = array();
              
        $image_prefix = "../uploads/student/";
        if ($result->num_rows > 0)
        {
//             echo"hi";            
            while ($row = $result->fetch_assoc()){
                $rows[] = $row;
//                print_r($rows);
               $html = '<ul>';
//               print_r($row['image']);
                 $html .= '<a href="school.php?action=edit&class_name=student&id='. $row["id"]. 
                         '&name=' . $row["name"]. '&phone='  . $row["phone"].'&email=' . $row["email"] .  '&image=' .$row["image"]. '&course_id=' .$row["course_id"].'">
                         <li class="list-item">
                             <img width="50" src="'. $image_prefix.  $row["image"] .'" alt="" class="small-icon">
                             <p class="student-name">' . $row["name"]. '</p>
                             <p class="student-phone">' . $row["phone"] .'</p>
                             <p style="display:none;">'. $row["email"].' </p>
                             <p style="display:none;">'. $row["image"].' </p>
                         </li>
                     </a>';
                 $html .='</ul>';
                 echo $html;
        }}
        else
            echo "0 results";
        return $rows;
        }
	public function edit() {
          $conn = DB::get_instance()->get_connection();
        if ($conn->errno) {echo $conn->error; die();}
        
           $stmt = $conn->prepare("UPDATE STUDENTS SET name=?, phone=?, email=?, image=? , course_id=? where id = ?");
        $stmt->bind_param('ssssii', $this->name, $this->phone, $this->email, $this->image, $this->course_id ,$this->id);

        $stmt->execute();
        }
	public function delete() {
            $conn = DB::get_instance()->get_connection();
        if ($conn->errno) {echo $conn->error; die();}
        
        
         $result = $conn->query("DELETE FROM students WHERE id = $this->id");
        if ($result){
            echo "delete student success";
        }
        else{
            echo "delete student failed";
        }
        }
        
        public function count()
    {
        $conn = DB::getInstance()->getConnection();
        if ($conn->errno) {echo $conn->error; die();}
        $result = $conn->query("SELECT * FROM students");
        if ($result->num_rows > 0)
        {
            $count = $result->num_rows;
            echo json_encode($count);
        }
        else {
            echo "0";
    }
    }
}