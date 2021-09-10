 <!-- ======= About Us Section ======= -->
 <main id="main" style="padding-top: 90px">
    <section id="about" class="about" >
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Profil</h2>
        </div>

        <div class="row">
          <?php
            $profil_data = $this->db->query("SELECT * from profil");
            foreach ($profil_data->result() as $profil)
            { ?>
          <div class="col-lg-6" data-aos="fade-right">
            <img style="width: 450px; height: 450px;" src="<?php echo base_url(); ?>user/profil/<?php echo $profil->foto_profil ?>" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3><?php echo $profil->judul?></h3>
            <p class="font-bold">
              <?php echo $profil->isi_profil?>
            </p>
          </div>
        <?php } ?>
        </div>

      </div>
    </section><!-- End About Us Section -->
    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
        </div>

        <div class="row">
            <?php
            $team_data = $this->db->query("SELECT * from team");
            foreach ($team_data->result() as $team)
            { ?>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="member" data-aos="fade-up" data-aos-delay="100">
                <div class="member-img">
                  <img style="width: 300px;height: 325px" src="<?php echo base_url()?>user/galeri/<?php echo $team->foto ?>" class="img-fluid" alt="">
                </div>
                <div class="member-info">
                  <h4><?php echo $team->nama ?></h4>
                  <span><?php echo $team->alamat ?></span>
                  <span><?php echo $team->umur ?></span>
                  <span><?php echo $team->status ?></span>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>

      </div>
    </section><!-- End Doctors Section -->
    </main>