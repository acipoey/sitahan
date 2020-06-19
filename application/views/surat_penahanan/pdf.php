<html>
    <head>
        <title>Cetak Invoice</title>
        <link rel="icon" href="<?=base_url('uploads/pribadi.png');?>">
        <style type='text/css' media='print'>
            table { border-collapse: collapse; width: 100%}
            h3 { margin-bottom: -17px }
            h2 { margin-bottom: 0px }
        </style>
        <style type='text/css' media='screen'>
            table {border-collapse: collapse; width: 100%}
            h3 { margin-bottom: -17px }
            h2 { margin-bottom: 0px }
        </style>
    </head>
    <body>
        <table style="width:150%;">
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td style="width: 10%;text-align: center;" rowspan="4"><img style="width: 80%;height: 5%;" src="<?=base_url('assets/kop.jpg');?>"></td>
                <td >KEMENTERIAN HUKUM DAN HAK ASASI MANUSIA</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >KANTOR WILAYAH PROVINSI PAPUA BARAT</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >LEMBAGA PEMASYARAKATAN PEREMPUAN KLAS III MANOKWARI</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >Jalan Sabang No.4 Kampung Ambon-Manokwari</td>
            </tr>
        </table>
        <table style="width: 100%">
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td style="width: 90%"><hr></td>
            </tr>
        </table>
        <br>
        <table style="width:100%;">
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td style="width: 70%">Nomor : 026 / INV-TC / VIII / 2017</td>
                <td><?= date('d-m-Y') ?></td>
            </tr>
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td>Lampiran        : -</td>
            </tr>
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td>Pemberitahuan       : <?= $judul ?></td>
            </tr>
        </table>
        <br/>
        <br/>
        <br/>
        <table style="width:100%;">
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td>Kepada Yth.</td>
            </tr>
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td>Ketua Pengad</td>
            </tr>
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td>Di -</td>
            </tr>
             <tr>
                <td style="width: 5%">&nbsp;</td>
                <td>Manokwari</td>
            </tr>
        </table>
        <br>
        <table style="width: 100%">
             <tr>
                <td style="width: 5%">&nbsp;</td>
                <td style=" word-wrap: break-word;width: 90%">Memperhatikan Surat Perintah Penahanan terakhir dari Ketua Pengadilan Negeri Manokwari Nomor : PRINT-256/T.1.12/Ep.2/03.2019 tanggal 26 Maret 2019, diberitahukan bahwa tahanan atas nama MIRA LATUPEIRISSA, akan berakhir masa penahanannya  pada tanggal 14 April 2019.<br><br>
        Kemudian bersama ini kami sampaikan data lengkap tahanan dimaksud adalah :</td>
            </tr>
        </table>
        <br>
        <table style="width:100%;">
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td>Nama</td>
                <td>:</td>
                <td><?= $tahanan->nama ?></td>
            </tr>
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td>Tempat dan Tanggal Lahir</td>
                <td>:</td>
                <td><?= $tahanan->tempat_lahir ?>, <?= date('d-m-Y',strtotime($tahanan->tgl_lahir))?></td>
            </tr>
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td>Jenis Kelamin </td>
                <td>:</td>
                <td><?= $tahanan->jenis_kelamin ?></td>
            </tr>
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td>Bangsa</td>
                <td>:</td>
                <td><?= $tahanan->kebangsaan ?></td>
            </tr>
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td>Agama</td>
                <td>:</td>
                <td><?= $tahanan->agama ?></td>
            </tr>
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td>Pekerjaan</td>
                <td>:</td>
                <td><?= $tahanan->pekerjaan ?></td>
            </tr>
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td>Alamat</td>
                <td>:</td>
                <td><?= $tahanan->tempat_tinggal ?></td>
            </tr>
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td>Mulai ditahan</td>
                <td>:</td>
                <td><?= date('d-m-Y', strtotime($tahanan->start_date)) ?></td>
            </tr>
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td>Pejabat Yang Menahan</td>
                <td>:</td>
                <td><?= $tahanan->pejabat ?></td>
            </tr>
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td>Perkara / Pasal</td>
                <td>:</td>
                <td><?= $tahanan->perkara ?></td>
            </tr>
        </table>
        <br>
        <table style="width: 100%">
             <tr>
                <td style="width: 5%">&nbsp;</td>
                <td style=" word-wrap: break-word;width: 90%">Pada tanggal 14 April 2019 akan kami keluarkan demi hukum karena telah habis penahananya. Demikian disampaiakan atas perhatian dan kerjasamanya diucapkan terimakasih.</td>
            </tr>
        </table>
        <br><br>
        <table style="width:100%;">
            <tr>
                <td style="width: 50%"></td>
                <td style="text-align: center;">KEPALA LEMBAGA PEMASYARAKATAN PEREMPUAN</td>
            </tr>
            <tr>
                <td style="width: 50%"></td>
                <td style="text-align: center;">KELAS III MANOKWARI</td>
            </tr>
            <tr>
                <td style="width: 50%">&nbsp;</td>
                <td style="text-align: center;">&nbsp;</td>
            </tr>
            <tr>
                <td style="width: 50%">&nbsp;</td>
                <td style="text-align: center;">&nbsp;</td>
            </tr>
            <tr>
                <td style="width: 50%"></td>
                <td style="text-align: center;">ENGGELINA HUKUBUN, A.Md.IP. SH</td>
            </tr>
            <tr>
                <td style="width: 50%"></td>
                <td style="text-align: center;">NIP. 19710812 199203 2 001</td>
            </tr>
        </table>
        <br>
        <table style="width: 100%">
             <tr>
                <td style="width: 5%">&nbsp;</td>
                <td style=" word-wrap: break-word;width: 90%">Tembusan :</td>
            </tr>
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td style=" word-wrap: break-word;width: 90%">1.   Kepala Kejaksaan Negeri Manokwari di Manokwari</td>
            </tr>
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td style=" word-wrap: break-word;width: 90%">2.   Kepala Kepolisian Sektor Wasior di Teluk Wondama.</td>
            </tr>
        </table>
    </body>
</html>