<?php
include('connect.php');
$magang = mysqli_query($connect, "SELECT nama FROM produk");
$pemesanan = mysqli_query($connect, "SELECT SUM(stock) AS sold FROM produk WHERE aktif= '1' GROUP BY nama");
$totalpesan = mysqli_query($connect, "SELECT tgl_peminjaman AS tglpinjam FROM order_master GROUP BY tgl_peminjaman ORDER BY tgl_peminjaman DESC");
$jmlhpesan = mysqli_query($connect, "SELECT SUM(banyak) AS jmlhpinjam FROM order_detail GROUP BY id");
$produk = mysqli_query($connect, "SELECT nama AS namaproduk FROM produk ORDER BY id");
$jmlhproduk = mysqli_query($connect, "SELECT SUM(banyak) AS jmlhproduk FROM order_detail GROUP BY id");
?>

<style>
	canvas {
		max-width: 1000px;
		max-height: 300px;
	}

	.canvas2 {
		width: 500px;
		height: 300px;
	}

	.canvas3 {
		width: 10px;
		height: 10px;
	}

	.jdl {
		margin-left: 70px;
	}

	.container1 {
		background-color: lightgray;
	}

	.table1 {
		background-color: whitesmoke;
	}
</style>

<div class="container1" align="center">
	<h5> Selamat Datang <?php echo $username ?></h5>
</div>

<div class="table1 py-5" align="center">
	<table class="table1 py-5" align="center" width="75%">
		<tr class="tr1" align="center">
			<th><img src="<?php echo base_url() ?>assets/image/user.png" width="100" height="100" class="rounded-circle"></th>
			<th><img src="<?php echo base_url() ?>assets/image/cart.png" width="100" height="100" class="rounded-circle"></th>
			<th><img src="<?php echo base_url() ?>assets/image/proses.png" width="100" height="100" class="rounded-circle"></th>
			<th><img src="<?php echo base_url() ?>assets/image/selesai.png" width="100" height="100" class="rounded-circle"></th>
		</tr>
		<tr align="center">
			<th><a><?= $akun ?></a></th>
			<th><a><?= $pesanan ?></a></th>
			<th><a><?= $proses ?></a></th>
			<th><a><?= $selesai ?></a></th>
		</tr>
		<tr align="center" class="mb-5">
			<th><a>Jumlah User</a></th>
			<th><a>Jumlah Pesanan</a></th>
			<th><a>Pesanan Diproses</a></th>
			<th><a>Pesanan Selesai</a></th>
		</tr>
		<tr align="center" class="mb-5">
			<th></th>
			<th></th>
			<th></th>
			<th></th>
		</tr>
	</table>
</div>

<br>
<br>

<div class="container">
	<div class="row">
		<div class="d-none d-md-flex col-md-3 col-lg-6">

			<div class="jdl">
				<h5 align="center">Grafik Pemesanan</h5>
				<br>
				<div align="center">
					<canvas class="canvas2" id="jmlhpemesanan"></canvas>
					<script>
						var ctx = document.getElementById("jmlhpemesanan").
						getContext('2d');
						var jmlhpemesanan = new Chart(ctx, {
							type: 'bar',
							data: {
								labels: [<?php while ($row = mysqli_fetch_array($totalpesan)) {
												echo '"', $row['tglpinjam'], '",';
											} ?>],
								datasets: [{
									label: 'Total Produk Dipinjam',
									data: [<?php while ($row = mysqli_fetch_array($jmlhpesan)) {
												echo '"', $row['jmlhpinjam'] . '",';
											} ?>],
									backgroundColor: [
										'rgba(255, 99, 132, 0.2)',
										'rgba(54, 162, 235, 0.2)',
										'rgba(255, 206, 86, 0.2)',
										'rgba(75, 192, 192, 0.2)',
										'rgba(153, 102, 255, 0.2)',
										'rgba(255, 159, 64, 0.2)'
									],
									borderColor: [
										'rgba(255, 99, 132, 1)',
										'rgba(54, 162, 235, 1)',
										'rgba(255, 206, 86, 1)',
										'rgba(75, 192, 192, 1)',
										'rgba(153, 102, 255, 1)',
										'rgba(255, 159, 64, 1)'
									],
									borderWidth: 1
								}]
							},
							options: {
								scales: {
									yAxes: [{
										ticks: {
											beginAtZero: true
										}
									}]
								}
							}
						})
					</script>
				</div>
			</div>
		</div>
		<div class="col col-lg">
			<div class="container ">
				<div class="row ">

					<div align="center">
						<h5>Produk Yang Banyak Dipinjam</h5>
					</div>
					<br>
					<br>
					<canvas class="canvas3" id="produk"></canvas>
					<script>
						var ctx = document.getElementById("produk").
						getContext('2d');
						var produk = new Chart(ctx, {
							type: 'doughnut',
							data: {
								labels: [<?php while ($p = mysqli_fetch_array($produk)) {
												echo '"', $p['namaproduk'], '",';
											} ?>],
								datasets: [{
									data: [<?php while ($p = mysqli_fetch_array($jmlhproduk)) {
												echo '"', $p['jmlhproduk'] . '",';
											} ?>],
									backgroundColor: [
										'rgba(255, 99, 132, 0.2)',
										'rgba(54, 162, 235, 0.2)',
										'rgba(255, 206, 86, 0.2)',
										'rgba(75, 192, 192, 0.2)',
										'rgba(153, 102, 255, 0.2)',
										'rgba(255, 159, 64, 0.2)'
									],
									borderColor: [
										'rgba(255, 99, 132, 1)',
										'rgba(54, 162, 235, 1)',
										'rgba(255, 206, 86, 1)',
										'rgba(75, 192, 192, 1)',
										'rgba(153, 102, 255, 1)',
										'rgba(255, 159, 64, 1)'
									],
									hoverOffset: 4
								}]
							},
							options: {
								responsive: true,
								maintainAspectRatio: true,
								scales: {
									yAxes: [{
										ticks: {
											beginAtZero: true
										}
									}]
								},
								plugins: {
									legend: {
										display: false
									}
								}
							}
						})
					</script>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<br>
<br>
<div align="center">
	<h5>Jumlah Produk Tersedia</h5>
	<br>
	<canvas id="pemesanan"></canvas>
	<script>
		var ctx = document.getElementById("pemesanan").
		getContext('2d');
		var pemesanan = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [<?php while ($row = mysqli_fetch_array($magang)) {
								echo '"', $row['nama'], '",';
							} ?>],
				datasets: [{
					label: 'Stok Produk',
					data: [<?php while ($row = mysqli_fetch_array($pemesanan)) {
								echo '"', $row['sold'] . '",';
							} ?>],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
						'rgba(255, 99, 132, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		})
	</script>
</div>
<br>
<br>