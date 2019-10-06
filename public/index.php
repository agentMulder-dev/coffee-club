<?php 

require_once('../private/initialize.php');
$page_title = 'Main Menu';
include(SHARED_PATH . '/header.php');
?>
  
  <div id="content">
  <div id="main-menu">
    <h2>Main Menu</h2>
    <ul>
   <li><a href="<?php echo url_for('login.php'); ?>">Login</a></li>
     <!--  <li><a href="/web250/prj01/coffee-club/public/members/index.php">Member View -- contact information</a> 
</li> -->
    </ul>
  </div>

</div>


<?php include(SHARED_PATH . '/footer.php'); ?>
