<?php
$s = file_get_contents('gs://assignment1-269702.appspot.com/Employees.csv');
printf('data ne %s', $s);

$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$file = fopen('gs://cloud1data/Employees.csv', 'w');
fwrite($file, '$id,$first_name,$last_name,$age,$gender,$phone,$address');
fclose($file);

echo 'Data written';
