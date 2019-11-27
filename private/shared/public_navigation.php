<?php
  // Default values to prevent errors
  $member_ID = $member_ID ?? '';
?>

<navigation>
  <?php $nav_members = find_all_members(); ?>
  <ul class="members">
    <?php while($nav_members = mysqli_fetch_assoc($nav_members)) { ?>
      <li class="<?php if($nav_members['id'] == $member_ID) { echo 'selected'; } ?>">
        <a href="<?php echo url_for('index.php?member_ID=' . h(u($nav_members['id']))); ?>">
          <?php echo h($nav_members['last_name']); ?>
        </a>

      

    <?php } // while $nav_subjects ?>
  </ul>
  <?php mysqli_free_result($nav_members); ?>
</navigation>
