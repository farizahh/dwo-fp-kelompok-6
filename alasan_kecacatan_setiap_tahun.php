<html>
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Kecacatan Setiap Tahun</title>

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

			<?php include "sidebar.php";?>

			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">

				<!-- Main Content -->
				<div id="content">

					<?php include "topbar.php";?>

					<!-- Begin Page Content -->
					<div class="container-fluid">

						<!-- Page Heading -->
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
							<h1 class="h3 mb-0 text-gray-800">Kecatatan Produk Setiap Tahun</h1>
						</div>

		

						

						<div class="row col-xl-12">
							<!-- Area Chart -->
							<!-- Pie Chart -->
							<div class="col-xl-8 col-lg-12">
								<div class="card shadow mb-4">
									<!-- Card Header - Dropdown -->
									<div
										class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
										<h6 class="m-0 font-weight-bold text-primary">Kecacatan Produk Setiap Tahun</h6>
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
											$sql = "SELECT COUNT(scrap_reason_id) AS kecacatan FROM fact_production";
											$tot = mysqli_query($mysqli, $sql);
											$tot_amount = mysqli_fetch_row($tot);

											// Query Data Store dan Total Amountnya

											$sql = "SELECT CONCAT('name:',t.year) as tahun, CONCAT('y:', COUNT(fp.scrap_reason_id)*100/" . $tot_amount[0] .") as y, CONCAT('drilldown:', t.year) as drilldown 
											FROM time t 
											JOIN fact_production fp ON (t.time_id = fp.time_id) 
											GROUP BY tahun 
											ORDER BY y DESC";
											$all_kat = mysqli_query($mysqli,$sql);
											while($row = mysqli_fetch_all($all_kat)) {
												$data[] = $row;
											}
											$json_all_kat = json_encode($data);

											// Chart Kedua

											// Query SUM(Amount) Semua Kategori Film
											$sql = "SELECT t.year tahun, count(fp.scrap_reason_id) as tot_kat
											FROM fact_production fp
											JOIN time t ON (t.time_id = fp.time_id)
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
											$sql = "SELECT t.year tahun, sr.name as alasan, COUNT(fp.scrap_reason_id) as pendapatan_kat
											FROM time t
											JOIN fact_production fp ON (t.time_id = fp.time_id)
											JOIN scrap_reason sr ON (sr.scrap_reason_id = fp.scrap_reason_id)
											GROUP BY tahun, alasan";
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
							<span>Copyright &copy; Your Website 2021</span>
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

		<!-- Logout Modal-->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<a class="btn btn-primary" href="login.html">Logout</a>
					</div>
				</div>
			</div>
		</div>

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
				text: 'Kecacatan Setiap Tahun'},
				subtitle: {
					text:'Klik di potongan pie chart untuk melihat detil kecacatan setiap tahun per alasan'
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
						name: "Kecacatan Produk By Tahun",
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
		<!-- Page level custom scripts -->
		<!-- Page level custom scripts -->
		<script type="text/javascript">
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

			// Area Chart Example
			<?php
			$host= "localhost";
			$user= "root";
			$password= "";
			$database= "whsakila2021";
			$conn= mysqli_connect($host, $user, $password, $database);
			$bulan = "SELECT CONCAT(MONTHNAME(t.tanggallengkap), ' ', YEAR(t.tanggallengkap)) bulan FROM fakta_pendapatan f JOIN time t ON f.time_id=t.time_id GROUP BY t.bulan ORDER BY t.tanggallengkap";
			$amount = "SELECT count(fp.customer_id) as amount FROM store s JOIN fakta_pendapatan fp ON (s.store_id = fp.store_id) JOIN time t ON (t.time_id = fp.time_id) GROUP BY s.nama_kota, t.bulan HAVING s.nama_kota='Lethbridge'";
			$amount1 = "SELECT count(customer_id) as amount FROM store s JOIN fakta_pendapatan fp ON (s.store_id = fp.store_id) JOIN time t ON (t.time_id = fp.time_id) GROUP BY s.nama_kota, t.bulan HAVING s.nama_kota='Woodridge'";
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
			$query_amount = mysqli_query($conn, $amount);
			$jumlah_amount = mysqli_num_rows($query_amount);
			$chart_amount="";
			while ($row1=mysqli_fetch_array($query_amount)) {
				if ($a<$jumlah_amount) {
					$chart_amount.=$row1['amount'];
					$chart_amount.=',';
					$a++;
				}else{
					$chart_amount.=$row1['amount'];
				}
			}
			$b=1;
			$query_amount1 = mysqli_query($conn, $amount1);
			$jumlah_amount1 = mysqli_num_rows($query_amount1);
			$chart_amount1="";
			while ($row2=mysqli_fetch_array($query_amount1)) {
				if ($b<$jumlah_amount1) {
					$chart_amount1.=$row2['amount'];
					$chart_amount1.=',';
					$b++;
				}else{
					$chart_amount1.=$row2['amount'];
				}
			}
			?>
			var ctx = document.getElementById("myAreaChart");
			var myLineChart = new Chart(ctx, {
			  type: 'line',
			  data: {
				labels: [<?php echo $chart_bulan; ?>],
				datasets: [{
				  label: "Lethbridge",
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
				  data: [<?php echo $chart_amount;?>],
				},{
				  label: "Woodridge",
				  lineTension: 0.3,
				  backgroundColor: "rgba(0, 0, 0, 0.05)",
				  borderColor: "rgba(0, 0, 0, 1)",
				  pointRadius: 3,
				  pointBackgroundColor: "rgba(0, 0, 0, 1)",
				  pointBorderColor: "rgba(0, 0, 0, 1)",
				  pointHoverRadius: 3,
				  pointHoverBackgroundColor: "rgba(0, 0, 0, 1)",
				  pointHoverBorderColor: "rgba(0, 0, 0, 1)",
				  pointHitRadius: 10,
				  pointBorderWidth: 2,
				  data: [<?php echo $chart_amount1;?>],
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
						return number_format(value);
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
					  return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
					}
				  }
				}
			  }
			});
		</script>		
	</body>
</html>