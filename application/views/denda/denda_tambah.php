<?php
$this->load->view('_partials/header');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('_partials/topbar');
$this->load->view('_partials/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  Denda
  <small>Master Data Denda</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Master Data</a></li>
    <li class="active">denda</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <form method="post" action="<?php echo base_url('denda/tambah_proses') ?>">
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">ID denda</label>
          <td><input type="text" name='id_denda' class="form-control" value="<?= $kodeunik; ?>" readonly></td>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Denda</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Harga</label>
          <input type="text" class="form-control" id="harga" name="harga" placeholder="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Keterangan</label>
          <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="">
        </div>
        
        
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="<?php  echo base_url('denda') ?>" class="btn btn-danger">Cancel </a>
      </div>
      
    </form>
  </div>
  </section><!-- /.content -->
  <?php
  $this->load->view('_partials/js');
  ?>
  <!--tambahkan custom js disini-->
  <?php
  $this->load->view('_partials/footer');
  ?>