<html>
<head>
	<title>Bulk Insert</title>
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
<center>
	<h1>Data</h1>
	<a href="index.php">Kembali</a><br><br>
	
	<table border="1" cellpadding="5" class="table1">
		<tr>
			<th>No</th>
				<th>NIM</th>
			<th>Nama</th>
			<th>Kelas</th>
		</tr>
	<?php
	include "koneksi.php";
	$no = 1;
	$sql = "select * from data";
	$query	= $con->query($sql);
	while($row = $query->fetch_array())

	{

			echo "<tr>";
			echo "<td>".$no."</td>";
			echo "<td>".$row['nim']."</td>";
			echo "<td>".$row['nama']."</td>";
			echo "<td>".$row['kelas']."</td>";
			echo "</tr>";
			
			$no++;
		}
		?>
	</table></center>
</body>
</html>
