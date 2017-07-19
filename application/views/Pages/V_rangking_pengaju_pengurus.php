<div id="contain2">
    <div class="row">
        <div class="span12">
            <center>
                <h2>Data Rangking Pengaju Kredit</h2>
                <hr />
            </center>
            <!--        <div class="row">
                      <div class="span9">-->
            <div class="form-horizontal" style="margin-left: -45px;">
                <div class="control-group">
                    <label class="control-label" ><b>Perhitungan Ke : </b></label>
                    <div class="controls">
                        <input type="text" name="KTP_ID" value="<?php echo $hitung_ke; ?>" readonly="readonly">
                    </div>
                </div>
            </div>
            <center>
                <table class="table table-striped table-hover">
                    <tr>
                        <th>KTP ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Skor</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($daftar_peserta as $peserta) { ?>
                        <fieldset>

                            <tr class="kolomFoto">
                                <td><?php echo $peserta->KTP_ID; ?></td>
                                <td><?php echo $peserta->nama; ?></td>
                                <td><?php echo $peserta->alamat ?></td>
                                <td><?php echo $peserta->scor ?></td>
                                <td>
                                    <form role="form" class="form-horizontal" action="<?php echo site_url('C_halaman_pengurus/tambah_hitung_ke/' . $hitung_ke); ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" class="form-control"name="id_ktp" required="true" value="<?php echo $peserta->no; ?>">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </form>


                                </td>
                            </tr>
                        <?php } ?>

                </table>
                </fieldset>
            </center>
        </div>

    </div>
</div>
</div>
</div>
<br />