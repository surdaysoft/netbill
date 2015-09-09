<?php
include "./inc/function.php";
$id = $_SESSION['id'];
?>
<ul class="breadcrumb">
  <li><a href="./">Home</a></li>
  <li class="active"><?php echo ucfirst($page) ; ?></li>
</ul>
<div class="btn-group" >
  <a href="?page=transaksi&aksi=tambah" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Data</a>
</div>

<br/><br/>
<?php 
  if ($action == ""){
?>
<table class="table table-hover table-bordered table-striped">
	<thead>
	    <tr class="info">
	      <th>#</th>
	      <th>No Invoice</th>
	      <th>Tgl Bayar</th>
	      <th>Tgl Validasi</th>
	      <th>Total</th>
	      <th>Status</th>
        <th>File</th>                          
	      <th>Aksi</th>       
	    </tr>
  	</thead>
  	<tbody align="center">
  		<?php
        include "./inc/config.php";
        if($_SESSION['level'] == 'admin'){
        $query=mysql_query("SELECT * from t_transaksi order by id_transaksi ASC") or die (mysql_error());  //mengambil data tabel mahasiswa dan memasukkan nya ke variabel query        
        }else{
        $query=mysql_query("SELECT * from t_transaksi WHERE id_pelanggan='$_SESSION[id]' order by id_transaksi ASC ") or die (mysql_error());  //mengambil data tabel mahasiswa dan memasukkan nya ke variabel query
        }
        $no=1;                    //membuat nomor pada tabel
        while($lihat=mysql_fetch_array($query)){    //mengeluarkan isi data dengan mysql_fetch_array dengan perulangan
        ?>    
      <tr>
        <td><?php echo $no++; ?></td>         <!--menampilkan nomor dari variabel no-->
        <td><?php echo $lihat['id_transaksi'] ?></td>    <!--menampilkan data nim dari tabel mahasiswa-->
        <td><?php echo TanggalIndo($lihat['tgl_bayar']); ?></td>     <!--menampilkan data nama dari tabel mahasiswa-->
        <td><?php
        if ($lihat['tgl_validasi'] == '0000-00-00'){
        echo "<span class='label label-warning'>".ucwords("belum validasi")."</span>";
        }else{
        echo TanggalIndo($lihat['tgl_validasi']); 
        }?></td>      <!--menampilkan data jurusan dari tabel mahasiswa-->
        <td><?php echo "Rp." . number_format( $lihat['nominal'] , 0 , ',' , '.' ); ?></td>     <!--menampilkan data alamat dari tabel mahasiswa-->
        <td><?php if ($lihat['status']=='lunas'){ ?>
          <span class="label label-success"><?php echo ucfirst($lihat['status']) ?></span>
          <?php }else{ ?>
          <span class="label label-danger"><?php echo ucfirst($lihat['status']) ?></span>
          <?php }?>
        </td>     <!--menampilkan data alamat dari tabel mahasiswa-->
        <td><?php echo $lihat['bukti'] ?></td>     <!--menampilkan data alamat dari tabel mahasiswa-->
        
        <td align="center">          
  				<a href="?page=transaksi&aksi=detail&id=<?php echo $lihat['id_transaksi'] ;?>" class="btn btn-success btn-sm" title="Lihat Data"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a> 
  				<a href="?page=transaksi&aksi=edit&id=<?php echo $lihat['id_transaksi'] ;?>" class="btn btn-info btn-sm" title="Edit Data"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
  				<a href="?page=transaksi&aksi=delete&id=<?php echo $lihat['id_transaksi'] ;?>" onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" class="btn btn-danger btn-sm" title="Hapus Data"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>  		    
          <?php if($lihat['status']=='lunas'){
          ?>
          <a href="view/cetak_invoice.php?&id=<?php echo $lihat['id_transaksi'] ;?>" name="cetak" target="_blank" class="btn btn-info btn-sm" title="Cetak"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
          <?php
          }else{
          ?>
          <a href="#" target="_blank" class="btn btn-info btn-sm disabled" title="Cetak"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
          <?php
          }
          ?>
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
$hapus=mysql_query("DELETE from t_transaksi WHERE id_transaksi='$_GET[id]'") or die(mysql_error());
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=transaksi">';
break;
}else{
  echo "maaf aksi tidak ditemukan";
}
?>
