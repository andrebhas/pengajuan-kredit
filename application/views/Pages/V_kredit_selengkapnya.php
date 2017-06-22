    <div id="contain">
    <div class="row">
      <div class="span12">
        <center>
        <h2>Informasi Kredit</h2>
        <hr />
        </center>
        <div class="row">
          <div class="span9">
                <div class="media">
                  <a class="pull-left" href="#">
                    <img class="media-object" data-src="holder.js/64x64">
                  </a>
                  <div class="media-body">
                    <h4 class="media-heading"><?php echo $kredit->nama_kredit;?></h4><br />
                   
                    <?php $paragraphs = explode("\n", $kredit->deskripsi);    
                    for ($i = 0; $i < count ($paragraphs); $i++){
                
                        $paragraphs[$i] = '<p style="text-align: justify;">' . $paragraphs[$i] . '</p>';
                
                    }
                    $paragraphs = implode ('', $paragraphs);
                    echo $paragraphs;?>
                  </div>
                </div>
                <hr />
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