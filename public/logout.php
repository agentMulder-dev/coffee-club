<?php
require_once('../private/initialize.php');

//unset($_SESSION['username']);
log_out_member();

redirect_to(url_for('/login.php'));

?>
