<div class="container-fluid">
          <?php
            $pemesan = $this->db->query("SELECT * from sewa_jasa join user on sewa_jasa.id_user = user.id_user where sewa_jasa.id_sj='$idsj'");
            $tari  = $this->db->query("SELECT * from sewa_jasa join jasa on sewa_jasa.id_jasa= jasa.id_jasa where sewa_jasa.id_sj='$idsj'");

            $hasil = $this->db->query("SELECT * from sewa_jasa join sewa_jasa_detail on sewa_jasa.id_sj = sewa_jasa_detail.id_sj join produk on sewa_jasa_detail.id_produk= produk.id_produk where sewa_jasa_detail.id_sj='$idsj'");

            $psn = $pemesan->row();
            $tr = $tari->row();
            $row = $hasil->row();

          ?>
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Detail Pembayaran</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
              <tr><td>Nama Pemesan</td><td><?php echo $psn->nama_user; ?></td></tr>
              <tr><td>No. Telpon/ WA</td><td><?php echo $psn->no_hp; ?></td></tr>
               <tr><td>Jenis Tarian</td><td><?php echo $tr->nama; ?></td></tr>
               <tr><td>Tgl Pertunjukan</td><td><?php echo $tr->tgl_acara; ?></td></tr>
               <tr><td>Lokasi Pertunjukan</td><td><?php echo $tr->alamat; ?></td></tr>
                <tr><td>Kostum</td><td>
                  <?php foreach($hasil->result() as $r){?>
                  <p style="color: green"><?php echo $r->judul; ?></p>
                  <?php } ?>
                    
                  </td></tr>
                <tr><td>Biaya</td><td><?php echo $biaya; ?></td></tr>
                <tr><td>Bukti Pembayaran</td><td><img width='100' src="<?= base_url()?>user/bukti/<?php echo $foto ?>"></td></tr>
                <tr><td>Tanggal Bayar</td><td><?php echo $tgl_bayar; ?></td></tr>
                    <tr><td></td><td>
                    <a href="<?php echo site_url('sewa_jasa') ?>" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">

                    </span>
                    <span class="text">Cancel</span>
                  </a>    
                </td></tr>
                </table>
              </div>
            </div>
          </div>

        </div>