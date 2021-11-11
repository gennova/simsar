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

	<table width="100%" class="myTable2">
	<tr>
		<td> <center><img src="<?php base_url() ?>public/dist/img/logo-header.png"> </center></td>
		<td>Yayasan Penyelenggaraan Ilahi Indonesia<br>
		Jln. Kebonjati No. 209<br>
		Telp.(022) 6041960 | ypiibdg@ypiibandung.or.id | www.ypiibandung.or.id</td>
	</tr>
	</table>
	<hr>

	<center><br>
	PENGAJUAN PENGADAAN BARANG<br>
	Tgl Pengajuan : <?=converttgl($rr->tglpengajuan);?>
	</center><br> 				
    
	<div class="box-body table-responsive">
      <table width="100%" class="myTable">
        <thead>
        <tr>
			<th width=5><center>NO</center></th>
			<th><center>No Pengajuan</center></th>
			<th><center>No RAB</center></th>
			<th><center>Nama Barang</center></th>
			<th><center>Satuan</center></th>
			<th><center>Jumlah</center></th>
			<th><center>Harga</center></th>
			<th><center>Total</center></th>
			<th><center>Ket</center></th>
        </tr>
        </thead>

<?php
$i=1;
if(!empty($isdata))
{
	$total=0;
foreach($isdata as $row)
{
	$total=$total+($row->jmlbarang*$row->hargasatuan);
	echo '<tr>';	
	echo '<td><center>'.$i."</center></td>";
	echo '<td>'.$row->nopengajuan."</div></td>";
	echo '<td>'.$row->norab."</div></td>";
	echo '<td>'.$row->namabarang."</div></td>";
	echo '<td><center>'.$row->satuan."</div></center></td>";
	echo '<td><center>'.$row->jmlbarang."</div></center></td>";
	echo '<td align="right">'.convertnominal($row->hargasatuan)."</div></td>";
	echo '<td align="right">'.convertnominal($row->jmlharga)."</div></td>";
	echo '<td>'.$row->keterangan."</div></td>";
	echo '</tr>';
$i++;	
}
}else{
	echo "KOSONG";
}
?>
      </table>
		<table width="100%" class="myTable">
		<tr>
		<td>
		<div align=right><b>Jumlah Pengajuan Dana : <?=convertrp($total);?></b></div>
		</td>
		</tr>
		</table>
		
	  <br>
	  <i>* Catatan: Harga diatas merupakan harga perkiraan</i>
	  <br><br><br>
	  <br>
	  <br>
	  <table border=0 width="100%">
	  <tr>
	  <td><center>Menyetujui, <br>Penanggungjawab YPII<br> Kantor Cabang Bandung<br><br><br><br><br></center></td>
	  <td><center>Pemohon<br><br><br><br><br><br></center></td>
	 
	  </tr>
	  <tr>
	  <td width="50%"><center>( Sr. Priska Murwati, SDP., M.M )</center></td>
	  <td width="50%"><center>( ___________________________ )</center></td>
	  </tr>
	  </table>


	</body>
</html>


