<?php
$accountno=$_POST['AccountNo'];
$withdraw=$_POST['WithdrawName'];
$amt=$_POST['Amount'];
if(!empty($withdraw)||!empty($amt)){
$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="onlinebanking";
	$conn= new mysqli($host,$dbUsername,$dbPassword,$dbname);
	if(mysqli_connect_error()){
		die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
	}else{	
	
	$Insert="Insert into Withdraw(AccountNo,WithdrawName,Amount) values(?,?,?)";
		$stmt=$conn->prepare($Insert);
		$stmt->bind_param("ssi",$accountno,$withdraw,$amt);
		$stmt->execute();
		$stmt->close();
	$sql="Select * from info where AccountNo='$accountno'";
	$result=$conn->query($sql);
	if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
	}
	$row = $result->fetch_row();
	$amount=$row['7'];
				$amount=$amount-$amt;
		$sql1="Update info set Amount='$amount' where AccountNo='$accountno'";
		if ($conn->query($sql1) === TRUE) {
			$message="Sucessfully Updated";
		echo "<script type='text/javascript'>alert('$message');</script>";
}
		header("Refresh:0; url=Withdraw.html");
		$message="Sucessfully Deposited";
		echo "<script type='text/javascript'>alert('$message');</script>";
		
		$conn->close();
	}
}else{
	echo"ALL field are required";
	die();
}
?>