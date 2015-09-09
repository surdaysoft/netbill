<?php
  error_reporting(0);
  session_start();
  if($_SESSION['level']=="pelanggan"){
  header("location:index.php");
}else{
?>
<ul class="breadcrumb">
  <li><a href="./">Home</a></li>
  <li class="active"><?php echo ucfirst($page) ; ?></li>
</ul>
<?php
	include "./inc/config.php";
	$data = mysql_query("SELECT * FROM t_setting where id='1' LIMIT 1 ") or die (mysql_error());
	$r=mysql_fetch_array($data);
?>
<fieldset>
	<legend>Data Perusahaan</legend>
	<form class="form-horizontal"  method="post">	  
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Nama Perusahaan</label>
	    <div class="col-sm-4">
	      <input type="text" name="nama" value="<?php echo $r[nama]; ?>" class="form-control" placeholder="Nama Perusahaan">
	    </div>
	  </div>	  
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Alamat</label>
	    <div class="col-sm-5">
	      <textarea class="form-control" name="alamat" rows="3"><?php echo $r[alamat]; ?></textarea>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Nama Pemilik</label>
	    <div class="col-sm-3">
	      <input type="text" class="form-control" value="<?php echo $r[pemilik]; ?>" name="pemilik" placeholder="Nama Pemilik">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Logo</label>
	    <div class="col-sm-4">
	      <input type="file" class="form-control" name="logo">
	    </div>
	  </div>	  
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	    <button type="submit" name="simpan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Simpan</button>
        <a href="./" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali </a>
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
</fieldset>
<?php
}
?>