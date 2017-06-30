<div id="contain2">
    <center>
        <h2>Data Pengaju Kredit</h2>

    </center>
    <!--        <div class="row">
              <div class="span9">-->
    <div class="form-horizontal" style="margin-left: -45px;">
<!--        <form class="form-horizontal"  action="<?php echo site_url('C_halaman_admin/rangking_peserta'); ?>" method="POST">-->
        <div class="control-group">
            <label class="control-label" ><b>Perhitungan Ke :</b></label>
            <div class="controls">
                <select id="tipe" onchange="myFunction()">
                    <?php
                    foreach ($daftar_pes as $pes2) {
                        if ($pes2->hitung_ke > 0) {
                            if ($id == $pes2->hitung_ke) {
                                ?>
                                <option value="<?php echo $pes2->hitung_ke; ?>" selected><?php echo $pes2->hitung_ke; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $pes2->hitung_ke; ?>"><?php echo $pes2->hitung_ke; ?></option>
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
                    <th>File</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Dana</th>
                    <th>Priority Vector</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php
                foreach ($daftar_peserta as $peserta) {
                    if ($peserta->status == 0 || $peserta->status == 1) {
                        $total_dana = $total_dana + $peserta->dana_diajukan;
                    }
                    if($peserta->status == 2){
                        $dana_ditolak = $dana_ditolak + $peserta->dana_diajukan;
                    }
                    $limit_dana = 200000000;
                    if ($total_dana <= $limit_dana) {
                        ?>

                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $peserta->KTP_ID; ?></td>
                            <td>
                                <?php 
                                    $file = $this->M_peserta->get_files($peserta->KTP_ID);
                                    if($file){ 
                                        echo '<a class="btn btn-success btn xs" href="'.base_url('uploads/files/'.$file->nama_files).'"><i class="icon-download"></i> unduh</a>';
                                    } else {
                                        echo "tidak ada file";
                                    }
                                ?>
                            </td>
                            <td><?php echo $peserta->nama; ?></td>
                            <td><?php echo $peserta->alamat; ?></td>
                            <td><?php echo $peserta->dana_diajukan; ?></td>
                            <td><?php echo $peserta->scor; ?></td>
                            <td>Direkomendasikan</td>
                            <?php if ($peserta->hitung_ke != 0) { ?>
                                <td>
                                    <?php if ($peserta->status == 1) { ?>
                                        <p style="color: green">Disetujui</p>
                                    <?php } else if ($peserta->status == 2) { ?>
                                        <p style="color: red">Ditolak</p>
                                        <?php } else if ($peserta->status == 3) { ?>
                                        <p style="color: black">Selesai</p>
                                    <?php } else { ?>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($peserta->status == 1) { ?>
                                        <a href="<?php echo site_url('C_halaman_admin/tolak/' . $peserta->no . '/' . $peserta->hitung_ke); ?>" class="btn btn-danger">Tolak</a>
                                        <a href="<?php echo site_url('C_halaman_admin/selesai/' . $peserta->no . '/' . $peserta->hitung_ke); ?>" class="btn btn-warning">Selesai</a>
                                    <?php } else if ($peserta->status == 2) { ?>
                                        <a href="<?php echo site_url('C_halaman_admin/setujui/' . $peserta->no . '/' . $peserta->hitung_ke); ?>" class="btn btn-success">Setujui</a>
                                    <?php } else if ($peserta->status == 3) { ?>
                                        <a href="<?php echo site_url('C_halaman_admin/setujui/' . $peserta->no . '/' . $peserta->hitung_ke); ?>" class="btn btn-success">Setujui</a>
                                        <a href="<?php echo site_url('C_halaman_admin/tolak/' . $peserta->no . '/' . $peserta->hitung_ke); ?>" class="btn btn-danger">Tolak</a>
                                    <?php } else { ?>
                                        <a href="<?php echo site_url('C_halaman_admin/setujui/' . $peserta->no . '/' . $peserta->hitung_ke); ?>" class="btn btn-success">Setujui</a>
                                        <a href="<?php echo site_url('C_halaman_admin/tolak/' . $peserta->no . '/' . $peserta->hitung_ke); ?>" class="btn btn-danger">Tolak</a>
                                    <?php } ?>
                                    <a href="<?php echo site_url('C_halaman_admin/batal_hitung_ke/' . $peserta->no . '/' . $peserta->hitung_ke); ?>" class="btn btn-primary">Batal</a>
                                </td>
                            <?php } else { ?>
                                <td></td>
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
                            <td>Tidak Direkomendasikan</td>
                            <?php if ($peserta->hitung_ke != 0) { ?>
                                <td>
                                </td>
                                <td>
                                    <a href="<?php echo site_url('C_halaman_admin/batal_hitung_ke/' . $peserta->KTP_ID . '/' . $peserta->hitung_ke); ?>" class="btn btn-primary">Batal</a>
                                </td>
                            <?php } else { ?>
                                <td></td>
                                <td></td>
                            <?php } ?>
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
        <?php }
        ?>


        <h4></h4>
        </fieldset>
    </center>
</div>
<!--          <div class="span3">
                <center>
                    <h4>Hubungi Kami</h4>
                </center>
                <div id="kontak">
                    <p><i>Sistem Informasi Universitas Jember<br />
                    Jalan Kalimantan No. 37 Kampus Tegalboto<br />
                    Jember Jawa Timur 68121 Indonesia</i></p>
                    <p><img src="<?php echo base_url('asset/img/emailButton.png'); ?>"/> <i>humas@unej.ac.id</i></p>
                    <p><img src="<?php echo base_url('asset/img/con_tel.png'); ?>"/> <i>+62 331-330224, 081234073076</i></p>
                    <p><img src="<?php echo base_url('asset/img/con_fax.png'); ?>"/> <i>+62 331-339029 , 337422</i></p>
                </div><br />
                <center>
                    <h4>Supported By</h4>
                    <hr />
                    <p><img src="<?php echo base_url('asset/img/unej.png'); ?>"/></p><br />
                    <p><img src="<?php echo base_url('asset/img/himasif.png'); ?>"/></p><br />
                    <p><img src="<?php echo base_url('asset/img/mandiri.jpg'); ?>"/></p>
                </center>
          </div>-->
</div>
</div>
</div>
</div>
<br />