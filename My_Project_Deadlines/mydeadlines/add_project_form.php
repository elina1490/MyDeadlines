<?php
// include function files for this application
require_once('header.php'); 
require_once("deadlines_fns.php");
session_start();

// start output html

check_valid_user();
display_add_project_form();
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

