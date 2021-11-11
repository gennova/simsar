<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-pencil"></i> &nbsp; Edit Kategori</h4>
        </div>
        <div class="col-md-6 text-right">
          <a href="<?= base_url('admin/kategori'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Kategori List</a>
          <a href="<?= base_url('admin/kategori/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New Kategori</a>
        </div>
        
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Kategori</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-body">
          <?php if(isset($msg) || validation_errors() !== ''): ?>
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                  <?= validation_errors();?>
                  <?= isset($msg)? $msg: ''; ?>
              </div>
            <?php endif; ?>
           
            <?php echo form_open(base_url('admin/kategori/edit/'.$kategori['idkategori']), 'class="form-horizontal"' )?> 
              <div class="form-group">
                <label for="kdprefixkat" class="col-sm-2 control-label">Kode Prefix</label>

                <div class="col-sm-9">
                  <input type="text" name="kdprefixkat" value="<?= $kategori['kdprefixkat']; ?>" class="form-control" id="kdprefixkat" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="namakategori" class="col-sm-2 control-label">Nama Kategori</label>

                <div class="col-sm-9">
                  <input type="text" name="namakategori" value="<?= $kategori['namakategori']; ?>" class="form-control" id="namakategori" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Update Kategori" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 