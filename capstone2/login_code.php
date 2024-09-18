<?php

require_once('connect.php');
$uname = $password = $pwd = '';

$uname = $_POST['username'];
$pwd = $_POST['password'];
$password = MD5($pwd);
$sql = "SELECT * FROM accounts WHERE Username='$uname' AND Password='$password'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$id = $row["ID"];
		$uname = $row["Username"];
		session_start();
		$_SESSION['id'] = $id;
		$_SESSION['username'] = $uname;
	}
	header("Location: homepage.php");
}
else
{
	echo "Invalid email or password";
}
?>