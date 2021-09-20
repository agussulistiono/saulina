<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>10 UNIVERSITAS FAVORIT DI INDONESIA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

<style>
    @page { size: A4 }
  
    h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }
  
    table {
        border-collapse: collapse;
        width: 100%;
    }
  
    .table th {
        padding: 8px 8px;
        border:1px solid #000000;
        text-align: center;
    }
  
    .table td {
        padding: 3px 3px;
        border:1px solid #000000;
    }
  
    .text-center {
        text-align: center;
    }
</style>
</head> 
<body class="A4"  onload="window.print()">
    <section class="sheet padding-10mm">
    	<img src="<?php echo base_url()?>assets/img/logo.png" style="width: 90px;height: 90px;clear: left; float: left;">
        <center><h2>Saulina Dancer</h2></center>
        <center><small><strong>Jl wayhalim bandar lampung, Telpon: 081208992133, Web: www.Saulinadancer.com</strong></small></center>

  		<hr>
  		<div style="padding-top: 20px; padding-bottom: 20px;text-align: center">
  		<center><h5>Laporan Pemasukan </h5></center>	
      </div>  
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
            $r=$joinsewa->row();
            $no=1;

            foreach($js->result() as $lapo){
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
           echo "<tr><td colspan='9'><p style='text-align:center'>Total Masukan</p></td><td>";echo 'Rp. '.number_format($r->jml_byr).'</td></tr>';
          }
          ?>
          </table>
    </div>
  </div>
        
    </section>
</body>
</html>