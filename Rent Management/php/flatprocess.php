<?php

require_once ('dbh.php');



$owner_id = $_GET['owner_id'];
$rent = $_POST['rent'];
// $renter_id = $_POST['renter_id'];

$sql1 = "INSERT INTO `flats` (`flat_no`, `owner_id`, `rent`) VALUES (NULL, '$owner_id', '$rent')";
$result1 = mysqli_query($conn, $sql1);

$flat_sql = "SELECT * FROM flats where owner_id = '$owner_id' AND  rent='$rent' ORDER BY flat_no DESC LIMIT 1";
$flat_q = mysqli_query($conn, $flat_sql);
$flat_list = mysqli_fetch_assoc($flat_q);
$flat_no="";
$flat_no = $flat_list['flat_no'];
// echo $flat_no;
$sql2 = "INSERT INTO `lives_in` (`flat_no`, `renter_id`) VALUES ('$flat_no',NULL)";



$result2 = mysqli_query($conn, $sql2);

if(($result1 == 1) && ($result1 == 1)  ){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Added Flat no $flat_no')
    window.location.href='../owner-add-flat.php?owner_id=$owner_id';
    </SCRIPT>");
}

else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to add')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}
 ?>