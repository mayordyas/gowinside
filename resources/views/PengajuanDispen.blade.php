<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>GO INSIDE • Dashboard Siswa — Dispen</title>

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
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <script src="https://unpkg.com/phosphor-icons"></script>

  <!-- AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

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
    .lift{ transition:transform .2s ease, box-shadow .2s ease }
    .lift:hover{ transform:translateY(-6px); box-shadow:0 24px 40px rgba(15,23,42,.14) }
    .rounded-3xl{ border-radius:28px }
    .btn-blue{ background-color:#60a5fa; color:#fff; transition:all .2s }
    .btn-blue:hover{ background-color:#3b82f6 }
  </style>
</head>
<body class="min-h-screen">

<!-- ===== Header ===== -->
<header class="max-w-[1200px] mx-auto px-4 md:px-6 pt-6 pb-4">
  <div class="glass rounded-2xl px-4 py-3 flex items-center justify-between">
    <div class="flex items-center gap-3">
      <div class="feature-icon flex items-center justify-center w-14 h-14 rounded-full bg-white/80 shadow-md backdrop-blur">
        <img src="/assets/smkn13.jpg.png" alt="Logo" class="w-10 h-10 object-contain">
      </div>
      <div class="flex flex-col">
        <p class="text-xs tracking-wide text-slate-500">GO INSIDE</p>
        <h1 class="font-extrabold leading-tight">Dashboard Siswa</h1>
      </div>
    </div>
  </div>
</header>

<!-- ===== Layout ===== -->
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

  <!-- ===== Content ===== -->
  <section class="flex-1 space-y-8">
    <!-- FORM IZIN -->
    <div class="glass rounded-3xl p-6 shadow-xl animate-fade" data-aos="fade-up">
      <h2 class="text-2xl font-extrabold mb-4 text-center">Form Izin Siswa</h2>

      <form method="POST" action="{{ route('izin.store') }}" class="space-y-4">
        @csrf

        <!-- Nama -->
        <div>
          <label class="block text-sm font-semibold mb-1">Nama Siswa</label>
          <input type="text" name="nama_siswa" placeholder="Masukkan nama siswa"
            class="w-full px-4 py-2 rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-400 transition" required>
        </div>

        <!-- Kelas -->
        <div>
          <label class="block text-sm font-semibold mb-1">Kelas</label>
          <input type="text" name="kelas" placeholder="Masukkan kelas"
            class="w-full px-4 py-2 rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-400 transition" required>
        </div>

        <!-- No HP siswa -->
        <div>
          <label class="block text-sm font-semibold mb-1">No. HP Siswa</label>
          <input type="text" name="no_hp_siswa" placeholder="Masukkan nomor HP siswa"
            class="w-full px-4 py-2 rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-400 transition" required>
        </div>

        <!-- Tanggal & waktu -->
        <div class="grid md:grid-cols-3 gap-4">
          <div>
            <label class="block text-sm font-semibold mb-1">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai"
              class="w-full px-4 py-2 rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-400 transition" required>
          </div>
          <div>
            <label class="block text-sm font-semibold mb-1">Waktu Mulai</label>
            <input type="time" name="waktu_mulai"
              class="w-full px-4 py-2 rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-400 transition" required>
          </div>
          <div>
            <label class="block text-sm font-semibold mb-1">Waktu Kembali</label>
            <input type="time" name="waktu_kembali"
              class="w-full px-4 py-2 rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-400 transition" required>
          </div>
        </div>

        <!-- Alasan -->
        <div>
          <label class="block text-sm font-semibold mb-1">Alasan</label>
          <textarea name="alasan" rows="3" placeholder="Jelaskan alasan izin..."
            class="w-full px-4 py-2 rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-400 transition" required></textarea>
        </div>

        <!-- Guru Pengajar -->
        <div>
          <label class="block text-sm font-semibold mb-1">Guru Pengajar</label>
          <select id="guruPengajar" name="guru_id"
            class="w-full px-4 py-2 rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-400 transition" required>
            <option value="">-- Pilih Guru --</option>
            @foreach($guruPengajar as $guru)
              <option value="{{ $guru->id }}" data-nohp="{{ $guru->no_wa }}">
                {{ $guru->nama_guru }} ({{ $guru->mapel->nama_mapel ?? '-' }})
              </option>
            @endforeach
          </select>
        </div>

        <!-- No HP Guru -->
        <div>
          <label class="block text-sm font-semibold mb-1">No. HP Guru</label>
          <input type="text" id="noHpGuru" readonly
            class="w-full px-4 py-2 rounded-xl border border-slate-300 bg-slate-100 focus:ring-2 focus:ring-blue-400 transition"
            placeholder="Akan muncul otomatis setelah pilih guru">
        </div>

        <!-- Tombol -->
        <div class="flex items-center gap-3 justify-center">
          <button type="submit" class="btn-blue px-6 py-2 rounded-xl font-bold shadow-md">Ajukan Izin</button>
        </div>
      </form>
    </div>
  </section>
</main>

<script>
document.getElementById("guruPengajar").addEventListener("change", function() {
  let nohp = this.options[this.selectedIndex].getAttribute("data-nohp") || "";
  document.getElementById("noHpGuru").value = nohp;
});
</script>

</body>
</html>
