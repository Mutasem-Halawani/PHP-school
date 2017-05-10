<?php

class DB {
	
	public static $conn;
	public static function connect() {
		if (!self::$conn) {
			self::$conn = new mysqli('localhost', 'root', '', 'school');
		}
		return self::$conn;
	}
}
