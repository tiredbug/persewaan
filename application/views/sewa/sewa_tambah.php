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
  Tambah Transaksi Sewa
  <small>Sewa Invoice</small>
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
  <div class="panel panel-default">
    <div class="panel-body">
      <form class="form-horizontal" action="<?php echo site_url('sewa/simpan');?>" method="post">
        <div class="col-md-6">
          <div class="form-group">
            <label class="col-lg-4 control-label">ID. Transaksi</label>
            <div class="col-lg-7">
            <input type="text" id="id_sewa" name="id_sewa" class="form-control" value="<?= $kodeunik; ?>" readonly></td>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-lg-4 control-label">Tgl Transaksi</label>
          <div class="col-lg-7">
            <input type="date" id="tgl_transaksi" name="tgl_transaksi" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="col-lg-4 control-label">ID Customer</label>
          <div class="col-lg-7">
            <select name="id_customer" class="form-control" id="id_customer">
              <option>Pilih customer</option>
              <?php
              foreach($result_customer_pilihan as $row)
              {
              echo '<option value="'.$row['id_customer'].'">'.$row['nama'].'</option>';
              }
              ?>
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-lg-4 control-label">Down Payment</label>
          <div class="col-lg-7">
            <input type="number" id="dp" name="dp" class="form-control" value="">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <!-- box box-primary -->
    <div class="box box-primary">
      <!-- /modal dialog-->
      <!-- box-header -->
      <div class="box-header with-border">
        <button class="btn btn-primary tambah-form" data-toggle="modal" data-target="#mymodaladd"><i class="fa fa-plus"></i>Tambah</button>
        <!--  <button onclick="loadData()">load</button> -->
      </div>
      <!-- /box-header -->
      <!-- view data -->
      <div class="box-body">
        <table id="tabel_data_pegawai" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID Produk</th>
              <th>ID Paket</th>
              <th>Jam Pinjam</th>
              <th>Jam Harus Kembali</th>
              <th>Jam Pengembalian</th>
              <th>Jumlah</th>
              <th>Biaya</th>
              <th>Subtotal</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="table-tbody">
            
          </tbody>
        </table>
        </div><!-- /.box-body -->
        <!-- /view data -->
      </div>
      <!-- /box box-primary-->
      </div><!--/.col (right) -->
      </div> <!-- /.row -->
      </section><!-- /.content -->
      <!--tambahkan custom js disini-->
      <!-- modal dialog--><!-- modal dialog--><!-- modal dialog--><!-- modal dialog-->
      <div class="modal fade" id="mymodaladd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Tambah Data Produk</h4>
            </div>
            <form id="add-produk-modal">
              <div class="modal-body">
                <div class="form-group">
                  <label>ID Produk</label>
                  <select name="id_produk" class="form-control" id="id_produk">
                    <option>Pilih Produk</option>
                    <?php
                    foreach($result_produk_pilihan as $row)
                    {
                    echo '<option value="'.$row['id_'].'">'.$row['nama'].'</option>';
                    }
                    ?>
                  </select>
                </div>
                
                <!--  <div class="form-group">
                  <label>Jam Pinjam</label>
                  <input type="time" class="form-control" name="jumlah" placeholder="">
                </div> -->
                <div class="form-group">
                  <label>Durasi/Harga Sewa</label>
                  <select name="id_harga" class="form-control" id="id_harga">
                    <option>Pilih Durasi/Harga Sewa</option>
                    <?php
                    foreach($result_harga_pilihan as $row)
                    {
                    echo '<option value="'.$row['id_harga'].'">'.$row['durasi'].' | '.$row['harga'].'</option>';
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Jumlah</label>
                  <input type="number" class="form-control" id="jumlah" name="jumlah" onkeyup="myFunction()">
                </div>
                <div class="form-group">
                  <label>Biaya</label>
                  <input type="number" class="form-control" name="biaya" id="jml_biaya" placeholder="">
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control" id="status">
                    <option>Pilih Status</option>
                    <option>Booking</option>
                    <option>Pinjam</option>
                    <option>Kembali</option>
                    <option>Batal</option>
                  </select>
                </div>
                
                
              </div>
            </form>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" id="add_action">Simpana</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="mymodalupdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Ubah Data Produk</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>ID Produk</label>
                <input type="text" class="form-control" name="id_produk" placeholder="Nama Lengkap">
              </div>
              
              <div class="form-group">
                <label>ID Paket</label>
                <input type="text" class="form-control" name="id_paket" placeholder="Nama Lengkap">
              </div>
              <div class="form-group">
                <label>Jumlah</label>
                <input type="text" class="form-control" name="jumlah" placeholder="Nama Lengkap">
              </div>
              <div class="form-group">
                <label>Ptotongan</label>
                <input type="text" class="form-control" name="potongan" placeholder="Nama Lengkap">
              </div>
              <div class="form-group">
                <label>Biaya</label>
                <input type="text" class="form-control" id="hitung" name="biaya" placeholder="Nama Lengkap">
              </div>
              <div class="form-group">
                <label>Subtotal</label>
                <input type="text" class="form-control" name="subtotal" placeholder="Nama Lengkap">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" data-dismiss="modal" id = "update_action">Ubah</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
      <?php
      $this->load->view('_partials/js');
      ?>
      <?php
      $this->load->view('_partials/footer');
      ?>
      <script>
      $('#add_action').on('click',function (argument) {
      $(this).attr('disabled','disabled');
      var dataForm=$('#add-produk-modal').serialize();
      $.post("<?php echo site_url('sewa/insertToCart')?>",dataForm,function (argument) {
      console.log(argument);
      // body...
      })
      })
      function loadData(args) {
      //code
      $("#table-tbody").load("<?php echo site_url('sewa/tampil');?>");
      }
      loadData();
      
      function myFunction() {
    var harga = $('#id_harga').val();
    var jumlah = $('#jumlah').val();
            var req= $.ajax({
                url: "<?= base_url('sewa/hitung_otomatis') ?>",
                type: 'post',
                data: {id_harga:harga,jumlah:jumlah},
                dataType: 'json', 
            })
            req.done(function(data) {
                  $('#jml_biaya').val(data);
            })
      }
      </script>