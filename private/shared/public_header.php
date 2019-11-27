<!doctype html>

<html lang="en">
  <head>
    <title>Coffee Club <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/public.css'); ?>" />
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
  </head>

  <body>

    <header>
      <h1>
        <a href="<?php echo url_for('/index.php'); ?>">
          <img src="<?php echo url_for('/images/'); ?>" width="298" height="71" alt="" />
        </a>
      </h1>
    </header>
