
<div id="home" data-url="home" data-role="page">
<div data-role="header" data-position="fixed">
<h1>M-taksi</h1>
</div>

<div data-role="content">

<ul data-role="listview" data-filter="true">
    <?php if(!empty($pemesans)){?>
  <?php foreach ($pemesans as $pemesan): ?>
<li><h3><?php echo $pemesan["nama_pemesan"] ?></h3>
    <p>dari : <?php echo $pemesan["alamat_pemesan"]; ?>-<?php echo $pemesan["tujuan"] ?></p>
     <?php
                $time = explode(" ", $pemesan["waktu_pemesan"]);
            ?>
    <p>Tanggal :<?php echo $time[0] ?> , Pukul :<?php echo $time[1] ?> </p>
    <p>Jumlah : <?php echo $pemesan["jumlah_orang"] ?></p>
    <p>Status : <?php echo "<u>".ucfirst($pemesan["status"])."</u>"; ?><p>
    <p><?php if($pemesan["status"]=="belum") echo '<a href="'.base_url().'index.php/home/batal/'.$pemesan["id_datauser"].'"><span style="font-size:16px">Batalkan</span></a>'; ?></p>
</li>
<?php endforeach; ?>
<?php }else {echo "Tidak ada pemesan";}?>
</ul>

</div></div>
