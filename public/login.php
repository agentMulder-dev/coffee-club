<?php 

require_once('../private/initialize.php');
$page_title = 'Main Menu';
include(SHARED_PATH . '/header.php');

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CC Login</title>
</head>

<body>

<div id="content">
  <h1>Coffee Club Login</h1>
  <h2>Temp login...need a database</h2>
  <p>Password not needed. Only need to match email address.</p>
  <form action="validateMember.php" method="post">
    <input type="text" name="email"><br>
    <input type="submit" value="Submit">
  </form>
  </div>

</body>
</html>
