<?php
	session_start(); 		//mulai session, krena kita akan menggunakan session pd file php ini
	include 'inc/config.php'; 		//hubungkan dengan config.php untuk berhubungan dengan database
	$username=$_POST['username']; 	//tangkap data yg di input dari form login input username
	$password=$_POST['password']; 	//tangkap data yg di input dari form login input password
	if(isset($_POST['btnSubmit'])){
		$query=mysql_query("SELECT * from t_user where username='$username' and password=md5('$password')") or die(mysql_error());	 //melakukan pengampilan data dari database untuk di cocokkan
		$data=mysql_num_rows($query);	 //melakukan pencocokan
		$r=mysql_fetch_array($query);

		if ($data == 1) { 		// melakukan pemeriksaan kecocokan dengan percabangan.
			$_SESSION['username']=$username;  //jika cocok, buat session dengan nama sesuai dengan username
			$_SESSION['level']=$r['level'];
			$_SESSION['id']=$r['id_pelanggan'];
			header("location:index.php");     // dan alihkan ke index.php
		}else{   				//jika tidak tampilkan pesan gagal login
			header("location:login.php");
	}
	
	}

	

?>