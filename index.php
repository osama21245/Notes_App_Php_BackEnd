<?php

include "connect.php" ;

$stat= $con->prepare("DELETE FROM `user` WHERE id = 2 ");
$stat->execute();
$count = $stat->rowCount();

if($count > 0){

    echo "Sucsess";
} else{ 
   echo "Fail" ;
}
 
?>