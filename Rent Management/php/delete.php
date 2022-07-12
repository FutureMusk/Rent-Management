<?php

include("dbh.php");

$owner_id = $_GET['owner_id'];
$renter_id = $_GET['renter_id'];
$delete_sql =  "DELETE FROM `renters` WHERE `renters`.`renter_id` = '$renter_id'";
$result = mysqli_query($conn,$delete_sql);
echo $owner_id;
echo $renter_id;
if(($result) == 1){
header("Location: ../owner-renter-list.php?owner_id=$owner_id");
}
?>