<?php

include("php/dbh.php");

$r_id = $_GET['r_id'];
$o_id = $_GET['o_id'];
// $r_id=7;

$result = mysqli_query($conn, "UPDATE `renters` SET `pmt_stat`=1 WHERE renter_id=$r_id");

header("Location:owner-dashboard.php?owner_id=$o_id");
?>

