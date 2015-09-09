<?php
include "./inc/config.php";
include "./inc/function.php";
$id = $_SESSION['id'];
$level = $_SESSION['level'];
?>
<ul class="breadcrumb">
  <li><a href="./">Home</a></li>
  <li class="active"><?php echo ucfirst($page) ; ?></li>
</ul>

<!-- <p>Date: <input type="text" id="datepicker"></p> 
<form target="_blank"  action="" class="form-inline" method="POST">
  <fieldset>
    <legend>Rekap Data Transaksi</legend>
    <div class="form-group">
      <label class="col-sm-3 control-label">Dari Tanggal</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" name="dari" id="dari" required placeholder="Dari Tanggal">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Ke Tanggal</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" name="sampai" id="sampai" required placeholder="Ke Tanggal">
      </div>
    </div>
    <button type="submit" class="btn btn-info">Cetak</button>
</form>
<br/> -->

<form class="form-inline" method="post" action="view/cetak_laporan.php" target="_blank">
  <legend>Rekap Data Transaksi</legend
>  <div class="form-group">
    <label for="exampleInputName2">Dari</label>
    <input type="text" class="form-control" id="dari" name="dari" placeholder="Dari">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail2">Sampai</label>
    <input type="text" class="form-control" id="sampai" name="sampai" placeholder="Sampai">
  </div>
  <input type="hidden" name="id_pelanggan" value="<?php echo "$_SESSION[id]" ;?>">
  <input type="hidden" name="level" value="<?php echo "$_SESSION[level]" ;?>">
  <button type="submit" class="btn btn-info">Cetak</button>
</form>
<!--
<form class="form-horizontal" method="POST">
  <fieldset>
    <legend>Rekap Laporan</legend>
    <div class="form-group">
      <label class="col-sm-2 control-label">Tangal Awal</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" name="awal" id="awal" required placeholder="Kode Paket">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Tanggal Akhir</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" name="akhir" placeholder="Nama Paket">
      </div>
    </div>
    
    
    
   <input type="hidden" name="info" value="1">
    <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2">
        <button type="reset" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reset</button>
        <button type="submit" name="simpan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Tambah</button>
        <a href="?page=paket" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Batal </a>
      </div>
    </div>
  </fieldset>
  <?php  
if(isset($_POST['simpan']))
{
  mysql_query("INSERT INTO t_paket (id_paket, nama, harga) VALUES ('".$_POST['kode']."','".$_POST['nama']."','".$_POST['harga']."')") or die (mysql_error());
  session_start();
  $_SESSION['info'];
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=paket">';
  
}
?>
</form>

-->