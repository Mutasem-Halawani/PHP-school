<?php
//session_start();
include_once  'DB.php';
include_once 'Person.php';

class Administrator extends Person{
    public $id;
    public $name;
    public $phone;
    public $email;
    public $password;  
    public $image;
    public $role_id;
    
	function __construct($id, $name, $phone ,$email, $password, $image,$role_id) {
            $this->id= $id;
            $this->name = $name;
            $this->phone = $phone;
            $this->phone = $email;
            $this->password = $password;
            $this->image = $image;
            $this->role_id = $role_id;
            }

	public function save() {
           $conn = DB::get_instance()->get_connection();
        if ($conn->errno) {echo $conn->error; die();}
        
        $stmt = $conn->prepare("INSERT INTO administrators (name, phone,"
                . " email, password, image, role_id) VALUES (?, ?, ?, ?, ?, ?)");
		$stmt->bind_param('sssssi', $this->name, $this->phone,
                        $this->email, $this->image, $this->password,$this->role_id);
                
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
            $image_prefix = "../uploads/admin/";
             $html = '<ul>';
                         
                 $html .= '<a href="admin.php?action=edit&class_name=admin&id='. $row["id"].
                         '&name=' . $row["name"]. '&phone=' . $row["phone"].'&email=' . $row["email"] . '&image=' .$row["image"] . '&role_id=' .$row["role_id"] .'"> 
                         <li class="list-item">
                             <img width="50" src="'. $image_prefix . $row["image"] .'" alt="" class="small-icon">
                             <p>' . $row["name"]. '</p>
                             <p>' . $row["email"] .'</p>
                         </li>
                     </a>';
                 $html .='</ul>';
                 echo $html;
        }
        }
        

        public function delete() {
       $conn = DB::get_instance()->get_connection();
        if ($conn->errno) {echo $conn->error; die();}
        
        $result = $conn->query("DELETE FROM administrators WHERE id = '$this->id'");
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

         public static function select_row($id){
           $conn = DB::get_instance()->get_connection();
        if ($conn->errno) {echo $conn->error; die();}
        $result = $conn->query("SELECT FROM administrators WHERE id = $id");
		return $result;
    }

	public static function printList() {
		$rows = self::selectAll();

		$html  = '';
		for ($i=0, $count = count($rows); $i < $count; $i++) {
			$html .= "<a href='?page=students&action=edit&id={$rows[$i]->id}'>";
			$html .= "<img src='" . self::$picturePrefix . "/{$rows[$i]->picture}'>";
			$html .= "<span>{$rows[$i]->name}</span>";
			$html .= "<span style>{$rows[$i]->name}</span>";
			$html .= '</a>';
		}
		return $html;
	}
        
        public function edit() {
                $conn = DB::get_instance()->get_connection();
        if ($conn->errno) {echo $conn->error; die();}
//            print_r($this);
            $stmt = $conn->prepare("UPDATE  administrators SET name=?, phone=?, email=?,  image=?, role_id = ? where id = ?");
        $stmt->bind_param('ssssii', $this->name, $this->phone, $this->email,$this->image, $this->role_id,$this->id );

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

