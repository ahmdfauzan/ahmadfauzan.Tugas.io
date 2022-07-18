<?php 
 require 'koneksi/function.php';

	$id = $_GET["id_projectLeader"];

	if (hapusLeader($id) > 0) {
		echo "
			<script>
				alert('Data Berhasil Dihapus!');
				document.location.href = 'dataLeader.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data Gagal Dihapus!');
				document.location.href = 'dataLeader.php';
			</script>
		";
	}
 ?>