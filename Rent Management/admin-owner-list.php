<?php

require_once ('php/dbh.php');

// $superuser = $_GET['su'];
$sql = "SELECT * from `house_owner` ";

//echo "$sql";
$house_owner = mysqli_query($conn, $sql);

?>



<html>
<head>
	<title>Admin Panel | House Rent Management</title>
	<link rel="stylesheet" type="text/css" href="css/styleadminlogin.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/base.css">
</head>
<body>
	<header>
		<nav>
			<h1> Rent Manager</h1>
			<ul id="navli">
                <!-- <li><a class="other-page" href="#">HOME</a></li> -->
				<li><a class="current-page" href="#">Manage Owners</a></li>
				<!-- <li><a class="other-page" href="#">Renter List</a></li> -->
			</ul>
            <div class="logout" style="height: 25px;" ><a class="other-page" href="index.html"><img src="img/logout.png" wowner_idth="100%" height="100%"></a></div>
		</nav>
	</header>
	<div class="line"></div>

		<table>
			<tr>

				<th align = "center">Owner ID</th>
				<th align = "center">Name</th>
				<th align = "center">Email</th>
				<th align = "center">Email</th>
				<th align = "center">Options</th>
			</tr>

			<?php
				while ($owners = mysqli_fetch_assoc($house_owner)) {
					echo "<tr>";
					echo "<td>".$owners['owner_id']."</td>";					
					echo "<td>".$owners['name']."</td>";
					echo "<td>".$owners['email']."</td>";
					echo "<td>".$owners['phone_number']."</td>";

					 echo "<td><a href=\"admin-edit-owner.php?owner_id=$owners[owner_id]\">Edit</a> | <a href=\"delete-owner.php?owner_id=$owners[owner_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";

				}


			?>

		</table>
		
	
</body>
</html>