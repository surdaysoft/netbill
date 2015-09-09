<?php
include "../inc/config.php";
$perusahaan = mysql_query("SELECT * FROM t_setting limit 1") or die (mysql_error());
$seting =mysql_fetch_array($perusahaan);
$id_transaksi=$_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Cetak Invoice | Surday Net</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="../css/default/bootstrap.css" />
    <link href="../css/custom-style.css" rel="stylesheet" />
    <script type="text/javascript" src="../js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body >
<div class="container">
<?php
include "../inc/config.php";
include "../inc/function.php";
//$query = "SELECT * FROM t_transaksi WHERE id_transaksi='$id_transaksi'";
$query = "SELECT t_pelanggan.*, t_paket.id_paket,t_paket.nama as nama_paket,t_paket.harga, t_transaksi.* from t_pelanggan, t_paket, t_transaksi WHERE t_pelanggan.id_pelanggan=t_transaksi.id_pelanggan AND t_pelanggan.id_paket=t_paket.id_paket AND t_transaksi.id_transaksi='$id_transaksi'";
$result = mysql_query($query) or die(mysql_error());
while ($data = mysql_fetch_array($result)){
?>
<!--
    <div class="row pad-top-botm ">
        <div class="col-lg-6 col-md-6 col-sm-6 ">
            <img src="../img/invoice.jpg" style="padding-bottom:20px;" />
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">

            <strong>   <?php echo $seting['nama'] ?>.</strong>
            <br />
            <i>Alamat :</i> <?php echo $seting['alamat'] ?>
            
            <br />
            Indonesia.

        </div>
    </div>
-->
    <div  class="row contact-info">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <hr />
            <img src="../img/logo.jpg" class="thumbnail span3" style="display: inline; float: left; margin-right: 20px; width: 100px; height: 100px">
            <h2 style="margin: 15px 0 10px 0; color: #000;"><?php echo $seting['nama'] ?></h2>
            <div style="color: #000; font-size: 16px; font-family: Tahoma" class="clearfix"><b>Alamat : <?php echo $seting['alamat'] ?></b></div>
             
            <hr />
        </div>
    </div>
    <div  class="row text-center contact-info">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <hr />
             <span>
                 <strong>#<?php echo $data['id_transaksi'] ?> </strong>
             </span>
             
            <hr />
        </div>
    </div>
    <div  class="row pad-top-botm client-info">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <h4>  <strong>Data Pelanggan </strong></h4>
            <b>Nama :</b> <?php echo $data['nama'] ?>.
            <br />
            <b>Alamat :</b> <?php echo $data['alamat'] ?>.
            <br />
            <b>No HP :</b> <?php echo $data['no_hp'] ?>
            <br />
            <b>E-mail :</b> <?php echo $data['email'] ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">

            <h4>  <strong>Data Pembayaran </strong></h4>
            Tanggal Bayar :  <?php echo TanggalIndo($data['tgl_bayar']); ?>
            <br />
            Tanggal Validasi :  <?php echo TanggalIndo($data['tgl_bayar']); ?>
            <br />            
            <b>Status :  <?php echo ucfirst($data['status']) ?> </b>
            
            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Description</th>
                        <th>Speed.</th>
                        <th>Sub Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Paket Internet 2</td>
                        <td><?php echo $data['nama_paket'] ?></td>
                        <td><?php echo number_format( $data['nominal'] , 0 , ',' , '.' ); ?></td>
                    </tr>
                    

                    </tbody>
                </table>
            </div>
            <hr />
            <div class="ttl-amts">
                <h5>  Total : <?php echo number_format( $data['nominal'] , 0 , ',' , '.' ); ?> </h5>
            </div>
            <hr />
            <div class="ttl-amts">
                <h5>  Sudah termasuk PPN 10% </h5>
            </div>
            <hr />
            <div class="ttl-amts">
                <h4> <strong>Total : <?php echo number_format( $data['nominal'] , 0 , ',' , '.' ); ?></strong> </h4>
            </div>
        </div>
    </div>
</div>
<?php 
};
?>
</body>
</html>