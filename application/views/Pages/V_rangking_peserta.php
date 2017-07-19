<div id="contain2">
    <center>
        <h2>Rangking Pengaju Kredit</h2>
        <h4><?php echo $this->session->userdata('nama_kredit') ?></h4>
        <br />
        <div class="form-horizontal" style="margin-left: -45px;">
            <form class="form-horizontal"  action="<?php echo site_url('C_halaman_pengurus/perangkingan_peserta'); ?>" method="POST">
                <div class="control-group">
                    <label class="control-label" ><b>Perhitungan Ke :</b></label>
                    <div class="controls">
                        <select id="tipe" name="ke" onchange="myFunction()">
                            <?php
                            foreach ($daftar_pes as $pes1) {
                                if ($id == $pes1->hitung_ke) {
                                    ?>
                                    <option value="<?php echo $pes1->hitung_ke; ?>" selected><?php echo $pes1->hitung_ke; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $pes1->hitung_ke; ?>"><?php echo $pes1->hitung_ke; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>


        <table class="table table-striped table-hover fill-head">
            <tr>
                <th>#</th>
                <th>KTP</th>
                <th>Nama</th>
                <th>Perhitungan Ke</th>
                <th>Priority Vector</th>
                <th>Action</th>
            </tr>

            <?php
            $no = 1;
            foreach ($daftar_peserta as $peserta) {
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $peserta->KTP_ID; ?></td>
                    <td><?php echo $peserta->nama; ?></td>
                    <td><?php echo $peserta->hitung_ke; ?></td>
                    <td><?php echo $peserta->scor; ?></td>
                    <td>
                        <?php if ($peserta->hitung_ke != 0) { ?>
                            <a href="<?php echo site_url('C_halaman_pengurus/batal_hitung_ke/' . $peserta->no . '/' . $peserta->hitung_ke); ?>" class="btn btn-primary">Batal</a>
                        <?php } ?>
                    </td>
                </tr>
                <?php
                $no++;
            }
            ?>

        </table>
        </fieldset>
        <br />
    </center>
</div>

