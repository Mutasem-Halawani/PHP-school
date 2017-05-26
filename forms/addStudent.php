<?php

      $html ='';
                      $html.= '    <form action="api.php" method="POST"  enctype="multipart/form-data">
                <label for="name">Name<input name="name" type="text"></label>
                <label for="phone">Phone<input name="phone" type="tel"></label>
                <label for="email">Email<input name="email" type="text"></label>
                <label for="">Image<input name="image" type="file" value="image"></label>
                <label for="course_id">english
                <input type="radio" name="course_id" value="1" checked="checked">
                </label>
                <label for="course_id">maths
                <input type="radio" name="course_id" value="2">
                </label>
                <label for="course_id">history
                <input type="radio" name="course_id" value="3">
                </label>
                <label for="course_id">biology
                <input type="radio" name="course_id" value="4">
                </label>
                <input type="hidden" name="id" value="">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="class_name" value="student">
                <input type="submit" value="send">
            </form>';
                 echo $html;   