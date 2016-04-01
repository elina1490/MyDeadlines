<?php
 require_once('header.php'); 
 require_once("deadlines_fns.php");
 session_start();

    //create short variable name
    $new_project = $_POST['new_project'];
    $new_date = $_POST['new_date'];


 try{
 check_valid_user();

     if (!filled_out($_POST))
     {
          throw new Exception('Form not completely filled out.');

     }

       // try to add project
       add_project($_SESSION['valid_user'],$new_project, $new_date);
      // echo "Project added.";

    // get the projects this user has saved
    $project_array = get_user_projects($_SESSION['valid_user']);
    $date_array = get_user_dates($_SESSION['valid_user']);

   if (($project_array) && ($date_array)) {
   display_user_projects($project_array,$date_array);
  // echo "Nice12";
    }
}
catch (Exception $e) 
{
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
