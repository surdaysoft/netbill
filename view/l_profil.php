<ul class="breadcrumb">
  <li><a href="./">Home</a></li>
  <li class="active"><?php echo ucfirst($page) ; ?></li>
</ul>

 <?php
 error_reporting(0);
 session_start();
 $id = $_SESSION['id'];
 include "./inc/config.php";
 $query=mysql_query("SELECT t_pelanggan.*, t_user.* from t_pelanggan, t_user where t_pelanggan.id_pelanggan='$id'");
 $data=mysql_fetch_array($query);
 ?>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Profil Pelanggan</h3>
  </div>
<div class="panel-body">
	
	<form class="form-horizontal"  method="post">	  
	  <div class="form-group">
	    <label class="col-sm-2 control-label">ID Pelanggan</label>
	    <div class="col-sm-4">
	      <input type="text" name="nama" readonly value="<?php echo $data[id_pelanggan]; ?>" class="form-control" placeholder="ID Pelanggan">
	    </div>
	  </div>	  
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Username</label>
	    <div class="col-sm-4">
	      <input type="text" name="nama" readonly value="<?php echo $data[username]; ?>" class="form-control" placeholder="Username">
	    </div>
	  </div>			  
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Nama Pelanggan</label>
	    <div class="col-sm-4">
	      <input type="text" name="nama" value="<?php echo $data[nama]; ?>" class="form-control" placeholder="Nama Pelanggan">
	    </div>
	  </div>	  
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Alamat</label>
	    <div class="col-sm-5">
	      <textarea class="form-control" name="alamat" rows="3"><?php echo $data[alamat]; ?></textarea>
	    </div>
	  </div>  
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	    <button type="submit" name="simpan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Simpan</button>
        <a href="./" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Batal </a>
	    </div>
	  </div>
	  <?php  
  
	  if(isset($_POST['simpan']))
	  {
	      mysql_query("UPDATE t_setting SET nama = '".$_POST['nama']."', alamat = '".$_POST['alamat']."', pemilik = '".$_POST['pemilik']."' WHERE id = '1'") or die (mysql_error());
	      
	      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
	  }
	  ?>
	</form>
</div>
</div>

