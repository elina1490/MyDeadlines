<?php

// include function files for this application

require_once('header.php');
require_once('deadlines_fns.php'); 
session_start();

//create short  variable names
 $username = $_POST['username'];
 $passwd = $_POST['passwd'];

if ($username && $passwd)
{

// they have just tried logging in
try{

   login($username, $passwd);
      // if they are in the database register the user id
       $_SESSION['valid_user'] = $username;
  }

  catch(Exception $e) {

    // unsuccessful login
   
    echo "Problem.";
    echo 'You could not be logged in. You must be logged in to view this page.';
    do_html_url('login.php', 'Login');
    
    exit;
  }
}     
    

  check_valid_user();

  // get the projects this user has saved
  $project_array = get_user_projects($_SESSION['valid_user']) ; 

  // get the dates this user has saved
  $date_array = get_user_dates($_SESSION['valid_user']);
  

if (($project_array) && ($date_array)) {
  display_user_projects($project_array,$date_array);
   //echo "Nice12";
}
  // give menu of options
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
