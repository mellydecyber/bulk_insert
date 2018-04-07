<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="jquery/jquery-3.3.1.min.js"></script>
</head>
<body>
<form id="form1" name="form1" method="post">
	<center>
<table class="table1">


		<tr>
			<td colspan="3"><h1>Bulk Insert</h1></td>
		</tr>
	<tr>
			<th colspan="1">Masukan Data</th>
		</tr>
		<tr>
			<td>NIM</td>
			<td>:</td>
			<td><input type="text" name="nim" class="form-control" id="nim"></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama" class="form-control" id="nama"></td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td>:</td>
			<td><input type="text" name="kelas" class="form-control" id="kelas"></td>
		</tr>
	<tr>
			<td colspan="2">
		<input type="button" class="btn btn-primary" value="Add" id="btnAdd"></td>
		<td><input type="button" class="btn btn-primary" value="Done" id="btnSimpan"></td>
	</tr>
	
	</table>	

</form>
<br>
<hr>
<br>
<table id="table1" name="table1" class="table1">
<tbody>
<tr>
<th width="20px">No</th>
<th>Nim</th>
<th>Nama</th>
<th>Kelas</th>
<th>Action</th>
<tr>
</tbody>
</table>
<script>
$(document).ready(function() {
var id = 1; 

$("#btnAdd").click(function() {
	var newid = id++; 
	$("#table1").append('<tr valign="top" id="'+newid+'">\n\
	<td>' + newid + '</td>\n\
	<td class="nim'+newid+'">' + $("#nim").val() + '</td>\n\
	<td class="nama'+newid+'">' + $("#nama").val() + '</td>\n\
	<td class="kelas'+newid+'">' + $("#kelas").val() + '</td>\n\
	<td><a href="javascript:void(0);" class="remCF">Remove</a></td>\n\ </tr>');
});
var serializedData = $('#form1').serialize();
$.ajax({
	url: "proses.php",
	type: "post",
	data: serializedData
});

$("#table1").on('click', '.remCF', function() {
	$(this).parent().parent().remove();
});

$("#btnSimpan").click(function() {
	var lastRowId = $('#table1 tr:last').attr("id"); 
	var nim = new Array();
	var nama = new Array(); 
	var kelas = new Array();
		for ( var i = 1; i <= lastRowId; i++) {
		nim.push($("#"+i+" .nim"+i).html());
		nama.push($("#"+i+" .nama"+i).html());
		kelas.push($("#"+i+" .kelas"+i).html());
		}
	var sendNim = JSON.stringify(nim);
	var sendNama = JSON.stringify(nama); 
	var sendKelas = JSON.stringify(kelas);
$.ajax({
	url: "proses.php",
	type: "post",
	data: {nim : sendNim , nama : sendNama , kelas : sendKelas},
	success : function(data){
	alert(data);
}
});
});
});
</script>
</center>
</body>
</html>