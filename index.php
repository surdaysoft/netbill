<?php
  error_reporting(0);
  session_start();  
  include "inc/config.php";
  $perusahaan = mysql_query("SELECT * FROM t_setting limit 1") or die (mysql_error());
  $seting =mysql_fetch_array($perusahaan);    
  $_SESSION['level'];
  if(empty($_SESSION['username'])){
  header("location:login.php");
}else{
?>


<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
  <meta name="description" content="">
  <meta name="author" content="Iwan M Setiawan">
  <link rel="shortcut icon" href="image/favicon.ico">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  
  <link rel="stylesheet" href="js/jquery/jquery-ui.css"> 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angka.js"></script>
    <script src="js/jquery/jquery-ui.js"></script>
    <script src="js/jquery/jquery-ui.min.js"></script>
    <!--
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->
    
  <title>Aplikasi Tagihan Internet - Surday Net</title>
  
  <script type="text/javascript" charset="utf-8">
  function fnHitung() {
  var angka = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(document.getElementById('inputku').value)))); //input ke dalam angka tanpa titik
  if (document.getElementById('inputku').value == "") {
    alert("Jangan Dikosongi");
    document.getElementById('inputku').focus();
    return false;
  }
  else
    if (angka >= 1) {
    alert("angka aslinya : "+angka);
    document.getElementById('inputku').focus();
    document.getElementById('inputku').value = tandaPemisahTitik(angka) ;
    return false; 
    }
  }
  </script>

  <script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
    
  });
  $(function() {
    $( "#tgl_validasi" ).datepicker({ dateFormat: 'yy-mm-dd' });
    
  });
  $(function() {
    $( "#dari" ).datepicker({ dateFormat: 'yy-mm-dd' });
    
  });
  $(function() {
    $( "#sampai" ).datepicker({ dateFormat: 'yy-mm-dd' });
    
  });
  </script>
  
</head>
<body>
 
<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="./" class="navbar-brand">Member Area</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <?php if($_SESSION['level'] == 'admin'){ ;?>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Master Data <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <li><a href="?page=pelanggan">Data Pelanggan</a></li>                
                <li><a href="?page=paket">Data Paket</a></li>
              </ul>
            </li>
            <?php }?>
            <li><a href="?page=transaksi">Pembayaran</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Laporan <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <li><a href="?page=rekapbayar">Rekap Pembayaran</a></li>  
              </ul>
            </li>
            <?php if($_SESSION['level'] == 'admin'){ ;?>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Pengaturan <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <li><a href="?page=user">Manajemen User</a></li>                
                <li><a href="?page=perusahaan">Profil Perusahaan</a></li>
              </ul>
            </li>
            <?php }?>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" title="<?php echo ucfirst($_SESSION['username'])  ;?>" id="download"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo ucfirst($_SESSION['username'])  ;?> <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="download">
              	<!--<li><a href="?page=profil">Profil</a></li>-->
                <li><a href="?page=logout">Logout</a></li>
              </ul>
            </li>
          </ul>

        </div>
      </div>
    </div>

<div id="wadah">
          
  <div id="kepala">
        <img src="img/logo.jpg" class="thumbnail span3" style="display: inline; float: left; margin-right: 20px; width: 100px; height: 100px">
        <h2 style="margin: 15px 0 10px 0; color: #000;"><?php echo $seting['nama'] ?></h2>
        <div style="color: #000; font-size: 16px; font-family: Tahoma" class="clearfix"><b>Alamat : <?php echo $seting['alamat'] ?></b></div>
         
  <!-- <img src="img/header.png" width="100%" height="30%"> -->
  </div>

  

  <div id="isi">

  <?php 
  $page = @$_GET['page'];
  $action = @$_GET['aksi'];
  if($page == "pelanggan"){
    if ($action == ""){
      include "view/l_pelanggan.php" ;
    }else if ($action == "tambah"){
      include "view/f_pelanggan.php" ;
    }else if ($action == "detail"){
      include "view/detail_pelanggan.php" ;
    }else if ($action == "edit"){
      include "view/u_pelanggan.php" ;
    }else if ($action == "delete"){
      include "view/l_pelanggan.php" ;
    }
  }else if ($page == "paket"){
    if ($action == ""){
      include "view/l_paket.php" ;
    }else if ($action == "tambah"){
      include "view/f_paket.php" ;
    }else if ($action == "edit"){
      include "view/u_paket.php" ;
    } else if ($action == "delete"){
      include "view/l_paket.php" ;
    }   
  }else if ($page == "transaksi"){
    if($action == ""){
      include "view/l_transaksi.php";
    }else if($action=="tambah"){
      include "view/f_transaksi.php";
    }else if($action=="edit"){
      include "view/u_transaksi.php";
    }else if($action=="delete"){
      include "view/l_transaksi.php";
    }
    
  }else if ($page == "profil"){
    include "view/l_profil.php";
  }else if ($page == "perusahaan"){
    include "view/setting.php";
  }else if ($page == "user"){
    if($action == ""){
    include "view/l_user.php";
    }elseif ($action == "tambah") {
      include "view/f_user.php";
    }elseif ($action == "edit") {
      include "view/u_user.php";
    }elseif ($action == "delete") {
      include "view/l_user.php";
    }

  }else if ($page == "rekapbayar"){
    include "view/rekap_laporan.php";
  }else if ($page == "logout"){
    include "logout.php";
  }else if ($page == ""){
    include "view/xyz.php" ;
  }else {
    include "view/404.php";
  }
  
  ?>
  </div>

  <div id="ekor">
  Copyright &copy; 2015 by <a href="http://surdaysoft.com" target="_blank" title="SurdaySoft"> Surday Soft </a>
  </div>
</div>
  
</body>
  
</html>
<?php
}

?>