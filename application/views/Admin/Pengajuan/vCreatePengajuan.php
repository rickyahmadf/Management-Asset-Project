<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pengajuan Asset</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pengajuan Asset</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    
            <div class="col-md-6">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Pengajuan Data
                            <small>Masukkan Data Pengajuan Asset</small>
                        </h3>
                        <!-- tools box -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>

  
  
                    <?php echo form_open_multipart('admin/cpengajuan/create'); ?>
                    <!-- /.card-header -->
                    <div class="card-body pad">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Barang</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Barang" required>
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Pengajuan</label>
                            <input type="date" value="<?= date('Y-m-d') ?>" name="date" class="form-control" readonly>
                            <?= form_error('date', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah Pengajuan</label>
                            <input type="number" name="jml" class="form-control" placeholder="Jumlah Pengajuan" required>
                            <?= form_error('jml', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <div class="mb-3">
                            <label for="exampleInputPassword1">Alasan</label>
                            <textarea  name="alasan" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            <?= form_error('hasil', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>