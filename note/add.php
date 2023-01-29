<?php

include"../connect.php";

$title = filterRequest('title');
$content = filterRequest('content');
$userid = filterRequest('id');

$imagename = imageupload("file");

if ($imagename != "fail"){
   $stmt = $con->prepare("INSERT INTO `note`(`notes_title`, `notes_content`, `notes_user` , `notes_image`) VALUES (?,?,?,?)");
   $stmt->execute(array($title,$content,$userid,$imagename));
   $count = $stmt->rowCount();
   
   if($count > 0){
   
      echo json_encode(array('status' => 'sucsses'));
   
   }else{echo json_encode(array('status' => 'faild'));}

}else{

    echo json_encode(array('status' => 'faild'));
}

