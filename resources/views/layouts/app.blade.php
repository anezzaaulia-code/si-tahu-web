<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <!-- Viewport tidak dihapus agar tidak error, tapi desain kita kunci lebarnya -->
    <meta name="viewport" content="width=1200"> 
    <title>Si Tahu Web Admin - Desktop Version</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background-color: #f4f2eb; 
            overflow-x: auto; /* Biar bisa scroll horizontal kalau layar kekecilan */
        }
        
        /* Sidebar Statis di Kiri */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #344e2d;
            color: white;
            padding-top: 20px;
            z-index: 1000;
        }

        .sidebar a {
            padding: 15px 25px;
            text-decoration: none;
            font-size: 16px;
            color: #d1d1d1;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: #273b22;
            color: white;
            border-left: 5px solid #a3b18a;
        }

        /* Konten Utama di Kanan */
        .main-content {
            margin-left: 260px; /* Jarak pas selebar sidebar */
            padding: 40px;
            min-width: 1000px; /* Kunci lebar konten agar tidak menyusut */
        }

        .desktop-card {
            background: #ffffff; 
            border-radius: 8px; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 25px;
            border: 1px solid #dee2e6;
        }

        .table-custom thead {
            background-color: #f8f9fa;
        }
        
        .btn-primary-custom {
            background-color: #344e2d;
            color: white;
            border: none;
        }
    </style>
</head>
<body>

    <!-- Sidebar Kiri (Desktop Style) -->
    <div class="sidebar">
        <div class="px-4 mb-4">
            <h4 class="fw-bold">🥗 Si Tahu Admin</h4>
            <small class="text-white-50">Manajemen Produksi</small>
        </div>
        <hr>
        <a href="/dashboard" class="{{ Request::is('dashboard') ? 'active' : '' }}">📊 Dashboard</a>
        <a href="/produk" class="{{ Request::is('produk*') ? 'active' : '' }}">📦 Data Produk & Stok</a>
        <a href="/parameter" class="{{ Request::is('parameter*') ? 'active' : '' }}">🏭 Parameter Produksi</a>
        <a href="/harga" class="{{ Request::is('harga*') ? 'active' : '' }}">💰 Kelola Harga</a>
        <a href="/laporan" class="{{ Request::is('laporan*') ? 'active' : '' }}">📝 Laporan Harian</a>
        <div style="position: absolute; bottom: 20px; width: 100%;" class="px-4">
            <button class="btn btn-outline-light btn-sm w-100">Logout</button>
        </div>
    </div>

    <!-- Area Konten -->
    <div class="main-content">
        @yield('konten')
    </div>

</body>
</html>