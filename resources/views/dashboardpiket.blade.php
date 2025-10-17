<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>GOW INSIDE • Dashboard</title>

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

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
  </style>
</head>
<body class="min-h-screen">

  <!-- Header (Topbar) -->
<header class="max-w-[1200px] mx-auto px-4 md:px-6 pt-6 pb-4">
  <div class="glass rounded-2xl px-4 py-3 flex items-center justify-between">
    
    <!-- Kiri: Logo + Tulisan -->
    <div class="flex items-center gap-3">
      <div class="feature-icon flex items-center justify-center w-14 h-14 rounded-full bg-white/80 shadow-md backdrop-blur">
        <img src="{{ asset('assets/smkn13.jpg.png') }}" alt="Logo SMKN 13 Bandung" class="w-10 h-10 object-contain">
      </div>
      <div class="flex flex-col">
        <p class="text-xs tracking-wide text-slate-500">GO INSIDE</p>
        <h1 class="font-extrabold leading-tight">Dashboard Piket</h1>
      </div>
    </div>

    <!-- Kanan: Notifikasi + Logout -->
    <div class="flex items-center gap-3">
      <span id="dot" class="relative w-3 h-3 bg-rose-500 rounded-full ring-2 ring-white hidden"></span>

      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="px-3 py-2 bg-white rounded-lg hover:bg-sky-50 text-sky-700 font-semibold flex items-center gap-1">
          <i class="ph-sign-out"></i> Logout
        </button>
      </form>
    </div>

  </div>
</header>

<!-- LAYOUT -->
<main class="max-w-[1200px] mx-auto px-4 md:px-6 pb-10 flex gap-6">

<!-- Sidebar Nav Sticky -->
<aside class="hidden lg:block sticky top-6 h-fit">
  <nav class="bg-[#eaf1ff] rounded-3xl p-4 flex flex-col gap-4 shadow-soft w-24">
    
    <a href="{{ route('dashboard') }}" 
       class="flex flex-col items-center gap-1 px-2 py-3 bg-white rounded-xl hover:scale-110 transition text-center">
      <i class="ph-house text-2xl text-slate-800"></i>
      <span class="text-xs">Dashboard</span>
    </a>

    <a href="{{ route('dispen') }}" 
       class="flex flex-col items-center gap-1 px-2 py-3 bg-white rounded-xl hover:scale-110 transition text-center">
      <i class="ph-note-pencil text-2xl text-slate-800"></i>
      <span class="text-xs">Dispen</span>
    </a>

    <a href="{{ route('telat') }}" 
       class="flex flex-col items-center gap-1 px-2 py-3 bg-white rounded-xl hover:scale-110 transition text-center">
      <i class="ph-clock text-2xl text-slate-800"></i>
      <span class="text-xs">Telat</span>
    </a>

    <a href="{{ route('waitlist') }}" 
       class="flex flex-col items-center gap-1 px-2 py-3 bg-white rounded-xl hover:scale-110 transition text-center">
      <i class="ph-list-checks text-2xl text-slate-800"></i>
      <span class="text-xs">Waitlist</span>
    </a>

<a href="{{ route('profilpiket.show', 1) }}" 
   class="flex flex-col items-center gap-1 px-2 py-3 bg-white rounded-xl hover:scale-110 transition text-center">
  <i class="ph-user text-2xl text-slate-800"></i>
  <span class="text-xs">Profil</span>
</a>
  </nav>
</aside>

  <!-- CONTENT -->
  <section class="flex-1 space-y-8" id="home">

