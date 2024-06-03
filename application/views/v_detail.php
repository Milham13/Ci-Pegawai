<div class="content-wrapper">
    <section class="content-header">
        <h1>Detail Data Pegawai</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('')?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('pegawai')?>">Data Pegawai</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
    </section>
    <section class="content">
        <table class="table">
            <tr>
                <th>NIP</th>
                <td><?php echo $detail->nip ?></td>
            </tr>
            <tr>
                <th>Nama Lengkap</th>
                <td><?php echo $detail->nama ?></td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td><?php echo $detail->tgl_lahir ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?php echo $detail->alamat ?></td>
            </tr>
            <tr>
                <th>No Telepon</th>
                <td><?php echo $detail->no_telp ?></td>
            </tr>
            <tr>
                <td><img src="<?php echo base_url()?>assets/foto/<?php echo $detail->foto;?>" width="90" height="100" alt=""></td>
            </tr>
        </table>
        <a href="<?php echo base_url('pegawai/index'); ?>" class="btn btn-primary">Kembali</a>
    </section>
</div>