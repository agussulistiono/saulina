<div class="container-fluid">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
</div>


<!-- Content Row -->

<div class="row">

  <!-- Area Chart -->
  <div class="col-xl-12 col-lg-12">
  <?php  ?>
  <form method="post" name="form1" action="?proses=cetak">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      Bulan
      <div class="col-xl-4">
      <select name="bulan" id="bulan"  class="form-control">
      <option value="01">Januari</option>
      <option value="02">Februari</option>
      <option value="03">Maret</option>
      <option value="04">April</option>
      <option value="05">Mei</option>
      <option value="06">Juni</option>
      <option value="07">Juli</option>
      <option value="08">Agustus</option>
      <option value="09">September</option>
      <option value="10">Oktober</option>
      <option value="12">November</option>
      <option value="12">Desember</option>
      </select>
      </div>
      <div class="col-xl-4">
      <select name="tahun" id="tahun" class="form-control">
      <?php
        $mulai= date('Y') - 50;
        for($i = $mulai;$i<$mulai + 100;$i++){
            $sel = $i == date('Y') ? ' selected="selected"' : '';
            echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
        }
      ?>
      </select>
      </div>
      <button type="submit" name="submit" class="btn btn-success">Tampilkan</button>
      <!-- <button type="submit" class="btn btn-warning" class="">Cetak</button>  --> 
      <a href="<?php echo base_url(); ?>laporan" class="btn btn-danger">Reset Filter</a>
      </form>
      </div>
      <?php
         $proses=$this->input->get('proses',TRUE);
         $bulan=$this->input->post('bulan',TRUE);
         $tahun=$this->input->post('tahun',TRUE);
         if($proses=='cetak'){
         ?> 

      <div style="padding-top: 20px; padding-bottom: 20px;text-align: center">
        
      </div>  
      <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>TRX</th>
                <th>Jenis Tarian</th>
                <th>Tgl Pertunjukan</th>
                <th>Waktu Pertunjukan</th>
                <th>Tgl Bayar</th>
                <th>Jumlah Penari</th>
                <th>Biaya</th>
                <th>Total</th>
                </tr>
                <?php
                   $hasil3= $this->db->query("SELECT * from pembayaran where month(tgl_bayar)='$bulan' AND year(tgl_bayar)='$tahun' AND status='2'");
                   $a=$hasil3->num_rows();
                   if($a==0){
                    echo "<tr><td colspan='10'>Maaf Data Yang anda cari tidak ada</td></tr>";
                   }else{

                    $joinsewa = $this->db->query("SELECT *, SUM(pembayaran.biaya) AS jml_byr from pembayaran join sewa_jasa on pembayaran.id_sewa = sewa_jasa.id_sj join jasa on sewa_jasa.id_jasa=jasa.id_jasa where pembayaran.status='2'And month(pembayaran.tgl_bayar)='$bulan' And year(pembayaran.tgl_bayar)='$tahun'");
                    $no=1;
                   foreach($joinsewa->result() as $lap){
              
                    echo '<tr><td>'.$no++.'</td>
                       <td>'.$lap->id_sewa.'</td>
                       <td>'.$lap->nama.'</td>
                       <td>'.$lap->tgl_acara.'</td>
                       <td>'.$lap->waktu.'</td>
                       <td>'.$lap->alamat.'</td>
                       <td>'.$lap->tgl_bayar.'</td>
                       <td>'.$lap->jumlah_penari.'</td>
                       <td>'.$lap->harga.'</td>
                       <td>'.$lap->biaya.'</td>
                       
                  </tr>';
                   
                  }
                  echo "<tr><td colspan='8'>Total Masukan </td>
                        <td>";echo 'Rp. '.number_format($lap->jml_byr).'</td></tr>';
                }
                ?>

                </table>
         <?php }else{
           ?>
            <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>TRX</th>
                <th>Jenis Tarian</th>
                <th>Tgl Pertunjukan</th>
                <th>Waktu Pertunjukan</th>
                <th>Tempat</th>
                <th>Tgl Bayar</th>
                <th>Jumlah Penari</th>
                <th>Biaya</th>
                <th>Total</th>
                </tr>
           <?php
            $hasil4= $this->db->query("SELECT * from pembayaran ");
            $a=$hasil4->num_rows();
            if($a==0){
             echo "<tr><td colspan='10'><center>Maaf Data Yang anda cari tidak ada</center></td></tr>";
            }else{
           $joinsewa = $this->db->query("SELECT *, SUM(pembayaran.biaya) AS jml_byr from pembayaran join sewa_jasa on pembayaran.id_sewa = sewa_jasa.id_sj join jasa on sewa_jasa.id_jasa=jasa.id_jasa where pembayaran.status='2'");
            $no=1;
            foreach($joinsewa->result() as $lapo){
             echo '<tr><td>'.$no++.'</td>
                       <td>'.$lapo->id_sewa.'</td>
                       <td>'.$lapo->nama.'</td>
                       <td>'.$lapo->tgl_acara.'</td>
                       <td>'.$lapo->waktu.'</td>
                       <td>'.$lapo->alamat.'</td>
                       <td>'.$lapo->tgl_bayar.'</td>
                       <td>'.$lapo->jumlah_penari.'</td>
                       <td>'.$lapo->harga.'</td>
                       <td>'.$lapo->biaya.'</td>
                       
                  </tr>';

           }
           echo "<tr><td colspan='9'>Total Masukan </td><td>";echo 'Rp. '.number_format($lapo->jml_byr).'</td></tr>';
          }
         } ?>
          </table>
    </div>
  </div>

</div>