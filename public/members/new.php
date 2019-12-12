<?php

require_once('../../private/initialize.php');

require_login();

if(is_post_request()) {
 
  $captcha;
 
  if(isset($_POST['g-recaptcha-response'])){
    $captcha=$_POST['g-recaptcha-response'];
  }
  if(!$captcha){
    echo '<h2>Please check the the captcha form.</h2>';
    exit;
  }
  $secretKey = SECRET_KEY;
  $ip = $_SERVER['REMOTE_ADDR'];
  // post request to server
  $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
  $response = file_get_contents($url);
  $responseKeys = json_decode($response,true);
  // should return JSON with success as true
  if($responseKeys["success"]) {
          

  $member = [];
  //$member['member_ID'] = $_POST['member_ID'] ?? '';
  $member['first_name'] = $_POST['first_name'] ?? '';
  $member['last_name'] = $_POST['last_name'] ?? '';
  $member['email'] = $_POST['email'] ?? '';
  $member['phone'] = $_POST['phone'] ?? '';
  $member['username'] = $_POST['username'] ?? '';
  $member['member_level'] = $_POST['member_level'] ?? '';
  $member['password'] = $_POST['password'] ?? '';
  $member['confirm_password'] = $_POST['confirm_password'] ?? '';

  $result = insert_member($member);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'The member was created successfully.';
    redirect_to(url_for('/members/show.php?id=' . $new_id));
} else {
  $errors = $result;
}
  } 
  
} else {
  //display the blank form
  $member = [];
  //$member['member_ID'] = '';
  $member['first_name'] = '';
  $member['last_name'] = '';
  $member['email']= '';
  $member['phone'] = '';
  $member['username'] = '';
  $member['member_level'] = '';
  $member['password'] = '';
  $member['confirm_password'] = '';
}

?>

<?php $page_title = 'Create Member'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/members/index.php'); ?>">&laquo; Back to List</a>

  <div class="member new">
    <h1>Create Member</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/members/new.php'); ?>" method="post">


      <dl>
        <dt>First Name</dt>
        <dd><input type="text" name="first_name" value="<?php echo h($member['first_name']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Last Name</dt>
        <dd><input type="text" name="last_name" value="<?php echo h($member['last_name']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Email</dt>
        <dd><input type="text" name="email" value="<?php echo h($member['email']); ?>" />
        </dd>
      </dl>

      <dl>
        <dt>Phone</dt>
        <dd><input type="tel" name="phone" value="<?php echo h($member['phone']); ?>" />
        </dd>
      </dl>

      <dl>
        <dt>Username</dt>
        <dd><input type="text" name="username" value="<?php echo h($member['username']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Member Level</dt>
        <dd><input type="text" name="member_level" value="<?php echo h($member['member_level']); ?>" />
        </dd>
      </dl>

      <dl>
        <dt>Password</dt>
        <dd><input type="password" name="password" value="" /></dd>
      </dl>

      <dl>
        <dt>Confirm Password</dt>
        <dd><input type="password" name="confirm_password" value="" /></dd>
      </dl>
      <p>
        Passwords should be at least 12 characters and include at least one uppercase letter, lowercase letter, number,
        and symbol.
      </p>
      <br />

      <div id="operations">
        <div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY;?>"></div>
        <input type="submit" value="Create Member" />
      </div>
    </form>
  </div>
</div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
