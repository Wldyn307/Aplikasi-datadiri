<?php
    require_once __DIR__ . '/vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf();
    include('./inputconfig.php');
    $no = 1;
    $tabledata = "";
    $data = mysqli_query($mysqli, "SELECT * FROM datadiri");
    while($row =mysqli_fetch_array($data)){
        $tabledata .= "
        <tr>
            <td>".$row["nis"]."</td>
            <td>".$row["namalengkap"]."</td>
            <td>".$row["tanggal_lahir"]."</td>
            <td>".$row["nilai"]."</td>
        </tr>
        ";
        $no++;
     }

     $tanggal_cetak  = date('D M Y - H:i:s');
     $table = "
     <h1>Laporan Data diri Kelas</kelas>
     <h6>Waktu Cetak : $tanggal_cetak</cetak>
            <table width='100%' cellpadding=5 border=1 cellspacing=0>
                <tr>
                    <th>NIS</th>
                    <th>Nama Lengkap</th>
                    <th>Tanggal Lahir</th>
                    <th>Nilai</th>
                </tr>
                $tabledata
            </table>
        ";

    $mpdf->WriteHTML($table);
    $mpdf->Output();
?>