<?php
require_once('../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  //$_SESSION['username'] = $username;

//Validations
/* if(is_blank($username)) {
  $errors[] = "Username cannot be blank.";
}
if(is_blank($password)) {
  $errors[] = "Password cannot be blank.";
} */

//if no errors, try login
  if(empty($errors)) {
    //one variable ensures msg is the same
    $login_failure_msg = "Log in was unsucceessful.";

    $member = find_member_by_username($username);
    if($member) {

        if(password_verify($password, $member['hashed_password'])) {
          //pw matches
          log_in_member($member);
          redirect_to(url_for('/index.php'));
        } else {
            //username found, but pw doesn't match
            $errors[] = $login_failure_msg;
        }
  } else {
    // no username found
    $errors[] = $login_failure_msg;
  }
  
}

}
?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">
  <h1>Log in</h1>

  <?php echo display_errors($errors); ?>

  <form action="login.php" method="post">
    Username:<br />
    <input type="text" name="username" value="<?php echo h($username); ?>" /><br />
    Password:<br />
    <input type="password" name="password" value="" /><br />
    <input type="submit" name="submit" value="Submit" />
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
