<?php



require_once ("php/dbh.php");

$owner_id = $_GET['owner_id'];


// $flat_sql = "SELECT  * FROM `flats` LEFT JOIN `lives_in` ON `lives_in`.`flat_no` = `flats`.`flat_no` WHERE `flats`.`owner_id` = $owner_id";
// $empt_flat = "SELECT  * FROM `flats` LEFT JOIN `lives_in` ON `lives_in`.`flat_no` = `flats`.`flat_no` WHERE `flats`.`owner_id` = $owner_id ";

$flat_sql ="SELECT `flats`.`flat_no`, `flats`.`owner_id`, `flats`.`rent` , `renter_id` FROM `flats` LEFT JOIN `lives_in` ON `lives_in`.`flat_no` = `flats`.`flat_no` WHERE `flats`.`owner_id` = $owner_id";

$empt_flat ="SELECT `flats`.`flat_no`, `flats`.`owner_id`, `flats`.`rent` , `renter_id` FROM `flats` LEFT JOIN `lives_in` ON `lives_in`.`flat_no` = `flats`.`flat_no` WHERE `flats`.`owner_id` = $owner_id";

$flat_q = mysqli_query($conn, $flat_sql);
$empty_q = mysqli_query($conn, $empt_flat);


?>

<html>
<head>
<title> House Rent Management</title>
	<link rel="stylesheet" type="text/css" href="css/styleadminlogin.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/base.css">
</head>






<body>


<!-- header section -->
	<header>
    <nav>
            <h1> Rent Manager</h1>
            <ul owner_id="navli">
            <li><a class="other-page" href=<?php echo"owner-dashboard.php?owner_id=$owner_id"?>>DASHBOARD</a></li>
                <li><a class="other-page" href=<?php echo"owner-renter-list.php?owner_id=$owner_id"?>>Manage Renters</a></li>
                <li><a class="current-page" href=<?php echo"owner-flat-list.php?owner_id=$owner_id"?>>Manage Flats</a></li>
                <li><a class="other-page" href=<?php echo"owner-add-renter.php?owner_id=$owner_id"?>>Add Renter</a></li>
                <li><a class="other-page" href=<?php echo"owner-add-flat.php?owner_id=$owner_id"?>>Add flat</a></li>
            </ul>
            <div class="logout" style="height: 25px;" ><a class="other-page" href="index.html"><img src="img/logout.png" wowner_idth="100%" height="100%"></a></div>
        </nav>
	</header>
<!--End header section -->


	<div class="line"></div>


    <div owner_id="divimg">

        <div>
            <h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Manage Flat </h2>


            <table>
                <tr bgcolor="#000">
                    <th align="center">Seq.</th>
                    <th align="center">Flat No.</th>
                    <th align="center">Status</th>
                    <th align="center">Rent</th>
                    <th align="center">Options</th>                 
                </tr>

     <?php		

$a="Rented";
$b="Empty";
                         
            $seq = 1;
                
                while ($flat_list = mysqli_fetch_assoc($flat_q)) {
    
                    
                    echo "<tr>";         
                    echo "<td>" . $seq . "</td>";
                    echo "<td>" . $flat_list ['flat_no'] . "</td>";
                    if ($flat_list['renter_id'] == null) {
                        echo "<td>" .$b. "</td>";
                    } else{ echo "<td>" .$a. "</td>";}
                    echo "<td>" . $flat_list ['rent'] . "</td>";
                    echo "<td><a href=\"delete-flat.php?id=$flat_list[flat_no]&o_id=$owner_id\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                    echo "</tr>";  
                    $seq += 1;
                   
                }
               

        ?>

            </table>
            <br>
            <br>
            <br>
            <br>
            <br>


            <h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Empty Flat</h2>


            <table>
                <tr bgcolor="#000">
                    <th align="center">Seq.</th>
                    <th align="center">Flat No.</th>
                    <th align="center">Status</th>
                    <th align="center">Options</th>                 
                </tr>

     <?php		

$a="Rented";
$b="Empty";
                         
            $seq = 1;
                
                while ($flat_list = mysqli_fetch_assoc($empty_q)) {
                   
                    if ($flat_list['renter_id'] == null) {
                   
                    echo "<tr>";         
                    echo "<td>" . $seq . "</td>";
                    echo "<td>" . $flat_list ['flat_no'] . "</td>";       
                    echo "<td>" .$b. "</td>";
                    echo "<td><a href=\"delete-flat.php?id=$flat_list[flat_no]&o_id=$owner_id\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                    echo "</tr>";  
                    $seq += 1;
                   
                    }

                }
               

        ?>

            </table>

            <br>
            <br>
            <br>



        </div>


        </h2>




    </div>
</body>

</html>