<?php 
$owner_id=109; 
$owner_id = $_GET['owner_id'];

?>
<html>
<head>
<title> Add Flat | House Rent Management</title>
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
                <li><a class="other-page" href=<?php echo"owner-renter-list.php?owner_id=$owner_id"?>>Manage Renters</a></li>
                <li><a class="other-page" href=<?php echo"owner-flat-list.php?owner_id=$owner_id"?>>Manage Flats</a></li>
                <li><a class="other-page" href=<?php echo"owner-add-renter.php?owner_id=$owner_id"?>>Add Renter</a></li>
                <li><a class="current-page" href=<?php echo"owner-add-flat.php?owner_id=$owner_id"?>>Add flat</a></li>
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
                    <h2 class="title">Add A New Flat</h2>
                    <form action=<?php echo "php/flatprocess.php?owner_id=$owner_id" ?> method="POST" enctype="multipart/form-data">
         
                        
                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="Rent" name="rent" required="required" >
                        </div>

                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</body>

</html>

