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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
  <!-- <link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet"> -->
  <link href="<?php echo base_url(); ?>assets/css/sweetalert2.min.css" rel="stylesheet">
</head>
<body class="hold-transition login-page">

  <div class="container padding-bottom-3x mb-2 mt-5">
      <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10">
             
              <form class="card mt-4" method="post" action="<?php echo base_url()?>resetnew?code=<?php echo $_GET['code']; ?>&user=<?php echo $_GET['user']; ?>">
                <center> <strong> <p class="login-box-msg" style="padding-top: 40px !important">MASUKAN PASSWORD BARU</p></strong></center>
                  <div class="card-body">
                      <div class="form-group"> <label for="email-for-pass">Masukan Sandi baru</label> <input class="form-control" type="password" name="password" id="email-for-pass" required=""> </div>
                        <div class="form-group"> <label for="email-for-pass">Konfirmasi Sandi baru</label> <input class="form-control" type="password" name="repassword" id="email-for-pass" required="">
                        </div>
                  </div>
                  <div class="card-footer"> <button class="btn btn-success" name="reset" type="submit">Reset Password</button> 
              </form>
          </div>
      </div>
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
</body>
</html>
