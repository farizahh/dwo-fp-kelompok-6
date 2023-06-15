<html>
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Penjualan Produk Setiap Tahun</title>

		<!-- Custom fonts for this template-->
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link
			href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
			rel="stylesheet">

		<!-- Custom styles for this template-->
		<link href="css/sb-admin-2.min.css" rel="stylesheet">
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/data.js"></script>
		<script src="https://code.highcharts.com/modules/drilldown.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
		<script src="https://code.highcharts.com/modules/export-data.js"></script>
		<script src="https://code.highcharts.com/modules/accessibility.js"></script>
		<!-- <link rel="stylesheet" href="/drilldown.css"/> -->
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
		<!---->
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
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
							<h1 class="h3 mb-0 text-gray-800">Penjualan Setiap Lokasi</h1>
						</div>

						<!-- Content Row -->
						<div class="row">

							<!-- Pending Requests Card Example -->
							<div class="col-xl-8 col-lg-7 mb-4">
							</div>
						</div>

						<!-- Content Row -->

						<div class="row col-xl-12">
							<!-- Area Chart -->
							<!-- Pie Chart -->
							<div class="col-xl-8 col-lg-12">
								<div class="card shadow mb-4">
									<!-- Card Header - Dropdown -->
									<div
										class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
										<h6 class="m-0 font-weight-bold text-primary">Penjualan Tiap Lokasi</h6>
									</div>
									<!-- Card Body -->
									<div class="card-body-store">
										<div class="chart-area-store">
											<!-- <canvas id="myAreaChart"></canvas> -->
											<?php
											$host       = "localhost";
											$user       = "root";
											$password   = "";
											$database   = "adventureworks2023";
											$mysqli     = mysqli_connect($host, $user, $password, $database);
											// Chart Pertama 

											// Query Total Semua Amount
											$sql = "SELECT COUNT(territory_id) AS territory FROM fact_sales";
											$tot = mysqli_query($mysqli, $sql);
											$tot_amount = mysqli_fetch_row($tot);

											// Query Data Store dan Total Amountnya

											$sql = "SELECT CONCAT('name:',t.year) as tahun, CONCAT('y:', COUNT(fs.territory_id)*100/" . $tot_amount[0] .") as y, CONCAT('drilldown:', t.year) as drilldown 
											FROM time t 
											JOIN fact_sales fs ON (t.time_id = fs.time_id) 
											GROUP BY tahun 
											ORDER BY y DESC";
											$all_kat = mysqli_query($mysqli,$sql);
											while($row = mysqli_fetch_all($all_kat)) {
												$data[] = $row;
											}
											$json_all_kat = json_encode($data);

											// Chart Kedua

											// Query SUM(Amount) Semua Kategori Film
											$sql = "SELECT t.year tahun, SUM(fs.territory_id) as tot_kat
											FROM fact_sales fs
											JOIN time t ON (t.time_id = fs.time_id)
											GROUP BY tahun";
											$hasil_kat = mysqli_query($mysqli,$sql);
											while ($row = mysqli_fetch_all($hasil_kat)) {
												$tot_all_kat[] = $row;
											}

											function cari_tot_kat($kat_dicari, $tot_all_kat){
												$counter = 0;
												while ( $counter < count($tot_all_kat[0]) ) {
													if ($kat_dicari == $tot_all_kat[0][$counter][0]) {
														$tot_kat = $tot_all_kat[0][$counter][1];
														return $tot_kat;
													}
													$counter++;
												}
											}

											// Query untuk ambil total penjualan di kategori berdasarkan bulan
											$sql = "SELECT t.year tahun, tr.territory_name as territory_name, SUM(fs.territory_id) as pendapatan_kat
											FROM time t
											JOIN fact_sales fs ON (t.time_id = fs.time_id)
											JOIN territory tr ON (tr.territory_id = fs.territory_id)
											GROUP BY tahun, territory_name";
											$det_kat = mysqli_query($mysqli,$sql);

											$i = 0;
											while ($row = mysqli_fetch_all($det_kat)) {
												$data_det[] = $row;
											}

											// DATA DRILL DOWN
											$i = 0;

											// Inisiasi String DATA
											$string_data = "";
											$string_data .= '{nama:"' . $data_det[0][$i][0] . '", id:"' . $data_det[0][$i][0] . '", data: [';

											foreach($data_det[0] as $a){
												if($i < count($data_det[0])-1){
													if($a[0] != $data_det[0][$i+1][0]){
														$string_data .= '["' . $a[1] . '", ' . $a[2]*100/cari_tot_kat($a[0], $tot_all_kat) . ']]},';
														$string_data .= '{name:"' . $data_det[0][$i+1][0] . '", id:"' . $data_det[0][$i+1][0] . '", data: [';
													}
													else {
														$string_data .= '["' . $a[1] . '", ' . $a[2]*100/cari_tot_kat($a[0], $tot_all_kat) . '], ';
													}
												}
												else {
													$string_data .= '["' . $a[1] . '", ' . $a[2]*100/cari_tot_kat($a[0], $tot_all_kat). ']]}';
												}

												$i = $i+1;
											}


											?>
												<figure class="highcharts-figure">
													<div id="container"></div>
													<p class="highcharts-description"></p>
												</figure>
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
							<span>Copyright &copy; Adventurework 2022</span>
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
		<script type="text/javascript">
		// Create the chart
			Highcharts.chart('container', {
				chart: {
				type: 'pie'
			},
			title: {
				text: 'Persentase Lokasi Penjualan (AdventureWorks)'},
				subtitle: {
					text:'Klik di potongan pie chart untuk melihat detil nilai pemasukan tiap tahunnya'
				},
				accessibility: {
					announceNewData: {
						enabled: true
					},
					point: {
						valueSuffix: '%'
					}
				},
				plotOptions: {
					series:{
						dataLabels: {
							enabled: true,
							format:'{point.name}: {point.y:.1f}%'
						}
					}
				},
				tooltip: {
					headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
					pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
				},
				series: [
					{
						name: "Penjualan Setiap Tahun",
						colorByPoint: true,
						data:
							<?php
							$datanya = $json_all_kat;
							$data1 = str_replace('["', '{"',$datanya) ;
							$data2 = str_replace('"]', '"}',$data1) ;
							$data3 = str_replace('[[', '[', $data2);
							$data4 = str_replace(']]', ']', $data3);
							$data5 = str_replace(':', '" : "', $data4);
							$data6 = str_replace('"name"', 'name', $data5);
							$data7 = str_replace('"drilldown"', 'drilldown', $data6);
							$data8 = str_replace('"y"', 'y', $data7);
							$data9 = str_replace('",', ',', $data8);
							$data10 = str_replace(',y', '",y', $data9);
							$data11 = str_replace(',y : "', ',y : ', $data10);
							echo $data11;
							?>
					}
				],
				drilldown: {
					series: [
						<?php
						echo $string_data;
						?>
					]
				}
			});
		</script>
	</body>
</html>