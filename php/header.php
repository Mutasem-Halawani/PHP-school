<?php

$html='';
$html .= '
         <header>
             <div class="left-menu-items">
                <img id="logo" width="50"src="https://userscontent2.emaze.com/images/5d77f24d-41bd-463a-8fdd-a6f9351e5df5/bbaa6e381bd537550e14ef781525cc5e.gif">
                <a class="left-menu-links" href="school.php" >School</a>';

               // if ($_SESSION["role"] != "sales"){
              $html .= '  <a class="left-menu-links" href="admin.php" >Administration</a> ';
               // }
                
          $html .= ' </div>
            <div class="logged-in-user-info">
                <span>'. $_SESSION["name"] . '</span>   
                <a href="../php/Logout.php">Logout</a>
            <img id="logged-in-user-img" width="50"src="">
            </div>
         </header>
         <hr>';
         
      echo $html;