<html>
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Pengembalian Stok</title>

		<!-- Custom fonts for this template-->
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link
			href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
			rel="stylesheet">

		<!-- Custom styles for this template-->
		<link href="css/sb-admin-2.min.css" rel="stylesheet">

	</head>

	<body id="page-top">

		<!-- Page Wrapper -->
		<div id="wrapper">

			<!-- Sidebar -->
			<?php include "sidebar.php";?>
			<!-- End of Sidebar -->

			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">

				<!-- Main Content -->
				<div id="content">

					<?php include "topbar.php";?>

					<!-- Begin Page Content -->
					<div class="container-fluid">

						<!-- Page Heading -->
						<h1 class="h3 mb-2 text-gray-800">Data Pengembalian Stok</h1>
						<p class="mb-4">Source: Database Adventureworks</p>

						<!-- Content Row -->
						<div class="row">
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-primary shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
													Total Pengembalian Stok</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800">
													<?php  
													 $host       = "localhost";
													 $user       = "root";
													 $password   = "";
													 $database   = "adventureworks2023";
													 $mysqli     = mysqli_connect($host, $user, $password, $database);

													 $sql = "SELECT SUM(scrapped_quantity) as pengembalian from fact_production";
													 $query = mysqli_query($mysqli,$sql);
													 while($row2=mysqli_fetch_array($query)){
														echo number_format($row2['pengembalian'],0,".",".");
													 }
													?>  
												</div>
											</div>
											<div class="col-auto">
												 <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pengembalian Tahun 2001
												</div>
												<div class="row no-gutters align-items-center">
													<div class="col-auto">
														<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
														<?php
														$sql = "SELECT SUM(fp.scrapped_quantity) pengembalian FROM fact_production fp JOIN time t ON fp.time_id=t.time_id WHERE t.Year=2001";
														$query = mysqli_query($mysqli,$sql);
															while($row2=mysqli_fetch_array($query)){
																echo number_format($row2['pengembalian'],0,".",".");
															}
														?>
														</div>
													</div>
													<div class="col">
													</div>
												</div>
											</div>
											<div class="col-auto">
												<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pengembalian Tahun 2002
												</div>
												<div class="row no-gutters align-items-center">
													<div class="col-auto">
														<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
														<?php
														$sql = "SELECT SUM(fp.scrapped_quantity) pengembalian FROM fact_production fp JOIN time t ON fp.time_id=t.time_id WHERE t.Year=2002";
														$query = mysqli_query($mysqli,$sql);
															while($row2=mysqli_fetch_array($query)){
																echo number_format($row2['pengembalian'],0,".",".");
															}
														?>
														</div>
													</div>
													<div class="col">
													</div>
												</div>
											</div>
											<div class="col-auto">
												<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pengembalian Tahun 2003
												</div>
												<div class="row no-gutters align-items-center">
													<div class="col-auto">
														<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
														<?php
														$sql = "SELECT SUM(fp.scrapped_quantity) pengembalian FROM fact_production fp JOIN time t ON fp.time_id=t.time_id WHERE t.Year=2003";
														$query = mysqli_query($mysqli,$sql);
															while($row2=mysqli_fetch_array($query)){
																echo number_format($row2['pengembalian'],0,".",".");
															}
														?>
														</div>
													</div>
													<div class="col">
													</div>
												</div>
											</div>
											<div class="col-auto">
												<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pengembalian Tahun 2004
												</div>
												<div class="row no-gutters align-items-center">
													<div class="col-auto">
														<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
														<?php
														$sql = "SELECT SUM(fp.scrapped_quantity) pengembalian FROM fact_production fp JOIN time t ON fp.time_id=t.time_id WHERE t.Year=2004";
														$query = mysqli_query($mysqli,$sql);
															while($row2=mysqli_fetch_array($query)){
																echo number_format($row2['pengembalian'],0,".",".");
															}
														?>
														</div>
													</div>
													<div class="col">
													</div>
												</div>
											</div>
											<div class="col-auto">
												<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-xl-12 col-lg-12">
								<div class="card shadow mb-4">
									<!-- Card Header - Dropdown -->
									<div
										class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
										<h6 class="m-0 font-weight-bold text-primary">Pengembalian Setiap Bulan</h6>
									</div>
									<!-- Card Body -->
									<div class="card-body">
										<div class="chart-area">
											<canvas id="myAreaChart"></canvas>
										</div>
									</div>
								</div>
							</div>

					</div>
					<!-- /.container-fluid -->

				</div>
				<!-- End of Main Content -->

				<!-- Footer -->
				<footer class="sticky-footer bg-white">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span>Copyright &copy; Adventureworks 2021</span>
						</div>
					</div>
				</footer>
				<!-- End of Footer -->

			</div>
			<!-- End of Content Wrapper -->

		</div>
		<!-- End of Page Wrapper -->

		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>

		<!-- Bootstrap core JavaScript-->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="js/sb-admin-2.min.js"></script>

		<!-- Page level plugins -->
		<script src="vendor/chart.js/Chart.min.js"></script>

		<!-- Area Chart Javascript -->
		<script>
			// Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#858796';

			function number_format(number, decimals, dec_point, thousands_sep) {
			  // *     example: number_format(1234.56, 2, ',', ' ');
			  // *     return: '1 234,56'
			  number = (number + '').replace(',', '').replace(' ', '');
			  var n = !isFinite(+number) ? 0 : +number,
				prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
				sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
				dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
				s = '',
				toFixedFix = function(n, prec) {
				  var k = Math.pow(10, prec);
				  return '' + Math.round(n * k) / k;
				};
			  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
			  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
			  if (s[0].length > 3) {
				s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
			  }
			  if ((s[1] || '').length < prec) {
				s[1] = s[1] || '';
				s[1] += new Array(prec - s[1].length + 1).join('0');
			  }
			  return s.join(dec);
			}

			<?php
				$host= "localhost";
				$user= "root";
				$password= "";
				$database= "adventureworks2023";
				$conn= mysqli_connect($host, $user, $password, $database);
				$bulan = "SELECT CONCAT(MONTHNAME(t.tanggal_lengkap), ' ', YEAR(t.tanggal_lengkap)) bulan FROM fact_production fp JOIN time t ON fp.time_id=t.time_id GROUP BY t.Month ORDER BY t.tanggal_lengkap";
				$pengembalian = "SELECT SUM(fp.scrapped_quantity) pengembalian FROM fact_production fp JOIN time t ON fp.time_id=t.time_id GROUP BY t.Month ORDER BY t.tanggal_lengkap";
				$i=1;
				$query_bulan=mysqli_query($conn, $bulan);
				$jumlah_bulan = mysqli_num_rows($query_bulan);
				$chart_bulan="";
				while($row=mysqli_fetch_array($query_bulan)){
					if ($i<$jumlah_bulan) {
					$chart_bulan.='"';
					$chart_bulan.=$row['bulan'];
					$chart_bulan.='",';
					$i++;
					}else{
					$chart_bulan.='"';
					$chart_bulan.=$row['bulan'];
					$chart_bulan.='"';
					}
				}
				$a=1;
				$query_pengembalian = mysqli_query($conn, $pengembalian);
				$jumlah_pengembalian = mysqli_num_rows($query_pengembalian);
				$chart_pengembalian="";
				while ($row1=mysqli_fetch_array($query_pengembalian)) {
					if ($a<$jumlah_pengembalian) {
						$chart_pengembalian.=$row1['pengembalian'];
						$chart_pengembalian.=',';
						$a++;
					}else{
						$chart_pengembalian.=$row1['pengembalian'];
					}
				}
			?>

			var ctx = document.getElementById("myAreaChart");
			var myLineChart = new Chart(ctx, {
			  type: 'line',
			  data: {
				labels: [<?php echo $chart_bulan; ?>],
				datasets: [{
				  label: "Pengembalian Barang",
				  lineTension: 0.3,
				  backgroundColor: "rgba(78, 115, 223, 0.05)",
				  borderColor: "rgba(78, 115, 223, 1)",
				  pointRadius: 3,
				  pointBackgroundColor: "rgba(78, 115, 223, 1)",
				  pointBorderColor: "rgba(78, 115, 223, 1)",
				  pointHoverRadius: 3,
				  pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
				  pointHoverBorderColor: "rgba(78, 115, 223, 1)",
				  pointHitRadius: 10,
				  pointBorderWidth: 2,
				  data: [<?php echo $chart_pengembalian;?>],
				}],
			  },
			  options: {
				maintainAspectRatio: false,
				layout: {
				  padding: {
					left: 10,
					right: 25,
					top: 25,
					bottom: 0
				  }
				},
				scales: {
				  xAxes: [{
					time: {
					  unit: 'date'
					},
					gridLines: {
					  display: false,
					  drawBorder: false
					},
					ticks: {
					  maxTicksLimit: 7
					}
				  }],
				  yAxes: [{
					ticks: {
					  maxTicksLimit: 5,
					  padding: 10,
					  // Include a dollar sign in the ticks
					  callback: function(value, index, values) {
						return '$' + number_format(value);
					  }
					},
					gridLines: {
					  color: "rgb(234, 236, 244)",
					  zeroLineColor: "rgb(234, 236, 244)",
					  drawBorder: false,
					  borderDash: [2],
					  zeroLineBorderDash: [2]
					}
				  }],
				},
				legend: {
				  display: false
				},
				tooltips: {
				  backgroundColor: "rgb(255,255,255)",
				  bodyFontColor: "#858796",
				  titleMarginBottom: 10,
				  titleFontColor: '#6e707e',
				  titleFontSize: 14,
				  borderColor: '#dddfeb',
				  borderWidth: 1,
				  xPadding: 15,
				  yPadding: 15,
				  displayColors: false,
				  intersect: false,
				  mode: 'index',
				  caretPadding: 10,
				  callbacks: {
					label: function(tooltipItem, chart) {
					  var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
					  return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
					}
				  }
				}
			  }
			});
		</script>

		<!-- Doughnat Javascript -->
		<script>
			var config = {
				type: 'doughnut',
				data: {
					datasets: [{
						data:<?php echo json_encode($amount); ?>,
						backgroundColor: [
						'#4169E1',
						'#E3170D',
						'#191970',
						'#0000CD',
						'#0000FF'
						],
						label: 'Presentase Pendapatan Per Tahun'
					}],
					labels: <?php echo json_encode($jenis_tahun); ?>},
				options: {
					responsive: true
				}
			};

			window.onload = function() {
				var ctx = document.getElementById('chart-area').getContext('2d');
				window.myPie = new Chart(ctx, config);
			};

			document.getElementById('randomizeData').addEventListener('click', function() {
				config.data.datasets.forEach(function(dataset) {
					dataset.data = dataset.data.map(function() {
						return randomScalingFactor();
					});
				});

				window.myPie.update();
			});

			var colorNames = Object.keys(window.chartColors);
			document.getElementById('addDataset').addEventListener('click', function() {
				var newDataset = {
					backgroundColor: [],
					data: [],
					label: 'New dataset ' + config.data.datasets.length,
				};

				for (var index = 0; index < config.data.labels.length; ++index) {
					newDataset.data.push(randomScalingFactor());

					var colorName = colorNames[index % colorNames.length];
					var newColor = window.chartColors[colorName];
					newDataset.backgroundColor.push(newColor);
				}

				config.data.datasets.push(newDataset);
				window.myPie.update();
			});

			document.getElementById('removeDataset').addEventListener('click', function() {
				config.data.datasets.splice(0, 1);
				window.myPie.update();
			});
		</script>
	</body>
</html>