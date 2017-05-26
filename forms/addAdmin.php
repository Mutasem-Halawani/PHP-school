<?php 

$html ='';
                      $html.= '<form action="api.php" method="POST"  enctype="multipart/form-data">
                <label for="name">Name<input name="name" type="text" required></label>
                <label for="email">Email<input name="email" type="email" required></label>
                <label for="phone">Phone<input name="phone" type="tel" required></label>
                <label for="password">Password<input name="password" type="password" required></label>
                <label for="role_id" required>Role
                    <select name="role_id">
                        <option value="1">admin</option>
                        <option value="2">Sales</option>
                    </select>
                </label>
                <label for="image">Choose image<input type="file" name="image" value=""></label>
                 <input type="hidden" name="id" value="">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="class_name" value="admin">
                 <input type="submit" value="add">
            </form>';
                 echo $html; 