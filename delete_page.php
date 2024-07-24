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
if (isset($_GET['delete_msg'])) {
    echo "<h6>".$_GET['delete_msg']."</h6>";
}
?>
<?php 
session_start();

if(isset($_GET['sno'])){
    $sno = $_GET['sno'];

$sql="DELETE FROM `simple` WHERE `sno` = '$sno'";
$result = mysqli_query($conn, $sql);

if(!$result){
    die("query falied.".mysqli_error());
}
else{
    header('location:index.php?delete_msg=Record Deleted Successfully');
    echo '<span style="background-color: #f7cac9; border: 1px solid #e67e73; padding: 10px; border-radius: 5px; width: 250px; margin: 20px auto; text-align: center; color: #e67e73;font-weight: bold; font-size: 30px">Record has been Deleted!!</span>';
   
    
}
}


?>
<form action="#" method="GET">
	Name : <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
	Email : <input type="email" name="email" value="<?php echo $row['email']; ?>"><br>
	Mobile : <input type="number" name="mobile" value="<?php echo $row['mobile']; ?>"><br>
	<input type="submit" name="submit" value="Send Data">

</form>