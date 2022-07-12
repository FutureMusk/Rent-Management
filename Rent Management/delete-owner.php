<?php

require_once('php/dbh.php');

$owner_id = $_GET['owner_id'];
$delete_sql =  "DELETE FROM `house_owner` WHERE `house_owner`.`owner_id` = '$owner_id' ";
$result = mysqli_query($conn,$delete_sql);
echo $owner_id;
if(($result) == 1){
header("Location:admin-owner-list.php");
}
else{
    header("Location:error.php");
}
?>