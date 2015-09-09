<?php
	error_reporting(0);	
	session_start();
	if($_SESSION['username']){
	header("location:index.php");
}else{
?>

<html>
<head>
	<title>Halaman Login</title>
	<link href="css/bootstrap.css" rel="stylesheet">
<style type="text/css">
body{
	font-family: arial;
	font-size: 14px;
	background-color: #222;
}	
#utama{
	width: 20%;
	margin: 0 auto;
	margin-top: 12%;
	
}
#judul{
	padding: 15px;
	text-align: center;
	color: #fff;
	font-size: 20px;
	background-color: #3498db;
	border-top-right-radius: 10px;
	border-top-left-radius: 10px;
	border-bottom: 3px solid #336666;
}
#isi{
	background-color: #ccc;
	padding: 20px;
	border-bottom-left-radius: 10px;
	border-bottom-right-radius: 10px; 
}
input{
	padding: 10px;
	border: 0;
}
.lg{
	width: 220px;
}
/*
.btn{
	background-color: #339966 ;
	border-radius: 10px;
	color: #fff;
}
.btn:hover{
	background-color: #336666 ;
	cursor: pointer;
}*/
</style>
</head>
<body>
<div id="utama">
	<div id="judul">
		Halaman Login
	</div>
	<div id="isi">
		<form action="login-submit.php" method="post">
			<div>
				<input class="form-control" type="text" name="username" placeholder="Username" autofocus>
			</div>
			<div style="margin-top: 10px;">
				<input class="form-control" type="password" name="password" placeholder="Password">
			</div>
			<div style="margin-top: 10px;">
				<button type="submit" name="btnSubmit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>  Login</button> <!-- <input class="btn" type="submit" name="btnSubmit" value="Login"> -->
			</div>
		</form>

		
	</div>
</div>
</body>
</html>
<?php 
}
?>