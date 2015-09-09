<?php
include "./inc/config.php";
include "./inc/function.php";
$id = $_SESSION['id'];

?>
<ul class="breadcrumb">
  <li><a href="./">Home</a></li>
  <li><a href="?page=<?php echo $page ;?>"><?php echo ucfirst($page) ; ?></a></li>
  <li class="active"><?php echo ucfirst($action) ; ?> Data</li>
</ul>
      <?php
        include "./inc/config.php";
        $query=mysql_query("SELECT * from t_pelanggan WHERE id_pelanggan='$_GET[id]' " ) or die (mysql_error());  //mengambil data tabel mahasiswa dan memasukkan nya ke variabel query
        $no=1;                    //membuat nomor pada tabel
        while($lihat=mysql_fetch_array($query)){    //mengeluarkan isi data dengan mysql_fetch_array dengan perulangan
      ?> 
<form class="form-horizontal" method="POST">
  <fieldset>
    <legend>Update Data Pelanggan</legend>
    <div class="form-group">
      <label class="col-sm-2 control-label">ID Pelanggan</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" name="id" required value="<?php echo $lihat['id_pelanggan'] ;?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Nama</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" name="nama" value="<?php echo $lihat['nama'] ;?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Alamat</label>
      <div class="col-sm-3">
        <textarea class="form-control" name="alamat" rows="3"><?php echo $lihat['alamat'] ;?></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">No HP</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" name="telpon" value="<?php echo $lihat['no_hp'] ;?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Email</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" name="email" value="<?php echo $lihat['email'] ;?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Paket</label>
      <div class="col-sm-3">
        <select name="paket" class="form-control">
        <?php
          include "./inc/config.php";
          $pos=mysql_query("select * from t_paket order by id_paket");
          while($r_pos=mysql_fetch_array($pos) ){
            ?>
            <!--echo "<option value=\"$r_pos[id_paket]\">$r_pos[nama]</option>";-->
            <option <?php if( $lihat['id_paket']==$r_pos['id_paket']) {echo "selected"; } ?> value='<?php echo $r_pos['id_paket'] ;?>'><?php echo $r_pos['nama'] ;?></option>
          <?php
          };
          ?>
        </select>
      </div>
    </div>  
   
   <input type="hidden" name="id_pelanggan" value="<?php echo "$_SESSION[id]" ;?>">
    <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2">
        <button type="reset" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reset</button>
        <button type="submit" name="simpan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Simpan</button>
        <a href="?page=pelanggan" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Batal </a>
      </div>
    </div>
  </fieldset>


</form>
<?php
};
?>

  <?php 
  if(isset($_POST['simpan'])){
    $query=mysql_query("UPDATE t_pelanggan SET nama='$_POST[nama]', alamat='$_POST[alamat]', no_hp='$_POST[telpon]', email='$_POST[email]', id_paket='$_POST[paket]' WHERE id_pelanggan='$_POST[id]'")or die(mysql_error());
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=pelanggan">';
    } 


  ?>