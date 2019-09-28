<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Members'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">
    <h2>Members</h2>

    <div class="actions">
      <a class="action" href="#">Create New Member</a>
    </div>

<?php
  $members = [
    ['id' => '1', 'firstName' => 'Sarah', 'lastName' => 'Perkins', 'email' => 'sarahp@email.com'],
    ['id' => '2', 'firstName' => 'Bill', 'lastName' => 'Perkins', 'email' => 'billp@email.com'],
    ['id' => '3', 'firstName' => 'Daphne', 'lastName' => 'Cooper', 'email' => 'daphnec@email.com'],
    ['id' => '4', 'firstName' => 'Francis', 'lastName' => 'Moore', 'email' => 'francism@email.com'],
  ];
?>

  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
  	    <th>Email</th>
  	    <th></th>
  	    <th></th>
        <th></th>
  	  </tr>



      <?php foreach($members as $member) { ?>
        <tr>
          <td><?php echo h($member['id']); ?></td>
          <td><?php echo h($member['firstName']); ?></td>
          <td><?php echo $member['lastName']; ?></td>
    	    <td><?php echo h($member['email']); ?></td>
          <td><a class="action" href="<?php echo 
          url_for('/members/show.php?id=' . h(u($member['id']))); ?>">View</a></td>
          <td><?php echo "<a href='edit.php'>Edit</a>"; ?></td>
          <td><?php echo "<a href='delete.php'>Delete</a>"; ?></td>
    	  </tr>

      <?php }; ?>  
  	</table>

  </div>
 
 
<?php include(SHARED_PATH . '/footer.php'); ?>
