<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Keputusan Peminjaman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pengajuan</li>
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
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Peminjaman Barang</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Peminjam</th>
                                        <th class="text-center">Tanggal Pinjam</th>
                                        <th class="text-center">Asset</th>
                                        <th class="text-center">Alasan</th>
                                        <th class="text-center">Status Peminjaman</th>
                                        <th class="text-center">Pengembalian</th>
                                        <th class="text-center">aksi
                                            <br>Peminjaman
                                        </th>
                                        <th class="text-center">aksi
                                            <br>pengembalian
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($peminjaman as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><?= $value->nama_user ?></td>
                                            <td class="text-center"><?= $value->tgl_pinjam ?></td>
                                            <td class="text-center"><?= $value->merk ?></td>
                                            <td class="text-center"><?= $value->keterangan ?></td>
                                            <td class="text-center"><?php if ($value->status_peminjaman == '0') {
                                                                    ?>
                                                    <span class="badge badge-warning">Menunggu Konfirmasi</span>
                                                <?php
                                                                    } else if ($value->status_peminjaman == '1') {
                                                ?>
                                                    <span class="badge badge-primary">Selesai</span>
                                                <?php
                                                                    } else {
                                                ?>
                                                    <span class="badge badge-danger">Ditolak!</span>
                                                <?php
                                                                    } ?>
                                            </td>
                                            <td class="text-center"><span><?= $value->tgl_pengembalian ?></span>
                                        <br><br><?= $value->kondisi_pengembalian ?></td>
                                            <td class="text-center">
                                                <?php
                                                if ($value->status_peminjaman == '0') {
                                                ?>
                                                    <div class="btn-group">
                                                        <button type="button" data-toggle="modal" data-target="#keputusan<?= $value->id_peminjam ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                                    </div>
                                                <?php
                                                } 
                                                ?>
                                            </td>
                                            <td class="text-center">
                                               
                                                    <div class="btn-group">
                                                        <button type="button" data-toggle="modal" data-target="#pengembalian<?= $value->id_peminjam ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
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

<?php
foreach ($peminjaman as $key => $value) {
?>
    <div class="modal fade" id="keputusan<?= $value->id_peminjam ?>">
        <div class="modal-dialog">
            <form action="<?= base_url('admin/ckeputusan/keputusan/' . $value->id_peminjam) ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Keputusan Pengajuan Barang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Kepala Lab Mengkonfirmasi Peminjaman?</p>
                        <div class="form-group">
                            <input type="radio" name="acc" value="4">
                            <label class="text-danger"> Tolak Peminjaman!</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="acc" value="1">
                            <label class="text-success"> Terima Peminjaman</label>
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

<!-- PENGEMBALIAN -->
<?php
foreach ($peminjaman as $key => $value) {
?>
    <div class="modal fade" id="pengembalian<?= $value->id_peminjam ?>">
        <div class="modal-dialog">
            <form action="<?= base_url('admin/ckeputusan/pengembalian/' . $value->id_peminjam) ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Pengembalian</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tanggal Pengembalian</label>
                            <input type="text" name="tgl" value="<?= date('Y-m-d') ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Kondisi</label>
                            <input type="text" name="kondisi" class="form-control" required>
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



<!-- /.modal -->