<?php

include_once  'DB.php';
include_once 'Person.php';

class Student extends Person {
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
        
           $stmt = $conn->prepare("INSERT INTO students (name, phone, email) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $this->name, $this->phone, $this->email);
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
        
         $result = $conn->query("SELECT students.id as id, students.name as name,"
                 . " students.phone as phone, students.email as email,"
                 . " students.image as image, courses.name as course "
                 . "FROM students INNER JOIN courses on students.course_id = courses.id");
        $rows = array();
        $image_prefix = "../uploads/students/";
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc()){
                $rows[] = $row;
            //echo json_encode($rows);
               $html = '<ul>';
                         
                 $html .= '<a href="school.php?action=edit&class_name=student">
                         <li class="list-item">
                             <img width="50" src="'. $image_prefix.  $row["image"] .'" alt="" class="small-icon">
                             <p class="student-name">' . $row["name"]. '</p>
                             <p class="student-phone">' . $row["phone"] .'</p>
                             <p style="display:none;">'. $row["id"].' </p>
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
        }
	public function delete() {
            $conn = DB::get_instance()->get_connection();
        if ($conn->errno) {echo $conn->error; die();}
        
        
         $result = $conn->query("DELETE FROM students WHERE id = '$id'");
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
//	private static function selectAll() {
//		echo ucfirst(self::$tableName);
//		$result = DB::getConnection()->query("SELECT * FROM " . self::$tableName . " limit 1000");
//		$rows = [];
//		while ($row = $result->fetch_assoc()) {
//			$rows []= new self($row['id'], $row['name'], $row['picture']);
//		}
//		return $rows;
//	}
//
//	public static function printList() {
//		$rows = self::selectAll();
//
//		$html  = '';
//		for ($i=0, $count = count($rows); $i < $count; $i++) {
//			$html .= "<a href='?page=students&action=edit&id={$rows[$i]->id}'>";
//			$html .= "<img src='" . self::$picturePrefix . "/{$rows[$i]->picture}'>";
//			$html .= "<span>{$rows[$i]->name}</span>";
//			$html .= '</a>';
//		}
//		return $html;
//	}
