<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=document_name.doc");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns:office="urn:schemas-microsoft-com:office:office"
      xmlns:word="urn:schemas-microsoft-com:office:word"
      xmlns="http://www.w3.org/TR/REC-html40">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<head>
	<style>        
	@page Section1 {size:595.45pt 841.7pt; margin:1.0in 1.25in 1.0in 1.25in;mso-header-margin:.5in;mso-footer-margin:.5in;mso-paper-source:0;}
	        div.Section1 {page:Section1;}
	        @page Section2 {size:841.7pt 595.45pt;mso-page-orientation:landscape;margin:0.5in 0.5in 0.5in 0.5in;mso-header-margin:.5in;mso-footer-margin:.5in;mso-paper-source:0;}
	        div.Section2 {page:Section2;}

	</style>
 	<style>
		table {
			width: 100%;
		  	border-collapse: collapse;
		}

		table, td, th {
			font-size: 14.5px;
			font-family: font-family:Calibri (Body);
		  	border: 1px solid black;
		 	padding : 4px;
		}
	</style>
</head>
<body bgcolor="white">

<div class=Section2>
	<table>
	  <tr>
	    <th style="width: 10%">
	    	<img width="2%" height="2%" src="<?=base_url('assets/kop3.png');?>">
	    </th>
	    <th style="width: 90%;text-align: left;"><p>
	    	<b>
	    	KEMENTERIAN HUKUM DAN HAK ASASI MANUSIA <br>
	    	KANTOR WILAYAH PROVINSI PAPUA BARAT <br>
	    	LEMBAGA PEMASYARAKATAN PEREMPUAN KLAS III MANOKWARI <br>
	    	Jalan Sabang No.4 Kampung Ambon-Manokwari <br>
	    	</b>
	    	</p>
	    </th>
	  </tr>
	</table>
	<p align="right">
		<?= date("d-m-Y", strtotime($tgl_surat)) ?>
  	</p>

  	<div style="line-height: normal;">
	  	<p>
	  		Nomor &emsp;&emsp;&emsp; : <br>
	  		Lampiran &emsp;&emsp; : <br>
	  		Pemberitahuan  : <?= $judul ?><br><br><br>

	  		Kepada Yth, <br>
	  		(<?= $kepada ?>) <br>
	  		Di – <br>
	  		&emsp;  (………………………….)

	  		<br><br><br><br>

			<table style="padding : 6px !important;width: 100%">
			  <tr>
			    <th><b>NO.</b></th>
			    <th style="width:15%"><b>NAMA TAHANAN</b></th>
			    <th style="width:15%"><b>ALAMAT</b></th>
			    <th style="width:15%"><b>TGL/NO.SURAT PENAHANAN</b></th>
			    <th style="width:15%"><b>TGL MULAI DITAHAN</b></th>
			    <th style="width:15%"><b>TGL HABIS DITAHAN</b></th>
			    <th style="width:15%"><b>KETERANGAN</b></th>
			  </tr>
			  <tr>
			  	<td>1.</td>
			  	<td style="word-wrap: break-word;width:15%"><?= $tahanan->nama ?></td>
			  	<td style="word-wrap: break-word;width:15%"><?= $tahanan->tempat_tinggal ?></td>
			  	<td style="word-wrap: break-word;width:15%"> <?= $tahanan->tgl_surat ?>/<?= $tahanan->no_surat ?></td>
			  	<td style="word-wrap: break-word;width:15%"><?= date('d-m-Y', strtotime($tahanan->start_date)) ?></td>
			  	<td style="word-wrap: break-word;width:15%"><?= date('d-m-Y', strtotime($tahanan->end_date)) ?></td>
			  	<td style="word-wrap: break-word;width:15%"></td>
			  </tr>
			</table>

			<br><br><br>
	  	</p>
	  	<p>
	  		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	  		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	  		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	  		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	  		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	  		<b>KEPALA ,</b><br><br><br>
	  		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	  		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	  		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	  		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	  		&emsp;
	  		<b>ENGGELINA HUKUBUN, A.Md.IP. SH</b><br>
	  		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	  		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	  		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	  		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	  		&emsp;&emsp;&emsp;&nbsp;&nbsp;
	  		<b>NIP. 19710812 199203 2 001</b>
	  		
	  	</p>
	  	<p>
 			Tembusan : <br>
			1.	(……….) <br>
			2.	(……….) <br>
			3.	Dst…… <br>
		</p>
	</div>
</div>
</body>
</html>

