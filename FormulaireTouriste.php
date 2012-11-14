<?php
require 'user.php';
header('Content-Type: text/html; charset=utf-8');
echo guide::Member::whoAmI();
?>