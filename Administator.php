<?php

class Administrator extends Person implements ISavable {
	private static $tableName = 'administrators';
	private static $picturePrefix = 'img/student_img';

	function __construct($id, $name, $picture) {
		$this->id = $id;
		$this->name = $name;
		$this->picture = $picture;
	}

	public function save() {}
	public function edit() {}
	public function delete() {}

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

