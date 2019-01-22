<?php
$this->load->view('_partials/header');
?>
<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
<!--tambahkan custom css disini-->
<?php
$this->load->view('_partials/topbar');
$this->load->view('_partials/sidebar');
?>
<!-- Content Header (Page header) -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  Sewa
  <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Sewa</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">
          <a href="<?php echo base_url('sewa/tambah'); ?>" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Tambah</a>
          </h3>
          <div class="box-tools">
            
            
          </div>
          </div><!-- /.box-header -->
          <div class="box-body table-responsive">
            
            <!-- DataTables -->
            <div class="row">
              <div class="col-xs-12">
                <div class="table-responsive">
                  <table class="table table-hover datatable"  width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th width="150">ID sewa</th>
                        <th width="150">ID Karyawan</th>
                        <th width="150">Tgl Transaksi</th>
                        <th width="150">ID Customer</th>
                        <th width="150">Tgl Pinjam</th>
                        <th width="150">Tgl Kembali</th>
                        <th width="150">Down Payment (DP)</th>
                        <th width="150">Subtotal</th>
                        <th width="150">Status</th>
                        
                        <th width="200px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($result as $sewa): ?>
                      <tr>
                        <td >
                          <?php echo $sewa->id_sewa ?>
                        </td>
                        <td >
                          <?php echo $sewa->id_karyawan ?>
                        </td>
                        <td >
                          <?php echo $sewa->tgl_transaksi ?>
                        </td>
                        <td >
                          <?php echo $sewa->id_customer ?>
                        </td>
                        <td >
                          <?php echo $sewa->tgl_pinjam ?>
                        </td>
                        <td >
                          <?php echo $sewa->tgl_kembali ?>
                        </td>
                        <td >
                          <?php echo $sewa->dp ?>
                        </td>
                        <td >
                          <?php echo $sewa->subtotal ?>
                        </td>
                        <td>
                          <?php echo $sewa->status ?>
                        </td>
                        
                        <td>
                          <a href="<?php echo base_url('sewa/ubah/'.$sewa->id_sewa) ?>"
                          class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Edit</a>
                          <button onclick="deleteConfirm('<?php echo base_url('sewa/delete/'.$sewa->id_sewa) ?>')"
                          href="" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i> Hapus </button>
                        </td>
                        
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
            </div><!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <!-- /.content -->
    <?php
    $this->load->view('_partials/js');
    ?>
    <!--tambahkan custom js disini-->
    <?php
    $this->load->view('_partials/footer');
    ?>
    <script src="<?php echo base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
    
    $(function () {
    $('.datatable').DataTable()
    
    })
    </script>