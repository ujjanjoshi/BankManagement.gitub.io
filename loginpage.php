<?php
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
	$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="onlinebanking";
	$conn= new mysqli($host,$dbUsername,$dbPassword,$dbname);
	if(mysqli_connect_error()){
		die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
	}else{
	$select="Select username from login where username=? limit 1";
	$stmt=$conn->prepare($select);
	$stmt->bind_param("s",$username);
	$stmt->execute();
	$stmt->bind_result($username);
	$stmt->store_result();
	$rnum=$stmt->num_rows;
	$select="Select password from login where password=? limit 1";
	$stmt=$conn->prepare($select);
	$stmt->bind_param("s",$password);
	$stmt->execute();
	$stmt->bind_result($password);
	$stmt->store_result();
	$rnum1=$stmt->num_rows;
	if($rnum==0 || $rnum1==0){
				header("Refresh:0; url=Loginpage.html");
		$message="Please create your account and then log in";
		
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	else if($rnum=1 && $rnum1==0){
		header("Refresh:0; url=Signup.html");
		$message="Please enter correct password";
		
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	else{
		include'welcome.html';
	if(isset($_POST['username'])){
	$username=$_POST['username'];
	$_SESSION['username']=$username;
	exit();
}
	}
	}
	
	$stmt->close();
	$conn->close();
	
	?>