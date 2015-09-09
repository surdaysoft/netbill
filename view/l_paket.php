<?php
  error_reporting(0);
  session_start();
  include "./inc/function.php";
  $_SESSION['info'];
  if($_SESSION['level']=="pelanggan"){
  header("location:index.php");
}else{
?>
<ul class="breadcrumb">
  <li><a href="./">Home</a></li>
  <li class="active"><?php echo ucfirst($page) ; ?></li>
</ul>
<div class="btn-group" >
  <a href="?page=paket&aksi=tambah" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Data</a>
</div>

<br/><br/>
<?php 
  if ($action == ""){
?>
<table class="table table-hover table-bordered table-striped">
	<thead>
	    <tr class="info">
	      <th>#</th>
	      <th>Kode Paket</th>
	      <th>Nama Paket</th>
	      <th>Harga</th>
	      <th>Aksi</th>
	    </tr>
  	</thead>
  	<tbody>
  		<?php
        include "./inc/config.php";
        $query=mysql_query("select * from t_paket") or die (mysql_error());  //mengambil data tabel mahasiswa dan memasukkan nya ke variabel query
        $no=1;                    //membuat nomor pada tabel
        while($lihat=mysql_fetch_array($query)){    //mengeluarkan isi data dengan mysql_fetch_array dengan perulangan
        ?>    
      <tr>
        <td><?php echo $no++; ?></td>         
        <td><?php echo $lihat['id_paket'] ?></td>    
        <td><?php echo $lihat['nama'] ?></td>     
        <td><?php echo "Rp ". number_format($lihat['harga'], 0, ',', '.'); ?></td>     
        <td align="center">
  				<!-- <a href="?page=paket&aksi=detail&id=<?php echo $lihat['id_paket'] ;?>" class="btn btn-success btn-sm" title="Lihat Data"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a>  -->
  				<a href="?page=paket&aksi=edit&id=<?php echo $lihat['id_paket'] ;?>" class="btn btn-info btn-sm" title="Edit Data"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
  				<a href="?page=paket&aksi=delete&id=<?php echo $lihat['id_paket'] ;?>" onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" class="btn btn-danger btn-sm" title="Hapus Data"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
  		</td>
		 
      </tr>
      <?php
        }
      ?>
  	</tbody>

</table>
	<ul class="pagination">
	  <li class="disabled"><a href="#">«</a></li>
	  <li class="active"><a href="#">1</a></li>
	  <li><a href="#">2</a></li>
	  <li><a href="#">3</a></li>
	  <li><a href="#">4</a></li>
	  <li><a href="#">5</a></li>
	  <li><a href="#">»</a></li>
	</ul>
<?php
}else if($action == "delete"){
$hapus=mysql_query("DELETE from t_paket WHERE id_paket='$_GET[id]'") or die(mysql_error());
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=paket">';
break;
}else{
  echo "maaf aksi tidak ditemukan";
}
?>
  <?php 
}
  ?>