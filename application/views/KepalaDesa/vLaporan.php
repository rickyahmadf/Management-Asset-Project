<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Asset</h1>


                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Laporan</li>
                    </ol>
                </div>
            </div>
            <form action="<?= base_url('KepalaDesa/cLaporan/cetak_laporan') ?>" method="POST">
                <div class="row">
                    <div class="col-lg-4">
                        <select class="form-control" name="tanggal">
                           
                                <option value="2024-01-01">2024</option>
                                <option value="2025-01-01">2025</option>
                                <option value="2026-01-01">2026</option>
                            
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-warning">Cetak Surat Laporan</button>
                    </div>
                </div>
            </form>


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
                            <h3 class="card-title">Informasi Asset</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Qr Code</th>
                                        <th class="text-center">Gambar Asset</th>
                                        <th class="text-center">Nama Barang</th>
                                        <th class="text-center">Tanggal Peroleh</th>
                                        <th class="text-center">Harga Asset</th>
                                        <th class="text-center">Jumlah Asset</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($asset as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><img style="width: 150px;" src="<?= base_url('asset/images/' . $value->kode_asset . '.png') ?>"><br><?= $value->kode_asset ?></td>
                                            <td class="text-center"><img style="width: 150px;" src="<?= base_url('asset/foto-asset/' . $value->gambar_asset) ?>"></td>
                                            <td class="text-center"><?= $value->nama_barang ?></td>
                                            <td class="text-center"><?= $value->tgl_peroleh ?></td>
                                            <td class="text-center">Rp. <?= number_format($value->harga_asset) ?></td>
                                            <td class="text-center"><?= $value->jml_asset ?></td>

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
            <div class="row">
          
                <div class="col-12">
                <h2>Laporan Pengajuan Asset</h2>
                <form action="<?= base_url('KepalaDesa/cLaporan/laporan_pengajuan') ?>" method="POST" class="mb-3">
                <div class="row">
                    <div class="col-lg-4">
                        <select class="form-control" name="tanggal">
                           
                                <option value="2024-01-01">2024</option>
                                <option value="2025-01-01">2025</option>
                                <option value="2026-01-01">2026</option>
                            
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-warning">Cetak Surat Laporan</button>
                    </div>
                </div>
            </form>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Pengajuan</h3><br>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Tanggal Pengajuan</th>
                                        <th class="text-center">Nama Asset</th>
                                        <th class="text-center">Total Pengajuan</th>
                                        <!-- <th class="text-center">Tanggal Keputusan</th>
                                        <th class="text-center">Nama Asset Keputusan</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pengajuan as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><?= $value->tgl_pengajuan ?></td>
                                            <td class="text-center"><?= $value->nama_barang ?></td>
                                            <td class="text-center"><?= $value->total_pengajuan ?></td>
                                            <!-- <td class="text-center"><?= $value->tgl_kep ?></td>
                                            <td class="text-center"><?= $value->nama_asset_kep ?></td> -->

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