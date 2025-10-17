<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>GOW INSIDE • Data Izin</title>

  <!-- TailwindCSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            bb1: '#e6f3ff',
            bb2: '#f0f9ff',
            sky1: '#57b2ff',
            sky2: '#0ea5e9',
            ink: '#0f172a',
            mint: '#9FE6C9',
            coal: '#0b1224',
            primary: '#0ea5e9',
            secondary: '#38bdf8'
          },
          boxShadow: { 
            soft: '0 18px 60px rgba(14,165,233,.08)', 
            pop: '0 24px 60px rgba(14,165,233,.14)',
            glow: '0 0 40px rgba(14,165,233, 0.15)',
            card: '0 8px 32px rgba(0,0,0,0.1)'
          },
          fontFamily: { pop: ['Poppins','ui-sans-serif','system-ui'] },
          animation: {
            fade: 'fade .7s ease both',
            slideIn: 'slideIn 0.5s ease-out',
            float: 'float 4.5s ease-in-out infinite',
            pulseSky: 'pulseSky 2.3s ease-in-out infinite',
            bounce: 'bounce 2s infinite',
            shimmer: 'shimmer 2s linear infinite',
            scaleIn: 'scaleIn 0.3s ease-out',
            wiggle: 'wiggle 1s ease-in-out infinite'
          },
          keyframes: {
            fade: { '0%':{opacity:0, transform:'translateY(14px)'}, '100%':{opacity:1, transform:'none'} },
            slideIn: { '0%':{transform:'translateX(-100px)', opacity:0}, '100%':{transform:'translateX(0)', opacity:1} },
            float: { '0%,100%':{transform:'translateY(0)'}, '50%':{transform:'translateY(-8px)'} },
            pulseSky: { '0%,100%':{ boxShadow:'0 0 0 0 rgba(14,165,233,.35)' }, '50%':{ boxShadow:'0 0 0 16px rgba(14,165,233,0)' } },
            shimmer: { '0%': { backgroundPosition: '-200% 0' }, '100%': { backgroundPosition: '200% 0' } },
            scaleIn: { '0%': { transform: 'scale(0.9)', opacity: 0 }, '100%': { transform: 'scale(1)', opacity: 1 } },
            wiggle: { '0%, 100%': { transform: 'rotate(-3deg)' }, '50%': { transform: 'rotate(3deg)' } }
          },
          backgroundImage: {
            'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
            'gradient-conic': 'conic-gradient(from 180deg at 50% 50%, var(--tw-gradient-stops))',
            'glass': 'linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.05))'
          },
          backdropBlur: {
            xs: '2px',
          }
        }
      }
    }
  </script>

  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <script src="https://unpkg.com/phosphor-icons"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    .glass {
      background: rgba(255, 255, 255, 0.25);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .glass-dark {
      background: rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .sidebar-fixed {
      position: fixed;
      left: 20px;
      top: 50%;
      transform: translateY(-50%);
      z-index: 50;
    }
    
    @media (max-width: 768px) {
      .sidebar-fixed {
        display: none;
      }
    }
    
    .main-content-with-sidebar {
      margin-left: 120px;
    }
    
    @media (max-width: 768px) {
      .main-content-with-sidebar {
        margin-left: 0;
      }
    }

    .status-badge {
      position: relative;
      overflow: hidden;
    }

    .status-badge::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
      transition: left 0.5s;
    }

    .status-badge:hover::before {
      left: 100%;
    }

    .card-hover {
      transition: all 0.3s ease;
    }

    .card-hover:hover {
      transform: translateY(-5px) scale(1.02);
      box-shadow: 0 25px 50px rgba(0,0,0,0.15);
    }

    .btn-gradient {
      background: linear-gradient(135deg, #0ea5e9, #38bdf8);
      transition: all 0.3s ease;
    }

    .btn-gradient:hover {
      background: linear-gradient(135deg, #0284c7, #0ea5e9);
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(14, 165, 233, 0.3);
    }

    .search-glow:focus {
      box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.3);
    }

    @keyframes pulse-ring {
      0% {
        transform: scale(0.33);
      }
      80%, 100% {
        opacity: 0;
      }
    }

    .pulse-ring {
      animation: pulse-ring 1.25s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
    }

    @media print {
      body * {
        visibility: hidden;
      }
      .print-area, .print-area * {
        visibility: visible;
      }
      .print-area {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
      }
      .no-print {
        display: none !important;
      }
    }
  </style>
</head>

<body class="font-pop bg-gradient-to-br from-sky-50 via-blue-50 to-cyan-50 min-h-screen">

<!-- SIDEBAR -->
<aside class="sidebar-fixed animate-slideIn no-print">
    <nav class="bg-[#e0f2fe] rounded-3xl p-4 flex flex-col gap-4 shadow-soft w-24">

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
<header class="md:hidden px-4 pt-4 animate-fade no-print">
    <div class="glass rounded-2xl px-4 py-3 flex items-center justify-between shadow-card">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 bg-gradient-to-br from-sky-500 to-blue-600 rounded-xl flex items-center justify-center">
                <i class="ph-graduation-cap text-white text-2xl"></i>
            </div>
            <div>
                <p class="text-[11px] tracking-wide text-slate-500 uppercase font-medium">GO INSIDE</p>
                <h1 class="font-bold text-lg bg-gradient-to-r from-sky-600 to-blue-600 bg-clip-text text-transparent">Data Izin</h1>
            </div>
        </div>
        <button id="btnMobileMenu" class="btn-gradient px-4 py-2 rounded-xl text-white font-semibold flex items-center gap-2 text-sm">
            <i class="ph-list text-lg"></i> Menu
        </button>
    </div>
</header>

<!-- MAIN CONTENT -->
<main class="main-content-with-sidebar p-6 md:p-10">

    <!-- HEADER SECTION -->
    <div class="flex items-center justify-between mb-8 animate-fade no-print">
      <div>
        <h1 class="text-3xl md:text-4xl font-black bg-gradient-to-r from-sky-600 to-blue-600 bg-clip-text text-transparent mb-2">
          Data Izin Siswa
        </h1>
        <p class="text-slate-600">Kelola dan pantau semua pengajuan izin siswa dengan mudah</p>
      </div>
      
      <div class="hidden md:flex items-center gap-4">
        <div class="flex items-center gap-2 bg-white/80 backdrop-blur-lg rounded-2xl px-4 py-2 shadow-card">
          <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
          <span class="text-sm font-medium text-slate-700">System Online</span>
        </div>
      </div>
    </div>

    <!-- STATISTICS CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 no-print">
      <div class="card-hover bg-gradient-to-br from-amber-400 to-orange-500 rounded-3xl p-6 text-white shadow-card animate-fade" style="animation-delay: 0.1s">
        <div class="flex items-center justify-between mb-4">
          <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-3">
            <i class="ph-clock text-3xl"></i>
          </div>
          <div class="text-right">
            <p class="text-white/80 text-sm font-medium">Menunggu</p>
            <span class="text-3xl font-black" id="statMenunggu">{{ $menunggu }}</span>
          </div>
        </div>
        <div class="bg-white/20 rounded-full h-2 mb-2">
          <div class="bg-white rounded-full h-2 w-3/4 animate-pulse"></div>
        </div>
        <p class="text-white/80 text-xs">+12% dari minggu lalu</p>
      </div>

      <div class="card-hover bg-gradient-to-br from-emerald-400 to-green-500 rounded-3xl p-6 text-white shadow-card animate-fade" style="animation-delay: 0.2s">
        <div class="flex items-center justify-between mb-4">
          <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-3">
            <i class="ph-check-circle text-3xl"></i>
          </div>
          <div class="text-right">
            <p class="text-white/80 text-sm font-medium">Disetujui</p>
            <span class="text-3xl font-black" id="statDisetujui">{{ $disetujui }}</span>
          </div>
        </div>
        <div class="bg-white/20 rounded-full h-2 mb-2">
          <div class="bg-white rounded-full h-2 w-4/5 animate-pulse"></div>
        </div>
        <p class="text-white/80 text-xs">+8% dari minggu lalu</p>
      </div>

      <div class="card-hover bg-gradient-to-br from-red-400 to-pink-500 rounded-3xl p-6 text-white shadow-card animate-fade" style="animation-delay: 0.3s">
        <div class="flex items-center justify-between mb-4">
          <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-3">
            <i class="ph-x-circle text-3xl"></i>
          </div>
          <div class="text-right">
            <p class="text-white/80 text-sm font-medium">Ditolak</p>
            <span class="text-3xl font-black" id="statDitolak">{{ $ditolak }}</span>
          </div>
        </div>
        <div class="bg-white/20 rounded-full h-2 mb-2">
          <div class="bg-white rounded-full h-2 w-1/4 animate-pulse"></div>
        </div>
        <p class="text-white/80 text-xs">-3% dari minggu lalu</p>
      </div>

      <div class="card-hover bg-gradient-to-br from-sky-500 to-blue-600 rounded-3xl p-6 text-white shadow-card animate-fade" style="animation-delay: 0.4s">
        <div class="flex items-center justify-between mb-4">
          <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-3">
            <i class="ph-check-square text-3xl"></i>
          </div>
          <div class="text-right">
            <p class="text-white/80 text-sm font-medium">Terlaksana</p>
            <span class="text-3xl font-black" id="statTerlaksana">{{ $terlaksana }}</span>
          </div>
        </div>
        <div class="bg-white/20 rounded-full h-2 mb-2">
          <div class="bg-white rounded-full h-2 w-3/5 animate-pulse"></div>
        </div>
        <p class="text-white/80 text-xs">+15% dari minggu lalu</p>
      </div>
    </div>

    <!-- FILTER & SEARCH SECTION -->
    <div class="bg-white/80 backdrop-blur-lg rounded-3xl p-6 mb-8 shadow-card animate-fade no-print" style="animation-delay: 0.5s">
      <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
        
        <!-- Filter Controls -->
        <form method="GET" action="{{ route('data-izin') }}" class="flex flex-wrap gap-3">
          <select name="status" class="search-glow bg-white border-2 border-sky-100 rounded-2xl px-4 py-3 focus:border-sky-400 focus:outline-none transition-all font-medium">
            <option value="">📋 Semua Status</option>
            <option value="menunggu" {{ request('status') == 'menunggu' ? 'selected' : '' }}>⏳ Menunggu</option>
            <option value="disetujui" {{ request('status') == 'disetujui' ? 'selected' : '' }}>✅ Disetujui</option>
            <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>❌ Ditolak</option>
            <option value="terlaksana" {{ request('status') == 'terlaksana' ? 'selected' : '' }}>✔️ Terlaksana</option>
          </select>
          
          <input type="date" name="tanggal" value="{{ request('tanggal') }}" class="search-glow bg-white border-2 border-sky-100 rounded-2xl px-4 py-3 focus:border-sky-400 focus:outline-none transition-all font-medium">
          
          <button type="submit" class="btn-gradient px-6 py-3 text-white rounded-2xl font-semibold flex items-center gap-2">
            <i class="ph-funnel text-lg"></i>
            Filter Data
          </button>
          
          <a href="{{ route('data-izin') }}" class="bg-gray-100 hover:bg-gray-200 px-6 py-3 text-gray-700 rounded-2xl font-semibold transition-all flex items-center gap-2">
            <i class="ph-arrow-clockwise text-lg"></i>
            Reset
          </a>
        </form>

        <!-- Search Bar -->
        <form method="GET" action="{{ route('data-izin') }}" class="relative w-full lg:w-80">
          <input type="text" name="search" value="{{ request('search') }}" placeholder="🔍 Cari nama siswa atau kelas..." 
                 class="search-glow bg-white border-2 border-sky-100 rounded-2xl w-full px-6 py-3 pr-12 focus:border-sky-400 focus:outline-none transition-all font-medium">
          <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2">
            <div class="w-6 h-6 bg-gradient-to-r from-sky-400 to-blue-500 rounded-full flex items-center justify-center">
              <i class="ph-magnifying-glass text-white text-sm"></i>
            </div>
          </button>
        </form>
      </div>

      <!-- Print Filter Section -->
      <div class="mt-6 pt-6 border-t border-sky-100">
        <h4 class="font-bold text-sky-700 mb-4 flex items-center gap-2">
          <i class="ph-printer text-xl"></i>
          Cetak Laporan
        </h4>
        <div class="flex flex-wrap gap-3 items-end">
          <div class="flex flex-col">
            <label class="text-sm font-medium text-gray-700 mb-1">Periode Laporan:</label>
            <select id="printPeriod" class="search-glow bg-white border-2 border-sky-100 rounded-2xl px-4 py-3 focus:border-sky-400 focus:outline-none transition-all font-medium">
              <option value="1">1 Bulan Terakhir</option>
              <option value="3">3 Bulan Terakhir</option>
              <option value="6">6 Bulan Terakhir</option>
              <option value="12">1 Tahun Terakhir</option>
              <option value="custom">Pilih Tanggal Custom</option>
            </select>
          </div>
          
          <div id="customDateRange" class="flex gap-2" style="display: none;">
            <div class="flex flex-col">
              <label class="text-sm font-medium text-gray-700 mb-1">Dari:</label>
              <input type="date" id="printFromDate" class="search-glow bg-white border-2 border-sky-100 rounded-2xl px-4 py-3 focus:border-sky-400 focus:outline-none transition-all font-medium">
            </div>
            <div class="flex flex-col">
              <label class="text-sm font-medium text-gray-700 mb-1">Sampai:</label>
              <input type="date" id="printToDate" class="search-glow bg-white border-2 border-sky-100 rounded-2xl px-4 py-3 focus:border-sky-400 focus:outline-none transition-all font-medium">
            </div>
          </div>

          <button id="btnPrintReport" class="btn-gradient px-6 py-3 text-white rounded-2xl font-semibold flex items-center gap-2">
            <i class="ph-printer text-lg"></i>
            Cetak Laporan
          </button>
        </div>
      </div>
    </div>

    <!-- DATA TABLE -->
    <div class="bg-white/90 backdrop-blur-lg rounded-3xl shadow-card overflow-hidden animate-fade" style="animation-delay: 0.6s">
      
      <!-- Table Header -->
      <div class="bg-gradient-to-r from-sky-500 to-blue-600 px-6 py-4 no-print">
        <div class="flex items-center justify-between">
          <h3 class="text-white font-bold text-xl flex items-center gap-3">
            <i class="ph-table text-2xl"></i>
            Daftar Pengajuan Izin
          </h3>
          <div class="flex items-center gap-3">
            <button id="btnExport" class="bg-white/20 backdrop-blur-sm hover:bg-white/30 px-4 py-2 rounded-xl text-white font-medium transition-all flex items-center gap-2">
              <i class="ph-download text-lg"></i>
              Export
            </button>
            <button onclick="window.print()" class="bg-white/20 backdrop-blur-sm hover:bg-white/30 px-4 py-2 rounded-xl text-white font-medium transition-all flex items-center gap-2">
              <i class="ph-printer text-lg"></i>
              Print
            </button>
          </div>
        </div>
      </div>

      <!-- Print Header (hidden on screen) -->
      <div class="print-area" style="display: none;">
        <div class="text-center mb-6">
          <h1 class="text-2xl font-bold text-gray-800 mb-2">LAPORAN DATA IZIN SISWA</h1>
          <h2 class="text-xl font-semibold text-sky-600 mb-4">SMK GOW INSIDE</h2>
          <p class="text-gray-600" id="printDateRange"></p>
        </div>
      </div>

      <!-- Table Content -->
      <div class="overflow-x-auto print-area">
        <table class="min-w-full">
          <thead class="bg-gradient-to-r from-sky-50 to-blue-50">
            <tr>
              <th class="px-6 py-4 text-left text-sm font-bold text-sky-700 uppercase tracking-wider">#</th>
              <th class="px-6 py-4 text-left text-sm font-bold text-sky-700 uppercase tracking-wider">Siswa</th>
              <th class="px-6 py-4 text-left text-sm font-bold text-sky-700 uppercase tracking-wider">Kelas</th>
              <th class="px-6 py-4 text-left text-sm font-bold text-sky-700 uppercase tracking-wider">Tanggal</th>
              <th class="px-6 py-4 text-left text-sm font-bold text-sky-700 uppercase tracking-wider">Jenis</th>
              <th class="px-6 py-4 text-left text-sm font-bold text-sky-700 uppercase tracking-wider">Status</th>
              <th class="px-6 py-4 text-left text-sm font-bold text-sky-700 uppercase tracking-wider no-print">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-sky-100" id="tableBody">
            @forelse($izin as $index => $item)
            <tr class="hover:bg-sky-50 transition-all duration-200 cursor-pointer group" onclick="openModal({{ $item->id }})">
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="flex items-center justify-center w-8 h-8 bg-sky-100 text-sky-600 rounded-full font-semibold text-sm group-hover:bg-sky-200 transition-colors">
                  {{ $izin->firstItem() + $index }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 bg-gradient-to-br from-sky-400 to-blue-500 rounded-full flex items-center justify-center text-white font-semibold">
                    {{ strtoupper(substr($item->nama_siswa ?? 'N/A', 0, 1)) }}
                  </div>
                  <div>
                    <div class="font-semibold text-gray-900">{{ $item->nama_siswa ?? 'N/A' }}</div>
                    <div class="text-sm text-gray-500">ID: {{ $item->siswa_id ?? 'N/A' }}</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 border border-blue-200">
                  {{ $item->kelas_id ?? 'N/A' }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex flex-col">
                  <span class="font-medium text-gray-900">{{ \Carbon\Carbon::parse($item->tanggal_izin)->format('d M Y') }}</span>
                  <span class="text-sm text-gray-500">{{ $item->jam_mulai_keluar }} - {{ $item->jam_akhir_kembali }}</span>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-700 border border-gray-200">
                  <i class="ph-tag text-xs"></i>
                  {{ ucwords(str_replace('_', ' ', $item->jenis_izin)) }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                @php
                  $statusColors = [
                    'menunggu' => 'bg-amber-100 text-amber-800 border-amber-200',
                    'disetujui' => 'bg-emerald-100 text-emerald-800 border-emerald-200',
                    'ditolak' => 'bg-red-100 text-red-800 border-red-200',
                    'terlaksana' => 'bg-sky-100 text-sky-800 border-sky-200'
                  ];
                  $statusIcons = [
                    'menunggu' => 'ph-clock',
                    'disetujui' => 'ph-check-circle',
                    'ditolak' => 'ph-x-circle',
                    'terlaksana' => 'ph-check-square'
                  ];
                @endphp
                <span class="status-badge inline-flex items-center gap-2 px-3 py-2 rounded-full text-sm font-semibold border {{ $statusColors[$item->status_izin] ?? 'bg-gray-100 text-gray-800 border-gray-200' }}">
                  <i class="{{ $statusIcons[$item->status_izin] ?? 'ph-question' }} text-sm"></i>
                  {{ ucfirst($item->status_izin) }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap no-print">
                <button onclick="event.stopPropagation(); openModal({{ $item->id }})" 
                        class="p-2 bg-sky-100 hover:bg-sky-200 text-sky-600 rounded-xl transition-all hover:scale-110">
                  <i class="ph-eye text-lg"></i>
                </button>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="7" class="px-6 py-12 text-center">
                <div class="flex flex-col items-center gap-4">
                  <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center">
                    <i class="ph-folder-open text-4xl text-gray-400"></i>
                  </div>
                  <div>
                    <h3 class="font-semibold text-gray-700 mb-1">Tidak ada data</h3>
                    <p class="text-gray-500 text-sm">Belum ada pengajuan izin yang sesuai dengan filter</p>
                  </div>
                </div>
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="bg-gray-50 px-6 py-4 flex items-center justify-between border-t border-sky-100 no-print">
        <div class="flex items-center gap-2 text-sm text-gray-600">
          <span>Menampilkan</span>
          <span class="font-semibold text-sky-600">{{ $izin->firstItem() ?? 0 }}</span>
          <span>-</span>
          <span class="font-semibold text-sky-600">{{ $izin->lastItem() ?? 0 }}</span>
          <span>dari</span>
          <span class="font-semibold text-sky-600">{{ $izin->total() }}</span>
          <span>data</span>
        </div>
        <div class="flex items-center gap-1">
          {{ $izin->links() }}
        </div>
      </div>
    </div>

</main>

<!-- MODAL DETAIL -->
<div id="izinModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 no-print" style="display: none;">
  <div class="bg-white rounded-3xl max-w-2xl w-full max-h-[90vh] overflow-y-auto shadow-card animate-scaleIn">
    
    <!-- Modal Header -->
    <div class="bg-gradient-to-r from-sky-500 to-blue-600 p-6 rounded-t-3xl">
      <div class="flex items-center justify-between">
        <h3 class="text-white font-bold text-xl flex items-center gap-3">
          <i class="ph-info text-2xl"></i>
          Detail Pengajuan Izin
        </h3>
        <button onclick="closeModal()" class="bg-white/20 hover:bg-white/30 p-2 rounded-xl text-white transition-all">
          <i class="ph-x text-xl"></i>
        </button>
      </div>
    </div>

    <!-- Modal Content -->
    <div id="modalContent" class="p-6">
      <!-- Content will be populated by JavaScript -->
    </div>

    <!-- Modal Footer -->
    <div class="flex items-center justify-end gap-3 p-6 bg-gray-50 rounded-b-3xl">
      <button onclick="closeModal()" class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-xl font-medium transition-all">
        Tutup
      </button>
      <button onclick="printModalContent()" class="btn-gradient px-6 py-3 text-white rounded-xl font-medium flex items-center gap-2">
        <i class="ph-printer"></i>
        Print Detail
      </button>
    </div>
  </div>
</div>

<!-- SCRIPTS -->
<script>
  // Data sudah diambil dari server via Laravel

  // Status color mapping
  const statusColors = {
    'menunggu': 'bg-amber-100 text-amber-800 border-amber-200',
    'disetujui': 'bg-emerald-100 text-emerald-800 border-emerald-200',
    'ditolak': 'bg-red-100 text-red-800 border-red-200',
    'terlaksana': 'bg-sky-100 text-sky-800 border-sky-200'
  };

  const statusIcons = {
    'menunggu': 'ph-clock',
    'disetujui': 'ph-check-circle',
    'ditolak': 'ph-x-circle',
    'terlaksana': 'ph-check-square'
  };

  // Fungsi-fungsi yang tidak diperlukan lagi karena data sudah diambil dari server

  // Open modal
  async function openModal(id) {
    const modal = document.getElementById('izinModal');
    const content = document.getElementById('modalContent');
    
    // Show loading
    content.innerHTML = `
      <div class="flex items-center justify-center py-12">
        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-sky-600"></div>
        <span class="ml-3 text-gray-600">Memuat data...</span>
              </div>
    `;
    
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';

    try {
      const response = await fetch(`/izin/${id}/detail`);
      const data = await response.json();
      
      if (response.ok) {
    content.innerHTML = `
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <!-- Student Info -->
        <div class="space-y-4">
          <div class="bg-gradient-to-br from-sky-50 to-blue-50 rounded-2xl p-4">
            <h4 class="font-bold text-sky-700 mb-3 flex items-center gap-2">
              <i class="ph-student text-xl"></i>
              Informasi Siswa
            </h4>
            <div class="space-y-3">
              <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-sky-400 to-blue-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                      ${(data.nama_siswa || 'N/A').charAt(0).toUpperCase()}
                </div>
                <div>
                      <p class="font-semibold text-gray-900">${data.nama_siswa || 'N/A'}</p>
                      <p class="text-sm text-gray-600">ID: ${data.siswa_id || 'N/A'}</p>
                </div>
              </div>
              <div class="flex justify-between">
                <span class="text-sm text-gray-600">Kelas:</span>
                    <span class="font-medium text-gray-900">${data.kelas_id || 'N/A'}</span>
              </div>
            </div>
          </div>

          <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-4">
            <h4 class="font-bold text-blue-700 mb-3 flex items-center gap-2">
              <i class="ph-chalkboard-teacher text-xl"></i>
              Penanggung Jawab
            </h4>
            <div class="space-y-2">
              <div class="flex justify-between">
                <span class="text-sm text-gray-600">Guru Piket:</span>
                    <span class="font-medium text-gray-900">${data.nama_guru_piket || 'N/A'}</span>
              </div>
              <div class="flex justify-between">
                <span class="text-sm text-gray-600">Guru Pengajar:</span>
                    <span class="font-medium text-gray-900">${data.nama_guru_pengajar || 'N/A'}</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Request Details -->
        <div class="space-y-4">
          <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-2xl p-4">
            <h4 class="font-bold text-amber-700 mb-3 flex items-center gap-2">
              <i class="ph-calendar text-xl"></i>
              Detail Pengajuan
            </h4>
            <div class="space-y-3">
              <div class="flex justify-between">
                <span class="text-sm text-gray-600">Tanggal:</span>
                    <span class="font-medium text-gray-900">${new Date(data.tanggal_izin).toLocaleDateString('id-ID')}</span>
              </div>
              <div class="flex justify-between">
                <span class="text-sm text-gray-600">Jam Keluar:</span>
                    <span class="font-medium text-gray-900">${data.jam_mulai_keluar} WIB</span>
              </div>
              <div class="flex justify-between">
                <span class="text-sm text-gray-600">Jam Kembali:</span>
                    <span class="font-medium text-gray-900">${data.jam_akhir_kembali} WIB</span>
              </div>
              <div class="flex justify-between">
                <span class="text-sm text-gray-600">Jenis Izin:</span>
                <span class="inline-flex items-center gap-1 px-2 py-1 bg-amber-200 text-amber-800 rounded-lg text-sm font-medium">
                  <i class="ph-tag text-xs"></i>
                      ${(data.jenis_izin || '').replace('_', ' ').replace(/\b\w/g, l => l.toUpperCase())}
                </span>
              </div>
            </div>
          </div>

          <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-4">
            <h4 class="font-bold text-green-700 mb-3 flex items-center gap-2">
              <i class="ph-chat-text text-xl"></i>
              Alasan & Status
            </h4>
            <div class="space-y-3">
              <div>
                <span class="text-sm text-gray-600 block mb-1">Alasan:</span>
                <p class="bg-white rounded-lg p-3 text-sm text-gray-700 border border-green-200">
                      ${data.alasan_izin || 'Tidak ada alasan'}
                </p>
              </div>
              <div class="flex justify-between items-center">
                <span class="text-sm text-gray-600">Status Saat Ini:</span>
                    <span class="status-badge inline-flex items-center gap-2 px-3 py-2 rounded-full text-sm font-semibold border ${getStatusColor(data.status_izin)}">
                      <i class="${getStatusIcon(data.status_izin)} text-sm"></i>
                      ${(data.status_izin || '').charAt(0).toUpperCase() + (data.status_izin || '').slice(1)}
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    `;
      } else {
        content.innerHTML = `
          <div class="text-center py-12">
            <i class="ph-warning text-4xl text-red-500 mb-4"></i>
            <h3 class="font-semibold text-gray-700 mb-2">Error</h3>
            <p class="text-gray-500">${data.error || 'Terjadi kesalahan saat memuat data'}</p>
          </div>
        `;
      }
    } catch (error) {
      content.innerHTML = `
        <div class="text-center py-12">
          <i class="ph-warning text-4xl text-red-500 mb-4"></i>
          <h3 class="font-semibold text-gray-700 mb-2">Error</h3>
          <p class="text-gray-500">Terjadi kesalahan saat memuat data</p>
        </div>
      `;
    }
  }

  // Helper functions for status
  function getStatusColor(status) {
    const colors = {
      'menunggu': 'bg-amber-100 text-amber-800 border-amber-200',
      'disetujui': 'bg-emerald-100 text-emerald-800 border-emerald-200',
      'ditolak': 'bg-red-100 text-red-800 border-red-200',
      'terlaksana': 'bg-sky-100 text-sky-800 border-sky-200'
    };
    return colors[status] || 'bg-gray-100 text-gray-800 border-gray-200';
  }

  function getStatusIcon(status) {
    const icons = {
      'menunggu': 'ph-clock',
      'disetujui': 'ph-check-circle',
      'ditolak': 'ph-x-circle',
      'terlaksana': 'ph-check-square'
    };
    return icons[status] || 'ph-question';
  }

  // Close modal
  function closeModal() {
    const modal = document.getElementById('izinModal');
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
  }

  // Print modal content
  function printModalContent() {
    window.print();
  }

  // Show notification
  function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `fixed top-6 right-6 z-60 px-6 py-4 rounded-2xl shadow-card animate-scaleIn ${
      type === 'success' ? 'bg-green-500 text-white' : 
      type === 'error' ? 'bg-red-500 text-white' : 
      'bg-sky-500 text-white'
    }`;
    
    notification.innerHTML = `
      <div class="flex items-center gap-3">
        <i class="ph-${type === 'success' ? 'check-circle' : type === 'error' ? 'x-circle' : 'info'} text-xl"></i>
        <span class="font-medium">${message}</span>
      </div>
    `;

    document.body.appendChild(notification);

    setTimeout(() => {
      notification.remove();
    }, 3000);
  }

  // Print report based on selected period
  function printReport() {
    showNotification('Fitur print report akan segera tersedia!', 'info');
  }

  // Event listeners
  document.addEventListener('DOMContentLoaded', () => {
    // Print period change handler
    document.getElementById('printPeriod').addEventListener('change', function() {
      const customDateRange = document.getElementById('customDateRange');
      if (this.value === 'custom') {
        customDateRange.style.display = 'flex';
      } else {
        customDateRange.style.display = 'none';
      }
    });

    // Set default dates for custom range
    const today = new Date();
    const oneMonthAgo = new Date();
    oneMonthAgo.setMonth(today.getMonth() - 1);
    
    document.getElementById('printFromDate').value = oneMonthAgo.toISOString().split('T')[0];
    document.getElementById('printToDate').value = today.toISOString().split('T')[0];

    // Print report button
    document.getElementById('btnPrintReport').addEventListener('click', printReport);

    // Export button
    document.getElementById('btnExport').addEventListener('click', () => {
      showNotification('Fitur export akan segera tersedia!', 'info');
    });

    // Close modal on escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        closeModal();
      }
    });

    // Close modal on backdrop click
    document.getElementById('izinModal').addEventListener('click', (e) => {
      if (e.target === e.currentTarget) {
        closeModal();
      }
    });
  });

  // Add some interactive hover effects
  document.addEventListener('DOMContentLoaded', () => {
    // Add floating animation to cards
    const cards = document.querySelectorAll('.card-hover');
    cards.forEach((card, index) => {
      card.style.animationDelay = `${index * 0.1}s`;
      card.classList.add('animate-float');
    });

    // Add ripple effect to buttons
    document.addEventListener('click', (e) => {
      if (e.target.matches('button, .btn-gradient, [onclick]')) {
        const ripple = document.createElement('div');
        const rect = e.target.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;

        ripple.style.width = ripple.style.height = size + 'px';
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
        ripple.className = 'absolute bg-white/30 rounded-full animate-ping pointer-events-none';

        e.target.style.position = 'relative';
        e.target.style.overflow = 'hidden';
        e.target.appendChild(ripple);

        setTimeout(() => {
          ripple.remove();
        }, 600);
      }
    });
  });
</script>

</body>
</html>