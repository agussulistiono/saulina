<main id="main" style="padding-top: 90px;">
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2> Detail Kostum</h2>
          <p><?php echo $judul;?></p>
        </div>
          <div class="row">
          <div class="col-lg-6" data-aos="fade-right">
            <img src="<?php echo base_url(); ?>user/produk_dan_jasa/<?php echo $foto_produk; ?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3><?php echo $judul;?></h3>
            <p class="font-italic">
              <?php echo $deskripsi;?>
            </p>
            <?php
              if($stock > 0){?>
                <p style="text-decoration-style: bold;color: green;">
                Stok : <?php echo $stock;?><br><br>Rp. <?php echo $harga;?>,-
                </p>
              <?php }else{?>
                <p style="text-decoration-style: bold;color: red;">
                Stok : <?php echo $stock;?><br><br>Rp. <?php echo $harga;?>,-
                </p>
            <?php } ?>
           
            <a href="<?php echo site_url('user_login/form_kostum/'.$id_kostum) ?>" class="btn btn-success">Sewa</a>
              
            </p>
          </div>
        </div>

      </div>
    </section><!-- End Featured Services Section -->
  </main>