<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>GOW INSIDE • Data Siswa</title>

  <!-- TailwindCSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            bb1: '#e6f3ff',
            bb2: '#f8fbff',
            sky1: '#57b2ff',
            sky2: '#389eed',
            ink: '#0f172a',
            mint: '#9FE6C9',
            coal: '#0b1224'
          },
          boxShadow: {
            soft: '0 18px 60px rgba(30,64,175,.08)',
            pop:  '0 24px 60px rgba(56,158,237,.14)'
          },
          fontFamily: { pop: ['Poppins','ui-sans-serif','system-ui'] },
          animation: {
            fade: 'fade .7s ease both',
            float: 'float 4.5s ease-in-out infinite',
            pulseSky: 'pulseSky 2.3s ease-in-out infinite',
            slideIn: 'slideIn 0.3s ease-out',
            scaleIn: 'scaleIn 0.2s ease-out'
          },
          keyframes: {
            fade: { '0%':{opacity:0, transform:'translateY(14px)'},
                    '100%':{opacity:1, transform:'none'} },
            float: { '0%,100%':{transform:'translateY(0)'},
                     '50%':{transform:'translateY(-8px)'} },
            pulseSky: {
              '0%,100%':{ boxShadow:'0 0 0 0 rgba(56,158,237,.35)' },
              '50%':{ boxShadow:'0 0 0 16px rgba(56,158,237,0)' }
            },
            slideIn: {
              '0%': { transform: 'translateX(-100%)', opacity: 0 },
              '100%': { transform: 'translateX(0)', opacity: 1 }
            },
            scaleIn: {
              '0%': { transform: 'scale(0.9)', opacity: 0 },
              '100%': { transform: 'scale(1)', opacity: 1 }
            }
          }
        }
      }
    }
  </script>

  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet" />
  <script src="https://unpkg.com/phosphor-icons"></script>

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

  <style>
    :root{ --bb1:#e6f3ff; --bb2:#f8fbff; --sky1:#57b2ff; --sky2:#389eed; --ink:#0f172a }
    *{ scroll-behavior:smooth }
    body{
      font-family:'Poppins',sans-serif; color:var(--ink);
      background:
        radial-gradient(800px 520px at -10% -10%, #cfe7ff 0%, transparent 65%),
        radial-gradient(700px 500px at 105% 10%, #cfe7ff 0%, transparent 60%),
        linear-gradient(180deg,var(--bb1) 0%, var(--bb2) 100%);
    }
    .glass{ background:rgba(255,255,255,.88); border:1px solid rgba(255,255,255,.55); backdrop-filter:blur(24px) }
    .chip{ box-shadow:0 8px 22px rgba(2,132,199,.12) }
    .lift{ transition:transform .2s ease, box-shadow .2s ease }
    .lift:hover{ transform:translateY(-6px); box-shadow:0 24px 40px rgba(15,23,42,.14) }
    .hide-scrollbar::-webkit-scrollbar{ display:none } 
    .hide-scrollbar{ -ms-overflow-style:none; scrollbar-width:none }
    ::selection{ background:#cde9ff }
    .rounded-3xl{ border-radius:28px }
    .btn-primary{ background:linear-gradient(135deg,var(--sky1),var(--sky2)); color:#fff }
    .card-hover{transition:transform .18s ease,box-shadow .18s ease}
    .card-hover:hover{transform:translateY(-6px);box-shadow:0 20px 40px rgba(15,23,42,.12)}
    .small-muted{color:#94a3b8;font-size:.92rem}
    .badge{display:inline-flex;align-items:center;gap:.5rem;padding:.25rem .8rem;border-radius:999px;font-weight:600;font-size:0.75rem}
    .animate-fade{animation:fadeIn .42s ease both}
    @keyframes fadeIn{from{opacity:0;transform:translateY(6px)}to{opacity:1;transform:none}}
    
    /* Fixed sidebar styles */
    .sidebar-fixed {
      position: fixed;
      top: 1.5rem;
      left: 1.5rem;
      z-index: 30;
      height: calc(100vh - 3rem);
      overflow-y: auto;
    }
    
    .main-content-with-sidebar {
      margin-left: 7rem;
    }
    
    @media (max-width: 1023px) {
      .sidebar-fixed {
        display: none;
      }
      .main-content-with-sidebar {
        margin-left: 0;
      }
    }

    /* Modal styles */
    .modal-backdrop{position:fixed;inset:0;display:none;background:rgba(2,6,23,0.6);align-items:center;justify-content:center;z-index:60;backdrop-filter:blur(4px)}
    .modal-card{background:white;border-radius:20px;padding:2rem;width:96%;max-width:900px;box-shadow:0 25px 50px rgba(2,6,23,.25);max-height:90vh;overflow-y:auto}
    
    /* Enhanced table styles */
    .data-table {
      border-collapse: separate;
      border-spacing: 0;
    }
    
    .data-table th {
      background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
      position: sticky;
      top: 0;
      z-index: 10;
    }
    
    .data-table tr:hover {
      background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
      transform: scale(1.002);
    }
    
    .action-btn {
      transition: all 0.2s ease;
      position: relative;
      overflow: hidden;
    }
    
    .action-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }
    
    .action-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
      transition: left 0.5s;
    }
    
    .action-btn:hover::before {
      left: 100%;
    }
    
    /* Card list for mobile */
    .student-card {
      background: rgba(255,255,255,0.9);
      border: 1px solid rgba(255,255,255,0.6);
      backdrop-filter: blur(20px);
      transition: all 0.3s ease;
    }
    
    .student-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 15px 35px rgba(15,23,42,0.1);
      background: rgba(255,255,255,0.95);
    }
    
    /* Loading animation */
    .loading-spinner {
      border: 3px solid #f3f4f6;
      border-top: 3px solid #389eed;
      border-radius: 50%;
      width: 20px;
      height: 20px;
      animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    
    /* Enhanced search and filter styles */
    .search-filter-container {
      background: linear-gradient(135deg, rgba(255,255,255,0.95) 0%, rgba(248,250,252,0.95) 100%);
      backdrop-filter: blur(20px);
    }
    
    .filter-input {
      background: rgba(255,255,255,0.8);
      border: 2px solid transparent;
      transition: all 0.3s ease;
    }
    
    .filter-input:focus {
      background: rgba(255,255,255,0.95);
      border-color: #389eed;
      box-shadow: 0 0 0 3px rgba(56,158,237,0.1);
      transform: translateY(-1px);
    }
    
    /* Statistics cards enhancement */
    .stat-card {
      background: linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(248,250,252,0.8) 100%);
      border: 1px solid rgba(255,255,255,0.6);
      backdrop-filter: blur(20px);
      position: relative;
      overflow: hidden;
    }
    
    .stat-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(135deg, #57b2ff, #389eed);
    }
    
    .stat-card:hover {
      transform: translateY(-8px) scale(1.02);
      box-shadow: 0 25px 50px rgba(15,23,42,0.15);
    }
    
    /* Responsive grid improvements */
    @media (max-width: 768px) {
      .desktop-table { display: none; }
      .mobile-cards { display: block; }
      .stat-card { transform: none !important; }
      .stat-card:hover { transform: translateY(-4px) !important; }
    }
    
    @media (min-width: 769px) {
      .desktop-table { display: block; }
      .mobile-cards { display: none; }
    }
  </style>
</head>
<body class="min-h-screen">

  <!-- MOBILE NAV (TOP) -->
  <header class="md:hidden px-4 pt-4">
    <div class="glass rounded-2xl px-4 py-3 flex items-center justify-between">
      <div class="flex items-center gap-3">
        <div class="feature-icon flex items-center justify-center">
          <img src="/assets/smkn13.jpg.png" alt="Logo SMKN 13 Bandung" class="w-12 h-12 object-contain">
        </div>
        <div>
          <p class="text-[11px] tracking-wide text-slate-500 -mb-1">GO INSIDE</p>
          <h1 class="font-extrabold text-base">Data Siswa</h1>
        </div>
      </div>
      <button id="btnMobileMenu" class="px-3 py-2 rounded-xl bg-white text-sky-700 font-semibold flex items-center gap-2">
        <i class="ph-list"></i> Menu
      </button>
    </div>

    <!-- dropdown -->
    <nav id="mobileMenu" class="hidden mt-2 glass rounded-2xl px-4 py-3">
      <ul class="grid grid-cols-2 gap-2 text-sm">
        <li><a href="{{ route('dashboardadmin') }}" class="block p-2 rounded-lg hover:bg-sky-50">Dashboard</a></li>
        <li><a href="{{ route('data-guru') }}" class="block p-2 rounded-lg hover:bg-sky-50">Data Guru</a></li>
        <li><a href="#data-siswa" class="block p-2 rounded-lg hover:bg-sky-50 bg-sky-100 font-semibold">Data Siswa</a></li>
        <li><a href="#data-izin" class="block p-2 rounded-lg hover:bg-sky-50">Data Izin</a></li>
        <li><a href="#profil" class="block p-2 rounded-lg hover:bg-sky-50">Profil</a></li>
        <li><button class="block w-full text-left p-2 rounded-lg hover:bg-sky-50">Logout</button></li>
      </ul>
    </nav>
  </header>

  <!-- FIXED SIDEBAR (desktop only) -->
  <!-- SIDEBAR -->
<aside class="sidebar-fixed animate-slideIn">
    <nav class="bg-[#eaf1ff] rounded-3xl p-4 flex flex-col gap-4 shadow-soft w-24">

        <a href="{{ route('dashboardadmin') }}" 
           class="flex flex-col items-center gap-1 px-2 py-3 rounded-xl hover:scale-110 transition text-center
           {{ request()->routeIs('dashboardadmin') ? 'bg-sky-600 text-white shadow-md' : 'bg-white text-slate-800' }}">
            <i class="ph-house text-2xl"></i>
            <span class="text-xs">Dashboard</span>
        </a>

        <a href="{{ route('data-guru') }}" 
           class="flex flex-col items-center gap-1 px-2 py-3 rounded-xl hover:scale-110 transition text-center
           {{ request()->routeIs('data-guru') ? 'bg-sky-600 text-white shadow-md' : 'bg-white text-slate-800' }}">
            <i class="ph-chalkboard-teacher text-2xl"></i>
            <span class="text-xs">Data Guru</span>
        </a>

        <a href="{{ route('data-siswa') }}" 
           class="flex flex-col items-center gap-1 px-2 py-3 rounded-xl hover:scale-110 transition text-center
           {{ request()->routeIs('data-siswa') ? 'bg-sky-600 text-white shadow-md' : 'bg-white text-slate-800' }}">
            <i class="ph-student text-2xl"></i>
            <span class="text-xs">Data Siswa</span>
        </a>

        <a href="{{ route('data-izin') }}" 
           class="flex flex-col items-center gap-1 px-2 py-3 rounded-xl hover:scale-110 transition text-center
           {{ request()->routeIs('data-izin') ? 'bg-sky-600 text-white shadow-md' : 'bg-white text-slate-800' }}">
            <i class="ph-note-pencil text-2xl"></i>
            <span class="text-xs">Data Izin</span>
        </a>

        <a href="{{ route('profile-admin') }}" 
           class="flex flex-col items-center gap-1 px-2 py-3 rounded-xl hover:scale-110 transition text-center
           {{ request()->routeIs('profile-admin') ? 'bg-sky-600 text-white shadow-md' : 'bg-white text-slate-800' }}">
            <i class="ph-user-circle text-2xl"></i>
            <span class="text-xs">Profil</span>
        </a>

    </nav>
</aside>

<!-- MOBILE HEADER -->
<header class="md:hidden px-4 pt-4 animate-fade">
    <div class="glass rounded-2xl px-4 py-3 flex items-center justify-between shadow-card">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center">
                <i class="ph-graduation-cap text-white text-2xl"></i>
            </div>
            <div>
                <p class="text-[11px] tracking-wide text-slate-500 uppercase font-medium">GO INSIDE</p>
                <h1 class="font-bold text-lg bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                    {{ request()->routeIs('data-izin') ? 'Data Izin' : 'Dashboard' }}
                </h1>
            </div>
        </div>
        <button id="btnMobileMenu" class="btn-gradient px-4 py-2 rounded-xl text-white font-semibold flex items-center gap-2 text-sm">
            <i class="ph-list text-lg"></i> Menu
        </button>
    </div>
</header>

  
  <!-- MAIN CONTENT WRAPPER -->
  <div class="main-content-with-sidebar">
    <!-- Header (Topbar) for main layout -->
    <header class="max-w-[1200px] mx-auto px-4 md:px-6 pt-6 pb-4">
      <div class="glass rounded-2xl px-4 py-3 flex items-center justify-between">
        <div class="flex items-center gap-3">
          <div class="feature-icon flex items-center justify-center w-14 h-14 rounded-full bg-white/80 shadow-md">
            <i class="ph-student text-sky-600 text-2xl"></i>
          </div>
          <div>
            <p class="text-xs tracking-wide text-slate-500">MANAJEMEN DATA</p>
            <h1 class="font-extrabold leading-tight">Data Siswa</h1>
          </div>
        </div>

        <div class="flex items-center gap-4">
          <div class="text-right">
            <div id="clockTop" class="font-semibold">--:--:--</div>
            <div id="clockDateTop" class="small-muted text-sm">--</div>
          </div>

          <div class="flex items-center gap-2">
            <button id="refreshNow" title="Refresh data" class="px-3 py-2 bg-sky-50 rounded-lg border hover:bg-sky-100 transition-all">
              <i class="ph-arrows-clockwise text-sky-600"></i>
            </button>
            <button id="btnExportAll" title="Export semua data" class="px-3 py-2 bg-green-50 rounded-lg border hover:bg-green-100 transition-all">
              <i class="ph-download-simple text-green-600"></i>
            </button>
            <button class="px-3 py-2 bg-white rounded-lg hover:bg-sky-50 text-sky-700 font-semibold flex items-center gap-1">
              <i class="ph-sign-out"></i> Logout
            </button>
          </div>
        </div>
      </div>
    </header>

    <!-- MAIN LAYOUT -->
    <main class="max-w-[1200px] mx-auto px-4 md:px-6 pb-10 mt-6">

      <!-- 📊 QUICK STATS ENHANCED -->
      <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="stat-card rounded-2xl p-6 card-hover animate-fade">
          <div class="flex items-center justify-between">
            <div>
              <div class="small-muted flex items-center gap-2">
                <i class="ph-users text-sky-600"></i>
                Total Akun Siswa
              </div>
              <div class="text-3xl font-extrabold mt-2" id="totalSiswa">150</div>
              <div class="text-xs text-slate-500 mt-1">Semester ini</div>
            </div>
            <div class="bg-gradient-to-br from-sky-100 to-sky-200 rounded-full p-3">
              <i class="ph-student text-2xl text-sky-600"></i>
            </div>
          </div>
        </div>

        <div class="stat-card rounded-2xl p-6 card-hover animate-fade" style="animation-delay: 0.1s">
          <div class="flex items-center justify-between">
            <div>
              <div class="small-muted flex items-center gap-2">
                <i class="ph-check-circle text-green-600"></i>
                Akun Aktif
              </div>
              <div class="text-3xl font-extrabold text-green-600 mt-2" id="akunAktif">110</div>
              <div class="text-xs text-green-500 mt-1">73% dari total</div>
            </div>
            <div class="bg-gradient-to-br from-green-100 to-green-200 rounded-full p-3">
              <i class="ph-check-circle text-2xl text-green-600"></i>
            </div>
          </div>
        </div>

        <div class="stat-card rounded-2xl p-6 card-hover animate-fade" style="animation-delay: 0.2s">
          <div class="flex items-center justify-between">
            <div>
              <div class="small-muted flex items-center gap-2">
                <i class="ph-x-circle text-red-600"></i>
                Akun Diblokir
              </div>
              <div class="text-3xl font-extrabold text-red-600 mt-2" id="akunBlokir">25</div>
              <div class="text-xs text-red-500 mt-1">Perlu perhatian</div>
            </div>
            <div class="bg-gradient-to-br from-red-100 to-red-200 rounded-full p-3">
              <i class="ph-warning text-2xl text-red-600"></i>
            </div>
          </div>
        </div>

        <div class="stat-card rounded-2xl p-6 card-hover animate-fade" style="animation-delay: 0.3s">
          <div class="flex items-center justify-between">
            <div>
              <div class="small-muted flex items-center gap-2">
                <i class="ph-clock text-amber-600"></i>
                Rata-rata Telat
              </div>
              <div class="text-3xl font-extrabold text-amber-600 mt-2" id="avgTelat">12</div>
              <div class="text-xs text-amber-500 mt-1">menit/bulan</div>
            </div>
            <div class="bg-gradient-to-br from-amber-100 to-amber-200 rounded-full p-3">
              <i class="ph-stopwatch text-2xl text-amber-600"></i>
            </div>
          </div>
        </div>
      </section>

      <!-- 🔍 ENHANCED FILTER & SEARCH -->
      <section class="search-filter-container rounded-2xl p-6 card-hover mb-8 border">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">
          <h2 class="font-bold text-xl flex items-center gap-3">
            <i class="ph-student text-sky-600 text-2xl"></i> 
            Manajemen Akun Siswa
            <span class="badge bg-sky-100 text-sky-700" id="totalCount">150 siswa</span>
          </h2>
          
          <div class="flex items-center gap-3">
            <button id="btnAddStudent" class="px-4 py-2 bg-gradient-to-r from-sky-600 to-sky-700 text-white rounded-lg hover:from-sky-700 hover:to-sky-800 transition-all flex items-center gap-2 font-semibold">
              <i class="ph-plus"></i> Tambah Siswa
            </button>
            <button id="btnBulkAction" class="px-4 py-2 bg-white border rounded-lg hover:bg-gray-50 transition-all flex items-center gap-2">
              <i class="ph-gear-six"></i> Aksi Bulk
            </button>
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-4 mb-6">
          <div class="relative">
            <i class="ph-magnifying-glass absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400"></i>
            <input type="search" placeholder="Cari nama, NIS, atau kelas..."
              class="filter-input w-full pl-10 pr-4 py-3 rounded-lg border-2 focus:outline-none" id="searchSiswa" />
          </div>
          
          <select id="filterKelas" class="filter-input px-4 py-3 rounded-lg border-2 focus:outline-none">
            <option value="">Semua Kelas</option>
            <option value="X RPL 1">X RPL 1</option>
            <option value="X RPL 2">X RPL 2</option>
            <option value="XI RPL 1">XI RPL 1</option>
            <option value="XI RPL 2">XI RPL 2</option>
            <option value="XII RPL 1">XII RPL 1</option>
            <option value="XII RPL 2">XII RPL 2</option>
          </select>
          
          <select id="filterStatus" class="filter-input px-4 py-3 rounded-lg border-2 focus:outline-none">
            <option value="">Semua Status</option>
            <option value="aktif">Aktif</option>
            <option value="blokir">Diblokir</option>
            <option value="warning">Warning</option>
            <option value="pending">Pending</option>
          </select>
          
          <select id="filterTelat" class="filter-input px-4 py-3 rounded-lg border-2 focus:outline-none">
            <option value="">Semua Keterlambatan</option>
            <option value="0">Tidak Pernah Telat</option>
            <option value="1-5">1-5 Kali</option>
            <option value="6-10">6-10 Kali</option>
            <option value="11+">Lebih dari 10 Kali</option>
          </select>
          
          <input type="date" id="filterTanggal" class="filter-input px-4 py-3 rounded-lg border-2 focus:outline-none" />
          
          <div class="flex gap-2">
            <button id="btnResetFilter" class="px-4 py-3 bg-gray-100 hover:bg-gray-200 rounded-lg transition-all flex-1">
              <i class="ph-x"></i>
            </button>
            <button id="btnApplyFilter" class="px-4 py-3 bg-sky-600 hover:bg-sky-700 text-white rounded-lg transition-all flex-1">
              <i class="ph-funnel"></i>
            </button>
          </div>
        </div>

        <!-- Quick Actions Bar -->
        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-lg">
          <div class="flex items-center gap-4">
            <label class="flex items-center gap-2 cursor-pointer">
              <input type="checkbox" id="selectAll" class="rounded">
              <span class="text-sm">Pilih Semua</span>
            </label>
            <span id="selectedCount" class="text-sm text-slate-600">0 dipilih</span>
          </div>
          
          <div class="flex items-center gap-2">
            <button id="btnExportSelected" class="px-3 py-2 bg-green-600 text-white rounded-lg text-sm disabled:opacity-50" disabled>
              Export Terpilih
            </button>
            <button id="btnBulkBlock" class="px-3 py-2 bg-red-600 text-white rounded-lg text-sm disabled:opacity-50" disabled>
              Blokir Terpilih
            </button>
            <button id="btnBulkActivate" class="px-3 py-2 bg-green-600 text-white rounded-lg text-sm disabled:opacity-50" disabled>
              Aktifkan Terpilih
            </button>
          </div>
        </div>
      </section>

      <!-- 📋 ENHANCED TABLE (Desktop) -->
      <section class="glass rounded-2xl p-6 card-hover mb-8 desktop-table">
        <div class="overflow-x-auto">
          <table class="data-table w-full text-sm">
            <thead>
              <tr class="text-left small-muted">
                <th class="px-4 py-4 w-12">
                  <input type="checkbox" id="selectAllTable" class="rounded">
                </th>
                <th class="px-4 py-4 cursor-pointer hover:text-sky-600 transition-colors" onclick="sortTable('nama')">
                  Nama <i class="ph-caret-up-down ml-1"></i>
                </th>
                <th class="px-4 py-4 cursor-pointer hover:text-sky-600 transition-colors" onclick="sortTable('nis')">
                  NIS <i class="ph-caret-up-down ml-1"></i>
                </th>
                <th class="px-4 py-4 cursor-pointer hover:text-sky-600 transition-colors" onclick="sortTable('kelas')">
                  Kelas <i class="ph-caret-up-down ml-1"></i>
                </th>
                <th class="px-4 py-4">Status</th>
                <th class="px-4 py-4 cursor-pointer hover:text-sky-600 transition-colors" onclick="sortTable('telat')">
                  Telat <i class="ph-caret-up-down ml-1"></i>
                </th>
                <th class="px-4 py-4 cursor-pointer hover:text-sky-600 transition-colors" onclick="sortTable('izin')">
                  Izin <i class="ph-caret-up-down ml-1"></i>
                </th>
                <th class="px-4 py-4">Last Login</th>
                <th class="px-4 py-4 w-40">Aksi</th>
              </tr>
            </thead>
            <tbody id="studentTableBody" class="bg-white divide-y divide-slate-200/50">
              <!-- Sample enhanced data -->
              <tr class="transition-all duration-200 cursor-pointer" onclick="openDetail(1)" data-student-id="1" data-status="aktif" data-kelas="XI RPL 1">
                <td class="px-4 py-4">
                  <input type="checkbox" class="student-checkbox rounded" onclick="event.stopPropagation()" data-id="1">
                </td>
                <td class="px-4 py-4">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
                      MZ
                    </div>
                    <div>
                      <div class="font-semibold">Mutia Zahra</div>
                      <div class="text-xs text-slate-500">ID: 2024001</div>
                    </div>
                  </div>
                </td>
                <td class="px-4 py-4 font-mono">12345</td>
                <td class="px-4 py-4">
                  <span class="badge bg-blue-100 text-blue-700">XI RPL 1</span>
                </td>
                <td class="px-4 py-4">
                  <span class="badge bg-green-100 text-green-700 flex items-center gap-1">
                    <i class="ph-check-circle"></i> Aktif
                  </span>
                </td>
                <td class="px-4 py-4">
                  <span class="px-2 py-1 bg-amber-100 text-amber-700 rounded-full text-xs font-semibold">3x</span>
                </td>
                <td class="px-4 py-4">
                  <span class="px-2 py-1 bg-sky-100 text-sky-700 rounded-full text-xs font-semibold">1x</span>
                </td>
                <td class="px-4 py-4 text-xs text-slate-500">2 jam lalu</td>
                <td class="px-4 py-4">
                  <div class="flex gap-1" onclick="event.stopPropagation()">
                    <button class="action-btn px-2 py-1 rounded-lg bg-blue-50 hover:bg-blue-100 text-blue-600 transition-all" title="Detail">
                      <i class="ph-eye"></i>
                    </button>
                    <button class="action-btn px-2 py-1 rounded-lg bg-yellow-50 hover:bg-yellow-100 text-yellow-600 transition-all" title="Edit">
                      <i class="ph-pencil"></i>
                    </button>
                    <button class="action-btn px-2 py-1 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 transition-all" title="Blokir" onclick="toggleBlokir(event, 1, 'Mutia Zahra')">
                      <i class="ph-prohibit"></i>
                    </button>
                    <button class="action-btn px-2 py-1 rounded-lg bg-green-50 hover:bg-green-100 text-green-600 transition-all" title="Reset Password">
                      <i class="ph-key"></i>
                    </button>
                  </div>
                </td>
              </tr>

              <tr class="transition-all duration-200 cursor-pointer" onclick="openDetail(2)" data-student-id="2" data-status="warning" data-kelas="XI RPL 1">
                <td class="px-4 py-4">
                  <input type="checkbox" class="student-checkbox rounded" onclick="event.stopPropagation()" data-id="2">
                </td>
                <td class="px-4 py-4">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
                      BS
                    </div>
                    <div>
                      <div class="font-semibold">Budi Santoso</div>
                      <div class="text-xs text-slate-500">ID: 2024002</div>
                    </div>
                  </div>
                </td>
                <td class="px-4 py-4 font-mono">12346</td>
                <td class="px-4 py-4">
                  <span class="badge bg-blue-100 text-blue-700">XI RPL 1</span>
                </td>
                <td class="px-4 py-4">
                  <span class="badge bg-yellow-100 text-yellow-700 flex items-center gap-1">
                    <i class="ph-warning"></i> Warning
                  </span>
                </td>
                <td class="px-4 py-4">
                  <span class="px-2 py-1 bg-red-100 text-red-700 rounded-full text-xs font-semibold">8x</span>
                </td>
                <td class="px-4 py-4">
                  <span class="px-2 py-1 bg-sky-100 text-sky-700 rounded-full text-xs font-semibold">2x</span>
                </td>
                <td class="px-4 py-4 text-xs text-slate-500">1 hari lalu</td>
                <td class="px-4 py-4">
                  <div class="flex gap-1" onclick="event.stopPropagation()">
                    <button class="action-btn px-2 py-1 rounded-lg bg-blue-50 hover:bg-blue-100 text-blue-600 transition-all" title="Detail">
                      <i class="ph-eye"></i>
                    </button>
                    <button class="action-btn px-2 py-1 rounded-lg bg-yellow-50 hover:bg-yellow-100 text-yellow-600 transition-all" title="Edit">
                      <i class="ph-pencil"></i>
                    </button>
                    <button class="action-btn px-2 py-1 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 transition-all" title="Blokir" onclick="toggleBlokir(event, 2, 'Budi Santoso')">
                      <i class="ph-prohibit"></i>
                    </button>
                    <button class="action-btn px-2 py-1 rounded-lg bg-green-50 hover:bg-green-100 text-green-600 transition-all" title="Reset Password">
                      <i class="ph-key"></i>
                    </button>
                  </div>
                </td>
              </tr>

              <tr class="transition-all duration-200 cursor-pointer" onclick="openDetail(3)" data-student-id="3" data-status="blokir" data-kelas="XI RPL 2">
                <td class="px-4 py-4">
                  <input type="checkbox" class="student-checkbox rounded" onclick="event.stopPropagation()" data-id="3">
                </td>
                <td class="px-4 py-4">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-rose-400 to-rose-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
                      SW
                    </div>
                    <div>
                      <div class="font-semibold">Siti Wulandari</div>
                      <div class="text-xs text-slate-500">ID: 2024003</div>
                    </div>
                  </div>
                </td>
                <td class="px-4 py-4 font-mono">12347</td>
                <td class="px-4 py-4">
                  <span class="badge bg-purple-100 text-purple-700">XI RPL 2</span>
                </td>
                <td class="px-4 py-4">
                  <span class="badge bg-red-100 text-red-700 flex items-center gap-1">
                    <i class="ph-x-circle"></i> Blokir
                  </span>
                </td>
                <td class="px-4 py-4">
                  <span class="px-2 py-1 bg-red-100 text-red-700 rounded-full text-xs font-semibold">12x</span>
                </td>
                <td class="px-4 py-4">
                  <span class="px-2 py-1 bg-red-100 text-red-700 rounded-full text-xs font-semibold">0x</span>
                </td>
                <td class="px-4 py-4 text-xs text-slate-500">5 hari lalu</td>
                <td class="px-4 py-4">
                  <div class="flex gap-1" onclick="event.stopPropagation()">
                    <button class="action-btn px-2 py-1 rounded-lg bg-blue-50 hover:bg-blue-100 text-blue-600 transition-all" title="Detail">
                      <i class="ph-eye"></i>
                    </button>
                    <button class="action-btn px-2 py-1 rounded-lg bg-yellow-50 hover:bg-yellow-100 text-yellow-600 transition-all" title="Edit">
                      <i class="ph-pencil"></i>
                    </button>
                    <button class="action-btn px-2 py-1 rounded-lg bg-green-50 hover:bg-green-100 text-green-600 transition-all" title="Aktifkan" onclick="toggleBlokir(event, 3, 'Siti Wulandari')">
                      <i class="ph-check-circle"></i>
                    </button>
                    <button class="action-btn px-2 py-1 rounded-lg bg-green-50 hover:bg-green-100 text-green-600 transition-all" title="Reset Password">
                      <i class="ph-key"></i>
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between mt-6 p-4 bg-slate-50 rounded-lg">
          <div class="text-sm text-slate-600">
            Menampilkan <span id="showingFrom">1</span> - <span id="showingTo">10</span> dari <span id="totalRecords">150</span> siswa
          </div>
          <div class="flex items-center gap-2">
            <button id="prevPage" class="px-3 py-2 bg-white border rounded-lg hover:bg-gray-50 transition-all disabled:opacity-50" disabled>
              <i class="ph-caret-left"></i>
            </button>
            <div class="flex gap-1">
              <button class="px-3 py-2 bg-sky-600 text-white rounded-lg">1</button>
              <button class="px-3 py-2 bg-white border rounded-lg hover:bg-gray-50">2</button>
              <button class="px-3 py-2 bg-white border rounded-lg hover:bg-gray-50">3</button>
              <span class="px-3 py-2">...</span>
              <button class="px-3 py-2 bg-white border rounded-lg hover:bg-gray-50">15</button>
            </div>
            <button id="nextPage" class="px-3 py-2 bg-white border rounded-lg hover:bg-gray-50 transition-all">
              <i class="ph-caret-right"></i>
            </button>
          </div>
        </div>
      </section>

      <!-- 📱 MOBILE CARDS -->
      <section class="mobile-cards">
        <div class="space-y-4 mb-8" id="studentCards">
          <!-- Sample mobile cards -->
          <div class="student-card rounded-2xl p-5 border animate-slideIn" data-student-id="1" onclick="openDetail(1)">
            <div class="flex items-center gap-4 mb-4">
              <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-600 rounded-2xl flex items-center justify-center text-white font-bold text-lg">
                MZ
              </div>
              <div class="flex-1">
                <div class="font-bold text-lg">Mutia Zahra</div>
                <div class="text-sm text-slate-500 flex items-center gap-2">
                  <span>NIS: 12345</span>
                  <span>•</span>
                  <span class="badge bg-blue-100 text-blue-700">XI RPL 1</span>
                </div>
              </div>
              <div class="text-right">
                <span class="badge bg-green-100 text-green-700 flex items-center gap-1">
                  <i class="ph-check-circle"></i> Aktif
                </span>
              </div>
            </div>
            
            <div class="grid grid-cols-3 gap-4 mb-4">
              <div class="text-center">
                <div class="text-2xl font-bold text-amber-600">3</div>
                <div class="text-xs text-slate-500">Telat</div>
              </div>
              <div class="text-center">
                <div class="text-2xl font-bold text-sky-600">1</div>
                <div class="text-xs text-slate-500">Izin</div>
              </div>
              <div class="text-center">
                <div class="text-2xl font-bold text-green-600">95%</div>
                <div class="text-xs text-slate-500">Kehadiran</div>
              </div>
            </div>
            
            <div class="flex justify-between items-center">
              <div class="text-xs text-slate-500">
                <i class="ph-clock"></i> Login terakhir: 2 jam lalu
              </div>
              <div class="flex gap-2" onclick="event.stopPropagation()">
                <button class="action-btn px-3 py-2 bg-blue-50 text-blue-600 rounded-lg">
                  <i class="ph-eye"></i>
                </button>
                <button class="action-btn px-3 py-2 bg-yellow-50 text-yellow-600 rounded-lg">
                  <i class="ph-pencil"></i>
                </button>
                <button class="action-btn px-3 py-2 bg-red-50 text-red-600 rounded-lg" onclick="toggleBlokir(event, 1, 'Mutia Zahra')">
                  <i class="ph-prohibit"></i>
                </button>
              </div>
            </div>
          </div>

          <div class="student-card rounded-2xl p-5 border animate-slideIn" data-student-id="2" onclick="openDetail(2)" style="animation-delay: 0.1s">
            <div class="flex items-center gap-4 mb-4">
              <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-2xl flex items-center justify-center text-white font-bold text-lg">
                BS
              </div>
              <div class="flex-1">
                <div class="font-bold text-lg">Budi Santoso</div>
                <div class="text-sm text-slate-500 flex items-center gap-2">
                  <span>NIS: 12346</span>
                  <span>•</span>
                  <span class="badge bg-blue-100 text-blue-700">XI RPL 1</span>
                </div>
              </div>
              <div class="text-right">
                <span class="badge bg-yellow-100 text-yellow-700 flex items-center gap-1">
                  <i class="ph-warning"></i> Warning
                </span>
              </div>
            </div>
            
            <div class="grid grid-cols-3 gap-4 mb-4">
              <div class="text-center">
                <div class="text-2xl font-bold text-red-600">8</div>
                <div class="text-xs text-slate-500">Telat</div>
              </div>
              <div class="text-center">
                <div class="text-2xl font-bold text-sky-600">2</div>
                <div class="text-xs text-slate-500">Izin</div>
              </div>
              <div class="text-center">
                <div class="text-2xl font-bold text-yellow-600">78%</div>
                <div class="text-xs text-slate-500">Kehadiran</div>
              </div>
            </div>
            
            <div class="flex justify-between items-center">
              <div class="text-xs text-slate-500">
                <i class="ph-clock"></i> Login terakhir: 1 hari lalu
              </div>
              <div class="flex gap-2" onclick="event.stopPropagation()">
                <button class="action-btn px-3 py-2 bg-blue-50 text-blue-600 rounded-lg">
                  <i class="ph-eye"></i>
                </button>
                <button class="action-btn px-3 py-2 bg-yellow-50 text-yellow-600 rounded-lg">
                  <i class="ph-pencil"></i>
                </button>
                <button class="action-btn px-3 py-2 bg-red-50 text-red-600 rounded-lg" onclick="toggleBlokir(event, 2, 'Budi Santoso')">
                  <i class="ph-prohibit"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- 📊 ANALYTICS CHARTS -->
      <section class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <div class="glass rounded-2xl p-6 card-hover">
          <div class="flex items-center justify-between mb-4">
            <h3 class="font-bold text-lg flex items-center gap-2">
              <i class="ph-chart-pie-slice text-rose-600"></i>
              Status Akun Siswa
            </h3>
            <div class="text-sm text-slate-500">Total: 150</div>
          </div>
         <canvas id="statusPieChart" class="w-full" style="height: 200px !important; max-height: 200px;"></canvas>
        </div>

        <div class="glass rounded-2xl p-6 card-hover">
          <div class="flex items-center justify-between mb-4">
            <h3 class="font-bold text-lg flex items-center gap-2">
              <i class="ph-chart-bar text-sky-600"></i>
              Distribusi Per Kelas
            </h3>
            <select class="px-3 py-1 rounded-lg border text-sm">
              <option>Semester Ini</option>
              <option>Bulan Ini</option>
            </select>
          </div>
          <canvas id="kelasBarChart" class="w-full" style="height: 200px !important; max-height: 200px;"></canvas>
        </div>

        <div class="glass rounded-2xl p-6 card-hover lg:col-span-2">
          <div class="flex items-center justify-between mb-4">
            <h3 class="font-bold text-lg flex items-center gap-2">
              <i class="ph-chart-line text-amber-600"></i>
              Trend Keterlambatan & Kehadiran
            </h3>
            <div class="flex gap-2">
              <button class="px-3 py-1 bg-sky-100 text-sky-700 rounded-lg text-sm">7 Hari</button>
              <button class="px-3 py-1 hover:bg-gray-100 rounded-lg text-sm">30 Hari</button>
              <button class="px-3 py-1 hover:bg-gray-100 rounded-lg text-sm">90 Hari</button>
            </div>
          </div>
          <canvas id="trendChart" class="w-full" style="height: 250px !important; max-height: 250px;"></canvas>
        </div>
      </section>

      <!-- 📈 QUICK INSIGHTS -->
      <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="glass rounded-2xl p-6 card-hover">
          <h3 class="font-bold text-lg mb-4 flex items-center gap-2">
            <i class="ph-trophy text-amber-500"></i>
            Siswa Terbaik Bulan Ini
          </h3>
          <div class="space-y-3">
            <div class="flex items-center gap-3 p-3 bg-gradient-to-r from-amber-50 to-yellow-50 rounded-lg">
              <div class="w-8 h-8 bg-gradient-to-br from-amber-400 to-amber-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
                1
              </div>
              <div class="flex-1">
                <div class="font-semibold">Mutia Zahra</div>
                <div class="text-xs text-slate-500">100% kehadiran</div>
              </div>
            </div>
            <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
              <div class="w-8 h-8 bg-gradient-to-br from-gray-400 to-gray-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
                2
              </div>
              <div class="flex-1">
                <div class="font-semibold">Ahmad Rahman</div>
                <div class="text-xs text-slate-500">98% kehadiran</div>
              </div>
            </div>
            <div class="flex items-center gap-3 p-3 bg-orange-50 rounded-lg">
              <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
                3
              </div>
              <div class="flex-1">
                <div class="font-semibold">Dewi Sari</div>
                <div class="text-xs text-slate-500">97% kehadiran</div>
              </div>
            </div>
          </div>
        </div>

        <div class="glass rounded-2xl p-6 card-hover">
          <h3 class="font-bold text-lg mb-4 flex items-center gap-2">
            <i class="ph-warning text-red-500"></i>
            Perlu Perhatian
          </h3>
          <div class="space-y-3">
            <div class="p-3 bg-red-50 rounded-lg border-l-4 border-red-400">
              <div class="font-semibold text-red-800">Siti Wulandari</div>
              <div class="text-xs text-red-600">Telat 12x bulan ini</div>
            </div>
            <div class="p-3 bg-yellow-50 rounded-lg border-l-4 border-yellow-400">
              <div class="font-semibold text-yellow-800">Budi Santoso</div>
              <div class="text-xs text-yellow-600">Telat 8x bulan ini</div>
            </div>
            <div class="p-3 bg-orange-50 rounded-lg border-l-4 border-orange-400">
              <div class="font-semibold text-orange-800">Rian Pratama</div>
              <div class="text-xs text-orange-600">Telat 6x bulan ini</div>
            </div>
          </div>
        </div>

        <div class="glass rounded-2xl p-6 card-hover">
          <h3 class="font-bold text-lg mb-4 flex items-center gap-2">
            <i class="ph-calendar-check text-green-500"></i>
            Aktivitas Terbaru
          </h3>
          <div class="space-y-3 text-sm">
            <div class="flex items-start gap-3">
              <div class="w-2 h-2 bg-green-500 rounded-full mt-2"></div>
              <div>
                <div class="font-medium">Mutia Zahra masuk tepat waktu</div>
                <div class="text-xs text-slate-500">2 menit lalu</div>
              </div>
            </div>
            <div class="flex items-start gap-3">
              <div class="w-2 h-2 bg-amber-500 rounded-full mt-2"></div>
              <div>
                <div class="font-medium">Ahmad Rahman terlambat 5 menit</div>
                <div class="text-xs text-slate-500">15 menit lalu</div>
              </div>
            </div>
            <div class="flex items-start gap-3">
              <div class="w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
              <div>
                <div class="font-medium">Dewi Sari mengajukan izin</div>
                <div class="text-xs text-slate-500">1 jam lalu</div>
              </div>
            </div>
            <div class="flex items-start gap-3">
              <div class="w-2 h-2 bg-red-500 rounded-full mt-2"></div>
              <div>
                <div class="font-medium">Akun Rian Pratama diblokir</div>
                <div class="text-xs text-slate-500">2 jam lalu</div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </main>
  </div>

  <!-- 🔎 ENHANCED MODAL DETAIL SISWA -->
  <div id="modalDetail" class="modal-backdrop">
    <div class="modal-card animate-scaleIn">
      <div class="flex items-center justify-between mb-6">
        <h2 class="font-bold text-2xl flex items-center gap-3">
          <i class="ph-user-circle text-sky-600"></i>
          Detail Siswa
        </h2>
        <button onclick="closeDetail()" class="p-2 hover:bg-gray-100 rounded-lg transition-all">
          <i class="ph-x text-xl"></i>
        </button>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Profile Section -->
        <div class="lg:col-span-1">
          <div class="text-center mb-6">
            <div class="w-32 h-32 bg-gradient-to-br from-sky-400 to-sky-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
              <i class="ph-user text-6xl text-white"></i>
            </div>
            <h3 id="detailNama" class="font-bold text-xl mb-1">-</h3>
            <p id="detailNIS" class="text-slate-500 font-mono">-</p>
            <span id="detailStatusBadge" class="badge bg-green-100 text-green-700 mt-2">Aktif</span>
          </div>

          <div class="space-y-4">
            <div class="p-4 bg-slate-50 rounded-lg">
              <div class="text-xs text-slate-500 mb-1">Kelas</div>
              <div id="detailKelas" class="font-semibold">-</div>
            </div>
            <div class="p-4 bg-slate-50 rounded-lg">
              <div class="text-xs text-slate-500 mb-1">Kontak</div>
              <div id="detailKontak" class="font-semibold">-</div>
            </div>
            <div class="p-4 bg-slate-50 rounded-lg">
              <div class="text-xs text-slate-500 mb-1">Email</div>
              <div id="detailEmail" class="font-semibold">-</div>
            </div>
            <div class="p-4 bg-slate-50 rounded-lg">
              <div class="text-xs text-slate-500 mb-1">Bergabung</div>
              <div id="detailJoinDate" class="font-semibold">-</div>
            </div>
          </div>
        </div>

        <!-- Stats & Activity Section -->
        <div class="lg:col-span-2">
          <!-- Quick Stats -->
          <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            <div class="text-center p-4 bg-green-50 rounded-lg">
              <div class="text-2xl font-bold text-green-600" id="detailKehadiran">95%</div>
              <div class="text-xs text-green-600">Kehadiran</div>
            </div>
            <div class="text-center p-4 bg-amber-50 rounded-lg">
              <div class="text-2xl font-bold text-amber-600" id="detailTelat">3</div>
              <div class="text-xs text-amber-600">Telat</div>
            </div>
            <div class="text-center p-4 bg-sky-50 rounded-lg">
              <div class="text-2xl font-bold text-sky-600" id="detailIzin">1</div>
              <div class="text-xs text-sky-600">Izin</div>
            </div>
            <div class="text-center p-4 bg-purple-50 rounded-lg">
              <div class="text-2xl font-bold text-purple-600" id="detailPoin">85</div>
              <div class="text-xs text-purple-600">Poin</div>
            </div>
          </div>

          <!-- Tabs -->
          <div class="mb-4">
            <div class="flex border-b">
              <button class="tab-btn px-4 py-2 font-semibold text-sky-600 border-b-2 border-sky-600" data-tab="statistik">
                Statistik
              </button>
              <button class="tab-btn px-4 py-2 text-slate-500 hover:text-slate-700" data-tab="riwayat">
                Riwayat
              </button>
              <button class="tab-btn px-4 py-2 text-slate-500 hover:text-slate-700" data-tab="pengaturan">
                Pengaturan
              </button>
            </div>
          </div>

          <!-- Tab Content -->
          <div class="tab-content">
            <!-- Statistik Tab -->
            <div id="tab-statistik" class="tab-pane active">
              <div class="space-y-4">
                <div class="p-4 border rounded-lg">
                  <h4 class="font-semibold mb-3 flex items-center gap-2">
                    <i class="ph-chart-line text-sky-600"></i>
                    Kehadiran 30 Hari Terakhir
                  </h4>
                  <canvas id="attendanceChart" class="w-full" style="height: 80px !important; max-height: 80px;"></canvas>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div class="p-4 border rounded-lg">
                    <h4 class="font-semibold mb-3">Statistik Izin</h4>
                    <ul class="space-y-2 text-sm">
                      <li class="flex justify-between">
                        <span>Disetujui:</span>
                        <span class="font-semibold text-green-600" id="detailIzinAcc">5x</span>
                      </li>
                      <li class="flex justify-between">
                        <span>Ditolak:</span>
                        <span class="font-semibold text-red-600" id="detailIzinReject">1x</span>
                      </li>
                      <li class="flex justify-between">
                        <span>Menunggu:</span>
                        <span class="font-semibold text-amber-600" id="detailIzinPending">0x</span>
                      </li>
                    </ul>
                  </div>

                  <div class="p-4 border rounded-lg">
                    <h4 class="font-semibold mb-3">Keterlambatan</h4>
                    <ul class="space-y-2 text-sm">
                      <li class="flex justify-between">
                        <span>Bulan ini:</span>
                        <span class="font-semibold text-amber-600" id="detailTelatBulan">3x</span>
                      </li>
                      <li class="flex justify-between">
                        <span>Total:</span>
                        <span class="font-semibold text-amber-600" id="detailTelatTotal">12x</span>
                      </li>
                      <li class="flex justify-between">
                        <span>Rata-rata:</span>
                        <span class="font-semibold text-amber-600" id="detailTelatAvg">8 menit</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <!-- Riwayat Tab -->
            <div id="tab-riwayat" class="tab-pane hidden">
              <div class="space-y-4 max-h-96 overflow-y-auto">
                <div class="p-4 border-l-4 border-green-400 bg-green-50 rounded-lg">
                  <div class="flex justify-between items-start">
                    <div>
                      <div class="font-semibold text-green-800">Hadir Tepat Waktu</div>
                      <div class="text-sm text-green-600">Masuk pukul 07:15</div>
                    </div>
                    <div class="text-xs text-green-500">Hari ini</div>
                  </div>
                </div>

                <div class="p-4 border-l-4 border-amber-400 bg-amber-50 rounded-lg">
                  <div class="flex justify-between items-start">
                    <div>
                      <div class="font-semibold text-amber-800">Terlambat 5 Menit</div>
                      <div class="text-sm text-amber-600">Masuk pukul 07:35</div>
                    </div>
                    <div class="text-xs text-amber-500">Kemarin</div>
                  </div>
                </div>

                <div class="p-4 border-l-4 border-blue-400 bg-blue-50 rounded-lg">
                  <div class="flex justify-between items-start">
                    <div>
                      <div class="font-semibold text-blue-800">Izin Sakit Disetujui</div>
                      <div class="text-sm text-blue-600">Dokter keluarga</div>
                    </div>
                    <div class="text-xs text-blue-500">3 hari lalu</div>
                  </div>
                </div>

                <div class="p-4 border-l-4 border-red-400 bg-red-50 rounded-lg">
                  <div class="flex justify-between items-start">
                    <div>
                      <div class="font-semibold text-red-800">Izin Terlambat Ditolak</div>
                      <div class="text-sm text-red-600">Alasan tidak jelas</div>
                    </div>
                    <div class="text-xs text-red-500">1 minggu lalu</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pengaturan Tab -->
            <div id="tab-pengaturan" class="tab-pane hidden">
              <div class="space-y-6">
                <div class="p-4 border rounded-lg">
                  <h4 class="font-semibold mb-4">Aksi Cepat</h4>
                  <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    <button class="p-3 bg-yellow-50 hover:bg-yellow-100 text-yellow-700 rounded-lg transition-all text-sm">
                      <i class="ph-pencil text-lg mb-1"></i>
                      <div>Edit Data</div>
                    </button>
                    <button class="p-3 bg-green-50 hover:bg-green-100 text-green-700 rounded-lg transition-all text-sm">
                      <i class="ph-key text-lg mb-1"></i>
                      <div>Reset Password</div>
                    </button>
                    <button class="p-3 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded-lg transition-all text-sm">
                      <i class="ph-bell text-lg mb-1"></i>
                      <div>Notifikasi</div>
                    </button>
                    <button class="p-3 bg-red-50 hover:bg-red-100 text-red-700 rounded-lg transition-all text-sm">
                      <i class="ph-prohibit text-lg mb-1"></i>
                      <div>Blokir Akun</div>
                    </button>
                  </div>
                </div>

                <div class="p-4 border rounded-lg">
                  <h4 class="font-semibold mb-4">Pengaturan Notifikasi</h4>
                  <div class="space-y-3">
                    <label class="flex items-center justify-between">
                      <span class="text-sm">Notifikasi keterlambatan</span>
                      <input type="checkbox" class="rounded" checked>
                    </label>
                    <label class="flex items-center justify-between">
                      <span class="text-sm">Email laporan mingguan</span>
                      <input type="checkbox" class="rounded">
                    </label>
                    <label class="flex items-center justify-between">
                      <span class="text-sm">SMS peringatan</span>
                      <input type="checkbox" class="rounded" checked>
                    </label>
                  </div>
                </div>

                <div class="p-4 border border-red-200 bg-red-50 rounded-lg">
                  <h4 class="font-semibold text-red-800 mb-2">Zona Bahaya</h4>
                  <p class="text-sm text-red-600 mb-4">Aksi berikut tidak dapat dibatalkan</p>
                  <button class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-all text-sm">
                    Hapus Akun Siswa
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="flex justify-end gap-3 mt-8 pt-6 border-t">
        <button onclick="closeDetail()" class="px-6 py-3 border rounded-lg hover:bg-gray-50 transition-all">
          Tutup
        </button>
        <button class="px-6 py-3 bg-sky-600 hover:bg-sky-700 text-white rounded-lg transition-all">
          Simpan Perubahan
        </button>
      </div>
    </div>
  </div>

  <!-- ✅ ENHANCED TOAST NOTIFICATION -->
  <div id="toast" class="fixed bottom-6 right-6 hidden z-50 animate-slideIn">
    <div class="bg-white shadow-xl rounded-2xl px-6 py-4 flex items-start gap-4 border-l-4 border-sky-600 min-w-80">
      <div class="flex-shrink-0">
        <div id="toastIcon" class="w-8 h-8 bg-sky-100 rounded-full flex items-center justify-center">
          <i class="ph-check-circle text-sky-600"></i>
        </div>
      </div>
      <div class="flex-1">
        <h4 id="toastTitle" class="font-bold text-slate-800 mb-1">Berhasil!</h4>
        <p id="toastMsg" class="text-slate-600 text-sm">Aksi berhasil dilakukan</p>
      </div>
      <button onclick="hideToast()" class="text-slate-400 hover:text-slate-600">
        <i class="ph-x"></i>
      </button>
    </div>
  </div>

  <!-- Loading Overlay -->
  <div id="loadingOverlay" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50">
    <div class="bg-white rounded-2xl p-8 flex flex-col items-center gap-4">
      <div class="loading-spinner"></div>
      <div class="font-semibold">Memuat data...</div>
    </div>
  </div>

  <!-- Floating Action Button -->
  <div class="fixed right-6 bottom-6 flex flex-col gap-3 z-40">
    <button id="scrollToTop" class="hidden w-12 h-12 bg-sky-600 hover:bg-sky-700 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300" title="Kembali ke atas">
      <i class="ph-arrow-up text-xl"></i>
    </button>
    <button id="darkToggle" class="w-12 h-12 bg-slate-800 hover:bg-slate-700 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300" title="Toggle Dark Mode">
      <i class="ph-moon text-xl"></i>
    </button>
  </div>

  <!-- JavaScript -->
  <script>
    // Sample data with enhanced student information
    const studentsData = [
      {
        id: 1,
        nama: 'Mutia Zahra',
        nis: '12345',
        kelas: 'XI RPL 1',
        status: 'aktif',
        telat: 3,
        izin: 1,
        kehadiran: 95,
        email: 'mutia.zahra@student.sch.id',
        kontak: '081234567890',
        joinDate: '2024-07-15',
        lastLogin: '2 jam lalu',
        avatar: 'MZ',
        avatarColor: 'from-purple-400 to-purple-600'
      },
      {
        id: 2,
        nama: 'Budi Santoso',
        nis: '12346',
        kelas: 'XI RPL 1',
        status: 'warning',
        telat: 8,
        izin: 2,
        kehadiran: 78,
        email: 'budi.santoso@student.sch.id',
        kontak: '081234567891',
        joinDate: '2024-07-15',
        lastLogin: '1 hari lalu',
        avatar: 'BS',
        avatarColor: 'from-green-400 to-green-600'
      },
      {
        id: 3,
        nama: 'Siti Wulandari',
        nis: '12347',
        kelas: 'XI RPL 2',
        status: 'blokir',
        telat: 12,
        izin: 0,
        kehadiran: 65,
        email: 'siti.wulandari@student.sch.id',
        kontak: '081234567892',
        joinDate: '2024-07-15',
        lastLogin: '5 hari lalu',
        avatar: 'SW',
        avatarColor: 'from-rose-400 to-rose-600'
      }
    ];

    let currentStudents = [...studentsData];
    let selectedStudents = [];
    let currentSort = { field: null, direction: 'asc' };

    // Mobile menu toggle
    document.getElementById('btnMobileMenu')?.addEventListener('click', function() {
      const menu = document.getElementById('mobileMenu');
      menu.classList.toggle('hidden');
    });

    // Clock update
    function updateClocks() {
      const now = new Date();
      const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
      const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      
      const timeString = now.toLocaleTimeString('id-ID', timeOptions);
      const dateString = now.toLocaleDateString('id-ID', dateOptions);
      
      document.getElementById('clockTop').textContent = timeString;
      document.getElementById('clockDateTop').textContent = dateString;
    }
    
    setInterval(updateClocks, 1000);
    updateClocks();

    // Enhanced search and filter
    function applyFilters() {
      const search = document.getElementById('searchSiswa').value.toLowerCase();
      const kelas = document.getElementById('filterKelas').value;
      const status = document.getElementById('filterStatus').value;
      const telat = document.getElementById('filterTelat').value;
      
      currentStudents = studentsData.filter(student => {
        const matchSearch = !search || 
          student.nama.toLowerCase().includes(search) || 
          student.nis.includes(search) || 
          student.kelas.toLowerCase().includes(search);
        
        const matchKelas = !kelas || student.kelas === kelas;
        const matchStatus = !status || student.status === status;
        
        let matchTelat = true;
        if (telat) {
          if (telat === '0') matchTelat = student.telat === 0;
          else if (telat === '1-5') matchTelat = student.telat >= 1 && student.telat <= 5;
          else if (telat === '6-10') matchTelat = student.telat >= 6 && student.telat <= 10;
          else if (telat === '11+') matchTelat = student.telat > 10;
        }
        
        return matchSearch && matchKelas && matchStatus && matchTelat;
      });
      
      renderStudentTable();
      renderMobileCards();
      updateStats();
    }

    // Sort functionality
    function sortTable(field) {
      if (currentSort.field === field) {
        currentSort.direction = currentSort.direction === 'asc' ? 'desc' : 'asc';
      } else {
        currentSort.field = field;
        currentSort.direction = 'asc';
      }
      
      currentStudents.sort((a, b) => {
        let aVal = a[field];
        let bVal = b[field];
        
        if (field === 'nama') {
          return currentSort.direction === 'asc' 
            ? aVal.localeCompare(bVal) 
            : bVal.localeCompare(aVal);
        } else if (field === 'telat' || field === 'izin') {
          return currentSort.direction === 'asc' ? aVal - bVal : bVal - aVal;
        }
        
        return 0;
      });
      
      renderStudentTable();
    }

    // Render student table
    function renderStudentTable() {
      const tbody = document.getElementById('studentTableBody');
      if (!tbody) return;

      tbody.innerHTML = currentStudents.map(student => `
        <tr class="transition-all duration-200 cursor-pointer hover:bg-gradient-to-r hover:from-sky-50 hover:to-blue-50" 
            onclick="openDetail(${student.id})" data-student-id="${student.id}" data-status="${student.status}" data-kelas="${student.kelas}">
          <td class="px-4 py-4">
            <input type="checkbox" class="student-checkbox rounded" onclick="event.stopPropagation()" data-id="${student.id}">
          </td>
          <td class="px-4 py-4">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 bg-gradient-to-br ${student.avatarColor} rounded-full flex items-center justify-center text-white font-bold text-sm">
                ${student.avatar}
              </div>
              <div>
                <div class="font-semibold">${student.nama}</div>
                <div class="text-xs text-slate-500">ID: 2024${student.id.toString().padStart(3, '0')}</div>
              </div>
            </div>
          </td>
          <td class="px-4 py-4 font-mono">${student.nis}</td>
          <td class="px-4 py-4">
            <span class="badge ${student.kelas.includes('RPL 1') ? 'bg-blue-100 text-blue-700' : 'bg-purple-100 text-purple-700'}">${student.kelas}</span>
          </td>
          <td class="px-4 py-4">
            <span class="badge ${getStatusBadgeClass(student.status)} flex items-center gap-1">
              <i class="${getStatusIcon(student.status)}"></i> ${getStatusText(student.status)}
            </span>
          </td>
          <td class="px-4 py-4">
            <span class="px-2 py-1 ${student.telat > 5 ? 'bg-red-100 text-red-700' : 'bg-amber-100 text-amber-700'} rounded-full text-xs font-semibold">${student.telat}x</span>
          </td>
          <td class="px-4 py-4">
            <span class="px-2 py-1 bg-sky-100 text-sky-700 rounded-full text-xs font-semibold">${student.izin}x</span>
          </td>
          <td class="px-4 py-4 text-xs text-slate-500">${student.lastLogin}</td>
          <td class="px-4 py-4">
            <div class="flex gap-1" onclick="event.stopPropagation()">
              <button class="action-btn px-2 py-1 rounded-lg bg-blue-50 hover:bg-blue-100 text-blue-600 transition-all" title="Detail">
                <i class="ph-eye"></i>
              </button>
              <button class="action-btn px-2 py-1 rounded-lg bg-yellow-50 hover:bg-yellow-100 text-yellow-600 transition-all" title="Edit">
                <i class="ph-pencil"></i>
              </button>
              <button class="action-btn px-2 py-1 rounded-lg ${student.status === 'blokir' ? 'bg-green-50 hover:bg-green-100 text-green-600' : 'bg-red-50 hover:bg-red-100 text-red-600'} transition-all" 
                      title="${student.status === 'blokir' ? 'Aktifkan' : 'Blokir'}" onclick="toggleBlokir(event, ${student.id}, '${student.nama}')">
                <i class="${student.status === 'blokir' ? 'ph-check-circle' : 'ph-prohibit'}"></i>
              </button>
              <button class="action-btn px-2 py-1 rounded-lg bg-green-50 hover:bg-green-100 text-green-600 transition-all" title="Reset Password">
                <i class="ph-key"></i>
              </button>
            </div>
          </td>
        </tr>
      `).join('');

      // Update checkbox listeners
      updateCheckboxListeners();
    }

    // Render mobile cards
    function renderMobileCards() {
      const container = document.getElementById('studentCards');
      if (!container) return;

      container.innerHTML = currentStudents.map((student, index) => `
        <div class="student-card rounded-2xl p-5 border animate-slideIn" data-student-id="${student.id}" onclick="openDetail(${student.id})" style="animation-delay: ${index * 0.1}s">
          <div class="flex items-center gap-4 mb-4">
            <div class="w-16 h-16 bg-gradient-to-br ${student.avatarColor} rounded-2xl flex items-center justify-center text-white font-bold text-lg">
              ${student.avatar}
            </div>
            <div class="flex-1">
              <div class="font-bold text-lg">${student.nama}</div>
              <div class="text-sm text-slate-500 flex items-center gap-2">
                <span>NIS: ${student.nis}</span>
                <span>•</span>
                <span class="badge ${student.kelas.includes('RPL 1') ? 'bg-blue-100 text-blue-700' : 'bg-purple-100 text-purple-700'}">${student.kelas}</span>
              </div>
            </div>
            <div class="text-right">
              <span class="badge ${getStatusBadgeClass(student.status)} flex items-center gap-1">
                <i class="${getStatusIcon(student.status)}"></i> ${getStatusText(student.status)}
              </span>
            </div>
          </div>
          
          <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="text-center">
              <div class="text-2xl font-bold ${student.telat > 5 ? 'text-red-600' : 'text-amber-600'}">${student.telat}</div>
              <div class="text-xs text-slate-500">Telat</div>
            </div>
            <div class="text-center">
              <div class="text-2xl font-bold text-sky-600">${student.izin}</div>
              <div class="text-xs text-slate-500">Izin</div>
            </div>
            <div class="text-center">
              <div class="text-2xl font-bold ${student.kehadiran > 90 ? 'text-green-600' : student.kehadiran > 75 ? 'text-yellow-600' : 'text-red-600'}">${student.kehadiran}%</div>
              <div class="text-xs text-slate-500">Kehadiran</div>
            </div>
          </div>
          
          <div class="flex justify-between items-center">
            <div class="text-xs text-slate-500">
              <i class="ph-clock"></i> Login terakhir: ${student.lastLogin}
            </div>
            <div class="flex gap-2" onclick="event.stopPropagation()">
              <button class="action-btn px-3 py-2 bg-blue-50 text-blue-600 rounded-lg">
                <i class="ph-eye"></i>
              </button>
              <button class="action-btn px-3 py-2 bg-yellow-50 text-yellow-600 rounded-lg">
                <i class="ph-pencil"></i>
              </button>
              <button class="action-btn px-3 py-2 ${student.status === 'blokir' ? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600'} rounded-lg" onclick="toggleBlokir(event, ${student.id}, '${student.nama}')">
                <i class="${student.status === 'blokir' ? 'ph-check-circle' : 'ph-prohibit'}"></i>
              </button>
            </div>
          </div>
        </div>
      `).join('');
    }

    // Helper functions for status styling
    function getStatusBadgeClass(status) {
      switch(status) {
        case 'aktif': return 'bg-green-100 text-green-700';
        case 'warning': return 'bg-yellow-100 text-yellow-700';
        case 'blokir': return 'bg-red-100 text-red-700';
        case 'pending': return 'bg-gray-100 text-gray-700';
        default: return 'bg-gray-100 text-gray-700';
      }
    }

    function getStatusIcon(status) {
      switch(status) {
        case 'aktif': return 'ph-check-circle';
        case 'warning': return 'ph-warning';
        case 'blokir': return 'ph-x-circle';
        case 'pending': return 'ph-clock';
        default: return 'ph-question';
      }
    }

    function getStatusText(status) {
      switch(status) {
        case 'aktif': return 'Aktif';
        case 'warning': return 'Warning';
        case 'blokir': return 'Blokir';
        case 'pending': return 'Pending';
        default: return 'Unknown';
      }
    }

    // Update statistics
    function updateStats() {
      const totalSiswa = currentStudents.length;
      const akunAktif = currentStudents.filter(s => s.status === 'aktif').length;
      const akunBlokir = currentStudents.filter(s => s.status === 'blokir').length;
      const avgTelat = Math.round(currentStudents.reduce((acc, s) => acc + s.telat, 0) / totalSiswa) || 0;
      
      document.getElementById('totalSiswa').textContent = totalSiswa;
      document.getElementById('akunAktif').textContent = akunAktif;
      document.getElementById('akunBlokir').textContent = akunBlokir;
      document.getElementById('avgTelat').textContent = avgTelat;
      document.getElementById('totalCount').textContent = `${totalSiswa} siswa`;
    }

    // Toggle block status
    function toggleBlokir(event, id, nama) {
      event.stopPropagation();
      const student = studentsData.find(s => s.id === id);
      if (!student) return;
      
      const isCurrentlyBlocked = student.status === 'blokir';
      const action = isCurrentlyBlocked ? 'aktifkan' : 'blokir';
      
      if (confirm(`Yakin ${action} akun ${nama}?`)) {
        showLoading();
        
        // Simulate API call
        setTimeout(() => {
          student.status = isCurrentlyBlocked ? 'aktif' : 'blokir';
          applyFilters();
          hideLoading();
          showToast(
            isCurrentlyBlocked ? 'Akun Diaktifkan' : 'Akun Diblokir',
            `Akun ${nama} berhasil ${isCurrentlyBlocked ? 'diaktifkan' : 'diblokir'}`,
            isCurrentlyBlocked ? 'success' : 'warning'
          );
        }, 1500);
      }
    }

    // Modal detail functionality
    function openDetail(id) {
      const student = studentsData.find(s => s.id === id);
      if (!student) return;
      
      // Populate modal with student data
      document.getElementById('detailNama').textContent = student.nama;
      document.getElementById('detailNIS').textContent = student.nis;
      document.getElementById('detailKelas').textContent = student.kelas;
      document.getElementById('detailKontak').textContent = student.kontak;
      document.getElementById('detailEmail').textContent = student.email;
      document.getElementById('detailJoinDate').textContent = new Date(student.joinDate).toLocaleDateString('id-ID');
      
      // Update status badge
      const statusBadge = document.getElementById('detailStatusBadge');
      statusBadge.className = `badge ${getStatusBadgeClass(student.status)} mt-2`;
      statusBadge.innerHTML = `<i class="${getStatusIcon(student.status)}"></i> ${getStatusText(student.status)}`;
      
      // Update stats
      document.getElementById('detailKehadiran').textContent = `${student.kehadiran}%`;
      document.getElementById('detailTelat').textContent = student.telat;
      document.getElementById('detailIzin').textContent = student.izin;
      document.getElementById('detailPoin').textContent = Math.floor(student.kehadiran * 0.9);
      
      // Show modal
      document.getElementById('modalDetail').style.display = 'flex';
      document.body.style.overflow = 'hidden';
    }

    function closeDetail() {
      document.getElementById('modalDetail').style.display = 'none';
      document.body.style.overflow = 'auto';
    }

    // Tab functionality
    document.addEventListener('click', function(e) {
      if (e.target.classList.contains('tab-btn')) {
        const tabId = e.target.getAttribute('data-tab');
        
        // Remove active class from all tabs
        document.querySelectorAll('.tab-btn').forEach(btn => {
          btn.classList.remove('text-sky-600', 'border-b-2', 'border-sky-600');
          btn.classList.add('text-slate-500');
        });
        
        // Add active class to clicked tab
        e.target.classList.remove('text-slate-500');
        e.target.classList.add('text-sky-600', 'border-b-2', 'border-sky-600');
        
        // Hide all tab panes
        document.querySelectorAll('.tab-pane').forEach(pane => {
          pane.classList.add('hidden');
          pane.classList.remove('active');
        });
        
        // Show selected tab pane
        const targetPane = document.getElementById(`tab-${tabId}`);
        if (targetPane) {
          targetPane.classList.remove('hidden');
          targetPane.classList.add('active');
        }
      }
    });

    // Checkbox functionality
    function updateCheckboxListeners() {
      const checkboxes = document.querySelectorAll('.student-checkbox');
      checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
          const studentId = parseInt(this.getAttribute('data-id'));
          if (this.checked) {
            if (!selectedStudents.includes(studentId)) {
              selectedStudents.push(studentId);
            }
          } else {
            selectedStudents = selectedStudents.filter(id => id !== studentId);
          }
          updateSelectedCount();
        });
      });
    }

    function updateSelectedCount() {
      const count = selectedStudents.length;
      document.getElementById('selectedCount').textContent = `${count} dipilih`;
      
      const bulkButtons = ['btnExportSelected', 'btnBulkBlock', 'btnBulkActivate'];
      bulkButtons.forEach(btnId => {
        const btn = document.getElementById(btnId);
        if (btn) {
          btn.disabled = count === 0;
          btn.classList.toggle('opacity-50', count === 0);
        }
      });
    }

    // Select all functionality
    document.getElementById('selectAll')?.addEventListener('change', function() {
      const isChecked = this.checked;
      const checkboxes = document.querySelectorAll('.student-checkbox');
      
      checkboxes.forEach(checkbox => {
        checkbox.checked = isChecked;
        const studentId = parseInt(checkbox.getAttribute('data-id'));
        if (isChecked && !selectedStudents.includes(studentId)) {
          selectedStudents.push(studentId);
        }
      });
      
      if (!isChecked) {
        selectedStudents = [];
      }
      
      updateSelectedCount();
    });

    // Filter event listeners
    document.getElementById('searchSiswa')?.addEventListener('input', applyFilters);
    document.getElementById('filterKelas')?.addEventListener('change', applyFilters);
    document.getElementById('filterStatus')?.addEventListener('change', applyFilters);
    document.getElementById('filterTelat')?.addEventListener('change', applyFilters);
    document.getElementById('filterTanggal')?.addEventListener('change', applyFilters);

    // Reset filters
    document.getElementById('btnResetFilter')?.addEventListener('click', function() {
      document.getElementById('searchSiswa').value = '';
      document.getElementById('filterKelas').value = '';
      document.getElementById('filterStatus').value = '';
      document.getElementById('filterTelat').value = '';
      document.getElementById('filterTanggal').value = '';
      applyFilters();
    });

    // Apply filters button
    document.getElementById('btnApplyFilter')?.addEventListener('click', applyFilters);

    // Toast notification system
    function showToast(title, message, type = 'success') {
      const toast = document.getElementById('toast');
      const toastIcon = document.getElementById('toastIcon');
      const toastTitle = document.getElementById('toastTitle');
      const toastMsg = document.getElementById('toastMsg');
      
      // Update content
      toastTitle.textContent = title;
      toastMsg.textContent = message;
      
      // Update styling based on type
      const iconClass = {
        success: 'ph-check-circle',
        warning: 'ph-warning',
        error: 'ph-x-circle',
        info: 'ph-info'
      }[type] || 'ph-check-circle';
      
      const colorClass = {
        success: 'text-green-600 bg-green-100',
        warning: 'text-amber-600 bg-amber-100',
        error: 'text-red-600 bg-red-100',
        info: 'text-blue-600 bg-blue-100'
      }[type] || 'text-green-600 bg-green-100';
      
      toastIcon.className = `w-8 h-8 rounded-full flex items-center justify-center ${colorClass}`;
      toastIcon.innerHTML = `<i class="${iconClass}"></i>`;
      
      // Show toast
      toast.classList.remove('hidden');
      
      // Auto hide after 4 seconds
      setTimeout(() => {
        toast.classList.add('hidden');
      }, 4000);
    }

    function hideToast() {
      document.getElementById('toast').classList.add('hidden');
    }

    // Loading overlay
    function showLoading() {
      document.getElementById('loadingOverlay').classList.remove('hidden');
      document.getElementById('loadingOverlay').classList.add('flex');
    }

    function hideLoading() {
      document.getElementById('loadingOverlay').classList.add('hidden');
      document.getElementById('loadingOverlay').classList.remove('flex');
    }

    // Refresh functionality
    document.getElementById('refreshNow')?.addEventListener('click', function() {
      this.style.transform = 'rotate(360deg)';
      showLoading();
      
      setTimeout(() => {
        this.style.transform = '';
        hideLoading();
        applyFilters();
        showToast('Data Diperbarui', 'Data siswa berhasil diperbarui');
      }, 2000);
    });

    // Export functionality
    document.getElementById('btnExportAll')?.addEventListener('click', function() {
      exportToCSV(currentStudents, 'data_siswa_semua');
    });

    document.getElementById('btnExportSelected')?.addEventListener('click', function() {
      const selectedData = studentsData.filter(s => selectedStudents.includes(s.id));
      exportToCSV(selectedData, 'data_siswa_terpilih');
    });

    function exportToCSV(data, filename) {
      const headers = ['Nama', 'NIS', 'Kelas', 'Status', 'Telat', 'Izin', 'Kehadiran', 'Email', 'Kontak', 'Bergabung', 'Login Terakhir'];
      const rows = [headers];
      
      data.forEach(student => {
        rows.push([
          student.nama,
          student.nis,
          student.kelas,
          getStatusText(student.status),
          `${student.telat}x`,
          `${student.izin}x`,
          `${student.kehadiran}%`,
          student.email,
          student.kontak,
          new Date(student.joinDate).toLocaleDateString('id-ID'),
          student.lastLogin
        ]);
      });
      
      const csvContent = rows.map(row => 
        row.map(cell => `"${String(cell).replace(/"/g, '""')}"`).join(',')
      ).join('\n');
      
      const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
      const link = document.createElement('a');
      link.href = URL.createObjectURL(blob);
      link.download = `${filename}_${new Date().toISOString().slice(0, 10)}.csv`;
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
      
      showToast('Export Berhasil', `Data berhasil diekspor ke ${filename}.csv`);
    }

    // Bulk actions
    document.getElementById('btnBulkBlock')?.addEventListener('click', function() {
      if (selectedStudents.length === 0) return;
      
      if (confirm(`Yakin blokir ${selectedStudents.length} siswa terpilih?`)) {
        showLoading();
        
        setTimeout(() => {
          selectedStudents.forEach(id => {
            const student = studentsData.find(s => s.id === id);
            if (student) student.status = 'blokir';
          });
          
          selectedStudents = [];
          updateSelectedCount();
          applyFilters();
          hideLoading();
          showToast('Bulk Action Berhasil', 'Siswa terpilih berhasil diblokir', 'warning');
        }, 2000);
      }
    });

    document.getElementById('btnBulkActivate')?.addEventListener('click', function() {
      if (selectedStudents.length === 0) return;
      
      if (confirm(`Yakin aktifkan ${selectedStudents.length} siswa terpilih?`)) {
        showLoading();
        
        setTimeout(() => {
          selectedStudents.forEach(id => {
            const student = studentsData.find(s => s.id === id);
            if (student) student.status = 'aktif';
          });
          
          selectedStudents = [];
          updateSelectedCount();
          applyFilters();
          hideLoading();
          showToast('Bulk Action Berhasil', 'Siswa terpilih berhasil diaktifkan');
        }, 2000);
      }
    });

    // Scroll to top functionality
    const scrollToTopBtn = document.getElementById('scrollToTop');
    window.addEventListener('scroll', function() {
      if (window.pageYOffset > 300) {
        scrollToTopBtn.classList.remove('hidden');
      } else {
        scrollToTopBtn.classList.add('hidden');
      }
    });

    scrollToTopBtn?.addEventListener('click', function() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Dark mode toggle
    const darkToggle = document.getElementById('darkToggle');
    darkToggle?.addEventListener('click', function() {
      document.documentElement.classList.toggle('dark');
      const isDark = document.documentElement.classList.contains('dark');
      
      this.innerHTML = isDark 
        ? '<i class="ph-sun text-xl"></i>' 
        : '<i class="ph-moon text-xl"></i>';
        
      localStorage.setItem('darkMode', isDark);
    });

    // Initialize charts
    function initializeCharts() {
      // Status pie chart
      const statusCtx = document.getElementById('statusPieChart');
      if (statusCtx) {
        new Chart(statusCtx, {
          type: 'doughnut',
          data: {
            labels: ['Aktif', 'Warning', 'Diblokir', 'Pending'],
            datasets: [{
              data: [
                studentsData.filter(s => s.status === 'aktif').length,
                studentsData.filter(s => s.status === 'warning').length,
                studentsData.filter(s => s.status === 'blokir').length,
                studentsData.filter(s => s.status === 'pending').length
              ],
              backgroundColor: ['#10b981', '#f59e0b', '#ef4444', '#6b7280'],
              borderWidth: 0
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: { position: 'bottom' }
            }
          }
        });
      }

      // Class distribution bar chart
      const kelasCtx = document.getElementById('kelasBarChart');
      if (kelasCtx) {
        const kelasData = {};
        studentsData.forEach(student => {
          kelasData[student.kelas] = (kelasData[student.kelas] || 0) + 1;
        });

        new Chart(kelasCtx, {
          type: 'bar',
          data: {
            labels: Object.keys(kelasData),
            datasets: [{
              label: 'Jumlah Siswa',
              data: Object.values(kelasData),
              backgroundColor: '#3b82f6',
              borderRadius: 6
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: { display: false }
            },
            scales: {
              y: { beginAtZero: true }
            }
          }
        });
      }

      // Trend chart
      const trendCtx = document.getElementById('trendChart');
      if (trendCtx) {
        new Chart(trendCtx, {
          type: 'line',
          data: {
            labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
            datasets: [
              {
                label: 'Kehadiran',
                data: [95, 92, 88, 94, 96, 90],
                borderColor: '#10b981',
                backgroundColor: 'rgba(16,185,129,0.1)',
                tension: 0.4,
                fill: true
              },
              {
                label: 'Keterlambatan',
                data: [5, 8, 12, 6, 4, 10],
                borderColor: '#f59e0b',
                backgroundColor: 'rgba(245,158,11,0.1)',
                tension: 0.4,
                fill: true
              }
            ]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: { position: 'top' }
            },
            scales: {
              y: { beginAtZero: true }
            }
          }
        });
      }

      // Attendance chart in modal
      const attendanceCtx = document.getElementById('attendanceChart');
      if (attendanceCtx) {
        new Chart(attendanceCtx, {
          type: 'line',
          data: {
            labels: ['1', '5', '10', '15', '20', '25', '30'],
            datasets: [{
              label: 'Kehadiran',
              data: [100, 95, 92, 96, 88, 94, 95],
              borderColor: '#3b82f6',
              backgroundColor: 'rgba(59,130,246,0.1)',
              tension: 0.4,
              fill: true,
              pointRadius: 3
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: { display: false }
            },
            scales: {
              x: { display: false },
              y: { beginAtZero: true, max: 100 }
            }
          }
        });
      }
    }

    // Initialize everything
    document.addEventListener('DOMContentLoaded', function() {
      // Load dark mode preference
      if (localStorage.getItem('darkMode') === 'true') {
        document.documentElement.classList.add('dark');
        darkToggle.innerHTML = '<i class="ph-sun text-xl"></i>';
      }

      // Initial render
      applyFilters();
      initializeCharts();
      
      // Show welcome message
      setTimeout(() => {
        showToast('Selamat Datang!', 'Halaman Data Siswa berhasil dimuat', 'info');
      }, 500);
    });

  </script>

</body>
</html>