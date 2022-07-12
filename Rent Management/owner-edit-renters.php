<?php
$owner_id=109; 
$owner_id = $_GET['owner_id'];

require_once ('php/dbh.php');
$sql = "SELECT * FROM `renters` WHERE 1";

$result = mysqli_query($conn, $sql);
if(isset($_POST['update']))
{
    $renter_id = mysqli_real_escape_string($conn, $_POST['renter_id']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$phone_num = mysqli_real_escape_string($conn, $_POST['phone_num']);




$result = mysqli_query($conn, "UPDATE `renters` SET `name`='$name',`email`='$email' , `phone_num` = '$phone_num' WHERE renter_id=$renter_id");
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='owner-renter-list.php?owner_id=$owner_id';
    </SCRIPT>");


	
}
?>




<?php
	$renter_id = (isset($_GET['renter_id']) ? $_GET['renter_id'] : '');
	$sql = "SELECT * from `renters` WHERE renter_id=$renter_id";
	$result = mysqli_query($conn, $sql);
	if($result){
	while($res = mysqli_fetch_assoc($result)){
    $renter_id = $res['renter_id'];
	$name = $res['name'];
	$email = $res['email'];
	$phone_num = $res['phone_num'];
	
}
}

?>

<html>
<head>
<title> Edit Renter | House Rent Management</title>
	<link rel="stylesheet" type="text/css" href="css/styleadminlogin.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/base.css">
</head>
<body>
	<header>
    <nav>
            <h1> Rent Manager</h1>
            <ul owner_id="navli">
            <li><a class="other-page" href=<?php echo"owner-dashboard.php?owner_id=$owner_id"?>>DASHBOARD</a></li>
                <li><a class="current-page" href=<?php echo"owner-renter-list.php?owner_id=$owner_id"?>>Manage Renters</a></li>
                <li><a class="other-page" href=<?php echo"owner-flat-list.php?owner_id=$owner_id"?>>Manage Flats</a></li>
                <li><a class="other-page" href=<?php echo"owner-add-renter.php?owner_id=$owner_id"?>>Add Renter</a></li>
                <li><a class="other-page" href=<?php echo"owner-add-flat.php?owner_id=$owner_id"?>>Add flat</a></li>
            </ul>
            <div class="logout" style="height: 25px;" ><a class="other-page" href="index.html"><img src="img/logout.png" wowner_idth="100%" height="100%"></a></div>
        </nav>
	</header>
	<div class="line"></div>
	
	<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Update Renter Info</h2>
                    <form id = "registration" action=<?php echo "owner-edit-renters.php?renter_id=$renter_id&owner_id=$owner_id" ?> method="POST">

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                     <input class="input--style-1" type="text" name="name" value="<?php echo $name;?>" >
                                </div>
                            </div>
                         
                        </div>





                        <div class="input-group">
                            <input class="input--style-1" type="email"  name="email" value="<?php echo $email;?>">
                        </div>
                        
                        <div class="input-group">
                            <input class="input--style-1" type="textField" name="phone_num" value="<?php echo $phone_num;?>">
                        </div>

                        <input type="hidden" name="renter_id" id="textField" value="<?php echo $renter_id;?>" required="required"><br><br>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="update">Submit</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
