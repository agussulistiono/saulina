<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Slider <?php echo $button ?></h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                    <label for="varchar">Judul <?php echo form_error('deskripsi') ?></label>
                    <input type="text" class="form-control" name="judul_slider" id="deskripsi" placeholder="Judul slider" value="<?php echo $judul_slider; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Deskripsi <?php echo form_error('deskripsi') ?></label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea>
                </div>
                 <div class="form-group">
                    <label for="varchar">Status Aktif <?php echo form_error('status') ?></label>
                    <div class="form-check form-check-solid">
                        <input class="form-check-input" id="flexRadioSolid1" type="radio" name="status" <?php if(isset($status) && $status=="1") echo "checked";?>  value="<?php echo $status?>">
                        <label class="form-check-label" for="flexRadioSolid1">Y</label>
                    </div>
                    <div class="form-check form-check-solid">
                        <input class="form-check-input" id="flexRadioSolid2" type="radio" name="status"<?php if(isset($status) && $status=="0")echo "checked";?>  value="<?php echo $status?>">
                        <label class="form-check-label" for="flexRadioSolid2">N</label>
                    </div>
                   
                </div>
                <div class="form-group">
                    <label for="varchar">Foto slider <?php echo form_error('foto_slider') ?></label>
                    <br>
                    <?php
                    if($button=='Update'){
                        ?>
                        <input type="file" class="form" name="foto_slider" id="foto_slider" placeholder="Foto slider" value="<?php echo $foto_slider; ?>" />
                        <input type="hidden" name="old_image" value="<?php echo $foto_slider ?>" />
                        <br>
                        <br>
                        <img class="img-thumbnail" width='100' src="<?php echo base_url()?>user/slider/<?php echo $foto_slider ?>">
                    <?php }else{ ?>
                    <input type="file" class="form" name="foto_slider" id="foto_slider" placeholder="Foto slider" value="<?php echo $foto_slider; ?>" />
                    <?php }?>
                </div>
                <div class="form-group">
                    <label for="date">Tgl input slider <?php echo form_error('tglinput_slider') ?></label>
                    <?php 
                    if($button=='Create'){
                        $tglinput_slider = date("Y/m/d");
                    }else{
                        $tglinput_slider = $tglinput_slider;
                    }
                    ?>
                    <input type="text" class="form-control" name="tglinput_slider" id="tglinput_slider" placeholder="Tglinput slider" value="<?php echo $tglinput_slider; ?>" readonly />
                </div>
               
                <?php 
                    if($button=='Create'){
                        $liatdata=$this->db->query("SELECT * FROM foto");
                        $idsementara=$liatdata->num_rows()+1;
                        $id_slider="$idsementara";
                        $id_slider=substr($id_slider,-8);
                        ?>
                        <input type="hidden" name="id_slider" value="<?php echo $id_slider; ?>" /> 
                        <?php
                    }else{
                        ?>
                    <input type="hidden" name="id_slider" value="<?php echo $id_slider; ?>" /> <?php
                    }
                    ?>
                <button type="submit" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text"><?php echo $button ?></span>
                </button>
                <a href="<?php echo site_url('admin/foto') ?>" class="btn btn-danger">Cancel</a>
            </form>
            </div>
            </div>
          </div>

        </div>