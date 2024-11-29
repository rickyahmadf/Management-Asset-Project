<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengecekan Asset</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pengecekan</li>
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
                    <a href="<?= base_url('Admin/cMonitoring/create') ?>" class="btn btn-danger mb-3">
                        <i class="fas fa-stethoscope"></i> Tambah Data Pengecekan
                    </a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Pengecekan Asset</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Asset</th>
                                        <th class="text-center">Hasil Pengecekan</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($monitoring as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><?= $value->nama_barang ?></td>
                                            <td class="text-center"><div class="btn-group ">
                                                    <a href="<?= base_url('Admin/cMonitoring/detail/' . $value->id_monitoring) ?>" class="btn btn-danger"> <i class="fas fa-level-down-alt"></i> Detail Penyusutan</a>
                                                </div></td>
                                            <td class="text-center">
                                                <!-- <div class="btn-group">
                                                    <a href="<?= base_url('Admin/cMonitoring/delete/' . $value->id_monitoring) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    <a href="<?= base_url('Admin/cMonitoring/edit/' . $value->id_monitoring) ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                </div> -->
                                                <br>
                                                <br>
                                                
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                        
                            </table>
                            <!-- <?php
                                $no = 1;
                                foreach ($monitoring as $key => $value) {
                                    
                        ?> -->
                        
                        <!-- <table class="table" >
                            <tr><td><?= $no++ ?></td>
                            <td></td>
                        </tr>
                        
                        <tr>
                            <th> Nama Asset</th>
                            <td><?= $value->merk ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Pengecekan</th>
                            <td><?= $value->tgl_monitoring ?></td>
                        </tr>
                        <tr>
                            <th>Hasil Pengecekan</th>
                            <td><?= $value->hasil_monitoring ?></td>
                        </tr>
                    </table> -->
                    <!-- <?php
                                }
                    ?> -->
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