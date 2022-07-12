<?php

require_once ('php/dbh.php');
$sql = "SELECT * from `house_owner` ";

//echo "$sql";
$house_owner = mysqli_query($conn, $sql);
$renter

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
                <li><a class="current-page" href="#">HOME</a></li>
				<li><a class="current-page" href="#">Owner List</a></li>
				<li><a class="other-page" href="#"></a>Renter List</li>
				<li><a class="other-page" href="#">ADMIN LOG IN</a></li>
				<li><a class="other-page" href="#">SIGN UP</a></li>
				<li><a class="other-page" href="#">ABOUT</a></li>
			</ul>
            <div class="logout"><a class="other-page" href="#">LOGOUT</a></div>
		</nav>
	</header>
	<div class="line"></div>

		<table>
			<tr>

				<th align = "center">Owner ID</th>
				<th align = "center">Name</th>
				<th align = "center">Email</th>

				<th align = "center">Options</th>
			</tr>

			<?php
				while ($owners = mysqli_fetch_assoc($house_owner)) {
					echo "<tr>";
					echo "<td>".$owners['owner_id']."</td>";					
					echo "<td>".$owners['name']."</td>";
					echo "<td>".$owners['email']."</td>";

					 echo "<td><a href=\"edit.php?id=$owners[owner_id]\">Edit</a> | <a href=\"delete.php?id=$owners[owner_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";

				}


			?>

		</table>
		
	
</body>
</html>