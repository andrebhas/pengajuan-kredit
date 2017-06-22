    <div id="contain2">
    <center>
    <h2>Data Kredit</h2>
    <hr />
    
    <!--<a href="<?php echo site_url('C_data_kredit/tambah_kredit');?>"><button class="btn btn-primary" id="btnTambah">Tambah</button></a>-->
        <table class="table table-striped">
        <tr>
                    <th>ID Kriteria</th>
                    <th>Nama Kriteria</th>
                    <th width="230">Action</th>
        </tr>
        <?php foreach ($daftar_kredit as $kredit) {?>
    <fieldset>

        <tr class="kolomFoto">
                    <td><?php echo $kredit->ID_kredit?></td>
                    <td><?php echo $kredit->nama_kredit;?></td>
                    <td>
                        <a href="<?php echo site_url('C_data_kredit/edit_kredit/'.$kredit->ID_kredit.'/'.$kredit->ID_user);?>"><input type="button" class="btn btn-info" value="Ubah"/></a>
                        <!--<a href="<?php echo site_url('C_data_kredit/delete_kredit/'.$kredit->ID_kredit.'/'.$kredit->ID_user);?>" data-confirm="Apakah anda yakin akan menghapus data kredit ?"><input type="button" class="btn btn-danger" value="Delete"/></a>-->
                    </td>
          </tr>
    <?php } ?>
    </table>
    </fieldset>
    <br />
    </center>
    </div>