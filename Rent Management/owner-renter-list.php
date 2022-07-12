<?php

include("php/dbh.php");

$owner_id = $_GET['owner_id'];
// $renters_sql = "SELECT  `renters`.*,`lives_in`.`flat_no`
// FROM `renters`
// 	, `flats` 
// 	LEFT JOIN `lives_in` ON `lives_in`.`flat_no` = `flats`.`flat_no`
// WHERE `renters`.`owner_id` = $owner_id AND `flats`.`owner_id` = $owner_id AND `lives_in`.`renter_id` = `renters`.`renter_id`";
$renters_sql ="SELECT r.renter_id, r.owner_id, r.name, r.email, r.phone_num, r.pmt_stat, li.flat_no
FROM rent_management.renters r 
	INNER JOIN rent_management.lives_in li ON ( r.renter_id = li.renter_id  )  
WHERE r.owner_id = $owner_id";

$renters_q = mysqli_query($conn, $renters_sql);


?>

<head>
<title> Renters | House Rent Management</title>
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

    <div owner_id="divimg">
        <div>
            <!-- <h2>Welcome <?php echo "$ownerName"; ?> </h2> -->

            <h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Manage Renters </h2>
            <table>

                <tr bgcolor="#000">
                    <th align="center">Seq.</th>
                    <th align="center">Renter ID</th>
                    <th align="center">Flat No.</th>
                    <th align="center">Name</th>
                    <th align="center">email</th>
                    <th align="center">Phone Number</th>
                    <th align="center">Options</th>
                    


                </tr>



                <?php
                $seq = 1;
                
                while ($renter_list = mysqli_fetch_assoc($renters_q)) {
                    echo "<tr>";
                  
                    echo "<td>" . $seq . "</td>";
                    echo "<td>" . $renter_list['renter_id'] . "</td>";
                    echo "<td>" . $renter_list['flat_no'] . "</td>";

                    echo "<td>" . $renter_list['name']  . "</td>";

                    echo "<td>" . $renter_list['email'] . "</td>";
                    echo "<td>" . $renter_list['phone_num'] . "</td>";
                    echo "<td><a href=\"owner-edit-renters.php?renter_id=$renter_list[renter_id]&owner_id=$owner_id\">Edit</a> | <a href=\"php\delete.php?renter_id=$renter_list[renter_id]&owner_id=$owner_id\">Delete</a></td>";
                    $seq += 1;
                   
                }
               

                ?>

            </table>