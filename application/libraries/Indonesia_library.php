<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indonesia_library {

	function format_rupiah($angka)
	{
		$rupiah="";
		$rp=strlen($angka);
			while ($rp>3)
			{
				$rupiah = ".". substr($angka,-3). $rupiah;
				$s=strlen($angka) - 3;
				$angka=substr($angka,0,$s);
				$rp=strlen($angka);
			}
		$rupiah = "Rp " . $angka . $rupiah . "";
		return $rupiah;
	}
	
	function format_nominal($angka)
	{
		$nominal="";
		$nm=strlen($angka);
			while ($nm>3)
			{
				$nominal = ".". substr($angka,-3). $nominal;
				$s=strlen($angka) - 3;
				$angka=substr($angka,0,$s);
				$nm=strlen($angka);
			}
		$nominal = $angka . $nominal . "";
		return $nominal;
	}

	function format_tanggal()
	{
		date_default_timezone_set('Asia/Jakarta');
		$skrg=date("Y-m-d");	
		return $skrg;
	}	
	
	function format_tanggal_umum()
	{
		date_default_timezone_set('Asia/Jakarta');
		$ayeuna=date("d-m-Y");	
		return $ayeuna;
	}

	function format_tanggal_jam()
	{
		date_default_timezone_set('Asia/Jakarta');
		$skrg=date("Y-m-d H:i:s");	
		return $skrg;
	}
	
	function konversi_tanggal($tanggal)
	{
		$format = array(
		'Sun' => 'Minggu', 'Mon' => 'Senin', 'Tue' => 'Selasa', 'Wed' => 'Rabu', 'Thu' => 'Kamis', 'Fri' => 'Jumat', 'Sat' => 'Sabtu', 'Jan' => 'Januari', 'Feb' => 'Februari', 'Mar' => 'Maret', 'Apr' => 'April', 'May' => 'Mei', 'Jun' => 'Juni', 'Jul' => 'Juli', 'Aug' => 'Agustus', 'Sep' => 'September', 'Oct' => 'Oktober', 'Nov' => 'November', 'Dec' => 'Desember'
		);
		$tanggal = date('D, d M Y', strtotime($tanggal));
		return strtr($tanggal, $format);
	}

}