<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'myemp';

$conn = mysqli_connect($host, $user, $pass, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sno = $_GET['sno'];
//print_r($sno);

$sql = "SELECT * FROM `simple` where sno = '$sno'";

$result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);
// print_r($result);

if (mysqli_num_rows($result) > 0) {
	// output data of each row
	$row = mysqli_fetch_assoc($result);


}
?>
<?php

if (isset($_POST['submit'])) {
	$id = $_GET['sno'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$sql = "UPDATE `simple` SET `name`='$name' , `email`='$email' , `mobile`='$mobile' where `sno` = $id";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		//header("location: index.php");
        //echo "<h2 style='background-color: #f7cac9; border: 1px solid #e67e73; padding: 10px; border-radius: 5px; width: 250px; margin: 20px auto; text-align: center; color: #e67e73; font-weight: bold;>Record updated</h2>";
		echo '<span style="background-color: #f7cac9; border: 1px solid #e67e73; padding: 10px; border-radius: 5px; width: 250px; margin: 20px auto; text-align: center; color: #e67e73;font-weight: bold; font-size: 30px">Record has been Updated!!</span>';
		

	} else {
		echo "error";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" href="style.css">
</head>
<form action="#" method="POST">
	Name : <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
	Email : <input type="email" name="email" value="<?php echo $row['email']; ?>"><br>
	Mobile : <input type="number" name="mobile" value="<?php echo $row['mobile']; ?>"><br>
	<input type="submit" name="submit" value="Send Data">

</form>

</html>