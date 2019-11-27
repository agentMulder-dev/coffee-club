<?php
  if(!isset($page_title)) { $page_title = 'Member Area'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>Coffee Club<?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/coffee-club.css'); ?>" />
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
  </head>

  <body>
    <header>
      <h1>Member Area</h1>
    </header>
