<?php
    include('./inputconfig.php');
    if ($_SESSION["login"] != TRUE) {
        header('location:login.php');
     }
     echo "Selamat Datang, " . $_SESSION["nama_akun"] . "<br>";
     echo "Anda Sebagai : " . $_SESSION["role"] ;
     echo "<br>";
     echo "<a class='btn btn-secondary btn-sm' href='logout.php'>Logout Ngab</a>";
     echo "<hr>";
     echo "<a href='input-datadiri-tambah.php'>Tambah Data</a>";
     echo "<hr>";
     echo "<a href='input-datadiri-pdf.php'>Download Pdf</a>";
     echo "<hr>";
// READ - Menampilkan data dari database
     $no = 1;
     $tabledata="";
     $data = mysqli_query($mysqli," SELECT * FROM datadiri ");
     while($row = mysqli_fetch_array($data)){
            $tabledata .= "
            <tr>
                <td>".$no."</td>
                <td>".$row["nis"]."</td>
                <td>".$row["nama_lengkap"]."</td>
                <td>".$row["tanggal_lahir"]."</td>
                <td>".$row["nilai"]."</td>
                <td>
                    <a class='btn btn-success btn-sm' href='input-datadiri-edit.php?nis=".$row["nis"]."'>Edit</a>
                    &nbsp;-&nbsp;
                    <a class='btn btn-danger btn-sm' href='input-datadiri-hapus.php?nis=".$row["nis"]."' 
                              onclick='return confirm(\"Yakin Dek ?\");'>Hapus</a>
                </td>
            <tr>
            ";
            $no++;
     }
     

     echo "
        <table cellpadding=5 border=1 cellspacing=0>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Tanggal Lahir</th>
                <th>Nilai</th>
                <th>Aksi</th>
            </tr>
            $tabledata
        </table>
     ";

?>