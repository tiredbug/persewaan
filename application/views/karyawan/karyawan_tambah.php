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
  Karyawan
  <small>Master Data</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Examples</a></li>
    <li class="active">Blank page</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
<div class="box">
  <form method="post" action="<?php echo base_url('karyawan/tambah_proses') ?>">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">ID karyawan</label>
        <td><input type="text" name='id_karyawan' class="form-control" value="<?= $kodeunik; ?>" readonly></td>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">ID User</label>
        <input type="text" class="form-control" id="id_user" name="id_user" placeholder="">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Alamat</label>
        <input type="textarea" class="form-control" id="alamat" name="alamat" placeholder="">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">No Handphone</label>
        <input type="textarea" class="form-control" id="no_hp" name="no_hp" placeholder="">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1"">Jabatan</label>
        <select name="jenis_id" class="form-control" id="jenis_id">
          <option>Pilih Jabatan</option>
          <option>Pegawai</option>
          <option>SPV</option>
          <option>Manajer</option>
          
        </select>
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="<?php  echo base_url('karyawan') ?>" class="btn btn-danger">Cancel </a>
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