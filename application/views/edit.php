<div class="content-wrapper">
    <section class="content">
        <?php foreach($pegawai as $pgw) {?>
            <!-- <form action="<?php echo base_url().'pegawai/update';?>" method="post"> -->
            <?php echo form_open_multipart ('pegawai/update')?>
                <div class='form-group'>
                    <label>NIP</label>
                    <input type="hidden" name="no" class="form-control" value="<?php echo $pgw->no?>">
                    <input type="text" name="nip" class="form-control" value="<?php echo $pgw->nip?>">
                </div>
                <div class='form-group'>
                    <label>Nama pegawai</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $pgw->nama?>">
                </div>
                <div class='form-group'>
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $pgw->tgl_lahir?>">
                </div>
                <div class='form-group'>
                    <label>Alamat</label>
                    <input type="textarea" name="alamat" class="form-control" value="<?php echo $pgw->alamat?>">
                </div>
                <div class='form-group'>
                    <label>No Telepon</label>
                    <input type="text" name="no_telp" class="form-control" value="<?php echo $pgw->no_telp?>">
                </div>
                <div class='form-group'>
                    <label>Upload Foto</label>
                    <input type="file" name="foto" class="form-control" value="<?php echo $pgw->foto?>">
                </div>
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            <!-- </form> -->
            <?php echo form_close(); ?>
        <?php }?>
    </section>
</div>