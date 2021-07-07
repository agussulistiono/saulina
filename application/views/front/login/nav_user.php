 <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="<?php echo base_url()?>" class="logo mr-auto"><img src="<?php echo base_url() ?>assets/img/logo_nama.png" alt="" style="width: 150px; height:100px;"></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo mr-auto"><a href="index.html">Medicio</a></h1> -->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="<?php echo site_url() ?>User_login/home">Jenis Tarian </a></li>
          <li class="drop-down"><a href="">Selamat Datang <?php echo $this->session->userdata('nama')?></a>
          <ul>
           <!--   <li><a href="<?php echo site_url() ?>Tagihan/Keranjang">Keranjang Pemesanan</a></li> --><!-- 
             <li><a href="<?php echo site_url() ?>User_login/profil">Profil</a></li> -->
            <li><a href="<?php echo site_url() ?>Tagihan">Riwayat Tagihan</a></li>
            <!-- <li><a href="<?php echo site_url() ?>tagihan/riwayat">Riwayat Pembayaran</a></li> -->
            <li><a href="<?php echo site_url() ?>User_login/logout">Logout</a></li>
          </ul>
        </li> 

        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->