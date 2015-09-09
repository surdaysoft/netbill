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
	    <div class="col-sm-4">
	      	<select name="id" onchange="showUser(this.value)" class="form-control">
				<option value="">--Pilih ID Pelanggan--</option>
				<?php
					include "./inc/config.php";
					$pos=mysql_query("select * from t_pelanggan order by id_pelanggan");
					while($r_pos=mysql_fetch_array($pos)){
						echo "<option value=\"$r_pos[id_pelanggan]\">$r_pos[id_pelanggan]  $r_pos[nama] </option>";
					}
                ?>
			</select>
	    </div>
	  </div> 
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Username</label>
	    <div class="col-sm-3">
	      <input type="text" class="form-control" name="username" placeholder="Username">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Password</label>
	    <div class="col-sm-3">
	      <input type="password" class="form-control" name="password" placeholder="Password">
	    </div>
	  </div> 
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Level</label>
	    <div class="col-sm-3">
	      	<select name="level" class="form-control">
				<option value="">--Pilih Level--</option>
				<option value="admin">Admin</option>
				<option value="pelanggan">Pelanggan</option>
			</select>
	    </div>
	  </div> 
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	    <button type="reset" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reset</button>
        <button type="submit" name="simpan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Tambah</button>
        <a href="?page=user" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Batal </a>
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
    $cekdata="SELECT id_pelanggan from t_user where id_pelanggan='".$_POST['id']."'"; 
    $ada=mysql_query($cekdata) or die(mysql_error()); 
    if(mysql_num_rows($ada)>0) { 
      writeMsg('pelanggan.sama');
    } else { 
      $query="INSERT INTO t_user VALUES ('".$_POST['id']."','".$_POST['username']."','".md5($_POST['password'])."','".$_POST['level']."')"; 
      mysql_query($query) or die("Gagal menyimpan data karena :").mysql_error(); 
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=user">';
    } 
  } 

  ?>

<?php
}
?>