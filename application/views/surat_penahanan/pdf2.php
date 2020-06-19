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
                <td style=" word-wrap: break-word;width: 90%">Sesuai pasal 06 ayat 2 Permenkumham RI No.M.HH.-24.PK.01.01. Tahun 2011 tentang Pengeluaran Tahanan Demi Hukum. <br>
                Dengan ini kami beritahukan bahwa :
                </td>
            </tr>
        </table>
        <br>
        <div style="margin-left: 25px;padding-left: 25px">
            <table style="width:90%;" border="1">
                <tr>
                    <td style="padding: 15px;text-align: left">No</td>
                    <td style="padding: 15px;text-align: left">NAMA TAHANAN</td>
                    <td style="padding: 15px;text-align: left">ALAMAT</td>
                    <td style="padding: 15px;text-align: left">TGL/NO SURAT PENAHANAN</td>
                    <td style="padding: 15px;text-align: left">TGL MULAI PENAHANAN</td>
                    <td style="padding: 15px;text-align: left">TGL HABISNYA <br> MASA PENAHANAN</td>
                    <td style="padding: 15px;text-align: left">KET</td>
                </tr>
                <tr>
                    <td style="padding: 15px;text-align: left">1</td>
                    <td style="padding: 15px;text-align: left"><?= $tahanan->nama ?></td>
                    <td style="padding: 15px;text-align: left"><?= $tahanan->tempat_tinggal ?></td>
                    <td style="padding: 15px;text-align: left">03 Oktober 2018 <br>
                    PRINT-861/T.1.12/Euh.2/10/2018</td>
                    <td style="padding: 15px;text-align: left"><?= date('d-m-Y', strtotime($tahanan->start_date)) ?></td>
                    <td style="padding: 15px;text-align: left"><?= date('d-m-Y', strtotime($tahanan->end_date)) ?></td>
                    <td style="padding: 15px;text-align: left"></td>
                </tr>
            </table>
        </div>
        <br>
        <table style="width: 100%">
             <tr>
                <td style="width: 5%">&nbsp;</td>
                <td style=" word-wrap: break-word;width: 90%">Demikian dan untuk mendapatkan perhatian sebagaimana mestinya.</td>
            </tr>
        </table>
        <br><br>
        <table style="width:100%;">
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td style="width: 50%">Tembusan :</td>
                <td style="text-align: center;">Manokwari, <?= date('d-m-Y') ?></td>
            </tr>
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td style="width: 50%">1……</td>
                <td style="text-align: center;">Mengetahui</td>
            </tr>
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td style="width: 50%">2. ……</td>
                <td style="text-align: center;">KEPALA LEMBAGA PEMASYARAKATAN </td>
            </tr>
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td style="width: 50%">&nbsp;</td>
                <td style="text-align: center;">PEREMPUAN KELAS III MANOKWARI</td>
            </tr>
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td style="width: 50%"></td>
                <td style="text-align: center;"></td>
            </tr>
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td style="width: 50%"></td>
                <td style="text-align: center;"></td>
            </tr>
            <tr>
                <td style="width: 5%">&nbsp;</td>
                <td style="width: 50%"></td>
                <td style="text-align: center;">(NAMA KALAPAS & NIP)</td>
            </tr>
        </table>
    </body>
</html>