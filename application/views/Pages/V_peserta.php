    <div id="contain">
    <div class="row">
      <div class="span12">
        <center>
        <h2>Data Pengaju Kredit</h2>
        <hr />
        </center>
        <div class="row">
          <div class="span9">
                <div class="form-horizontal" style="margin-left: -45px;">
                    <div class="control-group">
                        <label class="control-label" ><b>Jenis Kredit :</b></label>
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
                <center>
                    <table class="table table-striped table-hover">
                    <tr>
                                <th>KTP ID</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                    </tr>
                    <?php foreach ($daftar_peserta as $peserta) {?>
                <fieldset>
            
                    <tr class="kolomFoto">
                                <td><?php echo $peserta->KTP_ID;?></td>
                                <td><?php echo $peserta->nama;?></td>
                                <td><?php echo $peserta->alamat?></td>
                      </tr>
                <?php } ?>
                </table>
                </fieldset>
                </center>
          </div>
          <div class="span3">
                <center>
                    <h4>Hubungi Kami</h4>
                </center>
                <div id="kontak">
                    <p><i>Sistem Informasi Universitas Jember<br />
                    Jalan Kalimantan No. 37 Kampus Tegalboto<br />
                    Jember Jawa Timur 68121 Indonesia</i></p>
                    <p><img src="<?php echo base_url('asset/img/emailButton.png');?>"/> <i>humas@unej.ac.id</i></p>
                    <p><img src="<?php echo base_url('asset/img/con_tel.png');?>"/> <i>+62 331-330224, 081234073076</i></p>
                    <p><img src="<?php echo base_url('asset/img/con_fax.png');?>"/> <i>+62 331-339029 , 337422</i></p>
                </div><br />
                <center>
                    <h4>Supported By</h4>
                    <hr />
                    <p><img src="<?php echo base_url('asset/img/unej.png');?>"/></p><br />
                    <p><img src="<?php echo base_url('asset/img/himasif.png');?>"/></p><br />
                    <p><img src="<?php echo base_url('asset/img/mandiri.jpg');?>"/></p>
                </center>
          </div>
        </div>
      </div>
    </div>
    </div>
    <br />