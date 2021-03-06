<link rel="stylesheet" href="<?= base_url('asset/jquery-ui/jquery-ui.theme.min.css') ?>">
<script type="text/javascript">
    $(document).ready(function() {
        
        var source_peserta = [
           <?php 
            foreach ($dt_peserta as $dt){
                echo '"'.$dt->KTP_ID.'",';
            }
            ?>
        ];
        $( "#KTP_ID" ).autocomplete({
            source: source_peserta,
            select: function (event, ui) {  
                var ktp = ui.item.value;
                var json = '<?php echo base_url("index.php/C_data_peserta/json_peserta") ?>' +'/'+ ktp;
                $.getJSON(json, function(jd) { 
                  if(jd.status == 1){
                    alert("Anggota masih berhutang");
                    $( "#KTP_ID" ).val("");
                  } else {
                    $("#nama").val(jd.nama);
                    $("#alamat").val(jd.alamat);
                    $("#no_tlp").val(jd.no_tlp);
                  }
                });
            }   
        });
        
        //cicilan perbulan
        $( "#lama_cicil" ).change(function () {
            var thn = $( this ).val();
            dana_diajukan = $("#dana_diajukan").val();
            if (dana_diajukan == ""){
                alert('Isi dana yang ingin diajukan');
            } else if (thn == "") {
                alert('Pilih Lama Cicilan');
                $('#cicilan_perbulan').val('');
            } else {
                bunga = thn * (9/100);
                hasil_persen = dana_diajukan * bunga;
                lama_cicil = thn * 12 ;
                cicilan = ( parseFloat(dana_diajukan) +  parseFloat(hasil_persen) ) / lama_cicil ;
                hasil = parseFloat(cicilan).toFixed(2);
                $('#cicilan_perbulan').val(hasil);
            }
        });
        
        var count = 1;
        $("#add_btn").click(function() {
            $("#add_form").append(
                    '<div class="test">'
                    + '<input type="file" name="userFiles[]" multiple="multiple">'
                    + '<button class="remove_item btn btn-danger">Hapus</button>'
                    + '</div>'
                    );
        });

        $("body").on("click", ".remove_item", function() {
            $(this).parent(".test").remove();
        });

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
    

    function cek(el) {
        var a = 16;
        if (el.value.length !== a) {
            $("#KTP_ID").val("");
            alert("Harus 16 karakter");
        }
    }
    
    function ceknama(name) {
        var l = /^[A-Za-z ]+$/;
        if (name.value.match(l)) {
            return true;
        }
        else {
            $("#nama").val("");
            alert("Inputan harus huruf");
            return false;
        }
    }


</script>    

<!-- Pesan Gagal Insert -->


<div id="contain2">  
    <center><h2>Tambah Data Pengaju Kredit</h2></center>
    <hr />       
    <form class="form-horizontal" enctype="multipart/form-data"  action="<?php echo site_url('C_data_peserta/proses_tambah_peserta'); ?>" method="POST" id="tengah">
        <div class="control-group">
            <label class="control-label">Tgl Pendaftaran :</label>
            <div class="controls">
                <div class="input-append date" id="awal" data-date-format="yyyy-mm-dd">
                    <input name="tgl_pendaftaran" class="span2" placeholder="YYYY-MM-DD" size="16" type="text" value="<?php echo date('Y-m-d'); ?>" readonly="">
                    <span class="add-on">
                        <i class="icon-calendar"></i>
                    </span>
                </div>
            </div>
        </div>
        <!--onblur="cek(this);"-->
        <div class="control-group">
            <label class="control-label" >No KTP :</label>
            <div class="controls">
                <input  type="number" placeholder="KTP_ID..." id="KTP_ID" name="KTP_ID" value="" required="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Nama peserta :</label>
            <div class="controls">
                <input onblur="ceknama(this);" type="text" placeholder="Nama peserta..." id="nama" name="nama" value="" required="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Alamat :</label>
            <div class="controls">
                <textarea id="alamat" class="input-large" style="height: 100px;" name="alamat" placeholder="Alamat..." required=""></textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Reputasi UKM :</label>
            <div class="controls">
                <div class="checkbox">
                    <label><input type="checkbox" class="check" value="">Check 1</label>
                </div>
                 <div class="checkbox">
                    <label><input type="checkbox" class="check" value="">Check 2</label>
                </div>
                 <div class="checkbox">
                    <label><input type="checkbox" class="check" value="">Check 3</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" class="check" value="">Check 4</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" class="check" value="">Check 4</label>
                </div>
                <script type="application/javascript">
                    $(".check").change(function() {
                        //if(this.checked) {
                        var total_cek = $('input:checkbox:checked').length;
                        if(total_cek == 1){
                            //alert('satu');
                            $('#tbaik').prop('selected', 'selected');
                            $('#reputasi').val(5);
                        } else if(total_cek == 2){
                            $('#biasa').prop('selected', 'selected');
                            $('#reputasi').val(4);
                        } else if(total_cek == 3){
                            $('#sedang').prop('selected', 'selected');
                            $('#reputasi').val(3);
                        } else if(total_cek == 4){
                            $('#baik').prop('selected', 'selected');
                            $('#reputasi').val(2);
                        } else if(total_cek == 5){
                            $('#sbaik').prop('selected', 'selected');
                            $('#reputasi').val(1);
                        } else {
                            $('#oho').prop('selected', 'selected');
                            $('#reputasi').val(0);
                        }
                    });
                </script>
                <input type="hidden" name="reputasi" id="reputasi" value="">
                <select disabled>
                    <option id="oho" value=""></option>
                    <option id="sbaik" value="1">Sangat Baik</option>
                    <option id="baik" value="2">Baik</option>
                    <option id="sedang" value="3">Sedang</option>
                    <option id="biasa" value="4">Biasa</option>
                    <option id="tbaik" value="5" >Tidak Baik</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Range Harga Barang yang Ditanggungkan :</label>
            <div class="controls">
                <select name="hargaBarang" id="hargaBarang">
                    <option value="< Rp 1.000.000">&#60; Rp 1.000.000</option>
                    <option value="Rp 1.000.000 - Rp 2.000.000">Rp 1.000.000 - Rp 2.000.000</option>
                    <option value="Rp 2.000.000 - Rp 3.000.000">Rp 2.000.000 - Rp 3.000.000</option>
                    <option value="Rp 3.000.000 - Rp 4.000.000">Rp 3.000.000 - Rp 4.000.000</option>
                    <option value="> Rp 4.000.000">&#62; Rp 4.000.000</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Harga Barang yang Ditanggungkan  :</label>
            <div class="controls">
                <input type="text" placeholder="barang ditanggungkan..." name="brg_ditanggungkan" id="brg_ditanggungkan" value="" required="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Aset UKM :</label>
            <div class="controls">
                <select name="aset" id="aset">
                    <option value="< Rp 1.000.000">&#60; Rp 1.000.000</option>
                    <option value="Rp 1.000.000 - Rp 2.000.000">Rp 1.000.000 - Rp 2.000.000</option>
                    <option value="Rp 2.000.000 - Rp 3.000.000">Rp 2.000.000 - Rp 3.000.000</option>
                    <option value="Rp 3.000.000 - Rp 4.000.000">Rp 3.000.000 - Rp 4.000.000</option>
                    <option value="> Rp 4.000.000">&#62; Rp 4.000.000</option>
                </select>
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" >Total Aset UKM :</label>
            <div class="controls">
                <input type="text" placeholder="total aset UKM..." name="aset_ukm" id="aset_ukm" value="" required="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Range Dana yang Diajukan :</label>
            <div class="controls">
                <select name="dana" id="dana">
                    <option value="< Rp 1.000.000">&#60; Rp 1.000.000</option>
                    <option value="Rp 1.000.000 - Rp 2.000.000">Rp 1.000.000 - Rp 2.000.000</option>
                    <option value="Rp 2.000.000 - Rp 3.000.000">Rp 2.000.000 - Rp 3.000.000</option>
                    <option value="Rp 3.000.000 - Rp 4.000.000">Rp 3.000.000 - Rp 4.000.000</option>
                    <option value="> Rp 4.000.000">&#62; Rp 4.000.000</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Dana yang Diajukan  :</label>
            <div class="controls">
                <input type="text" placeholder="dana yang diajukan..." name="dana_diajukan" id="dana_diajukan" value="" required="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Lama Cicilan :</label>
            <div class="controls">
                <select name="lama_cicil" id="lama_cicil">
                    <option value="">Pilih ..</option>
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
                <input type="text" placeholder="cicilan perbulan..." name="cicil_perbulan" id="cicilan_perbulan"  value="" required="">
            </div>
        </div>
<!--         <div class="control-group">
           <label class="control-label" >Penghasilan perbulan  :</label>
            <div class="controls">
                <input type="text" placeholder="penghasilan perbulan..." name="penghasilan_perbulan" value="" required="">
            </div>
        </div>-->
        <div class="control-group">
            <div class="control-group">
            <label class="control-label" >Kemampuan Menyicil :</label>
            <div class="controls">
                <select name="mampu_cicil" id="mampu">
                    <option value="1">Sangat Baik</option>
                    <option value="2">Baik</option>
                    <option value="3">Sedang</option>
                    <option value="4">Biasa</option>
                    <option value="5">Tidak Baik</option>
                </select>
            </div>
        </div>
            <label class="control-label" >No Telp :</label>
            <div class="controls">
                <input id="no_tlp" type="number" placeholder="no telp..." name="no_tlp" value="" required="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Upload :</label>
            <div class="controls" id="add_form">
                <b>Ukuran maximal file 2 MB</b>
                <input type="file" name="userFiles[]" multiple="multiple">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <input class="btn btn-success" type="button" name="add_btn" value="Add File" id="add_btn">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <a href="<?php echo site_url('C_halaman_pengurus/data_peserta'); ?>" ><button type="button" class="btn">Batal</button></a>
                <input type="submit" name="fileSubmit" value="Simpan" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>