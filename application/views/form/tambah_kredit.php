     <!-- Pesan Gagal Insert -->
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
       <center><h2>Tambah Kredit</h2></center>
       <hr />       
        <form class="form-horizontal"  action="<?php echo site_url('C_data_Kredit/proses_tambah_Kredit');?>" method="POST" id="tengah">
          <div class="control-group">
            <label class="control-label" >Nama Kredit :</label>
            <div class="controls">
                <input type="text" placeholder="Nama Kredit..." name="nama_kredit" value="" required="">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" >Username :</label>
            <div class="controls">
                <input type="text" placeholder="username..." name="username" value="" required="">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" >Password :</label>
            <div class="controls">
                <input type="password" placeholder="password..." name="password" value="" required="">
          </div>
          </div>
          <div class="control-group">
            <label class="control-label" >Re Password :</label>
            <div class="controls">
                <input type="password" placeholder="password..." name="password2" value="" required="">
          </div>
          </div>
          <div class="control-group">
            <label class="control-label" >Deskripsi :</label>
          </div>
          <div class="control-group">
                <textarea class="input-large" style="height: 300px; width: 500px;" name="deskripsi" required=""></textarea>
          </div>
          <div class="control-group">
            <div class="controls">
              <a href="<?php echo site_url('C_halaman_admin/data_Kredit');?>" ><button type="button" class="btn">Batal</button></a>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </div>
        </form>
    </div>