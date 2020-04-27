<?php session_start();?>
<html>
<head>
<title>Banking</title>
<link rel="stylesheet" type="text/css" href="css/homepage.css">
<link rel="stylesheet" type="text/css" href="css/personal.css">
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
	<li><a href="#">TRANSACTION DETAILS</a>
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
	<li><a href="infomation.php"  class="active"><img src="https://img.icons8.com/material/24/000000/guest-male--v1.png"/></a></li>
	</ul>
	</div>
</nav>
<table width="500px" height="600px">
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
	$sql="Select * from info where AccountNo='$account'";
	$result=$conn->query($sql);
	if($result-> num_rows>0){
		while($row= $result->fetch_assoc()) {
			echo"<div class=personal><tr><th>PERSONAL INFORMATION</th></tr><tr><th align=left>FullName :</th><td align=left>". $row["FullName"] ."</td></tr><tr><th align=left>Address :</th><td align=left>". $row["Address"] ."</td></tr><tr><th align=left>Phone :</th><td align=left>". $row["Phone"] ."</td></tr><tr><th align=left>Age :</th><td align=left>". $row["Age"] ."</td></tr><tr></div>";
			echo"<div class=acc><tr><th>ACCOUNT INFORMATION</th></tr><tr><th align=left>AccountNo :</th><td align=left>". $row["AccountNo"] ."</td></tr><th align=left>Username :</th><td align=left>". $row["Username"] ."</td></tr><tr><th align=left>Password :</th><td align=left>". $row["Password"] ."</td></tr><tr><th align=left>Amount :</th><td align=left>". $row["Amount"] ."</td></tr>";
		}
		echo"</table>";
	}
	else{
		echo "0 result";
	}
	$conn->close();
	?>

</table>
<div class="imgs">
<img src="image/undraw_personal_information_962o.png" width="700px" >
</div>
<div class="contact1">
<p class="info">For Futher Information :</p>
<p>Contact:9860900731</p>
<p>Email:joshiujjan52@gmail.com</p>
</div>
</header>
</body>
</html>