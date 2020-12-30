<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'webcrm';
$conn = mysqli_connect($host, $user, $pass, $db) or die('MYSQLI CONNECT ERROR =>' . mysqli_error($conn));
