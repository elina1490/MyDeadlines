
                            <?php
                            function header_info()
                            {
                              // print an HTML header
                            ?>  
                            <h1>MyDeadlines</h1>
                            <h3>Tsakalidou Elina</h3>
                              <hr class="intro-divider">
                                <ul class="list-inline intro-social-buttons">
                                  <!--
                                 <li>
                                <a href="https://bitbucket.org/elina1490/" class="btn btn-default btn-lg">
                                <i class="fa fa-bitbucket fa-fw"></i> <span class="network-name">Bitbucket</span></a>
                                </li>-->
                                <li>
                                <a href="https://github.com/elina1490" class="btn btn-default btn-lg">
                                <i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                                </li>
                                <li>
                                <a href="https://www.linkedin.com/in/elina-tsakalidou-a0428a5a?trk=hp-identity-name" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw">
                                </i> <span class="network-name">Linkedin</span></a>
                                </li>
                                </ul>  
                            <?php
                           }
                           ?>

                            <?php

                    function login_form()
                    {
                    ?>
                     <h3><a href="register_form.php">Not a member?</a><h3/>
                      <form method="post" action="member.php">
                      <table bgcolor="#gfsdgf" align ="center" background-color="#f5f5f5">
                       <tr>  
                         <td colspan="2">Members log in here:</td>
                       </tr>
                       <tr>
                         <td>Username:</td>
                         <td style="color:#396a93"><input type="text" name="username"></td>
                       </tr>
                       <tr>
                         <td>Password:</td>
                         <td style="color:#396a93"><input type="password" name="passwd"></td>
                      </tr>
                       <tr>
                         <td colspan="2" align="center" style="color:#396a93">
                         <input type="submit" value="Log in"></td>
                     </tr>
                       <tr>
                         <td colspan="2"><a href="forgot_form.php">Forgot your password?</a></td>
                       </tr>
                     </table>
                    </form>

                    <?php
                    }
                    
                    
                    function registration_form()
                    {
                    ?>
                    <form method="post" action="register_new.php">
                     <table bgcolor="#cccccc" align="center">
                       <tr>
                           <td>Email address:</td>
                           <td style="color:#396a93"><input type="text" name="email" size="30" maxlength="100">
                           </td>
                       </tr>
                       <tr>
                           <td>Preferred username <br>(max 16 chars):</td>
                           <td valign="top" style="color:#396a93"><input type="text" name="username" size="16" maxlength="16">
                           </td>
                      </tr>
                       <tr>
                           <td>Password <br />(between 6 and 16 chars):</td>
                           <td valign="top" style="color:#396a93"><input type="password" name="passwd" size="16" maxlength="16">
                          </td>
                      </tr>
                       <tr>
                            <td>Confirm password:</td>
                            <td style="color:#396a93"><input type="password" name="passwd2" size="16" maxlength="16">
                            </td>
                       </tr>
                       <tr>
                            <td colspan="2" align="center" style="color:#396a93">
                            <input type="submit" value="Register">
                            </td>
                       </tr>
                     </table>
                    </form>

                    <?php
                    }
                    ?>

                    <?php

                  //--------------------display_user_projects------------------------

                    function display_user_projects($project_array,$date_array)
                    {
                      //display the table of Projects
                      // set global variable, so we can test later if this is on the page
                      global $project_table;
                      $project_table = true;

                    ?>

                      <br />
                       <h3>Display Projects.</h3>
                      <form name="project_table" action="delete_projects.php" method="post">
                      <table width="300" cellpadding="2" cellspacing="0" align="center">
                      <?php

                          $color = "#cccccc";
                          $color1 = "#396a93";
                          echo "<tr bgcolor=\"$color\">"
                          ."<td style=\"$color1\"><strong>Project</strong></td>"
                          ."<td style=\"$color1\"><strong>Deadline</strong></td>"
                          ."<td style=\"$color1\"><strong>Delete?</strong></td></tr>";

                      if ( (is_array($project_array) && count($project_array)>0) && (is_array($date_array) && count($date_array>0)) )
                      {
                          //$project = count($project_array);
                          //$date   = count($date_array);
                              
                        foreach ( $project_array  as $project ) 
                          
                        
                          foreach ($date_array as  $date) 
                        {
                      
                          echo "<tr bgcolor=\"$color\">"
                          ."<td style=\"$color1\">" .$project. "</a></td>" 
                          ."<td style=\"$color1\">" .$date. "</a></td>"
                          ."<td style=\"$color1\"><input type=\"checkbox\" name=\"del_me[]\" "
                          ."value=\"$project\"></td></tr>";
                            
                        
                         } 
                        }
                       else{
                        echo "<tr><td>No Projects on record</td></tr>";
                      }
                    ?>
                      </table> 
                      </form>

                   <?php
                    }
                    

                    //-----------------------------dispaly_add_project_form()---------------------

                    function display_add_project_form()
                    {
                      // display the form for people to ener a new bookmark in
                    ?>
                    <h3>Adding Projects.</h3>
                    <form name="project_table" action="add_projects.php" method="post">
                    <table width="250" cellpadding="2" cellspacing="0" align ="center"> 
                    <tr>
                        <td>New Project:</td>
                        <td style="color:#396a93"><input type="text" name="new_project"  size="30" maxlength="255"></td>
                    </tr></font>
                      <tr>
                        <td >Date:</td>
                        <td style="color:#396a93"><input type="date" name="new_date"  size="30" maxlength="255"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" style="color:#396a93"><input type="submit" value="Add Project"></td>
                    </tr>
                    </table>
                    </form>

                    <?php
                    }


                    //---------------------------display_forgot_form()---------------------

                    function display_forgot_form()
                    {
                      // display HTML form to reset and email password
                    ?>
                          <h3>Forgot Password.</h3>
                       <form action="forgot_passwd.php" method="post">
                       <table width="250 "cellpadding="2" cellspacing="0" bgcolor="#cccccc" align="center">

                       <tr>
                           <td>Enter your username</td>
                           <td style="color:#396a93"><input type="text" name="username" size="16" maxlength="16"></td>
                       </tr>
                       <tr>
                            <td colspan="2" align="center" style="color:#396a93"><input type="submit" value="Change password">
                            </td>
                       </tr>
                      </table>
                       <br />
                       </form>
                       
                    <?php
                    }

                  //--------------------------display_user_menu----------------------

                  
                    function display_user_menu()
                    {
                      // display the menu options on this page
                    ?>
                    <hr/>
                    <a href="index.php">Home</a> &nbsp;|&nbsp;
                    <a href="add_project_form.php">Add Project</a> &nbsp;|&nbsp; 
                        <?php

                          // only offer the delete option if bookmark table is on this page
                          global $project_table;
                          if($project_table==true){
                            echo "<a href=\"#\" onClick=\"project_table.submit();\">"."Delete Project</a>&nbsp;|&nbsp;"; 
                          }
                          else
                          {
                            echo "<span style=\"color: #cccccc\">Delete Project</span>&nbsp;|&nbsp;"; 
                          }

                        ?>
                    <a href="change_passwd_form.php">Change password</a>
                    <br />
                    <a href="logout.php">Logout</a> 
                    <hr>

                    <?php
                    }
                     
                //-----------------dispaly_password_form()-----------------------------

                function display_password_form()
                {
                  // display html change password form
                ?>
                   <br />
                   <form action="change_passwd.php" method="post">
                   <table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc" align="center">
                 
                       <tr>
                           <td>Old password:</td>
                           <td style="color:#396a93"><input type="password" name="old_passwd" size="16" maxlength="16"></td>
                       </tr>
                       <tr>
                           <td>New password:</td>
                           <td style="color:#396a93"><input type="password" name="new_passwd" size="16" maxlength="16"></td>
                       </tr>
                       <tr>
                           <td>Repeat new password:</td>
                           <td style="color:#396a93"><input type="password" name="new_passwd2" size="16" maxlength="16"></td>
                       </tr>
                       <tr>
                           <td colspan="2" align="center" style="color:#396a93"><input type="submit" value="Change password">
                          </td>
                       </tr>

                   </table>
                   <br />
                 </form>
                <?php
                }
                    
                    //----------------------do_html_url------------------------------

                    function do_html_url($url, $name)
                    {
                      // output URL as link and br
                    ?>
                      <br /><h3><a href="<?php echo $url; ?>"><?php echo $name; ?></a></h3><br />
                    <?php
                    }


