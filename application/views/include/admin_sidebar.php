<?php 
$cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);  
?>  

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url() ?>public/dist/img/download.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= ucwords($this->session->userdata('name')); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
	  <?php if($this->rbac->check_module_permission('barang')): ?> 
      <ul class="sidebar-menu">
        <li id="dashboard" class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="dashboard"><a href="<?= base_url('admin/dashboard'); ?>"><i class="fa fa-circle-o"></i> Dashboard</a></li>
          </ul>
        </li>
      </ul>
	 <?php endif; ?>
  
      <?php if($this->rbac->check_module_permission('admin')): ?>  
       <ul class="sidebar-menu">
        <li id="admin" class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="admin"><a href="<?= base_url('admin/admin'); ?>"><i class="fa fa-circle-o"></i> Admin List</a></li>
            <li id=""><a href="<?= base_url('admin/profile'); ?>"><i class="fa fa-circle-o"></i>Admin Profile</a></li>
            <li id=""><a href="<?= base_url('admin/profile/change_pwd'); ?>"><i class="fa fa-circle-o"></i>Change Password</a></li>
          </ul>
        </li>
      </ul>
      <?php endif; ?>
        
      <?php if($this->rbac->check_module_permission('admin_roles')): ?>  
       <ul class="sidebar-menu">
        <li id="admin_roles" class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Roles & Permissions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="admin_roles"><a href="<?= base_url('admin/admin_roles'); ?>"><i class="fa fa-circle-o"></i> Roles & Permissions</a></li>
          </ul>
        </li>
      </ul>
      <?php endif; ?>

	  <?php if($this->rbac->check_module_permission('barang')): ?>  
       <ul class="sidebar-menu">
        <li id="admin" class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>DATA</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="admin"><a href="<?= base_url('admin/barang'); ?>"><i class="fa fa-circle-o"></i> Data Barang</a></li>
			<li id="admin"><a href="<?= base_url('admin/vbarangrusak'); ?>"><i class="fa fa-circle-o"></i>Data Barang Rusak</a></li>	
			<li id="admin"><a href="<?= base_url('admin/barangkomputer'); ?>"><i class="fa fa-circle-o"></i> Data Komputer</a></li>
          </ul>	  
        </li>
      </ul>
      <?php endif; ?>
	  
	  <?php if($this->rbac->check_module_permission('barang')): ?>  
       <ul class="sidebar-menu">
        <li id="admin" class="treeview">
          <a href="#">
            <i class="fa fa-handshake-o"></i> <span>TRANSAKSI</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="admin"><a href="<?= base_url('admin/peminjaman'); ?>"><i class="fa fa-circle-o"></i>Peminjaman Barang</a></li>
          </ul>
		  <ul class="treeview-menu">
            <li id="admin"><a href="<?= base_url('admin/pengajuan'); ?>"><i class="fa fa-circle-o"></i>Pengajuan Barang</a></li>
          </ul>
        </li>
      </ul>
      <?php endif; ?>	
	  
	  <?php if($this->rbac->check_module_permission('barang')): ?>  
       <ul class="sidebar-menu">
        <li id="admin" class="treeview">
          <a href="#">
            <i class="fa fa-file-pdf-o"></i> <span>REPORT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="admin"><a href="<?= base_url('admin/vlokasi'); ?>"><i class="fa fa-circle-o"></i>Data per Ruangan</a></li>
			<!--<li id="admin"><a href="<?= base_url('admin/vperkategori'); ?>"><i class="fa fa-circle-o"></i>Data per Kategori</a></li>-->
			<!--<li id="admin"><a href="<?= base_url('admin/vsumbarang'); ?>"><i class="fa fa-circle-o"></i>Data Semua Barang</a></li>-->
			<li id="admin"><a href="<?= base_url('admin/vbarangtahun'); ?>"><i class="fa fa-circle-o"></i>Data Perolehan</a></li>			
          </ul>
        </li>
      </ul>
      <?php endif; ?>	  
	  
      <?php if($this->rbac->check_module_permission('kategori')): ?>  	  
      <ul class="sidebar-menu">
        <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i> <span>REFERENSI</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Klasifikasi Barang
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?= base_url('admin/kategori'); ?>"><i class="fa fa-circle-o"></i>Kategori</a></li>
				<li class=""><a href="<?= base_url('admin/subkategori'); ?>"><i class="fa fa-circle-o"></i>Sub-Kategori</a></li>
				<li class=""><a href="<?= base_url('admin/jenis'); ?>"><i class="fa fa-circle-o"></i>Jenis Barang</a></li>
              </ul>
            </li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Lain-lain
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
        <li class=""><a href="<?= base_url('admin/munitypii'); ?>"><i class="fa fa-circle-o"></i>Data Unit YPII</a></li>        
        <li class=""><a href="<?= base_url('admin/mlokasi'); ?>"><i class="fa fa-circle-o"></i>Lokasi</a></li>               
			  <li class=""><a href="<?= base_url('admin/mkondisi'); ?>"><i class="fa fa-circle-o"></i>Kondisi Barang</a></li>
			  <li class=""><a href="<?= base_url('admin/msumberdana'); ?>"><i class="fa fa-circle-o"></i>Sumber Dana</a></li>
			  <li class=""><a href="<?= base_url('admin/mmotherboard'); ?>"><i class="fa fa-circle-o"></i>Motherboard</a></li>
			  <li class=""><a href="<?= base_url('admin/mprocessor'); ?>"><i class="fa fa-circle-o"></i>Processor</a></li>
			  <li class=""><a href="<?= base_url('admin/mos'); ?>"><i class="fa fa-circle-o"></i>OS</a></li>
			  <!--<li class=""><a href="<?= base_url('admin/mstatus'); ?>"><i class="fa fa-circle-o"></i>Status</a></li>-->					  
              </ul>
            </li>
          </ul>
        </li>
      </ul>	 
	  <?php endif; ?>
	  
    </section>
    <!-- /.sidebar -->
  </aside>

  
<script>
  $("#<?= $cur_tab ?>").addClass('active');
</script>
