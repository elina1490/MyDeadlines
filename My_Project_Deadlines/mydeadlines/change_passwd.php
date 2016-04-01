<?php
require_once('header.php'); 
require_once('deadlines_fns.php');
session_start();

//create short variable names
 $old_passwd = $_POST['old_passwd'];
 $new_passwd = $_POST['new_passwd'];
 $new_passwd2 = $_POST['new_passwd2'];

try{

 check_valid_user();

if (!filled_out($_POST))
   {
      throw new Exception('You have not filled out the form completely. Please try again.');
   }

if ($new_passwd!=$new_passwd2)
  {
        throw new Exception('Passwords entered were not the same.Not changed.');
        echo "passwords";
  }

       
if (strlen($new_passwd)>16 || strlen($new_passwd)<6)
  {
        throw new Exception('New password must be between 6 and 16 characters. Try again.');
  }

    
  // attempt update

       change_password($_SESSION['valid_user'], $old_passwd, $new_passwd);
       echo "Password changed.";
       
  }
  catch(Exception $e){

       echo $e->getMessage();
   }

   display_user_menu(); 


?>
</div>
</div>
</div>
<!-- /.container -->
</div>
</div>

<?php
footer();
?>
</body>
</html>