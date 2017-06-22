<script type="text/javascript">
    $(document).ready(function() {

        $("#dana_diajukan").keyup(function() {
            var dana = $("#dana").val();
            var dana_aju = parseInt($("#dana_diajukan").val());

            if (dana === "< Rp 1.000.000") {
                if (dana_aju > 1000000) {
                    pesan_dana(dana);
                }
            } else if (dana === "Rp 1.000.000 - Rp 2.000.000") {
                if (dana_aju > 2000000) {
                    pesan_dana(dana);
                }
            } else if (dana === "Rp 2.000.000 - Rp 3.000.000") {
                if (dana_aju > 3000000) {
                    pesan_dana(dana);
                }
            } else if (dana === "Rp 3.000.000 - Rp 4.000.000") {
                if (dana_aju > 4000000) {
                    pesan_dana(dana);
                }
            } else {
                if (dana_aju > 100000000) {
                    pesan_dana(dana);
                }
            }
        });

        $("#dana_diajukan").blur(function() {
            var dana = $("#dana").val();
            var dana_aju = parseInt($("#dana_diajukan").val());

            if (dana === "< Rp 1.000.000") {
                if (dana_aju < 500000) {
                    pesan_dana(dana);
                }
            } else if (dana === "Rp 1.000.000 - Rp 2.000.000") {
                if (dana_aju < 1000000) {
                    pesan_dana(dana);
                }
            } else if (dana === "Rp 2.000.000 - Rp 3.000.000") {
                if (dana_aju < 2000000) {
                    pesan_dana(dana);
                }
            } else if (dana === "Rp 3.000.000 - Rp 4.000.000") {
                if (dana_aju < 3000000) {
                    pesan_dana(dana);
                }
            } else {
                if (dana_aju < 4000000) {
                    pesan_dana(dana);
                }
            }
        });

        function pesan_dana(dana) {
            $("#dana_diajukan").val("");
            alert("Dana tidak sesuai dengan range dana!\nRange dana adalah" + dana + "!");
        }
        
        $("#brg_ditanggungkan").keyup(function() {
            var harga = $("#hargaBarang").val();
            var brg_ditanggung = parseInt($("#brg_ditanggungkan").val());
            if (harga === "< Rp 1.000.000") {
                if (brg_ditanggung > 1000000) {
                    pesan_harga(harga);
                }
            } else if (harga === "Rp 1.000.000 - Rp 2.000.000") {
                if (brg_ditanggung > 2000000) {
                    pesan_harga(harga);
                }
            } else if (harga === "Rp 2.000.000 - Rp 3.000.000") {
                if (brg_ditanggung > 3000000) {
                    pesan_harga(harga);
                }
            } else if (harga === "Rp 3.000.000 - Rp 4.000.000") {
                if (brg_ditanggung > 4000000) {
                    pesan_harga(harga);
                }
            } else {
                if (brg_ditanggung > 100000000) {
                    pesan_harga(harga);
                }
            }
        });
        $("#brg_ditanggungkan").blur(function() {
            var harga = $("#hargaBarang").val();
            var brg_ditanggung = parseInt($("#brg_ditanggungkan").val());
            if (harga === "< Rp 1.000.000") {
                if (brg_ditanggung < 500000) {
                    pesan_harga(harga);
                }
            } else if (harga === "Rp 1.000.000 - Rp 2.000.000") {
                if (brg_ditanggung < 1000000) {
                    pesan_harga(harga);
                }
            } else if (harga === "Rp 2.000.000 - Rp 3.000.000") {
                if (brg_ditanggung < 2000000) {
                    pesan_harga(harga);
                }
            } else if (harga === "Rp 3.000.000 - Rp 4.000.000") {
                if (brg_ditanggung < 3000000) {
                    pesan_harga(harga);
                }
            } else {
                if (brg_ditanggung < 4000000) {
                    pesan_harga(harga);
                }
            }
        });
        function pesan_harga(harga) {
            $("#brg_ditanggungkan").val("");
            alert("Dana tidak sesuai dengan range dana!\nRange dana adalah" + harga + "!");
        }
        
        $("#aset_ukm").keyup(function() {
            var ast = $("#aset").val();
            var asetukm = parseInt($("#aset_ukm").val());
            if (ast === "< Rp 1.000.000") {
                if (asetukm > 1000000) {
                    pesan_ast(ast);
                }
            } else if (ast === "Rp 1.000.000 - Rp 2.000.000") {
                if (asetukm > 2000000) {
                    pesan_ast(ast);
                }
            } else if (ast === "Rp 2.000.000 - Rp 3.000.000") {
                if (asetukm > 3000000) {
                    pesan_ast(ast);
                }
            } else if (ast === "Rp 3.000.000 - Rp 4.000.000") {
                if (asetukm > 4000000) {
                    pesan_ast(ast);
                }
            } else {
                if (asetukm > 100000000) {
                    pesan_ast(ast);
                }
            }
        });
        $("#aset_ukm").blur(function() {
            var ast = $("#aset").val();
            var asetukm = parseInt($("#aset_ukm").val());
            if (ast === "< Rp 1.000.000") {
                if (asetukm < 500000) {
                    pesan_ast(ast);
                }
            } else if (ast === "Rp 1.000.000 - Rp 2.000.000") {
                if (asetukm < 1000000) {
                    pesan_ast(ast);
                }
            } else if (ast === "Rp 2.000.000 - Rp 3.000.000") {
                if (asetukm < 2000000) {
                    pesan_ast(ast);
                }
            } else if (ast === "Rp 3.000.000 - Rp 4.000.000") {
                if (asetukm < 3000000) {
                    pesan_ast(ast);
                }
            } else {
                if (asetukm < 4000000) {
                    pesan_ast(ast);
                }
            }
        });
        function pesan_ast(ast) {
            $("#aset_ukm").val("");
            alert("Dana tidak sesuai dengan range dana!\nRange dana adalah" + ast + "!");
        }
    });
  
    function cek(el){
            var a = 16;
            if(el.value.length !== a){
                alert("Harus 16 karakter");
                
            }
        }
    function ceknama(name){
        var l = /^[A-Za-z]+$/;
        if(name.value.match(l)){
            return true;
        }
        else{
            alert("Inputan harus huruf");
            return false;
        }
    }
