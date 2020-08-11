<?php  
	date_default_timezone_set('Asia/Jakarta');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Lsp Tes Programing</title>
</head>
<body>
	<hr>
	<h3 style="text-transform: uppercase; text-align: center;">program tagihan warnet</h3>
	<hr><br>
	<form method="post" action="">
		<label>No. Komputer : </label><input type="number" name="nok"><br><br>
		<label>Nama Pemakai : </label><input type="text" name="nama"><br><br>
		<!-- <label>Mulai Pakai : </label><input type="text" name="jam"><br><br> -->
		<button type="submit" name="mulai">Mulai</button><br><br>
	</form>
	<!-- Membaca Siapa Yang Memakai -->
	<?php
		if (isset($_POST['mulai'])) {
			$waktuoto = date('d-m-Y H:i:s');
			// $waktuoto = date_create('2020-08-01 11:00:00');
			$nok = $_POST['nok'];
			$nama = $_POST['nama'];
	?>	
	<hr>
	<h3 style="text-transform: uppercase; text-align: center;">Rincian Tagihan Warnet</h3>
	<hr><br>
	<form method="post">	
		<label>No Komputer : <?=$nok?></label><br><input type="hidden" name="nok" value="<?=$nok?>">
		<label>Nama Pemakai : <?=$nama?></label><br><input type="hidden" name="nama" value="<?=$nama?>">
		<label>Waktu Mulai : <?=$waktuoto?></label><br><input type="hidden" name="waktu" value="<?=$waktuoto?>">
		<br><br>
		<button type="submit" name="selesai">Selesai</button>
	</form>

	<!-- End Membaca Pemakai -->
	<?php 
		}elseif (isset($_POST['selesai'])) {
			$waktuakhir = date('d-m-Y H:i:s');
			// $waktuakhir = date_create();
			$nok = $_POST['nok'];
			$nama = $_POST['nama'];
			$waktuawal = $_POST['waktu'];
			$biaya = 4000;
			$potongan = 10/100;

			//untuk kebutuhan penilaian, jadi saya mempercepat waktu mulai nya untuk melihat hasil program berjalan dengan
			//baik atau tidak, jadi saya gunakan waktu jam 08:00:00, dan juga melakukan pembulatan.
			//untuk hasil original silahkan jadikan variabel $perhitungan dengan jam 08:00, dan silahkan menunggu. terima kasih

			//waktu percobaan
			// $perhitungan = strtotime($waktuakhir) - strtotime('2020-08-01 08:00:00');

			//waktu sebenarnya
			$perhitungan = strtotime($waktuakhir) - strtotime($waktuawal);
			$lama = floor(($perhitungan)/(60*60));
			
			// cek lama pakai 
			if ($lama >5) {
				$diskon = ($lama * $biaya)*0.1;
			}else{
				$diskon = 0;
			}

			$bayar = $biaya*$lama;
			$tagihan = $bayar-$diskon;
			// $mulai = $_POST['jam'];
	?>	
	<hr><br>
	<label>No Komputer : <?=$nok?></label><br>
	<label>Nama Pemakai : <?=$nama?></label><br><br>
	<label>Waktu Mulai : <?=$waktuawal?></label><br>
	<label>Waktu Berakhir : <?=$waktuakhir?></label><br>
	<label>Lama Memakai : <?=$lama?> jam</label><br>
	<label>Potongan : <?=$diskon?></label><br><br>
	<label><b>Total Tagihan : <?=$tagihan?></b></label>
	<br><br><br><br>
	
	<p>Biaya Per jam atau Lebih dari 15 menit Rp. 2000</p>

	<?php
		} 
	?>
	<h6 style="text-align: center;"><em>powered by rezhi saputra</em></h6>
</body>
</html>