<!-- WELCOME / PROFIL -->
<div class="glass rounded-[28px] overflow-hidden relative shadow-pop animate-fade">
  <span class="absolute -top-16 -left-16 w-48 h-48 bg-sky-200 blur-3xl rounded-full opacity-60"></span>
  <span class="absolute -bottom-20 -right-20 w-72 h-72 bg-blue-300 blur-3xl rounded-full opacity-40"></span>

  <div class="p-6 md:p-8 flex items-center gap-6 relative z-10">
    <!-- Foto Profil / Icon -->
    <div class="w-40 h-40 md:w-48 md:h-48 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center text-white">
      @if($guru && $guru->foto_profil)
        <img src="{{ asset('storage/profil/' . $guru->foto_profil) }}" alt="Foto Profil" class="w-full h-full object-cover rounded-xl">
      @else
        <i class="ph-user text-6xl"></i>
      @endif
    </div>
    <div class="flex-1">
      <h2 class="text-2xl md:text-[28px] font-extrabold leading-tight">
        Selamat Datang, 
        <span id="username">
          {{ $guru->nama_guru ?? $user->username }}
        </span> 👋
      </h2>
      <p class="text-slate-700 font-semibold -mt-0.5">
        Role: <span id="userRole">
          @if($user->role == 'guru_piket')
            Guru Piket
          @elseif($user->role == 'guru_pengajar')
            Guru Pengajar
          @elseif($user->role == 'admin')
            Administrator
          @else
            {{ ucfirst($user->role) }}
          @endif
        </span>
      </p>
      @if($guru)
      <p class="text-slate-600 text-sm mt-1">
        NIP: {{ $guru->nip ?? '-' }} | 
        @if($guru->mapel_id)
          Mapel: {{ DB::table('mata_pelajaran')->where('id', $guru->mapel_id)->value('nama_mapel') ?? '-' }}
        @else
          Mapel: -
        @endif
      </p>
      @endif
      <div class="mt-3 flex flex-wrap gap-2 text-sm">
        <span class="chip bg-white px-3 py-1 rounded-full inline-flex items-center gap-1">
          <i class="ph-check-circle text-sky-600"></i> Akses terverifikasi
        </span>
        <span class="chip bg-white px-3 py-1 rounded-full inline-flex items-center gap-1">
          <i class="ph-bell-ringing text-sky-600"></i> Notifikasi aktif
        </span>
        @if($guru && $guru->is_piket)
        <span class="chip bg-white px-3 py-1 rounded-full inline-flex items-center gap-1">
          <i class="ph-shield-check text-emerald-600"></i> Tugas Piket
        </span>
        @endif
      </div>
    </div>
    <div class="mt-1 text-sm text-slate-600 text-right space-y-1">
      <div>Jam sekarang: <span id="jamRealTime" class="font-bold"></span></div>
      <div id="tanggalRealTime" class="text-xs text-slate-500"></div>
    </div>
  </div>
</div>

<!-- RINGKASAN IZIN HARI INI -->
<section class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
  <!-- Menunggu -->
  <div class="group bg-gradient-to-br from-white to-blue-50 p-5 rounded-3xl text-center shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1 cursor-pointer border border-slate-100/50">
    <div class="mx-auto w-12 h-12 rounded-full flex items-center justify-center bg-white/70 backdrop-blur-sm shadow-inner group-hover:scale-110 transition-transform duration-300">
      <i class="ph-clock text-xl text-blue-600"></i>
    </div>
    <p class="text-xs text-slate-500 mt-3">Menunggu</p>
    <p class="text-lg font-extrabold text-slate-800 mt-1 count-up"
       data-target="{{ $izinMenunggu }}" id="izinMenunggu">0</p>
  </div>

  <!-- Disetujui -->
  <div class="group bg-gradient-to-br from-white to-blue-50 p-5 rounded-3xl text-center shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1 cursor-pointer border border-slate-100/50">
    <div class="mx-auto w-12 h-12 rounded-full flex items-center justify-center bg-white/70 backdrop-blur-sm shadow-inner group-hover:scale-110 transition-transform duration-300">
      <i class="ph-check-circle text-xl text-emerald-600"></i>
    </div>
    <p class="text-xs text-slate-500 mt-3">Disetujui</p>
    <p class="text-lg font-extrabold text-emerald-700 mt-1 count-up"
       data-target="{{ $izinDisetujui }}" id="izinDisetujui">0</p>
  </div>

  <!-- Ditolak -->
  <div class="group bg-gradient-to-br from-white to-blue-50 p-5 rounded-3xl text-center shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1 cursor-pointer border border-slate-100/50">
    <div class="mx-auto w-12 h-12 rounded-full flex items-center justify-center bg-white/70 backdrop-blur-sm shadow-inner group-hover:scale-110 transition-transform duration-300">
      <i class="ph-x-circle text-xl text-rose-600"></i>
    </div>
    <p class="text-xs text-slate-500 mt-3">Ditolak</p>
    <p class="text-lg font-extrabold text-rose-700 mt-1 count-up"
       data-target="{{ $izinDitolak }}" id="izinDitolak">0</p>
  </div>

  <!-- Terlaksana -->
  <div class="group bg-gradient-to-br from-white to-blue-50 p-5 rounded-3xl text-center shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1 cursor-pointer border border-slate-100/50">
    <div class="mx-auto w-12 h-12 rounded-full flex items-center justify-center bg-white/70 backdrop-blur-sm shadow-inner group-hover:scale-110 transition-transform duration-300">
      <i class="ph-flag-checkered text-xl text-blue-600"></i>
    </div>
    <p class="text-xs text-slate-500 mt-3">Terlaksana</p>
    <p class="text-lg font-extrabold text-blue-700 mt-1 count-up"
       data-target="{{ $izinTerlaksana }}" id="izinTerlaksana">0</p>
  </div>
