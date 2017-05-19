<?php
//session_start();
include_once  'DB.php';
include_once 'Person.php';

class Administrator extends Person{
//	private static $tableName = 'administrators';
//	private static $picturePrefix = 'img/student_img';

    private $image;
    private $password;  
    private $role_id;
    
	function __construct($id, $name, $phone ,$email, $image, $password, $role_id) {
		
            parent::__construct($id, $name, $phone, $email) ;
            $this->image = $image;
            $this->password = $password;
            $this->role_id = $role_id;
            }

	public function save() {
           $conn = DB::get_instance()->get_connection();
        if ($conn->errno) {echo $conn->error; die();}
        
        $stmt = $conn->prepare("INSERT INTO administrators (name, phone,"
                . " email, image, password, role_id) VALUES (?, ?, ?, ?, ?, ?)");
		$stmt->bind_param('ssssis', $this->name, $this->phone,
                        $this->email, $this->image, password_hash($this->password, PASSWORD_DEFAULT),$this->role_id);
		$stmt->execute();
		
		if($stmt->error){
			echo $stmt->error;
		} else {
			echo "Insert new Admin: ". $this->name ." success";
		}
        
        }
        public function print_all(){
                 $conn = DB::get_instance()->get_connection();
        if ($conn->errno) {echo $conn->error; die();}
    
        $result = $conn->query("SELECT * FROM administrators");
        $rows = [];
        
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
            $image_prefix = "../uploads/administrators/";
             $html = '<ul>';
                         
                 $html .= '<a href="">
                         <li class="list-item">
                             <img width="50" src="'. $image_prefix . $row["image"] .'" alt="" class="small-icon">
                             <p class="course-name">' . $row["name"]. '</p>
                             <p class="course-description">' . $row["email"] .'</p>
                         </li>
                     </a>';
                 $html .='</ul>';
                 echo $html;
        }
//        print_r($rows);
        }
        
//	public function edit() {
//                 $conn = DB::get_instance()->get_connection();
//        if ($conn->errno) {echo $conn->error; die();}
//    }
//        }
        
        public function delete() {
            $conn = DB::connect();
    if ($conn->errno) {
        echo $conn->error;
        die();
    }
        $result = $connection->query("DELETE FROM admins WHERE id = '$id'");
		if($result) {
			echo "delete admin success";
		} else {
			echo "delete admin failed";
		}
    }
        

	private static function selectAll() {
            
            
		$result = $connection->query("SELECT admins.id as id, admins."
                        . " as name, admins.phone as phone, admins.email as email,"
                        . " admins.image as image, roles.name as role FROM admins"
                        . " INNER JOIN roles on roles.id = admins.role_id");
		$row = array();
		if ($result->num_rows > 0) {
			while ($r = $result->fetch_assoc()) {
				$rows[] = $r;
			}
			echo json_encode($rows);
			} else {
				echo "0 results";
			}
	}

	public static function printList() {
		$rows = self::selectAll();

		$html  = '';
		for ($i=0, $count = count($rows); $i < $count; $i++) {
			$html .= "<a href='?page=students&action=edit&id={$rows[$i]->id}'>";
			$html .= "<img src='" . self::$picturePrefix . "/{$rows[$i]->picture}'>";
			$html .= "<span>{$rows[$i]->name}</span>";
			$html .= '</a>';
		}
		return $html;
	}
        
        public function edit() {
            $stmt = DB::getConnection()->prepare("UPDATE  administrators SET name=?, phone=?, email=?, password=?, image=?, role = ? where id = ?");
        $stmt->bind_param('isssssi',$this->id, $this->name, $this->phone, $this->email, password_hash($this->password, PASSWORD_DEFAULT), $this->image, $this->role );

        $stmt->execute();
        }
        
        public function count() {
		$connection = DB::getconn();
		if ($connection->errno) {echo $connection->error;die();}
		
		$result = $connection->query("SELECT * FROM admins");
	
		if ($result->num_rows > 0) {
			$count = $result->num_rows;
			echo json_encode($count);
		} else {
			echo "0";
		}	
	}
}

