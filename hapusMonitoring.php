<?php 
 require 'koneksi/function.php';

	$id = $_GET["id_Project"];

	if (hapusMonitoring($id) > 0) {
		echo "
			<script>
				alert('Data Berhasil Dihapus!');
				document.location.href = 'projectMonitoring.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data Gagal Dihapus!');
				document.location.href = 'projectMonitoring.php';
			</script>
		";
	}
 ?>