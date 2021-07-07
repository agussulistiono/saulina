<main id="main" style="padding-top: 90px;">
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2> Form Sewa Kostum Saulina</h2>
           <p style="background-color: green;color: white">
            <?php echo $this->session->flashdata('success')?>
          </p> 
        </div>
           <form action="<?php echo site_url('User_login/produk_action/'.$id_produk) ?>" method="post">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Tgl Sewa</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control" name="tgl_sewa" value="<?php echo date("Y/m/d");?>">
                </div>
              </div> 
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="exampleFormControlTextarea1" required name="alamat" rows="3"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Tgl Acara</label>
                <div class="col-sm-10">
                  <input type="date" name="tgl_acara" class="form-control" id="tgl_acara" required placeholder="Password">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label" >Biaya</label>
                <div class="col-sm-10">
                  <input type="text" readonly name="total"  class="form-control" id="b1" onkeyup="sum();" value="<?php echo $biaya; ?>" />
                  <input type="hidden" class="form-control" name="id_produk" id="id_produk" placeholder="Id produk" value="<?php echo $id_produk; ?>" />
                <?php
                $email =$this->session->userdata('email');
                $liat=$this->db->query("SELECT * FROM user where email='$email'");
                foreach ($liat->result() as $user) {
                ?>
                <input type="hidden" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $user->id_user; ?>" />
                <?php }?>
                <input type="hidden" class="form-control" name="status" id="status" placeholder="status" value="1" />
                <?php 
                        $liatdata=$this->db->query("SELECT * FROM sewa_produk");
                        $idsementara=$liatdata->num_rows()+1;
                        $id_sp="K$idsementara";
                        $id_sp=substr($id_sp,-8);
                        ?>
                        <input type="hidden"  class="form-control" name="id_sp" value="<?php echo $id_sp; ?>" /><br><br>
                </div>
              </div>
               <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah Pesan</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" required name="jml_pesan" onkeyup="sum();" id="jml_pesan" placeholder="Jumlah Pesan" value="<?php echo $jml_pesan; ?>" />
                  
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Total Pesanan</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control" name="biaya" id="biaya" placeholder="Biaya" value="<?php echo $biaya; ?>" />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-10">
                  <button type="submit"  class="btn btn-primary">Kirim</button>
                </div>
              </div>

            </form>
            
            
            <script>
            function sum(){
                var txtFirstNumberValue=document.getElementById('b1').value;
                var txtSecondNumberValue=document.getElementById('jml_pesan').value;
                var result = parseInt(txtFirstNumberValue)*parseInt(txtSecondNumberValue);
                if(!isNaN(result)){
                    document.getElementById('biaya').value = result;
                }
              }

              function succes(){
                Swal.fire(
                  'The Internet?',
                  'That thing is still around?',
                  'question'
                )
              }
            </script>
            
      </div>
    </section><!-- End Featured Services Section -->
  </main>