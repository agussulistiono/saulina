 <main id="main" style="padding-top: 90px;">
 <section id="contact" class="contact">
      <div class="container">
        <div class="row mt-6">
        	<div class="col-lg-4">
            <div class="row"> 
              <div class="col-md-12">
                <div class="info-box">
	          		<h3>Pembayaran</h3>
	          		<hr style="border-color: green">
	          		<p>Silahkan Lakukan Pembayaran dan upload bukti transaksi</p>    
                </div>
              </div>
          	</div>
          </div>
          <div class="col-lg-4">
            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
	          		<h3>Ketentuan Pembayaran</h3>
	          		<hr style="border-color: green">
	          		<p>Silahkan Lakukan Pembayaran dan upload bukti transaksi</p>  
                </div>
              </div>
          	</div>
          </div>
          <div class="col-lg-4"> 
            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
	          		<h3>Peringatan</h3>
	          		<hr style="border-color: green">
	          		<p>Silahkan Lakukan Pembayaran dan upload bukti transaksi</p>
                </div>
              </div>
          	</div>
          </div>
 			
	  </div>
	          
		<div class="section-title" style="padding-top: 40px">
	          <h2>Tagihan</h2>
	      </div>
          <div class="col-lg-12" >

            <div class="row" style="text-align: left !important;">
              <div class="col-md-12">
                <hr><strong>
                  <p style="padding-left: 10px">Nama : <?php echo $this->session->userdata('nama')?> <br>
                     Alamat: <?php echo $this->session->userdata('alamat')?><br>
                     Telpon/No.Hp: <?php echo $this->session->userdata('no_hp')?>

                  </p></strong>
                  
                  
         		<table class="table">
                  	<tr style="background-color: green; color: white;">
                  		<th colspan="6">Rincian Sewa Tarian</th>
                  	</tr>
                  	<tr>
                  		<th>No</th>
                  		<th>Tarian</th>
                      <th>Tgl. Pemesanan</th>
                  		<th>Biaya</th>
                  		<th>Status</th>
                  		<th>Bukti Pembayaran</th>
                  		<th></th>
                  	</tr>
                  	<tbody>
                      <?php echo form_open_multipart('Tagihan/upload_image')?>
                      <?php 
                    			$row = $a->row(); 
                    			$id_user= $row->id_user;
                    			$query=$this->db->query('SELECT * from sewa_jasa inner join jasa on sewa_jasa.id_jasa=jasa.id_jasa where id_user="'.$id_user.'"');

                    			$no=1;
                    			foreach ($query->result() as $rowid) {
                    			$id_sj = $rowid->id_sj;
                    			$id_sewa = $rowid->id_jasa;
                    			$biaya = $rowid->biaya;
                          $tgl_pesan= $rowid->tgl_acara;
                    			?> 
                    		<tr>
                          <!--input to pembayaran-->
                		    <input type="hidden" name="id_sewa" value="<?php echo $rowid->id_sj ?>">
                				<input type="hidden" name="biaya" value="<?php echo $rowid->biaya ?>">
                        <!--input to pembayaran--> 
                				<td><?php echo  $no++;?></td>
                				<td><?php echo $rowid->nama?></td>
                        <td><?php echo tgl_indo($tgl_pesan)?></td>
                    		<td>Rp.<?php echo number_format($rowid->harga)?></td>
                       
                        <!--input to pembayaran--> 
                        <?php $tglbayar = date("Y/m/d");?>
                        <input type='hidden' name='tgl_bayar' value='<?php echo $tglbayar ?>'>
                        <input type='hidden' name='status' value='1'>
                        <!--input to pembayaran--> 
                          
                    			<?php $bayar=$this->db->query("SELECT * from pembayaran where id_sewa Like 'T%' AND id_sewa='$id_sj'");
                              	$b=$bayar->num_rows();
                            	
                              if($b == 0){?>
                            		<td><span style="color: red">Belum Bayar<span></td>
                            		<td><input type='file' name="filefoto" /></td>
                                
                            		<td><!-- <button type="submit" class="btn btn-success" onclick="javasciprt: return confirm(\'Apakah anda yakin ?\')">Kirim</button> -->
                                  <input type="submit" name="upload" value="Kirim" />
                    				<!-- <a href="#" class="btn btn-warning">Cetak</a></ --><td><tr>
                            	<?php }
                            	else if($b > 0){
                            		$h=$this->db->query("SELECT * from pembayaran where id_sewa='$id_sj'");
                            		$r=$h->row();
                            		if($r->status == 1){
                            		?>
                            		<td><span class='badge badge-warning'>Sudah bayar tunggu notifikasi dari admin</span></td>
                            		 <td><img width='100' src="<?= base_url()?>user/bukti/<?php echo $r->foto ?>"></td>
                            		 <!-- <td><a href="#" class="btn btn-warning">Cetak</a></td> --><tr>
                            		
      
                    			
                    			<?php }else{?>
                    				<td><span class='badge badge-warning'>Sewa sudah dinotifikasi</span>
                    				<td><img width='100' src="<?= base_url()?>user/bukti/<?php echo $r->foto ?>"></td>
                    				<!-- <td><a href="#" class="btn btn-warning">Cetak</a></td> --><tr>
                    			 <?php }
                    			}

                    			} echo form_close(); ?>
                  		
                  		                  	</tbody>
                  	<tr style="background-color: green;color: white;">
                  		<th colspan="6">Rincian Sewa Kostum</th>
                  	</tr>
                  	<tr>
                  		<th>No</th>
                  		<th>Kostum</th>
                      <th>Tgl. Pemesanan</th>
                  		<th>Biaya</th>
                  		<th>Status</th>
                  		<th>Bukti Pembayaran</th>
                  		<th></th>
                  	</tr>
                  	<tbody>
                     <?php echo form_open_multipart('Tagihan/upload_image')?> 
                        <?php  $ropro = $a->row();
                          $id_user= $row->id_user;
                          $querypro=$this->db->query('SELECT * from sewa_produk inner join produk on sewa_produk.id_produk=produk.id_produk where id_user="'.$id_user.'"');

                          $no=1;
                          foreach ($querypro->result() as $rowp) {
                          $id_sp   = $rowp->id_sp;
                          $id_sewa = $rowp->id_produk;
                          $biaya   = $rowp->biaya;
                          $nama    = $rowp->judul;
                          $tgl_pesan= $rowp->tgl_acara;
                          $harga   = $rowp->harga;
                          ?> 
                        <tr>
                          <!--input to pembayaran-->
                        <input type="hidden" name="id_sewa" value="<?php echo $id_sp ?>">
                        <input type="hidden" name="biaya" value="<?php echo $biaya ?>">
                        <!--input to pembayaran--> 
                        <td><?php echo  $no++;?></td>
                        <td><?php echo $nama?></td>
                        <td><?php echo tgl_indo($tgl_pesan);?></td>
                        <td>Rp.<?php echo number_format($harga)?></td>
                        
                        <!--input to pembayaran--> 
                        <?php $tglbayar = date("Y/m/d");?>
                        <input type='hidden' name='tgl_bayar' value='<?php echo $tglbayar ?>'>
                        <input type='hidden' name='status' value='1'>
                        <!--input to pembayaran--> 

                          <?php $bayarp=$this->db->query("SELECT * from pembayaran where id_sewa Like 'K%' AND id_sewa='$id_sp'");
                                $bp=$bayarp->num_rows();
                              
                              if($bp == 0){?>
                                <td><span style="color: red">Belum Bayar<span></td>
                                <td><input type='file' name="filefoto" /></td>
                                <td><input type="submit" name="upload" value="Kirim" />
                            <!-- <a href="#" class="btn btn-warning">Cetak</a></ --><td><tr>
                              <?php }
                              else if($bp > 0){
                                $hp=$this->db->query("SELECT * from pembayaran where id_sewa='$id_sp'");
                                $rp=$hp->row();
                                if($rp->status == 1){
                                ?>
                                <td><span class='badge badge-warning'>Sudah bayar tunggu notifikasi dari admin</span></td>
                                 <td><img width='100' src="<?= base_url()?>user/bukti/<?php echo $rp->foto ?>"></td>
                                 <!-- <td><a href="#" class="btn btn-warning">Cetak</a></td> --><tr>
                          <?php }else{?>
                            <td><span class='badge badge-warning'>Sewa sudah dinotifikasi</span>
                            <td><img width='100' src="<?= base_url()?>user/bukti/<?php echo $rp->foto ?>"></td>
                            <!-- <td><a href="#" class="btn btn-warning">Cetak</a></td> --><tr>
                           <?php }
                          }
                          } ?>
                      
                      <?php
                      echo form_close();
                      ?>
                    </tbody>
                  </table>
              </div>
      
            </div>

          </div>

          

        </div>

      </div>
    </section><!-- End Contact Section -->
    </main>

    <?php
      function tgl_indo($tanggal){
        $bulan = array (
          1 =>   'Januari',
          'Februari',
          'Maret',
          'April',
          'Mei',
          'Juni',
          'Juli',
          'Agustus',
          'September',
          'Oktober',
          'November',
          'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
       
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
      }
    ?>