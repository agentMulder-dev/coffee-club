<?php require_once('../../private/initialize.php'); ?>

<?php
  $member_set = find_all_members();
?>
<?php $page_title = 'Members'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">
  <div class="members listing">
    <h1>Members</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/members/new.php'); ?>">Create New Member</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>Member ID</th>
        <th>First Name</th>
        <th>Last Name</th>
  	    <th>Email</th>
  	    <th>Phone</th>
        <th>Member Level</th>
  	    <th></th>
  	    <th></th>
        <th></th>
        <th></th>
  	  </tr>

      <?php while($member = mysqli_fetch_assoc($member_set)) { ?>
        <tr>
          <td><?php echo h($member['member_ID']); ?></td>
          <td><?php echo h($member['first_name']); ?></td>
          <td><?php echo h($member['last_name']); ?></td>
    	    <td><?php echo h($member['email']); ?></td>
          <td><?php echo h($member['phone']); ?></td>
          <td><?php echo h($member['member_level']); ?></td>
    	   
         
          <td><a class="action" href="<?php echo url_for('/members/show.php?id=' . h(u($member['member_ID']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/members/edit.php?id=' . h(u($member['member_ID']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/members/delete.php?id=' . h(u($member['member_ID']))); ?>">Delete</a></td>
    	  </tr>
      <?php }; ?>  
  	</table>
    
    <?php
      mysqli_free_result($member_set);
    ?>
  </div>
 
 
<?php include(SHARED_PATH . '/footer.php'); ?>
