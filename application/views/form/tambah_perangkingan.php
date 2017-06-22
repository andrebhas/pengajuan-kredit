    <div id="contain2">
    <center>
    <h2>Rangking Peserta Kredit</h2>
     <h4><?php echo $this->session->userdata('nama_kredit') ?></h4>
<!--    
        <hr />-->
        </center>
                <div class="form-horizontal" style="margin-left: -45px;">
                    <div class="control-group">
                        <label class="control-label" ><b>Jenis Kredit :</b></label>
                        <div class="controls">
                            <select id="tipe" onchange="myFunction()">
                            <?php foreach ($daftar_tgl as $tanggal) {
                                if($id == $tanggal->tgl_pendaftaran){ ?>
                                    <option value="<?php echo $tanggal->tgl_pendaftaran;?>" selected><?php echo $tanggal->tgl_pendaftaran;?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $tanggal->tgl_pendaftaran;?>"><?php echo $tanggal->tgl_pendaftaran;?></option>
                                <?php }
                             } ?>
                            </select>
                        </div>
                    </div>
                </div>
    
    
   
    <br />
    
        <table class="table table-striped table-hover fill-head">
        <tr>
            <th>#</th>
            <th>No. KTP</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Priority Vector</th>
        </tr>
        
        <?php $no = 1;
        foreach ($daftar_peserta as $peserta) {?>
        <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $peserta->KTP_ID;?></td>
            <td><?php echo $peserta->nama;?></td>
            <td><?php echo $peserta->alamat;?></td>
            <td><?php echo $peserta->scor;?></td>
        </tr>
        <?php 
        $no++;
        } ?>
        
    </table>
    </fieldset>
    <br />
    </center>
    </div>