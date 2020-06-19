<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=document_name.doc");
?>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title> Cara Membikin Surat </title>
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
	  		(<?= $kepada ?>) <br> <br>
	  		Di – <br>
	  		&emsp;  (………………………….)

	  		<br><br><br><br>
	  		<br><br><br><br>

	  		Nama &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;: <?= $tahanan->nama ?>.<br>
			Tempat, Tanggal Lahir 	: <?= $tahanan->tempat_lahir ?>, <?= date('d-m-Y',strtotime($tahanan->tgl_lahir))?>.<br>
			Jenis Kelamin &emsp;&emsp;&emsp;&nbsp;&nbsp;: <?= $tahanan->jenis_kelamin ?>.<br>
			Bangsa &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;: <?= $tahanan->kebangsaan ?>.<br>
			Agama &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;: <?= $tahanan->agama ?>.<br>
			Pekerjaan &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;: <?= $tahanan->pekerjaan ?>.<br>
			Alamat &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;: <?= $tahanan->tempat_tinggal ?>.<br>
			Mulai di Tahan &emsp;&emsp;&nbsp;&nbsp;&nbsp; : <?= date('d-m-Y', strtotime($tahanan->start_date)) ?>.<br>
			Pejabat Yang menahan 	: <?= $tahanan->pejabat ?>.<br>
			Perkara/Pasal &emsp;&emsp;&emsp;&nbsp;&nbsp; : <?= $tahanan->perkara ?>.<br>

			<br><br><br><br><br><br>
	  	</p>
	  	<p>
	  		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	  		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	  		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	  		<b>KEPALA ,</b><br><br><br>
	  		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	  		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	  		&emsp;
	  		<b>ENGGELINA HUKUBUN, A.Md.IP. SH</b><br>
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
 </body>
</html>