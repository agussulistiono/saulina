
<div class="container" style="padding-top: 100px"><br/>
  <h2>Pilih Kostum  </h2>
  <hr/>
  <div class="row">
    <div class="col-md-8">
      <div class="row"> 
        <?php
        $hasil= $this->db->query('Select * from produk');
        foreach ($hasil->result_array() as $r){?>
          <div class="col-lg-6 col-md-6 mb-4">
              <div class="kotak">
              <form method="post" action="<?php echo base_url();?>Tagihan/tambah" method="post" accept-charset="utf-8">
                <a href="#"><img class="img-thumbnail" src="<?php echo base_url() . 'user/produk_dan_jasa/'.$r['foto']; ?>" style="width: 500px;height: 200px;"/></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#"><?php echo $r['judul'];?></a>
                  </h4>
                    <?php $hrg = $r['harga'];
                   if( $hrg <= 0){?>
                      <p style="color: green"> Biaya : Free</p>
                   <?php } else{?> 
                        <p  style="color: green">Biaya : Rp. <?php echo number_format($hrg,0,",","."); ?>
                     <?php } ?>
                  <p class="card-text">
                       <?php $text = $r['deskripsi'];
                                echo substr($text, 0, 50) ?>....
                   </p>
                </div>
                <div class="card-footer">
                  <a href="<?php echo base_url();?>shopping/detail_produk/<?php echo $r['id_produk'];?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-search"></i> Detail</a> 
                  <input type="hidden" name="idtari" value="<?php echo $idtari;?>" />
                  <input type="hidden" name="id" value="<?php echo $r['id_produk']; ?>" />
                  <input type="hidden" name="nama" value="<?php echo $r['judul']; ?>" />
                  <input type="hidden" name="harga" value="<?php echo $r['harga']; ?>" />
                  <input type="hidden" name="foto" value="<?php echo $r['foto']; ?>" />
                  <input type="hidden" name="qty" value="1" />
                  <button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Beli</button>
                </div>
                </form>
              </div>
            </div>

      <!-- 
        <div class="col-md-4">
          <div class="thumbnail">
            <img width="200" src="<?php echo base_url()?>user/produk_dan_jasa/<?php echo $r['foto']; ?>?>">
            <div class="caption">
              <h4><?php
                  echo $r['judul']; ?></h4>
              <div class="row">
                <div class="col-md-7">
                  <p><?php echo $r['deskripsi']; ?></p>
                  
                </div>
                <div class="col-md-5">
                  <?php ?>
                </div>
              </div>
              <button class="add_cart btn btn-success btn-block" data-produkid="<?php echo $r['id_produk']; ?>" data-produknama="<?php echo $r['judul']; ?>" data-produkharga="<?php echo $r['harga']; ?>" >Add To Cart</button>
            </div>
          </div>
        </div> -->
       <?php 

     }
        ?>
        
      </div>

    </div>

    

