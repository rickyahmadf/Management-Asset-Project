<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                
                <!-- /.col -->
                <!-- <div class="col-12 col-sm-6 col-md-3"> -->
                    <!-- <div class="info-box mb-3"> -->
                        <!-- <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Peminjaman Diterima</span>
                            <span class="info-box-number"> <?= $jml['peminjam']->jml_peminjam ?></span>
                        </div> -->
                        <!-- /.info-box-content -->
                    <!-- </div> -->
                    <!-- /.info-box -->
                <!-- </div> -->
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-barcode"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Asset</span>
                            <span class="info-box-number"> <?= $jml['asset']->jml_asset ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
            </div>
            <!-- /.row -->



            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-8">
                    <!-- MAP & BOX PANE -->


                    <!-- TABLE: LATEST ORDERS -->
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Status Peminjaman</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive"></div>
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Tanggal Pinjam</th>
                                        <th class="text-center">Nama Peminjam</th>
                                        <th class="text-center">Nama Asset</th>
                                        <th class="text-center">Alasan</th>
                                        <th class="text-center">Status Pengajuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($peminjam as $row) {
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
                                            <td class="text-center">
                                                <?php
                                                if ($row->status == '2') {
                                                ?>
                                                    <button type="button" data-toggle="modal" data-target="#detail<?= $row->id_peminjam ?>" class="btn btn-info"><i class="fas fa-info"></i></button>
                                                <?php
                                                }
                                                ?>

                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                            </div>
                            <div class="card-footer clearfix">
                            <a href="<?= base_url('Pengguna/cPengembalian') ?>" class="btn btn-sm btn-info float-left">Lihat Peminjaman</a>
                        </div>
                        </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                       
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->