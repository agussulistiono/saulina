<?php  $cart= $this->cart->contents();

 ?>
 
<main id="main" style="padding-top: 90px;"> 
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2> Form Sewa Tari Saulina</h2>
          <p>Jika Anda ingin menyewa jasa ini, silakan isi form ini.</p>
        </div>
        <?php

          $now   = date('Y-m-d');
        ?>
         <?php
              if($this->session->flashdata('gagal')){?>

                   <div class="container">
                      <div class="alert alert-danger"><?php echo $this->session->flashdata('gagal');?></div>
                  </div> 

              <?php } 
         ?>
       
           <form action="<?php echo site_url('tagihan/jasa_tari/'.$id_jasa) ?>" method="post" name="sewa_tari" >
            <?php
                if ($cart = $this->cart->contents())
                  {?>
              <?php
              // Create form and send all values in "shopping/update_cart" function.
              $grand_total = 0;
              $i = 1;

              foreach ($cart as $item):
              $grand_total = $grand_total + $item['qty'];
              ?>
            <input type="hidden" name="cart[<?php echo $item['id'];?>][id]" value="<?php echo $item['id'];?>" />
            <input type="hidden" name="cart[<?php echo $item['id'];?>][rowid]" value="<?php echo $item['rowid'];?>" />
            <input type="hidden" name="cart[<?php echo $item['id'];?>][name]" value="<?php echo $item['name'];?>" />
            <input type="hidden" name="cart[<?php echo $item['id'];?>][price]" value="<?php echo $item['price'];?>" />
            <input type="hidden" name="cart[<?php echo $item['id'];?>][foto]" value="<?php echo $item['foto'];?>" />
            <input type="hidden" name="cart[<?php echo $item['id'];?>][qty]" value="<?php echo $item['qty'];?>" />
          <?php  endforeach; ?>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Tgl Pemesanan</label>
                <div class="col-sm-10">
                  <input type="text" name="now" class="form-control" value="<?php echo $now;?>" readonly>
                  <input type="hidden" class="form-control" readonly name="id_jasa" id="id_jasa" value="<?php echo $id_jasa?>" >
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Tempat Pertunjukan</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="tempat" id="tempat" rows="3" required ></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Tgl Pertunjukan</label>
                <div class="col-sm-10">
                  <input type="date" name="tgl_acara" id="tgl_acara" class="form-control"  placeholder="To Date(dd/mm/yyyy)" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Waktu Pertunjukan</label>
                <div class="col-sm-10">
                  <input type="time" name="waktu" class="form-control"  placeholder="Password" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label" >Biaya</label>
                <div class="col-sm-10">
                  <input readonly type="text" name="total"  id="b1" onkeyup="sum();" class="form-control" value="<?php echo $biaya;?>">
                  <input type="hidden" class="form-control" name="id_jasa" id="id_jasa"  value="<?php echo $id_jasa; ?>" />
                  <?php
                  $email =$this->session->userdata('email');
                  $liat=$this->db->query("SELECT * FROM user where email='$email'");
                  foreach ($liat->result() as $user) {
                  ?>
                  <input type="hidden" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $user->id_user; ?>" />
                  <?php }?>
                  <input type="hidden" class="form-control" name="status" id="status" placeholder="status" value="1" />
                  <?php 
                          $liatdata=$this->db->query("SELECT * FROM sewa_jasa");
                          $idsementara=$liatdata->num_rows();
                          $idsementara=$liatdata->num_rows()+1;
                          $id_sj="T$idsementara";
                          $id_sj=substr($id_sj,-8);
                    ?>
                          <input type="hidden"  class="form-control" name="id_sj" value="<?php echo $id_sj; ?>" /><br><br>
                </div>
              </div>
                  <?php 
                          $stok = $this->db->query("SELECT * FROM jasa where id_jasa='$id_jasa'");
                          $barisstok = $stok->row();
                          $setokawal = $barisstok->stok_penari;
                    ?>

                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah Penari Tersedia</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="stoka" id="stoka" onkeyup="sum();" value="<?php echo $setokawal; ?>" readonly />
                  </div>
                </div>
                 <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah Penari</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" required name="jml_penari" onkeyup="sum();" id="jml_penari" placeholder="Jumlah Penari" />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Total Pesanan</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control" name="biaya" id="biaya" placeholder="Biaya" value="<?php echo $biaya; ?>" />
                  </div>
                </div>
              <div class="form-group row" >
                <div class="col-sm-10">
                  <input type="submit" name="submit" class="btn btn-success"  value="Sewa Sekarang" >
                </div>
              </div>
            </form>
      </div>
    </section><!-- End Featured Services Section -->
  </main>


<?php }?>


<script type="text/javascript">



      function sum(){
                var txtFirstNumberValue=document.getElementById('b1').value;
                var txtSecondNumberValue=document.getElementById('jml_penari').value;
                var result = parseInt(txtFirstNumberValue)*parseInt(txtSecondNumberValue);
                if(!isNaN(result)){
                    document.getElementById('biaya').value = result;
      
                }
    }
     


    // function valid()
    // {
    //   if(document.sewa_tari.tgl_acara.value < document.sewa_tari.now.value){
    //     alert("Tanggal sewa minimal H-1!");
    //     return false;
    //   }
    //   else if(document.sewa_tari.tgl_acara.value == document.sewa_tari.now.value){
    //     alert("Tanggal sewa minimal H-1!");
    //     return false;
    //   }

    // return false;
    // }
   
     
    
  
  </script>