<div id="contain2">
    <center>
        <h2>Data Pengaju Kredit</h2>

    </center>
    <!--        <div class="row">
              <div class="span9">-->
    <div class="form-horizontal" style="margin-left: -45px;">
        <div class="control-group">
            <label class="control-label" ><b>Perhitungan Ke :</b></label>
            <div class="controls">
                <select id="tipe" onchange="myFunction()">
                    <?php
                    foreach ($daftar_pes as $pes) {
                        if ($pes->hitung_ke > 0) {
                            if ($id == $pes->hitung_ke) {
                                ?>
                                <option value="<?php echo $pes->hitung_ke; ?>" selected><?php echo $pes->hitung_ke; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $pes->hitung_ke; ?>"><?php echo $pes->hitung_ke; ?></option>
                                <?php
                            }
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <center>
        <?php if ($daftar_peserta == null) { ?>
            <h3 style="color:red">Perhitungan Belum Dilakukan</h3>
            <?php
        } else {
            $no = 1;
            $total_dana = 0;
            $dana_ditolak = 0;
            ?>
            <table class="table table-striped table-hover fill-head">
                <tr>
                    <th>#</th>
                    <th>No. KTP</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Dana</th>
                    <th>Priority Vector</th>
                    
                    <th>Status</th>
                </tr>
                <?php
                foreach ($daftar_peserta as $peserta) {
                    if ($peserta->status == 0 || $peserta->status == 1) {
                        $total_dana = $total_dana + $peserta->dana_diajukan;
                    }
                    if ($peserta->status == 2) {
                        $dana_ditolak = $dana_ditolak + $peserta->dana_diajukan;
                    }
                    $limit_dana = 200000000;
                    if ($total_dana <= $limit_dana) {
                        ?>

                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $peserta->KTP_ID; ?></td>
                            <td><?php echo $peserta->nama; ?></td>
                            <td><?php echo $peserta->alamat; ?></td>
                            <td><?php echo $peserta->dana_diajukan; ?></td>
                            <td><?php echo $peserta->scor; ?></td>
                            
                            <?php if ($peserta->hitung_ke != 0) { ?>
                                <td>
                                    <?php if ($peserta->status == 1) { ?>
                                        <p style="color: green">Disetujui</p>
                                    <?php } else if ($peserta->status == 2) { ?>
                                        <p style="color: red">Ditolak</p>
                                    <?php } else { ?>
                                    <?php } ?>
                                </td>
                            <?php } else { ?>
                                <td></td>
                            <?php } ?>
                        </tr>
                        <?php
                        $total_disetuji = $total_dana;
                    } else {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $peserta->KTP_ID; ?></td>
                            <td><?php echo $peserta->nama; ?></td>
                            <td><?php echo $peserta->alamat; ?></td>
                            <td><?php echo $peserta->dana_diajukan; ?></td>
                            <td><?php echo $peserta->scor; ?></td>
                            
                            <td></td>
                        </tr>
                        <?php
                    }
                    $no++;
//                    }
                }
                ?> 
            </table>
            <table class="table table-bordered table-striped table-hover fill-head" style="width: 30%">
                <tr>
                    <th colspan="3"><center>Dana</center></th>
                </tr>
                <tr>
                    <th>Total Dana Disetujui</th>
                    <td>Rp. <?php echo $total_disetuji; ?></td>
                </tr>
                <tr>
                    <th>Total Dana Ditolak</th>
                    <td>Rp. <?php echo $dana_ditolak; ?></td>
                </tr>
                <tr>
                    <th>Limit Dana</th>
                    <td>Rp. 200000000</td>
                </tr>
            </table>
        <?php } ?>
        </fieldset>
    </center>
</div>