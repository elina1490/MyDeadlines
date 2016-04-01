<?php
require_once('header.php'); 
require_once('deadlines_fns.php');
session_start();

 check_valid_user();
 display_password_form();
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