<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Penerimaan Asset</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Penerimaan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if ($this->session->userdata('success')) {
        ?>
            <div class="alert alert-success alert-dismissible mt-3">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                <?= $this->session->userdata('success') ?>
            </div>
        <?php
        } ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#modal-default">
                        <i class="fas fa-university"></i> Tambah Data Penerimaan
                    </button>
                    <!-- <a href="<?= base_url('Admin/cKelolaData/createbarang') ?>" class="btn btn-default mb-3">
                        <i class="fas fa-university"></i> Tambah Data Barang
                    </a> -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Penerimaan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Nama Barang</th>
                                        <th class="text-center">Tanggal Terima</th>
                                        <th class="text-center">Sumber</th>
                                        <th class="text-center">Keterangan Barang</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($barang as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><?= $value->nama_kategori ?></td>
                                            <td class="text-center"><?= $value->nama_barang ?></td>
                                            <td class="text-center"><?= $value->tgl_terima ?></td>
                                            <td class="text-center"><?= $value->sumber ?></td>
                                            <td class="text-center"><?= $value->keterangan ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?= base_url('Admin/cKelolaData/deletebarang/' . $value->id_barang) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    <button type="button" data-toggle="modal" data-target="#edit<?= $value->id_barang ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                              
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <form action="<?= base_url('admin/ckeloladata/createbarang') ?>" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Penerimaan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                <div class="col-lg-14">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kategori</label>
                                        <select class="form-control" name="kategori" required>
                                            <option>---Pilih Kategori---</option>
                                            <?php
                                            foreach ($kategori as $key) {
                                            ?>
                                                <option value="<?= $key->id_kategori ?>"><?= $key->nama_kategori ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                </div>

                <div class="col-lg-14">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Barang</label>
                                        <select class="form-control" name="nama" required>
                                            <option>---Pilih Barang---</option>
                                            <?php
                                            foreach ($pengajuan as $key) {
                                            ?> 
                                                <option value="<?= $key->nama_barang ?>"><?= $key->nama_barang ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Terima</label>
                        <input type="date" name="tgl" class="form-control" id="exampleInputEmail1" placeholder="Nama" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Sumber</label>
                        <input type="text" name="sumber" class="form-control" id="exampleInputEmail1" placeholder="Nama" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" id="exampleInputEmail1" placeholder="Nama" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php
foreach ($barang as $key => $value) {
?>
    <div class="modal fade" id="edit<?= $value->id_barang ?>">
        <div class="modal-dialog">
            <form action="<?= base_url('admin/ckeloladata/updatebarang/') .$value->id_barang?>" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Penerimaan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                <div class="col-lg-14">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kategori</label>
                                        <select class="form-control" name="kategori" required>
                                            <option>---Pilih Kategori---</option>
                                            <?php
                                            foreach ($kategori as $key) {
                                            ?>
                                                <option value="<?= $key->id_kategori ?>"><?= $key->nama_kategori ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                </div>

                <div class="col-lg-14">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Barang</label>
                                        <select class="form-control" name="nama" required>
                                            <option>---Pilih Barang---</option>
                                            <?php
                                            foreach ($pengajuan as $key) {
                                            ?> 
                                                <option value="<?= $key->nama_barang ?>"><?= $key->nama_barang ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Terima</label>
                        <input type="date" name="tgl" value="<?= $value->tgl_terima ?>" class="form-control" id="exampleInputEmail1" placeholder="Nama" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Sumber</label>
                        <input type="text" name="sumber" value="<?= $value->sumber ?>" class="form-control" id="exampleInputEmail1" placeholder="Nama" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Keterangan</label>
                        <input type="text" name="keterangan" value="<?= $value->keterangan ?>" class="form-control" id="exampleInputEmail1" placeholder="Nama" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php
}
?>