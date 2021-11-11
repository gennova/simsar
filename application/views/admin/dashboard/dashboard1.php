
<!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">

      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">:: Aplikasi Pendataan Sarpras Sekolah YPII Bandung</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
			  
		<div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="<?= base_url() ?>public/dist/img/inv1.png" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Data Barang</h3>
              <h5 class="widget-user-desc">Berdasarkan Kategori</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
				<li><a href="#">Total Semua Barang <span class="pull-right badge bg-yellow"><?= $all_barang; ?></span></a></li>
                <li><a href="<?= base_url('admin/barangmeubel'); ?>">Meubelair <span class="pull-right badge bg-yellow"><?= $all_meubel; ?></span></a></li>
                <li><a href="<?= base_url('admin/barangelektronik'); ?>">Elektronik<span class="pull-right badge bg-yellow"><?= $all_elektronik; ?></span></a></li>
                <li><a href="<?= base_url('admin/baranglain'); ?>">Perlengkapan Lain <span class="pull-right badge bg-yellow"><?= $all_lain; ?></span></a></li>
                <li><a href="<?= base_url('admin/barangmusik'); ?>">Alat Musik <span class="pull-right badge bg-yellow"><?= $all_alatmusik; ?></span></a></li>
				<li><a href="<?= base_url('admin/barangolahraga'); ?>">Alat Olahraga <span class="pull-right badge bg-yellow"><?= $all_alatolahraga; ?></span></a></li>
				<li><a href="<?= base_url('admin/baranglaboratorium'); ?>">Laboratorium <span class="pull-right badge bg-yellow"><?= $all_laboratorium; ?></span></a></li>
				<li><a href="<?= base_url('admin/barangteknopreneur'); ?>">Teknopreneur <span class="pull-right badge bg-yellow"><?= $all_teknopreneur; ?></span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
				
		<div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
              <div class="widget-user-image">
                <img class="img-circle" src="<?= base_url() ?>public/dist/img/inv-5.png" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Data Barang</h3>
              <h5 class="widget-user-desc">Berdasarkan Sumber Dana</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="<?= base_url('admin/vbarangbos'); ?>">BOS <span class="pull-right badge bg-blue"><?= $all_barangbos; ?></span></a></li>
                <li><a href="<?= base_url('admin/vbarangyys'); ?>">Yayasan<span class="pull-right badge bg-blue"><?= $all_barangyys; ?></span></a></li>
                <li><a href="<?= base_url('admin/vbarangsum'); ?>">Sumbangan <span class="pull-right badge bg-blue"><?= $all_barangsum; ?></span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>				
				
		<div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-red">
              <div class="widget-user-image">
                <img class="img-circle" src="<?= base_url() ?>public/dist/img/inv-2.png" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Lainnya</h3>
              <h5 class="widget-user-desc">Informasi lainnya</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="<?= base_url('admin/vbarangpinjam'); ?>">Barang yang dipinjam<span class="pull-right badge bg-red"><?= $all_barangpinjam; ?></span></a></li>
                <li><a href="<?= base_url('admin/vbarangrusak'); ?>">Barang Rusak<span class="pull-right badge bg-red"><?= $all_barangrusak; ?></span></a></li>				
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>					
		
              </div>
            </div>
          </div>
        </div>
        <!-- /.col -->
		
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">:: Cetak Laporan Barang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
			  
		<div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-green">
              <div class="widget-user-image">
                <img class="img-circle" src="<?= base_url() ?>public/dist/img/inv-11.png" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Report</h3>
              <h5 class="widget-user-desc">Cetak Data Barang</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="<?= base_url('admin/vlokasi'); ?>">Barang per Ruangan <span class="pull-right badge bg-green">lihat</span></a></li>
                <li><a href="<?= base_url('admin/vperkategori'); ?>">Barang per Kategori<span class="pull-right badge bg-green">lihat</span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
		
              </div>
            </div>
          </div>
        </div>		
      </div>
      <!-- /.row -->

      <!-- Main row -->

      <!-- /.row -->
    </section>
    <!-- /.content -->

<script>
  $("#dashboard1").addClass('active');
</script>