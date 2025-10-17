<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>GOW INSIDE • Izin Dispen Keterlambatan </title>

<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Font & Icons -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet" />
<script src="https://unpkg.com/phosphor-icons"></script>
<!-- ============ STYLE ============ -->
<style>
  :root{
    --bb1:#e6f3ff;   /* baby blue terang */
    --bb2:#f8fbff;   /* putih kebiruan */
    --sky1:#57b2ff;  /* primary */
    --sky2:#389eed;  /* primary darker */
    --ink:#0f172a;   /* slate-900 */
    --muted:#64748b; /* slate-500/600 */
  }
  *{ scroll-behavior:smooth }
  body{
    font-family:'Poppins',sans-serif; color:var(--ink);
    background:
      radial-gradient(800px 520px at -10% -10%, #cfe7ff 0%, transparent 65%),
      radial-gradient(700px 500px at 105% 10%, #cfe7ff 0%, transparent 60%),
      linear-gradient(180deg,var(--bb1) 0%, var(--bb2) 100%);
  }
  .glass{ background:rgba(255,255,255,.86); border:1px solid rgba(255,255,255,.55); backdrop-filter:blur(24px); -webkit-backdrop-filter:blur(24px) }
  .btn-primary{ background:linear-gradient(135deg,var(--sky1) 0%, var(--sky2) 100%); color:#fff; transition:all .2s ease }
  .btn-primary:hover{ transform:translateY(-2px); box-shadow:0 16px 36px rgba(56,158,237,.28) }
  .chip{ box-shadow:0 8px 22px rgba(2,132,199,.12) }
  .lift{ transition:transform .2s ease, box-shadow .2s ease }
  .lift:hover{ transform:translateY(-6px); box-shadow:0 24px 40px rgba(15,23,42,.14) }
  .fade{ animation:fade .7s ease both } @keyframes fade{ from{opacity:0; transform:translateY(14px)} to{opacity:1; transform:none} }
  .float{ animation:float 4.5s ease-in-out infinite } @keyframes float{ 0%,100%{transform:translateY(0)} 50%{transform:translateY(-9px)} }
  .route-card{ transition:all .2s ease }
  .route-card:hover{ outline:2px solid #bae6fd }
  .soft-shadow{ box-shadow:0 18px 60px rgba(30,64,175,.08) }
  .rail{ position:sticky; top:18px }
  .link{ color:#0369a1 } .link:hover{ text-decoration:underline }
  .glow:hover{ filter:drop-shadow(0 6px 22px rgba(56,158,237,.35)) }
  .badge{ font-size:.7rem; letter-spacing:.02em }
  .table-head th{ font-weight:700 }
  .blur-spot{ filter: blur(36px); opacity:.45 }
  .shadow-sky{ box-shadow:0 24px 60px rgba(56,158,237,.14) }
  ::selection{ background:#cde9ff }
  .hide-scrollbar::-webkit-scrollbar{ display:none } .hide-scrollbar{ -ms-overflow-style:none; scrollbar-width:none }
  /* small bar chart for Top Reason */
  .bar { height:10px; border-radius:6px; background:linear-gradient(90deg,#7cc8ff,#4aaef0); }
  /* calendar */
  .cal-day { width:36px; height:36px; display:inline-grid; place-content:center; border-radius:8px; }
  .cal-day:hover{ background:#eef9ff; cursor:pointer; transform:translateY(-2px) }
  .cal-mark { background:linear-gradient(135deg,#57b2ff,#389eed); color:white; }
</style>
</head>
<body class="min-h-screen">
<!-- ====== MOBILE NAV (TOP) ====== -->
<header class="md:hidden px-4 pt-4">
  <div class="glass rounded-2xl px-4 py-3 flex items-center justify-between">
    <div class="flex items-center gap-3">
      <div class="feature-icon flex items-center justify-center">
        <img src="public/assets/smkn13.JPG"
             alt="Logo SMKN 13 Bandung"
             class="w-12 h-12 object-contain">
      </div>
      </div>
      <div>
        <p class="text-[11px] tracking-wide text-slate-500 -mb-1">GOW INSIDE</p>
        <h1 class="font-extrabold text-base">Izin Dispen-Keterlambatan</h1>
      </div>
    </div>
    <button id="btnMobileMenu" class="px-3 py-2 rounded-xl bg-white text-sky-700 font-semibold flex items-center gap-2">
      <i class="ph-list"></i> Menu
    </button>
  </div>

  <!-- dropdown -->
  <nav id="mobileMenu" class="hidden mt-2 glass rounded-2xl px-4 py-3">
    <ul class="grid grid-cols-2 gap-2 text-sm">
      <li><a href="#hero" class="block p-2 rounded-lg hover:bg-sky-50">Beranda</a></li>
      <li><a href="#fitur" class="block p-2 rounded-lg hover:bg-sky-50">Fitur</a></li>
      <li><a href="#stat" class="block p-2 rounded-lg hover:bg-sky-50">Statistik</a></li>
      <li><a href="#riwayat" class="block p-2 rounded-lg hover:bg-sky-50">Riwayat</a></li>
      <li><a href="#alur" class="block p-2 rounded-lg hover:bg-sky-50">Alur</a></li>
      <li><a href="#faq" class="block p-2 rounded-lg hover:bg-sky-50">FAQ</a></li>
      <li><button class="block w-full text-left p-2 rounded-lg hover:bg-sky-50" data-open="login">Login</button></li>
    </ul>
  </nav>
</header>
<!-- ====== TOP NAV (DESKTOP) ====== -->
<header class="hidden md:block max-w-7xl mx-auto px-4 md:px-6 pt-6 pb-4">
  <div class="glass soft-shadow rounded-2xl px-4 md:px-6 py-3 flex items-center justify-between">

    <!-- LOGO + TITLE -->
    <div class="flex items-center gap-3">
     <div class="feature-icon flex items-center justify-center w-14 h-14 rounded-full bg-white/80 shadow-md backdrop-blur">
  <img src="{{ asset('assets/smkn13.jpg.png') }}"
       alt="Logo SMKN 13 Bandung"
       class="w-10 h-10 object-contain">
</div>

      <div>
        <p class="text-sm tracking-wide text-slate-500 -mb-1">GOW INSIDE</p>
        <h1 class="font-extrabold text-lg">Izin Dispen–Terlambat</h1>
      </div>
    </div>

    <!-- NAVIGATION -->
    <nav class="hidden md:flex items-center gap-6 text-sm text-slate-700">
      <a href="#hero" class="hover:text-sky-700">Beranda</a>
      <a href="#fitur" class="hover:text-sky-700">Fitur</a>
      <a href="#stat" class="hover:text-sky-700">Statistik</a>
      <a href="#riwayat" class="hover:text-sky-700">Riwayat</a>
      <a href="#alur" class="hover:text-sky-700">Alur</a>
      <a href="#faq" class="hover:text-sky-700">FAQ</a>
    </nav>

    <!-- ACTION BUTTON -->
    <div class="hidden md:flex items-center gap-3">
      <button class="btn-primary px-4 py-2 rounded-xl font-semibold" data-open="login">
        Login
      </button>
    </div>

  </div>
</header>


<!-- ====== MAIN WRAPPER ====== -->
<main class="max-w-7xl mx-auto px-4 md:px-6 py-8 flex flex-col lg:flex-row gap-6">

  <!-- ====== Left Rail (ikon sticky) ====== -->
  <aside class="hidden lg:block rail">
    <div class="glass rounded-3xl p-4 flex flex-col items-center gap-7 soft-shadow">
      <a class="text-slate-700 hover:scale-110 transition glow" title="Beranda" href="#hero"><i class="ph-house-fill text-3xl"></i></a>
      <a class="text-slate-700 hover:scale-110 transition glow" title="Izin Keluar" href="#fitur"><i class="ph-door-open text-3xl"></i></a>
      <a class="text-slate-700 hover:scale-110 transition glow" title="Izin Masuk" href="#fitur"><i class="ph-door text-3xl"></i></a>
      <a class="text-slate-700 hover:scale-110 transition glow" title="Terlambat" href="#fitur"><i class="ph-timer text-3xl"></i></a>
      <a class="text-slate-700 hover:scale-110 transition glow" title="Riwayat" href="#riwayat"><i class="ph-clock-counter-clockwise text-3xl"></i></a>
      <a class="text-slate-700 hover:scale-110 transition glow" title="Profil" href="#cta"><i class="ph-user-fill text-3xl"></i></a>
    </div>
  </aside>
<!-- ====== Content ====== -->
  <div class="flex-1 space-y-12">

    <!-- ====== HERO ====== -->
    <section id="hero" class="glass rounded-[28px] overflow-hidden relative soft-shadow fade">
      <!-- Bubbles -->
      <span class="absolute -top-16 -left-16 w-48 h-48 bg-sky-200 blur-3xl rounded-full opacity-60"></span>
      <span class="absolute -bottom-20 -right-20 w-72 h-72 bg-blue-300 blur-3xl rounded-full opacity-40"></span>

      <div class="p-6 md:p-10 flex flex-col md:flex-row items-center gap-8 relative z-10">
        <div class="flex-1">
          <p class="text-xs tracking-wider text-slate-500 font-semibold">GOW INSIDE</p>
          <h2 class="text-3xl md:text-5xl font-extrabold leading-tight mt-1">
            Izin <span class="text-sky-600">Dispen</span> – <span class="text-sky-600">Terlambat</span> Sekolah <br class="hidden md:block"> Cepat, Aman, gampang.
          </h2>
          <p class="text-slate-600 mt-3 md:max-w-xl">
            Ajukan izin keluar saat keperluan mendesak, rekam izin masuk kembali dengan <strong>QR Code</strong>, dan pantau status secara <em>real-time</em>.
          </p>

          <div class="mt-6 flex flex-wrap gap-3">
            <button class="rounded-full px-6 py-3 font-semibold bg-white hover:bg-sky-50 text-sky-700 inline-flex items-center gap-2" data-open="login">
              <i class="ph-user-circle"></i> Login
            </button>
          </div>

          <!-- chips -->
          <div class="mt-6 flex flex-wrap gap-2 text-sm">
            <span class="chip bg-white px-3 py-1 rounded-full text-slate-700 inline-flex items-center gap-1"><i class="ph-check-circle text-sky-600"></i> Persetujuan online</span>
            <span class="chip bg-white px-3 py-1 rounded-full text-slate-700 inline-flex items-center gap-1"><i class="ph-bell-ringing text-sky-600"></i> Notifikasi realtime</span>
            <span class="chip bg-white px-3 py-1 rounded-full text-slate-700 inline-flex items-center gap-1"><i class="ph-shield-check text-sky-600"></i> Data aman</span>
          </div>
        </div>
 <!-- ilustrasi -->
        <div class="flex-1 grid place-content-center">
          <!-- ganti ke /assets/logsis.png kalau kamu punya -->
          <img src="assets/siswa.png" alt="Siswa Ilustrasi" class="w-64 md:w-80 float drop-shadow-xl select-none glow">
        </div>
      </div>
    </section>

    <!-- ====== QUICK ACTION BAR ====== -->
    <section class="rounded-3xl bg-sky-50/50 p-5 md:p-6">
      <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        <a href="#fitur" class="glass route-card rounded-2xl p-4 flex items-start gap-3 lift">
          <div class="w-12 h-12 rounded-2xl bg-sky-100 grid place-content-center"><i class="ph-door-open text-2xl text-sky-700"></i></div>
          <div>
            <p class="font-bold">Ajukan Keluar</p>
            <p class="text-xs text-slate-600 -mt-0.5">Keperluan mendesak</p>
          </div>
        </a>
        <a href="#fitur" class="glass route-card rounded-2xl p-4 flex items-start gap-3 lift">
          <div class="w-12 h-12 rounded-2xl bg-emerald-100 grid place-content-center"><i class="ph-door text-2xl text-emerald-600"></i></div>
          <div>
            <p class="font-bold">Catat Masuk</p>
            <p class="text-xs text-slate-600 -mt-0.5">Scan QR gerbang</p>
          </div>
        </a>
        <a href="#fitur" class="glass route-card rounded-2xl p-4 flex items-start gap-3 lift">
          <div class="w-12 h-12 rounded-2xl bg-rose-100 grid place-content-center"><i class="ph-timer text-2xl text-rose-600"></i></div>
          <div>
            <p class="font-bold">Izin Terlambat</p>
            <p class="text-xs text-slate-600 -mt-0.5">Alasan & bukti</p>
          </div>
        </a>
        <a href="#riwayat" class="glass route-card rounded-2xl p-4 flex items-start gap-3 lift">
          <div class="w-12 h-12 rounded-2xl bg-indigo-100 grid place-content-center"><i class="ph-clock-counter-clockwise text-2xl text-indigo-600"></i></div>
          <div>
            <p class="font-bold">Riwayat</p>
            <p class="text-xs text-slate-600 -mt-0.5">Keluar–masuk</p>
          </div>
        </a>
      </div>
    </section>

    <!-- ====== FITUR UTAMA ====== -->
    <section id="fitur" class="space-y-6">
      <div class="text-center">
        <p class="text-xs tracking-widest text-slate-500 font-semibold">FITUR</p>
        <h3 class="text-2xl md:text-3xl font-extrabold">Semua Perizinan dalam Satu Tempat</h3>
      </div>

      <div class="grid md:grid-cols-2 gap-6">
        <!-- Izin Keluar -->
        <div class="glass rounded-3xl p-6 md:p-8 lift">
          <div class="flex items-start gap-4">
            <div class="w-12 h-12 rounded-2xl bg-sky-100 grid place-content-center"><i class="ph-door-open text-xl text-sky-700"></i></div>
            <div>
              <h4 class="text-xl font-bold">Izin Keluar</h4>
              <p class="text-slate-600 text-sm mt-1">Ajukan izin keluar untuk keperluan penting. Status approval oleh wali kelas/BK tercatat otomatis.</p>
              <ul class="mt-3 text-sm text-slate-700 grid sm:grid-cols-2 gap-x-4 gap-y-1 list-disc pl-4">
                <li>Alasan & bukti foto</li><li>QR Code gerbang</li><li>Notifikasi WA/email</li><li>Riwayat lengkap</li>
              </ul>
              <div class="mt-4 flex gap-2">
                <button class="btn-primary px-4 py-2 rounded-xl font-semibold" data-open="login">Ajukan Sekarang</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Izin Masuk (setelah keluar) -->
        <div class="glass rounded-3xl p-6 md:p-8 lift">
          <div class="flex items-start gap-4">
            <div class="w-12 h-12 rounded-2xl bg-emerald-100 grid place-content-center"><i class="ph-door text-xl text-emerald-600"></i></div>
            <div>
              <h4 class="text-xl font-bold">Catat Masuk Kembali</h4>
              <p class="text-slate-600 text-sm mt-1">Saat kembali ke sekolah, scan QR di gerbang untuk mencatat waktu masuk secara real-time.</p>
              <ul class="mt-3 text-sm text-slate-700 grid sm:grid-cols-2 gap-x-4 gap-y-1 list-disc pl-4">
                <li>Scan QR gerbang</li><li>Validasi petugas</li><li>Jam otomatis</li><li>Anti manipulasi</li>
              </ul>
              <div class="mt-4">
                <button class="btn-primary px-4 py-2 rounded-xl font-semibold" data-open="login">Scan & Catat</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Izin Terlambat -->
        <div class="glass rounded-3xl p-6 md:p-8 lift">
          <div class="flex items-start gap-4">
            <div class="w-12 h-12 rounded-2xl bg-rose-100 grid place-content-center"><i class="ph-timer text-xl text-rose-600"></i></div>
            <div>
              <h4 class="text-xl font-bold">Izin Terlambat</h4>
              <p class="text-slate-600 text-sm mt-1">Laporkan keterlambatan dengan alasan jelas, dapatkan validasi petugas, dan simpan sebagai catatan.</p>
              <ul class="mt-3 text-sm text-slate-700 grid sm:grid-cols-2 gap-x-4 gap-y-1 list-disc pl-4">
                <li>Form 30 detik</li><li>Bukti foto/nota</li><li>Verifikasi petugas</li><li>Rekap kelas</li>
              </ul>
              <div class="mt-4 flex gap-2">
                <button class="btn-primary px-4 py-2 rounded-xl font-semibold" data-open="login">Input Terlambat</button>
                <a href="#faq" class="px-4 py-2 rounded-xl bg-white hover:bg-sky-50 text-sky-700 font-semibold">Baca FAQ</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Rekap & Laporan -->
        <div class="glass rounded-3xl p-6 md:p-8 lift">
          <div class="flex items-start gap-4">
            <div class="w-12 h-12 rounded-2xl bg-indigo-100 grid place-content-center"><i class="ph-chart-line-up text-xl text-indigo-600"></i></div>
            <div>
              <h4 class="text-xl font-bold">Rekap & Laporan</h4>
              <p class="text-slate-600 text-sm mt-1">Pantau tren izin harian, bulanan, atau per-kelas. Unduh Excel/PDF untuk arsip sekolah.</p>
              <ul class="mt-3 text-sm text-slate-700 grid sm:grid-cols-2 gap-x-4 gap-y-1 list-disc pl-4">
                <li>Filter tanggal/kelas</li><li>Grafik tren</li><li>Export satu klik</li><li>Arsip otomatis</li>
              </ul>
              <div class="mt-4">
                <a href="#stat" class="btn-primary px-4 py-2 rounded-xl font-semibold">Lihat Statistik</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ====== STATISTIK ====== -->
    <section id="stat">
      <h4 class="text-slate-700 font-semibold mb-4">📊 Statistik Hari Ini</h4>
      <div class="grid grid-cols-2 sm:grid-cols-4 gap-5">
        <div class="bg-[#dbeeff] p-5 rounded-2xl text-center lift">
          <i class="ph-users-three text-3xl text-slate-700"></i>
          <p class="text-xs text-slate-600 mt-2">Total Siswa</p>
          <p class="text-2xl font-extrabold">1.240</p>
        </div>
        <div class="bg-[#dbeeff] p-5 rounded-2xl text-center lift">
          <i class="ph-door-open text-3xl text-slate-700"></i>
          <p class="text-xs text-slate-600 mt-2">Izin Aktif</p>
          <p class="text-2xl font-extrabold">18</p>
        </div>
        <div class="bg-[#dbeeff] p-5 rounded-2xl text-center lift">
          <i class="ph-check-circle text-3xl text-slate-700"></i>
          <p class="text-xs text-slate-600 mt-2">Disetujui (Hari ini)</p>
          <p class="text-2xl font-extrabold">27</p>
        </div>
        <div class="bg-[#dbeeff] p-5 rounded-2xl text-center lift">
          <i class="ph-x-circle text-3xl text-slate-700"></i>
          <p class="text-xs text-slate-600 mt-2">Ditolak (Hari ini)</p>
          <p class="text-2xl font-extrabold">3</p>
        </div>
      </div>
    </section>

    <!-- ====== TOP REASON & KALENDER (REPLACES LOG ACTIVITAS) ====== -->
    <section id="riwayat" class="grid lg:grid-cols-3 gap-6">
      <!-- Top Reason Izin (kolom 1) -->
      <div class="lg:col-span-2 glass rounded-3xl p-6 md:p-8 soft-shadow">
        <div class="flex items-center justify-between mb-4">
          <div>
            <p class="text-xs tracking-widest text-slate-500 font-semibold -mb-1">INSIGHT</p>
            <h4 class="text-2xl font-extrabold">Alasan Izin Terpopuler (Bulan Ini)</h4>
          </div>
          <div class="text-sm text-slate-600">Periode: <strong>1 - 31 Agustus 2025</strong></div>
        </div>

        <!-- list top reasons -->
        <div class="space-y-4">
          <!-- each item: label, count, small bar -->
          <div class="flex items-center gap-4">
            <div class="w-48">
              <p class="font-semibold">Kunjungan Dokter</p>
              <p class="text-xs text-slate-500 mt-1">Izin keluar untuk berobat</p>
            </div>
            <div class="flex-1">
              <div class="bar" style="width:80%"></div>
            </div>
            <div class="w-12 text-right font-bold">64</div>
          </div>

          <div class="flex items-center gap-4">
            <div class="w-48">
              <p class="font-semibold">Keperluan Keluarga</p>
              <p class="text-xs text-slate-500 mt-1">Acara keluarga / darurat</p>
            </div>
            <div class="flex-1">
              <div class="bar" style="width:60%"></div>
            </div>
            <div class="w-12 text-right font-bold">48</div>
          </div>

          <div class="flex items-center gap-4">
            <div class="w-48">
              <p class="font-semibold">Urusan Administrasi</p>
              <p class="text-xs text-slate-500 mt-1">Bank, kantor pemerintahan</p>
            </div>
            <div class="flex-1">
              <div class="bar" style="width:36%"></div>
            </div>
            <div class="w-12 text-right font-bold">29</div>
          </div>

          <div class="flex items-center gap-4">
            <div class="w-48">
              <p class="font-semibold">Event Sekolah</p>
              <p class="text-xs text-slate-500 mt-1">Perwakilan lomba / lomba</p>
            </div>
            <div class="flex-1">
              <div class="bar" style="width:24%"></div>
            </div>
            <div class="w-12 text-right font-bold">19</div>
          </div>
        </div>

        <!-- small note and button -->
        <div class="mt-6 flex items-center justify-between">
          <p class="text-sm text-slate-600">Tampilkan filter untuk kelas / tanggal untuk insight lebih spesifik.</p>
          <div class="flex gap-2">
            <button class="px-4 py-2 rounded-xl bg-white hover:bg-sky-50 text-sky-700 font-semibold">Filter</button>
            <button class="btn-primary px-4 py-2 rounded-xl font-semibold">Export CSV</button>
          </div>
        </div>
      </div>

      <!-- Kalender Izin (kolom 2) -->
      <div class="glass rounded-3xl p-6 md:p-8 soft-shadow">
        <div class="flex items-center justify-between mb-4">
          <div>
            <p class="text-xs tracking-widest text-slate-500 font-semibold -mb-1">KALENDER</p>
            <h4 class="text-2xl font-extrabold">Kalender Izin — Agustus 2025</h4>
          </div>
          <div class="text-sm text-slate-600">Ringkasan: <strong>150 izin</strong></div>
        </div>

        <!-- calendar header -->
        <div class="flex items-center justify-between mb-4">
          <div class="text-sm font-semibold">Agustus 2025</div>
          <div class="text-xs text-slate-500">Klik tanggal untuk melihat detail</div>
        </div>

        <!-- simple calendar grid (Sun-Sat) -->
        <div class="grid grid-cols-7 gap-2 text-xs text-center">
          <div class="text-slate-500">Min</div>
          <div class="text-slate-500">Sen</div>
          <div class="text-slate-500">Sel</div>
          <div class="text-slate-500">Rab</div>
          <div class="text-slate-500">Kam</div>
          <div class="text-slate-500">Jum</div>
          <div class="text-slate-500">Sab</div>

          <!-- empty leading days (for Aug 2025 starts on Fri -> so 5th column, but we'll just render a simple month) -->
          <!-- We'll generate days via JS for correctness -->
        </div>

        <!-- calendar body container -->
        <div id="calendar" class="mt-4 grid grid-cols-7 gap-3 text-sm"></div>

        <!-- legend -->
        <div class="mt-4 flex items-center gap-3 text-xs">
          <div class="w-3 h-3 rounded-full bg-white border border-sky-200"></div><div class="text-slate-600">No izin</div>
          <div class="w-3 h-3 rounded-full bg-sky-600"></div><div class="text-slate-600">Ada izin</div>
          <div class="w-3 h-3 rounded-full bg-emerald-500"></div><div class="text-slate-600">Disetujui</div>
          <div class="w-3 h-3 rounded-full bg-rose-500"></div><div class="text-slate-600">Menunggu/Ditolak</div>
        </div>
      </div>
    </section>

    <!-- ====== ALUR (TIMELINE) ====== -->
    <section id="alur" class="space-y-6">
      <div class="text-center">
        <p class="text-xs tracking-widest text-slate-500 font-semibold">ALUR CEPAT</p>
        <h3 class="text-2xl md:text-3xl font-extrabold">3 Langkah Ajukan Izin</h3>
      </div>

      <div class="grid md:grid-cols-3 gap-6">
        <div class="glass rounded-3xl p-6 text-center lift">
          <div class="w-12 h-12 mx-auto rounded-2xl bg-sky-100 grid place-content-center"><i class="ph-note-pencil text-sky-700"></i></div>
          <h5 class="font-bold mt-3">Isi Form</h5>
          <p class="text-sm text-slate-600">Pilih jenis izin (Keluar/Masuk/Terlambat), cantumkan alasan & bukti jika perlu.</p>
        </div>
        <div class="glass rounded-3xl p-6 text-center lift">
          <div class="w-12 h-12 mx-auto rounded-2xl bg-indigo-100 grid place-content-center"><i class="ph-paper-plane-tilt text-indigo-600"></i></div>
          <h5 class="font-bold mt-3">Kirim & Tunggu</h5>
          <p class="text-sm text-slate-600">Wali kelas/BK menerima permohonan dan menyetujui secara online.</p>
        </div>
        <div class="glass rounded-3xl p-6 text-center lift">
          <div class="w-12 h-12 mx-auto rounded-2xl bg-emerald-100 grid place-content-center"><i class="ph-check-circle text-emerald-600"></i></div>
          <h5 class="font-bold mt-3">Scan & Selesai</h5>
          <p class="text-sm text-slate-600">Gunakan QR di gerbang untuk validasi keluar–masuk dengan aman.</p>
        </div>
      </div>

      <!-- garis timeline panjang (dekorasi) -->
      <div class="relative mt-6">
        <div class="absolute inset-x-0 top-6 h-0.5 bg-gradient-to-r from-sky-200 via-blue-200 to-sky-200"></div>
        <div class="flex items-center justify-between">
          <span class="w-3 h-3 bg-sky-400 rounded-full shadow-sky"></span>
          <span class="w-3 h-3 bg-blue-400 rounded-full shadow-sky"></span>
          <span class="w-3 h-3 bg-emerald-400 rounded-full shadow-sky"></span>
        </div>
      </div>
    </section>

    <!-- ====== BENEFIT ====== -->
    <section class="glass rounded-3xl p-6 md:p-8 soft-shadow">
      <div class="grid md:grid-cols-3 gap-6">
        <div class="space-y-3">
          <div class="w-10 h-10 rounded-xl bg-emerald-100 grid place-content-center"><i class="ph-lightning text-emerald-600"></i></div>
          <h5 class="font-bold">Cepat & Transparan</h5>
          <p class="text-sm text-slate-600">Proses ringkas, pantau status secara langsung tanpa ribet.</p>
        </div>
        <div class="space-y-3">
          <div class="w-10 h-10 rounded-xl bg-indigo-100 grid place-content-center"><i class="ph-lock text-indigo-600"></i></div>
          <h5 class="font-bold">Aman & Terverifikasi</h5>
          <p class="text-sm text-slate-600">QR Code & validasi petugas mencegah kecurangan.</p>
        </div>
        <div class="space-y-3">
          <div class="w-10 h-10 rounded-xl bg-sky-100 grid place-content-center"><i class="ph-devices text-sky-600"></i></div>
          <h5 class="font-bold">Ramah Mobile</h5>
          <p class="text-sm text-slate-600">Tampilan estetik, responsif, dan nyaman dipakai di HP.</p>
        </div>
      </div>
    </section>

    <!-- ====== FAQ ====== -->
    <section id="faq" class="space-y-5">
      <div class="text-center">
        <p class="text-xs tracking-widest text-slate-500 font-semibold">FAQ</p>
        <h3 class="text-2xl md:text-3xl font-extrabold">Pertanyaan yang Sering Diajukan</h3>
      </div>
      <div class="space-y-3">
        <!-- item -->
        <details class="glass rounded-2xl p-4">
          <summary class="cursor-pointer font-semibold flex items-center justify-between">
            Bagaimana cara mengajukan izin keluar?
            <i class="ph-caret-down text-slate-500"></i>
          </summary>
          <p class="mt-2 text-sm text-slate-600">Login, pilih <em>Izin Keluar</em>, isi alasan & unggah bukti (opsional), lalu kirim. Tunggu persetujuan dari wali kelas/BK.</p>
        </details>
        <details class="glass rounded-2xl p-4">
          <summary class="cursor-pointer font-semibold flex items-center justify-between">
            Bagaimana mencatat masuk kembali?
            <i class="ph-caret-down text-slate-500"></i>
          </summary>
          <p class="mt-2 text-sm text-slate-600">Saat kembali, <strong>scan QR</strong> di gerbang. Petugas akan memverifikasi dan data otomatis tercatat.</p>
        </details>
        <details class="glass rounded-2xl p-4">
          <summary class="cursor-pointer font-semibold flex items-center justify-between">
            Apakah data izin saya aman?
            <i class="ph-caret-down text-slate-500"></i>
          </summary>
          <p class="mt-2 text-sm text-slate-600">Ya. Data terenkripsi, akses terbatas, dan setiap izin memiliki jejak audit yang jelas.</p>
        </details>
      </div>
    </section>

    <!-- ====== CTA ====== -->
    <section id="cta" class="glass rounded-3xl p-6 md:p-10 text-center soft-shadow">
      <h4 class="text-2xl md:text-3xl font-extrabold">Siap bikin perizinan lebih rapi?</h4>
      <p class="text-slate-600 mt-2 md:max-w-2xl mx-auto">Bergabung sekarang dan nikmati pengajuan izin yang cepat, transparan, dan estetik.</p>
      <div class="mt-6 flex flex-col sm:flex-row justify-center gap-3">
       <button class="btn-primary px-4 py-2 rounded-xl font-semibold" data-open="login">Login</button>

      </div>
    </section>

    <!-- ====== FOOT CTA MICRO ====== -->
    <section class="glass rounded-3xl p-6 md:p-8 text-center">
      <h5 class="text-xl md:text-2xl font-extrabold">Data aman, akses cepat, tampilan estetik.</h5>
      <p class="text-slate-600 text-sm mt-1">Cocok untuk generasi sekarang—simple, clean, dan user-friendly.</p>
      <button class="btn-primary mt-4 inline-flex rounded-full px-6 py-3 font-semibold" data-open="login">Login Sekarang</button>
    </section>

  </div>
</main>

<!-- ====== FOOTER ====== -->
<footer class="text-center py-10 text-slate-500 text-sm">
  ©️ 2025 GOW INSIDE — Izin Keluar • Masuk • Terlambat
</footer>

<!-- ====== BACK TO TOP ====== -->
<button id="backToTop" class="fixed bottom-5 right-5 hidden btn-primary rounded-full p-3 shadow-lg" aria-label="Kembali ke atas">
  <i class="ph-arrow-up"></i>
</button>

<!-- Overlay -->
<div id="overlay" class="hidden fixed inset-0 bg-slate-900/40 z-40"></div>

<!-- Login Modal -->
<div id="modal-login" class="hidden fixed inset-0 z-50 grid place-items-center p-4">
  <div class="glass rounded-3xl max-w-md w-full p-6 md:p-8 soft-shadow relative">
    <!-- Tombol Close -->
    <button class="absolute top-3 right-3 p-2 rounded-xl hover:bg-slate-100" data-close="login">
      <i class="ph-x"></i>
    </button>

    <!-- Header -->
    <div class="flex items-center gap-3 mb-4">
      <div class="w-10 h-10 rounded-xl bg-white grid place-content-center">
        <i class="ph-user text-sky-600"></i>
      </div>
      <h3 class="text-xl font-extrabold">Login GOW INSIDE</h3>
    </div>

    <!-- ALERT ERROR -->
    @if ($errors->any())
      <div class="mb-3 p-3 rounded-lg bg-red-100 text-red-700 text-sm">
        {{ $errors->first() }}
      </div>
    @endif

    <!-- FORM LOGIN -->
    <form method="POST" action="{{ route('login.submit') }}" class="space-y-5">
      @csrf 

      {{-- Username --}}
      <div>
        <label for="login-username" class="block text-sm font-medium text-gray-700">Username</label>
        <input 
          type="text" name="username" id="login-username"
          class="mt-1 block w-full rounded-xl border border-gray-300 px-4 py-3"
          placeholder="Masukkan username" required>
      </div>

      {{-- Password --}}
      <div>
        <label for="login-password" class="block text-sm font-medium text-gray-700">Password</label>
        <input 
          type="password" name="password" id="login-password"
          class="mt-1 block w-full rounded-xl border border-gray-300 px-4 py-3"
          placeholder="Masukkan password" required>
      </div>

      {{-- Role --}}
      <div>
        <label for="login-role" class="block text-sm font-semibold text-gray-700 mb-1">Pilih Role</label>
        <select 
          id="login-role" name="role"
          class="w-full rounded-xl border border-gray-300 px-4 py-3 pr-10"
          required>
          <option value="">-- Pilih Role --</option>
          <option value="admin">⚙️ Admin</option>
          <option value="guru_piket">📝 Guru Piket</option>
          <option value="guru_pengajar">📘 Guru Pengajar</option>
        </select>
      </div>

      <!-- SUBMIT -->
      <button type="submit" class="btn-primary w-full rounded-xl py-3 font-semibold">Masuk</button>
    </form>
  </div>
</div>

<script>
const overlay = document.getElementById('overlay');
const modalLogin = document.getElementById('modal-login');

function toggleLogin(show=true){
  modalLogin.classList.toggle('hidden', !show);
  overlay.classList.toggle('hidden', !show);
}

// buka modal
document.querySelectorAll('[data-open="login"]').forEach(btn=>{
  btn.addEventListener('click', ()=>toggleLogin(true));
});

// tombol close
document.querySelectorAll('[data-close="login"]').forEach(btn=>{
  btn.addEventListener('click', ()=>toggleLogin(false));
});

// klik overlay
overlay.addEventListener('click', ()=>toggleLogin(false));
</script>



<!-- ====== SCRIPTS INTERAKSI ====== -->
<script>
  // Mobile menu toggle
  const btnMobileMenu = document.getElementById('btnMobileMenu');
  const mobileMenu   = document.getElementById('mobileMenu');
  if(btnMobileMenu){
    btnMobileMenu.addEventListener('click', ()=> mobileMenu.classList.toggle('hidden'));
  }

  // Back to top button
  const backToTop = document.getElementById('backToTop');
  window.addEventListener('scroll', ()=>{
    if(window.scrollY > 600){ backToTop.classList.remove('hidden') }
    else{ backToTop.classList.add('hidden') }
  });
  if(backToTop) backToTop.addEventListener('click', ()=> window.scrollTo({top:0, behavior:'smooth'}));

  // Modal helpers
  const overlay = document.getElementById('overlay');
  const modalLogin = document.getElementById('modal-login');
  const modalDaftar = document.getElementById('modal-daftar');

  function openModal(which){
    overlay.classList.remove('hidden');
    if(which==='login'){ modalLogin.classList.remove('hidden') }
    if(which==='daftar'){ modalDaftar.classList.remove('hidden') }
    document.body.style.overflow = 'hidden';
  }
  function closeModal(which){
    overlay.classList.add('hidden');
    if(which==='login'){ modalLogin.classList.add('hidden') }
    if(which==='daftar'){ modalDaftar.classList.add('hidden') }
    document.body.style.overflow = '';
  }

  // Bind open buttons
  document.querySelectorAll('[data-open]').forEach(btn=>{
    btn.addEventListener('click', ()=> openModal(btn.getAttribute('data-open')));
  });
  // Bind close buttons
  document.querySelectorAll('[data-close]').forEach(btn=>{
    btn.addEventListener('click', ()=> closeModal(btn.getAttribute('data-close')));
  });
  // Switch between login <-> daftar
  document.querySelectorAll('[data-switch]').forEach(btn=>{
    btn.addEventListener('click', ()=>{
      const target = btn.getAttribute('data-switch');
      if(target==='login'){ modalDaftar.classList.add('hidden'); modalLogin.classList.remove('hidden') }
      if(target==='daftar'){ modalLogin.classList.add('hidden'); modalDaftar.classList.remove('hidden') }
    });
  });
  // Close when click overlay
  overlay.addEventListener('click', ()=>{
    closeModal('login'); closeModal('daftar');
  });

  // Bind from mobile menu items with data-open
  document.querySelectorAll('#mobileMenu [data-open]').forEach(btn=>{
    btn.addEventListener('click', ()=>{
      openModal(btn.getAttribute('data-open'));
      mobileMenu.classList.add('hidden');
    });
  });

  // ====== Calendar generation & sample data ======
  // Sample izin data keyed by 'YYYY-MM-DD' with counts and statuses
  const sampleIzin = {
    '2025-08-01': [{type:'Keluar', status:'disetujui'},{type:'Keluar', status:'disetujui'}],
    '2025-08-03': [{type:'Terlambat', status:'menunggu'}],
    '2025-08-05': [{type:'Keluar', status:'ditolak'}],
    '2025-08-14': [{type:'Keluar', status:'disetujui'},{type:'Masuk', status:'terverifikasi'}],
    '2025-08-20': [{type:'Keluar', status:'menunggu'}],
    '2025-08-24': [{type:'Masuk', status:'terverifikasi'},{type:'Terlambat', status:'disetujui'}]
  };

  // Render calendar for a month/year
  function renderCalendar(year, month){
    const calendar = document.getElementById('calendar');
    calendar.innerHTML = '';
    // month: 0-indexed
    const first = new Date(year, month, 1);
    const last = new Date(year, month + 1, 0);
    const startDay = first.getDay(); // 0=Sun
    const days = last.getDate();

    // padding empty slots
    for(let i=0;i<startDay;i++){
      const el = document.createElement('div');
      el.className = 'cal-day';
      calendar.appendChild(el);
    }

    for(let d=1; d<=days; d++){
      const dateStr = `${year}-${String(month+1).padStart(2,'0')}-${String(d).padStart(2,'0')}`;
      const el = document.createElement('div');
      el.className = 'cal-day';
      el.innerText = d;

      // mark if sampleIzin has entry
      if(sampleIzin[dateStr]){
        // decide color based on statuses: if any menunggu/ditolak -> rose, if all disetujui -> emerald else sky
        const statuses = sampleIzin[dateStr].map(x=>x.status);
        let cls = 'bg-sky-600 text-white';
        if(statuses.includes('menunggu') || statuses.includes('ditolak')) cls = 'bg-rose-500 text-white';
        if(statuses.every(s=>s==='disetujui' || s==='terverifikasi')) cls = 'bg-emerald-500 text-white';
        el.classList.add('cal-mark');
        el.style.background = cls.includes('emerald') ? 'linear-gradient(135deg,#34d399,#10b981)' : (cls.includes('rose') ? 'linear-gradient(135deg,#fb7185,#f43f5e)' : 'linear-gradient(135deg,#57b2ff,#389eed)');
        el.style.color = '#fff';
        el.title = sampleIzin[dateStr].map(x=>`${x.type} — ${x.status}`).join('\\n');
        // on click show detail
        el.addEventListener('click', ()=> showDateDetail(dateStr));
      } else {
        // no data
        el.title = 'Tidak ada izin';
      }
      calendar.appendChild(el);
    }
  }

  // Show simple alert modal or toast for date details (for demo, use alert)
  function showDateDetail(dateStr){
    const arr = sampleIzin[dateStr];
    if(!arr){ alert(dateStr + '\\nTidak ada izin.'); return; }
    const lines = arr.map(a=>`• ${a.type} — ${a.status}`).join('\\n');
    alert(`${dateStr}\\n\\n${lines}`);
  }

  // init calendar for Aug 2025
  renderCalendar(2025, 7); // month index 7 = Aug

  // Open/close modal handlers (rebind now that functions exist)
  document.querySelectorAll('[data-open]').forEach(btn=>{
    btn.addEventListener('click', ()=> openModal(btn.getAttribute('data-open')));
  });
  document.querySelectorAll('[data-close]').forEach(btn=>{
    btn.addEventListener('click', ()=> closeModal(btn.getAttribute('data-close')));
  });
  document.querySelectorAll('[data-switch]').forEach(btn=>{
    btn.addEventListener('click', ()=>{
      const target = btn.getAttribute('data-switch');
      if(target==='login'){ modalDaftar.classList.add('hidden'); modalLogin.classList.remove('hidden') }
      if(target==='daftar'){ modalLogin.classList.add('hidden'); modalDaftar.classList.remove('hidden') }
    });
  });

  // Also allow closing modals with Esc
  window.addEventListener('keydown', (e)=>{
    if(e.key === 'Escape'){
      closeModal('login'); closeModal('daftar');
    }
  });
</script>

</body>
</html>

