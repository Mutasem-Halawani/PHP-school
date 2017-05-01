<?php 

interface CRUD {
	function save();
	function edit();
	function delete();
	public static function printList();
}