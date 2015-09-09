<?php
function writeMsg($tipe){
	if ($tipe=='save.sukses') {
		$MsgClass = "alert-success";
		$Msg = "<strong>Sukses!</strong> Data berhasil disimpan. Selamat yah!";	
	} else 
	if ($tipe == 'save.gagal') {
		$MsgClass = "alert-danger";
		$Msg = "<strong>Oops!</strong> Data gagal disimpan!";
	}
	else 
	if ($tipe == 'update.sukses') {
		$MsgClass = "alert-success";
		$Msg = "<strong>Sukses!</strong> Data berhasil diupdate. Selamat yah!";
	}
	else 
	if ($tipe == 'update.gagal') {
		$MsgClass = "alert-danger";
		$Msg = "<strong>Oops!</strong> Data gagal diupdate!";
	}
	else 
	if ($tipe == 'paket.sama') {
		$MsgClass = "alert-danger";
		$Msg = "<strong>Maaf!</strong> Kode paket sudah terpakai!";
	}
	else 
	if ($tipe == 'pelanggan.sama') {
		$MsgClass = "alert-danger";
		$Msg = "<strong>Maaf!</strong> ID Pelanggan sudah terpakai!";
	}
	else 
	if ($tipe == 'data.lebih') {
		$MsgClass = "alert-danger";
		$Msg = "<strong>Maaf!</strong> Anda cuma bisa input 5 data!";
	}
	else 
	if ($tipe == 'invoice.sama') {
		$MsgClass = "alert-danger";
		$Msg = "<strong>Maaf!</strong> No Invoice sudah ada!";
	}


echo "<div class=\"alert alert-dismissible ".$MsgClass."\">
  	  <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
  	  ".$Msg."
	  </div>";		  
}

function TanggalIndo($date){
	$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
	$tahun = substr($date, 0, 4);
	$bulan = substr($date, 5, 2);
	$tgl   = substr($date, 8, 2);
 
	$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;		
	return($result);
}
?>