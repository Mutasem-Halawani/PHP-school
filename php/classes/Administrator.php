<?php

include 'DB.php';
include 'Person.php';

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
            $conn = DB::connect();
    if ($conn->errno) {
        echo $conn->error;
        die();
    }
        }
        
        public function print_all(){
             $conn = DB::connect();
    if ($conn->errno) {
        echo $conn->error;
        die();
    }
    
        $result = $conn->query("SELECT * FROM administrators");
        $rows = [];
        
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        print_r($rows);
        }
	public function edit() {
            $conn = DB::connect();
    if ($conn->errno) {
        echo $conn->error;
        die();
    }
        }
	public function delete() {
            $conn = DB::connect();
    if ($conn->errno) {
        echo $conn->error;
        die();
    }
        }

	private static function selectAll() {
		echo ucfirst(self::$tableName);
		$result = DB::getConnection()->query("SELECT * FROM " . self::$tableName . " limit 1000");
		$rows = [];
		while ($row = $result->fetch_assoc()) {
			$rows []= new self($row['id'], $row['name'], $row['picture']);
		}
		return $rows;
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
}

