

<?php
//dbsewa berdasarkan id_sj
 $sj= $sewa_jasa->row();

// echo $by->id_sj;

//dbpembayaran berdasarkan id_sewa
 $byar= $pembayaran->num_rows();
//dbsewadan pembayaran berdasarkan id_user
$sp= $joinsewa->row();
?>                  
<style>
    body {
        background: grey;
        margin-top: 90px;
        margin-bottom: 120px;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Saulina Dancer - Lampung</title>
  <meta content="Sewa Tari||Tarian Saulina Dancer| Seni" name="description">
  <meta content="Sewa Tari Lampung" name="keywords">

  <!-- Favicons --> 
  <link href="<?php echo base_url(); ?>assets/img/favicon.png" rel="icon">
  <link href="<?php echo base_url(); ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="<?php echo base_url(); ?>https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/aos/aos.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
                        <div class="col-md-6">
                            <img style="width: 300px; height: 150px" src="<?php echo base_url('/assets/img/logo_saulina.png');?>">
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-1">Invoice #<?php echo $id?></p>
                            <p class="text-muted">Tanggal: <?php echo date('d-m-Y')?></p>
                        </div>
                    </div>
                    <hr class="my-5">
                    <div class="row pb-5 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">Informasi Client</p>
                            <p class="mb-1"><?php echo $this->session->userdata('nama')?></p>
                            <p class="mb-1"><?php echo $this->session->userdata('alamat')?></p>
                            <p class="mb-1"><?php echo $this->session->userdata('no_hp')?></p>
                        </div>
                    </div>

                    <div class="row p-5" style="padding-top: 10px !important">
                        <div class="col-md-12">
                            <table class="table">
                            <tr style="background-color: green; color: white;">
                                <th colspan="6">Rincian Pembayaran Sewa Tarian</th>
                                <tr>
                                    <th class="border-0 text-uppercase small font-weight-bold">Jenis Tarian</th>
                                    <td>:</td>
                                    <td><?php echo $sj->nama?></td>
                                </tr>
                                <tr>
                                    <th class="border-0 text-uppercase small font-weight-bold">Jumlah Penari</th>
                                    <td>:</td>
                                    <td><?php echo $sj->jumlah_penari?></td>
                                </tr>
                                <tr>
                                    <th class="border-0 text-uppercase small font-weight-bold">Tanggal Pertunjukan</th>
                                    <td>:</td>
                                    <td><?php echo $sj->tgl_acara?></td>
                                </tr>
                                <tr>
                                    <th class="border-0 text-uppercase small font-weight-bold">Waktu Pertunjukan</th>
                                    <td>:</td>
                                    <td><?php echo $sj->waktu?></td>
                                </tr>
                                <tr>
                                    <th class="border-0 text-uppercase small font-weight-bold">Total Biaya</th>
                                    <td>:</td>
                                    <td><p style="color: green; text-decoration: italic ">Rp.<?php echo $sj->biaya?>,-</p></td>
                                </tr>
                                <?php
                                  $query = $this->db->query("SELECT * FROM sewa_jasa_detail join produk on sewa_jasa_detail.id_produk = produk.id_produk where sewa_jasa_detail.id_sj='$id'");
                                ?>
                                <tr>
                                  <th>Kostum</th>
                                  <td>:</td>
                                  <td>
                                    <?php $no=1; foreach( $query->result() as $r){?>
                                    <p style="color: green"><?php echo $no++;?>. <?php echo $r->judul;?></p>
                                    <hr>
                                    <?php } ?>
                                  </td>
                                </tr>
                                <tr>
                                    <th class="border-0 text-uppercase small font-weight-bold">Status Pembayaran</th>
                                    <td>:</td>
                                    <td><p style="color: green; text-decoration: italic ">Lunas</p></td>
                                </tr>
                                <tr>
                                    <th class="border-0 text-uppercase small font-weight-bold">Bukti Pembayaran</th>
                                    <td>:</td>
                                    <td><img style=" width: 150px; height: 200px;"src="<?php echo base_url()?>user/bukti/<?php echo $sp->foto?>" ></td>
                                </tr>
                            </tr>
                                
                            </table>
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse bg-success text-white p-4">
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Total Pembayaran</div>
                            <div class="h2 font-weight-light">Rp. <?php echo $sj->biaya?>,-</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-light mt-5 mb-5 text-center small">by : <a class="text-light" target="_blank" href="#">Saulina Dancer </a></div>

</div>
<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/counterup/counterup.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/venobox/venobox.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    window.print();
</script>

</body>
</html>