 <?php  $cart= $this->cart->contents();

 ?>
 <div class="col-md-4">
    <h4 style="color:green">Daftar Pemesanan Kostum</h4>
<form action="<?php echo base_url()?>shopping/ubah_cart" method="post" name="frmShopping" id="frmShopping" class="form-horizontal" enctype="multipart/form-data">
<?php
  if ($cart = $this->cart->contents())
    {
 ?>

<table class="table">
<tr id= "main_heading">
<td width="2%">No</td>
<td width="10%">Gambar</td>
<td width="33%">Item</td>
<td width="10%">Hapus</td>
</tr>
<?php
// Create form and send all values in "shopping/update_cart" function.
$grand_total = -1;
$i = 1;

foreach ($cart as $item):
$grand_total = $grand_total + $item['id'];
?>

<input type="hidden" name="cart[<?php echo $item['id'];?>][id]" value="<?php echo $item['id'];?>" />
<input type="hidden" name="cart[<?php echo $item['id'];?>][rowid]" value="<?php echo $item['rowid'];?>" />
<input type="hidden" name="cart[<?php echo $item['id'];?>][name]" value="<?php echo $item['name'];?>" />
<input type="hidden" name="cart[<?php echo $item['id'];?>][price]" value="<?php echo $item['price'];?>" />
<input type="hidden" name="cart[<?php echo $item['id'];?>][foto]" value="<?php echo $item['foto'];?>" />
<input type="hidden" name="cart[<?php echo $item['id'];?>][qty]" value="<?php echo $item['qty'];?>" />
<tr>
<td><?php echo $i++; ?></td>
<td><img style="width: 100px; height: 70px;" class="img-responsive" src="<?php echo base_url() . 'user/produk_dan_jasa/'.$item['foto']; ?>"/></td>
<td><?php echo $item['name']; ?></td>
<td><a href="<?php echo base_url()?>Tagihan/hapus/<?php echo $idtari;?>/<?php echo $item['rowid'];?>" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove">x</i></a></td>
<?php endforeach; ?>
</tr>
<tr>
<td colspan="4"><b>Total Kostum:  <?php echo $grand_total; ?></b></td>
</tr>
<tr><td colspan="4" align="right">
  
  <a href="<?php echo base_url()?>Tagihan/form_tari/<?php echo $idtari?>" class="btn btn-sm btn-success" >Process Check Out</a></td>

</tr>
</table>
<?php
    }
  else
    {
      echo "<p style='color:red'>Keranjang Pemesanan masih kosong</p>"; 
    } 
?>
</form>


  <!-- Modal Penilai -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
        <form method="post" action="<?php echo base_url()?>Tagihan/hapus/all">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Konfirmasi</h4>
        </div>
        <div class="modal-body">
      Anda yakin mau mengosongkan Shopping Cart?
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-sm btn-default">Ya</button>
        </div>
        
        </form>
      </div>
      
    </div>
  </div>
  <!--End Modal-->
    </div>
  </div>
</div>
 <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Bandar Lampung</h3>
              <p>
                Jl. Pensiun <br>
                Kode Pos 35135, Bandar Lampung<br><br>
                <strong>Phone:</strong> 082282672468<br>
                <strong>Email:</strong> saulina@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url()?>">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url()?>kontak">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url()?>jasa">Sewa Tari</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Subscribe Untuk mendapatkan Notifikasi </p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Saulina Dancer</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medicio-free-bootstrap-theme/ -->
        Designed by <a href="#">Admin Saulina</a>
      </div>
    </div>
  </footer>