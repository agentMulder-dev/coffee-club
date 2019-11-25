<?php

require_once('../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/members/index.php'));
}
$member_ID = $_GET['id'];

if(is_post_request()) {

  // Handle form values sent by new.php

  $member = [];
  $member['member_ID'] = $member_ID;
  $member['first_name'] = $_POST['first_name'] ?? '';
  $member['last_name'] = $_POST['last_name'] ?? '';
  $member['email'] = $_POST['email'] ?? '';
  $member['phone'] = $_POST['phone'] ?? '';
  $member['member_level'] = $_POST['member_level'] ?? '';
  $member['pass_hash'] = $_POST['pass_hash'] ?? '';
 
  $result = update_member($member);
  if($result === true) {
  redirect_to(url_for('/members/show.php?id=' . $member_ID));
} else {
  $errors = $result;
  //var_dump($errors);
}

} else {

  $member = find_member_by_member_ID($member_ID);

}

$member_set = find_all_members();
$member_count = mysqli_num_rows($member_set);
mysqli_free_result($member_set);

?>

<?php $page_title = 'Edit Member'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/members/index.php'); ?>">&laquo; Back to List</a>

  <div class="member edit">
    <h1>Edit Member</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/members/edit.php?id=' . h(u($member_ID))); ?>" method="post">
    
      
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
        <dd><input type="text" name="phone" value="<?php echo h($member['phone']); ?>" />
        </dd>
      </dl>

      <dl>
        <dt>Member Level</dt>
        <dd><input type="text" name="member_level" value="<?php echo h($member['member_level']); ?>" />
        </dd>
      </dl>

      <dl>
        <dt>Password</dt>
        <dd><input type="text" name="pass_hash" value="<?php echo h($member['pass_hash']); ?>" />
        </dd>
      </dl>
  
     
      <div id="operations">
        <input type="submit" value="Edit Member" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
