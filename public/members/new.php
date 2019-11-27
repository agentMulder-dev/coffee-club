<?php

require_once('../../private/initialize.php');

//$member_set = find_all_members();
//$member_count = mysqli_num_rows($member_set) + 1;
//mysqli_free_result($member_set);

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
  $member['email']= $_POST['email'] ?? '';
  $member['phone'] = $_POST['phone'] ?? '';
  $member['member_level'] = trim($_POST['member_level']) ?? '';
  $member['pass_hash']= $_POST['pass_hash'] ?? '';

  $result = insert_member($member);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/members/show.php?id=' . $new_id));
} else {
  $errors = $result;
}
  } else {
          echo '<h2>You are spammer ! Get the @$%K out</h2>';
  }



} else {
  //display the blank form
  $member = [];
  //$member['member_ID'] = '';
  $member['first_name'] = '';
  $member['last_name'] = '';
  $member['email']= '';
  $member['phone'] = '';
  $member['member_level'] = '';
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
        <dd><input type="text" name="first_name" value="" /></dd>
      </dl>
    
      <dl>
        <dt>Last Name</dt>
        <dd><input type="text" name="last_name" value="" /></dd>
      </dl>

      <dl>
        <dt>Email</dt>
        <dd><input type="text" name="email" value="" /></dd>
      </dl>

      <dl>
        <dt>Phone</dt>
        <dd><input type="tel" name="phone" value="" /></dd>
      </dl>
      <dl>
        <dt>Member Level</dt>
        <dd><input type="text" name="member_level" value="" /></dd>
      </dl>

      <dl>
        <dt>Password</dt>
        <dd><input type="password" name="pass_hash" value="" /></dd>
      </dl>
      
      <div id="operations">
      <div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY;?>"></div> 
      <input type="submit" value="Create Member" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
