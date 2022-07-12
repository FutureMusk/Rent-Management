<?php
$owner_id = isset($_GET['owner_id']) ? $_GET['owner_id'] : '';
require_once 'php/dbh.php';
$CURRENT_MONTH = 3;
$CURRENT_YEAR = 2021;
$owner_sql = "SELECT * FROM `house_owner` where owner_id = '$owner_id'";
$owner_q = mysqli_query($conn, $owner_sql);
$owner_info = mysqli_fetch_array($owner_q);
$ownerName = $owner_info['name'];

$renters_sql = "SELECT  `renters`.*,`lives_in`.`flat_no`
FROM `renters`
	, `flats` 
	LEFT JOIN `lives_in` ON `lives_in`.`flat_no` = `flats`.`flat_no`
WHERE `renters`.`owner_id` = $owner_id AND `flats`.`owner_id` = $owner_id AND `lives_in`.`renter_id` = `renters`.`renter_id`";
$renters_q = mysqli_query($conn, $renters_sql);


?>



<html>

<head>
<title> DASHBOARD:: <?php echo "$ownerName"; ?> | House Rent Management</title>
	<link rel="stylesheet" type="text/css" href="css/styleadminlogin.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/base.css">
</head>
<body>
	<header>
    <nav>
            <h1> Rent Manager</h1>
            <ul owner_id="navli">
                <li><a class="current-page" href=<?php echo "owner-dashboard.php?owner_id=$owner_id"; ?>>DASHBOARD</a></li>
                <li><a class="other-page" href=<?php echo "owner-renter-list.php?owner_id=$owner_id"; ?>>Manage Renters</a></li>
                <li><a class="other-page" href=<?php echo "owner-flat-list.php?owner_id=$owner_id"; ?>>Manage Flats</a></li>
                <li><a class="other-page" href=<?php echo "owner-add-renter.php?owner_id=$owner_id"; ?>>Add Renter</a></li>
                <li><a class="other-page" href=<?php echo "owner-add-flat.php?owner_id=$owner_id"; ?>>Add flat</a></li>
            </ul>
            <div class="logout" style="height: 25px;" ><a class="other-page" href="index.html"><img src="img/logout.png" wowner_idth="100%" height="100%"></a></div>
        </nav>
	</header>
	<div class="line"></div>

    <div owner_id="divimg">
        <div>
            <h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;"><?php echo "$ownerName"; ?>'s Dashboard </h2>
            <table>
                <tr bgcolor="#000">
                    <th align="center">Seq.</th>
                    <th align="center">Renter ID</th>
                    <th align="center">Flat No.</th>
                    <th align="center">Name</th>
                    <th align="center">email</th>
                    <th align="center">Phone Number</th>
                </tr>
                <?php
                $seq = 1;

                while ($renter_list = mysqli_fetch_assoc($renters_q)) {
                    echo "<tr>";

                    echo "<td>" . $seq . "</td>";
                    echo "<td>" . $renter_list['renter_id'] . "</td>";
                    echo "<td>" . $renter_list['flat_no'] . "</td>";

                    echo "<td>" . $renter_list['name'] . "</td>";

                    echo "<td>" . $renter_list['email'] . "</td>";
                    echo "<td>" . $renter_list['phone_num'] . "</td>";

                    $seq += 1;
                }
                ?>

            </table>
            <br><br><br><br><br>

            <h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Due Payments</h2>
            <table>
            <tr bgcolor="#000">
                    <th align="center">Seq.</th>
                    <th align="center">Renter ID</th>
                    <th align="center">Flat No.</th>
                    <th align="center">Name</th>
                    <th align="center">Payment status</th>
                    <th align="center">Payment</th>


                </tr>



                <?php
                $due_q = mysqli_query($conn, $renters_sql);
                $i = 1;
                while ($due_list = mysqli_fetch_assoc($due_q)) {
                    if (strval($due_list['pmt_stat']) == '0') {
                        echo "<tr>";
                        echo "<td>" . $i . "</td>";
                        echo "<td>" . $due_list['renter_id'] . "</td>";
                        echo "<td>" . $due_list['flat_no'] . "</td>";

                        echo "<td>" . $due_list['name'] . "</td>";
                        echo "<td>" . "UNPAID" . "</td>";
                        echo "<td><a href=\"php\paid.php?r_id=$due_list[renter_id]&o_id=$owner_id\">Payment Recived</a></td>";

                        $i += 1;
                    }
                }
                ?>

            </table>
            <br><br><br><br>

            <h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">This Month's Income</h2>


            <table>

                <tr>
                    <th align="center">Seq</th>
                    <th align="center">Expected income</th>
                    <th align="center">Recived income</th>
                    

                </tr>



                <?php
                $monthly_total_sql = "SELECT SUM(flats.rent) As monthly FROM `flats` WHERE owner_id = $owner_id"; //Get total income of a owner from flat's rents

                $monthly_recived_sql = "SELECT SUM(pmt_amount) As recived FROM `payment` WHERE owner_id = $owner_id AND MONTH(pmt_date)=$CURRENT_MONTH AND YEAR(pmt_date)=$CURRENT_YEAR"; //get total income in current month
         
                $monthly_total_q = mysqli_query($conn, $monthly_total_sql);
                $monthly_recived_q = mysqli_query($conn, $monthly_recived_sql);

                $monthly = mysqli_fetch_assoc($monthly_total_q); //store the expected income
                $m_recived = mysqli_fetch_assoc($monthly_recived_q); //store current income

                echo "<tr>";

                echo "<td>" . '1' . "</td>";
                echo "<td>" . $monthly['monthly'] . "</td>";
                echo "<td>" . $m_recived['recived'] . "</td>";
                ?>

            </table>


            <h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">YEARLY INCOME</h2>


            <table>

                <tr>

                    <th align="center">Year</th>
                    <th align="center">Amount</th>
                </tr>


                <?php 
                $yearly_sql = "SELECT YEAR(pmt_date) AS year ,SUM(pmt_amount) AS amount FROM payment WHERE owner_id = $owner_id GROUP BY YEAR(pmt_date)";
                
                $yearly_q = mysqli_query($conn, $yearly_sql);

                while ($yearly_income = mysqli_fetch_assoc($yearly_q)) {
                    echo "<tr>";

                    echo "<td>" . $yearly_income['year'] . "</td>";
                    echo "<td>" . $yearly_income['amount'] . "</td>";
                } ?>

            </table>
            <br><br><br><br>
        </div>
        </h2>
    </div>
</body>

</html>