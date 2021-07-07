<main id="main" style="padding-top: 90px;">


     <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Jenis Tarian</h2>
        </div>

        <div class="row">
         <?php
          $hasil= $this->db->query("SELECT * from jasa");
          foreach($hasil->result() as $jasa){
          ?>
          <div class="col-lg-3 col-md-6">
            
            <div class="box" data-aos="fade-up" data-aos-delay="100">
               <div>
                <a href="#">
                 <img  style="width: 300px; height: 150px;" src="<?php echo base_url(); ?>user/produk_dan_jasa/<?php echo $jasa->foto_jasa; ?>" alt="" class="img-fluid">
                </a>
              </div>
              <h4><span> <?php echo $jasa->nama;?> </span></h4>
              <ul>
                <li><p><?php echo $jasa->deskripsi;?></p></li>
                <li>

                  <?php
                   $stok = $jasa->stok_penari;
                   if($stok < 3){?>
                      <p style="color: red"> Penari Tidak Tersedia<br> Jumlah Penari Tidak Cukup</p>
                  <?php }else{?>
                      <p style="color: green"> Penari Tersedia : <?php echo $jasa->stok_penari;?> orang</p>
                  <?php } ?>
                </li>
                <li><?php echo 'Rp. '.number_format($jasa->harga)?></li>
              </ul>
              <div class="btn-wrap">
                <a href="<?php echo site_url('Tagihan/Keranjang/'.$jasa->id_jasa) ?>" class="btn-buy">Sewa</a>
              </div>
            </div>
          </div>
          <?php
        }
        ?>
          

        </div>

      </div>
    </section><!-- End Pricing Section -->
     


  </main>
