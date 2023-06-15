<!-- Sidebar -->
<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
    <div class="sidebar-brand-text mx-3">Adventureworks</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="home.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Penjualan
</div>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Grafik Data Penjualan</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Grafik Penjualan:</h6>
            <a class="collapse-item" href="salesproduct.php">Product Penjualan</a>
            <a class="collapse-item" href="pegawai.php">Pegawai</a>
            <a class="collapse-item" href="total.php">Total Pemasukan</a>
            <a class="collapse-item" href="territory.php">Wilayah</a>
            <a class="collapse-item" href="shipmethod.php">Metode Pengiriman</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Produksi
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Grafik Data Produksi</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Grafik Produksi:</h6>
            <a class="collapse-item" href="productpurchase.php">Produk Stok</a>
            <a class="collapse-item" href="keterlambatan.php">Keterlambatan</a>
            <a class="collapse-item" href="stok.php">Jumlah Stok</a>
            <a class="collapse-item" href="pengembalian_stok.php">Pengembalian</a>
        </div>
    </div>
</li>

<li class="nav-item active">
    <a class="nav-link" href="pemasukan_setiap_tahun.php">
        <i class="fas fa-store"></i>
        <span>Pemasukan Setiap Tahun</span>
    </a>
</li>

<li class="nav-item active">
    <a class="nav-link" href="penjualan_produk.php">
        <i class="fas fa-store"></i>
        <span>Penjualan Setiap Lokasi</span>
    </a>
</li>

<li class="nav-item active">
    <a class="nav-link" href="pegawai_terlibat_pertahun.php">
        <i class="fas fa-store"></i>
        <span>Pegawai Penjualan Setiap Tahun</span>
    </a>
</li>

<li class="nav-item active">
    <a class="nav-link" href="penyetokan_setiap_tahun.php">
        <i class="fas fa-store"></i>
        <span>Penyetokan Setiap Tahun Per Produk</span>
    </a>
</li>

<li class="nav-item active">
    <a class="nav-link" href="metode_pengiriman_setiap_tahun.php">
        <i class="fas fa-store"></i>
        <span>Metode Pengiriman Setiap Tahun</span>
    </a>
</li>

<li class="nav-item active">
    <a class="nav-link" href="alasan_kecacatan_setiap_tahun.php">
        <i class="fas fa-store"></i>
        <span>Alasan Kecacatan Setiap Tahun</span>
    </a>
</li>



<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->