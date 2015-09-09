<?php
include "inc/koneksi.php";
 
function getBreadcrumbs($cat) {
$path="";
$div=" &gt; ";
 
while ($cat!=0){
$rs=mysql_query("SELECT * FROM kategori WHERE id_kategori='$cat'");
$row=mysql_fetch_array($rs);
if ($row){
$path = $div.'<a href="index.php?cat='.$row['id_kategori'].'">'.$row['nama_kategori'].'</a>'.$path;
$cat=$row["id_induk"];
}
}
 
if ($path!=""){
$path=substr($path,strlen($div));
}
 
return $path;
}
 
$id=3;
echo getBreadcrumbs($id);
?>