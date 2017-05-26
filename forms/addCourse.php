<?php

 $html ='';
                      $html.= '  <form action="api.php" method="POST"  enctype="multipart/form-data">
                <label for="name">Name<input name="name" type="text"></label>
                <label for="description">Description<input name="description" type="text"></label>
                <label for="">Image<input type="file" name="image"></label>
                <input type="hidden" name="id" value="">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="class_name" value="course">
                 <input type="submit" value="send">
            </form>';
                 echo $html; 