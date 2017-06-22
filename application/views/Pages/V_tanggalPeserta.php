<!--    <div id="contain">
    <div class="row">
      <div class="span12">
        <center>
        <h2>Data Peserta</h2>
        <hr />
        </center>
        <div class="row">
          <div class="span9">
                <div class="form-horizontal" style="margin-left: -45px;">
                    <div class="control-group">
                        <label class="control-label" ><b>Tanggal :</b></label>
                        <div class="controls">
                            <select id="tipe" onchange="myFunction()">
                            <?php foreach ($daftar_kredit as $kredit) {
                                if($id == $kredit->ID_kredit){ ?>
                                    <option value="<?php echo $kredit->ID_kredit;?>" selected><?php echo $kredit->nama_kredit;?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $kredit->ID_kredit;?>"><?php echo $kredit->nama_kredit;?></option>
                                <?php }
                             } ?>
                            </select>
                        </div>
                    </div>
                </div>  
    
              
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
                        <a href="<?php echo site_url('C_data_peserta/edit_peserta/'.$peserta->KTP_ID);?>"><input type="button" class="btn btn-info" value="Update"/></a>
                        <a href="<?php echo site_url('C_data_peserta/delete_peserta/'.$peserta->KTP_ID);?>" data-confirm="Apakah anda yakin akan menghapus data Peserta ?"><input type="button" class="btn btn-danger" value="Delete"/></a>
                    </td>
          </tr>
    <?php } ?>
    </table>
    
    <br />
 
          </div>
         
        </div>
      </div>
  
    </div>
    <br />
    -->
    
    
    <div id="contain2">
    <center>
    <h2>Data Pengaju Kredit</h2>
    <h4><?php echo $this->session->userdata('nama_kredit') ?></h4>
    <br />
    </center>
   
    <div class="form-horizontal" style="margin-left: -90px;">
                    <div class="control-group">
                        <label class="control-label" ><b>Tanggal :</b></label>
                        <div class="controls">
                            <select id="tipe" onchange="myFunction()">
                            <?php foreach ($peserta_kredit as $kredit) {
                                if($id == $kredit->peserta_kredit){ ?>
                                    <option value="<?php echo $kredit->peserta_kredit;?>" selected><?php echo $kredit->tanggal;?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $kredit->peserta_kredit;?>"><?php echo $kredit->tanggal;?></option>
                                <?php }
                             } ?>
                            </select>
                        </div>
                    </div>
                </div>

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
                        <a href="<?php echo site_url('C_data_peserta/edit_peserta/'.$peserta->KTP_ID);?>"><input type="button" class="btn btn-info" value="Update"/></a>
                        <a href="<?php echo site_url('C_data_peserta/delete_peserta/'.$peserta->KTP_ID);?>" data-confirm="Apakah anda yakin akan menghapus data Peserta ?"><input type="button" class="btn btn-danger" value="Delete"/></a>
                    </td>
          </tr>
    <?php } ?>
    </table>
    </fieldset>
    <br />
    </center>
    </div>