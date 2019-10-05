<?php require_once('../../private/initialize.php');

// $id = $_GET['id'] ? $_GET['id'] : '1';
$memberID = $_GET['id'] ?? '1'; 

$page_title = 'Show Member Page';

include(SHARED_PATH . '/header.php');

?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/members/index.php'); ?>">&laquo; Back to List</a>

  <div class="page show">
    Page ID: <?php echo h($memberID); ?>
  </div>

</div>


<?php include(SHARED_PATH . '/footer.php'); ?>
