    <div id="contain2">
    <center>
    <h2>Bobot Kriteria</h2>
    </center>
    <hr />
    
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
     
    <a href="<?php echo site_url('C_bobot_kriteria/edit_bobot/'.$id);?>"><button class="btn btn-primary" id="btnTambah" style="float: right;">Update</button></a>  
    <table class="table table-striped table-hover fill-head">
        <tr>
            <th>#</th>
        <?php foreach ($daftar_kriteria as $kriteria) {?>
            <th><?php echo $kriteria->nama_kriteria;?></th>
        <?php } ?>
            <th>Priority Vector</th>
        </tr>
        
        <?php $index = 0;
            
        foreach ($daftar_kriteria as $kriteria) {?>
        <fieldset>
        <tr>
            <td><b><?php echo $kriteria->nama_kriteria;?></b></td>
            <?php
            foreach ($relasi_kriteria as $relasi) {
                if($relasi->id_kriteria1 == $kriteria->ID_kriteria){ ?>                           
                   <td><?php echo $relasi->bobot; ?></td>
			<?php
                  }
            }
            ?>
            
            <td>
                <?php echo $nilai_vector[$index]; ?>
            </td>
        </tr>
        <?php 
        $index++; } ?>
        <tr>
            <td><b>Jumlah</b></td>
            <?php for($i = 0; $i < count($jumlah_per_kolom); $i++){ ?>
                <td><?php echo $jumlah_per_kolom[$i] ?></td>
            <?php } ?>
            <td></td>
        </tr>
        
    </table>
    </fieldset>
    <table class="table">
		<tr>
			<td><p><b>Principle Eigen value(max)</b></p></td><td><p><b style="float:right;">
            <?php echo $nilai_lamda; ?>
			</b></p></td>
		</tr>
		<tr>
			<td><p><b>Consistency index(CI)</b></p></td><td><p><b style="float:right;">
            <?php echo $nilai_ci; ?>
			</b></p></td>
		</tr>
		<tr>
			<td><p><b>Consistency Ratio(CR)</b></p></td><td><p><b style="float:right;">
            <?php echo $nilai_cr; ?>%
			</b></p></td>
		</tr>
	</table>
    <?php if($nilai_cr > 0.1){ ?>
        <div class="alert alert-error">
          Nilai Perbandingan Tidak Konsisten, Silahkan melakukan perbandingan lagi
        </div>
    <?php } else { ?>
        <div class="alert alert-success">
          Nilai Perbandingan Konsisten, Lanjut ke logika fuzzy
        </div>
        <hr />
        <center><h3>Tabel Fuzzy</h3></center>
        <hr />
        <table class="table table-striped table-bordered table-hover fill-head">
        <tr>
            <th>#</th>
        <?php foreach ($daftar_kriteria as $kriteria) {?>
            <th colspan="3"><?php echo $kriteria->nama_kriteria;?></th>
        <?php } ?>
            <th colspan="3">Jumlah</th>
        </tr>
        
        <?php   
        $total1 = 0;
        $total2 = 0;
        $total3 = 0;
        $index = 0;
        foreach ($daftar_kriteria as $kriteria) {?>
        <fieldset>
        <tr>
            <td><b><?php echo $kriteria->nama_kriteria;?></b></td>
            <?php 
            $index1 = 0;
            
            foreach ($relasi_kriteria as $relasi) {
                if($relasi->id_kriteria1 == $kriteria->ID_kriteria){
                    ?>                           
                   <td><?php echo $nilai_fuzzy[$index1][0]; ?></td>
                   <td><?php echo $nilai_fuzzy[$index1][1]; ?></td>
                   <td><?php echo $nilai_fuzzy[$index1][2]; ?></td>
			<?php
                  }
                  $index1++;
            } ?>
            <td> <?php echo $jumlah_fuzzy[$index][0]; ?> </td>
            <td> <?php echo $jumlah_fuzzy[$index][1]; ?></td>
            <td> <?php echo $jumlah_fuzzy[$index][2]; ?> </td>
        </tr>
        <?php 
            $index++;
        } ?>
        <tr>
            <td><b>Jumlah</b></td>
            <td colspan="12"></td>
            <td> <?php echo $total_fuzzy1; ?> </td>
            <td> <?php echo $total_fuzzy2; ?> </td>
            <td> <?php echo $total_fuzzy3; ?> </td>
        </tr>    
    </table>
    </fieldset>
    <hr />
    <center><h3>Nilai Sintesis Fuzzy (Si) Kriteria</h3></center>
    <hr />
        <table class="table table-striped table-bordered table-hover fill-head" style="width: 500px; margin-left: 30%;">
        <tr>
            <th rowspan="2"><center>Kriteria</center></th>
            <th colspan="3"><center>Si</center></th>
        </tr>
        <tr>
            <th><center>l</center></th>
            <th><center>m</center></th>
            <th><center>u</center></th>
        </tr>
        <?php   
        foreach ($daftar_kriteria as $kriteria) {?>
        <fieldset>
        <tr>
            <td><b><?php echo $kriteria->nama_kriteria;?></b></td>
            <?php $index = 0;
            foreach ($daftar_kriteria as $kriteria2) {
                if($kriteria2->ID_kriteria == $kriteria->ID_kriteria){?>
                <td><?php echo $nilai_si[$index][0];?></td>
                <td><?php echo $nilai_si[$index][1];?></td></td>
                <td><?php echo $nilai_si[$index][2];?></td>
            <?php 
            }
            $index++;
        } ?>
        </tr>  
        <?php } ?>
    </table>
    <hr />
        <center><h3>Nilai Bobot Kriteria</h3></center>
    <hr />
    <table class="table table-striped table-bordered table-hover fill-head" style="width: 500px; margin-left: 30%;">
        <tr>
            <th><center>Kriteria</center></th>
            <th><center>Bobot</center></th>
        </tr>
        <?php   
        $index = 0;
        foreach ($daftar_kriteria as $kriteria) {?>
        <fieldset>
        <tr>
            <td><b><?php echo $kriteria->nama_kriteria;?></b></td>
            <td><?php echo $bobot_fuzzy[$index];?></td>
            <?php
            $index++;
        } ?>
        </tr>
    </table>
    <?php } ?>
    <br />
    <br />
    <hr />
    <center><h4>Sub Kriteria</h4></center>
    <hr />
    <table class="table table-striped table-hover fill-head">
                                    <thead>
                                        <tr>
                                            <th>Subkriteria</th>
                                            <th>Sangat Tinggi</th>
											<th>Tinggi</th>
											<th>Cukup</th>
											<th>Rendah</th>
											<th>Sangat Rendah</th>
											<th>Vector Priority</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<tr>
                                            <td>Sangat Tinggi</td>
											<td>1</td>
											<td>2</td>
											<td>3</td>
											<td>4</td>
											<td>5</td>
											<td>0.42</td>
                                        </tr> 

										<tr>
                                            <td>Tinggi</td>
											<td>0.50</td>
											<td>1</td>
											<td>2</td>
											<td>3</td>
											<td>4</td>
											<td>0.26</td>
                                        </tr> 
										
										<tr>
                                            <td>Cukup</td>
											<td>0.33</td>
											<td>0.50</td>
											<td>1</td>
											<td>2</td>
											<td>3</td>
											<td>0.16</td>
                                        </tr> 
										<tr>
                                            <td>Rendah</td>
											<td>0.25</td>
											<td>0.33</td>
											<td>0.50</td>
											<td>1</td>
											<td>2</td>
											<td>0.10</td>
                                        </tr> 
										<tr>
                                            <td>Sangat Rendah</td>
											<td>0.20</td>
											<td>0.25</td>
											<td>0.33</td>
											<td>0.50</td>
											<td>1</td>
											<td>0.06</td>
                                        </tr> 
										
										<tr>
											<td>Jumlah</td>
											<td>2.28</td>
											<td>4.08</td>
											<td>6.83</td>
											<td>10.50</td>
											<td>15.00</td>
											<td></td>
										</tr>
                                    </tbody>
                                </table>
								
								<table class="table">
								<tr>
									<td><p><b>Principle Eigen value(max)</b></p></td><td><p><b style="float:right;">5.06
									</b></p></td>
								</tr>
								<tr>
									<td><p><b>Consistency index(CI)</b></p></td><td><p><b style="float:right;">0.01
									</b></p></td>
								</tr>
								<tr>
									<td><p><b>Consistency Ratio(CR)</b></p></td><td><p><b style="float:right;">0.01%
									</b></p></td>
								</tr>
							  </table>
    </div>