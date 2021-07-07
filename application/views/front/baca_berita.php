<main id="main" style="padding-top: 90px;">
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">

       <!--  <div class="section-title">
          <h2>Berita</h2>
        </div> -->
        <div class="row mt-5">
         <?php?>
          <div class="col-md-8">
            <div class="card" style="margin-bottom: 20px">
              <img responsive src="<?php echo base_url('user/agenda/'.$foto_agenda)?>">
              <div class="card-body"><h3><?php echo $judul_agenda?></h3>
                <?php echo $isi_agenda?>
              </div>
            </div>
          </div>

          
          <div class="col-md-4">
            <div class="card">
                <div class="class-header">
                  <center>
                  <h3>Berita Lainya</h3>
                  </center>
                  <hr>
                </div>
                <div class="card-body">
                  <?php
                  foreach ($berita->result() as $row) {
                    $foto = $row->foto_agenda;
                    $id = $row->id_agenda;
                    ?>
                  <div class="row" style="padding-top: 20px">

                    <div class="col-3">
                      <img style="width: 90px;height: 60px"src="<?php echo base_url('user/agenda/'.$foto)?>">
                    </div>

                    <div class="col-9" style="padding-left: 50px">
                      <h4 style="font-size: 18px">
                        <a href="<?php echo base_url('Home/bacaberita/'.$id)?>"> 
                          <?php $text = $row->judul_agenda;
                                echo substr($text, 0, 30) ?></a>
                      </h4>
                    </div>
                    <div class="clearfix">
                      <br>
                    </div>
                    
                  </div>
                  <hr>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
    </div>
    </section><!-- End Featured Services Section -->
  </main>