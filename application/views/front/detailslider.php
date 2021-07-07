<main id="main" style="padding-top: 90px;">
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">

       <!--  <div class="section-title">
          <h2>Berita</h2>
        </div> -->
        <?php
          $slide = $slider->row();

        ?>
        <div class="row mt-5">
         <?php?>
         <center>
          <div class="col-md-8">
            <div class="card" style="margin-bottom: 20px">
              <img responsive src="<?php echo base_url(); ?>user/slider/<?php echo $slide->foto_slider ?>">
              <div class="card-body"><h3><?php echo $slide->judul_slider?></h3>
                <?php echo $slide->deskripsi;?>
              </div>
              </center>
            </div>
          </div>

          
          
            </div>
          </div>
        </div>
    </div>
    </section><!-- End Featured Services Section -->
  </main>