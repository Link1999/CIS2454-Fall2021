<?php

$connection_string = 'mysql:host=localhost;dbname=stockprogram';
$user_name = 'stockprogram';
$password = 'test'; // feel bad about this

$db = new PDO($connection_string, $user_name, $password);
