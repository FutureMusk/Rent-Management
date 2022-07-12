<?php
$owner_id = $_GET['owner_id'];

require_once ('php/dbh.php');
$sql = "SELECT * FROM `house_owner` WHERE 1";

$result = mysqli_query($conn, $sql);
if(isset($_POST['update']))
{
    $owner_id = mysqli_real_escape_string($conn, $_POST['owner_id']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
	$phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);




$result = mysqli_query($conn, "UPDATE `house_owner` SET `email` = '$email', `password` = '$password', `name` = '$name', `phone_number` = '$phone_number' WHERE `house_owner`.`owner_id` = '$owner_id'");
	if($result == 1){
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='admin-owner-list.php';
    </SCRIPT>");
    }


	
}
?>




<?php
	$owner_id = (isset($_GET['owner_id']) ? $_GET['owner_id'] : '');
	$sql = "SELECT * from `house_owner` WHERE owner_id=$owner_id";
	$result = mysqli_query($conn, $sql);
	if($result){
	while($res = mysqli_fetch_assoc($result)){
    $owner_id = $res['owner_id'];
	$name = $res['name'];
	$email = $res['email'];
	$phone_number = $res['phone_number'];
    $password = $res['password'];
	
}
}

?>

<html>
<head>
<title> Edit House Owners | House Rent Management</title>
	<link rel="stylesheet" type="text/css" href="css/styleadminlogin.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/base.css">
</head>
<body>
	<header>
    <nav>
            <h1> Rent Manager</h1>
            <ul owner_id="navli">
            <li><a class="current-page" href="admin-owner-list.php">Manage Owners</a></li>
            <!-- <li><a class="other-page" href=<?php echo"admin-owner-list.php"?>>Owner List</a></li> -->

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
                    <h2 class="title">Update Owner Info</h2>
                    <form id = "registration" action=<?php echo "admin-edit-owner.php?owner_id=$owner_id" ?> method="POST">

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
                            <input class="input--style-1" type="textField" name="phone_number" value="<?php echo $phone_number;?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="textField" name="password" value="<?php echo $password;?>">
                        </div>
                        <input type="hidden" name="owner_id" id="textField" value="<?php echo $owner_id;?>" required="required"><br><br>
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