</section>

<!-- WRAPPER (2 Kolom) -->
<div class="grid lg:grid-cols-2 gap-6">

  <!-- STATISTIK IZIN BULANAN -->
  <section class="bg-white/70 backdrop-blur-md rounded-3xl p-5 shadow-sm border border-slate-100/50">
    <div class="flex items-center justify-between mb-5">
      <h4 class="text-lg md:text-xl font-extrabold text-slate-800 flex items-center gap-2">
        📊 Statistik Izin Bulanan
      </h4>
      <select id="filterIzin" class="px-3 py-1.5 border border-slate-200 rounded-xl text-sm bg-white/80 hover:border-blue-300 transition">
        <option value="all">Semua</option>
        <option value="menunggu">Menunggu</option>
        <option value="disetujui">Disetujui</option>
        <option value="ditolak">Ditolak</option>
        <option value="terlaksana">Terlaksana</option>
      </select>
    </div>
    <div class="relative">
      <canvas id="izinBulananChart" height="100"></canvas>
    </div>
  </section>

  <!-- ALASAN IZIN TERBANYAK -->
  <section class="bg-white/70 backdrop-blur-md rounded-3xl p-5 shadow-sm border border-slate-100/50">
    <h4 class="text-lg md:text-xl font-extrabold mb-4 text-slate-800 flex items-center gap-2">
      📌 Alasan Izin Terbanyak
    </h4>
    <div class="grid md:grid-cols-2 gap-5">
      <!-- Chart Pie -->
      <div class="flex items-center justify-center">
        <canvas id="alasanChart" height="160"></canvas>
      </div>
      <!-- List -->
      <div class="flex flex-col justify-center space-y-3" id="alasanList">
        @foreach($alasanIzin as $alasan)
        <div class="flex items-center justify-between bg-white/90 px-3 py-2 rounded-xl shadow-sm border border-slate-100/70">
          <span class="font-medium text-slate-700 text-sm">{{ $alasan->alasan_izin }}</span>
          <span class="text-sm font-bold text-sky-600">{{ $alasan->total }}</span>
        </div>
        @endforeach
        @if($alasanIzin->isEmpty())
        <div class="text-center text-slate-500 text-sm">Belum ada data alasan izin bulan ini</div>
        @endif
      </div>
    </div>
  </section>

</div>

<!-- PERBANDINGAN KELAS -->
<section class="glass rounded-3xl p-6 shadow-soft">
  <h4 class="text-xl md:text-2xl font-extrabold mb-6">🏫 Perbandingan Kelas yang Sering Izin</h4>
  <canvas id="kelasChart" height="150"></canvas>
</section>

