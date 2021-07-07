<?php
	session_start();
	include 'conn.php';
	//$error="";
    $username = $_POST["username"];
    $password = $_POST["password"];
        
	if(count($_POST)>0) {
                $sql = "SELECT * FROM admin WHERE username = '$username' and password = '$password'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);

	if($_POST["username"] == $row["username"] && $_POST["password"] == $row["password"])
	{
			$_SESSION["alogin"] = $username;
            header("Location: ../admin/dashboard.php");
           	$conn->close(); 
	}

	else {
			header("Location: index.php?error=1");
			$conn->close();
		 }
	}
?>