<div class="navbar navbar-fixed-top">
  <div class="navbar-inner" style="padding-left: 85px;">
    <img style="float: left;" src="<?php echo base_url('asset/img/icon.png');?>"/><a class="brand"> Scholarship System</a>
    <ul class="nav">
      <li class="<?php if(isset($active_home)){echo $active_home ;}?>">
        <a href="<?php echo site_url('C_halaman_admin/');?>"><i class="icon-home"></i> Home</a>
      </li>
      <li class="<?php if(isset($active_peserta)){echo $active_peserta ;}?>">
        <a href="<?php echo site_url('C_halaman_admin/peserta/1');?>"><i class="icon-info-sign"></i> Rangking Pengaju Kredit</a>
      </li>
      <li class="<?php if(isset($active_kredit)){echo $active_kredit ;}?>">
        <a href="<?php echo site_url('C_halaman_admin/data_kredit');?>"><i class="icon-file"></i> Data Kredit</a>
      </li>
      <li class="<?php if(isset($active_bobot)){echo $active_bobot ;}?>">
        <a href="<?php echo site_url('C_halaman_admin/bobot_kriteria/1');?>"><i class="icon-globe"></i> Bobot Kriteria</a>
      </li>
      <li class="dropdown" style="margin-left: 360px;">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-user"></i>
            Setting
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="<?php echo site_url('login/logout');?>"> Logout</a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>