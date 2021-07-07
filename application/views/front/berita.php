<main id="main" style="padding-top: 90px;">
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
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
    </section><!-- End Featured Services Section -->
  </main>