<!-- ======= Hero Section ======= -->
   <?php
              $slider= $this->db->query("SELECT * from slider  Limit 5");
              // foreach($hasil3->result() as $agenda){
            ?>
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <?php $noslide=1; foreach ($slider->result_array() as $slide ) {
          $status= $slide['status'];
          $id=$slide['id_slider'];
          ?>
        <div class="carousel-item <?php if($noslide==1){echo 'active';}?>" style="background-image: url(<?php echo base_url(); ?>user/slider/<?php echo $slide['foto_slider'];?>)">
          <?php if($status=='1'){?>
          <div class="container">
            <h2> <span><?php echo $slide['judul_slider'];?></span></h2>
            <p><?php echo $slide['deskripsi'];?></p>
            <a href="<?php echo base_url()?>Slider/Detailslider/<?php echo $id ?>" class="btn-get-started scrollto">Read More</a>
          </div>
        <?php } ?>
        </div>
      <?php 
      $noslide++;
    } ?>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section><!-- End Hero -->
	 <main id="main">
   
   <section id="departments" class="departments">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Berita</h2>
        </div>

        
          <div class="row">
            <?php
              $hasil3= $this->db->query("SELECT * from agenda Limit 6");
              foreach($hasil3->result() as $agenda){
            ?>
            <div class="col-md-4">
                <br>
                    <div class="card">
                        <img height="200px" class="card-img-top" src="<?php echo base_url(); ?>user/agenda/<?php echo $agenda->foto_agenda ?>" >
                        <div class="card-body">
                            <h6 class="card-title"><?php echo $agenda->judul_agenda ?></h6>
                            <p class="card-text">
                              <?php $text = $agenda->isi_agenda;
                                echo substr($text, 0, 50) ?>....
                              </p>
                            <a href="<?php echo base_url('home/bacaberita/'.$agenda->id_agenda)?>" class="btn btn-success">Lihat Detail</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-success"><?php echo $agenda->tempat_agenda ?> </small>
                            <small class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;
                              Tanggal :
                              <?php echo $agenda->tgl_agenda ?></span> | <?php echo $agenda->waktu_agenda ?>
                            </small>
                        </div>
                    </div>
                    
                </div>
              <?php } ?>
          </div>
      </div>
    </section><!-- End Departments Section -->

    


    <section id="gallery" class="gallery">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Gallery</h2>
         
        </div>

        <div class="owl-carousel gallery-carousel" data-aos="fade-up" data-aos-delay="100">
          <?php
          $hasil= $this->db->query("SELECT * from foto");
          foreach($hasil->result() as $foto){
        ?>
          <a href="<?php echo base_url(); ?>user/galeri/<?php echo $foto->foto_galeri; ?>" class="venobox" data-gall="gallery-carousel"><img src="<?php echo base_url(); ?>user/galeri/<?php echo $foto->foto_galeri; ?>" alt=""></a>
          <?php } ?>
        </div>

      </div>
    </section><!-- End Gallery Section -->

     <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">
           <div class="section-title">
            <h2>Videos</h2>
            <p> Tarian Batak merupakan warisan budaya bangsa indonesia yang harus dilestarikan agar tidak tidak punah dengan perkembangan zamana</p>
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
    </section><!-- End Counts Section -->

  </main>