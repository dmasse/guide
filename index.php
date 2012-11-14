<?php
echo 'test';
require 'user.php';
header('Content-Type: text/html; charset=utf-8');
echo Member::whoAmI().'<br/>';
?>
