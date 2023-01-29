<?php

include"../connect.php";

$notesid = filterRequest('id');
$imagename = filterRequest('imagename');

$stmt = $con->prepare("DELETE FROM note WHERE `notes_id` = ? ");
$stmt->execute(array($notesid));
$count = $stmt->rowCount();

if($count > 0){

deletefile("../upload",$imagename);
   echo json_encode(array('status' => 'sucsses'));

}else{echo json_encode(array('status' => 'faild'));}