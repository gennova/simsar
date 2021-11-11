<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {
	
		
	function cetak()
	{
		$idunik=$_GET['id'];
		$this->load->library('database_library');
		$this->database_library->pake_table('tblbarang');
		$this->database_library->pake_table('tbllokasi');
		$arraysearch=array(
			'kdlokasi'=>$idunik,
			'namalokasi',
			);
		$data['info']=$this->database_library->ambil_data_array($arraysearch);
			
		$select="tblbarang.idjenis AS id, tbljenis.namajenis AS jenis, tbllokasi.namalokasi as namaruang, COUNT(tblbarang.idjenis) AS jumlah, tblkondisi.namakondisi as kondisi";			
		$from=("(tblbarang INNER JOIN tbljenis ON tblbarang.idjenis = tbljenis.idjenis INNER JOIN tbllokasi ON tblbarang.kdlokasi=tbllokasi.kdlokasi INNER JOIN tblkondisi ON tblbarang.idkondisi=tblkondisi.idkondisi)");
		$where="tblbarang.kdlokasi='".$idunik."' GROUP BY tblbarang.idjenis ORDER BY tbljenis.namajenis ASC";		
		$data['isdata']=$this->database_library->ambil_data_where_custom($select,$from,$where);
		
		//$paket = $this->input->post('kdlokasi');
		$this->load->view('admin/laporan/cetak',$data);
	}
	
	function convertpdf(){
		$idunik=$_GET['id'];
		$this->load->library('database_library');
		$this->database_library->pake_table('tblbarang');
		$this->database_library->pake_table('tbllokasi');
		$arraysearch=array(
			'kdlokasi'=>$idunik,
			'namalokasi',
			);
		$data['info']=$this->database_library->ambil_data_array($arraysearch);
			
		$select="tblbarang.idjenis AS id, tbljenis.namajenis AS jenis, tbllokasi.namalokasi as namaruang, COUNT(tblbarang.idjenis) AS jumlah, tblkondisi.namakondisi as kondisi";			
		$from=("(tblbarang INNER JOIN tbljenis ON tblbarang.idjenis = tbljenis.idjenis INNER JOIN tbllokasi ON tblbarang.kdlokasi=tbllokasi.kdlokasi INNER JOIN tblkondisi ON tblbarang.idkondisi=tblkondisi.idkondisi)");
		$where="tblbarang.kdlokasi='".$idunik."' GROUP BY tblbarang.idjenis ORDER BY tbljenis.namajenis ASC";		
		$data['isdata']=$this->database_library->ambil_data_where_custom($select,$from,$where);
		
		//$paket = $this->input->post('kdlokasi');
		$this->load->view('admin/laporan/cetakpdf',$data);
		$html = $this->output->get_output();
        		// Load pdf library
		$this->load->library('pdf');
		$this->pdf->loadHtml($html);
		$this->pdf->setPaper('A4', 'portrait');
		
		$this->pdf->render();
		// Output the generated PDF (1 = download and 0 = preview)
		$this->pdf->stream("html_contents.pdf", array("Attachment"=> 0));
   }
   
   	function cetakperkategori()
	{
		$idunik=$_GET['id'];
		$this->load->library('database_library');
		$this->database_library->pake_table('tblbarang');
		$this->database_library->pake_table('tblkategori');
		$arraysearch=array(
			'kdkategori'=>$idunik,
			'namakategori',
			);
		$data['info']=$this->database_library->ambil_data_array($arraysearch);
			
		$select="tblbarang.kdkategori AS id, tblbarang.kdbarang AS kdbarang, tblbarang.namabarang as namabarang, tbllokasi.namalokasi as namalokasi, tblbarang.tglmasuk as tglmasuk, tblbarang.harga as harga, tblsumberdana.nmsumberdana as sumberdana";			
		$from=("(tblbarang INNER JOIN tblkategori ON tblbarang.kdkategori = tblkategori.kdkategori INNER JOIN tbllokasi ON tblbarang.kdlokasi=tbllokasi.kdlokasi INNER JOIN tblsumberdana ON tblbarang.kdsumberdana=tblsumberdana.kdsumberdana)");
		$where="tblbarang.kdkategori='".$idunik."' ORDER BY tblbarang.kdbarang ASC";		
		$data['isdata']=$this->database_library->ambil_data_where_custom($select,$from,$where);
		
		//$paket = $this->input->post('kdlokasi');
		$this->load->view('admin/laporan/cetakperkategori',$data);
	}
	
	function convertpdfperkategori()
	{
		$idunik=$_GET['id'];
		$this->load->library('database_library');
		$this->database_library->pake_table('tblbarang');
		$this->database_library->pake_table('tblkategori');
		$arraysearch=array(
			'kdkategori'=>$idunik,
			'namakategori',
			);
		$data['info']=$this->database_library->ambil_data_array($arraysearch);
			
		$select="tblbarang.kdkategori AS id, tblbarang.kdbarang AS kdbarang, tblbarang.namabarang as namabarang, tbllokasi.namalokasi as namalokasi, tblbarang.tglmasuk as tglmasuk, tblbarang.harga as harga, tblsumberdana.nmsumberdana as sumberdana";			
		$from=("(tblbarang INNER JOIN tblkategori ON tblbarang.kdkategori = tblkategori.kdkategori INNER JOIN tbllokasi ON tblbarang.kdlokasi=tbllokasi.kdlokasi INNER JOIN tblsumberdana ON tblbarang.kdsumberdana=tblsumberdana.kdsumberdana)");
		$where="tblbarang.kdkategori='".$idunik."' ORDER BY tblbarang.kdbarang ASC";		
		$data['isdata']=$this->database_library->ambil_data_where_custom($select,$from,$where);
		
		//$paket = $this->input->post('kdlokasi');
		$this->load->view('admin/laporan/cetakpdfperkategori',$data);
		$html = $this->output->get_output();
        		// Load pdf library
		$this->load->library('pdf');
		$this->pdf->loadHtml($html);
		$this->pdf->setPaper('A4', 'portrait');
		
		$this->pdf->render();
		// Output the generated PDF (1 = download and 0 = preview)
		$this->pdf->stream("html_contents.pdf", array("Attachment"=> 0));
   }
   
   	function cetakpengajuan()
	{
		$idunik=$_GET['id'];
		$this->load->library('database_library');
		$this->database_library->pake_table('tblpengajuan');
		$arraysearch=array(
			'nopengajuan'=>$idunik,
			'tglpengajuan',
			);
		$data['info']=$this->database_library->ambil_data_array($arraysearch);
			
		$select="*";			
		$from=("tblpengajuan");
		$where="nopengajuan='".$idunik."'";		
		$data['isdata']=$this->database_library->ambil_data_where_custom($select,$from,$where);
		
		//$paket = $this->input->post('kdlokasi');
		$this->load->view('admin/laporan/cetakpengajuan',$data);
	}
	
	function cetaktglpengajuan()
	{
		$idunik=$_GET['id'];
		$this->load->library('database_library');
		$this->database_library->pake_table('tblpengajuan');
		$arraysearch=array(
			('tglpengajuan')=>$idunik,
			);
		$data['info']=$this->database_library->ambil_data_array($arraysearch);
			
		$select="*";			
		$from=("tblpengajuan");
		$where="tglpengajuan='".$idunik."'";		
		$data['isdata']=$this->database_library->ambil_data_where_custom($select,$from,$where);
		
		//$paket = $this->input->post('kdlokasi');
		$this->load->view('admin/laporan/cetaktglpengajuan',$data);
	}
	
	function convertpdftglpengajuan()
	{
		$idunik=$_GET['id'];
		$this->load->library('database_library');
		$this->database_library->pake_table('tblpengajuan');
		$arraysearch=array(
			('tglpengajuan')=>$idunik,
			);
		$data['info']=$this->database_library->ambil_data_array($arraysearch);
			
		$select="*";			
		$from=("tblpengajuan");
		$where="tglpengajuan='".$idunik."'";		
		$data['isdata']=$this->database_library->ambil_data_where_custom($select,$from,$where);
		
		//$paket = $this->input->post('kdlokasi');
		$this->load->view('admin/laporan/cetakpdftglpengajuan',$data);
		
		$html = $this->output->get_output();
        		// Load pdf library
		$this->load->library('pdf');
		$this->pdf->loadHtml($html);
		$this->pdf->setPaper('A4', 'portrait');
		
		$this->pdf->render();
		// Output the generated PDF (1 = download and 0 = preview)
		$this->pdf->stream("html_contents.pdf", array("Attachment"=> 0));
	}
	
	function cetakperolehan()
	{
		$idunik=$_GET['id'];
		$this->load->library('database_library');
		$this->database_library->pake_table('tblbarang');
		$arraysearch=array(
			('YEAR(tglmasuk)')=>$idunik,
			);
		$data['info']=$this->database_library->ambil_data_array($arraysearch);
			
		$select="*";			
		$from=("tblbarang");
		$where="YEAR(tglmasuk)='".$idunik."' AND tglmasuk != 'NULL' AND harga != 'NULL'";		
		$data['isdata']=$this->database_library->ambil_data_where_custom($select,$from,$where);
		
		//$paket = $this->input->post('kdlokasi');
		$this->load->view('admin/laporan/cetakperolehan',$data);
	}	
	
	function convertpdfperolehan()
	{
		$idunik=$_GET['id'];
		$this->load->library('database_library');
		$this->database_library->pake_table('tblbarang');
		$arraysearch=array(
			('YEAR(tglmasuk)')=>$idunik,
			);
		$data['info']=$this->database_library->ambil_data_array($arraysearch);
			
		$select="*";			
		$from=("tblbarang");
		$where="YEAR(tglmasuk)='".$idunik."' AND tglmasuk != 'NULL' AND harga != 'NULL'";		
		$data['isdata']=$this->database_library->ambil_data_where_custom($select,$from,$where);
		
		//$paket = $this->input->post('kdlokasi');
		$this->load->view('admin/laporan/cetakpdfperolehan',$data);
		
		$html = $this->output->get_output();
        // Load pdf library
		$this->load->library('pdf');
		$this->pdf->loadHtml($html);
		$this->pdf->setPaper('A4', 'portrait');
		
		$this->pdf->render();
		// Output the generated PDF (1 = download and 0 = preview)
		$this->pdf->stream("html_contents.pdf", array("Attachment"=> 0));
	}	
		
}