<?php

require_once ('dbh.php'); //connect db

$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];
$phn_num = $_POST['phone_num'];
//get the values

$reg_sql = "INSERT INTO `house_owner`(`owner_id`, `email`, `password`, `name`, `phone_number`) VALUES (NULL, '$email', '$password', '$name', '$phn_num')";
//insert query to store in db


$reg_q = mysqli_query($conn, $reg_sql);
//fetch the query

if(($reg_q) == 1){ //checks if its successfully

    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Successfully Signed Up , Please Log In')
    window.location.href='../owner-login.html';
    </SCRIPT>");
    
}

else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Assign')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}

?>