function content_a()
{
?>
<a  name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">About me.</h2>
                     <p class="lead">A hardworking graduate developer with a strong academic background and some commercial experience. 
                     A conscientious, fast learner offering the ability to assess an organization’s needs and create a complementary, robust web presence. 
                     Experienced in all basic stages of the web development process including: information gathering, planning, design, development, testing and delivery and maintenance. 
                     A confident communicator, I am comfortable working either independently or as part of a team.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="img/elina.jpg" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>

<?php
}

function content_b()
{
?>
    <div class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">The Department of Information and Communication Systems Engineering</h2>
                    <p class="lead">The Department of Information and Communication Systems Engineering of the
University of the Aegean <a href="www.icsd.aegean.gr">www.icsd.aegean.gr</a>,
 has as main goal, the training of engineers
with a high level of education, creative and critical spirit, able to analyze problems
Department of Information and Communications Systems Engineering
Undergraduate Program Guide 2014-2015 15
and take advantage of modern Information and Communication Technologies for the
design, development and management of information and communication systems. The Department of Information and Communication Systems Engineering of the
University of the Aegean adopts the above concept as to the nature of information and
communication systems. An information system is a system that is able to receive, store,
retrieve and process information. It is an organized set of separate interacting components:
people, processes, data, software and hardware. </p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="img/flag2.jpg" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>

<?php
}

function  banner(){
?>
    <a  name="contact"></a>
    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <h2></h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                                               
                         <li>
                                <a href="https://github.com/elina1490" class="btn btn-default btn-lg">
                                <i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                                </li>
                        <li>
                            <a href="https://www.linkedin.com/in/elina-tsakalidou-a0428a5a?trk=hp-identity-name" class="btn btn-default btn-lg">
                                <i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
    <!-- /.banner -->
<?php
}

function footer()
{
?>
 <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="index.php">About</a>
                        </li>

                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Elina Tsakalidou 2016</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
<?php
}
?>

