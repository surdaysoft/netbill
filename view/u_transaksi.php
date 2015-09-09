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
        $query=mysql_query("SELECT * from t_transaksi WHERE id_transaksi='$_GET[id]' " ) or die (mysql_error());  //mengambil data tabel mahasiswa dan memasukkan nya ke variabel query
        $no=1;                    //membuat nomor pada tabel
        while($lihat=mysql_fetch_array($query)){    //mengeluarkan isi data dengan mysql_fetch_array dengan perulangan
      ?> 
<form class="form-horizontal" method="POST">
  <fieldset>
    <legend>Update Data Transaksi</legend>
    <div class="form-group">
      <label class="col-sm-2 control-label">No Invoice</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" readonly name="id" required value="<?php echo $lihat['id_transaksi'] ;?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Tanggal Bayar</label>
      <div class="col-sm-3">
        <input type="text" id="datepicker" class="form-control" name="tgl_bayar" value="<?php echo $lihat['tgl_bayar'] ;?>">
      </div>
    </div>
    <?php if($_SESSION['level'] == 'admin'){ ;?>
    <div class="form-group">
      <label class="col-sm-2 control-label">Tanggal Validasi</label>
      <div class="col-sm-3">
        <input type="text" id="tgl_validasi" class="form-control" name="tgl_validasi" value="<?php echo $lihat['tgl_validasi'] ;?>">
      </div>
    </div>
    <?php }; ?>
    <div class="form-group">
      <label class="col-sm-2 control-label">Jumlah Bayar</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" name="nominal" value="<?php echo $lihat['nominal'] ;?>">
      </div>
    </div>
    <?php if($_SESSION['level'] == 'admin'){ ;?>  
    <div class="form-group">
      <label class="col-sm-2 control-label">Status</label>
      <div class="col-sm-3">
        <select name="status" class="form-control">
          <option <?php if( $lihat['status']=='lunas'){echo "selected"; } ?> value='lunas'>Lunas</option>
          <option <?php if( $lihat['status']=='pending'){echo "selected"; } ?> value='pending'>Pending</option>          
        </select>
      </div>
    </div>  
    <?php }; ?>
    <?php if($_SESSION['level'] == 'pelanggan'){ ;?>   
    <div class="form-group">
      <label class="col-sm-2 control-label">Bukti Pembayaran</label>
      <div class="col-sm-3">
        <input type="file" id="exampleInputFile" name="file">
      </div>
    </div> 
    <?php }; ?>
   
   <input type="hidden" name="id_pelanggan" value="<?php echo "$_SESSION[id]" ;?>">
    <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2">
        <button type="reset" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reset</button>
        <button type="submit" name="simpan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Simpan</button>
        <a href="?page=transaksi" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Batal </a>
      </div>
    </div>
  </fieldset>


</form>
<?php
};
?>

  <?php 
  if(isset($_POST['simpan'])){
    if($_SESSION['level'] == 'admin'){
    $query=mysql_query("UPDATE t_transaksi SET tgl_bayar='$_POST[tgl_bayar]', tgl_validasi='$_POST[tgl_validasi]', nominal='$_POST[nominal]', status='$_POST[status]' WHERE id_transaksi='$_POST[id]'")or die(mysql_error());
    }else{
      $query=mysql_query("UPDATE t_transaksi SET tgl_bayar='$_POST[tgl_bayar]', tgl_validasi='$_POST[tgl_validasi]', nominal='$_POST[nominal]' WHERE id_transaksi='$_POST[id]'")or die(mysql_error());
    
    }
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=transaksi">';
  } 


  ?>