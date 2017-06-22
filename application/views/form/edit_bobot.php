    <div id="contain2">
    <center>
    <h2>Update Bobot Kriteria</h2>
    </center>
    <hr />
     
    <form action="<?php echo site_url('C_bobot_kriteria/proses_edit_bobot/'.$id);?>" method="POST">
    <table class="table table-striped table-hover table-bordered">
        <tr>
            <th>#</th>
        <?php foreach ($daftar_kriteria as $kriteria) {?>
            <th><?php echo $kriteria->nama_kriteria;?></th>
        <?php } ?>
        </tr>
        
        <?php $kolom = 1;
        foreach ($daftar_kriteria as $kriteria) {?>
        <fieldset>
        <tr>
            <td><b><?php echo $kriteria->nama_kriteria;?></b></td>
            <?php $baris = 1;
            foreach ($daftar_kriteria as $kriteria) {
                if($baris <= $kolom){?>
            
                    <td><input type="text" id="<?php echo $kolom; echo $baris; ?>" name="<?php echo $kolom; echo $baris; ?>" class="input-mini" value="1"></td>
                    
           
                <?php }else { ?>
                 <td>
                <select class="input-mini" id="nilai<?php echo $baris; echo $kolom;?>" name="<?php echo $kolom; echo $baris; ?>" onchange="gantiNilai(<?php echo $baris; ?>, <?php echo $kolom; ?>, <?php echo $jumlah; ?>)">
                                                    <option value="0.111">1/9</option>
                                                    <option value="0.125">1/8</option>
                                                    <option value="0.142">1/7</option>
                                                    <option value="0.166">1/6</option>
                                                    <option value="0.2">1/5</option>
                                                    <option value="0.25">1/4</option>
                                                    <option value="0.333">1/3</option>
                                                    <option value="0.5">1/2</option>
                                                    <option value="1" selected>1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                     </select>
                </td>
            <?php }
            $baris++;} ?>
        </tr>
        <?php 
        $kolom++; } ?>
        
    </table>
    </fieldset>
        <button type="submit" class="btn btn-primary" style="float: right; margin: 2px;">Save</button>
        <a href="<?php echo site_url('C_halaman_admin/bobot_kriteria/'.$id);?>"><button type="button" class="btn" style="float: right; margin: 2px;">Back</button></a>
    <br />
    </form>
    <hr />
    <br />
    </div>