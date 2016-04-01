<?php
require_once("db_fns.php");

//session_start();

//-----------------get_user_projects()------------------------------

function get_user_projects($username)
{
  //extract from the database all the URLs this user has stored
  $conn = db_connect();
  $result = $conn->query( "select project_name
                          from projects
                          where username = '".$username."'");

  if (!$result)
  {
    return false; 
  }

  //create an array of the projects
  $project_array = array();
//  $date_array = array();
  for ($count = 1; $row = $result->fetch_row(); ++$count) 
  {
    $project_array[$count] = $row[0];
   
  }  
  return $project_array;
  
}

//-----------------get_user_dates()------------------------------

function get_user_dates($username)
{
  //extract from the database all the URLs this user has stored
  $conn = db_connect();
  $result = $conn->query( "select project_date
                          from projects
                          where username = '".$username."'");

  if (!$result)
  {
    return false; 
  }

  //create an array of the dates
 
  $date_array = array();
  for ($count = 1; $row = $result->fetch_row(); ++$count) 
  {
    
    $date_array[$count]= $row[0];
  }  
  return $date_array;
  
}


//---------------------------add_project()---------------------------

function add_project($username,$new_project,$new_date)
{
       //add project to the databse
        echo "Attempting to add ".$new_project."<br />";
        echo "Attempting to add ".$new_date."<br />";
        $conn=db_connect();

        try
        {
            //add the project
            $query="insert into projects values('".$username."','".$new_project."','".$new_date."')";
            $result=$conn->query($query);
            if(!$result)
            {
                throw new Exception("Can not add project now, Please try again later!");
            }
            else
            {
                echo "Add project successfully!";
            }
        }
        catch(Exception $err)
        {
            echo $err->getMessage();
        }
}

//------------------------------------delete_project()------------------------

function delete_project($user, $project_name)
{
  // delete one URL from the database
    $conn = db_connect();

   // delete the bookmark
  if (!$conn->query( "delete from projects where username='".$user."' and project_name='".$project_name."' "))
  {
      throw new Exception('Project could not be deleted');
  }
  return true;  
}


     ?>