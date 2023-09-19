<!DOCTYPE html>
<html>
<head>
	<title>PHP Table with CSS and HTML</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
            margin-top: 50px;
		}

		th, td {
			text-align: left;
			padding: 8px;
			border-bottom: 1px solid #ddd;
			
		}

		th {
			background-color: #4CAF50;
			color: white;
			
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}


	</style>
</head>
<body>


     <div class="back">
   <h1> <a href="index.html"    >Back To Home Page</a>   </h1>
	 </div>

	<?php
  
  	include 'dbconnect.php';
  	// Query the database to retrieve the data
  	$result = mysqli_query($conn, "SELECT * FROM usrdt");

  	// Generate HTML code to display the data
  	echo "<table>";
  	echo "<tr>";
  	echo "<th>First Name</th>";
  	echo "<th>Last Name</th>";
  	echo "<th>Roll</th>";
  	echo "<th>Branch</th>";
  	echo "<th>Email</th>";
  	echo "<th>Date of Birth</th>";
  	echo "</tr>";
  	while ($row = mysqli_fetch_assoc($result)) {
    	echo "<tr>";
    	echo "<td>" . $row["first_name"] . "</td>";
    	echo "<td>" . $row["last_name"] . "</td>";
    	echo "<td>" . $row["roll"] . "</td>";
    	echo "<td>" . $row["branch"] . "</td>";
    	echo "<td>" . $row["email"] . "</td>";
    	echo "<td>" . $row["dob"] . "</td>";
    	echo "</tr>";
  	}
  	echo "</table>";

  	// Close the database connection
  	mysqli_close($conn);

	?>

</body>
</html>
