<?php
  session_start();
  include "./inc/function.php";
  if($_SESSION['level']=="operator"){
  header("location:index.php");
}else{
?>
<ul class="breadcrumb">
  <li><a href="./">Home</a></li>
  <li><a href="?page=<?php echo $page ;?>"><?php echo ucfirst($page) ; ?></a></li>
  <li class="active"><?php echo ucfirst($action) ; ?> Data</li>
</ul>
<fieldset>
	<legend>Tambah Data Pelanggan</legend>
	<form class="form-horizontal"  method="post">
	  <div class="form-group">
	    <label class="col-sm-2 control-label">ID Pelanggan</label>
	    <div class="col-sm-3">
	      <input type="text" name="id" class="form-control" placeholder="ID Pelanggan">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Nama</label>
	    <div class="col-sm-4">
	      <input type="text" name="nama" class="form-control" placeholder="Nama">
	    </div>
	  </div>	  
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Alamat</label>
	    <div class="col-sm-5">
	      <textarea class="form-control" name="alamat" rows="3"></textarea>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">No. Telp</label>
	    <div class="col-sm-3">
	      <input type="text" class="form-control" name="telpon" placeholder="No. Telp">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Email</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" name="email" placeholder="Email">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Paket</label>
	    <div class="col-sm-2">
	      	<select name="paket" onchange="showUser(this.value)" class="form-control">
				<option value="">--Pilih Paket--</option>
				<?php
					include "./inc/config.php";
					$pos=mysql_query("select * from t_paket order by id_paket");
					while($r_pos=mysql_fetch_array($pos)){
						echo "<option value=\"$r_pos[id_paket]\">$r_pos[nama]</option>";
					}
                ?>
			</select>
	    </div>
	    <a href="?page=paket&aksi=tambah" class="btn btn-primary "><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
	  </div>  
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	    <button type="reset" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reset</button>
        <button type="submit" name="simpan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Tambah</button>
        <a href="?page=pelanggan" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Batal </a>
	    </div>
	  </div>
	  <?php  
  	/*
	  if(isset($_POST['simpan']))
	  {
	      mysql_query("INSERT INTO t_pelanggan VALUES ('".$_POST['id']."','".$_POST['nama']."','".$_POST['alamat']."','".$_POST['telpon']."','".$_POST['email']."','".$_POST['paket']."')") or die (mysql_error());
	      
	      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=pelanggan">';
	  }*/
	  ?>
	</form>
</fieldset>

  <?php 
  if(isset($_POST['simpan'])){
    $cekdata="SELECT id_pelanggan from t_pelanggan where id_pelanggan='".$_POST['id']."'"; 
    $ada=mysql_query($cekdata) or die(mysql_error()); 
    if(mysql_num_rows($ada)>0) { 
      writeMsg('pelanggan.sama');
    } else { 
      $query="INSERT INTO t_pelanggan VALUES ('".$_POST['id']."','".$_POST['nama']."','".$_POST['alamat']."','".$_POST['telpon']."','".$_POST['email']."','".$_POST['paket']."')"; 
      mysql_query($query) or die("Gagal menyimpan data karena :").mysql_error(); 
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=pelanggan">';
    } 
  } 

  ?>

<?php
}
?>