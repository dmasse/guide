<?php
require 'User.php';
header('Content-Type: text/html; charset=utf-8');
echo Guide::Member::whoAmI().'<br/>';
?>