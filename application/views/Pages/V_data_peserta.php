    <div id="contain2">
    <center>
    <h2>Data Pengaju Kredit</h2>
    <h4><?php echo $this->session->userdata('nama_kredit') ?></h4>
    <br />
    
    <a href="<?php echo site_url('C_data_peserta/tambah_peserta');?>"><button class="btn btn-primary" id="btnTambah">Tambah</button></a>
        <table class="table table-striped">
        <tr>
                    <th>No. KTP</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th width="170">Action</th>
        </tr>
        <?php foreach ($daftar_peserta as $peserta) {?>
    <fieldset>

        <tr class="kolomFoto">
                    <td><?php echo $peserta->KTP_ID;?></td>
                    <td><?php echo $peserta->nama;?></td>
                    <td><?php echo $peserta->alamat;?></td>
                    <td>
                        <a href="<?php echo site_url('C_data_peserta/edit_peserta/'.$peserta->no);?>"><input type="button" class="btn btn-info" value="Ubah"/></a>
                        <a href="<?php echo site_url('C_data_peserta/delete_peserta/'.$peserta->no);?>" data-confirm="Apakah anda yakin akan menghapus data Peserta ?"><input type="button" class="btn btn-danger" value="Hapus"/></a>
                    </td>
          </tr>
    <?php } ?>
    </table>
    </fieldset>
    <br />
    </center>
    </div>