<?php
$nimArr = json_decode($_POST["nim"]);
$namaArr = json_decode($_POST["nama"]);
$kelasArr = json_decode($_POST["kelas"]);

include "koneksi.php";

for ($i = 0; $i < count($nimArr); $i++) {
if(($nimArr[$i] != "")){ 
$sql="INSERT INTO data (nim, nama, kelas)
VALUES
('$nimArr[$i]','$namaArr[$i]','$kelasArr[$i]')";

if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
}
}
Print "Data Berhasil Ditambahkan !";
//header("Location: view.php"); ini errornya
mysqli_close($con);
?>
