<?php
$fullname=$_POST['FullName'];
$age=$_POST['Age'];
$address=$_POST['address'];
$phone=$_POST['Phone'];
$username=$_POST['username'];
$password=$_POST['password'];
$amount=$_POST['amount'];
if(!empty($fullname)||!empty($address)||!empty($phone)||!empty(age)||!empty($username)||!empty($password)){
	$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="onlinebanking";
	$conn= new mysqli($host,$dbUsername,$dbPassword,$dbname);
	if(mysqli_connect_error()){
		die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
	}else{
		$Insert="Insert into info(FullName,Address,Phone,Age,Username,Password,Amount) values(?,?,?,?,?,?,?)";
		$stmt=$conn->prepare($Insert);
		$stmt->bind_param("ssssssi",$fullname,$address,$phone,$age,$username,$password,$amount);
		$stmt->execute();
		
		$Insert="Insert into login(username,password) values(?,?)";
		$stmt=$conn->prepare($Insert);
		$stmt->bind_param("ss",$username,$password);
		$stmt->execute();
		$message="Your Account is added sucessfully";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("Refresh:0; url=Loginpage.html");
		$stmt->close();
		$conn->close();
		}
}else{
	echo"ALL field are required";
	die();
}
?>