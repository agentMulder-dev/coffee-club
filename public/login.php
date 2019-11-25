<?php

require_once('../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';


    if(is_blank($email) || is_blank($password))
    {
      $errors[] =  "Email or password cannot be blank";
    }

    if(empty($errors)) {

      // get the member
      $member = find_member_by_email($email);

        if(password_verify($password, $member['pass_hash'])) {
          echo "made it to password verify"; 
          
          // password matched
            loginMember($member);
            redirect_to(url_for('/members/'));
        }
    
        else {
       
         $errors[] =  "Email found but password does not match";
        }
      }
    
      else {
        $errors[] =  "No member found";
      }
  }
  


$page_title = 'Login';
include(SHARED_PATH . '/header.php'); 

?>

<div id="content">
    <h1>Coffee Club Login</h1>
     <!-- TODO: update form for validation -->
    
    <?php // echo display_errors($errors); ?>

     <form action="" method="post">
        email: <input type="text" name="email"><br>
        password: <input type="password" name="pass_hash"><br>
        <input type="submit" name="submit" value="Submit"  />
    </form>
</div>

</body>
</html>
