<?php
  
  require_once('header.php'); 
 require_once('deadlines_fns.php');
 

//creating short variable name
 $username = $_POST['username'];

try{

  $password = reset_password($username);
 // notify_password($username, $password);
 // echo $password; 
  echo 'Your new password has been sent to your email address.';
   
 }
 catch(Exception $e){

 	echo 'Your password could not be reset - please try again later.';
 }
 
  do_html_url('login.php', 'Login');
  

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