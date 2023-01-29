<?php
define("MB", 1048576);

function filterRequest ($requestname){


return  htmlspecialchars(strip_tags($_POST[$requestname]));

}

function imageupload($imagerequest){

    global $messageError;

    $imagename = rand(1000 , 10000 ) . $_FILES[$imagerequest]["name"];
    $imagetmp = $_FILES[$imagerequest]["tmp_name"];
    $imagesize = $_FILES[$imagerequest]["size"];
    $allawext = array("png","jpg","mp3","gif","pdf","jpeg");
    $strtoarray = explode( "." , $imagename );
    $ext = end($strtoarray);
    $ext = strtolower($ext);

    if(!empty($imagename) &&  !in_array($ext,$allawext)){

$messageError[] = "Ext";
    }
    if($imagesize > 2 * MB){
        $messageError[] = "size";
    }
if(empty($messageError)){

    move_uploaded_file($imagetmp , "../upload/" . $imagename);
return $imagename;

}else{

 return "fail" ;

 }}
 function deletefile($dir , $imagename){
if(file_exists($dir . "/" . $imagename)){
unlink($dir . "/" . $imagename);

}


}
function checkAuthenticate()
{
    if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {

        if ($_SERVER['PHP_AUTH_USER'] != "osama" ||  $_SERVER['PHP_AUTH_PW'] != "osama12345"){
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Page Not Found';
            exit;
        }
    } else {
        exit;
    }
}
