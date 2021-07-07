<main id="main" style="padding-top: 90px;">
     <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kostum</h2>
        </div>

        <div class="row">
          <?php
          $hasil= $this->db->query("SELECT * from produk");
          foreach($hasil->result() as $produk){
          ?>
          <div class="col-lg-3 col-md-6">
            
            <div class="box" data-aos="fade-up" data-aos-delay="100">
               <div>
                <a href="#">
                 <img  style="width: 300px; height: 150px;padding-bottom: 20px" src="<?php echo base_url(); ?>user/produk_dan_jasa/<?php echo $produk->foto; ?>" alt="" class="img-fluid">
                </a>
              </div>
              <h4><span> <?php echo $produk->judul?> </span></h4>
              <ul>
                <li>Stok : <?php echo $produk->stok?></li>
                <li><?php echo 'Rp. '.number_format($produk->harga)?></li>
              </ul>
              <div class="btn-wrap">
                <a href="<?php echo site_url() ?>login" class="btn-buy">Sewa</a>
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
