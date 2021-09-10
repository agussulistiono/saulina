<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Pemesanan Sewa</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <form action="<?php echo site_url('sewa_jasa/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('admin/sewa_jasa'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                 <th>ID Trx</th>
                <th>Jenis Tarian</th>
                <th>Tanggal Sewa</th>
                <th>Tempat Pertunjukan</th>
                <th>Tanggal Acara</th>
                <th>Jumlah Penari</th>
                <th>Status</th>
                <th>Biaya</th>
                <th>Dp/Lunas</th>
                <th>Kurang Bayar</th>
                <th>User</th>
                <th>Action</th>
            </tr>

            	<?php
                  foreach ($sewa_jasa_data as $sewa_jasa)
                  {
                    ?>
	            <tr>
	            	<td width="50px"><?php echo ++$start ?></td>
	            	<td width="200px"><?php echo $sewa_jasa->id_sj ?></td>
                    <td width="200px"><?php echo $sewa_jasa->nama ?></td>
                    <td><?php echo $sewa_jasa->tgl_sewa ?></td>
                    <td><?php echo $sewa_jasa->alamat ?></td>
                    <td><?php echo $sewa_jasa->tgl_acara ?></td>
                    <td><?php echo $sewa_jasa->jumlah_penari ?> Orang</td>
                    
                    <?php
                    $pembayaran_data= $this->db->query("SELECT * from pembayaran where id_sewa='$sewa_jasa->id_sj'");
                        $pembayaran=$pembayaran_data->num_rows();  
                        if($pembayaran==NULL){
                            echo '<td><span class="badge badge-warning">Belum Bayar</span></td>';
                        }elseif($pembayaran!=NULL){
                            $query6=$this->db->query("SELECT * from pembayaran where id_sewa='$sewa_jasa->id_sj'");
                                foreach($query6->result() as $query6){
                                    if($query6->status==1){
                                    echo '<td><span class="badge badge-warning">Sudah bayar menunggu Konfirmasi Admin</span></td>';
                                    }else{
                                        echo '<td><span class="badge badge-warning">Sewa sudah diKonfirmasi </span></td>';
                                    }
                                }
                        }
                    ?>
                    
                    <td><?php echo $sewa_jasa->biaya ?></td>
                    <?php
                        if($sewa_jasa->biaya == $sewa_jasa->dp){
                         echo "<td style='color:green'>Lunas</td>";
                        }else{
                         echo "<td>".$sewa_jasa->dp."</td>";
                        }
                    ?>
                   <!--  <td><?php echo $sewa_jasa->dp ?></td> -->
                    <td><?php echo $sewa_jasa->sisa ?></td>
                    <td><?php echo $sewa_jasa->nama_user ?></td>
                    <td style="text-align:center" width="200px">
                        <a href="<?php echo base_url() ?>sewa_jasa/detail/<?php echo $sewa_jasa->id_sj ?>">Detail Pembayaran</a>
                        
                        <?php 
                        if($query6->status==1){?>
                        
                       
                       <!--  <input type="hidden" name="status" value="2">';
                        <input type="hidden" name="id_pem" value="<?php $query6->id_pem?>"> -->
                        <!-- <button type="submit" class="btn btn-success">Konfirmasi</button></form> -->
                        <!-- Modal Edit Mahasiswa-->
                        <a href="#" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal<?php  echo $query6->id_pem?>">Konfirmasi</a>
                        <div class="modal fade" id="myModal<?php  echo $query6->id_pem?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Bukti TF ID Trx  <?php echo $sewa_jasa->id_sewa ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                                <form method="post" action="<?php echo site_url('sewa_jasa/konfirmasi')?>">
                                  <div class="modal-body">
                                    <div style="padding-bottom: 30px">
                                        <img style="width: 300px;height:400px" src="<?php echo base_url()?>/user/bukti/<?php  echo $query6->foto?>">
                                    </div>

                                    <input type="hidden" name="status" value="2">
                                    <input type="hidden" name="id_pem" value="<?php echo $query6->id_pem?>">
                                  
                                     <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label"> Biaya</label>
                                        <div class="col-sm-8">
                                            <input type="text" name='bno' class="form-control" id="inputEmail3" value="<?php echo $query6->biaya ?>" readonly>
                                            <input type="hidden" name="biaya" value="<?php echo $query6->biaya?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label"> Nominal Tf </label>
                                        <div class="col-sm-8">
                                          <input type="number" name='nominal' class="form-control" id="inputEmail3" value="<?php echo $query6->dp ?>">
                                        </div>
                                    </div>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                  </div>
                                </form>
                            </div>
                          </div>
                        </div>
                        <?php }elseif ($query6->status==2) {?>
                            <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php  echo $query6->id_pem?>">update</a>
                            <div class="modal fade" id="myModal<?php  echo $query6->id_pem?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Bukti TF ID Trx  <?php echo $sewa_jasa->id_sewa ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                                <form method="post" action="<?php echo site_url('sewa_jasa/konfirmasi')?>">
                                  <div class="modal-body">
                                    <div style="padding-bottom: 30px">
                                        <img style="width: 300px;height:400px" src="<?php echo base_url()?>/user/bukti/<?php  echo $query6->foto?>">
                                    </div>

                                    <input type="hidden" name="status" value="2">
                                    <input type="hidden" name="id_pem" value="<?php echo $query6->id_pem?>">
                                  
                                     <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label"> Biaya</label>
                                        <div class="col-sm-8">
                                            <input type="text" name='bno' class="form-control" id="inputEmail3" value="<?php echo $query6->biaya ?>" readonly>
                                            <input type="hidden" name="biaya" value="<?php echo $query6->biaya?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Pelunasan</label>
                                        <div class="col-sm-8">
                                          <input type="number" name='nominal' class="form-control" id="inputEmail3" value="<?php echo $query6->dp ?>">
                                        </div>
                                    </div>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                  </div>
                                </form>
                            </div>
                          </div>
                        </div>
                        <?php }
                        ?>
                    </td>
                </tr>
                        <?php
                    }
                    ?>
                </table>
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-secondary">Total Record : <?php echo $total_rows ?></a>
                </div>
                    <div class="col-md-6 text-right">
                        <?php echo $pagination ?>
                    </div>
                </div>
              </div>
            </div>
          </div>

        </div>