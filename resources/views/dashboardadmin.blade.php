<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>GOW INSIDE • Dashboard Admin</title>

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
            pulseSky: 'pulseSky 2.3s ease-in-out infinite'
          },
          keyframes: {
            fade: { '0%':{opacity:0, transform:'translateY(14px)'},
                    '100%':{opacity:1, transform:'none'} },
            float: { '0%,100%':{transform:'translateY(0)'},
                     '50%':{transform:'translateY(-8px)'} },
            pulseSky: {
              '0%,100%':{ boxShadow:'0 0 0 0 rgba(56,158,237,.35)' },
              '50%':{ boxShadow:'0 0 0 16px rgba(56,158,237,0)' }
            }
          }
        }
      }
    }
  </script>

  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet" />
  <script src="https://unpkg.com/phosphor-icons"></script>

  <!-- Chart.js & FullCalendar -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

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
    .badge{display:inline-flex;align-items:center;gap:.5rem;padding:.25rem .6rem;border-radius:999px;font-weight:600}
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
    .modal-backdrop{position:fixed;inset:0;display:none;background:rgba(2,6,23,0.45);align-items:center;justify-content:center;z-index:60}
    .modal-card{background:white;border-radius:12px;padding:1.25rem;width:96%;max-width:760px;box-shadow:0 20px 40px rgba(2,6,23,.2)}
    
    /* Dark mode */
    .dark .glass{background:rgba(15,23,42,0.7);color:#e6eef8}
    .dark .modal-card{background:#0b1220;color:#e6eef8}
  </style>
</head>
<body class="min-h-screen">
<!-- SIDEBAR -->
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


<!-- MOBILE NAV (Topbar + dropdown) -->
<header class="md:hidden px-4 pt-4">
  <div class="glass rounded-2xl px-4 py-3 flex items-center justify-between">
    <div class="flex items-center gap-3">
      <img src="/assets/smkn13.jpg.png" alt="Logo SMKN 13 Bandung" class="w-12 h-12 object-contain">
      <div>
        <p class="text-[11px] tracking-wide text-slate-500">GO INSIDE</p>
        <h1 class="font-extrabold text-base">Dashboard Admin</h1>
      </div>
    </div>
    <button id="btnMobileMenu" class="px-3 py-2 rounded-xl bg-white text-sky-700 font-semibold flex items-center gap-2">
      <i class="ph-list"></i> Menu
    </button>
  </div>

  <!-- Dropdown mobile -->
  <nav id="mobileMenu" class="hidden mt-2 glass rounded-2xl px-4 py-3">
    <ul class="grid grid-cols-2 gap-2 text-sm">
      <li><a href="{{ route('dashboardadmin') }}" class="block p-2 rounded-lg hover:bg-sky-50 {{ request()->routeIs('dashboardadmin') ? 'bg-sky-100 font-semibold text-sky-700' : '' }}">Dashboard</a></li>
      <li><a href="{{ route('data-guru') }}" class="block p-2 rounded-lg hover:bg-sky-50 {{ request()->routeIs('data-guru') ? 'bg-sky-100 font-semibold text-sky-700' : '' }}">Data Guru</a></li>
      <li><a href="{{ route('data-siswa') }}" class="block p-2 rounded-lg hover:bg-sky-50 {{ request()->routeIs('data-siswa') ? 'bg-sky-100 font-semibold text-sky-700' : '' }}">Data Siswa</a></li>
      <li><a href="{{ route('data-izin') }}" class="block p-2 rounded-lg hover:bg-sky-50 {{ request()->routeIs('data-izin') ? 'bg-sky-100 font-semibold text-sky-700' : '' }}">Data Izin</a></li>
      <li><a href="{{ route('profile-admin', Auth::user()->id) }}" class="block p-2 rounded-lg hover:bg-sky-50 {{ request()->routeIs('profile-admin') ? 'bg-sky-100 font-semibold text-sky-700' : '' }}">Profil</a></li>
      <li>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="block w-full text-left p-2 rounded-lg hover:bg-red-50 text-red-600">Logout</button>
        </form>
      </li>
    </ul>
  </nav>
</header>

    <!-- MAIN LAYOUT -->
    <main class="max-w-[1200px] mx-auto px-4 md:px-6 pb-10 mt-6">

      <!-- WELCOME / PROFIL -->
      <section class="glass rounded-[28px] overflow-hidden relative shadow-pop animate-fade mb-8">
        <span class="absolute -top-16 -left-16 w-48 h-48 bg-sky-200 blur-3xl rounded-full opacity-60"></span>
        <span class="absolute -bottom-20 -right-20 w-72 h-72 bg-blue-300 blur-3xl rounded-full opacity-40"></span>

        <div class="p-6 md:p-8 flex items-center gap-6 relative z-10">
          <!-- Foto Profil / Icon -->
          <div class="w-40 h-40 md:w-48 md:h-48 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center text-white overflow-hidden">
            <i class="ph-user text-6xl"></i>
          </div>

          <div class="flex-1">
            <h2 class="text-2xl md:text-[28px] font-extrabold leading-tight">
              Selamat Datang, <span id="username">Administrator</span> 👋
            </h2>

            <p class="text-slate-700 font-semibold -mt-0.5">
              Role: <span id="userRole">Administrator</span>
            </p>

            <div class="mt-3 flex flex-wrap gap-2 text-sm">
              <span class="chip bg-white px-3 py-1 rounded-full inline-flex items-center gap-1">
                <i class="ph-check-circle text-sky-600"></i> Akses terverifikasi
              </span>
              <span class="chip bg-white px-3 py-1 rounded-full inline-flex items-center gap-1">
                <i class="ph-bell-ringing text-sky-600"></i> Notifikasi aktif
              </span>
              <span class="chip bg-white px-3 py-1 rounded-full inline-flex items-center gap-1">
                <i class="ph-shield-check text-emerald-600"></i> Full Access
              </span>
            </div>
          </div>

          <div class="mt-1 text-sm text-slate-600 text-right space-y-1">
            <div>Jam sekarang: <span id="jamRealTime" class="font-bold">--:--:--</span></div>
            <div id="tanggalRealTime" class="text-xs text-slate-500">--</div>
          </div>
        </div>
      </section>

      <!-- QUICK STATS: 6 cards responsive -->
      <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6 mb-8">
        <div class="glass rounded-2xl p-5 card-hover">
          <div class="flex items-center justify-between">
            <div>
              <div class="small-muted">📝 Total Pengajuan (Bulan Ini)</div>
              <div class="text-2xl font-extrabold mt-2">245</div>
            </div>
            <div class="bg-white/80 rounded-lg px-3 py-2 shadow-sm">
              <i class="ph-file-chart text-2xl text-sky-600"></i>
            </div>
          </div>
          <div class="mt-3 text-sm small-muted">Dibanding bulan lalu: <span id="deltaIzin" class="font-semibold text-green-600">+12%</span></div>
        </div>

        <div class="glass rounded-2xl p-5 card-hover">
          <div class="flex items-center justify-between">
            <div>
              <div class="small-muted">✅ Disetujui (Bulan Ini)</div>
              <div class="text-2xl font-extrabold mt-2 text-green-600">198</div>
            </div>
            <div class="bg-white/80 rounded-lg px-3 py-2 shadow-sm">
              <i class="ph-check-circle text-2xl text-green-600"></i>
            </div>
          </div>
          <div class="mt-3 text-sm small-muted">Rasio persetujuan: <span id="ratioAcc" class="font-semibold">81%</span></div>
        </div>

        <div class="glass rounded-2xl p-5 card-hover">
          <div class="flex items-center justify-between">
            <div>
              <div class="small-muted">❌ Ditolak (Bulan Ini)</div>
              <div class="text-2xl font-extrabold mt-2 text-red-600">32</div>
            </div>
            <div class="bg-white/80 rounded-lg px-3 py-2 shadow-sm">
              <i class="ph-x-circle text-2xl text-red-600"></i>
            </div>
          </div>
          <div class="mt-3 text-sm small-muted">Alasan umum: <span id="topRejectReason" class="font-semibold">Tidak valid</span></div>
        </div>

        <div class="glass rounded-2xl p-5 card-hover">
          <div class="flex items-center justify-between">
            <div>
              <div class="small-muted">⏰ Keterlambatan Pagi (Bulan Ini)</div>
              <div class="text-2xl font-extrabold mt-2 text-amber-600">89</div>
            </div>
            <div class="bg-white/80 rounded-lg px-3 py-2 shadow-sm">
              <i class="ph-stopwatch text-2xl text-amber-600"></i>
            </div>
          </div>
          <div class="mt-3 text-sm small-muted">Rata-rata menit telat: <span id="avgLateMins" class="font-semibold">15 menit</span></div>
        </div>

        <div class="glass rounded-2xl p-5 card-hover">
          <div class="flex items-center justify-between">
            <div>
              <div class="small-muted">📄 QR Dicetak (Bulan Ini)</div>
              <div class="text-2xl font-extrabold mt-2 text-purple-700">156</div>
            </div>
            <div class="bg-white/80 rounded-lg px-3 py-2 shadow-sm">
              <i class="ph-qr-code text-2xl text-purple-600"></i>
            </div>
          </div>
          <div class="mt-3 text-sm small-muted">Aktif hari ini: <span id="activeQR" class="font-semibold">23</span></div>
        </div>

        <div class="glass rounded-2xl p-5 card-hover">
          <div class="flex items-center justify-between">
            <div>
              <div class="small-muted">📊 Kepatuhan Siswa (%)</div>
              <div class="text-2xl font-extrabold mt-2">92%</div>
            </div>
            <div class="bg-white/80 rounded-lg px-3 py-2 shadow-sm">
              <i class="ph-shield-check text-2xl text-sky-600"></i>
            </div>
          </div>
          <div class="mt-3 text-sm small-muted">Target bulanan: <span id="complianceTarget" class="font-semibold">95%</span></div>
        </div>
      </section>

      <!-- Charts area (Izin / Pie / Keterlambatan) -->
      <section class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <div class="glass rounded-2xl p-6 card-hover">
          <div class="flex items-center justify-between mb-4">
            <h2 class="font-bold text-lg flex items-center gap-2">
              <i class="ph-chart-line-up text-sky-600"></i> Statistik Izin (per hari)
            </h2>
            <div class="flex items-center gap-2 small-muted">
              <select id="chartRange" class="px-3 py-1 rounded-lg border">
                <option value="14">14 Hari</option>
                <option value="30" selected>30 Hari</option>
                <option value="90">90 Hari</option>
              </select>
            </div>
          </div>
          <canvas id="izinChart" class="w-full h-[320px]"></canvas>
        </div>

        <div class="glass rounded-2xl p-6 card-hover">
          <div class="flex items-center justify-between mb-4">
            <h2 class="font-bold text-lg flex items-center gap-2">
              <i class="ph-chart-pie-slice text-rose-600"></i> ACC vs Tolak
            </h2>
            <div class="small-muted">Perbandingan izin</div>
          </div>
          <canvas id="pieChart" class="w-full h-[320px]"></canvas>
        </div>

        <div class="glass rounded-2xl p-6 card-hover lg:col-span-2">
          <div class="flex items-center justify-between mb-4">
            <h2 class="font-bold text-lg flex items-center gap-2">
              <i class="ph-chart-line text-amber-600"></i> Grafik Keterlambatan
            </h2>
            <div class="small-muted">Jumlah & rata2 menit</div>
          </div>
          <canvas id="lateChart" class="w-full h-[300px]"></canvas>
        </div>
      </section>

      <!-- Recent Izin (table + filters) -->
      <section class="glass rounded-2xl p-6 card-hover mb-8">
        <div class="flex items-center justify-between mb-4">
          <div class="flex items-center gap-3">
            <i class="ph-list text-2xl text-slate-700"></i>
            <h3 class="font-bold text-lg">Pengajuan Izin Terbaru</h3>
          </div>

          <div class="flex items-center gap-3">
            <input id="searchRecent" type="search" placeholder="Cari nama / kelas / jenis..." class="px-3 py-2 rounded-lg border" />
            <select id="filterStatus" class="px-3 py-2 rounded-lg border">
              <option value="">Semua Status</option>
              <option value="menunggu">Menunggu</option>
              <option value="disetujui">Disetujui</option>
              <option value="ditolak">Ditolak</option>
            </select>
            <input id="filterDate" type="date" class="px-3 py-2 rounded-lg border" />
            <button id="btnExportRecent" class="px-3 py-2 rounded-lg bg-sky-600 text-white">Export CSV</button>
          </div>
        </div>

        <div class="table-wrap overflow-x-auto">
          <table class="datatable w-full text-sm border-collapse" aria-label="Daftar pengajuan izin">
            <thead class="bg-slate-50/50 backdrop-blur">
              <tr class="text-left small-muted">
                <th class="px-4 py-3 w-12">#</th>
                <th class="px-4 py-3">Nama</th>
                <th class="px-4 py-3">Kelas</th>
                <th class="px-4 py-3">Jenis</th>
                <th class="px-4 py-3">Tanggal</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3 w-44">Aksi</th>
              </tr>
            </thead>
            <tbody id="recentTbody" class="bg-white divide-y divide-slate-200/50">
              <!-- Sample data -->
              <tr data-id="1" data-status="menunggu" class="hover:bg-sky-50/50 transition-colors">
                <td class="px-4 py-3">1</td>
                <td class="px-4 py-3">Ahmad Santoso</td>
                <td class="px-4 py-3">XI RPL 1</td>
                <td class="px-4 py-3">Dispensasi</td>
                <td class="px-4 py-3">2025-01-15</td>
                <td class="px-4 py-3"><span class="badge bg-amber-100 text-amber-700">Menunggu</span></td>
                <td class="px-4 py-3">
                  <button class="btn-detail px-3 py-2 rounded-lg border mr-2" data-id="1" data-type="dispensasi">Detail</button>
                  <button class="px-3 py-2 rounded-lg border">Edit</button>
                </td>
              </tr>
              <tr data-id="2" data-status="disetujui" class="hover:bg-sky-50/50 transition-colors">
                <td class="px-4 py-3">2</td>
                <td class="px-4 py-3">Siti Wulandari</td>
                <td class="px-4 py-3">XI RPL 2</td>
                <td class="px-4 py-3">Keterlambatan</td>
                <td class="px-4 py-3">2025-01-14</td>
                <td class="px-4 py-3"><span class="badge bg-green-100 text-green-700">Disetujui</span></td>
                <td class="px-4 py-3">
                  <button class="btn-detail px-3 py-2 rounded-lg border mr-2" data-id="2" data-type="terlambat">Detail</button>
                  <button class="px-3 py-2 rounded-lg border">Edit</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <!-- Aktivitas Hari Ini -->
      <section class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Guru memberi izin -->
        <div class="glass rounded-2xl p-6 card-hover">
          <h3 class="font-bold mb-3">👨‍🏫 Guru yang memberi izin (Hari Ini)</h3>
          <ul id="listGuru" class="space-y-3 max-h-56 overflow-y-auto">
            <li class="flex items-center gap-3 p-2 rounded-lg hover:bg-sky-50 transition">
              <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white font-semibold">
                AS
              </div>
              <div>
                <div class="font-semibold">Ahmad Santoso</div>
                <div class="small-muted text-sm">Matematika</div>
              </div>
            </li>
            <li class="flex items-center gap-3 p-2 rounded-lg hover:bg-sky-50 transition">
              <div class="w-10 h-10 rounded-full bg-gradient-to-br from-rose-400 to-rose-600 flex items-center justify-center text-white font-semibold">
                SW
              </div>
              <div>
                <div class="font-semibold">Siti Wulandari</div>
                <div class="small-muted text-sm">Bahasa Indonesia</div>
              </div>
            </li>
          </ul>
        </div>

        <!-- Security -->
        <div class="glass rounded-2xl p-6 card-hover">
          <h3 class="font-bold mb-3">👮 Security On Duty</h3>
          <ul id="listSecurity" class="space-y-3 max-h-56 overflow-y-auto">
            <li class="flex items-center gap-3 p-2 rounded-lg hover:bg-green-50 transition">
              <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-600 font-bold"><i class="ph-user"></i></div>
              <div>
                <div class="font-semibold">Pak Agus</div>
                <div class="small-muted text-sm">Shift: Pagi</div>
              </div>
            </li>
          </ul>
        </div>

        <!-- Siswa keluar-masuk -->
        <div class="glass rounded-2xl p-6 card-hover">
          <div class="flex items-center justify-between mb-3">
            <h3 class="font-bold">Siswa Keluar-Masuk (Hari Ini)</h3>
            <div class="flex items-center gap-2">
              <input id="quickSearch" type="search" placeholder="Cari nama / kelas" class="px-3 py-2 rounded-lg border text-xs" />
            </div>
          </div>
          <div class="max-h-64 overflow-y-auto">
            <table class="w-full text-sm">
              <thead>
                <tr class="text-left small-muted">
                  <th class="pb-2">Nama</th>
                  <th class="pb-2">Kelas</th>
                  <th class="pb-2">Jam</th>
                  <th class="pb-2">Status</th>
                </tr>
              </thead>
              <tbody id="listStudents">
                <tr class="border-b py-2 hover:bg-slate-50 transition">
                  <td class="py-2">Budi Santoso</td>
                  <td class="py-2">XI RPL 1</td>
                  <td class="py-2">09:15 — 10:30</td>
                  <td class="py-2">Izin Sakit</td>
                </tr>
                <tr class="border-b py-2 hover:bg-slate-50 transition">
                  <td class="py-2">Dewi Sari</td>
                  <td class="py-2">XI RPL 2</td>
                  <td class="py-2">10:00 — -</td>
                  <td class="py-2">Keluar</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="mt-4 flex items-center gap-2">
            <button onclick="exportStudentsCSV()" class="px-3 py-2 rounded-lg border text-sm">Export CSV</button>
            <button onclick="openModalAddStudent()" class="px-3 py-2 rounded-lg bg-sky-600 text-white text-sm">+ Tambah Catatan</button>
          </div>
        </div>
      </section>

      <!-- Kalender -->
      <section class="glass rounded-2xl p-6 card-hover">
        <div class="flex items-center justify-between mb-4">
          <h3 class="font-bold flex items-center gap-2"><i class="ph-calendar text-sky-600"></i> Kalender Sekolah</h3>
          <div class="small-muted">Klik event untuk detail</div>
        </div>
        <div id="schoolCalendar"></div>
      </section>

    </main>
  </div>

  <!-- Modal: Detail Izin -->
  <div id="detailModal" class="modal-backdrop" aria-hidden="true">
    <div class="modal-card relative">
      <button onclick="closeModal()" class="absolute right-4 top-4 text-slate-600"><i class="ph-x"></i></button>
      <h3 id="modalTitle" class="font-bold text-xl mb-1">Detail Pengajuan</h3>
      <p id="modalSubtitle" class="small-muted mb-4">Informasi lengkap pengajuan izin</p>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <div class="text-xs small-muted">Nama Siswa</div>
          <div id="m-nama" class="font-semibold">-</div>

          <div class="text-xs small-muted mt-3">Kelas</div>
          <div id="m-kelas" class="font-semibold">-</div>

          <div class="text-xs small-muted mt-3">Jenis Izin</div>
          <div id="m-jenis" class="font-semibold">-</div>
        </div>
        <div>
          <div class="text-xs small-muted">Tanggal</div>
          <div id="m-tanggal" class="font-semibold">-</div>

          <div class="text-xs small-muted mt-3">Jam</div>
          <div id="m-jam" class="font-semibold">-</div>

          <div class="text-xs small-muted mt-3">Status</div>
          <div id="m-status" class="font-semibold">-</div>
        </div>
      </div>

      <div class="mt-4">
        <div class="text-xs small-muted">Alasan</div>
        <div id="m-alasan" class="mt-2 p-3 bg-slate-50 rounded-lg">-</div>
      </div>

      <div class="flex justify-end gap-3 mt-5">
        <button onclick="closeModal()" class="px-4 py-2 rounded-lg border">Tutup</button>
        <button id="modalApprove" class="px-4 py-2 rounded-lg bg-green-600 text-white hidden">Setujui</button>
        <button id="modalReject" class="px-4 py-2 rounded-lg border text-red-600 hidden">Tolak</button>
      </div>
    </div>
  </div>

  <!-- Toast -->
  <div id="toast" class="fixed bottom-6 right-6 hidden z-50">
    <div class="bg-white shadow-lg rounded-xl px-5 py-4 flex items-start gap-3 border-l-4 border-sky-600">
      <i class="ph-bell text-sky-600 text-xl mt-1"></i>
      <div>
        <h4 id="toastTitle" class="font-bold text-slate-800">Notifikasi</h4>
        <p id="toastMsg" class="text-slate-600 text-sm">Pesan notifikasi...</p>
      </div>
    </div>
  </div>

  <!-- Floating quick actions -->
  <div class="fixed left-6 bottom-6 flex flex-col gap-3 z-40">
    <button id="darkToggle" class="px-4 py-3 rounded-full bg-slate-800 text-white shadow-lg hover:bg-slate-700 transition" title="Toggle Dark Mode"><i class="ph-moon text-xl"></i></button>
  </div>

  <!-- JavaScript -->
  <script>
    // Sample initial data
    const initialData = {
      izin: {
        labels: ['Jan 1', 'Jan 2', 'Jan 3', 'Jan 4', 'Jan 5', 'Jan 6', 'Jan 7'],
        data: [12, 8, 15, 10, 6, 20, 14]
      },
      pie: {
        data: [198, 32, 15] // Disetujui, Ditolak, Menunggu
      },
      late: {
        labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum'],
        count: [5, 8, 3, 12, 7],
        avgMinutes: [10, 15, 8, 20, 12],
      }
    };

    let izinChart = null;
    let pieChart = null;
    let lateChart = null;

    // Mobile menu toggle
    document.getElementById('btnMobileMenu').addEventListener('click', function(){
      const m = document.getElementById('mobileMenu');
      m.classList.toggle('hidden');
    });

    // Clock update
    function updateAllClocks(){
      const now = new Date();
      const opts = { weekday:'long', year:'numeric', month:'long', day:'numeric' };
      const time = now.toLocaleTimeString('id-ID');
      const dateStr = now.toLocaleDateString('id-ID', opts);
      
      const elClockTop = document.getElementById('clockTop'); 
      if(elClockTop) elClockTop.innerText = time;
      
      const elClockDateTop = document.getElementById('clockDateTop'); 
      if(elClockDateTop) elClockDateTop.innerText = dateStr;
      
      const elJam = document.getElementById('jamRealTime'); 
      if(elJam) elJam.innerText = time;
      
      const elTanggal = document.getElementById('tanggalRealTime'); 
      if(elTanggal) elTanggal.innerText = dateStr;
    }
    
    setInterval(updateAllClocks, 1000);
    updateAllClocks();

    // Refresh button
    document.getElementById('refreshNow').addEventListener('click', function(){
      this.classList.add('opacity-80');
      setTimeout(()=>this.classList.remove('opacity-80'), 400);
      fetchDashboard();
    });

    // Chart rendering function
    function renderCharts(data){
      // Izin line chart
      const ctxI = document.getElementById('izinChart').getContext('2d');
      if(izinChart) izinChart.destroy();
      izinChart = new Chart(ctxI, {
        type: 'line',
        data: {
          labels: data.izin.labels,
          datasets: [{
            label: 'Total Izin',
            data: data.izin.data,
            borderColor: '#389eed',
            backgroundColor: 'rgba(56,158,237,0.12)',
            tension: 0.35,
            fill: true,
            pointRadius: 4
          }]
        },
        options: {
          responsive: true,
          plugins: { legend: { display:false } },
          scales: { x: { grid: { display:false } }, y: { beginAtZero:true } }
        }
      });

      // Pie chart
      const ctxP = document.getElementById('pieChart').getContext('2d');
      if(pieChart) pieChart.destroy();
      pieChart = new Chart(ctxP, {
        type: 'doughnut',
        data: {
          labels: ['Disetujui','Ditolak','Menunggu'],
          datasets: [{ data: data.pie.data, backgroundColor: ['#10b981','#ef4444','#f59e0b'] }]
        },
        options: { responsive:true, plugins:{legend:{position:'bottom'}} }
      });

      // Late chart (bar + line)
      const ctxL = document.getElementById('lateChart').getContext('2d');
      if(lateChart) lateChart.destroy();
      lateChart = new Chart(ctxL, {
        data: {
          labels: data.late.labels,
          datasets: [
            { type:'bar', label:'Jumlah Telat', data: data.late.count, backgroundColor:'#f97316' },
            { type:'line', label:'Rata2 Menit', data: data.late.avgMinutes, borderColor:'#0ea5e9', fill:false, tension:0.3, yAxisID:'B' }
          ]
        },
        options: {
          responsive:true,
          scales: {
            y: { position:'left', beginAtZero:true },
            B: { position:'right', grid:{ display:false } }
          },
          plugins:{legend:{position:'top'}}
        }
      });
    }

    // Initial render
    renderCharts(initialData);

    // Chart range handler
    document.getElementById('chartRange').addEventListener('change', function(){
      fetchDashboard();
    });

    // Table filtering
    const searchRecent = document.getElementById('searchRecent');
    const filterStatus = document.getElementById('filterStatus');
    const filterDate = document.getElementById('filterDate');
    const recentTbody = document.getElementById('recentTbody');

    function applyRecentFilter(){
      const q = (searchRecent.value||'').trim().toLowerCase();
      const st = (filterStatus.value||'').trim().toLowerCase();
      const fd = (filterDate.value||'').trim();
      [...recentTbody.querySelectorAll('tr')].forEach(tr=>{
        if(tr.querySelectorAll('td').length === 0) return;
        const nama = tr.children[1].innerText.toLowerCase();
        const kelas = tr.children[2].innerText.toLowerCase();
        const jenis = tr.children[3].innerText.toLowerCase();
        const tgl = tr.children[4].innerText.toLowerCase();
        const s = (tr.getAttribute('data-status')||'').toLowerCase();
        const matchQ = q === '' || nama.includes(q) || kelas.includes(q) || jenis.includes(q);
        const matchS = st === '' || s === st;
        const matchD = fd === '' || tgl.includes(fd);
        tr.style.display = (matchQ && matchS && matchD) ? '' : 'none';
      });
    }

    searchRecent.addEventListener('input', applyRecentFilter);
    filterStatus.addEventListener('change', applyRecentFilter);
    filterDate.addEventListener('change', applyRecentFilter);

    // Export CSV
    document.getElementById('btnExportRecent').addEventListener('click', exportRecentCSV);

    function exportRecentCSV(){
      const rows = [['No','Nama','Kelas','Jenis','Tanggal','Status']];
      const trs = recentTbody.querySelectorAll('tr');
      for(const tr of trs){
        if(tr.style.display === 'none') continue;
        const tds = tr.querySelectorAll('td');
        if(tds.length === 0) continue;
        rows.push([tds[0].innerText, tds[1].innerText, tds[2].innerText, tds[3].innerText, tds[4].innerText, tds[5].innerText]);
      }
      const csv = rows.map(r=>r.map(c=>'"'+String(c).replace(/"/g,'""')+'"').join(',')).join('\n');
      const blob = new Blob([csv], { type: 'text/csv' });
      const a = document.createElement('a');
      a.href = URL.createObjectURL(blob);
      a.download = recent_izin_${new Date().toISOString().slice(0,10)}.csv;
      document.body.appendChild(a);
      a.click();
      a.remove();
    }

    // Modal handling
    const detailModal = document.getElementById('detailModal');
    function openModal(){ detailModal.style.display='flex'; detailModal.setAttribute('aria-hidden','false'); }
    function closeModal(){ detailModal.style.display='none'; detailModal.setAttribute('aria-hidden','true'); }

    function populateDetail(data){
      document.getElementById('m-nama').innerText = data.nama_siswa || data.nama || '-';
      document.getElementById('m-kelas').innerText = data.nama_kelas || data.kelas || '-';
      document.getElementById('m-jenis').innerText = data.jenis_izin || data.jenis || '-';
      document.getElementById('m-tanggal').innerText = data.tanggal_izin || data.tanggal_terlambat || data.created_at || '-';
      document.getElementById('m-jam').innerText = (data.jam_mulai_keluar ? data.jam_mulai_keluar + ' — ' + (data.jam_akhir_kembali || '-') : (data.jam_masuk || '-'));
      document.getElementById('m-status').innerText = data.status_izin || '-';
      document.getElementById('m-alasan').innerText = data.alasan_izin || data.alasan_terlambat || '-';

      const approveBtn = document.getElementById('modalApprove');
      const rejectBtn = document.getElementById('modalReject');
      if((data.status_izin||'').toLowerCase() === 'menunggu'){
        approveBtn.style.display='inline-block';
        rejectBtn.style.display='inline-block';
        approveBtn.setAttribute('data-id', data.id);
        rejectBtn.setAttribute('data-id', data.id);
      } else {
        approveBtn.style.display='none';
        rejectBtn.style.display='none';
      }
    }

    // Detail button delegation
    document.addEventListener('click', async function(e){
      const btn = e.target.closest('.btn-detail');
      if(!btn) return;
      const id = btn.getAttribute('data-id');
      const type = btn.getAttribute('data-type')||'dispensasi';
      openModal();
      
      // Fallback data from table row
      const row = btn.closest('tr');
      const data = {
        id: id,
        nama_siswa: row.children[1].innerText.trim(),
        nama_kelas: row.children[2].innerText.trim(),
        jenis_izin: row.children[3].innerText.trim(),
        tanggal_izin: row.children[4].innerText.trim(),
        status_izin: row.getAttribute('data-status')||'menunggu',
        alasan_izin: 'Contoh alasan izin dari siswa'
      };
      populateDetail(data);
    });

    // Approve/Reject actions
    document.getElementById('modalApprove').addEventListener('click', async function(){
      const id = this.getAttribute('data-id'); 
      if(!id) return;
      closeModal();
      showNotification('Disetujui','Pengajuan berhasil disetujui');
      // In real implementation: make API call here
    });

    document.getElementById('modalReject').addEventListener('click', async function(){
      const id = this.getAttribute('data-id'); 
      if(!id) return;
      closeModal();
      showNotification('Ditolak','Pengajuan berhasil ditolak');
      // In real implementation: make API call here
    });

    // Toast notification
    function showNotification(title,msg,timeout=3000){
      const t = document.getElementById('toast');
      document.getElementById('toastTitle').innerText = title;
      document.getElementById('toastMsg').innerText = msg;
      t.classList.remove('hidden');
      setTimeout(()=>t.classList.add('hidden'), timeout);
    }

    // Quick search student
    document.getElementById('quickSearch').addEventListener('input', function(){
      const q = this.value.trim().toLowerCase();
      [...document.querySelectorAll('#listStudents tr')].forEach(tr=>{
        const tds = tr.querySelectorAll('td'); 
        if(tds.length===0) return;
        const nama = tds[0].innerText.toLowerCase();
        const kelas = tds[1].innerText.toLowerCase();
        tr.style.display = (q===''||nama.includes(q)||kelas.includes(q)) ? '' : 'none';
      });
    });

    // Export students CSV
    function exportStudentsCSV(){
      const rows=[['Nama','Kelas','Jam Keluar','Jam Kembali','Status']];
      const trs=document.querySelectorAll('#listStudents tr');
      for(const tr of trs){
        const tds=tr.querySelectorAll('td');
        if(tds.length===0) continue;
        const jam = tds[2].innerText.split('—');
        rows.push([tds[0].innerText,tds[1].innerText,(jam[0]||'-').trim(),(jam[1]||'-').trim(),tds[3].innerText]);
      }
      const csv = rows.map(r=>r.map(c=>'"'+String(c).replace(/"/g,'""')+'"').join(',')).join('\n');
      const blob=new Blob([csv],{type:'text/csv'});
      const a=document.createElement('a');
      a.href=URL.createObjectURL(blob);
      a.download=students_keluar_${new Date().toISOString().slice(0,10)}.csv;
      document.body.appendChild(a);
      a.click(); 
      a.remove();
    }

    function openModalAddStudent(){
      showNotification('Info', 'Form tambah catatan siswa belum diimplementasikan.');
    }

    // FullCalendar initialization
    (function initCalendar(){
      const calendarEl=document.getElementById('schoolCalendar'); 
      if(!calendarEl) return;
      
      // Sample events
      const events = [
        {
          title: 'Ujian Tengah Semester',
          start: '2025-01-20',
          backgroundColor: '#10b981'
        },
        {
          title: 'Libur Nasional',
          start: '2025-01-25',
          backgroundColor: '#ef4444'
        },
        {
          title: 'Rapat Guru',
          start: '2025-01-30',
          backgroundColor: '#f59e0b'
        }
      ];
      
      const calendar = new FullCalendar.Calendar(calendarEl,{
        initialView:'dayGridMonth',
        height: 540,
        headerToolbar:{left:'prev,next today',center:'title',right:'dayGridMonth,timeGridWeek,listWeek'},
        events: events,
        eventClick:function(info){
          const e=info.event;
          const title=e.title||'Event';
          showNotification(title, 'Detail event: ' + title, 4500);
        }
      });
      calendar.render();
    })();

    // Dark mode toggle
    const darkToggle=document.getElementById('darkToggle');
    darkToggle.addEventListener('click', ()=>{
      document.documentElement.classList.toggle('dark');
      if(document.documentElement.classList.contains('dark')){
        document.body.classList.add('bg-slate-900','text-slate-100');
        darkToggle.innerHTML='<i class="ph-sun text-xl"></i>';
      } else {
        document.body.classList.remove('bg-slate-900','text-slate-100');
        darkToggle.innerHTML='<i class="ph-moon text-xl"></i>';
      }
    });

    // Fetch dashboard function (placeholder)
    async function fetchDashboard(){
      try{
        const range = document.getElementById('chartRange').value || 30;
        console.log('Fetching dashboard data with range:', range);
        // In real implementation: make API call here
        // const res = await fetch(/api/dashboard/summary?range=${range});
        // const payload = await res.json();
        // renderCharts(payload.charts);
        // updateRecentTable(payload.recentIzin);
      }catch(err){
        console.error('fetchDashboard error', err);
      }
    }

    // Initial setup
    document.addEventListener('DOMContentLoaded', function() {
      console.log('Dashboard Admin initialized');

      // Show welcome message
      setTimeout(() => {
        showToast('Selamat Datang!', 'Dashboard Admin berhasil dimuat', 'info');
      }, 500);
    });
  </script>

</body>
</html>
