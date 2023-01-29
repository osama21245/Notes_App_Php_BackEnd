<?php

include"../connect.php";

$username = filterRequest('username');
$email = filterRequest('email');
$password = filterRequest('password');

$stmt = $con->prepare("INSERT INTO `users`(`username`, `email`, `password`) VALUES (?,?,?)");
$stmt->execute(array($username,$email,$password));
$count = $stmt->rowCount();

if($count > 0){

   echo json_encode(array('status' => 'sucsses'));

}else{echo json_encode(array('status' => 'faild'));}