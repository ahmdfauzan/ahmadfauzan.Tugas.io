<?php 
 require 'koneksi/function.php';

	$id = $_GET["id_client"];

	if (hapusClient($id) > 0) {
		echo "
			<script>
				alert('Data Berhasil Dihapus!');
				document.location.href = 'dataClient.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data Gagal Dihapus!');
				document.location.href = 'dataClient.php';
			</script>
		";
	}
 ?>