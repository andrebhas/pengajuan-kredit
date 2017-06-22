    <div id="contain3">
    <center><h3>Menu Pengurus Kredit</h3>
    <h4><?php echo $this->session->userdata('nama_kredit') ?></h4>
    </center>
    <div class="hero-unit" style="padding: 0px;">
        <div id="myCarousel" class="carousel slide">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          <!-- Carousel items -->
          <div class="carousel-inner">
            <div class="active item"><img src="<?php echo base_url('asset/img/unej.jpg');?>" />
                <div class="carousel-caption">
                    <h4>Decision Support System Penentuan Penerima Kredit</h4>
                    <p>Website ini mengelola data para calon kreditur Bank Perkreditan Rakyat Sukowono Arthajaya</p>
                    <p>Fasilitas lain dalam sistem ini adalah sebagai pendukung pengambilan keputusan</p>
                </div>
            </div>
            <div class="item"><img src="<?php echo base_url('asset/img/unej.jpg');?>" />
                <div class="carousel-caption">
                    <h4>Decision Support System Penentuan Penerima Kredit</h4>
                    <p>Berdasarkan data para calon kreditur yang mengajukan kredit</p>
                    <p>Sistem akan secara otomatis mengkalkulasi kemungkinan calon kreditur yang akan menerima kredit</p>
                </div>
            </div>
            <div class="item"><img src="<?php echo base_url('asset/img/unej.jpg');?>" />
                <div class="carousel-caption">
                    <h4>Decision Support System Penentuan Penerima Kredit</h4>
                    <p>Dengan adanya list penerima kredit tersebut</p>
                    <p>Petugas bisa menggunakanya untuk pendukung pengambilan keputusan pemberian kredit</p>
                </div>
            </div>
          </div>
          <!-- Carousel nav -->
          <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
          <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
        </div>
    </div>

    <div class="row">
        <div class="span4">
            <h2>Pengurus</h2>
            <p>Pada menu ini memberikan informasi mengenai kredit yang ada.</p>
            <p>
                <a class="btn" href="<?php echo site_url('welcome/lahan');?>">Lihat Selengkapnya  &rsaquo;&rsaquo;</a>
            </p>
        </div>
        <div class="span4">
            <h2>Data Peserta</h2>
            <p>Pada menu ini memberikan informasi mengenai calon kreditur yang telah mengajukan kredit</p>
            <p>
                <a class="btn" href="<?php echo site_url('welcome/lahan');?>">Lihat Selengkapnya  &rsaquo;&rsaquo;</a>
            </p>
        </div>
        <div class="span4">
            <h2>Rangking Peserta</h2>
            <p>Menunjukkan rangking calon penerima kredit</p>
            <p>
                <a class="btn" href="<?php echo site_url('welcome/lahan');?>">Lihat Selengkapnya  &rsaquo;&rsaquo;</a>
            </p>
        </div>
    </div>
</div>
</div>