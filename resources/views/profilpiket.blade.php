<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>GO INSIDE • Profil Guru Piket</title>

  <!-- TailwindCSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet" />
  <script src="https://unpkg.com/phosphor-icons"></script>

  <!-- AOS Animations -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            ink: '#0f172a',
            sky1: '#57b2ff',
            sky2: '#389eed',
            bb1: '#e6f3ff',
            bb2: '#f8fbff',
          },
          boxShadow: {
            soft: '0 18px 60px rgba(30,64,175,.08)',
            pop:  '0 24px 60px rgba(56,158,237,.14)'
          },
          fontFamily: { pop: ['Poppins','ui-sans-serif','system-ui'] },
          animation: {
            fade: 'fade .7s ease both',
            float: 'float 4.5s ease-in-out infinite',
            pingOnce: 'pingOnce 1.6s ease-in-out 1',
            shimmer: 'shimmer 2.5s linear infinite',
          },
          keyframes: {
            fade: { '0%':{opacity:0, transform:'translateY(14px)'},
                    '100%':{opacity:1, transform:'none'} },
            float: { '0%,100%':{transform:'translateY(0)'},
                     '50%':{transform:'translateY(-6px)'} },
            pingOnce: {
              '0%': { transform:'scale(.9)', opacity:.6 },
              '60%':{ transform:'scale(1.1)', opacity:.3 },
              '100%':{ transform:'scale(1)', opacity:1 }
            },
            shimmer: {
              '0%': { backgroundPosition: '-500px 0' },
              '100%': { backgroundPosition: '500px 0' }
            }
          }
        }
      }
    }
  </script>

  <style>
    :root{ --bb1:#e6f3ff; --bb2:#f8fbff; --ink:#0f172a }
    *{ scroll-behavior:smooth }
    body{
      font-family:'Poppins',sans-serif; color:var(--ink);
      background:
        radial-gradient(800px 520px at -10% -10%, #cfe7ff 0%, transparent 65%),
        radial-gradient(700px 500px at 105% 10%, #cfe7ff 0%, transparent 60%),
        linear-gradient(180deg,var(--bb1) 0%, var(--bb2) 100%);
    }
    .glass{ background:rgba(255,255,255,.8); border:1px solid rgba(255,255,255,.55); backdrop-filter:blur(18px) }
    .lift{ transition:transform .2s ease, box-shadow .2s ease }
    .lift:hover{ transform:translateY(-6px); box-shadow:0 24px 40px rgba(15,23,42,.14) }
    .rounded-3xl{ border-radius:28px }
    .btn{ @apply inline-flex items-center justify-center px-4 py-2 rounded-xl font-semibold transition; }
    .btn-blue{ background-color:#60a5fa; color:#fff; }
    .btn-blue:hover{ background-color:#3b82f6 }
    .btn-white{ background:#fff; border:1px solid #e5e7eb; }
    .btn-white:hover{ background:#f8fafc }
    .skeleton{
      background: linear-gradient(
        90deg,
        rgba(226,232,240,0.7) 25%,
        rgba(255,255,255,0.9) 37%,
        rgba(226,232,240,0.7) 63%
      );
      background-size: 400% 100%;
      animation: shimmer 2.5s linear infinite;
    }
    .switch{ position:relative; width:50px; height:28px; background:#cbd5e1; border-radius:999px; transition:.2s }
    .switch.on{ background:#60a5fa }
    .switch .dot{ position:absolute; top:3px; left:3px; width:22px; height:22px; background:#fff; border-radius:999px; transition:.2s }
    .switch.on .dot{ left:25px }
  </style>
</head>

<body class="min-h-screen">

<!-- ================== HEADER ================== -->
<header class="max-w-[1200px] mx-auto px-4 md:px-6 pt-6 pb-4">
  <div class="glass rounded-2xl px-4 py-3 flex items-center justify-between shadow-md">
    <div class="flex items-center gap-3">
      <div class="feature-icon flex items-center justify-center w-14 h-14 rounded-full bg-white/80 shadow-md">
        <img src="/assets/smkn13.jpg.png" alt="Logo" class="w-10 h-10 object-contain">
      </div>
      <div class="flex flex-col">
        <p class="text-xs tracking-wide text-slate-500">GO INSIDE</p>
        <h1 class="font-extrabold leading-tight">Profil Guru Piket</h1>
      </div>
    </div>
    <div class="hidden md:flex items-center gap-3">
    
    </div>
  </div>
</header>

<!-- ================== MAIN ================== -->
<main class="max-w-[1200px] mx-auto px-4 md:px-6 pb-10 flex gap-6">

  <!-- ===== SIDEBAR ===== -->
  <aside class="hidden lg:block sticky top-6 h-fit">
    <nav class="bg-[#eaf1ff] rounded-3xl p-4 flex flex-col gap-4 shadow-soft w-24">
      <a href="{{ route('dashboard') }}" 
         class="flex flex-col items-center gap-1 px-2 py-3 bg-white rounded-xl hover:bg-blue-100 hover:scale-110 transition text-center">
        <i class="ph-house text-2xl text-slate-800"></i>
        <span class="text-xs">Dashboard</span>
      </a>
      <a href="{{ route('dispen') }}" 
         class="flex flex-col items-center gap-1 px-2 py-3 bg-white rounded-xl hover:bg-blue-100 hover:scale-110 transition text-center">
        <i class="ph-note-pencil text-2xl text-slate-800"></i>
        <span class="text-xs">Dispen</span>
      </a>
      <a href="{{ route('telat') }}" 
         class="flex flex-col items-center gap-1 px-2 py-3 bg-white rounded-xl hover:bg-blue-100 hover:scale-110 transition text-center">
        <i class="ph-clock text-2xl text-slate-800"></i>
        <span class="text-xs">Telat</span>
      </a>
      <a href="{{ route('waitlist') }}" 
         class="flex flex-col items-center gap-1 px-2 py-3 bg-white rounded-xl hover:bg-blue-100 hover:scale-110 transition text-center">
        <i class="ph-list-checks text-2xl text-slate-800"></i>
        <span class="text-xs">Waitlist</span>
      </a>
      <a href="{{ route('profilpiket.show', $guru->id ?? 1) }}" 
         class="flex flex-col items-center gap-1 px-2 py-3 bg-blue-600 text-white rounded-xl shadow-md hover:scale-110 transition text-center">
        <i class="ph-user text-2xl"></i>
        <span class="text-xs">Profil</span>
      </a>
    </nav>
  </aside>

  <!-- ===== CONTENT WRAP ===== -->
  <section class="flex-1 space-y-8">

    <!-- ===== HERO / IDENTITAS ===== -->
    <div class="bg-white rounded-3xl shadow-xl p-8" data-aos="fade-up">
      <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
        <div class="relative">
          <img src="{{ $guru->foto_profil ?? 'https://via.placeholder.com/200x200?text=Foto+Profil' }}" 
               class="w-36 h-36 rounded-2xl object-cover shadow-md animate-pingOnce" alt="Foto Profil">
          <span class="absolute -bottom-2 -right-2 px-3 py-1 text-xs rounded-full bg-sky1/10 text-sky2 font-bold shadow">
            {{ ($guru->jabatan ?? 'Guru Piket') }}
          </span>
        </div>
        <div class="flex-1">
          <h2 class="text-2xl md:text-3xl font-extrabold text-slate-800">{{ $guru->nama_guru ?? 'Nama Guru' }}</h2>
          <p class="text-slate-500">Mengawasi kedisiplinan siswa terkait keluar–masuk selama jam pelajaran.</p>

          <div class="mt-4 flex flex-wrap gap-2">
            <span class="px-3 py-1 text-xs rounded-full bg-green-50 text-green-700 border border-green-200">Aktif</span>
            <span class="px-3 py-1 text-xs rounded-full bg-blue-50 text-blue-700 border border-blue-200">Role: Guru Piket</span>
            <span class="px-3 py-1 text-xs rounded-full bg-violet-50 text-violet-700 border border-violet-200">Mapel: {{ $guru->nama_mapel ?? '-' }}</span>
          </div>

          <div class="mt-4 flex flex-wrap items-center gap-3">
            <a href="https://wa.me/{{ preg_replace('/\\D/','', $guru->no_wa ?? '') }}" target="_blank" class="btn btn-blue gap-2">
              <i class="ph-whatsapp-logo"></i> WhatsApp
            </a>
            <a href="mailto:{{ $guru->email ?? '' }}" class="btn btn-white gap-2">
              <i class="ph-envelope-simple"></i> Email
            </a>
            <button id="btnCopyPhone" class="btn btn-white gap-2">
              <i class="ph-copy-simple"></i> Salin No HP
            </button>
          </div>
        </div>

        <!-- Progress Ring -->
        @php
          $rank = $rankPiket ?? 82; // persentil kinerja piket (dummy jika tak ada)
          $deg = intval($rank * 3.6);
        @endphp
        <div class="min-w-[160px] flex flex-col items-center">
          <div class="relative w-28 h-28">
            <svg viewBox="0 0 36 36" class="w-28 h-28 -rotate-90">
              <path d="M18 2 a 16 16 0 1 1 0 32 a 16 16 0 1 1 0 -32"
                    fill="none" stroke="#e2e8f0" stroke-width="4" />
              <path d="M18 2 a 16 16 0 1 1 0 32 a 16 16 0 1 1 0 -32"
                    stroke-linecap="round" fill="none" stroke="#60a5fa" stroke-width="4"
                    stroke-dasharray="{{ $rank }},100" />
            </svg>
           <div class="absolute inset-0 rotate-0 grid place-items-center">
              <div class="text-center">
                <div class="text-xl font-extrabold text-slate-800">{{ $rank }}%</div>
                <div class="text-[10px] text-slate-500 -mt-1">Performa</div>
              </div>
            </div>
          </div>
          <span class="mt-2 text-xs text-slate-500">Persentil di antara petugas piket</span>
        </div>
      </div>
    </div>

    <!-- ===== QUICK STATS ===== -->
    @php
      $totalAll = ($totalIzinDitangani ?? 0);
      $dsp = ($totalDispensasi ?? 0);
      $tel = ($totalTerlambat ?? 0);
    @endphp
    <div class="grid md:grid-cols-3 gap-4">
      <div class="bg-blue-50 rounded-2xl p-6 text-center shadow lift" data-aos="zoom-in">
        <i class="ph-chart-bar text-3xl text-sky2"></i>
        <div class="text-3xl font-extrabold text-blue-900 mt-1">{{ $totalAll }}</div>
        <div class="text-sm text-slate-600">Total Izin Ditangani (Bulan Ini)</div>
      </div>
      <div class="bg-green-50 rounded-2xl p-6 text-center shadow lift" data-aos="zoom-in" data-aos-delay="100">
        <i class="ph-note-pencil text-3xl text-green-600"></i>
        <div class="text-3xl font-extrabold text-green-800 mt-1">{{ $dsp }}</div>
        <div class="text-sm text-slate-600">Dispen Disetujui</div>
      </div>
      <div class="bg-amber-50 rounded-2xl p-6 text-center shadow lift" data-aos="zoom-in" data-aos-delay="200">
        <i class="ph-clock text-3xl text-amber-600"></i>
        <div class="text-3xl font-extrabold text-amber-800 mt-1">{{ $tel }}</div>
        <div class="text-sm text-slate-600">Terlambat Disetujui</div>
      </div>
    </div>

    <!-- ===== TABS ===== -->
    <div class="bg-white rounded-3xl shadow-xl p-6" data-aos="fade-up">
      <div class="flex items-center gap-2 border-b">
        <button class="tab-btn px-4 py-3 text-sm font-semibold border-b-2 border-transparent hover:text-sky2 data-[active=true]:border-sky2 data-[active=true]:text-sky2" data-tab="info">Info Pribadi</button>
        <button class="tab-btn px-4 py-3 text-sm font-semibold border-b-2 border-transparent hover:text-sky2 data-[active=true]:border-sky2 data-[active=true]:text-sky2" data-tab="grafik">Grafik</button>
        <button class="tab-btn px-4 py-3 text-sm font-semibold border-b-2 border-transparent hover:text-sky2 data-[active=true]:border-sky2 data-[active=true]:text-sky2" data-tab="riwayat">Riwayat</button>
        <button class="tab-btn px-4 py-3 text-sm font-semibold border-b-2 border-transparent hover:text-sky2 data-[active=true]:border-sky2 data-[active=true]:text-sky2" data-tab="aktivitas">Aktivitas</button>
        <div class="ml-auto flex items-center gap-3">
          <div class="flex items-center gap-2 text-xs text-slate-500">
            Mode Ringkas
            <div id="switchCompact" class="switch"><div class="dot"></div></div>
          </div>
          <button class="btn btn-white gap-2" id="btnExport"><i class="ph-download-simple"></i> Export</button>
        </div>
      </div>

      <!-- ===== TAB PANELS ===== -->
      <div class="mt-6">
        <!-- INFO PRIBADI -->
        <div class="tab-panel grid grid-cols-1 md:grid-cols-2 gap-4" id="panel-info">
          @php
            $infos = [
              ['NIP', $guru->nip ?? '-', 'ph-identification-badge'],
              ['Nama', $guru->nama_guru ?? '-', 'ph-user'],
              ['No HP', $guru->no_wa ?? '-', 'ph-phone'],
              ['Tanggal Lahir', $guru->tanggal_lahir ?? '-', 'ph-calendar'],
              ['Email', $guru->email ?? '-', 'ph-envelope-simple'],
              ['Mapel', $guru->nama_mapel ?? '-', 'ph-book'],
              ['Alamat/Domisili', $guru->alamat ?? '-', 'ph-map-pin'],
              ['Jabatan/Role', $guru->jabatan ?? 'Guru Piket', 'ph-shield-star'],
            ];
          @endphp
          @foreach($infos as $info)
            <div class="p-4 bg-slate-50 rounded-xl shadow hover:shadow-pop transition flex items-start gap-3 lift">
              <i class="{{ $info[2] }} mt-1 text-lg text-sky2"></i>
              <div class="flex-1">
                <div class="text-xs text-slate-500">{{ $info[0] }}</div>
                <div class="font-semibold text-slate-800">{{ $info[1] }}</div>
              </div>
              <button class="text-slate-400 hover:text-slate-700" onclick="copyText(`{{ strip_tags($info[1]) }}`)" title="Salin"><i class="ph-copy-simple"></i></button>
            </div>
          @endforeach

          <!-- Kartu Catatan -->
          <div class="md:col-span-2 p-4 rounded-xl border bg-gradient-to-r from-blue-50 to-white">
            <div class="flex items-start gap-3">
              <i class="ph-lightbulb text-2xl text-amber-500 mt-0.5"></i>
              <div class="flex-1">
                <div class="font-bold text-slate-800">Catatan Piket</div>
                <p class="text-sm text-slate-600 mt-1">
                  Pastikan setiap izin tercatat lengkap (alasan, jam keluar/kembali) dan validasi status <em>disetujui</em> hanya setelah konfirmasi guru pengajar terkait.
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- GRAFIK -->
        <div class="tab-panel hidden" id="panel-grafik">
          <div class="grid md:grid-cols-3 gap-4">
            <div class="md:col-span-2 p-4 bg-slate-50 rounded-2xl shadow">
              <div class="flex items-center justify-between">
                <h3 class="font-bold text-slate-800">Tren Izin Bulanan</h3>
                <select id="selChartRange" class="text-sm border rounded-lg px-2 py-1">
                  <option value="6">6 Bulan</option>
                  <option value="12" selected>12 Bulan</option>
                </select>
              </div>
              <canvas id="lineChart" class="mt-3"></canvas>
            </div>
            <div class="p-4 bg-slate-50 rounded-2xl shadow">
              <h3 class="font-bold text-slate-800">Komposisi Izin</h3>
              <canvas id="pieChart" class="mt-3"></canvas>
              <div class="mt-3 text-xs text-slate-500">Perbandingan Dispen vs Terlambat (bulan ini).</div>
            </div>
          </div>
        </div>

        <!-- RIWAYAT -->
        <div class="tab-panel hidden" id="panel-riwayat">
          <div class="flex flex-col md:flex-row md:items-center gap-3">
            <div class="flex items-center gap-2">
              <input id="searchInput" type="text" placeholder="Cari nama/jenis/alasan…" class="px-3 py-2 border rounded-xl w-full md:w-72">
              <button id="btnClear" class="btn btn-white text-sm"><i class="ph-x"></i></button>
            </div>
            <div class="ml-auto flex items-center gap-2">
              <label class="text-sm text-slate-600">Urut:</label>
              <select id="sortSelect" class="text-sm border rounded-lg px-2 py-1">
                <option value="baru">Terbaru</option>
                <option value="lama">Terlama</option>
                <option value="jenis">Jenis Izin</option>
                <option value="status">Status</option>
              </select>
            </div>
          </div>

          <div class="overflow-x-auto mt-4 rounded-2xl border">
            <table class="min-w-full text-sm">
              <thead class="bg-slate-50 text-slate-700">
                <tr>
                  <th class="px-3 py-3 text-left">Tanggal</th>
                  <th class="px-3 py-3 text-left">Siswa</th>
                  <th class="px-3 py-3 text-left">Kelas</th>
                  <th class="px-3 py-3 text-left">Jenis</th>
                  <th class="px-3 py-3 text-left">Alasan</th>
                  <th class="px-3 py-3 text-left">Status</th>
                  <th class="px-3 py-3 text-left">Aksi</th>
                </tr>
              </thead>
              <tbody id="tbodyRiwayat" class="divide-y">
                @php
                  $rows = $recentIzin ?? [];
                @endphp
                @forelse($rows as $r)
                  <tr class="hover:bg-slate-50">
                    <td class="px-3 py-3 whitespace-nowrap">{{ $r['tanggal'] ?? '-' }}</td>
                    <td class="px-3 py-3">{{ $r['nama_siswa'] ?? '-' }}</td>
                    <td class="px-3 py-3">{{ $r['nama_kelas'] ?? '-' }}</td>
                    <td class="px-3 py-3">{{ $r['jenis'] ?? '-' }}</td>
                    <td class="px-3 py-3 max-w-[280px] truncate" title="{{ $r['alasan'] ?? '-' }}">{{ $r['alasan'] ?? '-' }}</td>
                    <td class="px-3 py-3">
                      @php $st = strtolower($r['status'] ?? 'menunggu'); @endphp
                      <span class="px-2 py-1 text-xs rounded-full border
                        @if($st==='disetujui') bg-green-50 text-green-700 border-green-200
                        @elseif($st==='ditolak') bg-rose-50 text-rose-700 border-rose-200
                        @elseif($st==='terlaksana') bg-emerald-50 text-emerald-700 border-emerald-200
                        @else bg-amber-50 text-amber-700 border-amber-200 @endif">
                        {{ ucfirst($st) }}
                      </span>
                    </td>
                    <td class="px-3 py-3">
                      <button class="text-sky2 hover:underline text-xs">Detail</button>
                    </td>
                  </tr>
                @empty
                  <tr><td colspan="7" class="px-3 py-12 text-center text-slate-500">
                    Belum ada data riwayat. <span class="text-slate-400">Data terbaru akan muncul di sini.</span>
                  </td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>

        <!-- AKTIVITAS (TIMELINE + FAQ) -->
        <div class="tab-panel hidden" id="panel-aktivitas">
          <div class="grid lg:grid-cols-2 gap-6">
            <!-- Timeline -->
            <div class="p-4 bg-slate-50 rounded-2xl shadow">
              <h3 class="font-bold text-slate-800 mb-3">Aktivitas Terakhir</h3>
              @php
                $timeline = $rows ? array_slice($rows, 0, 6) : [
                  ['tanggal'=>date('Y-m-d'),'nama_siswa'=>'Budi','jenis'=>'keluar_sementara','status'=>'disetujui','alasan'=>'Urusan keluarga'],
                  ['tanggal'=>date('Y-m-d', strtotime('-1 day')),'nama_siswa'=>'Siti','jenis'=>'terlambat','status'=>'menunggu','alasan'=>'Macet'],
                ];
              @endphp
              <ol class="relative border-s-l border-slate-200 ms-3">
                @foreach($timeline as $t)
                  <li class="mb-6 ms-3">
                    <span class="absolute -start-3.5 flex items-center justify-center w-7 h-7 rounded-full bg-white border {{ (strtolower($t['status'])==='disetujui')?'border-green-300':'border-slate-300' }}">
                      <i class="ph-check text-green-600" style="display:{{ strtolower($t['status'])==='disetujui'?'block':'none' }}"></i>
                      <i class="ph-clock text-amber-600" style="display:{{ strtolower($t['status'])==='menunggu'?'block':'none' }}"></i>
                    </span>
                    <time class="text-xs text-slate-500">{{ $t['tanggal'] }}</time>
                    <h4 class="text-sm font-bold text-slate-800 mt-1">{{ $t['nama_siswa'] }} • {{ ucfirst($t['jenis']) }}</h4>
                    <p class="text-sm text-slate-600">Status: <b>{{ ucfirst($t['status']) }}</b> — {{ $t['alasan'] }}</p>
                  </li>
                @endforeach
              </ol>
            </div>

            <!-- FAQ / Accordion -->
            <div class="p-4 bg-slate-50 rounded-2xl shadow">
              <h3 class="font-bold text-slate-800 mb-3">Panduan Singkat</h3>
              <div class="space-y-3">
                @php
                  $faqs = [
                    ['Bagaimana cara menyetujui izin?','Buka halaman waitlist, pilih permintaan, lalu klik Setujui setelah memverifikasi informasi dari guru pengajar.'],
                    ['Kapan status menjadi “terlaksana”?','Setelah siswa kembali sesuai jadwal dan diverifikasi oleh piket.'],
                    ['Apa yang perlu dicek sebelum menyetujui?','Kesesuaian jadwal guru pengajar, alasan izin, dan jam keluar-kembali.'],
                  ];
                @endphp
                @foreach($faqs as $i=>$f)
                <details class="group bg-white border rounded-xl p-3 hover:shadow">
                  <summary class="flex items-center justify-between cursor-pointer">
                    <span class="font-semibold text-slate-800">{{ $f[0] }}</span>
                    <i class="ph-caret-down transition group-open:rotate-180"></i>
                  </summary>
                  <p class="text-sm text-slate-600 mt-2">{{ $f[1] }}</p>
                </details>
                @endforeach
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

  
  </section>
</main>

<!-- ================== MODAL EDIT ================== -->
<div id="modalEdit" class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden z-50">
  <div class="max-w-2xl mx-auto mt-20 bg-white rounded-3xl shadow-xl overflow-hidden animate-fade">
    <div class="px-6 py-4 border-b flex items-center justify-between">
      <h3 class="font-bold text-slate-800">Edit Profil Guru Piket</h3>
      <button class="text-slate-400 hover:text-slate-700" onclick="toggleModal(false)"><i class="ph-x"></i></button>
    </div>
    <form id="formEdit" action="{{ route('profilpiket.update', $guru->id ?? 1) }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="p-6 grid md:grid-cols-2 gap-4">
        <div>
          <label class="text-sm text-slate-600">Nama</label>
          <input name="nama_guru" value="{{ $guru->nama_guru ?? '' }}" class="w-full border rounded-xl px-3 py-2 mt-1" />
        </div>
        <div>
          <label class="text-sm text-slate-600">NIP</label>
          <input name="nip" value="{{ $guru->nip ?? '' }}" class="w-full border rounded-xl px-3 py-2 mt-1" />
        </div>
        <div>
          <label class="text-sm text-slate-600">No HP</label>
          <input name="no_wa" value="{{ $guru->no_wa ?? '' }}" class="w-full border rounded-xl px-3 py-2 mt-1" />
        </div>
        <div>
          <label class="text-sm text-slate-600">Email</label>
          <input type="email" name="email" value="{{ $guru->email ?? '' }}" class="w-full border rounded-xl px-3 py-2 mt-1" />
        </div>
        <div>
          <label class="text-sm text-slate-600">Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" value="{{ $guru->tanggal_lahir ?? '' }}" class="w-full border rounded-xl px-3 py-2 mt-1" />
        </div>
        <div>
          <label class="text-sm text-slate-600">Mapel</label>
          <input name="mapel_text" value="{{ $guru->nama_mapel ?? '' }}" class="w-full border rounded-xl px-3 py-2 mt-1" placeholder="cth: Pemrograman Web" />
        </div>
        <div class="md:col-span-2">
          <label class="text-sm text-slate-600">Alamat/Domisili</label>
          <textarea name="alamat" rows="3" class="w-full border rounded-xl px-3 py-2 mt-1">{{ $guru->alamat ?? '' }}</textarea>
        </div>
        <div>
          <label class="text-sm text-slate-600">Jabatan/Role</label>
          <input name="jabatan" value="{{ $guru->jabatan ?? 'Guru Piket' }}" class="w-full border rounded-xl px-3 py-2 mt-1" />
        </div>
        <div>
          <label class="text-sm text-slate-600">Foto Profil</label>
          <input type="file" name="foto_profil" accept="image/*" class="w-full border rounded-xl px-3 py-2 mt-1" />
        </div>
      </div>
      <div class="px-6 py-4 flex items-center justify-end gap-2 border-t">
        <button type="button" class="btn btn-white" onclick="toggleModal(false)">Batal</button>
        <button type="submit" class="btn btn-blue"><i class="ph-checks"></i>&nbsp;Simpan</button>
      </div>
    </form>
  </div>
</div>

<!-- ================== TOAST ================== -->
<div id="toast" class="fixed bottom-6 right-6 bg-slate-900 text-white px-4 py-3 rounded-2xl shadow-lg hidden">
  <div class="flex items-center gap-2">
    <i class="ph-check-circle"></i>
    <span id="toastMsg">Tersalin!</span>
  </div>
</div>

<!-- ================== SCRIPTS ================== -->
<script>
  // Init AOS
  AOS.init({ once: true, offset: 40 });

  // Tabs
  const tabBtns = document.querySelectorAll('.tab-btn');
  const panels = {
    info: document.getElementById('panel-info'),
    grafik: document.getElementById('panel-grafik'),
    riwayat: document.getElementById('panel-riwayat'),
    aktivitas: document.getElementById('panel-aktivitas'),
  };
  function setTab(name){
    tabBtns.forEach(b=>b.dataset.active = (b.dataset.tab===name));
    Object.entries(panels).forEach(([k,el])=>{
      if(!el) return;
      if(k===name){ el.classList.remove('hidden'); }
      else { el.classList.add('hidden'); }
    });
    if(name==='grafik'){ drawCharts(); }
  }
  tabBtns.forEach(b=> b.addEventListener('click', ()=> setTab(b.dataset.tab)));
  setTab('info');

  // Compact switch
  const sw = document.getElementById('switchCompact');
  if(sw){
    sw.addEventListener('click', ()=>{
      sw.classList.toggle('on');
      document.querySelectorAll('.lift,.shadow,.shadow-xl,.shadow-soft').forEach(el=>{
        if(sw.classList.contains('on')) el.classList.remove('shadow','shadow-xl','shadow-soft');
        else el.classList.add('shadow');
      });
    });
  }

  // Copy helpers
  function showToast(msg='Tersalin!'){
    const t = document.getElementById('toast');
    document.getElementById('toastMsg').textContent = msg;
    t.classList.remove('hidden'); t.style.opacity = 1;
    setTimeout(()=>{ t.style.transition='opacity .5s'; t.style.opacity=0; setTimeout(()=>t.classList.add('hidden'), 500); }, 1400);
  }
  function copyText(txt){ navigator.clipboard.writeText(txt).then(()=>showToast('Disalin: '+txt)); }
  window.copyText = copyText;

  const btnCopyPhone = document.getElementById('btnCopyPhone');
  if(btnCopyPhone){ btnCopyPhone.addEventListener('click', ()=> copyText(@json($guru->no_wa ?? '')) ); }

  // Modal
  const modal = document.getElementById('modalEdit');
  function toggleModal(show=true){ if(!modal) return; modal.classList.toggle('hidden', !show); }
  document.getElementById('btnEdit')?.addEventListener('click', ()=>toggleModal(true));
  document.getElementById('btnEdit2')?.addEventListener('click', ()=>toggleModal(true));
  modal?.addEventListener('click', (e)=>{ if(e.target===modal) toggleModal(false); });

  // Refresh
  document.getElementById('btnRefresh')?.addEventListener('click', ()=> location.reload());

  // Export (print to PDF via browser)
  document.getElementById('btnExport')?.addEventListener('click', ()=>{
    showToast('Membuka dialog cetak…');
    window.print();
  });

  // Search + Sort Riwayat
  const searchInput = document.getElementById('searchInput');
  const btnClear = document.getElementById('btnClear');
  const sortSelect = document.getElementById('sortSelect');
  const tbody = document.getElementById('tbodyRiwayat');

  function filterRows(){
    if(!tbody) return;
    const q = (searchInput?.value || '').toLowerCase();
    [...tbody.querySelectorAll('tr')].forEach(tr=>{
      const txt = tr.innerText.toLowerCase();
      tr.style.display = txt.includes(q) ? '' : 'none';
    });
  }
  function sortRows(){
    if(!tbody || !sortSelect) return;
    const rows = [...tbody.querySelectorAll('tr')];
    const sel = sortSelect.value;
    rows.sort((a,b)=>{
      const ta = a.children[0]?.innerText || '';
      const tb = b.children[0]?.innerText || '';
      const ja = a.children[3]?.innerText || '';
      const jb = b.children[3]?.innerText || '';
      const sa = a.children[5]?.innerText || '';
      const sb = b.children[5]?.innerText || '';
      if(sel==='baru') return tb.localeCompare(ta);
      if(sel==='lama') return ta.localeCompare(tb);
      if(sel==='jenis') return ja.localeCompare(jb);
      if(sel==='status') return sa.localeCompare(sb);
      return 0;
    });
    rows.forEach(r=>tbody.appendChild(r));
  }
  searchInput?.addEventListener('input', filterRows);
  btnClear?.addEventListener('click', ()=>{ searchInput.value=''; filterRows(); });
  sortSelect?.addEventListener('change', sortRows);

  // Charts
  let lineChart, pieChart;
  function drawCharts(){
    const ctx1 = document.getElementById('lineChart');
    const ctx2 = document.getElementById('pieChart');
    if(!ctx1 || !ctx2) return;

    const labels = @json(($trendBulan ?? []));
    const series = @json(($trendTotal ?? []));

    const fallbackLabels = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
    const fallbackData = [3,5,2,7,6,4,8,9,5,7,6,10];

    const L = (labels && labels.length) ? labels : fallbackLabels;
    const D = (series && series.length) ? series : fallbackData;

    // destroy if exists to avoid duplicate
    if(lineChart){ lineChart.destroy(); }
    if(pieChart){ pieChart.destroy(); }

    lineChart = new Chart(ctx1, {
      type: 'line',
      data: {
        labels: L,
        datasets: [{
          label: 'Total Izin',
          data: D,
          fill: true,
          tension: 0.35,
          borderWidth: 2,
          borderColor: getComputedStyle(document.documentElement).getPropertyValue('--color-line') || '#389eed',
          backgroundColor: 'rgba(56,158,237,0.12)',
          pointRadius: 3
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: false },
          tooltip: { mode: 'index', intersect: false }
        },
        scales: {
          y: { beginAtZero: true, ticks: { precision:0 } }
        }
      }
    });

    const dsp = Number(@json($totalDispensasi ?? 0));
    const tel = Number(@json($totalTerlambat ?? 0));
    const pieData = (dsp===0 && tel===0) ? [1,1] : [dsp, tel];

    pieChart = new Chart(ctx2, {
      type: 'doughnut',
      data: {
        labels: ['Dispen','Terlambat'],
        datasets: [{
          data: pieData,
          borderWidth: 0,
        }]
      },
      options: {
        cutout: '60%',
        plugins: {
          legend: { position: 'bottom' }
        }
      }
    });
  }

  // Initialize charts when Grafik tab opened first time via setTab()

  // Keyboard shortcuts
  document.addEventListener('keydown', (e)=>{
    if(e.key==='e' && (e.ctrlKey||e.metaKey)){ e.preventDefault(); toggleModal(true); }
    if(e.key==='/' ){ e.preventDefault(); document.getElementById('searchInput')?.focus(); }
  });
</script>

</body>
</html>
