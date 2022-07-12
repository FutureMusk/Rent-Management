<?php

require_once ('dbh.php');

$email = $_POST['mailuid'];
$password = $_POST['pwd'];

$sql = "SELECT * from `house_owner` WHERE email = '$email' AND password = '$password'";



$owner_q = mysqli_query($conn, $sql);

if(mysqli_num_rows($owner_q) == 1){
	
    $owner_data = mysqli_fetch_assoc($owner_q);
	$o_id = $owner_data['owner_id'];
    echo ($o_id);
	header("Location: ../owner-dashboard.php?owner_id=$o_id");
}

else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Invalid Email or Password')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}
?>