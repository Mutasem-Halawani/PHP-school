<?php

include 'interface.php';
abstract class Person{
    protected $id;
    protected $name;
    protected $phone;
    protected $email;
    // protected $image;  //a string which will  be a link to the image file
    
    public function __construct($id,$name,$phone,$email) {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
    }
    
    public function save() {}
	public function edit() {}
	public function delete() {}
        
//    public function uploadPic($imageRawData) {
//		$uploadfile = 'uploads/' . basename($_FILES['ad_image']['name']);
//		move_uploaded_file($_FILES['ad_image']['tmp_name'], $uploadfile);
//		return $_FILES['image']['name'];
//	}
}