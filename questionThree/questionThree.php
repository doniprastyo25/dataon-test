<?php
$email = 'user@example.com';
$domain = substr($email, strpos($email, '@') + 1);
echo $domain;
?>