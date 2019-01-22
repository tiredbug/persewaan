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
  Form Tambah Harga
  <small>Master Data</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Master Data</a></li>
    <li class="active">Harga</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
<div class="box">
  <form method="post" action="<?php echo base_url('harga/tambah_proses') ?>">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">ID Harga</label>
        <td><input type="text" name='id_harga' class="form-control" value="<?= $kodeunik; ?>" readonly></td>
      </div>
      <div class="form-group">
        <label for="id_produk" class="control-label"><span class="text-danger">*</span>ID Produk</label>
        <div class="form-group">
          <select name="id_produk" class="form-control">
            <option>Pilih Produk</option>
            <?php
            foreach($result_produk_pilihan as $row)
            {
            echo '<option value="'.$row['id_produk'].'">'.$row['nama'].'</option>';
            }
            ?>
          </select>
          <span class="text-danger"><?php echo form_error('id_produk');?></span>
        </div>
      </div>

      <div class="form-group">
        <!--  <?php
        print_r($result_Harga_pilihan);
        ?> -->
        <label for="id_paket" class="control-label">Durasi (Lama Sewa)</label>
        <div class="form-group">
          <select name="durasi" class="form-control" id="durasi">
          <option>Pilih Durasi</option>
          <option>6 Jam</option>
          <option>12 Jam</option>
          <option>24 Jam</option>
        </select>
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Harga</label>
        <input type="text" class="form-control" id="harga" name="harga" placeholder="">
      </div>
      
      
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="<?php  echo base_url('harga') ?>" class="btn btn-danger">Cancel </a>
    </div>
    
  </form>
<div class="box">
  </section><!-- /.content -->
  <?php
  $this->load->view('_partials/js');
  ?>
  <!--tambahkan custom js disini-->
  <?php
  $this->load->view('_partials/footer');
  ?>