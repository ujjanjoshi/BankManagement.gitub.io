<?php session_start();?>
<html>
<head>
<title>Banking</title>
<link rel="stylesheet" type="text/css" href="css/homepage.css">
<link rel="stylesheet" type="text/css" href="css/trandeldesign.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaina+2&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaina+2&family=Lato:ital@1&display=swap" rel="stylesheet">
</head>
<body>
<header>
<nav>
	<div class="row clearfix">
	<p class="logo"><a href="Homepage.html">Online Banking</a></p>
	<ul class="list">
	<li><a href="Homepage.html" >HOME</a></li>
	<li><a href="#" class="active">TRANSACTION DETAILS</a>
	<div class="sub-menu1">
				<ul>
					<li><a href="depdet.php">Deposite</a></li>
					<li><a href="withdet.php">Withdraw</a></li>
				</ul>
			</div>
	</li>
	<li><a href="#">TRANSACTION</a>
			<div class="sub-menu">
				<ul>
					<li><a href="Deposite.html">Deposite</a></li>
					<li><a href="Withdraw.html">Withdraw</a></li>
				</ul>
			</div>
	</li>
	<li><a href="infomation.php"><img src="https://img.icons8.com/material/24/000000/guest-male--v1.png"/></a></li>
	</ul>
	</div>
</nav>
	<div class="tbl">
	<table width="1000px" height="300px">
	<tr>
	<th>Account No</th>
	<th>Deposited Purpose</th>
	<th>Amount</th>
	</tr>
	<?php
	$username=$_SESSION['username'];
	$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="onlinebanking";
	$conn= new mysqli($host,$dbUsername,$dbPassword,$dbname);
	if(mysqli_connect_error()){
		die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
	}
	$sql1="Select * from info where Username='$username'";
	$result=$conn->query($sql1);
	if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
	}
	$row = $result->fetch_row();
	$account=$row['0'];
	$sql="Select * from deposite where AccountNo='$account'";
	$result=$conn->query($sql);
	if($result-> num_rows>0){
		while($row= $result->fetch_assoc()) {
			echo"<tr><td align=center>". $row["AccountNo"] ."</td><td align=center>". $row["DepositedPurpose"] ."</td><td align=center>". $row["Amount"] ."</td></tr>";
		}
		echo"</table>";
	}
	else{
		echo "0 result";
	}
	$conn->close();
	?>
</table>
</div>
<div class="contact">
<p class="info">For Futher Information :</p>
<p>Contact:9860900731</p>
<p>Email:joshiujjan52@gmail.com</p>
</div>
</header>
</body>
</html>