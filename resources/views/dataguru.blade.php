<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>GOW INSIDE • Daftar Guru</title>

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
          <h1 class="font-extrabold text-base">Daftar Guru</h1>
        </div>
      </div>
      <button id="btnMobileMenu" class="px-3 py-2 rounded-xl bg-white text-sky-700 font-semibold flex items-center gap-2">
        <i class="ph-list"></i> Menu
      </button>
    </div>

    <!-- dropdown -->
    <nav id="mobileMenu" class="hidden mt-2 glass rounded-2xl px-4 py-3">
      <ul class="grid grid-cols-2 gap-2 text-sm">
        <li><a href="#dashboard" class="block p-2 rounded-lg hover:bg-sky-50">Dashboard</a></li>
        <li><a href="#data-guru" class="block p-2 rounded-lg hover:bg-sky-50 bg-sky-100 font-semibold">Data Guru</a></li>
        <li><a href="#data-siswa" class="block p-2 rounded-lg hover:bg-sky-50">Data Siswa</a></li>
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
            <img src="/assets/smkn13.jpg.png" alt="Logo" class="w-10 h-10 object-contain">
          </div>
          <div>
            <p class="text-xs tracking-wide text-slate-500">GO INSIDE</p>
            <h1 class="font-extrabold leading-tight">Data Guru</h1>
          </div>
        </div>

        <div class="flex items-center gap-4">
          <div class="text-right">
            <div id="clockTop" class="font-semibold">--:--:--</div>
            <div id="clockDateTop" class="small-muted text-sm">--</div>
          </div>

          <div class="flex items-center gap-2">
            <button id="refreshNow" title="Refresh data" class="px-3 py-2 bg-sky-50 rounded-lg border hover:bg-sky-100">
              <i class="ph-arrows-clockwise text-sky-600"></i>
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
      
      <!-- SUCCESS MESSAGE -->
      <div id="successAlert" class="hidden mb-6 glass rounded-2xl p-4 border-l-4 border-green-500 animate-fade">
        <div class="flex items-center gap-3">
          <i class="ph-check-circle text-green-600 text-xl"></i>
          <div>
            <h4 class="font-bold text-green-800">Berhasil!</h4>
            <p class="text-green-700 text-sm" id="successMessage">Operasi berhasil dilakukan</p>
          </div>
        </div>
      </div>

      <!-- HEADER SECTION -->
      <section class="glass rounded-[28px] overflow-hidden relative shadow-pop animate-fade mb-8">
        <span class="absolute -top-16 -left-16 w-48 h-48 bg-sky-200 blur-3xl rounded-full opacity-60"></span>
        <span class="absolute -bottom-20 -right-20 w-72 h-72 bg-blue-300 blur-3xl rounded-full opacity-40"></span>

        <div class="p-6 md:p-8 flex flex-col md:flex-row items-center justify-between gap-6 relative z-10">
          <div class="flex items-center gap-6">
            <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white">
              <i class="ph-chalkboard-teacher text-3xl"></i>
            </div>
            <div>
              <h2 class="text-2xl md:text-3xl font-extrabold leading-tight">Manajemen Data Guru</h2>
              <p class="text-slate-700 font-medium">Kelola semua data guru SMKN 13 Bandung</p>
              <div class="mt-3 flex flex-wrap gap-2 text-sm">
                <span class="chip bg-white px-3 py-1 rounded-full inline-flex items-center gap-1">
                  <i class="ph-users text-sky-600"></i> Total: <span id="totalGuru">125</span> Guru
                </span>
                <span class="chip bg-white px-3 py-1 rounded-full inline-flex items-center gap-1">
                  <i class="ph-check-circle text-green-600"></i> Aktif: <span id="totalAktif">118</span>
                </span>
                <span class="chip bg-white px-3 py-1 rounded-full inline-flex items-center gap-1">
                  <i class="ph-pause-circle text-amber-600"></i> Nonaktif: <span id="totalNonaktif">7</span>
                </span>
              </div>
            </div>
          </div>
          
          <div class="flex flex-col gap-3">
            <button onclick="openModalTambah()" class="px-6 py-3 btn-primary rounded-xl font-semibold flex items-center gap-2 shadow-lg hover:scale-105 transition-transform">
              <i class="ph-plus-circle"></i> Tambah Guru
            </button>
            <button onclick="exportData()" class="px-6 py-3 bg-white rounded-xl font-semibold flex items-center gap-2 shadow-md hover:bg-sky-50 transition-colors">
              <i class="ph-download text-sky-600"></i> Export Data
            </button>
          </div>
        </div>
      </section>

      <!-- FILTER & SEARCH -->
      <section class="glass rounded-2xl p-6 mb-6 shadow-soft">
        <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
          <div class="flex flex-col md:flex-row gap-4 flex-1">
            <div class="relative">
              <i class="ph-magnifying-glass absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400"></i>
              <input id="searchInput" type="search" placeholder="Cari nama guru, username, atau mapel..." 
                     class="pl-10 pr-4 py-3 rounded-xl border-2 border-slate-200 focus:border-sky-400 focus:outline-none bg-white/80 backdrop-blur min-w-80">
            </div>
            
            <select id="filterMapel" class="px-4 py-3 rounded-xl border-2 border-slate-200 focus:border-sky-400 focus:outline-none bg-white/80 backdrop-blur">
              <option value="">Semua Mata Pelajaran</option>
              <option value="matematika">Matematika</option>
              <option value="bahasa_indonesia">Bahasa Indonesia</option>
              <option value="bahasa_inggris">Bahasa Inggris</option>
              <option value="ipa">IPA</option>
              <option value="ips">IPS</option>
              <option value="seni_budaya">Seni Budaya</option>
              <option value="pjok">PJOK</option>
              <option value="pkn">PKN</option>
            </select>
            
            <select id="filterStatus" class="px-4 py-3 rounded-xl border-2 border-slate-200 focus:border-sky-400 focus:outline-none bg-white/80 backdrop-blur">
              <option value="">Semua Status</option>
              <option value="aktif">Aktif</option>
              <option value="nonaktif">Nonaktif</option>
            </select>
          </div>
          
          <button onclick="resetFilter()" class="px-4 py-3 bg-slate-100 rounded-xl font-medium hover:bg-slate-200 transition-colors">
            <i class="ph-eraser"></i> Reset Filter
          </button>
        </div>
      </section>

      <!-- DATA TABLE -->
      <section class="glass rounded-2xl overflow-hidden shadow-soft">
        <div class="p-6 border-b border-slate-200/50">
          <h3 class="text-xl font-bold flex items-center gap-2">
            <i class="ph-list text-sky-600"></i> Daftar Guru
          </h3>
        </div>

        <div class="overflow-x-auto">
          <table class="w-full">
            <thead class="bg-slate-50/50 backdrop-blur">
              <tr>
                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                  <button onclick="sortTable(0)" class="flex items-center gap-2 hover:text-sky-600">
                    No <i class="ph-caret-up-down"></i>
                  </button>
                </th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Foto</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                  <button onclick="sortTable(2)" class="flex items-center gap-2 hover:text-sky-600">
                    Nama Guru <i class="ph-caret-up-down"></i>
                  </button>
                </th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                  <button onclick="sortTable(3)" class="flex items-center gap-2 hover:text-sky-600">
                    Username <i class="ph-caret-up-down"></i>
                  </button>
                </th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                  <button onclick="sortTable(4)" class="flex items-center gap-2 hover:text-sky-600">
                    Mata Pelajaran <i class="ph-caret-up-down"></i>
                  </button>
                </th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                  <button onclick="sortTable(5)" class="flex items-center gap-2 hover:text-sky-600">
                    Status <i class="ph-caret-up-down"></i>
                  </button>
                </th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Aksi</th>
              </tr>
            </thead>
            <tbody id="guruTableBody" class="bg-white divide-y divide-slate-200/50">
              <!-- Sample Data -->
              <tr class="hover:bg-sky-50/50 transition-colors group">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">1</td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white font-semibold">
                    AS
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="font-medium text-slate-900">Ahmad Santoso</div>
                  <div class="text-sm text-slate-500">NIP: 1234567890123456</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">ahmad.santoso</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">Matematika</td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <button onclick="toggleStatus(1)" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 hover:bg-green-200 transition-colors">
                    <i class="ph-check-circle mr-1"></i> Aktif
                  </button>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <div class="flex items-center gap-2">
                    <button onclick="editGuru(1)" class="text-blue-600 hover:text-blue-900 p-2 rounded-lg hover:bg-blue-50" title="Edit">
                      <i class="ph-pencil-simple"></i>
                    </button>
                    <button onclick="resetPin(1)" class="text-amber-600 hover:text-amber-900 p-2 rounded-lg hover:bg-amber-50" title="Reset PIN">
                      <i class="ph-key"></i>
                    </button>
                    <button onclick="deleteGuru(1)" class="text-red-600 hover:text-red-900 p-2 rounded-lg hover:bg-red-50" title="Hapus">
                      <i class="ph-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>

              <tr class="hover:bg-sky-50/50 transition-colors group">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">2</td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="w-10 h-10 rounded-full bg-gradient-to-br from-rose-400 to-rose-600 flex items-center justify-center text-white font-semibold">
                    SW
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="font-medium text-slate-900">Siti Wulandari</div>
                  <div class="text-sm text-slate-500">NIP: 1234567890123457</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">siti.wulandari</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">Bahasa Indonesia</td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <button onclick="toggleStatus(2)" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 hover:bg-red-200 transition-colors">
                    <i class="ph-pause-circle mr-1"></i> Nonaktif
                  </button>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <div class="flex items-center gap-2">
                    <button onclick="editGuru(2)" class="text-blue-600 hover:text-blue-900 p-2 rounded-lg hover:bg-blue-50" title="Edit">
                      <i class="ph-pencil-simple"></i>
                    </button>
                    <button onclick="resetPin(2)" class="text-amber-600 hover:text-amber-900 p-2 rounded-lg hover:bg-amber-50" title="Reset PIN">
                      <i class="ph-key"></i>
                    </button>
                    <button onclick="deleteGuru(2)" class="text-red-600 hover:text-red-900 p-2 rounded-lg hover:bg-red-50" title="Hapus">
                      <i class="ph-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>

              <tr class="hover:bg-sky-50/50 transition-colors group">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">3</td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="w-10 h-10 rounded-full bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center text-white font-semibold">
                    BP
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="font-medium text-slate-900">Budi Prasetyo</div>
                  <div class="text-sm text-slate-500">NIP: 1234567890123458</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">budi.prasetyo</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">Bahasa Inggris</td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <button onclick="toggleStatus(3)" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 hover:bg-green-200 transition-colors">
                    <i class="ph-check-circle mr-1"></i> Aktif
                  </button>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <div class="flex items-center gap-2">
                    <button onclick="editGuru(3)" class="text-blue-600 hover:text-blue-900 p-2 rounded-lg hover:bg-blue-50" title="Edit">
                      <i class="ph-pencil-simple"></i>
                    </button>
                    <button onclick="resetPin(3)" class="text-amber-600 hover:text-amber-900 p-2 rounded-lg hover:bg-amber-50" title="Reset PIN">
                      <i class="ph-key"></i>
                    </button>
                    <button onclick="deleteGuru(3)" class="text-red-600 hover:text-red-900 p-2 rounded-lg hover:bg-red-50" title="Hapus">
                      <i class="ph-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- PAGINATION -->
        <div class="px-6 py-4 bg-slate-50/50 backdrop-blur border-t border-slate-200/50">
          <div class="flex items-center justify-between">
            <div class="text-sm text-slate-700">
              Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">10</span> dari <span class="font-medium">125</span> guru
            </div>
            <div class="flex items-center gap-2">
              <button class="px-3 py-2 rounded-lg border border-slate-300 bg-white hover:bg-slate-50 text-sm font-medium disabled:opacity-50">
                <i class="ph-caret-left"></i> Sebelumnya
              </button>
              <button class="px-3 py-2 rounded-lg bg-sky-600 text-white text-sm font-medium">1</button>
              <button class="px-3 py-2 rounded-lg border border-slate-300 bg-white hover:bg-slate-50 text-sm font-medium">2</button>
              <button class="px-3 py-2 rounded-lg border border-slate-300 bg-white hover:bg-slate-50 text-sm font-medium">3</button>
              <button class="px-3 py-2 rounded-lg border border-slate-300 bg-white hover:bg-slate-50 text-sm font-medium">
                Selanjutnya <i class="ph-caret-right"></i>
              </button>
            </div>
          </div>
        </div>
      </section>

    </main>
  </div>

  <!-- MODAL TAMBAH/EDIT GURU -->
  <div id="modalGuru" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="glass rounded-2xl p-6 w-full max-w-2xl max-h-[90vh] overflow-y-auto animate-fade">
      <div class="flex items-center justify-between mb-6">
        <h3 id="modalTitle" class="text-xl font-bold">Tambah Guru Baru</h3>
        <button onclick="closeModal()" class="p-2 rounded-lg hover:bg-slate-100">
          <i class="ph-x text-xl"></i>
        </button>
      </div>
      
      <form id="formGuru" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap</label>
            <input type="text" id="namaGuru" class="w-full px-4 py-3 rounded-xl border-2 border-slate-200 focus:border-sky-400 focus:outline-none">
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">Username</label>
            <input type="text" id="username" class="w-full px-4 py-3 rounded-xl border-2 border-slate-200 focus:border-sky-400 focus:outline-none">
          </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">NIP</label>
            <input type="text" id="nip" class="w-full px-4 py-3 rounded-xl border-2 border-slate-200 focus:border-sky-400 focus:outline-none">
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">Mata Pelajaran</label>
            <select id="mapel" class="w-full px-4 py-3 rounded-xl border-2 border-slate-200 focus:border-sky-400 focus:outline-none">
              <option value="">Pilih Mata Pelajaran</option>
              <option value="matematika">Matematika</option>
              <option value="bahasa_indonesia">Bahasa Indonesia</option>
              <option value="bahasa_inggris">Bahasa Inggris</option>
              <option value="ipa">IPA</option>
              <option value="ips">IPS</option>
              <option value="seni_budaya">Seni Budaya</option>
              <option value="pjok">PJOK</option>
              <option value="pkn">PKN</option>
            </select>
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">Email</label>
            <input type="email" id="email" class="w-full px-4 py-3 rounded-xl border-2 border-slate-200 focus:border-sky-400 focus:outline-none">
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">No. Telepon</label>
            <input type="tel" id="telepon" class="w-full px-4 py-3 rounded-xl border-2 border-slate-200 focus:border-sky-400 focus:outline-none">
          </div>
        </div>

        <div>
          <label class="block text-sm font-medium text-slate-700 mb-2">Password</label>
          <div class="relative">
            <input type="password" id="password" class="w-full px-4 py-3 pr-12 rounded-xl border-2 border-slate-200 focus:border-sky-400 focus:outline-none">
            <button type="button" onclick="togglePassword()" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-400 hover:text-slate-600">
              <i class="ph-eye" id="passwordIcon"></i>
            </button>
          </div>
        </div>

        <div>
          <label class="block text-sm font-medium text-slate-700 mb-2">Status</label>
          <div class="flex gap-4">
            <label class="flex items-center gap-2">
              <input type="radio" name="status" value="aktif" checked class="text-sky-600 focus:ring-sky-500">
              <span>Aktif</span>
            </label>
            <label class="flex items-center gap-2">
              <input type="radio" name="status" value="nonaktif" class="text-sky-600 focus:ring-sky-500">
              <span>Nonaktif</span>
            </label>
          </div>
        </div>

        <div class="flex justify-end gap-3 pt-4 border-t border-slate-200">
          <button type="button" onclick="closeModal()" class="px-6 py-3 rounded-xl border border-slate-300 bg-white hover:bg-slate-50 font-medium">
            Batal
          </button>
          <button type="submit" class="px-6 py-3 btn-primary rounded-xl font-semibold">
            <i class="ph-floppy-disk mr-2"></i> Simpan
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- CONFIRMATION MODAL -->
  <div id="confirmModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="glass rounded-2xl p-6 w-full max-w-md animate-fade">
      <div class="text-center">
        <div class="mx-auto w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4">
          <i class="ph-warning text-2xl text-red-600"></i>
        </div>
        <h3 class="text-lg font-bold text-slate-900 mb-2">Konfirmasi Hapus</h3>
        <p class="text-slate-600 mb-6">Apakah Anda yakin ingin menghapus guru ini? Tindakan ini tidak dapat dibatalkan.</p>
        <div class="flex gap-3 justify-center">
          <button onclick="closeConfirmModal()" class="px-4 py-2 rounded-lg border border-slate-300 bg-white hover:bg-slate-50 font-medium">
            Batal
          </button>
          <button onclick="confirmDelete()" class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 font-semibold">
            Hapus
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript -->
  <script>
    // Sample data
    let guruData = [
      { id: 1, nama: 'Ahmad Santoso', username: 'ahmad.santoso', nip: '1234567890123456', mapel: 'Matematika', email: 'ahmad@smkn13.sch.id', telepon: '081234567890', status: 'aktif' },
      { id: 2, nama: 'Siti Wulandari', username: 'siti.wulandari', nip: '1234567890123457', mapel: 'Bahasa Indonesia', email: 'siti@smkn13.sch.id', telepon: '081234567891', status: 'nonaktif' },
      { id: 3, nama: 'Budi Prasetyo', username: 'budi.prasetyo', nip: '1234567890123458', mapel: 'Bahasa Inggris', email: 'budi@smkn13.sch.id', telepon: '081234567892', status: 'aktif' },
    ];

    let currentEditId = null;
    let deleteId = null;

    // Mobile menu toggle
    document.getElementById('btnMobileMenu').addEventListener('click', function(){
      const m = document.getElementById('mobileMenu');
      m.classList.toggle('hidden');
    });

    // Clock update
    function updateClock(){
      const now = new Date();
      const time = now.toLocaleTimeString('id-ID');
      const date = now.toLocaleDateString('id-ID', { weekday:'long', year:'numeric', month:'long', day:'numeric' });
      
      const clockTop = document.getElementById('clockTop');
      const clockDateTop = document.getElementById('clockDateTop');
      
      if(clockTop) clockTop.innerText = time;
      if(clockDateTop) clockDateTop.innerText = date;
    }
    
    setInterval(updateClock, 1000);
    updateClock();

    // Modal functions
    function openModalTambah() {
      document.getElementById('modalTitle').innerText = 'Tambah Guru Baru';
      document.getElementById('formGuru').reset();
      currentEditId = null;
      document.getElementById('modalGuru').classList.remove('hidden');
    }

    function editGuru(id) {
      const guru = guruData.find(g => g.id === id);
      if (!guru) return;
      
      document.getElementById('modalTitle').innerText = 'Edit Data Guru';
      document.getElementById('namaGuru').value = guru.nama;
      document.getElementById('username').value = guru.username;
      document.getElementById('nip').value = guru.nip;
      document.getElementById('mapel').value = guru.mapel.toLowerCase().replace(' ', '_');
      document.getElementById('email').value = guru.email;
      document.getElementById('telepon').value = guru.telepon;
      document.querySelector(`input[name="status"][value="${guru.status}"]`).checked = true;
      
      currentEditId = id;
      document.getElementById('modalGuru').classList.remove('hidden');
    }

    function closeModal() {
      document.getElementById('modalGuru').classList.add('hidden');
      currentEditId = null;
    }

    function togglePassword() {
      const passwordInput = document.getElementById('password');
      const passwordIcon = document.getElementById('passwordIcon');
      
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordIcon.className = 'ph-eye-slash';
      } else {
        passwordInput.type = 'password';
        passwordIcon.className = 'ph-eye';
      }
    }

    // Form submit
    document.getElementById('formGuru').addEventListener('submit', function(e) {
      e.preventDefault();
      
      const formData = {
        nama: document.getElementById('namaGuru').value,
        username: document.getElementById('username').value,
        nip: document.getElementById('nip').value,
        mapel: document.getElementById('mapel').value,
        email: document.getElementById('email').value,
        telepon: document.getElementById('telepon').value,
        status: document.querySelector('input[name="status"]:checked').value
      };
      
      if (currentEditId) {
        // Update existing guru
        const index = guruData.findIndex(g => g.id === currentEditId);
        if (index !== -1) {
          guruData[index] = { ...guruData[index], ...formData };
          showSuccess('Data guru berhasil diperbarui!');
        }
      } else {
        // Add new guru
        const newId = Math.max(...guruData.map(g => g.id)) + 1;
        guruData.push({ id: newId, ...formData });
        showSuccess('Guru baru berhasil ditambahkan!');
      }
      
      closeModal();
      renderTable();
      updateStats();
    });

    // Delete functions
    function deleteGuru(id) {
      deleteId = id;
      document.getElementById('confirmModal').classList.remove('hidden');
    }

    function closeConfirmModal() {
      document.getElementById('confirmModal').classList.add('hidden');
      deleteId = null;
    }

    function confirmDelete() {
      if (deleteId) {
        guruData = guruData.filter(g => g.id !== deleteId);
        showSuccess('Data guru berhasil dihapus!');
        renderTable();
        updateStats();
      }
      closeConfirmModal();
    }

    // Toggle status
    function toggleStatus(id) {
      const guru = guruData.find(g => g.id === id);
      if (guru) {
        guru.status = guru.status === 'aktif' ? 'nonaktif' : 'aktif';
        showSuccess(`Status guru berhasil diubah menjadi ${guru.status}!`);
        renderTable();
        updateStats();
      }
    }

    // Reset PIN
    function resetPin(id) {
      showSuccess('PIN guru berhasil direset!');
    }

    // Success notification
    function showSuccess(message) {
      const alert = document.getElementById('successAlert');
      const messageEl = document.getElementById('successMessage');
      
      messageEl.textContent = message;
      alert.classList.remove('hidden');
      
      setTimeout(() => {
        alert.classList.add('hidden');
      }, 3000);
    }

    // Render table
    function renderTable(data = guruData) {
      const tbody = document.getElementById('guruTableBody');
      tbody.innerHTML = '';
      
      data.forEach((guru, index) => {
        const initials = guru.nama.split(' ').map(n => n[0]).join('').toUpperCase();
        const colors = ['blue', 'rose', 'green', 'purple', 'amber', 'indigo'];
        const color = colors[guru.id % colors.length];
        
        tbody.innerHTML += `
          <tr class="hover:bg-sky-50/50 transition-colors group">
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">${index + 1}</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="w-10 h-10 rounded-full bg-gradient-to-br from-${color}-400 to-${color}-600 flex items-center justify-center text-white font-semibold">
                ${initials}
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="font-medium text-slate-900">${guru.nama}</div>
              <div class="text-sm text-slate-500">NIP: ${guru.nip}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">${guru.username}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">${guru.mapel.replace('_', ' ').replace(/\b\w/g, l => l.toUpperCase())}</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <button onclick="toggleStatus(${guru.id})" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium ${guru.status === 'aktif' ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-red-100 text-red-800 hover:bg-red-200'} transition-colors">
                <i class="ph-${guru.status === 'aktif' ? 'check' : 'pause'}-circle mr-1"></i> ${guru.status === 'aktif' ? 'Aktif' : 'Nonaktif'}
              </button>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
              <div class="flex items-center gap-2">
                <button onclick="editGuru(${guru.id})" class="text-blue-600 hover:text-blue-900 p-2 rounded-lg hover:bg-blue-50" title="Edit">
                  <i class="ph-pencil-simple"></i>
                </button>
                <button onclick="resetPin(${guru.id})" class="text-amber-600 hover:text-amber-900 p-2 rounded-lg hover:bg-amber-50" title="Reset PIN">
                  <i class="ph-key"></i>
                </button>
                <button onclick="deleteGuru(${guru.id})" class="text-red-600 hover:text-red-900 p-2 rounded-lg hover:bg-red-50" title="Hapus">
                  <i class="ph-trash"></i>
                </button>
              </div>
            </td>
          </tr>
        `;
      });
    }

    // Update stats
    function updateStats() {
      const total = guruData.length;
      const aktif = guruData.filter(g => g.status === 'aktif').length;
      const nonaktif = total - aktif;
      
      document.getElementById('totalGuru').textContent = total;
      document.getElementById('totalAktif').textContent = aktif;
      document.getElementById('totalNonaktif').textContent = nonaktif;
    }

    // Filter functions
    function applyFilters() {
      const searchTerm = document.getElementById('searchInput').value.toLowerCase();
      const mapelFilter = document.getElementById('filterMapel').value;
      const statusFilter = document.getElementById('filterStatus').value;
      
      let filtered = guruData.filter(guru => {
        const matchSearch = guru.nama.toLowerCase().includes(searchTerm) || 
                           guru.username.toLowerCase().includes(searchTerm) ||
                           guru.mapel.toLowerCase().includes(searchTerm);
        const matchMapel = !mapelFilter || guru.mapel.toLowerCase().replace(' ', '_') === mapelFilter;
        const matchStatus = !statusFilter || guru.status === statusFilter;
        
        return matchSearch && matchMapel && matchStatus;
      });
      
      renderTable(filtered);
    }

    function resetFilter() {
      document.getElementById('searchInput').value = '';
      document.getElementById('filterMapel').value = '';
      document.getElementById('filterStatus').value = '';
      renderTable();
    }

    // Event listeners
    document.getElementById('searchInput').addEventListener('input', applyFilters);
    document.getElementById('filterMapel').addEventListener('change', applyFilters);
    document.getElementById('filterStatus').addEventListener('change', applyFilters);

    // Export data
    function exportData() {
      const csvContent = "data:text/csv;charset=utf-8," + 
        "No,Nama,Username,NIP,Mapel,Email,Telepon,Status\n" +
        guruData.map((guru, index) => 
          `${index + 1},"${guru.nama}","${guru.username}","${guru.nip}","${guru.mapel}","${guru.email}","${guru.telepon}","${guru.status}"`
        ).join("\n");
      
      const encodedUri = encodeURI(csvContent);
      const link = document.createElement("a");
      link.setAttribute("href", encodedUri);
      link.setAttribute("download", "data_guru.csv");
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
      
      showSuccess('Data berhasil diekspor ke file CSV!');
    }

    // Sort table
    let sortDirection = 'asc';
    let currentSortColumn = -1;

    function sortTable(columnIndex) {
      if (currentSortColumn === columnIndex) {
        sortDirection = sortDirection === 'asc' ? 'desc' : 'asc';
      } else {
        sortDirection = 'asc';
        currentSortColumn = columnIndex;
      }
      
      const sortedData = [...guruData].sort((a, b) => {
        let aValue, bValue;
        
        switch(columnIndex) {
          case 0: // No
            aValue = a.id;
            bValue = b.id;
            break;
          case 2: // Nama
            aValue = a.nama.toLowerCase();
            bValue = b.nama.toLowerCase();
            break;
          case 3: // Username
            aValue = a.username.toLowerCase();
            bValue = b.username.toLowerCase();
            break;
          case 4: // Mapel
            aValue = a.mapel.toLowerCase();
            bValue = b.mapel.toLowerCase();
            break;
          case 5: // Status
            aValue = a.status;
            bValue = b.status;
            break;
          default:
            return 0;
        }
        
        if (sortDirection === 'asc') {
          return aValue > bValue ? 1 : aValue < bValue ? -1 : 0;
        } else {
          return aValue < bValue ? 1 : aValue > bValue ? -1 : 0;
        }
      });
      
      renderTable(sortedData);
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
      renderTable();
      updateStats();

      // Show welcome message
      setTimeout(() => {
        showToast('Selamat Datang!', 'Halaman Data Guru berhasil dimuat', 'info');
      }, 500);
    });
  </script>

</body>
</html>