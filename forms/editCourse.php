<?php

     $html ='';
                      $html.= '<form action="api.php" method="POST"  enctype="multipart/form-data">
                <label for="name">Name<input name="name" type="text" value="'. $_GET['name'] .'" required></label>
                <label for="name">Description<input name="description" type="text" value="'. $_GET['description'] .'" required></label>
                    <img src="'.'../uploads/course/'. $_GET['image'] .'"' .'width="50px"'.'>
                <label for=""><input type="file" name="image" value="image"></label>
                 <input type="hidden" name="id" value="'. $_GET['id'] .'">
                <input type=hidden name="action" value="edit">
                <input type=hidden name="class_name" value="course">
                 <input type="submit" value="edit">
                    <input type="submit" name="delete" value="delete">
            </form>';
                 echo $html;   