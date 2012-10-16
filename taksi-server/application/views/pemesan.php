<script>
    $(document).ready(function(){
     
        $(".status-change").change(function(){         
            $("#form_aksi").submit();
        })
    });
</script>
<?php
echo form_open("admin/search", 'method="GET"');
echo form_input("s");
echo form_submit("search", "Cari");
echo form_close();
?>
<table>
    <!--   nama_pemesan 	alamat_pemesan 	waktu_pemesan 	nomor_telephon 	tujuan 	jumlah_orang 	status-->
    <thead>
        <tr>

            <th>Nama Pemesan</th>
            <th>Tanggal Sekarang</th>
            <th>Waktu Sekarang</th>
            <th>Alamat Pemesan</th>
            <th>Tanggal Memesan</th>
            <th>Waktu Memesan</th>
            <th>Telp</th>
            <th>Tujuan</th>
            <th>Jumlah Orang</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

    </thead>
    <tbody>
        <?php echo form_open("admin/aksi", "id=form_aksi"); ?>
        <?php if (!empty($pemesans)): ?>
        <?php if(isset($pemesans)):?>
        <?php foreach ($pemesans as $pemesan): ?>
                <tr
                    style="background:<?php
                if ($pemesan["status"] == "belum") {
                    echo "#9999ff";
                } else if ($pemesan["status"] == "tolak") {
                    echo "#ff9999";
                } else if ($pemesan["status"] == "terima") {
                    echo "#99ff99";
                } else if ($pemesan["status"] == "batal") {
                    echo "#ff3333";
                }
        ?>"
                >

                <td><?php echo $pemesan["nama_pemesan"] ?></td>
                <td><?php $sekarang= date('y-m-d h:i:s'); $now = explode(" ", $sekarang); echo $now[0];?></td>
                <td><?php  echo $now[1];?></td>
                <td><?php echo $pemesan["alamat_pemesan"]; ?></td>
<?php
                $time = explode(" ", $pemesan["waktu_pemesan"]);
?>
                <td><?php echo $time[0] ?></td>
                <td><?php echo $time[1] ?></td>
                <td><?php echo $pemesan["nomor_telephon"] ?></td>
                <td><?php echo $pemesan["tujuan"] ?></td>
                <td><?php echo $pemesan["jumlah_orang"] ?></td>

                <td>
                    <select name="status[<?php echo $pemesan['id_datauser'] ?>]" class="status-change">
                        <option value="belum" <?php
                if ($pemesan["status"] == "belum") {
                    echo "selected";
                }
?>>Belum</option>
                    <option value="tolak" <?php
                    if ($pemesan["status"] == "tolak") {
                        echo "selected";
                    } ?>>Tolak</option>
                    <option value="terima" <?php
                    if ($pemesan["status"] == "terima") {
                        echo "selected";
                    }
?>>Terima</option>
                    <option value="batal" <?php
                    if ($pemesan["status"] == "batal") {
                        echo "selected";
                    } ?>>Batal</option>
                </select>
                </td>
                <td><a href="hapus_pemesan/<?php echo $pemesan['id_datauser']; ?>" onClick="return confirm('Apakah benar akan dihapus?')"> Hapus</a></td>
        </tr>
<?php endforeach; ?>
        <?php endif; ?>
        <?php endif; ?>

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">
                            <div class="bulk-actions align-left">


                            </div>

<?php echo form_close(); ?>
                <div class="clear"></div>
            </td>
        </tr>
    </tfoot>
</table>
