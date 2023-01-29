<?php

include"../connect.php";

$title = filterRequest('title');
$content = filterRequest('content');
$notesid = filterRequest('id');
$imagename = filterRequest('imagename');

if(isset($_FILES["file"])){
deletefile("../upload",$imagename);
   $imagename = imageupload("file");

}

$stmt = $con->prepare("UPDATE `note` SET `notes_title`=?,`notes_content`=? ,`notes_image`=? WHERE notes_id = ?");
$stmt->execute(array($title,$content,$imagename,$notesid));
$count = $stmt->rowCount();

if($count > 0){

   echo json_encode(array('status' => 'sucsses'));

}else{echo json_encode(array('status' => 'faild'));}