<?php

              $html ='';
                      $html.= '<form action="api.php" method="POST"  enctype="multipart/form-data">
                <label for="name">Name<input name="name" type="text" value="'. $_GET['name'] .'" required></label>
                <label for="phone">Phone<input name="phone" type="tel" value="'. $_GET['phone'].'"required></label>
                <label for="email">Email<input name="email" type="text" value="'. $_GET['email'].'" required></label>
                <label for="role" required>Role
                    <select name="role_id">
                        <option value="1">admin</option>
                        <option value="2">Sales</option>
                    </select>
                </label>
                <img src="'.'../uploads/admin/'. $_GET['image'] .'"' .'width="50px"'.'>
                <label for="image"><input name="image" type="file" value="'. $_GET['image'].'"></label>
                <input name="password" type="hidden" value=""></label>
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="class_name" value="admin">
                <input type="hidden" name="id" value="'.$_GET['id']. '">
                <input type="hidden" name="role_id" value="'.$_GET['role_id']. '">
                 <input type="submit" name="edit" value="edit">
                 <input type="submit" name="delete" value="delete">
            </form>';
                   
                 echo $html;  