<!-- KALENDER SEKOLAH -->
<section class="glass rounded-3xl p-6 shadow-soft">
  <div class="flex items-center justify-between mb-4">
    <h4 class="text-xl md:text-2xl font-extrabold">📅 Kalender Sekolah</h4>
    <div class="flex items-center gap-2 text-sm">
      <button id="prevMonth" class="px-3 py-2 rounded-xl bg-white hover:bg-bb1 text-sky-700 font-semibold"><i class="ph-caret-left"></i></button>
      <div id="monthLabel" class="min-w-[140px] text-center font-semibold"></div>
      <button id="nextMonth" class="px-3 py-2 rounded-xl bg-white hover:bg-bb1 text-sky-700 font-semibold"><i class="ph-caret-right"></i></button>
    </div>
  </div>

  <!-- Days header -->
  <div class="grid grid-cols-7 text-center text-xs font-semibold text-slate-500 mb-2">
    <div>Sen</div><div>Sel</div><div>Rab</div><div>Kam</div><div>Jum</div><div>Sab</div><div>Min</div>
  </div>

  <!-- Calendar Grid -->
  <div id="calendarGrid" class="grid grid-cols-7 gap-2"></div>

  <!-- Legend -->
  <div class="mt-4 text-xs text-slate-500 flex items-center gap-4">
    <span class="inline-flex items-center gap-1"><span class="w-3 h-3 rounded bg-sky-300 inline-block"></span> Kegiatan</span>
    <span class="inline-flex items-center gap-1"><span class="w-3 h-3 rounded bg-rose-300 inline-block"></span> Libur</span>
    <span class="inline-flex items-center gap-1"><span class="w-3 h-3 rounded bg-emerald-300 inline-block"></span> Ujian</span>
    <span class="inline-flex items-center gap-1"><span class="w-3 h-3 rounded bg-amber-300 inline-block"></span> Rapat</span>
  </div>
</section>

<!-- CTA -->
<section class="glass rounded-3xl p-6 md:p-8 text-center shadow-soft">
  <h5 class="text-xl md:text-2xl font-extrabold">📢 Sistem Perizinan Siswa Digital</h5>
  <p class="text-slate-600 text-sm mt-2">
    Kelola dan pantau semua izin siswa dengan mudah melalui sistem <strong>GOW INSIDE</strong>.
  </p>
  <div class="mt-4 flex flex-col sm:flex-row justify-center gap-3">
    <a href="{{ route('dispen') }}" class="inline-flex rounded-full px-6 py-3 text-white font-semibold btn-primary">Kelola Dispensasi</a>
    <a href="{{ route('telat') }}" class="inline-flex rounded-full px-6 py-3 bg-white hover:bg-bb1 text-sky-700 font-semibold">Kelola Terlambat</a>
  </div>
</section>
</main>

<!-- FOOTER -->
<footer class="text-center py-8 text-slate-500 text-sm">
  ©️ 2025 GOW INSIDE • Dashboard • 
  <a href="https://www.instagram.com" class="underline">Instagram</a> • 
  <a href="https://www.youtube.com" class="underline">YouTube</a>
</footer>

<!-- BACK TO TOP -->
<button id="backToTop" class="fixed bottom-5 right-5 hidden rounded-full p-3 text-white animate-pulseSky"
        style="background:linear-gradient(135deg,var(--sky1),var(--sky2))" aria-label="Kembali ke atas">
  <i class="ph-arrow-up"></i>
</button>

<!-- JavaScript -->
<script>
// Data dari Laravel Backend
const userData = {
  id: {{ $user->id }},
  username: "{{ $user->username }}",
  role: "{{ $user->role }}",
  guru: @json($guru)
};

const statistikHariIni = {
  menunggu: {{ $izinMenunggu }},
  disetujui: {{ $izinDisetujui }},
  ditolak: {{ $izinDitolak }},
  terlaksana: {{ $izinTerlaksana }}
};

const statistikBulananRaw = @json($statBulanan);
const alasanIzinRaw = @json($alasanIzin);
const kelasIzinRaw = @json($kelasIzin);
const kalenderRaw = @json($kalender);

