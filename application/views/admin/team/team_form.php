<div class="container-fluid">
 
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Team <?php echo $button ?></h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            <div class="card-body">
              <div class="table-responsive">

              <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="id_team" id="id_team"  value="<?php echo $id_team; ?>" />
                <div class="form-group">
                    <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                </div>
                 <div class="form-group">
                    <label for="varchar">Alamat<?php echo form_error('alamat') ?></label>
                    <textarea class="form-control" name="alamat" id="alamat" placeholder="alamat"><?php echo $alamat; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="varchar">Umur  <?php echo form_error('umur') ?></label>
                    <input type="number" class="form-control" name="umur" id="umur" placeholder="umur" value="<?php echo $umur; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Status <?php echo form_error('status') ?></label>
                    <input type="text" class="form-control" name="status" id="status" placeholder="status" value="<?php echo $status; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Foto  <?php echo form_error('foto') ?></label>
                    <br>
                    <?php
                    if($button=='Update'){?>
                        <input type="file" class="form" name="foto" id="foto" placeholder="Foto " value="<?php echo $foto; ?>" />
                        <input type="hidden" name="old_image" value="<?php echo $foto ?>" />
                        <br>
                        <br>
                        <img class="img-thumbnail" width='100' src="<?php echo base_url()?>user/galeri/<?php echo $foto ?>">
                    <?php }else{ ?>
                    <input type="file" class="form" name="foto" id="foto" placeholder="Foto " value="<?php echo $foto; ?>" />
                    <?php }?>
                </div>
                
                <button type="submit" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text"><?php echo $button ?></span>
                </button>
                <a href="<?php echo site_url('admin/team') ?>" class="btn btn-danger">Cancel</a>
            </form>
            </div>
            </div>
          </div>

        </div>