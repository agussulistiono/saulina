<?php
$user = $this->db->query('SELECT *  from user');
$ruser= $user->num_rows();

$agenda = $this->db->query('SELECT *  from agenda');
$ragenda= $agenda->num_rows();

$jasa = $this->db->query('SELECT *  from jasa');
$js= $jasa->num_rows();

$joinsewa = $this->db->query("SELECT  SUM(biaya) AS jml_byr from pembayaran ");
$total=0;
foreach ($joinsewa->result() as $k) {
  $total =+ $k->jml_byr;
}
?>

<div class="container-fluid" style="padding-bottom: 35%;">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>


<!-- Content Row -->

 <div class="row">

      <!-- Earnings (Monthly) Card Example -->

      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                           <a href="<?php echo base_url('admin/jasa')?>">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                             Jenis Tarian</div></a>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $js?></div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-calendar fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <a href="<?php echo base_url('laporan')?>"><div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                             Laporan Pemasukan</div></a>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?php echo number_format($total, 0, ',', '.')?></div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <a href="<?php echo base_url('agenda')?>">
                          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Agenda
                          </div></a>
                          <div class="row no-gutters align-items-center">
                              <div class="col-auto">
                                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $ragenda?></div>
                              </div>
                          </div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <a href="<?php echo base_url('admin/user')?>">
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                              User</div></a>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ruser?></div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-comments fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
 <!--  <div class="row">
     <div class="col-xs-12 mb-4">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Saulina Dancer</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="<?php echo base_url('assets/img/daftar.jpg')?>" alt="...">

                                    </div>
                                    <p>Add some quality, svg illustrations to your project courtesy of <a
                                            target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                        constantly updated collection of beautiful svg images that you can use
                                        completely free and without attribution!</p>
                                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                        unDraw &rarr;</a>
                                </div>
                            </div>

  </div>
 -->