<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Asset</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Asset</li>
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
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Perbaharui Data Asset</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php echo form_open_multipart('admin/cAsset/edit/' . $asset->id_asset); ?>
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Barang</label>
                                        <select class="form-control" name="barang">
                                            <option>---Pilih Barang---</option>
                                            <?php
                                            foreach ($barang as $key => $value) {
                                            ?>
                                                <option value="<?= $value->id_barang ?>" <?php if ($value->id_barang == $asset->id_barang) {
                                                                                                echo 'selected';
                                                                                            } ?>><?= $value->nama_barang ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <?= form_error('barang', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Merk</label>
                                <input type="text" name="merk" value="<?= $asset->merk ?>" class="form-control" id="exampleInputPassword1" placeholder="Merk Asset">
                                <?= form_error('merk', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tanggal Peroleh</label>
                                        <input type="date" name="tgl" value="<?= $asset->tgl_peroleh ?>" class="form-control" id="exampleInputPassword1" placeholder="Kode Asset">
                                        <?= form_error('tgl', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Harga Asset</label>
                                        <input type="number" name="harga" value="<?= $asset->harga_asset ?>" class="form-control" id="exampleInputPassword1" placeholder="Harga Asset">
                                        <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    
                            <div class="mb-3">
                                <label for="exampleInputPassword1">Kondisi</label>
                                <input type="text" name="kondisi" value="<?= $asset->kondisi ?>" class="form-control" id="exampleInputPassword1" placeholder="Kondisi">
                                <?= form_error('kondisi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            </div>


                            <div class="row">
                                <div class="col-lg-6"><img width="300px" src="<?= base_url('asset/foto-asset/' . $asset->gambar_asset) ?>"></div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Gambar Asset</label>
                                        <input type="file"  class="form-control" id="exampleInputPassword1" placeholder="Kode Asset">
                                        <strong><?= $asset->gambar_asset ?></strong>
                                        <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Status Pinjam</label>
                                        <select class="form-control" name="pinjam">
                                            <option>---Status Peminjaman---</option>
                                           
                                                <option value="2">Sedang Dipinjam</option>
                                                <option value="0">Selesai</option>
                                            
                                        </select>
                                        <?= form_error('pinjam', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
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