<?php
$accountno=$_POST['AccountNo'];
$depositedby=$_POST['DepositedPurpose'];
$amt=$_POST['Amount'];
if(!empty($depositedby)||!empty($amt)){
$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="onlinebanking";
	$conn= new mysqli($host,$dbUsername,$dbPassword,$dbname);
	if(mysqli_connect_error()){
		die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
	}else{	
	
	$Insert="Insert into deposite(AccountNo,DepositedPurpose,Amount) values(?,?,?)";
		$stmt=$conn->prepare($Insert);
		$stmt->bind_param("ssi",$accountno,$depositedby,$amt);
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
				$amount=$amt+$amount;
		$sql1="Update info set Amount='$amount' where AccountNo='$accountno'";
		if ($conn->query($sql1) === TRUE) {
			$message="Sucessfully Updated";
		echo "<script type='text/javascript'>alert('$message');</script>";
}
		header("Refresh:0; url=deposite.html");
		$message="Sucessfully Deposited";
		echo "<script type='text/javascript'>alert('$message');</script>";
		
		$conn->close();
	}
}else{
	echo"ALL field are required";
	die();
}
?>