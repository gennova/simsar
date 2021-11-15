<!-- Start Styles. Move the 'style' tags and everything between them to between the 'head' tags -->
<style type="text/css">
.myTable { background-color:white;border-collapse:collapse; font-family: Arial, Helvetica, sans-serif;}
.myTable th { background-color:#B40404;color:white; }
.myTable td, .myTable th { padding:5px;border:1px solid #000; font-size:10px; }

.myTable2 { background-color:white; font-family: Arial, Helvetica, sans-serif;}
.myTable2 th { background-color:#B40404;color:white; }
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
	DAFTAR BARANG INVENTARIS RUANGAN<br>
	Unit <?php echo $this->session->userdata('admin_unit_name'); ?><br>
	<?php echo "<strong> $rr->namalokasi </strong>" ?><br>
	Luas Ruangan : <?php echo "<strong> $rr->luasruangan </strong>" ?><br>
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
			<th><center>NO</center></th>
			<th><center>JENIS BARANG</center></th>
			<th><center>JUMLAH</center></th>
			<th><center>KONDISI</center></th>
        </tr>
        </thead>

<?php
$i=1;
if(!empty($isdata))
{
foreach($isdata as $row)
{
	echo '<tr>';	
	echo '<td width = 10px><center>'.$i."</center></td>";
	echo '<td width = 300px>'.$row->jenis."</div></td>";
	echo '<td ><center>'.$row->jumlah."</center></div></td>";
	echo '<td ><center>'.$row->kondisi."</center></div></td>";
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
	  <td><center>Diperiksa, <br>
	  Pimpinan <?php echo $this->session->userdata('admin_unit_name'); ?><br><br><br><br><br><br></center></td>
	  <td><center>Penanggungjawab, <br>Koordinator Sarpras Yayasan<br><br><br><br><br><br></center></td>
	 
	  </tr>
	  <tr>
	  <td width="50%"><center>( <?php echo $this->session->userdata('admin_pimpinan'); ?> )</center></td>
	  <td width="50%"><center>( <?php echo $this->session->userdata('admin_sarpra'); ?> )</center></td>
	  </tr>
	  </table>


		
    


	</body>
</html>


