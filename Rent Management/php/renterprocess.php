<?php

require_once ('dbh.php');

$flat_no = $_POST['flat_no'];

$owner_id = $_GET['owner_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone_num = $_POST['phone_num'];
$pmt_stat = 0;
$sql = "INSERT INTO `renters` (`renter_id`, `owner_id`, `name`, `email`, `phone_num`, `pmt_stat`) VALUES (NULL, '$owner_id', '$name', '$email', '$phone_num', '$pmt_stat')";
$result = mysqli_query($conn, $sql);

if(($result) == 1){
    

    $renter_sql = "SELECT * FROM `renters` WHERE `owner_id`='$owner_id' AND `name` = '$name' AND `email`='$email' ORDER BY `renter_id` DESC LIMIT 1";
$renter_q = mysqli_query($conn, $renter_sql);
$renter_data = mysqli_fetch_assoc($renter_q);
$renter_id ="";
$renter_id =$renter_data['renter_id'];
// echo  $renter_id;


$lives_in_sql = "UPDATE `lives_in` SET `renter_id`= '$renter_id' WHERE `flat_no` = '$flat_no';";
$lives_in_q = mysqli_query($conn, $lives_in_sql);

if($renter_id!=NULL && ($lives_in_q) == 1 ){
    


    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Added')
    window.location.href='..//owner-add-renter.php?owner_id=$owner_id';
    </SCRIPT>");
}
else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Incorrect Flat no . Check an empty flat from flat lists')
    window.location.href='..//owner-add-renter.php?owner_id=$owner_id';
    </SCRIPT>");
}

}

else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to add')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}




?>