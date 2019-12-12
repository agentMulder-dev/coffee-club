<?php 
require_once('../../private/initialize.php');

require_login();

$member_ID = $_GET['id'] ?? ''; 
$member = find_member_by_member_ID($member_ID);

?>

<?php $page_title = 'Show Member'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/members/index.php'); ?>">&laquo; Back to List</a>

  <div class="member show">

    <h1>Member: <?php echo h($member['member_ID']); ?></h1>


    <div class="attributes">
      <dl>
        <dt>First Name</dt>
        <dd><?php echo h($member['first_name']); ?></dd>
      </dl>
      <dl>
        <dt>Last Name</dt>
        <dd><?php echo h($member['last_name']); ?></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><?php echo h($member['email']); ?></dd>
      </dl>
      <dl>
        <dt>Phone</dt>
        <dd><?php echo h($member['phone']); ?></dd>
      </dl>
      <dl>
        <dt>Username</dt>
        <dd><?php echo h($member['username']); ?></dd>
      </dl>
      <dl>
        <dt>Member Level</dt>
        <dd><?php echo h($member['member_level']); ?></dd>
      </dl>
    </div>

  </div>

  <?php include(SHARED_PATH . '/footer.php'); ?>
