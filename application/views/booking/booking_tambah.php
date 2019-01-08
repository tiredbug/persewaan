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
  Tambah Transaksi Booking
  <small>Booking Invoice</small>
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
        <form class="form-horizontal" action="<?php echo site_url('peminjaman/simpan');?>" method="post">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-4 control-label">ID. Transaksi</label>
                    <div class="col-lg-7">
                        <input type="text" id="id_booking" name="id_booking" class="form-control" value="<?= $kodeunik; ?>" readonly></td>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-4 control-label">Tgl Transaksi</label>
                    <div class="col-lg-7">
                        <input type="date" id="tgl_transaksi" name="tgl_transaksi" class="form-control" value="date('Y-m-d')">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Tgl Pinjam</label>
                    <div class="col-lg-7">
                        <input type="date" id="tgl_pinjam" name="tgl_pinjam" class="form-control" value="">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-4 control-label">Tgl Kembali</label>
                    <div class="col-lg-7">
                        <input type="date" id="tgl_kembali" name="tgl_kembali" class="form-control" value="">
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
                

                <!-- <div class="form-group">
                    <label class="col-lg-4 control-label">ID Karyawan</label>
                    <div class="col-lg-7">
                        <input type="date" id="tgl_kembali" name="tgl_kembali" class="form-control" value="">
                    </div>
                </div> -->

                <div class="form-group">
                    <label class="col-lg-4 control-label">Status</label>
                    <div class="col-lg-7">
                        <select name="status" class="form-control" id="status">
                            <option>Pilih Status</option>
                            <option>Booking</option>
                            <option>Pinjam</option>
                            <option>Kembali</option>
                            <option>Batal</option>
                            
                        </select>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

<div class="panel panel-success">
    <div class="panel-heading">
        Data Produk
    </div>
    
    <div class="panel-body">
        <div class="form-inline">
            <div class="form-group">
                    <label class="col-lg-4 control-label">ID Produk</label>
                    <div class="col-lg-7">
                        <select name="id_customer" class="form-control" id="id_customer">
                            <option>Pilih Produk</option>
                            <?php 
                            foreach($result_produk_pilihan as $row)
                            { 
                              echo '<option value="'.$row['id_produk'].'"'.$row['nama'].'"></option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            <div class="form-group">
                <label class="sr-only">Nama Produk</label>
                <input type="text" class="form-control" placeholder="nama" id="nama" readonly="readonly">
            </div>
            <div class="form-group">
                <label class="sr-only">stok</label>
                <input type="text" class="form-control" placeholder="stok" id="stok" readonly="readonly">
            </div>
            <div class="form-group">
                <label class="sr-only">stok</label>
                <button id="tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></button>
            </div>
            <div class="form-group">
                <label class="sr-only">stok</label>
                <button id="cari" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
    </div>
    
    <div id="tampil"></div>
    
    <div class="panel-footer">
        <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
    </div>
</div>

  </section><!-- /.content -->
  <?php
  $this->load->view('_partials/js');
  ?>
  <!--tambahkan custom js disini-->
  <?php
  $this->load->view('_partials/footer');
  ?>
  <script>
    $(function(){
        
        function loadData(args) {
            //code
            $("#tampil").load("<?php echo site_url('peminjaman/tampil');?>");
        }
        loadData();
        
        function kosong(args) {
            //code
            $("#id_produk").val('');
            $("#nama").val('');
            $("#stok").val('');
        }
        
        
        
        $("#id_produk").keypress(function(){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            
            if(keycode == '13'){
                var id_produk=$("#id_produk").val();
            
                $.ajax({
                    url:"<?php echo site_url('peminjaman/cariProduk');?>",
                    type:"POST",
                    data:"id_produk="+id_produk,
                    cache:false,
                    success:function(msg){
                        data=msg.split("|");
                        if (data==0) {
                            alert("data tidak ditemukan");
                            $("#nama").val('');
                            $("#stok").val('');
                        }else{
                            $("#nama").val(data[0]);
                            $("#stok").val(data[1]);
                            $("#tambah").focus();
                        }
                    }
                })
            }
        })
        
        $("#tambah").click(function(){
            var id_produk=$("#id_produk").val();
            var nama=$("#nama").val();
            var stok=$("#stok").val();
            
            if (id_produk=="") {
                //code
                alert("id_produk Produk Masih Kosong");
                return false;
            }else if (nama=="") {
                //code
                alert("Data tidak ditemukan");
                return false
            }else{
                $.ajax({
                    url:"<?php echo site_url('peminjaman/tambah');?>",
                    type:"POST",
                    data:"id_produk="+id_produk+"&nama="+nama+"&stok="+stok,
                    cache:false,
                    success:function(html){
                        loadData();
                        kosong();
                    }
                })    
            }
            
        })
        
        
        $("#simpan").click(function(){
            var id_booking=$("#id_booking").val();
            var tgl_booking=$("#tgl_booking").val();
            var kembali=$("#kembali").val();
            var id_produk=$("#id_produk").val();
            var jumlah=parseInt($("#jumlahTmp").val(),10);
            
            if (id_produk=="") {
                alert("Pilih id_produk Siswa");
                return false;
            }else if (jumlah==0) {
                alert("pilih buku yang akan ditgl_booking");
                return false;
            }else{
                $.ajax({
                    url:"<?php echo site_url('peminjaman/sukses');?>",
                    type:"POST",
                    data:"id_booking="+id_booking+"&tgl_booking="+tgl_booking+"&kembali="+kembali+"&id_produk="+id_produk+"&jumlah="+jumlah,
                    cache:false,
                    success:function(html){
                        alert("Transaksi Peminjaman berhasil");
                        location.reload();
                    }
                })
            }
            
        })
        
        $(".hapus").live("click",function(){
            var id_produk=$(this).attr("id_produk");
            
            $.ajax({
                url:"<?php echo site_url('peminjaman/hapus');?>",
                type:"POST",
                data:"id_produk="+id_produk,
                cache:false,
                success:function(html){
                    loadData();
                }
            });
        });
        
        $("#cari").click(function(){
            $("#myModal2").modal("show");
        })
        
        $("#cariProduk").keyup(function(){
            var cariProduk=$("#cariProduk").val();
            
            $.ajax({
                url:"<?php echo site_url('peminjaman/pencarianbuku');?>",
                type:"POST",
                data:"cariProduk="+cariProduk,
                cache:false,
                success:function(html){
                    $("#tampilbuku").html(html);
                }
            })
        })
        
        $(".tambah").live("click",function(){
            var id_produk=$(this).attr("id_produk");
            var nama=$(this).attr("nama");
            var stok=$(this).attr("stok");
            
            $("#id_produk").val(id_produk);
            $("#nama").val(nama);
            $("#stok").val(stok);
            
            $("#myModal2").modal("hide");
        })
        
    })
</script>
