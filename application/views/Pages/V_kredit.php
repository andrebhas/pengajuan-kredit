    <div id="contain">
    <div class="row">
      <div class="span12">
        <center>
        <h2>Informasi Kredit</h2>
        <hr />
        </center>
<!--        <div class="row">
          <div class="span9">-->
                <?php foreach ($daftar_kredit as $kredit) {?>
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
            <?php } ?>
          </div>
<!--          <div class="span3">
                <center>
                    <h4>Hubungi Kami</h4>
                </center>
                <div id="kontak">
                    <p>Ni Chadek Arik Tiara</p>
                    <p><img src="<?php echo base_url('asset/img/emailButton.png');?>"/> <i>nichadektiara@yahoo.co.id</i></p>
                    <p><img src="<?php echo base_url('asset/img/con_tel.png');?>"/> <i>083847411227</i></p>
                </div><br />
                <center>
                    <h4>Supported By</h4>
                    <hr />
                    <p><img src="<?php echo base_url('asset/img/unej.png');?>"/></p><br />
                    <p><img src="<?php echo base_url('asset/img/himasif.png');?>"/></p><br />
                    <p><img src="<?php echo base_url('asset/img/mandiri.jpg');?>"/></p>
                </center>
          </div>-->
        </div>
      </div>
    </div>
    </div>
    <br />