<div class="navbar navbar-fixed-top">
  <div class="navbar-inner" style="padding-left: 85px;">
    <img style="float: left;" src="<?php echo base_url('asset/img/icon.png');?>"/><a class="brand"> Scholarship System</a>
    <ul class="nav">
      <li class="<?php if(isset($active_home)){echo $active_home ;}?>">
        <a href="<?php echo site_url('C_halaman_utama/');?>"><i class="icon-home"></i> Home</a>
      </li>
      <li class="<?php if(isset($active_peserta)){echo $active_peserta ;}?>">
        <a href="<?php echo site_url('C_halaman_utama/peserta/1');?>"><i class="icon-file"></i> Rangking Pengaju Kredit</a>
      </li>
      <li class="<?php if(isset($active_kredit)){echo $active_kredit ;}?>">
        <a href="<?php echo site_url('C_halaman_utama/kredit');?>"><i class="icon-info-sign"></i> Info Kredit</a>
      </li>
      <li class="<?php if(isset($active_about)){echo $active_about ;}?>">
        <a href="<?php echo site_url('C_halaman_utama/about');?>"><i class="icon-globe"></i> Tentang</a>
      </li>
      <li><a href="#login" data-toggle="modal" role="button" style="margin-left: 420px;"><i class="icon-user"></i> Login</a></li>
    </ul>
  </div>
</div>

<!-- Pesan Gagal Login -->
<?php
        if(isset($_GET['pesan']))
          {?>
           <div class="alert alert-error">
                <a class="close" data-dismiss="alert" href="#">&times;</a>
                <h4>Warning!</h4>
           <?php
              echo 'Username atau password anda salah !';
           ?>              
              </div>      
<?php } ?> 