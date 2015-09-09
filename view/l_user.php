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
<div class="btn-group" >
  <a href="?page=user&aksi=tambah" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Data</a>
</div>

<br/><br/>
<?php 
  if ($action == ""){
?>
<table class="table table-hover table-bordered table-striped">
  <thead>
      <tr class="info">
        <th>#</th>
        <th>ID Pelanggan</th>
        <th>Username</th>
        <th>Password</th>
        <th>Level</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include "./inc/config.php";
        $query=mysql_query("select * from t_user") or die (mysql_error());  //mengambil data tabel mahasiswa dan memasukkan nya ke variabel query
        $no=1;                    //membuat nomor pada tabel
        while($lihat=mysql_fetch_array($query)){    //mengeluarkan isi data dengan mysql_fetch_array dengan perulangan
        ?>    
      <tr>
        <td><?php echo $no++; ?></td>         <!--menampilkan nomor dari variabel no-->
        <td><?php echo $lihat['id_pelanggan'] ?></td>    <!--menampilkan data nim dari tabel mahasiswa-->
        <td><?php echo $lihat['username'] ?></td>     <!--menampilkan data nama dari tabel mahasiswa-->
        <td><?php echo "*******" ?></td>
        <td><?php echo $lihat['level'] ?></td>      <!--menampilkan data jurusan dari tabel mahasiswa-->
        
        <td align="center">
          <a href="?page=user&aksi=edit&id=<?php echo $lihat['id_pelanggan'] ;?>" class="btn btn-info btn-sm" title="Edit Data"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
          <a href="?page=user&aksi=delete&id=<?php echo $lihat['id_pelanggan'] ;?>" onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" class="btn btn-danger btn-sm" title="Hapus Data"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
      </td>
    <!--
    <td><a href="edit_mhs.php?id_mhs=<?php echo $lihat['id_mhs'] ?>">Edit</a> ||    <!--membuat link ke file dan hapus.php-->
         <!--<a href="hapus_mhs.php?id_mhs=<?php echo $lihat['id_mhs'] ?>">Hapus</a></td>    <!--membuat link ke file dan hapus.php-->
     
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
$hapus=mysql_query("DELETE from t_user WHERE id_pelanggan='$_GET[id]'") or die(mysql_error());
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=user">';
break;
}else{
  echo "maaf aksi tidak ditemukan";
}
?>
  <?php 
}
  ?>