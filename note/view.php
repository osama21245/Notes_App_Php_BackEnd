<?php

include"../connect.php";


$userid = filterRequest('id');


$stmt = $con->prepare("SELECT * FROM note WHERE `notes_user` = ?  ");
$stmt->execute(array($userid));
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$count = $stmt->rowCount();

if($count > 0){

   echo json_encode(array('status' => 'sucsses',"data"=>$data));

}else{echo json_encode(array('status' => 'faild'));}