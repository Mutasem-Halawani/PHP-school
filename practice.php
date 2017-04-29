<?php

function printAll($subject, $rows) {
    $html = '<ul>';
    for ($i=0, $count = count($rows); $i < $count; $i++) {
        $html .= '<li>';
        $href = '<a href="edit.php?subject=' . $subject;
        $text = '';
        foreach ($rows[$i] as $key => $value) {
            $href .= '&' . $key . '=' . $value;
            $text .= $key . ': ' . $value . ';';
        }
        $href .= '">';
        $html .= $href . $text . '</a></li>';
    }
    $html .= '</ul>';
    echo $html;
}

abstract class Person implements ISavable {
	protected $name;
	protected $age;
	protected $id;
	protected $height;
	private static $conn;
	
	function __construct($name, $age, $id, $height) {
		$this->name = filter_var($name, FILTER_SANITIZE_STRING);
		$this->age = filter_var($this->checkAge($age) ? $age : 0, FILTER_SANITIZE_NUMBER_INT);
		$this->id = filter_var($id, FILTER_SANITIZE_STRING);
		$this->height = filter_var($height, FILTER_SANITIZE_NUMBER_INT);
		self::connect();
	}

	

	private static function connect() {
		self::$conn = new mysqli('localhost', 'root', '', 'crazy_db');
		if (self::$conn->errno) {
			echo self::$conn->error;
			die();
		}
	}

	public static function selectAll($table_name) {
		$result = self::$conn->query("SELECT * FROM $table_name limit 1000");
		$rows = [];
		while ($row = $result->fetch_assoc()) {
			$rows []= $row;
		}
		return $rows;
	}

	public static function printAll($rows) {
		$html  = '<ul>';
		for ($i=0, $count = count($rows); $i < $count; $i++) { 
			$html .= '<li>';
			foreach ($rows[$i] as $key => $value) {
				$html .= $key . ': ' . $value . ',';
			}
			$html .= '</li>';
		}
		$html .= '</ul>';
		echo $html;
	}
}