// Animasi Count-Up
document.addEventListener("DOMContentLoaded", () => {
  const counters = document.querySelectorAll(".count-up");
  counters.forEach(counter => {
    const target = +counter.getAttribute("data-target");
    let count = 0;
    const speed = target > 50 ? 5 : 15;
    const updateCount = () => {
      if (count < target) {
        count++;
        counter.innerText = count;
        setTimeout(updateCount, speed);
      } else {
        counter.innerText = target;
      }
    };
    updateCount();
  });

  // Update jam & tanggal realtime
  function updateTime() {
    const now = new Date();
    document.getElementById("jamRealTime").textContent = 
      now.toLocaleTimeString("id-ID", { hour: "2-digit", minute: "2-digit", second: "2-digit" });
    document.getElementById("tanggalRealTime").textContent = 
      now.toLocaleDateString("id-ID", { weekday: "long", year: "numeric", month: "long", day: "numeric" });
  }
  setInterval(updateTime, 1000);
  updateTime();

  // Back to top
  const backToTop = document.getElementById('backToTop');
  window.addEventListener('scroll', () => {
    backToTop.classList.toggle('hidden', window.scrollY < 600);
  });
  backToTop?.addEventListener('click', () => {
    window.scrollTo({top: 0, behavior: 'smooth'});
  });
});

// === Chart Statistik Bulanan ===
const labelsBulanan = statistikBulananRaw.map(item => item.tanggal);
const dataMenunggu = statistikBulananRaw.map(item => parseInt(item.menunggu));
const dataDisetujui = statistikBulananRaw.map(item => parseInt(item.disetujui));
const dataDitolak = statistikBulananRaw.map(item => parseInt(item.ditolak));
const dataTerlaksana = statistikBulananRaw.map(item => parseInt(item.terlaksana));

const ctxBulanan = document.getElementById('izinBulananChart').getContext('2d');
const chartBulanan = new Chart(ctxBulanan, {
  type: 'line',
  data: {
    labels: labelsBulanan,
    datasets: [
      {
        label: 'Menunggu',
        data: dataMenunggu,
        borderColor: '#60a5fa',
        backgroundColor: 'rgba(96, 165, 250, 0.1)',
        tension: 0.3,
        pointRadius: 4,
        pointBackgroundColor: '#60a5fa',
        fill: true
      },
      {
        label: 'Disetujui',
        data: dataDisetujui,
        borderColor: '#34d399',
        backgroundColor: 'rgba(52, 211, 153, 0.1)',
        tension: 0.3,
        pointRadius: 4,
        pointBackgroundColor: '#34d399',
        fill: true
      },
      {
        label: 'Ditolak',
        data: dataDitolak,
        borderColor: '#f87171',
        backgroundColor: 'rgba(248, 113, 113, 0.1)',
        tension: 0.3,
        pointRadius: 4,
        pointBackgroundColor: '#f87171',
        fill: true
      },
      {
        label: 'Terlaksana',
        data: dataTerlaksana,
        borderColor: '#818cf8',
        backgroundColor: 'rgba(129, 140, 248, 0.1)',
        tension: 0.3,
        pointRadius: 4,
        pointBackgroundColor: '#818cf8',
        fill: true
      }
    ]
  },
  options: {
    responsive: true,
    animation: {
      duration: 1000,
      easing: 'easeInOutQuart'
    },
    interaction: {
      intersect: false,
      mode: 'index'
    },
    plugins: {
      legend: {
        position: 'top',
        labels: {
          usePointStyle: true,
          pointStyle: 'circle',
          padding: 15,
          font: { size: 12 }
        }
      },
      tooltip: {
        backgroundColor: '#fff',
        titleColor: '#0f172a',
        bodyColor: '#334155',
        borderColor: '#e2e8f0',
        borderWidth: 1,
        padding: 12,
        cornerRadius: 8,
        displayColors: true,
        callbacks: {
          title: function(context) {
            return `Tanggal: ${context[0].label}`;
          }
        }
      }
    },
    scales: {
      x: {
        grid: { 
          color: 'rgba(0,0,0,0.05)',
          drawBorder: false
        },
        ticks: { 
          color: '#64748b',
          font: { size: 11 }
        }
      },
      y: {
        beginAtZero: true,
        grid: { 
          color: 'rgba(0,0,0,0.05)',
          drawBorder: false
        },
        ticks: { 
          color: '#64748b', 
          precision: 0,
          font: { size: 11 }
        }
      }
    }
  }
});

