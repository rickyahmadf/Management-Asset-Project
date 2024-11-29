<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>INFO PEMINJAMAN</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pengembalian</li>
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
                <div class="col-10">
                    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Peminjaman Asset</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Tanggal Pinjam</th>
                                        <th class="text-center">Nama Peminjam</th>
                                        <th class="text-center">Nama Asset</th>
                                        <th class="text-center">Alasan</th>
                                        <th class="text-center">Status Pengajuan</th>
                                        <!-- <th class="text-center">Status Peminjaman</th> -->
                                        <!-- <th class="text-center">Aksi</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $row) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row->tgl_pinjam ?></td>
                                            <td><?= $row->nama_user ?></td>
                                            <td><?= $row->merk ?></td>
                                            <td><?= $row->keterangan?></td>
                                            <td class="text-center"><?php if ($row->status_peminjaman == '0') {
                                                                    ?>
                                                    <span class="badge badge-warning">Menunggu Konfirmasi Kepala Lab</span>
                                                <?php
                                                                    } else if ($row->status_peminjaman == '1') {
                                                ?>
                                                    <span class="badge badge-info">Asset Keputusan</span>
                                                <?php
                                                                    } else if ($row->status_peminjaman == '2') {
                                                ?>
                                                    <span class="badge badge-success">Peminjaman Diterima</span>
                                                <?php
                                                                    } else {
                                                ?>
                                                    <span class="badge badge-danger">Ditolak!</span>
                                                <?php
                                                                    } ?>
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
foreach ($peminjam as $key => $value) {
?>
    <div class="modal fade" id="keputusan<?= $value->id_peminjam ?>">
        <div class="modal-dialog">
            <form action="<?= base_url('pengguna/cpengembalian/keputusan/' . $value->id_peminjam) ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Keputusan Pengajuan Barang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Pengguna Sedang Meminjam Asset?</p>
                        <div class="form-group">
                            <input type="radio" name="acc" value="1">
                            <label class="text-warning"> Sedang Meminjam</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="acc" value="2">
                            <label class="text-success"> Selesai</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="acc" value="3">
                            <label class="text-danger">Tidak😞 </label>
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


<?php
foreach ($peminjam as $key => $value) {
?>
    <div class="modal fade" id="pengembalian<?= $value->id_peminjam ?>">
        <div class="modal-dialog">
            <form action="<?= base_url('pengguna/cpengembalian/tgl_pengembalian/' . $value->id_peminjam) ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Pengembalian</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group" >
                            <label> Tanggal Pengembalian</label>
                            <input type="date" name="tgl" value="<?= date('Y-m-d') ?>" class="form-control" >
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



