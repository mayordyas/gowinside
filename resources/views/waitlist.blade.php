{{-- resources/views/waitlist.blade.php --}}
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>GO INSIDE • Waitlist Guru Piket</title>

  <!-- TailwindCSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/phosphor-icons"></script>

  <style>
    /* ---------- Base & Theme ---------- */
    :root{
      --accent: #2563eb;
      --muted: #64748b;
      --glass: rgba(255,255,255,0.86);
      --success: #059669;
      --danger: #dc2626;
      --yellow: #d97706;
    }
    body {
      font-family: 'Poppins', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
      background: linear-gradient(180deg,#f8fbff 0%, #eef6ff 100%);
      color: #0f172a;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }
    .glass {
      background: var(--glass);
      border: 1px solid rgba(255,255,255,0.6);
      backdrop-filter: blur(12px);
    }
    .rounded-3xl { border-radius: 28px; }

    /* ---------- Shadows & micro interaction ---------- */
    .card-shadow { box-shadow: 0 12px 30px rgba(2,6,23,0.06); }
    .soft-shadow { box-shadow: 0 6px 18px rgba(2,6,23,0.04); }

    .row-anim { transition: transform .17s cubic-bezier(.2,.9,.3,1), box-shadow .17s, background .17s; }
    .row-anim:hover { transform: translateY(-6px); box-shadow: 0 14px 36px rgba(2,6,23,0.08); background: linear-gradient(90deg, rgba(239,246,255,0.6), rgba(245,255,250,0.3)); }

    .btn-ghost { background: white; border: 1px solid rgba(2,6,23,0.04); padding: .5rem .75rem; border-radius: 8px; }
    .focus-ring:focus { outline: 3px solid rgba(37,99,235,0.12); outline-offset: 3px; border-radius: 8px; }

    /* tooltip */
    .tooltip {
      position: absolute; left: 110%; top: 50%; transform: translateY(-50%);
      background: #0f172a; color: white; padding: 6px 10px; border-radius: 8px; font-size: 12px;
      white-space: nowrap; opacity: 0; pointer-events: none; transition: opacity .14s, transform .14s;
      transform-origin: left center;
    }
    .has-tooltip:hover .tooltip { opacity: 1; transform: translateY(-50%) translateX(6px); pointer-events:auto; }

    /* modal center */
    .modal-center { display: grid; place-items: center; }

    /* badges */
    .badge { font-size: 12px; padding: 6px 10px; border-radius: 999px; font-weight:700; }

    /* tiny pop */
    @keyframes pop { from { transform: translateY(-6px) scale(.98); opacity: 0 } to { transform: translateY(0) scale(1); opacity:1 } }
    .pop { animation: pop .2s cubic-bezier(.2,.9,.3,1) both; }

    /* disabled */
    .btn-disabled { opacity: .48; pointer-events: none; filter: grayscale(.12); }

    /* readable long text */
    .truncate-ellipsis { max-width: 420px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

    /* small keyboard */
    .kbd { background:#f1f5f9; border-radius:6px; padding:3px 6px; font-size:12px; color:var(--muted); border: 1px solid rgba(2,6,23,0.03); }

    /* responsive tweak for smaller screens */
    @media (max-width: 900px) {
      .hide-sm { display: none; }
    }
  </style>
</head>
<body class="min-h-screen">

  <!-- ================= Header (ASLI - jangan diubah) ================= -->
  <header class="max-w-[1200px] mx-auto px-4 md:px-6 pt-6 pb-4">
    <div class="glass rounded-2xl px-4 py-3 flex items-center justify-between">
      <div class="flex items-center gap-3">
        <div class="flex items-center justify-center w-14 h-14 rounded-full bg-white/80 shadow-md backdrop-blur">
          <img src="/assets/smkn13.jpg.png" alt="Logo" class="w-10 h-10 object-contain">
        </div>
        <div class="flex flex-col">
          <p class="text-xs tracking-wide text-slate-500">GO INSIDE</p>
          <h1 class="font-extrabold leading-tight">Dashboard Guru Piket</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- ================= Layout ================= -->
  <main class="max-w-[1200px] mx-auto px-4 md:px-6 pb-12 flex gap-6">
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
    <!-- ================= Main Content ================= -->
    <section class="flex-1">

      <!-- heading & controls -->
      <div class="flex items-center justify-between mb-6 gap-4">
        <div class="flex items-center gap-3">
          <h2 class="text-2xl font-extrabold flex items-center gap-2">
            <i class="ph-clipboard-text text-blue-500"></i> Daftar Waitlist Izin
          </h2>
          <span class="text-sm text-slate-400">Interaktif — lengkap dengan jam masuk, guru, dan aksi</span>
        </div>

        <div class="flex items-center gap-3">
          <div class="relative hidden md:flex items-center bg-white rounded-full shadow px-4 py-2 gap-2">
            <i class="ph-magnifying-glass text-slate-500"></i>
            <input id="globalSearch" type="text" placeholder="Cari nama / alasan / kelas..." class="outline-none w-72 text-sm bg-transparent" />
          </div>

          <button id="btnPengajuan" class="px-4 py-2 rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold shadow hover:scale-105 transition focus-ring">
            <i class="ph-plus-circle"></i> Pengajuan Baru
          </button>
        </div>
      </div>

      <!-- filters + stats -->
      <div class="grid md:grid-cols-3 gap-4 mb-5">
        <div class="p-3 bg-white rounded-xl glass card-shadow">
          <label class="text-xs text-slate-500">Filter Jenis</label>
          <select id="filterJenis" class="mt-2 w-full px-3 py-2 border rounded-lg focus-ring">
            <option value="all">Semua Jenis</option>
            <option value="Dispensasi">Dispensasi</option>
            <option value="Terlambat">Terlambat</option>
          </select>
        </div>

        <div class="p-3 bg-white rounded-xl glass card-shadow">
          <label class="text-xs text-slate-500">Filter Status</label>
          <select id="filterStatus" class="mt-2 w-full px-3 py-2 border rounded-lg focus-ring">
            <option value="all">Semua Status</option>
            <option value="menunggu">Menunggu</option>
            <option value="disetujui">Disetujui</option>
            <option value="ditolak">Ditolak</option>
          </select>
        </div>

        <div class="p-3 bg-white rounded-xl glass card-shadow flex items-center justify-between">
          <div>
            <div class="text-sm font-bold" id="statsText">Menampilkan 0 data</div>
            <div class="text-xs text-slate-400">Diperbarui otomatis</div>
          </div>
          <div class="flex flex-col gap-2 items-end">
            <button id="resetBtn" class="px-3 py-1 bg-red-50 text-red-600 rounded-lg hover:brightness-95">Reset</button>
            <div class="kbd">/ fokus</div>
          </div>
        </div>
      </div>

      <!-- table card -->
      <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        <!-- header -->
        <div class="px-6 py-3 border-b flex items-center justify-between">
          <div class="flex items-center gap-3">
            <div class="text-sm text-slate-600">Tabel Waitlist</div>
            <div class="text-xs text-slate-400">Klik baris untuk melihat detail lengkap & aksi</div>
          </div>
          <div class="text-xs text-slate-500">Animasi & warna responsif saat interaksi</div>
        </div>

        <!-- table -->
        <div class="overflow-x-auto">
          <table class="w-full text-sm">
            <thead>
              <tr class="bg-slate-50 text-slate-700 text-xs uppercase">
                <th class="px-4 py-3 text-left">No</th>
                <th class="px-4 py-3 text-left">Nama</th>
                <th class="px-4 py-3 text-left">Kelas</th>
                <th class="px-4 py-3 text-left">Jenis Izin</th>
                <th class="px-4 py-3 text-left">Alasan</th>
                <th class="px-4 py-3 text-left">Jam Awal Masuk</th>
                <th class="px-4 py-3 text-left">Jam Akhir Izin</th>
                <th class="px-4 py-3 text-left">Waktu Pengajuan</th>
                <th class="px-4 py-3 text-left">Durasi Menunggu</th>
                <th class="px-4 py-3 text-left">Guru</th>
                <th class="px-4 py-3 text-left">Status</th>
                <th class="px-4 py-3 text-left">Aksi</th>
              </tr>
            </thead>
            <tbody id="waitlistTable">
              {{-- Loop data dari controller --}}
              @foreach($data as $i => $izin)
              <tr class="border-t row-anim has-tooltip" 
                  data-id="{{ $izin->id }}"
                  data-nama="{{ strtolower($izin->nama_siswa) }}"
                  data-jenis="{{ $izin->jenis }}"
                  data-status="{{ strtolower($izin->status) }}"
                  data-kelas="{{ $izin->kelas }}"
                  data-alasan="{{ $izin->alasan }}"
                  data-jam-awal="{{ $izin->jam_awal ?? '' }}"
                  data-jam-akhir="{{ $izin->jam_akhir ?? '' }}"
                  data-created="{{ $izin->created_at }}"
                  data-guru="{{ $izin->guru_pengajar ?? '-' }}"
              >
                <td class="px-4 py-3 font-medium">{{ $i+1 }}</td>
                <td class="px-4 py-3 font-semibold">{{ $izin->nama_siswa }}</td>
                <td class="px-4 py-3">{{ $izin->kelas }}</td>
                <td class="px-4 py-3">
                  <span class="badge" style="background: rgba(37,99,235,0.06); color: var(--accent)">{{ $izin->jenis }}</span>
                </td>
                <td class="px-4 py-3 truncate-ellipsis" title="{{ $izin->alasan }}">{{ $izin->alasan }}</td>
                <td class="px-4 py-3">{{ $izin->jam_awal ?? '-' }}</td>
                <td class="px-4 py-3">{{ $izin->jam_akhir ?? '-' }}</td>
                <td class="px-4 py-3">{{ $izin->created_at }}</td>
                <td class="px-4 py-3 duration-cell" data-time="{{ $izin->created_at }}"></td>
                <td class="px-4 py-3">{{ $izin->guru_pengajar ?? '-' }}</td>
                <td class="px-4 py-3">
                  <span class="px-2 py-1 rounded text-xs font-bold
                    @if($izin->status == 'menunggu') bg-yellow-100 text-yellow-800
                    @elseif($izin->status == 'disetujui') bg-green-100 text-green-800
                    @else bg-red-100 text-red-800 @endif">
                    {{ ucfirst($izin->status) }}
                  </span>
                </td>

                <td class="px-4 py-3">
  <div class="flex items-center gap-2 justify-center">
    {{-- Detail button selalu ada --}}
    <button class="detail-btn px-3 py-1 rounded-lg bg-white border text-xs hover:shadow-sm focus-ring" title="Lihat detail">
      <i class="ph-eye"></i>
    </button>

    {{-- Cetak QR hanya kalau jenis = dispensasi & status = disetujui --}}
    @if($izin->status == 'disetujui' && $izin->jenis == 'dispensasi')
      <a href="{{ url('/izin/'.$izin->id.'/qrcode') }}" target="_blank" 
         class="px-3 py-1 rounded-lg bg-blue-600 text-white text-xs hover:brightness-95 focus-ring" title="Cetak QR">
        <i class="ph-qrcode"></i>
      </a>
    @else
      <button class="px-3 py-1 rounded-lg bg-slate-100 text-xs text-slate-400 btn-disabled" title="QR hanya tersedia untuk Dispensasi yang disetujui" disabled>
        <i class="ph-qrcode"></i>
      </button>
    @endif
  </div>
</td>

              </tr>
              @endforeach
              {{-- end loop --}}
            </tbody>
          </table>
        </div>

        <!-- footer -->
        <div class="px-6 py-3 border-t flex items-center justify-between">
          <div class="text-sm text-slate-600" id="summaryText">Menampilkan <span id="visibleCount">0</span> dari <span id="totalCount">0</span> data</div>
          <div class="flex items-center gap-2">
            <button id="prevPage" class="px-3 py-1 bg-white border rounded-lg text-sm focus-ring">Prev</button>
            <button id="nextPage" class="px-3 py-1 bg-white border rounded-lg text-sm focus-ring">Next</button>
          </div>
        </div>
      </div>

      {{-- DETAIL MODAL --}}
      <div id="detailModal" class="fixed inset-0 hidden modal-center z-50">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative bg-white rounded-2xl shadow-xl max-w-3xl w-full mx-4 p-6 pop z-10">
          <button id="closeDetail" class="absolute top-4 right-4 text-slate-500 hover:text-red-500">
            <i class="ph-x text-xl"></i>
          </button>

          <div class="flex gap-6">
            <div class="w-36 h-36 rounded-lg bg-slate-50 flex items-center justify-center">
              <div id="modalStatus" class="text-xs font-bold px-3 py-1 rounded-full"></div>
            </div>

            <div class="flex-1">
              <h3 id="modalName" class="text-2xl font-bold"></h3>
              <div id="modalClass" class="text-sm text-slate-500 mb-2"></div>
              <div id="modalReason" class="text-sm mb-4"></div>

              <div class="grid grid-cols-2 gap-3">
                <div class="p-3 bg-slate-50 rounded-lg">
                  <div class="text-xs text-slate-400">Jam Awal Masuk</div>
                  <div id="modalJamAwal" class="font-medium"></div>
                </div>
                <div class="p-3 bg-slate-50 rounded-lg">
                  <div class="text-xs text-slate-400">Jam Akhir Izin</div>
                  <div id="modalJamAkhir" class="font-medium"></div>
                </div>
              </div>

              <div class="grid grid-cols-2 gap-3 mt-3">
                <div class="p-3 bg-slate-50 rounded-lg">
                  <div class="text-xs text-slate-400">Waktu Pengajuan</div>
                  <div id="modalSubmitted" class="font-medium"></div>
                </div>
                <div class="p-3 bg-slate-50 rounded-lg">
                  <div class="text-xs text-slate-400">Guru Pengambil Keputusan</div>
                  <div id="modalGuru" class="font-medium"></div>
                </div>
              </div>

              <div class="mt-5 flex gap-3 items-center">
                <a id="modalQr" href="#" target="_blank" class="px-4 py-2 bg-blue-600 text-white rounded-lg hidden focus-ring">Cetak QR</a>
                <button id="modalCloseBtn" class="px-4 py-2 bg-slate-100 rounded-lg">Tutup</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- CHOICE MODAL: pilih Telat/Dispen --}}
      <div id="choiceModal" class="fixed inset-0 hidden modal-center z-50">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl max-w-xl w-full mx-4 p-6 pop z-10">
          <button id="closeChoice" class="absolute top-4 right-4 text-slate-500 hover:text-red-500">
            <i class="ph-x text-xl"></i>
          </button>

          <div class="text-center mb-4">
            <h3 class="text-2xl font-bold">Jenis Pengajuan</h3>
            <p class="text-sm text-slate-500 mt-1">Pilih jenis pengajuan yang ingin dibuat</p>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <button id="optTelat" class="p-6 rounded-2xl border hover:shadow-lg transition flex flex-col items-center gap-3">
              <div class="w-16 h-16 rounded-full bg-gradient-to-tr from-orange-400 to-orange-200 text-white flex items-center justify-center text-2xl"><i class="ph-clock"></i></div>
              <div class="font-bold">Telat</div>
              <div class="text-xs text-slate-400">Form pengajuan telat</div>
            </button>

            <button id="optDispen" class="p-6 rounded-2xl border hover:shadow-lg transition flex flex-col items-center gap-3">
              <div class="w-16 h-16 rounded-full bg-gradient-to-tr from-blue-500 to-indigo-400 text-white flex items-center justify-center text-2xl"><i class="ph-note-pencil"></i></div>
              <div class="font-bold">Dispensasi</div>
              <div class="text-xs text-slate-400">Form pengajuan dispensasi</div>
            </button>
          </div>

          <div class="mt-6 text-xs text-slate-400 text-center">Kamu akan diarahkan ke form pengajuan yang sesuai.</div>
        </div>
      </div>

    </section>
  </main>

  <!-- ================= Scripts: Interactivity & Animations ================= -->
  <script>
    // helper
    const $ = s => document.querySelector(s);
    const $$ = s => Array.from(document.querySelectorAll(s));

    // CHOICE MODAL (Pengajuan Baru)
    const btnPengajuan = $('#btnPengajuan');
    const choiceModal = $('#choiceModal');
    const closeChoice = $('#closeChoice');
    const optTelat = $('#optTelat');
    const optDispen = $('#optDispen');

    btnPengajuan?.addEventListener('click', () => {
      choiceModal.classList.remove('hidden');
    });
    closeChoice?.addEventListener('click', () => choiceModal.classList.add('hidden'));
    choiceModal?.addEventListener('click', (e) => { if(e.target === choiceModal) choiceModal.classList.add('hidden'); });

    // redirect routes: use named routes in web.php (telat, dispen)
    optTelat?.addEventListener('click', () => {
      optTelat.classList.add('scale-95');
      setTimeout(()=> { window.location.href = "{{ route('telat') }}"; }, 140);
    });
    optDispen?.addEventListener('click', () => {
      optDispen.classList.add('scale-95');
      setTimeout(()=> { window.location.href = "{{ route('dispen') }}"; }, 140);
    });

    // DETAIL MODAL
    const detailModal = $('#detailModal');
    const closeDetail = $('#closeDetail');
    const modalCloseBtn = $('#modalCloseBtn');
    const modalName = $('#modalName');
    const modalClass = $('#modalClass');
    const modalReason = $('#modalReason');
    const modalJamAwal = $('#modalJamAwal');
    const modalJamAkhir = $('#modalJamAkhir');
    const modalSubmitted = $('#modalSubmitted');
    const modalGuru = $('#modalGuru');
    const modalStatus = $('#modalStatus');
    const modalQr = $('#modalQr');

    function openDetail(row) {
      const id = row.dataset.id || '';
      const nama = row.dataset.nama || row.querySelector('td:nth-child(2)')?.innerText || '';
      const kelas = row.dataset.kelas || '';
      const alasan = row.dataset.alasan || '';
      const jamAwal = row.dataset.jamAwal || row.dataset['jam-awal'] || row.dataset['jam-awal'] || row.getAttribute('data-jam-awal') || row.dataset['jam-awal'] || row.dataset['jam-awal'];
      const jamAkhir = row.dataset.jamAkhir || row.dataset['jam-akhir'] || row.getAttribute('data-jam-akhir') || row.dataset['jam-akhir'];
      const created = row.dataset.created || '';
      const guru = row.dataset.guru || '-';
      const status = (row.dataset.status || '').toLowerCase();
      const jenis = (row.dataset.jenis || '').toLowerCase();

      modalName.textContent = capitalize(nama);
      modalClass.textContent = kelas;
      modalReason.textContent = alasan;
      modalJamAwal.textContent = jamAwal || '-';
      modalJamAkhir.textContent = jamAkhir || '-';
      modalSubmitted.textContent = created;
      modalGuru.textContent = guru;
      modalStatus.textContent = status === 'disetujui' ? 'Disetujui' : (status === 'menunggu' ? 'Menunggu' : 'Ditolak');
      modalStatus.className = 'text-xs font-bold px-3 py-1 rounded-full ' + (status === 'disetujui' ? 'bg-green-100 text-green-800' : (status === 'menunggu' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800'));

      if(status === 'disetujui' && jenis === 'dispensasi') {
    modalQr.href = '/izin/' + id + '/qrcode';
    modalQr.classList.remove('hidden');
} else {
    modalQr.classList.add('hidden');
}

      // visual feedback: highlight row temporarily
      row.classList.add('bg-blue-50');
      setTimeout(()=> row.classList.remove('bg-blue-50'), 700);

      detailModal.classList.remove('hidden');
    }

    // delegate clicks: detail button or row click
    document.addEventListener('click', (e) => {
      if(e.target.closest('.detail-btn')) {
        const row = e.target.closest('tr');
        openDetail(row);
        return;
      }
      const clickedRow = e.target.closest('#waitlistTable tr');
      if(clickedRow && !e.target.closest('button') && !e.target.closest('a') && !e.target.closest('input')) {
        openDetail(clickedRow);
      }
    });

    closeDetail?.addEventListener('click', () => detailModal.classList.add('hidden'));
    modalCloseBtn?.addEventListener('click', () => detailModal.classList.add('hidden'));
    detailModal?.addEventListener('click', (e) => { if(e.target === detailModal) detailModal.classList.add('hidden'); });

    // SEARCH & FILTERS
    const filterJenis = $('#filterJenis');
    const filterStatus = $('#filterStatus');
    const globalSearch = $('#globalSearch') || $('#globalSearchMobile');

    function matches(row) {
      const jenis = (filterJenis?.value || 'all').toLowerCase();
      const status = (filterStatus?.value || 'all').toLowerCase();
      const q = (globalSearch?.value || '').trim().toLowerCase();

      const rowJenis = (row.dataset.jenis || '').toLowerCase();
      const rowStatus = (row.dataset.status || '').toLowerCase();
      const text = row.innerText.toLowerCase();

      const okJenis = (jenis === 'all' || rowJenis === jenis);
      const okStatus = (status === 'all' || rowStatus === status);
      const okQuery = (q === '' || text.includes(q));
      return okJenis && okStatus && okQuery;
    }

    function applyFilters() {
      const rows = $$('#waitlistTable tr');
      rows.forEach(r => {
        if(matches(r)) r.style.display = '';
        else r.style.display = 'none';
      });
      updateSummary();
    }

    filterJenis?.addEventListener('change', applyFilters);
    filterStatus?.addEventListener('change', applyFilters);
    globalSearch?.addEventListener('input', applyFilters);

    $('#resetBtn')?.addEventListener('click', () => {
      filterJenis.value = 'all'; filterStatus.value = 'all';
      if(globalSearch) globalSearch.value = '';
      applyFilters();
    });

    // durations live update
    function updateDurations() {
      $$('.duration-cell').forEach(td => {
        const t = td.dataset.time;
        if(!t) return;
        const created = new Date(t);
        const now = new Date();
        const diff = Math.floor((now - created)/1000);
        if(diff < 60) td.textContent = diff + ' detik';
        else if(diff < 3600) td.textContent = Math.floor(diff/60) + ' menit';
        else if(diff < 86400) td.textContent = Math.floor(diff/3600) + ' jam';
        else td.textContent = Math.floor(diff/86400) + ' hari';
      });
    }
    setInterval(updateDurations, 30000);
    updateDurations();

    // summary
    function updateSummary() {
      const rows = $$('#waitlistTable tr');
      const total = rows.length;
      const visible = rows.filter(r => r.style.display !== 'none').length;
      $('#visibleCount').textContent = visible;
      $('#totalCount').textContent = total;
      $('#statsText') && ($('#statsText').textContent = `Menampilkan ${visible} data`);
      $('#summaryText') && ($('#summaryText').innerHTML = `Menampilkan <strong>${visible}</strong> dari <strong>${total}</strong> data`);
    }

    // keyboard shortcut "/" to focus search
    document.addEventListener('keydown', (e) => {
      if(e.key === '/' && document.activeElement.tagName !== 'INPUT' && document.activeElement.tagName !== 'TEXTAREA') {
        e.preventDefault();
        (globalSearch || $('#globalSearchMobile'))?.focus();
      }
      if(e.key === 'Escape') {
        detailModal?.classList.add('hidden');
        choiceModal?.classList.add('hidden');
      }
    });

    // initial run
    window.addEventListener('load', () => {
      applyFilters();
      updateDurations();
      updateSummary();
      // small animation on load
      $$('#waitlistTable tr').forEach((r,i) => setTimeout(()=> r.classList.add('pop'), 60*i));
    });

    // small util
    function capitalize(s) {
      if(!s) return '';
      return s.split(' ').map(p => p.charAt(0).toUpperCase()+p.slice(1)).join(' ');
    }

    // pagination placeholders
    $('#prevPage')?.addEventListener('click', () => alert('Implementasi pagination server-side disarankan'));
    $('#nextPage')?.addEventListener('click', () => alert('Implementasi pagination server-side disarankan'));
  </script>
</body>
</html>
