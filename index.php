<?php include("testJo.php"); ?>
<?php
echo 'test';
require 'user.php';
header('Content-Type: text/html; charset=iso-8859-1');
echo Member::whoAmI().'<br/>';
?>