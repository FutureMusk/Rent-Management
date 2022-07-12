<?php


include("php/dbh.php");

$flat_no = $_GET['id'];
$o_id = $_GET['o_id'];

$sql="DELETE FROM lives_in where flat_no=$flat_no ";
$result = mysqli_query($conn,$sql); 


$delete_q="DELETE FROM flats WHERE flat_no=$flat_no";
$result = mysqli_query($conn,$delete_q);

header("Location:owner-flat-list.php?owner_id=$o_id");


?>








