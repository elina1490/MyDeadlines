<?php
require_once('header.php'); 
require_once('deadlines_fns.php');
session_start();

//create short variable names

$del_me = $_POST['del_me'];
$valid_user = $_SESSION['valid_user'];

check_valid_user();

    if (!filled_out($_POST)) 
    {
        echo '<p>You have not chosen any projects to delete.<br/>Please try again.</p>';
        exit;
    } 
    else 
    {
          if (count($del_me) > 0)
          {
              foreach($del_me as $project) 
              {
                if (delete_project($valid_user, $project)) 
                {
                    echo 'Deleted '.$project.'.<br />';
                } 
                else 
                {
                    echo 'Could not delete '.$project.'.<br />';
                }
              }     
          }
          else 
          {
              echo 'No projects selected for deletion';
          }
    }

    // get the bookmarks this user has saved
    $project_array = get_user_projects($valid_user);
    $date_array = get_user_dates($valid_user);

    
    if (($project_array) && ($date_array)) {
      display_user_projects($project_array,$date_array);
    
    }
/*
      // only offer the delete option if Project table is on this page
      global $project_table;
      if($project_table==true){
        echo "<a href=\"#\" onClick=\"project_table.submit();\">"."Delete Project</a>"; 
      }
      else
      {
        echo "<span style=\"color: #cccccc\">Delete Project</span>"; 
      }
*/
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