</script>       
<div id="contain2">  
       <center><h2>Update Calon Kreditur</h2></center>
       <hr />       
        <form class="form-horizontal"  action="<?php echo site_url('C_data_peserta/proses_edit_peserta/'.$peserta->KTP_ID);?>" method="POST" id="tengah">
          <div class="control-group">
            <label class="control-label" >No. KTP :</label>
            <div class="controls">
                <input onblur="cek(this);" type="number" placeholder="KTP_ID..." name="KTP_ID" value="<?php echo $peserta->KTP_ID;?>" required="">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" >Nama peserta :</label>
            <div class="controls">
                <input onkeyup="ceknama(this);" type="text" placeholder="Nama peserta..." name="nama" value="<?php echo $peserta->nama;?>" required="">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" >Alamat :</label>
            <div class="controls">
                <textarea class="input-large" style="height: 100px;" name="alamat" placeholder="Alamat..." required=""><?php echo $peserta->alamat;?></textarea>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" >Reputasi UKM:</label>
            <div class="controls">
                <select name="reputasi" value="<?php echo $peserta->reputasi;?>">
                <?php   $cek1 = 'selected'; $cek2 = ''; $cek3 = ''; $cek4 = ''; $cek5 = '';      
                if($peserta->reputasi == '2'){
                    $cek1 = ''; $cek2 = 'selected'; $cek3 = ''; $cek4 = ''; $cek5 = '';
                } else if($peserta->reputasi == '3'){
                    $cek1 = ''; $cek2 = ''; $cek3 = 'selected'; $cek4 = ''; $cek5 = '';
                } else if($peserta->reputasi == '4'){
                    $cek1 = ''; $cek2 = ''; $cek3 = ''; $cek4 = 'selected'; $cek5 = '';
                } else if($peserta->reputasi == '5'){
                    $cek1 = ''; $cek2 = ''; $cek3 = ''; $cek4 = ''; $cek5 = 'selected';
                }?>
                    <option value="1">Sangat Baik</option>
                    <option value="2">Baik</option>
                    <option value="3">Sedang</option>
                    <option value="4">Biasa</option>
                    <option value="5">Tidak Baik</option>
                </select>
                
                    
                    
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" >Range Harga Barang yang Ditanggungkan :</label>
            <div class="controls">
                <select name="hargaBarang" id="hargaBarang" value="<?php echo $peserta->hargaBarang;?>>
                    <?php 
                    $cek1 = 'selected'; $cek2 = ''; $cek3 = ''; $cek4 = ''; $cek5 = '';      
                    if($peserta->hargaBarang == 'Rp 1.000.000 - Rp 2.000.000'){
                        $cek1 = ''; $cek2 = 'selected'; $cek3 = ''; $cek4 = ''; $cek5 = '';
                    } else if($peserta->hargaBarang == 'Rp 2.000.000 - Rp 3.000.000'){
                        $cek1 = ''; $cek2 = ''; $cek3 = 'selected'; $cek4 = ''; $cek5 = '';
                    } else if($peserta->hargaBarang == 'Rp 3.000.000 - Rp 4.000.000'){
                        $cek1 = ''; $cek2 = ''; $cek3 = ''; $cek4 = 'selected'; $cek5 = '';
                    } else if($peserta->hargaBarang == '> Rp 4.000.000'){
                        $cek1 = ''; $cek2 = ''; $cek3 = ''; $cek4 = ''; $cek5 = 'selected';
                    }
                    ?>
                    <option value="< Rp 1.000.000" <?php echo $cek1;?>>&#60; Rp 1.000.000</option>
                    <option value="Rp 1.000.000 - Rp 2.000.000" <?php echo $cek2;?>>Rp 1.000.000 - Rp 2.000.000</option>
                    <option value="Rp 2.000.000 - Rp 3.000.000" <?php echo $cek3;?>>Rp 2.000.000 - Rp 3.000.000</option>
                    <option value="Rp 3.000.000 - Rp 4.000.000" <?php echo $cek4;?>>Rp 3.000.000 - Rp 4.000.000</option>
                    <option value="> Rp 4.000.000" <?php echo $cek5;?>>&#60; Rp 4.000.000</option>
                </select>
            </div>
          </div>
            <div class="control-group">
            <label class="control-label" >Harga Barang yang Ditanggungkan  :</label>
            <div class="controls">
                <input type="text" placeholder="barang ditanggungkan..." name="brg_ditanggungkan" id="brg_ditanggungkan" value="<?php echo $peserta->brg_ditanggungkan;?>" required="">
            </div>
        </div>
          <div class="control-group">
            <label class="control-label" >Aset UKM :</label>
            <div class="controls">
                <select name="aset" id="aset" value="<?php echo $peserta->aset;?>>
                    <?php 
                    $cek1 = 'selected'; $cek2 = ''; $cek3 = ''; $cek4 = ''; $cek5 = '';      
                    if($peserta->aset == 'Rp 1.000.000 - Rp 2.000.000'){
                        $cek1 = ''; $cek2 = 'selected'; $cek3 = ''; $cek4 = ''; $cek5 = '';
                    } else if($peserta->aset == 'Rp 2.000.000 - Rp 3.000.000'){
                        $cek1 = ''; $cek2 = ''; $cek3 = 'selected'; $cek4 = ''; $cek5 = '';
                    } else if($peserta->aset == 'Rp 3.000.000 - Rp 4.000.000'){
                        $cek1 = ''; $cek2 = ''; $cek3 = ''; $cek4 = 'selected'; $cek5 = '';
                    } else if($peserta->aset == '> Rp 4.000.000'){
                        $cek1 = ''; $cek2 = ''; $cek3 = ''; $cek4 = ''; $cek5 = 'selected';
                    }
                    ?>
                    <option value="< Rp 1.000.000" <?php echo $cek1;?>>&#60; Rp 1.000.000</option>
                    <option value="Rp 1.000.000 - Rp 2.000.000" <?php echo $cek2;?>>Rp 1.000.000 - Rp 2.000.000</option>
                    <option value="Rp 2.000.000 - Rp 3.000.000" <?php echo $cek3;?>>Rp 2.000.000 - Rp 3.000.000</option>
                    <option value="Rp 3.000.000 - Rp 4.000.000" <?php echo $cek4;?>>Rp 3.000.000 - Rp 4.000.000</option>
                    <option value="> Rp 4.000.000" <?php echo $cek5;?>>&#60; Rp 4.000.000</option>
                </select>
            </div>
          </div>
            <div class="control-group">
            <label class="control-label" >Total Aset UKM :</label>
            <div class="controls">
                <input type="text" placeholder="total aset UKM..." name="aset_ukm" id="aset_ukm" value="<?php echo $peserta->aset_ukm;?>" required="">
            </div>
        </div>
          <div class="control-group">
            <label class="control-label" >Dana yang Diajukan :</label>
            <div class="controls">
                <select name="dana" id="dana" value="<?php echo $peserta->dana;?>>
                    <?php 
                    $cek1 = 'selected'; $cek2 = ''; $cek3 = ''; $cek4 = ''; $cek5 = '';      
                    if($peserta->dana == 'Rp 1.000.000 - Rp 2.000.000'){
                        $cek1 = ''; $cek2 = 'selected'; $cek3 = ''; $cek4 = ''; $cek5 = '';
                    } else if($peserta->dana == 'Rp 2.000.000 - Rp 3.000.000'){
                        $cek1 = ''; $cek2 = ''; $cek3 = 'selected'; $cek4 = ''; $cek5 = '';
                    } else if($peserta->dana == 'Rp 3.000.000 - Rp 4.000.000'){
                        $cek1 = ''; $cek2 = ''; $cek3 = ''; $cek4 = 'selected'; $cek5 = '';
                    } else if($peserta->dana == '> Rp 4.000.000'){
                        $cek1 = ''; $cek2 = ''; $cek3 = ''; $cek4 = ''; $cek5 = 'selected';
                    }
                    ?>
                    <option value="< Rp 1.000.000" <?php echo $cek1;?>>&#60; Rp 1.000.000</option>
                    <option value="Rp 1.000.000 - Rp 2.000.000" <?php echo $cek2;?>>Rp 1.000.000 - Rp 2.000.000</option>
                    <option value="Rp 2.000.000 - Rp 3.000.000" <?php echo $cek3;?>>Rp 2.000.000 - Rp 3.000.000</option>
                    <option value="Rp 3.000.000 - Rp 4.000.000" <?php echo $cek4;?>>Rp 3.000.000 - Rp 4.000.000</option>
                    <option value="> Rp 4.000.000" <?php echo $cek5;?>>&#60; Rp 4.000.000</option>
                </select>
            </div>
          </div>
            <div class="control-group">
            <label class="control-label" >Dana yang Diajukan :</label>
            <div class="controls">
                <input type="text" placeholder="dana diajukan..." name="dana_diajukan" id="dana_diajukan" value="<?php echo $peserta->dana_diajukan;?>" required="">
          </div>
          </div>
            <div class="control-group">
            <label class="control-label" >Lama Cicilan :</label>
            <div class="controls">
                <select name="lama_cicil" value="<?php echo $peserta->lama_cicil;?>>
                <?php   $cek1 = 'selected'; $cek2 = ''; $cek3 = ''; $cek4 = ''; $cek5 = '';      
                if($peserta->lama_cicil == '2'){
                    $cek1 = ''; $cek2 = 'selected'; $cek3 = ''; $cek4 = ''; $cek5 = '';
                } else if($peserta->lama_cicil == '3'){
                    $cek1 = ''; $cek2 = ''; $cek3 = 'selected'; $cek4 = ''; $cek5 = '';
                } else if($peserta->lama_cicil == '4'){
                    $cek1 = ''; $cek2 = ''; $cek3 = ''; $cek4 = 'selected'; $cek5 = '';
                } else if($peserta->lama_cicil == '5'){
                    $cek1 = ''; $cek2 = ''; $cek3 = ''; $cek4 = ''; $cek5 = 'selected';
                }?>
                    <option value="1">1 Tahun</option>
                    <option value="2">2 Tahun</option>
                    <option value="3">3 Tahun</option>
                    <option value="4">4 Tahun</option>
                    <option value="5">5 Tahun</option>
                </select>
            </div>
          </div>
            <div class="control-group">
            <label class="control-label" >Cicilan perbulan  :</label>
            <div class="controls">
                <input type="text" placeholder="cicilan perbulan..." name="cicil_perbulan"  value="<?php echo $peserta->cicil_perbulan;?>" required="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Penghasilan perbulan  :</label>
            <div class="controls">
                <input type="text" placeholder="penghasilan perbulan..." name="penghasilan_perbulan" value="<?php echo $peserta->penghasilan_perbulan;?>" required="">
            </div>
        </div>
            <div class="control-group">
            <div class="control-group">
            <label class="control-label" >Kemampuan Menyicil :</label>
            <div class="controls">
                <select name="mampu_cicil" value="<?php echo $peserta->mampu_cicil;?>>
                <?php   $cek1 = 'selected'; $cek2 = ''; $cek3 = ''; $cek4 = ''; $cek5 = '';      
                if($peserta->mampu_cicil == '2'){
                    $cek1 = ''; $cek2 = 'selected'; $cek3 = ''; $cek4 = ''; $cek5 = '';
                } else if($peserta->mampu_cicil == '3'){
                    $cek1 = ''; $cek2 = ''; $cek3 = 'selected'; $cek4 = ''; $cek5 = '';
                } else if($peserta->mampu_cicil == '4'){
                    $cek1 = ''; $cek2 = ''; $cek3 = ''; $cek4 = 'selected'; $cek5 = '';
                } else if($peserta->mampu_cicil == '5'){
                    $cek1 = ''; $cek2 = ''; $cek3 = ''; $cek4 = ''; $cek5 = 'selected';
                }?>
                    <option value="1">Sangat Baik</option>
                    <option value="2">Baik</option>
                    <option value="3">Sedang</option>
                    <option value="4">Biasa</option>
                    <option value="5">Tidak Baik</option>
                </select>
            </div>
        </div>
          <div class="control-group">
            <label class="control-label" >No Telp :</label>
            <div class="controls">
                <input type="number" placeholder="no telp..." name="no_tlp" value="<?php echo $peserta->no_tlp;?>" required="">
          </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <a href="<?php echo site_url('C_halaman_pengurus/data_peserta');?>" ><button type="button" class="btn">Batal</button></a>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
        </form>
    </div>