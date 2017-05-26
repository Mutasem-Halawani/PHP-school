<?php

    $html ='';
                      $html.= '<form action="api.php" method="POST"  enctype="multipart/form-data">
                <label for="name">Name<input name="name" type="text" value="'. $_GET['name'] .'" required></label>
                <label for="phone">Phone<input name="phone" type="phone" value="'. $_GET['phone'] .'" required></label>
                <label for="email">Email<input name="email" type="text" value="'. $_GET['email'] .'" required></label>
                    <img src="'.'../uploads/student/'. $_GET['image'] .'"' .'width="50px"'.'>
                <label for=""><input type="file" name="image" ></label>
                <label for="course_id">english
                <input type="radio" name="course_id" value="1" checked="checked">
                </label>
                <label for="course">maths
                <input type="radio" name="course_id" value="2">
                </label>
                <label for="course">history
                <input type="radio" name="course_id" value="3">
                </label>
                <label for="course">biology
                <input type="radio" name="course_id" value="4">
                </label>
                <input type="hidden" name="id" value="'. $_GET['id'] .'">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="class_name" value="student">
                 <input type="submit" value="edit">
                    <input type="submit" name="delete" value="delete">
            </form>';
                 echo $html; 

