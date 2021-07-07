<main id="main" style="padding-top: 90px;">
  
 <!-- ======= Portfoio Section ======= -->
    <section id="portfolio" class="portfoio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Foto</h2>
         
        </div>

        <div class="row portfolio-container">
        <?php
          $hasil= $this->db->query("SELECT * from foto");
          foreach($hasil->result() as $foto){
        ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <a href="<?php echo base_url(); ?>user/galeri/<?php echo $foto->foto_galeri; ?>" data-gall="portfolioGallery" class="venobox preview-link" title="<?php echo  $foto->ket_galeri; ?>">
            <img src="<?php echo base_url(); ?>user/galeri/<?php echo $foto->foto_galeri; ?>" class="img-fluid" alt="" style="width: 500px; height: 300px;"></a>
           
          </div>
           <?php } ?>
        </div>

      </div>
    </section>
   
     <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">
           <div class="section-title">
            <h2>Videos</h2>
            <p>Videos Tari Saulina Dancer bisa anda tonton melalui chanel youyube kami di saulina dancer, silahkan subscribe dan  like chanel kami. </p>
          </div>
           <?php
            $hasil= $this->db->query("SELECT * from video");
            foreach($hasil->result() as $video){
          ?>
          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" " >
            <div class="count-box"  >
              <iframe src="<?php echo $video->link_video?>" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        <?php } ?>
          
        </div>

      </div>
    </section> -->
</main>