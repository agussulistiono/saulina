<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-icon rotate-n-15">
   <img style="width: 90px;height: 60px" src="<?= base_url()?>assets/img/logo.png ?>">
  </div>
  <div class="sidebar-brand-text mx-3">Saulina Dancer<sup> Admin</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="home">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li> 

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span>About</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Custom About:</h6>
      <a class="collapse-item" href="<?php echo base_url('Profil')?>">Profil</a>
      <a class="collapse-item" href="<?php echo base_url('Team')?>">Team</a>
      <a class="collapse-item" href="<?php echo base_url('Kontak')?>">Kontak</a>
    </div>
  </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-fw fa-wrench"></i>
    <span>Pengguna</span>
  </a>
  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Custom Akun:</h6>
      <a class="collapse-item" href="<?php echo base_url('admin/admin')?>">Admin</a>
      <a class="collapse-item" href="<?php echo base_url('admin/user')?>">User</a>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Addons
</div>

<!-- Nav Item - Pages Collapse Menu -->

<li class="nav-item">
  <a class="nav-link" href="<?php echo base_url('admin/jasa')?>">
    <i class="fas fa-fw fa-folder"></i>
    <span>Jenis Tarian</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="<?php echo base_url('admin/produk')?>">
    <i class="fas fa-fw fa-folder"></i>
    <span>Kostum Tari</span></a>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGaleri" aria-expanded="true" aria-controls="collapseGaleri">
    <i class="fas fa-fw fa-folder"></i>
    <span>Galeri</span>
  </a>
  <div id="collapseGaleri" class="collapse" aria-labelledby="headingGaleri" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Components Galeri:</h6>
      <a class="collapse-item" href="<?php echo base_url('Foto')?>">Foto</a>
      <a class="collapse-item" href="<?php echo base_url('Video')?>">Video</a>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link" href="<?php echo base_url('slider')?>">
    <i class="fas fa-fw fa-folder"></i>
    <span>Slider</span></a>
</li> 
<li class="nav-item">
  <a class="nav-link" href="<?php echo base_url('sewa_jasa')?>">
    <i class="fas fa-fw fa-folder"></i>
    <span>Sewa Tari</span></a>
</li>
<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="<?php echo base_url('Laporan')?>">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Report</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="<?php echo base_url('Agenda')?>">
    <i class="fas fa-fw fa-table"></i>
    <span>Agenda</span></a>
</li>