// Filter Statistik Bulanan
document.getElementById('filterIzin').addEventListener('change', function () {
  const filter = this.value;
  chartBulanan.data.datasets.forEach(dataset => {
    if (filter === 'all') {
      dataset.hidden = false;
    } else {
      dataset.hidden = !(dataset.label.toLowerCase() === filter);
    }
  });
  chartBulanan.update('none');
});

// === Chart Alasan Izin (Pie) ===
if (alasanIzinRaw.length > 0) {
  const alasanLabels = alasanIzinRaw.map(item => item.alasan_izin);
  const alasanCounts = alasanIzinRaw.map(item => parseInt(item.total));

  const ctxAlasan = document.getElementById('alasanChart').getContext('2d');
  new Chart(ctxAlasan, {
    type: 'doughnut',
    data: {
      labels: alasanLabels,
      datasets: [{
        data: alasanCounts,
        backgroundColor: [
          '#60a5fa', '#34d399', '#fbbf24', '#f87171', '#818cf8',
          '#f472b6', '#facc15', '#38bdf8'
        ],
        borderWidth: 2,
        borderColor: '#fff'
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      animation: {
        duration: 1200,
        easing: 'easeInOutQuart'
      },
      plugins: {
        legend: { 
          position: 'bottom',
          labels: {
            padding: 15,
            font: { size: 11 },
            usePointStyle: true
          }
        },
        tooltip: {
          backgroundColor: '#fff',
          titleColor: '#0f172a',
          bodyColor: '#334155',
          borderColor: '#e2e8f0',
          borderWidth: 1,
          padding: 10,
          cornerRadius: 8,
          callbacks: {
            label: function(context) {
              const total = context.dataset.data.reduce((a, b) => a + b, 0);
              const percentage = Math.round((context.parsed / total) * 100);
              return `${context.label}: ${context.parsed} (${percentage}%)`;
            }
          }
        }
      }
    }
  });
} else {
  // Jika tidak ada data alasan
  const ctxAlasan = document.getElementById('alasanChart');
  ctxAlasan.style.display = 'none';
  ctxAlasan.parentNode.innerHTML = '<div class="flex items-center justify-center h-40 text-slate-500 text-sm">Belum ada data alasan izin</div>';
}

// === Chart Perbandingan Kelas (Bar) ===
if (kelasIzinRaw.length > 0) {
  const kelasLabels = kelasIzinRaw.map(item => item.nama_kelas);
  const kelasCounts = kelasIzinRaw.map(item => parseInt(item.total));

  const ctxKelas = document.getElementById('kelasChart').getContext('2d');
  new Chart(ctxKelas, {
    type: 'bar',
    data: {
      labels: kelasLabels,
      datasets: [{
        label: 'Jumlah Izin',
        data: kelasCounts,
        backgroundColor: 'rgba(59, 130, 246, 0.8)',
        borderColor: '#3b82f6',
        borderWidth: 2,
        borderRadius: 6,
        borderSkipped: false
      }]
    },
    options: {
      responsive: true,
      animation: {
        duration: 1000,
        easing: 'easeInOutQuart'
      },
      plugins: {
        legend: { display: false },
        tooltip: {
          backgroundColor: '#fff',
          titleColor: '#0f172a',
          bodyColor: '#334155',
          borderColor: '#e2e8f0',
          borderWidth: 1,
          padding: 10,
          cornerRadius: 8
        }
      },
      scales: {
        x: { 
          grid: { display: false },
          ticks: { 
            color: '#64748b',
            font: { size: 11 }
          }
        },
        y: { 
          beginAtZero: true,
          grid: { 
            color: 'rgba(0,0,0,0.05)',
            drawBorder: false
          },
          ticks: { 
            color: '#64748b', 
            stepSize: 1,
            font: { size: 11 }
          }
        }
      }
    }
  });
} else {
  // Jika tidak ada data kelas
  const ctxKelas = document.getElementById('kelasChart');
  ctxKelas.style.display = 'none';
  ctxKelas.parentNode.innerHTML += '<div class="text-center text-slate-500 text-sm mt-4">Belum ada data izin per kelas bulan ini</div>';
}

// === Kalender Sekolah ===
const monthLabel = document.getElementById("monthLabel");
const calendarGrid = document.getElementById("calendarGrid");
let currentDate = new Date();

// Transform kalender data ke format yang mudah diakses
const kalenderMap = {};
kalenderRaw.forEach(event => {
  kalenderMap[event.tanggal] = {
    type: event.jenis_kegiatan,
    name: event.nama_kegiatan,
    keterangan: event.keterangan
  };
});

function renderCalendar(year, month) {
  calendarGrid.innerHTML = "";
  const firstDay = new Date(year, month, 1).getDay();
  const daysInMonth = new Date(year, month + 1, 0).getDate();
  
  monthLabel.textContent = new Date(year, month).toLocaleDateString("id-ID", {
    month: "long", 
    year: "numeric"
  });
  
  // Empty slots for days before month starts
  const offset = (firstDay + 6) % 7; // Convert Sunday=0 to Monday=0
  for (let i = 0; i < offset; i++) {
    calendarGrid.innerHTML += `<div></div>`;
  }

  // Fill month days
  for (let day = 1; day <= daysInMonth; day++) {
    const dateStr = `${year}-${String(month + 1).padStart(2, "0")}-${String(day).padStart(2, "0")}`;
    const event = kalenderMap[dateStr];
    let bgClass = "bg-white hover:bg-blue-50";
    let badge = "";
    let title = "";
    
    if (event) {
      title = `${event.name}${event.keterangan ? ' - ' + event.keterangan : ''}`;
      switch (event.type) {
        case "libur": 
          bgClass = "bg-rose-200 hover:bg-rose-300"; 
          badge = '<span class="absolute bottom-1 left-1 text-[9px] bg-white/80 px-1 rounded">Libur</span>';
          break;
        case "kegiatan_sekolah": 
          bgClass = "bg-sky-200 hover:bg-sky-300"; 
          badge = '<span class="absolute bottom-1 left-1 text-[9px] bg-white/80 px-1 rounded">Kegiatan</span>';
          break;
        case "ujian": 
          bgClass = "bg-emerald-200 hover:bg-emerald-300"; 
          badge = '<span class="absolute bottom-1 left-1 text-[9px] bg-white/80 px-1 rounded">Ujian</span>';
          break;
        case "rapat": 
          bgClass = "bg-amber-200 hover:bg-amber-300"; 
          badge = '<span class="absolute bottom-1 left-1 text-[9px] bg-white/80 px-1 rounded">Rapat</span>';
          break;
      }
    }
    
    // Check if today
    const today = new Date();
    const isToday = (year === today.getFullYear() && month === today.getMonth() && day === today.getDate());
    if (isToday) {
      bgClass += " ring-2 ring-blue-500";
    }
    
    calendarGrid.innerHTML += `
      <div class="p-2 h-16 rounded-lg ${bgClass} relative cursor-pointer transition-colors" title="${title}">
        <span class="absolute top-1 left-1 text-xs font-semibold ${isToday ? 'text-blue-600' : ''}">${day}</span>
        ${badge}
      </div>
    `;
  }
}

function loadCalendar() {
  renderCalendar(currentDate.getFullYear(), currentDate.getMonth());
}

// Calendar navigation
document.getElementById("prevMonth").onclick = () => { 
  currentDate.setMonth(currentDate.getMonth() - 1); 
  loadCalendar(); 
};

document.getElementById("nextMonth").onclick = () => { 
  currentDate.setMonth(currentDate.getMonth() + 1); 
  loadCalendar(); 
};

// Initialize calendar
loadCalendar();
</script>

</body>
</html>