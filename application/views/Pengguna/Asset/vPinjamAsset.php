<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <?php if ($this->session->userdata('success')) {
        ?>
            <div class="alert alert-success alert-dismissible mt-3">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                <?= $this->session->userdata('success') ?>
            </div>
        <?php
        } ?>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Peminjaman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Peminjaman</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Masukkan Data Peminjam</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                         <div>
                            <p class="text-center mt-3 ">Note: Peminjaman Asset maksimal 7 hari</p>
                         </div>
                        <?php echo form_open_multipart('Pengguna/cPinjam/pinjam'); ?>
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Asset</label>
                                        <select class="form-control" name="asset">
                                            <option>---Pilih Asset---</option>
                                            <?php
                                            foreach ($asset as $key => $value) {
                                            ?>
                                                <option value="<?= $value->nama_barang ?>"><?= $value->nama_barang ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <?= form_error('asset', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>


                            
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama</label>
                                <input type="text" name="nama" value="<?= $this->session->userdata('nama') ?>" class="form-control" id="exampleInputPassword1" placeholder="Nama" readonly>
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="row">
                               
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tanggal Pinjam</label>
                                        <input type="date" name="tgl" value="<?= date('Y-m-d') ?>" class="form-control" id="exampleInputPassword1" placeholder="Kode Asset" readonly>
                                        <?= form_error('tgl', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1">Keterangan</label>
                                <textarea  name="ket" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                <?= form_error('hasil', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>