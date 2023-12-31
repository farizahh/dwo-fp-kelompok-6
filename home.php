<html>
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Dashboard Adventureworks</title>

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

						<!-- Content Row -->
						<div class="row">
							<!-- Earnings (Monthly) Card Example -->
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-primary shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
													Total Pemasukan</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800">
													<?php  
													 $host       = "localhost";
													 $user       = "root";
													 $password   = "";
													 $database   = "adventureworks2023";
													 $mysqli     = mysqli_connect($host, $user, $password, $database);

													 $sql = "SELECT SUM(line_total) as line_total from fact_sales";
													 $query = mysqli_query($mysqli,$sql);
													 while($row2=mysqli_fetch_array($query)){
														echo "$".number_format($row2['line_total'],0,".",",");
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

							<!-- Earnings (Monthly) Card Example -->
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-success shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
													Jumlah Stok Produk</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800">
												<?php
												$sql = "SELECT SUM(stocked_quantity) as stocked_quantity from fact_production";
												$query = mysqli_query($mysqli,$sql);
													 while($row2=mysqli_fetch_array($query)){
														echo number_format($row2['stocked_quantity'],0,".",",");
													 }
												?>
												</div>
											</div>
											<div class="col-auto">
											   <i class="fa fa-shopping-basket fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Earnings (Monthly) Card Example -->
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Keterlambatan Pekerjaan 
												</div>
												<div class="row no-gutters align-items-center">
													<div class="col-auto">
														<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
														<?php
														$sql = "SELECT COUNT(keterlambatan) as keterlambatan from fact_production";
														 $query = mysqli_query($mysqli,$sql);
															while($row2=mysqli_fetch_array($query)){
																echo number_format($row2['keterlambatan'],0,".",",");
															}
														?>
														</div>
													</div>
													<div class="col">
													</div>
												</div>
											</div>
											<div class="col-auto">
												<i class="fa fa-shopping-basket fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Pending Requests Card Example -->
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-warning shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
													Jumlah Kerusakan Barang</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800">
													<?php
														$sql = "SELECT SUM(scrapped_quantity) as scrapped_quantity from fact_production";
														 $query = mysqli_query($mysqli,$sql);
															while($row2=mysqli_fetch_array($query)){
																echo number_format($row2['scrapped_quantity'],0,".",",");
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
						</div>

						<div class="d-sm-flex align-items-center justify-content-between mb-4">
							<h1 class="h3 mb-0 text-gray-800">Mondrian</h1> 
						</div>

						<div class="row">
							<iframe src="http://localhost:8080/mondrian/testpage.jsp?query=whadw1" style="height:1000px; width:100%; border:none; align-content:center"> </iframe>
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

		<!-- Bootstrap core JavaScript-->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="js/sb-admin-2.min.js"></script>

		<!-- Page level plugins -->
		<script src="vendor/chart.js/Chart.min.js"></script>

		<!-- Page level custom scripts -->
		<script src="js/demo/chart-area-demo.js"></script>
		<script src="js/demo/chart-pie-demo.js"></script>

	</body>
</html>