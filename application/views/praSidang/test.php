<!DOCTYPE html>
<html>
<head>
	<title>403 Forbidden</title>
</head>
<body>
<?php echo $tampil ?>
<br/>
ngeluarin List 
<?php 
	foreach ($kat->result_array() as $value) {
		echo '<p> '.$value['id_ke'].'</p>';
		echo '<p> '.$value['nama_ke'].'</p>';
	}
?>
</body>
</html>
