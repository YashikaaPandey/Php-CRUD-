
<?php
session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'myemp';

$conn = mysqli_connect($host, $user, $pass, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];



	$sql = "INSERT INTO simple(name,email,mobile) values ('$name', '$email', '$mobile')";
	mysqli_query($conn, $sql);


	//mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , initial-scale=1">
	<title>Home</title>
</head>

<body>
	<h1>PHP opereation</h1>
    
	<form action="#" method="POST">
		<h4>Name : <input type="text" name="name"><br></h4>
		<h4>Email : <input type="email" name="email"><br></h4>
		<h4>Mobile : <input type="number" name="mobile"><br></h4>
		<h4><input type="submit" name="submit" value="Send Data"></h4>

	</form>
	<?php
	
	$sql = "SELECT * FROM `simple`";

	$result = mysqli_query($conn, $sql);
	// print_r($result);
	

	?>

	<form method="post">
		<input type="search" id="search" name="search" placeholder="Search...">
		<button type="submit" name="submit1">Search</button>
	</form>

	<table border="1">
		<?php

		if (isset($_POST['submit1'])) {
			$search = $_POST['search'];
			$sql = "SELECT * FROM `simple` where `name`='$search' OR `email`='$search' OR `mobile`='$search'";
			$result = mysqli_query($conn, $sql);
			if($result)
			{
				$num=mysqli_num_rows($result);
				
				
			}


		} ?>

		<tr>
			<th>S.N.</th>
			<th>Name</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
		<?php if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while ($row = mysqli_fetch_assoc($result)) { ?>
				<tr>
					<td><?= htmlspecialchars($row['sno']) ?></td>
					<td><?= htmlspecialchars($row['name']) ?></td>
					<td><?= htmlspecialchars($row['email']) ?></td>
					<td><?= htmlspecialchars($row['mobile']) ?></td>
					<td><a href="update_page.php?sno=<?= htmlspecialchars($row['sno']) ?>" class="btn btn-primary">Update</a>
					</td>
					<td><a href="delete_page.php?sno=<?= htmlspecialchars($row['sno']) ?>" class="btn btn-danger">Delete</a>
					</td>
				</tr>
			<?php }
		} else {
			
			echo "<h2 style='background-color: #f7cac9; border: 1px solid #e67e73; padding: 10px; border-radius: 5px; width: 250px; margin: 20px auto; text-align: center; color: #e67e73; font-weight: bold;'>Data not found</h2>";
		} ?>


	</table>

</body>

</html>