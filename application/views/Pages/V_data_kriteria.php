    <div id="contain2">
    <center>
    <h2>Data Kriteria</h2>
    <hr />
    
        <table class="table table-striped table-hover">
        <tr>
                    <th>ID Kriteria</th>
                    <th>Nama Kriteria</th>
        </tr>
        <?php foreach ($daftar_kriteria as $kriteria) {?>
    <fieldset>

        <tr>
                    <td><?php echo $kriteria->ID_kriteria;?></td>
                    <td><?php echo $kriteria->nama_kriteria;?></td>
          </tr>
    <?php } ?>
    </table>
    </fieldset>
    <br />
    </center>
    </div>