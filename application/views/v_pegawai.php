<div class="content-wrapper">
    <section class="content-header">
        <h1>Data Pegawai</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('')?>">Home</a></li>
                <li class="breadcrumb-item active">Data Pegawai</li>
            </ol>
    </section>
    <div class="content">
        <?php echo $this->session->flashdata('message');?>
        <nav class="navbar navbar-default">
            <div class="left">
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data pegawai</button>
                <a class="btn btn-danger" href="<?php echo base_url('pegawai/print')?>"><i class="fa fa-print"></i> Print</a>
                <!-- <a class="btn btn-warning" href="<?php echo base_url('pegawai/pdf1')?>"><i class="fa fa-file"></i> Export PDF</a> -->
                <div class="dropdown d-inline"> 
                    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fa fa-download"> Export</i>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="<?php echo base_url('pegawai/pdf1')?>">PDF</a></li>
                        <li><a href="<?php echo base_url('pegawai/exportExcel')?>">EXCEL</a></li>
                    </ul>
                </div>
                
            </div>     
            <?php echo form_open('pegawai/search')?>
            <input type="text" name="keyword" class="form" placeholder="Search">
            <button type="submit" class="btn btn-success">Cari</button>
            <?php echo form_close()?>
        </nav>
    </div>
    <section class="content">
    <table class="table table-striped table-hover table-bordered" id="table_id" style="width:100%">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NIP</th>
                    <th>NAMA PEGAWAI</th>
                    <th>TANGGAL LAHIR</th>
                    <th colspan="3">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // $batas = 5;
                // $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                // $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                // $previous = $halaman -1 ;
                // $next = $halaman + 1;

                // $data = mysqli_query($koneksi, "select * from tb_pegawai");
                // $jumlah_data = mysqli_num_rows($data);
                // $total_halaman = ceil($jumlah_data / $batas);

                // $data = mysqli_query($koneksi, "select * from tb_pegawai LIMIT, $halaman_awal $batas");

                // $no = $halaman_awal+1;
                $no = 1;
                foreach($pegawai as $pgw) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $pgw->nip ?></td>
                        <td><?php echo $pgw->nama ?></td>
                        <td><?php echo $pgw->tgl_lahir ?></td>
                        <td><?php echo anchor('pegawai/detail/'.$pgw->no,'<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>')?></td>
                        <td onclick="javascript: return confirm('Anda Yakin Hapus?')"><?php echo anchor('pegawai/hapus/'.$pgw->no, 
                        '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?></td>    
                        <td><?php echo anchor('pegawai/edit/'.$pgw->no, 
                        '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>    
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
            <!-- <nav>
                <ul class="pagination justify-content-end">
                    <li class="page-item">
                        <a class="page-link" <?php if($halaman > 1){echo "href='?halaman=previous'"; } ?>>Previous</a>
                    </li>

                    <?php
                    for($x=1;$x<=$total_halaman;$x++){
                        ?>
                        <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"></a></li>
                        <?php
                    }
                    ?>
                    <li class="page-item" <?php if($halaman < $total_halaman) { echo"href='?halaman=$next'"; } ?>>Next</li>
                </ul>
            </nav> -->


        </section>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">FORM INPUT Data Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart ('pegawai/tambah_aksi')?>
                        <div class="form-group">
                            <label for="">NIP</label>
                            <input type="text" name="nip" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nama pegawai</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">No Telepon</label>
                            <input type="text" name="no_telp" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Upload Foto</label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>  
</div>