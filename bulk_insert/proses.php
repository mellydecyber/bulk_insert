<?php
$nimArr = json_decode($_POST["nim"]);
$namaArr = json_decode($_POST["nama"]);
$kelasArr = json_decode($_POST["kelas"]);

include "koneksi.php";

for ($nimArr as $item) {
if(($nimArr[$item] != "")){ 
$sql="INSERT INTO data (nim, nama, kelas)
VALUES
('$nimArr[$item]','$namaArr[$item]','$kelasArr[$item]')";

if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
}
}
Print "Data Berhasil Ditambahkan !";
//header("Location: view.php"); //gara2 ini bang errornya
mysqli_close($con);
?>
