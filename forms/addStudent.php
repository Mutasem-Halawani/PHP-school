<?php

      $html ='';
                      $html.= '    <form action="api.php" method="POST"  enctype="multipart/form-data">
                 <label for="name">Name<input name="name" type="text"></label>
                <label for="phone">Phone<input name="phone" type="tel"></label>
                <label for="email">Email<input name="email" type="text"></label>
                <label for="">Image<input name="image" type="file" value="image"></label>
                <input type="hidden" name="id" value="">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="class_name" value="student">
                <input type="submit" value="send">
            </form>';
                 echo $html; 
                 Course::show();
                 