 <main id="main" style="padding-top: 90px;">
 <section id="contact" class="contact">
      <div class="container">
        <div class="row mt-6">
        	<div class="col-lg-12">
            <div class="row"> 
              <div class="col-md-12">
                <div class="info-box">
	          		<h3>Cara Pemesanan</h3>
                <hr style="border-color: green">
                <p>1. Pilih Jenis tarian kemudian tekan tombol "sewa"<br>
                  2. Pilih Kostum Tarian<br>
                 3. Isi formulir pemesanan<br>
                  4. Lakukan Pembayarana dan Upload Bukti Transaksi<br>
                  5. Cetak Bukti Transaksi Pembayaran</p>   
                </div>
              </div>
          	</div>
          </div>
 			
	  </div>
	          
		<div class="section-title" style="padding-top: 40px">
	          <h2>Invoice Sewa Tari</h2>
	      </div>
          <div class="col-lg-12" >

            <div class="row" style="text-align: left !important;">
              <div class="col-md-12">
                <hr><strong>
                  <p style="padding-left: 10px">Nama : <?php echo $this->session->userdata('nama')?> <br>
                  	 Alamat: <?php echo $this->session->userdata('iduser')?><br>
                     Alamat: <?php echo $this->session->userdata('alamat')?><br>
                     Telpon/No.Hp: <?php echo $this->session->userdata('no_hp')?></p>                    

                    <?php
                    //dbsewa berdasarkan id_sj
                     $sj= $sewa_jasa->row();

                    // echo $by->id_sj;
                    ?>
                    <?php
                    //dbpembayaran berdasarkan id_sewa
                     $byar= $pembayaran->num_rows();
                    ?>
                    <?php
                    //dbsewadan pembayaran berdasarkan id_user
                    $sp= $joinsewa->row();
                    ?>
                    <?php
                    if($byar <= 0){?>
                    	 <div>
                     	<a href="<?php echo base_url('Tagihan')?>" class="btn btn-danger btn-md">Riwayat Pemesanan</a>
                     
                     </div>
                        <table class="table">
		                  	<tr style="background-color: red; color: white;">
		                  	<th colspan="6">Rincian Sewa Tarian</th>
		                  	</tr>
		                  	<tr>
		                  		<th>Jenis Tarian</th>
		                  		<td>:</td>
		                  		<td><?php echo $sj->nama?></td>
		                  	</tr>
		                  	<tr>
		                  		<th>Jumlah Penari</th>
		                  		<td>:</td>
		                  		<td><?php echo $sj->jumlah_penari?></td>
		                  	</tr>
		                  	<tr>
		                  		<th>Tanggal Pertunjukan</th>
		                  		<td>:</td>
		                  		<td><?php echo $sj->tgl_acara?></td>
		                  	</tr>
		                  	<tr>
		                  		<th>Waktu Pertunjukan</th>
		                  		<td>:</td>
		                  		<td><?php echo $sj->waktu?></td>
		                  	</tr>
		                  	<tr>
		                  		<th>Total Biaya</th>
		                  		<td>:</td>
		                  		<td><p style="color: green; text-decoration: italic ">Rp.<?php echo $sj->biaya?>,-</p></td>
		                  	</tr>
		                  	<?php
		                  		$query = $this->db->query("SELECT * FROM sewa_jasa_detail join produk on sewa_jasa_detail.id_produk = produk.id_produk where sewa_jasa_detail.id_sj='$id'");
		                  	?>
		                  	<tr>
		                  		<th>Kostum</th>
		                  		<td>:</td>
		                  		<td>
		                  			<?php $no=1; foreach( $query->result() as $r){?>
		                  			<p style="color: purple"><?php echo $no++;?>. <?php echo $r->judul;?></p>
		                  			<hr>
		                  			<?php } ?>
		                  		</td>
		                  	</tr>
		                  	<tr>
		                  		<th>Status Pembayaran</th>
		                  		<td>:</td>
		                  		<td><p style="color: red">Belum Bayar</p></td>
		                  	</tr>

		                  	<tr>
		                  		<th>Upload Bukti Pembayaran</th>
		                  		<td>:</td>
		                  		<td >
		                  			<form action="<?php echo base_url('tagihan/upload_image');?>" method="post" enctype='multipart/form-data'>
		                  				<input type="hidden" name="id_sewa" id="id_sewa" value="<?= $sj->id_sj?>">
		                  				<input type="hidden" name="biaya" id="biaya" value="<?= $sj->biaya?>">
		                  				<input type="hidden" name="tgl_bayar" id="tgl_bayar" value="<?= date('Y-m-d')?>">
		                  				<input type="hidden" name="status" id="status" value="1">
		                  				<input type="file" name="filefoto" id="filefoto">
		                  				<input type="submit" name="simpan" class="btn btn-success" value="Bayar Sekarang">
		                  			</form></td>
		                  	</tr>

		                
		                  	</tbody>
		                  </table>
                    <?php }else{?>
                    	<div>
                    		<a href="<?php echo base_url('Tagihan')?>" class="btn btn-danger btn-md">Riwayat Pemesanan</a>
                    		<a href="<?php echo base_url('Tagihan/cetak_invoice/'.$id)?>" class="btn btn-success btn-md"><span class="fag fa-print"></span> Cetak</a>
                    	</div>
                    	 <table class="table">
		                  	<tr style="background-color: green; color: white;">
		                  	<th colspan="6">Rincian Sewa Tarian</th>
		                  	</tr>
			                  	<tr>
			                  		<th>Jenis Tarian</th>
			                  		<td>:</td>
			                  		<td><?php echo $sj->nama?></td>
			                  	</tr>
			                  	<tr>
			                  		<th>Jumlah Penari</th>
			                  		<td>:</td>
			                  		<td><?php echo $sj->jumlah_penari?></td>
			                  	</tr>
			                  	<tr>
			                  		<th>Tanggal Pertunjukan</th>
			                  		<td>:</td>
			                  		<td><?php echo $sj->tgl_acara?></td>
			                  	</tr>
			                  	<tr>
			                  		<th>Waktu Pertunjukan</th>
			                  		<td>:</td>
			                  		<td><?php echo $sj->waktu?></td>
			                  	</tr>
			                  	<tr>
			                  		<th>Total Biaya</th>
			                  		<td>:</td>
			                  		<td><p style="color: green; text-decoration: italic ">Rp.<?php echo $sj->biaya?>,-</p></td>
			                  	</tr>
			                  	<?php
		                  		$query = $this->db->query("SELECT * FROM sewa_jasa_detail join produk on sewa_jasa_detail.id_produk = produk.id_produk where sewa_jasa_detail.id_sj='$id'");
			                  	?>
			                  	<tr>
			                  		<th>Kostum</th>
			                  		<td>:</td>
			                  		<td>
			                  			<?php $no=1; foreach( $query->result() as $r){?>
			                  			<p style="color: green"><?php echo $no++;?>. <?php echo $r->judul;?></p>
			                  			<hr>
			                  			<?php } ?>
			                  		</td>
			                  	</tr>
			                  	<tr>
			                  		<th>Status Pembayaran</th>
			                  		<td>:</td>
			                  		<td><p style="color: green; text-decoration: italic ">Lunas</p></td>
			                  	</tr>
			                  	<tr>
			                  		<th>Bukti Pembayaran</th>
			                  		<td>:</td>
			                  		<td><img style=" width: 300px; height: 350px;"src="<?php echo base_url()?>user/bukti/<?php echo $sp->foto?>" ></td>
			                  	</tr>
		                  </table>
                    <?php }
                    ?>
                  </p></strong>
         		  
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