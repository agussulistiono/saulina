<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Team</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
                <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
                <tr><td>Umur</td><td><?php echo $umur; ?></td></tr>
                <tr><td>Status</td><td><?php echo $status; ?></td></tr>
                <tr><td>Foto </td><td><img width='100' src="<?= base_url()?>user/galeri/<?php echo $foto ?>"></td></tr>
                    <tr><td></td><td>
                    <a href="<?php echo site_url('team') ?>" class="btn btn-danger btn-icon-split">
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