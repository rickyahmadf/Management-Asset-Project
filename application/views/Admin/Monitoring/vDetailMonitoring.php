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
                        <li class="breadcrumb-item active">Detail Pengecekan</li>
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
                <button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#histori">
                        <i class="fas fa-university"></i> Tambah Pengecekan
                    </button>
                
                    <div class="card ">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Pengecekan Asset</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                           
                        
                        <table class="table" >                        
                        <?php
                                foreach ($histori as $key => $value) {
                                ?> 
                        <tr>
                            <th>Tanggal Pengecekan</th>
                            <td><?= $value->tgl_histori ?></td>
                        </tr>
                        <tr>
                            <th>Hasil Pengecekan</th>
                            <td><?= $value->kondisi_pengecekan ?></td>
                        </tr>
                        <?php
                                }
                        ?>
                    </table>
                   
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>

        <div class="modal fade" id="histori">
    <div class="modal-dialog">
        <form action="<?= base_url('admin/cmonitoring/createhistori')?>"  method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Histori Pengecekan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Id Monitoring</label>
                                        <input type="text" value="<?= $monitoring->id_monitoring ?>" name="id_monitoring" class="form-control" readonly>
                                    </div>
                </div>

                 <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Pengecekan</label>
                            <input type="date" value="<?= date('Y-m-d') ?>" name="tgl" class="form-control" readonly>
                            <?= form_error('date', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kondisi</label>
                        <input type="text" name="kondisi" class="form-control" id="exampleInputEmail1" placeholder="Nama" required>
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
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>