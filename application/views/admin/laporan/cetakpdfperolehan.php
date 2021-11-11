<!-- Start Styles. Move the 'style' tags and everything between them to between the 'head' tags -->
<style type="text/css">
.myTable { background-color:white;border-collapse:collapse; font-family: Arial, Helvetica, sans-serif;}
.myTable th { background-color:#F4D03F;color:black; }
.myTable td, .myTable th { padding:5px;border:1px solid #000; font-size:10px; }

.myTable2 { background-color:white; font-family: Arial, Helvetica, sans-serif;}
.myTable2 th { background-color:#F4D03F;color:black; }
.myTable2 td, .myTable2 th { padding:5px;border:0px solid #000; font-size:12px; }
</style>
<!-- End Styles -->

<?php
foreach($info as $rr)
?>	
	<center>
	<table width="100%" class="myTable2">
	<tr>
	<td><center><img src="<?php base_url() ?>public/dist/img/download.png"  width="70" height="70" ></center></td>
	<td><center>
	DAFTAR PEROLEHAN BARANG INVENTARIS<br>
	TAHUN : <strong><?php echo date('Y',strtotime($rr->tglmasuk));?></strong><br>
	Tgl cetak : <?php echo date('d-F-Y');?>
	</center></td>
	<td><center><img src="<?php base_url() ?>public/dist/img/download.png" width="70" height="70"></center></td>
	</tr>
	</table>
</center><br>				
    
	<div class="box-body table-responsive">
      <table width="100%" class="myTable">
        <thead>
        <tr>
			<th width=5><center>No</center></th>
			<th><center>Kode Barang</center></th>
			<th><center>Nama Barang</center></th>
			<th><center>Tgl Masuk</center></th>
			<th><center>Harga</center></th>
        </tr>
        </thead>

<?php
$i=1;
if(!empty($isdata))
{
	$total=0;
foreach($isdata as $row)
{
	$total=$total+($row->harga);
	echo '<tr>';	
	echo '<td><center>'.$i."</center></td>";
	echo '<td>'.$row->kdbarang."</div></td>";
	echo '<td>'.$row->namabarang."</div></td>";
	echo '<td><center>'.converttgl($row->tglmasuk)."</center></div></td>";
	echo '<td align="right">'.convertnominal($row->harga)."</div></td>";
	echo '</tr>';
$i++;	
}
}else{
	echo "KOSONG";
}
?>
      </table>
	  <br>
	  <table border=0 width="100%" class="myTable2">
	  <tr>
	  <td><center>Diperiksa, <br>Ketua Yayasan Cabang Bandung<br><br><br><br><br><br></center></td>
	  <td><center>Penanggungjawab, <br>Koordinator Sarpras Yayasan<br><br><br><br><br><br></center></td>
	 
	  </tr>
	  <tr>
	  <td width="50%"><center>( ______________________ )</center></td>
	  <td width="50%"><center>( ______________________ )</center></td>
	  </tr>
	  </table>
	</body>
</html>