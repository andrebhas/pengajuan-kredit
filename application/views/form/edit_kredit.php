     <!-- Pesan Gagal Login -->
    <?php
            if(isset($_GET['pesan']))
              {?>
               <div class="alert alert-error">
                    <a class="close" data-dismiss="alert" href="#">&times;</a>
                    <h4>Warning!</h4>
               <?php
               if($_GET['pesan'] == 'gagal'){
                    echo 'Konfirmasi Password anda tidak cocok ! Silahkan dicoba kembali';
               }else{
                    echo 'Username telah terdaftar, silahkan memilih username yang lain';
               } 
               ?>              
                  </div>      
    <?php } ?> 
    
    <div id="contain2">  
       <center><h2>Update Kredit</h2></center>
       <hr />       
        <form class="form-horizontal"  action="<?php echo site_url('C_data_Kredit/proses_edit_Kredit/'.$kredit->ID_kredit.'/'.$kredit->ID_user);?>" method="POST" id="tengah">
          <div class="control-group">
            <label class="control-label" >Nama Kredit :</label>
            <div class="controls">
                <input type="text" placeholder="Nama Kredit..." name="nama_kredit" value="<?php echo $kredit->nama_kredit;?>" required="">
            </div>
          </div>
<!--         <div class="control-group">
            <label class="control-label">Tgl Pendaftaran :</label>
            <div class="controls">
                <div class="input-append date" id="awal" data-date-format="yyyy-mm-dd">
                 <input name="tgl_pendaftaran" class="span2" placeholder="YYYY-MM-DD" size="16" type="text" value="<?php echo $kredit->tgl_pendaftaran;?>" readonly="">
                 <span class="add-on">
                    <i class="icon-calendar"></i>
                 </span>
                 </div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" >Tgl Penutupan :</label>
            <div class="controls">
                <div class="input-append date" id="akhir" data-date-format="yyyy-mm-dd">
                 <input name="tgl_penutupan" class="span2" placeholder="YYYY-MM-DD" size="16" type="text" value="<?php echo $kredit->tgl_penutupan;?>" readonly="">
                 <span class="add-on">
                    <i class="icon-calendar"></i>
                 </span>
                 </div>
          </div>
          </div>-->
          <div class="control-group">
            <label class="control-label" >Username :</label>
            <div class="controls">
                <input type="text" placeholder="username..." name="username" value="<?php echo $user->username;?>" required="">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" >Password :</label>
            <div class="controls">
                <input type="password" placeholder="password..." name="password" value="<?php echo $user->password;?>" required="">
          </div>
          </div>
          <div class="control-group">
            <label class="control-label" >Re Password :</label>
            <div class="controls">
                <input type="password" placeholder="password..." name="password2" value="<?php echo $user->password;?>" required="">
          </div>
          </div>
          <div class="control-group">
            <label class="control-label" >Deskripsi :</label>
          </div>
          <div class="control-group">
                <textarea class="input-large" style="height: 300px; width: 500px;" name="deskripsi" required=""><?php echo $kredit->deskripsi;?></textarea>
          </div>
          <div class="control-group">
            <div class="controls">
              <a href="<?php echo site_url('C_halaman_admin/data_Kredit');?>" ><button type="button" class="btn">Batal</button></a>
              <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
          </div>
        </form>
    </div>