<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Profil Admin • GOW INSIDE</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            bb1: '#e6f3ff',
            bb2: '#f0f8ff',
            sky1: '#57b2ff',
            sky2: '#389eed',
            ink: '#0f172a',
            mint: '#9FE6C9',
            coal: '#0b1224'
          },
          boxShadow: {
            soft: '0 8px 32px rgba(30,64,175,.12)',
            card: '0 12px 40px rgba(56,158,237,.08)',
            pop: '0 20px 60px rgba(56,158,237,.15)',
            glow: '0 0 0 3px rgba(56,158,237,.2)',
            inner: 'inset 0 2px 4px rgba(56,158,237,.1)'
          },
          fontFamily: { 
            pop: ['Poppins','ui-sans-serif','system-ui'] 
          },
          animation: {
            fade: 'fade .8s ease-out both',
            slideIn: 'slideIn .6s ease-out both',
            slideUp: 'slideUp .5s ease-out both',
            float: 'float 6s ease-in-out infinite',
            pulse: 'pulse 2s ease-in-out infinite',
            glow: 'glow 2s ease-in-out infinite alternate',
            bounce: 'bounce 1s infinite',
            wiggle: 'wiggle 1s ease-in-out infinite',
            shimmer: 'shimmer 2s ease-in-out infinite'
          },
          keyframes: {
            fade: { 
              '0%': { opacity: 0, transform: 'translateY(20px)' },
              '100%': { opacity: 1, transform: 'none' } 
            },
            slideIn: { 
              '0%': { opacity: 0, transform: 'translateX(-20px)' },
              '100%': { opacity: 1, transform: 'none' } 
            },
            slideUp: { 
              '0%': { opacity: 0, transform: 'translateY(30px)' },
              '100%': { opacity: 1, transform: 'none' } 
            },
            float: { 
              '0%, 100%': { transform: 'translateY(0px)' },
              '50%': { transform: 'translateY(-10px)' } 
            },
            glow: {
              '0%': { boxShadow: '0 0 5px rgba(56,158,237,.4), 0 0 10px rgba(56,158,237,.2)' },
              '100%': { boxShadow: '0 0 20px rgba(56,158,237,.6), 0 0 30px rgba(56,158,237,.3)' }
            },
            wiggle: {
              '0%, 100%': { transform: 'rotate(-3deg)' },
              '50%': { transform: 'rotate(3deg)' }
            },
            shimmer: {
              '0%': { backgroundPosition: '-200px 0' },
              '100%': { backgroundPosition: 'calc(200px + 100%) 0' }
            }
          }
        }
      }
    }
  </script>

  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <script src="https://unpkg.com/phosphor-icons"></script>
  
  <!-- Chart.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chart.js/3.9.1/chart.min.js"></script>

  <style>
    :root{ 
      --bb1: #e6f3ff; 
      --bb2: #f0f8ff; 
      --sky1: #57b2ff; 
      --sky2: #389eed; 
      --ink: #0f172a;
    }
    
    * { 
      scroll-behavior: smooth; 
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Poppins', sans-serif; 
      color: var(--ink);
      background: 
        radial-gradient(circle at 20% 50%, rgba(87,178,255,0.15) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(56,158,237,0.15) 0%, transparent 50%),
        radial-gradient(circle at 40% 80%, rgba(87,178,255,0.1) 0%, transparent 50%),
        linear-gradient(135deg, #e6f3ff 0%, #f0f8ff 100%);
      min-height: 100vh;
      overflow-x: hidden;
    }
    
    .glass {
      background: rgba(255,255,255,0.9);
      border: 1px solid rgba(255,255,255,0.6);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
    }
    
    .glass-strong {
      background: rgba(255,255,255,0.95);
      border: 1px solid rgba(255,255,255,0.8);
      backdrop-filter: blur(25px);
      -webkit-backdrop-filter: blur(25px);
    }
    
    .glass-card {
      background: rgba(255,255,255,0.85);
      border: 1px solid rgba(255,255,255,0.7);
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);
    }
    
    .btn-gradient {
      background: linear-gradient(135deg, var(--sky1) 0%, var(--sky2) 100%);
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }
    
    .btn-gradient::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
      transition: all 0.5s;
    }
    
    .btn-gradient:hover::before {
      left: 100%;
    }
    
    .btn-gradient:hover {
      background: linear-gradient(135deg, var(--sky2) 0%, #2563eb 100%);
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(56,158,237,0.3);
    }
    
    .card-hover {
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .card-hover:hover {
      transform: translateY(-5px) scale(1.02);
      box-shadow: 0 25px 50px rgba(56,158,237,0.15);
    }
    
    .sidebar-fixed { 
      position: fixed; 
      top: 1.5rem; 
      left: 1.5rem; 
      z-index: 30; 
      height: calc(100vh - 3rem); 
      overflow-y: auto; 
    }
    
    .main-content { 
      margin-left: 8rem; 
      padding: 2rem;
    }
    
    @media (max-width: 1023px) { 
      .sidebar-fixed { display: none; } 
      .main-content { margin-left: 0; padding: 1rem; } 
    }
    
    .profile-avatar {
      position: relative;
      overflow: hidden;
      border: 4px solid rgba(56,158,237,0.3);
      transition: all 0.4s ease;
      cursor: pointer;
    }
    
    .profile-avatar:hover {
      border-color: var(--sky2);
      transform: scale(1.05) rotate(2deg);
      box-shadow: 0 0 30px rgba(56,158,237,0.4);
    }
    
    .status-online {
      position: absolute;
      bottom: 10px;
      right: 10px;
      width: 24px;
      height: 24px;
      background: linear-gradient(45deg, #10b981, #34d399);
      border: 4px solid white;
      border-radius: 50%;
      animation: pulse 2s infinite;
    }
    
    .activity-timeline {
      position: relative;
      padding-left: 30px;
    }
    
    .activity-timeline::before {
      content: '';
      position: absolute;
      left: 20px;
      top: 0;
      bottom: 0;
      width: 3px;
      background: linear-gradient(to bottom, var(--sky1), var(--sky2), #10b981);
      border-radius: 2px;
    }
    
    .activity-item {
      position: relative;
      margin-bottom: 25px;
      animation: slideIn 0.6s ease-out;
    }
    
    .activity-item::before {
      content: '';
      position: absolute;
      left: -38px;
      top: 12px;
      width: 20px;
      height: 20px;
      background: var(--sky2);
      border: 4px solid white;
      border-radius: 50%;
      box-shadow: 0 0 0 4px rgba(56,158,237,0.2);
      animation: glow 2s ease-in-out infinite alternate;
    }
    
    .modal-backdrop {
      position: fixed;
      inset: 0;
      background: rgba(15,23,42,0.7);
      backdrop-filter: blur(10px);
      z-index: 50;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
    }
    
    .modal-backdrop.active {
      opacity: 1;
      visibility: visible;
    }
    
    .modal-card {
      background: rgba(255,255,255,0.95);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255,255,255,0.8);
      border-radius: 2rem;
      padding: 2.5rem;
      max-width: 600px;
      width: 90%;
      max-height: 90vh;
      overflow-y: auto;
      box-shadow: 0 25px 50px rgba(15,23,42,0.25);
      transform: scale(0.8) translateY(20px);
      transition: all 0.3s ease;
    }
    
    .modal-backdrop.active .modal-card {
      transform: scale(1) translateY(0);
    }
    
    .security-toggle {
      position: relative;
      width: 60px;
      height: 30px;
      background: #e2e8f0;
      border-radius: 15px;
      cursor: pointer;
      transition: all 0.3s;
      box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .security-toggle.active {
      background: linear-gradient(45deg, var(--sky1), var(--sky2));
      box-shadow: 0 0 10px rgba(56,158,237,0.3);
    }
    
    .security-toggle::after {
      content: '';
      position: absolute;
      top: 3px;
      left: 3px;
      width: 24px;
      height: 24px;
      background: white;
      border-radius: 50%;
      transition: all 0.3s;
      box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    
    .security-toggle.active::after {
      transform: translateX(30px);
    }

    .stat-card {
      background: linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0.7) 100%);
      border: 1px solid rgba(255,255,255,0.8);
      backdrop-filter: blur(20px);
      position: relative;
      overflow: hidden;
    }
    
    .stat-card::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
      transform: rotate(45deg);
      transition: all 0.6s;
      opacity: 0;
    }
    
    .stat-card:hover::before {
      opacity: 1;
      animation: shimmer 1.5s ease-in-out;
    }

    .progress-bar {
      height: 6px;
      background: #e2e8f0;
      border-radius: 3px;
      overflow: hidden;
      position: relative;
    }

    .progress-fill {
      height: 100%;
      background: linear-gradient(90deg, var(--sky1), var(--sky2));
      border-radius: 3px;
      transition: width 1s ease;
      position: relative;
      overflow: hidden;
    }
    
    .progress-fill::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      background-image: linear-gradient(
        -45deg,
        rgba(255, 255, 255, .2) 25%,
        transparent 25%,
        transparent 50%,
        rgba(255, 255, 255, .2) 50%,
        rgba(255, 255, 255, .2) 75%,
        transparent 75%,
        transparent
      );
      background-size: 50px 50px;
      animation: move 2s linear infinite;
    }
    
    @keyframes move {
      0% { background-position: 0 0; }
      100% { background-position: 50px 50px; }
    }
    
    .floating-shape {
      position: absolute;
      opacity: 0.1;
      animation: float 8s ease-in-out infinite;
      z-index: -1;
    }
    
    .skill-tag {
      background: linear-gradient(45deg, rgba(56,158,237,0.1), rgba(87,178,255,0.1));
      border: 1px solid rgba(56,158,237,0.2);
      transition: all 0.3s ease;
    }
    
    .skill-tag:hover {
      background: linear-gradient(45deg, rgba(56,158,237,0.2), rgba(87,178,255,0.2));
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(56,158,237,0.2);
    }
    
    .notification-dot {
      position: absolute;
      top: -5px;
      right: -5px;
      width: 20px;
      height: 20px;
      background: linear-gradient(45deg, #ef4444, #f87171);
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 11px;
      font-weight: bold;
      animation: bounce 1s infinite;
    }
    
    .input-modern {
      background: rgba(255,255,255,0.8);
      border: 2px solid rgba(56,158,237,0.2);
      backdrop-filter: blur(10px);
      transition: all 0.3s ease;
    }
    
    .input-modern:focus {
      border-color: var(--sky2);
      box-shadow: 0 0 0 4px rgba(56,158,237,0.1);
      background: rgba(255,255,255,0.95);
    }
    
    .toast {
      position: fixed;
      top: 20px;
      right: 20px;
      background: linear-gradient(135deg, #10b981, #34d399);
      color: white;
      padding: 1rem 1.5rem;
      border-radius: 1rem;
      box-shadow: 0 10px 25px rgba(16,185,129,0.3);
      transform: translateX(100%);
      transition: all 0.3s ease;
      z-index: 1000;
    }
    
    .toast.show {
      transform: translateX(0);
    }
    
    .avatar-upload {
      position: relative;
      overflow: hidden;
    }
    
    .avatar-upload::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(45deg, rgba(56,158,237,0.8), rgba(87,178,255,0.8));
      opacity: 0;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .avatar-upload:hover::after {
      opacity: 1;
    }
  </style>
</head>
<body>
  <!-- Floating Shapes -->
  <div class="floating-shape w-64 h-64 bg-gradient-to-br from-sky-200 to-sky-300 rounded-full top-20 -right-32" style="animation-delay: -2s;"></div>
  <div class="floating-shape w-48 h-48 bg-gradient-to-br from-blue-200 to-blue-300 rounded-full bottom-40 -left-24" style="animation-delay: -4s;"></div>
  <div class="floating-shape w-32 h-32 bg-gradient-to-br from-cyan-200 to-cyan-300 rounded-full top-1/2 right-20" style="animation-delay: -6s;"></div>

  <!-- FIXED SIDEBAR (desktop only) -->
  <aside class="sidebar-fixed">
    <nav class="bg-[#eaf1ff] rounded-3xl p-4 flex flex-col gap-4 shadow-soft w-24">
      
      <a href="{{ route('dashboardadmin') }}" 
         class="flex flex-col items-center gap-1 px-2 py-3 bg-white rounded-xl hover:scale-110 transition text-center">
        <i class="ph-house text-2xl text-slate-800"></i>
        <span class="text-xs">Dashboard</span>
      </a>

      <a href="{{ route('data-guru') }}" 
         class="flex flex-col items-center gap-1 px-2 py-3 bg-sky-600 text-white rounded-xl hover:scale-110 transition text-center shadow-md">
        <i class="ph-chalkboard-teacher text-2xl"></i>
        <span class="text-xs">Data Guru</span>
      </a>

          <a href="{{ route('data-siswa') }}" 
         class="flex flex-col items-center gap-1 px-2 py-3 bg-white rounded-xl hover:scale-110 transition text-center">
        <i class="ph-student text-2xl text-slate-800"></i>
        <span class="text-xs">Data Siswa</span>
      </a>

      <a href="#data-izin" 
         class="flex flex-col items-center gap-1 px-2 py-3 bg-white rounded-xl hover:scale-110 transition text-center">
        <i class="ph-note-pencil text-2xl text-slate-800"></i>
        <span class="text-xs">Data Izin</span>
      </a>

      <a href="#profil" 
         class="flex flex-col items-center gap-1 px-2 py-3 bg-white rounded-xl hover:scale-110 transition text-center">
        <i class="ph-user-circle text-2xl text-slate-800"></i>
        <span class="text-xs">Profil</span>
      </a>
    </nav>
  </aside>

  <!-- MOBILE HEADER -->
  <header class="lg:hidden px-4 pt-4 animate-fade">
    <div class="glass-strong rounded-2xl px-4 py-3 flex items-center justify-between shadow-card">
      <div class="flex items-center gap-3">
        <div class="w-12 h-12 bg-gradient-to-br from-sky-400 to-sky-600 rounded-xl flex items-center justify-center animate-glow">
          <i class="ph-graduation-cap text-white text-2xl"></i>
        </div>
        <div>
          <p class="text-[11px] tracking-wide text-slate-500 uppercase font-medium">GOW INSIDE</p>
          <h1 class="font-bold text-lg bg-gradient-to-r from-sky-600 to-sky-800 bg-clip-text text-transparent">
            Profil Admin
          </h1>
        </div>
      </div>
      <button id="btnMobileMenu" class="btn-gradient px-4 py-2 rounded-xl text-white font-semibold flex items-center gap-2 text-sm relative">
        <i class="ph-list text-lg"></i> Menu
        <div class="notification-dot">3</div>
      </button>
    </div>

    <!-- Mobile Menu Dropdown -->
    <nav id="mobileMenu" class="hidden mt-2 glass-strong rounded-2xl px-4 py-3 animate-slideUp">
      <ul class="grid grid-cols-2 gap-2 text-sm">
        <li><a href="#" class="block p-3 rounded-lg hover:bg-sky-50 transition-colors group">
          <i class="ph-house mr-2 group-hover:text-sky-600"></i>Dashboard</a></li>
        <li><a href="#" class="block p-3 rounded-lg hover:bg-sky-50 transition-colors group">
          <i class="ph-chalkboard-teacher mr-2 group-hover:text-sky-600"></i>Data Guru</a></li>
        <li><a href="#" class="block p-3 rounded-lg hover:bg-sky-50 transition-colors group">
          <i class="ph-student mr-2 group-hover:text-sky-600"></i>Data Siswa</a></li>
        <li><a href="#" class="block p-3 rounded-lg hover:bg-sky-50 transition-colors group">
          <i class="ph-note-pencil mr-2 group-hover:text-sky-600"></i>Data Izin</a></li>
        <li><a href="#" class="block p-3 rounded-lg bg-sky-100 text-sky-800">
          <i class="ph-user-circle mr-2"></i>Profil</a></li>
        <li><button class="block w-full text-left p-3 rounded-lg hover:bg-red-50 text-red-600 transition-colors">
          <i class="ph-sign-out mr-2"></i>Logout</button></li>
      </ul>
    </nav>
  </header>

  <!-- MAIN CONTENT -->
  <main class="main-content">
    
    <!-- PROFILE HERO SECTION -->
    <section class="glass-strong rounded-3xl shadow-pop p-8 mb-8 animate-fade relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-br from-sky-50/50 to-blue-50/30 pointer-events-none"></div>
      <div class="relative z-10 flex flex-col lg:flex-row items-center gap-8">
        <div class="flex-shrink-0 relative">
          <div class="profile-avatar avatar-upload w-44 h-44 rounded-full animate-float cursor-pointer" id="avatarUpload">
            @if($admin->profile_photo)
                <img src="{{ asset('storage/profiles/' . $admin->profile_photo) }}" 
                     alt="Admin Avatar" class="w-full h-full object-cover rounded-full">
            @else
                <img src="https://ui-avatars.com/api/?name={{ urlencode($admin->name ?? 'Admin') }}&background=57b2ff&color=fff&size=176&bold=true" 
                     alt="Admin Avatar" class="w-full h-full object-cover rounded-full">
            @endif
            <div class="status-online"></div>
            <div class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-30 rounded-full flex items-center justify-center transition-all duration-300 opacity-0 hover:opacity-100">
              <i class="ph-camera text-white text-3xl"></i>
            </div>
          </div>
          <input type="file" id="fileUpload" accept="image/*" class="hidden">
          
          <!-- Online Status Badge -->
          <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 bg-gradient-to-r from-green-500 to-green-600 text-white px-3 py-1 rounded-full text-xs font-semibold shadow-lg">
            <i class="ph-check-circle mr-1"></i>Online
          </div>
        </div>
        
        <div class="flex-1 text-center lg:text-left">
          <div class="mb-4">
            <h1 class="text-5xl lg:text-6xl font-black mb-2 bg-gradient-to-r from-sky-600 via-sky-700 to-sky-800 bg-clip-text text-transparent leading-tight">
              Halo, <span id="adminName" class="animate-pulse">{{ $admin->name ?? 'Admin' }}</span>!
            </h1>
            <div class="flex items-center justify-center lg:justify-start gap-2 text-xl text-slate-600 mb-4">
              <i class="ph-crown text-yellow-500"></i>
              <span>Administrator Sistem GOW INSIDE</span>
            </div>
          </div>
          
          <p class="text-slate-500 mb-2 text-lg">{{ $admin->bio ?? 'Mengelola data siswa, guru, dan sistem perizinan' }}</p>
          <p class="text-slate-400 mb-6 flex items-center justify-center lg:justify-start gap-2">
            <i class="ph-buildings"></i>
            SMKN 13 Bandung
          </p>
          
          <!-- Skills/Permissions Tags -->
          <div class="flex flex-wrap gap-2 justify-center lg:justify-start mb-6">
            <span class="skill-tag px-3 py-1 rounded-full text-sm font-medium">Data Management</span>
            <span class="skill-tag px-3 py-1 rounded-full text-sm font-medium">User Control</span>
            <span class="skill-tag px-3 py-1 rounded-full text-sm font-medium">Reports</span>
            <span class="skill-tag px-3 py-1 rounded-full text-sm font-medium">System Admin</span>
          </div>
          
          <div class="flex flex-wrap gap-3 justify-center lg:justify-start">
            <button id="btnEditProfile" class="btn-gradient px-8 py-4 rounded-xl font-semibold text-white flex items-center gap-3 shadow-pop text-lg relative overflow-hidden group">
              <i class="ph-pencil-simple text-xl"></i> 
              <span>Edit Profil</span>
            </button>
            <button id="btnChangePassword" class="px-8 py-4 rounded-xl bg-white/80 shadow-card border-2 border-slate-200 hover:bg-white hover:border-sky-300 transition-all duration-300 flex items-center gap-3 group">
              <i class="ph-lock text-xl group-hover:text-sky-600"></i> 
              <span class="group-hover:text-sky-600">Ubah Password</span>
            </button>
            <button id="btnSettings" class="px-8 py-4 rounded-xl bg-slate-100 hover:bg-slate-200 transition-all duration-300 flex items-center gap-3 group">
              <i class="ph-gear text-xl group-hover:text-slate-700"></i> 
              <span class="group-hover:text-slate-700">Pengaturan</span>
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- ENHANCED QUICK STATS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      <div class="stat-card rounded-2xl p-6 text-center card-hover shadow-card group">
        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:animate-bounce">
          <i class="ph-clock text-white text-3xl"></i>
        </div>
        <h3 class="text-sm font-semibold text-slate-500 mb-2">Login Terakhir</h3>
        <p class="text-3xl font-black text-blue-600 mb-1" id="lastLogin">{{ $stats['last_login'] ?? '08:32' }}</p>
        <span class="text-xs text-slate-400 bg-slate-100 px-2 py-1 rounded-full">Hari ini</span>
        <div class="progress-bar mt-4">
          <div class="progress-fill" style="width: 85%"></div>
        </div>
      </div>

      <div class="stat-card rounded-2xl p-6 text-center card-hover shadow-card group">
        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:animate-bounce">
          <i class="ph-check-circle text-white text-3xl"></i>
        </div>
        <h3 class="text-sm font-semibold text-slate-500 mb-2">Izin Diproses</h3>
        <p class="text-3xl font-black text-green-600 mb-1">{{ $stats['izin_diproses'] ?? '24' }}</p>
        <span class="text-xs text-slate-400 bg-slate-100 px-2 py-1 rounded-full">Hari ini</span>
        <div class="progress-bar mt-4">
          <div class="progress-fill" style="width: 92%"></div>
        </div>
      </div>

      <div class="stat-card rounded-2xl p-6 text-center card-hover shadow-card group">
        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:animate-bounce">
          <i class="ph-users text-white text-3xl"></i>
        </div>
        <h3 class="text-sm font-semibold text-slate-500 mb-2">Data Dikelola</h3>
        <p class="text-3xl font-black text-purple-600 mb-1">{{ number_format($stats['total_siswa'] + $stats['total_guru'] ?? 1248) }}</p>
        <span class="text-xs text-slate-400 bg-slate-100 px-2 py-1 rounded-full">Total</span>
        <div class="progress-bar mt-4">
          <div class="progress-fill" style="width: 78%"></div>
        </div>
      </div>

      <div class="stat-card rounded-2xl p-6 text-center card-hover shadow-card group">
        <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:animate-bounce">
          <i class="ph-activity text-white text-3xl"></i>
        </div>
        <h3 class="text-sm font-semibold text-slate-500 mb-2">Aktivitas</h3>
        <p class="text-3xl font-black text-orange-600 mb-1">12</p>
        <span class="text-xs text-slate-400 bg-slate-100 px-2 py-1 rounded-full">Minggu ini</span>
        <div class="progress-bar mt-4">
          <div class="progress-fill" style="width: 65%"></div>
        </div>
      </div>
    </div>

    <!-- MAIN CONTENT GRID -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
      
      <!-- LEFT COLUMN -->
      <div class="xl:col-span-2 space-y-8">
        
        <!-- PROFILE INFORMATION -->
        <section class="glass-strong rounded-2xl p-8 shadow-card card-hover animate-slideUp">
          <h2 class="text-2xl font-bold mb-8 flex items-center gap-4">
            <div class="w-12 h-12 bg-gradient-to-br from-sky-500 to-sky-600 rounded-xl flex items-center justify-center shadow-lg">
              <i class="ph-info text-white text-xl"></i>
            </div>
            <span class="bg-gradient-to-r from-sky-600 to-sky-800 bg-clip-text text-transparent">
              Informasi Profil
            </span>
          </h2>
          
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="space-y-6">
              <div class="group">
                <label class="block text-sm font-semibold text-slate-600 mb-3 flex items-center gap-2">
                  <i class="ph-user text-sky-600"></i>
                  Nama Lengkap
                </label>
                <div class="flex items-center justify-between p-4 bg-gradient-to-r from-slate-50 to-slate-100 rounded-xl border-2 border-transparent hover:border-sky-200 transition-all duration-300 group-hover:shadow-md">
                  <span id="profileName" class="font-semibold text-slate-800">{{ $admin->name ?? 'Admin' }}</span>
                  <button class="text-sky-600 hover:text-sky-800 transition-colors p-2 rounded-lg hover:bg-sky-50">
                    <i class="ph-pencil-simple text-lg"></i>
                  </button>
                </div>
              </div>
              
              <div class="group">
                <label class="block text-sm font-semibold text-slate-600 mb-3 flex items-center gap-2">
                  <i class="ph-at text-sky-600"></i>
                  Username
                </label>
                <div class="flex items-center justify-between p-4 bg-gradient-to-r from-slate-50 to-slate-100 rounded-xl border-2 border-transparent hover:border-sky-200 transition-all duration-300 group-hover:shadow-md">
                  <span class="font-semibold text-slate-800">{{ $admin->username ?? 'admin_gow' }}</span>
                  <button class="text-sky-600 hover:text-sky-800 transition-colors p-2 rounded-lg hover:bg-sky-50">
                    <i class="ph-pencil-simple text-lg"></i>
                  </button>
                </div>
              </div>
              
              <div class="group">
                <label class="block text-sm font-semibold text-slate-600 mb-3 flex items-center gap-2">
                  <i class="ph-envelope text-sky-600"></i>
                  Email
                </label>
                <div class="flex items-center justify-between p-4 bg-gradient-to-r from-slate-50 to-slate-100 rounded-xl border-2 border-transparent hover:border-sky-200 transition-all duration-300 group-hover:shadow-md">
                  <span class="font-semibold text-slate-800">{{ $admin->email ?? 'admin@smkn13bdg.sch.id' }}</span>
                  <button class="text-sky-600 hover:text-sky-800 transition-colors p-2 rounded-lg hover:bg-sky-50">
                    <i class="ph-pencil-simple text-lg"></i>
                  </button>
                </div>
              </div>
            </div>
            
            <div class="space-y-6">
              <div class="group">
                <label class="block text-sm font-semibold text-slate-600 mb-3 flex items-center gap-2">
                  <i class="ph-phone text-sky-600"></i>
                  No. Telepon
                </label>
                <div class="flex items-center justify-between p-4 bg-gradient-to-r from-slate-50 to-slate-100 rounded-xl border-2 border-transparent hover:border-sky-200 transition-all duration-300 group-hover:shadow-md">
                  <span class="font-semibold text-slate-800">{{ $admin->phone ?? '+62 812-3456-7890' }}</span>
                  <button class="text-sky-600 hover:text-sky-800 transition-colors p-2 rounded-lg hover:bg-sky-50">
                    <i class="ph-pencil-simple text-lg"></i>
                  </button>
                </div>
              </div>
              
              <div>
                <label class="block text-sm font-semibold text-slate-600 mb-3 flex items-center gap-2">
                  <i class="ph-crown text-yellow-500"></i>
                  Role
                </label>
                <div class="p-4 bg-gradient-to-r from-sky-50 to-sky-100 rounded-xl border-2 border-sky-200">
                  <span class="text-sky-800 font-bold text-lg flex items-center gap-2">
                    <i class="ph-shield-check"></i>
                    Administrator
                  </span>
                </div>
              </div>
              
              <div>
                <label class="block text-sm font-semibold text-slate-600 mb-3 flex items-center gap-2">
                  <i class="ph-check-circle text-green-500"></i>
                  Status Akun
                </label>
                <div class="flex items-center gap-3 p-4 bg-gradient-to-r from-green-50 to-green-100 rounded-xl border-2 border-green-200">
                  <div class="w-4 h-4 bg-green-500 rounded-full animate-pulse shadow-lg"></div>
                  <span class="text-green-700 font-bold text-lg">Aktif</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Admin Metrics -->
          <div class="mt-8 pt-8 border-t border-slate-200">
            <h3 class="text-lg font-bold text-slate-700 mb-4 flex items-center gap-2">
              <i class="ph-chart-bar text-sky-600"></i>
              Performa Admin
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
              <div class="text-center p-4 bg-blue-50 rounded-xl">
                <div class="text-2xl font-bold text-blue-600">98%</div>
                <div class="text-xs text-blue-500">Uptime</div>
              </div>
              <div class="text-center p-4 bg-green-50 rounded-xl">
                <div class="text-2xl font-bold text-green-600">156</div>
                <div class="text-xs text-green-500">Tasks Done</div>
              </div>
              <div class="text-center p-4 bg-purple-50 rounded-xl">
                <div class="text-2xl font-bold text-purple-600">4.9</div>
                <div class="text-xs text-purple-500">Rating</div>
              </div>
              <div class="text-center p-4 bg-orange-50 rounded-xl">
                <div class="text-2xl font-bold text-orange-600">2.5k</div>
                <div class="text-xs text-orange-500">Actions</div>
              </div>
            </div>
          </div>
        </section>

        <!-- SECURITY SETTINGS -->
        <section class="glass-strong rounded-2xl p-8 shadow-card card-hover animate-slideUp" style="animation-delay: 0.1s;">
          <h2 class="text-2xl font-bold mb-8 flex items-center gap-4">
            <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center shadow-lg">
              <i class="ph-shield-check text-white text-xl"></i>
            </div>
            <span class="bg-gradient-to-r from-red-600 to-red-800 bg-clip-text text-transparent">
              Keamanan Akun
            </span>
          </h2>
          
          <div class="space-y-6">
            <div class="flex items-center justify-between p-6 bg-gradient-to-r from-slate-50 to-slate-100 rounded-xl border-2 border-transparent hover:border-green-200 transition-all duration-300 group">
              <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                  <i class="ph-device-mobile text-white text-xl"></i>
                </div>
                <div>
                  <p class="font-bold text-lg text-slate-800">Two-Factor Authentication</p>
                  <p class="text-sm text-slate-500">Keamanan tambahan dengan SMS/Email</p>
                  <div class="flex items-center gap-2 mt-2">
                    <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                    <span class="text-xs text-green-600 font-semibold">Aktif sejak 15 Sep 2024</span>
                  </div>
                </div>
              </div>
              <div class="security-toggle active" onclick="toggleSecurity(this)"></div>
            </div>
            
            <div class="flex items-center justify-between p-6 bg-gradient-to-r from-slate-50 to-slate-100 rounded-xl border-2 border-green-200 group">
              <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                  <i class="ph-envelope text-white text-xl"></i>
                </div>
                <div>
                  <p class="font-bold text-lg text-slate-800">Verifikasi Email</p>
                  <p class="text-sm text-slate-500">Email sudah terverifikasi</p>
                  <div class="flex items-center gap-2 mt-2">
                    <i class="ph-check-circle text-green-500"></i>
                    <span class="text-xs text-green-600 font-semibold">Verified</span>
                  </div>
                </div>
              </div>
              <div class="px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white text-sm rounded-xl font-bold shadow-lg">
                Aktif
              </div>
            </div>
            
            <div class="flex items-center justify-between p-6 bg-gradient-to-r from-slate-50 to-slate-100 rounded-xl border-2 border-transparent hover:border-green-200 transition-all duration-300 group">
              <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                  <i class="ph-whatsapp-logo text-white text-xl"></i>
                </div>
                <div>
                  <p class="font-bold text-lg text-slate-800">Notifikasi WhatsApp</p>
                  <p class="text-sm text-slate-500">Terima notifikasi izin via WA</p>
                  <div class="flex items-center gap-2 mt-2">
                    <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                    <span class="text-xs text-green-600 font-semibold">Connected</span>
                  </div>
                </div>
              </div>
              <div class="security-toggle active" onclick="toggleSecurity(this)"></div>
            </div>
            
            <!-- Additional Security Features -->
            <div class="flex items-center justify-between p-6 bg-gradient-to-r from-slate-50 to-slate-100 rounded-xl border-2 border-transparent hover:border-orange-200 transition-all duration-300 group">
              <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center">
                  <i class="ph-fingerprint text-white text-xl"></i>
                </div>
                <div>
                  <p class="font-bold text-lg text-slate-800">Biometric Login</p>
                  <p class="text-sm text-slate-500">Login dengan sidik jari/Face ID</p>
                  <div class="flex items-center gap-2 mt-2">
                    <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                    <span class="text-xs text-orange-600 font-semibold">Available</span>
                  </div>
                </div>
              </div>
              <div class="security-toggle" onclick="toggleSecurity(this)"></div>
            </div>
          </div>
        </section>

        <!-- ACTIVITY CHART -->
        <section class="glass-strong rounded-2xl p-8 shadow-card card-hover animate-slideUp" style="animation-delay: 0.2s;">
          <h2 class="text-2xl font-bold mb-8 flex items-center gap-4">
            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
              <i class="ph-chart-line text-white text-xl"></i>
            </div>
            <span class="bg-gradient-to-r from-purple-600 to-purple-800 bg-clip-text text-transparent">
              Statistik Aktivitas Mingguan
            </span>
          </h2>
          <div class="relative">
            <canvas id="activityChart" height="100"></canvas>
            <div class="absolute top-4 right-4 flex gap-2">
              <div class="flex items-center gap-2 text-xs bg-white/80 px-2 py-1 rounded-lg">
                <div class="w-3 h-3 bg-sky-500 rounded-full"></div>
                <span>Login</span>
              </div>
              <div class="flex items-center gap-2 text-xs bg-white/80 px-2 py-1 rounded-lg">
                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                <span>Actions</span>
              </div>
            </div>
          </div>
        </section>
      </div>

      <!-- RIGHT COLUMN -->
      <div class="space-y-8">
        
        <!-- SYSTEM STATUS -->
        <section class="glass-strong rounded-2xl p-6 shadow-card card-hover animate-slideUp" style="animation-delay: 0.3s;">
          <h2 class="text-xl font-bold mb-6 flex items-center gap-3">
            <div class="w-10 h-10 bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-lg flex items-center justify-center">
              <i class="ph-cpu text-white"></i>
            </div>
            <span class="bg-gradient-to-r from-cyan-600 to-cyan-800 bg-clip-text text-transparent">
              Status Sistem
            </span>
          </h2>
          
          <div class="space-y-4">
            <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg border border-green-200">
              <div class="flex items-center gap-3">
                <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                <span class="font-semibold text-green-800">Server Status</span>
              </div>
              <span class="text-green-600 font-bold">Online</span>
            </div>
            
            <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg border border-blue-200">
              <div class="flex items-center gap-3">
                <div class="w-3 h-3 bg-blue-500 rounded-full animate-pulse"></div>
                <span class="font-semibold text-blue-800">Database</span>
              </div>
              <span class="text-blue-600 font-bold">Connected</span>
            </div>
            
            <div class="flex items-center justify-between p-3 bg-yellow-50 rounded-lg border border-yellow-200">
              <div class="flex items-center gap-3">
                <div class="w-3 h-3 bg-yellow-500 rounded-full animate-pulse"></div>
                <span class="font-semibold text-yellow-800">Backup</span>
              </div>
              <span class="text-yellow-600 font-bold">Scheduled</span>
            </div>
          </div>
        </section>
        
        <!-- RECENT ACTIVITY -->
        <section class="glass-strong rounded-2xl p-6 shadow-card card-hover animate-slideUp" style="animation-delay: 0.4s;">
          <h2 class="text-xl font-bold mb-6 flex items-center gap-3">
            <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex items-center justify-center">
              <i class="ph-clock-clockwise text-white"></i>
            </div>
            <span class="bg-gradient-to-r from-orange-600 to-orange-800 bg-clip-text text-transparent">
              Aktivitas Terakhir
            </span>
          </h2>
          
          <div class="activity-timeline">
            <div class="activity-item">
              <div class="bg-white/90 p-4 rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition-all duration-300">
                <div class="flex items-center gap-3 mb-2">
                  <i class="ph-sign-in text-green-600"></i>
                  <p class="font-bold text-sm text-slate-800">Login ke sistem</p>
                </div>
                <p class="text-xs text-slate-500 flex items-center gap-1">
                  <i class="ph-clock"></i>
                  2 menit yang lalu
                </p>
              </div>
            </div>
            
            <div class="activity-item">
              <div class="bg-white/90 p-4 rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition-all duration-300">
                <div class="flex items-center gap-3 mb-2">
                  <i class="ph-student text-blue-600"></i>
                  <p class="font-bold text-sm text-slate-800">Mengedit data siswa</p>
                </div>
                <p class="text-xs text-slate-600">Mutia Zahra - XI RPL 2</p>
                <p class="text-xs text-slate-500 flex items-center gap-1 mt-1">
                  <i class="ph-clock"></i>
                  15 menit yang lalu
                </p>
              </div>
            </div>
            
            <div class="activity-item">
              <div class="bg-white/90 p-4 rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition-all duration-300">
                <div class="flex items-center gap-3 mb-2">
                  <i class="ph-check-circle text-green-600"></i>
                  <p class="font-bold text-sm text-slate-800">Menyetujui izin siswa</p>
                </div>
                <p class="text-xs text-slate-600">Ahmad Fauzi - X TKJ 1</p>
                <p class="text-xs text-slate-500 flex items-center gap-1 mt-1">
                  <i class="ph-clock"></i>
                  1 jam yang lalu
                </p>
              </div>
            </div>
            
            <div class="activity-item">
              <div class="bg-white/90 p-4 rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition-all duration-300">
                <div class="flex items-center gap-3 mb-2">
                  <i class="ph-download text-purple-600"></i>
                  <p class="font-bold text-sm text-slate-800">Export laporan izin</p>
                </div>
                <p class="text-xs text-slate-600">Data Bulan September 2024</p>
                <p class="text-xs text-slate-500 flex items-center gap-1 mt-1">
                  <i class="ph-clock"></i>
                  2 jam yang lalu
                </p>
              </div>
            </div>
            
            <div class="activity-item">
              <div class="bg-white/90 p-4 rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition-all duration-300">
                <div class="flex items-center gap-3 mb-2">
                  <i class="ph-user-plus text-sky-600"></i>
                  <p class="font-bold text-sm text-slate-800">Menambah guru baru</p>
                </div>
                <p class="text-xs text-slate-600">Pak Budi Santoso - Matematika</p>
                <p class="text-xs text-slate-500 flex items-center gap-1 mt-1">
                  <i class="ph-clock"></i>
                  3 jam yang lalu
                </p>
              </div>
            </div>
          </div>
          
          <button class="w-full mt-4 py-3 text-sky-600 hover:text-sky-800 font-semibold text-sm hover:bg-sky-50 rounded-lg transition-all duration-300 flex items-center justify-center gap-2">
            <i class="ph-list"></i>
            Lihat Semua Aktivitas
          </button>
        </section>

        <!-- QUICK ACTIONS -->
        <section class="glass-strong rounded-2xl p-6 shadow-card card-hover animate-slideUp" style="animation-delay: 0.5s;">
          <h2 class="text-xl font-bold mb-6 flex items-center gap-3">
            <div class="w-10 h-10 bg-gradient-to-br from-violet-500 to-violet-600 rounded-lg flex items-center justify-center">
              <i class="ph-lightning text-white"></i>
            </div>
            <span class="bg-gradient-to-r from-violet-600 to-violet-800 bg-clip-text text-transparent">
              Aksi Cepat
            </span>
          </h2>
          
          <div class="grid grid-cols-1 gap-3">
            <button class="flex items-center gap-3 p-4 bg-gradient-to-r from-sky-50 to-sky-100 hover:from-sky-100 hover:to-sky-200 rounded-xl transition-all duration-300 group border border-sky-200">
              <div class="w-10 h-10 bg-sky-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-all duration-300">
                <i class="ph-user-plus text-white"></i>
              </div>
              <span class="font-semibold text-sky-800">Tambah Siswa</span>
            </button>
            
            <button class="flex items-center gap-3 p-4 bg-gradient-to-r from-green-50 to-green-100 hover:from-green-100 hover:to-green-200 rounded-xl transition-all duration-300 group border border-green-200">
              <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-all duration-300">
                <i class="ph-chalkboard-teacher text-white"></i>
              </div>
              <span class="font-semibold text-green-800">Tambah Guru</span>
            </button>
            
            <button class="flex items-center gap-3 p-4 bg-gradient-to-r from-purple-50 to-purple-100 hover:from-purple-100 hover:to-purple-200 rounded-xl transition-all duration-300 group border border-purple-200">
              <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-all duration-300">
                <i class="ph-file-text text-white"></i>
              </div>
              <span class="font-semibold text-purple-800">Buat Laporan</span>
            </button>
            
            <button class="flex items-center gap-3 p-4 bg-gradient-to-r from-orange-50 to-orange-100 hover:from-orange-100 hover:to-orange-200 rounded-xl transition-all duration-300 group border border-orange-200">
              <div class="w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-all duration-300">
                <i class="ph-gear text-white"></i>
              </div>
              <span class="font-semibold text-orange-800">Pengaturan</span>
            </button>
          </div>
        </section>

        <!-- NOTIFICATIONS -->
        <section class="glass-strong rounded-2xl p-6 shadow-card card-hover animate-slideUp" style="animation-delay: 0.6s;">
          <h2 class="text-xl font-bold mb-6 flex items-center gap-3">
            <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center relative">
              <i class="ph-bell text-white"></i>
              <div class="notification-dot">3</div>
            </div>
            <span class="bg-gradient-to-r from-red-600 to-red-800 bg-clip-text text-transparent">
              Notifikasi
            </span>
          </h2>
          
          <div class="space-y-3">
            <div class="p-4 bg-yellow-50 border border-yellow-200 rounded-xl">
              <div class="flex items-center gap-3 mb-2">
                <i class="ph-warning text-yellow-600"></i>
                <p class="font-bold text-sm text-yellow-800">Backup Sistem</p>
              </div>
              <p class="text-xs text-yellow-700">Backup otomatis akan dimulai dalam 2 jam</p>
            </div>
            
            <div class="p-4 bg-blue-50 border border-blue-200 rounded-xl">
              <div class="flex items-center gap-3 mb-2">
                <i class="ph-info text-blue-600"></i>
                <p class="font-bold text-sm text-blue-800">Update Sistem</p>
              </div>
              <p class="text-xs text-blue-700">Versi 2.1.5 tersedia untuk diinstal</p>
            </div>
            
            <div class="p-4 bg-green-50 border border-green-200 rounded-xl">
              <div class="flex items-center gap-3 mb-2">
                <i class="ph-check-circle text-green-600"></i>
                <p class="font-bold text-sm text-green-800">Izin Disetujui</p>
              </div>
              <p class="text-xs text-green-700">5 izin siswa berhasil diproses hari ini</p>
            </div>
          </div>
          
          <button class="w-full mt-4 py-3 text-slate-600 hover:text-slate-800 font-semibold text-sm hover:bg-slate-50 rounded-lg transition-all duration-300 flex items-center justify-center gap-2">
            <i class="ph-bell"></i>
            Kelola Notifikasi
          </button>
        </section>
      </div>
    </div>
  </main>

  <!-- MODALS -->
  
  <!-- Edit Profile Modal -->
  <div id="editProfileModal" class="modal-backdrop">
    <div class="modal-card">
      <div class="flex items-center justify-between mb-6">
        <h3 class="text-2xl font-bold bg-gradient-to-r from-sky-600 to-sky-800 bg-clip-text text-transparent">Edit Profil</h3>
        <button onclick="closeModal('editProfileModal')" class="p-2 hover:bg-slate-100 rounded-lg transition-colors">
          <i class="ph-x text-xl"></i>
        </button>
      </div>
      
      <form action="{{ route('profile-admin.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-semibold text-slate-600 mb-2">Nama Lengkap</label>
            <input type="text" name="name" value="{{ $admin->name ?? 'Admin' }}" class="input-modern w-full px-4 py-3 rounded-xl focus:outline-none">
          </div>
          <div>
            <label class="block text-sm font-semibold text-slate-600 mb-2">Username</label>
            <input type="text" name="username" value="{{ $admin->username ?? 'admin_gow' }}" class="input-modern w-full px-4 py-3 rounded-xl focus:outline-none">
          </div>
        </div>
        
        <div>
          <label class="block text-sm font-semibold text-slate-600 mb-2">Email</label>
          <input type="email" name="email" value="{{ $admin->email ?? 'admin@smkn13bdg.sch.id' }}" class="input-modern w-full px-4 py-3 rounded-xl focus:outline-none">
        </div>
        
        <div>
          <label class="block text-sm font-semibold text-slate-600 mb-2">No. Telepon</label>
          <input type="tel" name="phone" value="{{ $admin->phone ?? '+62 812-3456-7890' }}" class="input-modern w-full px-4 py-3 rounded-xl focus:outline-none">
        </div>
        
        <div>
          <label class="block text-sm font-semibold text-slate-600 mb-2">Bio</label>
          <textarea name="bio" class="input-modern w-full px-4 py-3 rounded-xl focus:outline-none h-24 resize-none" placeholder="Ceritakan tentang diri Anda...">{{ $admin->bio ?? 'Administrator sistem GOW INSIDE yang berpengalaman dalam mengelola data siswa dan guru.' }}</textarea>
        </div>

        <div>
          <label class="block text-sm font-semibold text-slate-600 mb-2">Foto Profil</label>
          <input type="file" name="profile_photo" accept="image/*" class="input-modern w-full px-4 py-3 rounded-xl focus:outline-none">
          <p class="text-xs text-slate-500 mt-1">Format: JPEG, PNG, JPG, GIF. Maksimal 2MB</p>
        </div>
        
        <div class="flex gap-4 pt-4">
          <button type="submit" class="btn-gradient px-8 py-3 rounded-xl font-semibold text-white flex-1">
            <i class="ph-check mr-2"></i>
            Simpan Perubahan
          </button>
          <button type="button" onclick="closeModal('editProfileModal')" class="px-8 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition-colors flex-1">
            Batal
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Change Password Modal -->
  <div id="changePasswordModal" class="modal-backdrop">
    <div class="modal-card">
      <div class="flex items-center justify-between mb-6">
        <h3 class="text-2xl font-bold bg-gradient-to-r from-red-600 to-red-800 bg-clip-text text-transparent">Ubah Password</h3>
        <button onclick="closeModal('changePasswordModal')" class="p-2 hover:bg-slate-100 rounded-lg transition-colors">
          <i class="ph-x text-xl"></i>
        </button>
      </div>
      
      <form action="{{ route('profile-admin.change-password') }}" method="POST" class="space-y-6">
        @csrf
        <div>
          <label class="block text-sm font-semibold text-slate-600 mb-2">Password Saat Ini</label>
          <div class="relative">
            <input type="password" name="current_password" id="currentPassword" class="input-modern w-full px-4 py-3 pr-12 rounded-xl focus:outline-none">
            <button type="button" onclick="togglePassword('currentPassword')" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-slate-400 hover:text-slate-600">
              <i class="ph-eye"></i>
            </button>
          </div>
        </div>
        
        <div>
          <label class="block text-sm font-semibold text-slate-600 mb-2">Password Baru</label>
          <div class="relative">
            <input type="password" name="password" id="newPassword" class="input-modern w-full px-4 py-3 pr-12 rounded-xl focus:outline-none" oninput="checkPasswordStrength(this.value)">
            <button type="button" onclick="togglePassword('newPassword')" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-slate-400 hover:text-slate-600">
              <i class="ph-eye"></i>
            </button>
          </div>
          <div class="mt-2">
            <div class="flex gap-1 mb-2">
              <div id="strength-1" class="h-2 flex-1 bg-slate-200 rounded-full transition-all duration-300"></div>
              <div id="strength-2" class="h-2 flex-1 bg-slate-200 rounded-full transition-all duration-300"></div>
              <div id="strength-3" class="h-2 flex-1 bg-slate-200 rounded-full transition-all duration-300"></div>
              <div id="strength-4" class="h-2 flex-1 bg-slate-200 rounded-full transition-all duration-300"></div>
            </div>
            <p id="strengthText" class="text-xs text-slate-500">Masukkan password baru</p>
          </div>
        </div>
        
        <div>
          <label class="block text-sm font-semibold text-slate-600 mb-2">Konfirmasi Password Baru</label>
          <div class="relative">
            <input type="password" name="password_confirmation" id="confirmPassword" class="input-modern w-full px-4 py-3 pr-12 rounded-xl focus:outline-none">
            <button type="button" onclick="togglePassword('confirmPassword')" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-slate-400 hover:text-slate-600">
              <i class="ph-eye"></i>
            </button>
          </div>
        </div>
        
        <div class="p-4 bg-yellow-50 border border-yellow-200 rounded-xl">
          <div class="flex items-start gap-3">
            <i class="ph-warning text-yellow-600 mt-0.5"></i>
            <div>
              <p class="font-semibold text-sm text-yellow-800 mb-1">Tips Password Aman:</p>
              <ul class="text-xs text-yellow-700 space-y-1">
                <li>• Minimal 8 karakter</li>
                <li>• Kombinasi huruf besar, kecil, angka, dan simbol</li>
                <li>• Tidak menggunakan informasi pribadi</li>
              </ul>
            </div>
          </div>
        </div>
        
        <div class="flex gap-4 pt-4">
          <button type="submit" class="btn-gradient px-8 py-3 rounded-xl font-semibold text-white flex-1">
            <i class="ph-lock mr-2"></i>
            Ubah Password
          </button>
          <button type="button" onclick="closeModal('changePasswordModal')" class="px-8 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition-colors flex-1">
            Batal
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Toast Notification -->
  <div id="toast" class="toast">
    <div class="flex items-center gap-3">
      <i class="ph-check-circle text-xl"></i>
      <span id="toastMessage">Profil berhasil diperbarui!</span>
    </div>
  </div>

  <!-- JAVASCRIPT -->
  <script>
    // Mobile Menu Toggle
    document.getElementById('btnMobileMenu')?.addEventListener('click', function() {
      const menu = document.getElementById('mobileMenu');
      menu.classList.toggle('hidden');
    });

    // Modal Functions
    function openModal(modalId) {
      const modal = document.getElementById(modalId);
      modal.classList.add('active');
    }

    function closeModal(modalId) {
      const modal = document.getElementById(modalId);
      modal.classList.remove('active');
    }

    // Button Event Listeners
    document.getElementById('btnEditProfile')?.addEventListener('click', () => openModal('editProfileModal'));
    document.getElementById('btnChangePassword')?.addEventListener('click', () => openModal('changePasswordModal'));

    // Close modal when clicking backdrop
    document.querySelectorAll('.modal-backdrop').forEach(modal => {
      modal.addEventListener('click', function(e) {
        if (e.target === this) {
          this.classList.remove('active');
        }
      });
    });

    // Avatar Upload
    document.getElementById('avatarUpload')?.addEventListener('click', function() {
      document.getElementById('fileUpload').click();
    });

    document.getElementById('fileUpload')?.addEventListener('change', function(e) {
      const file = e.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          document.querySelector('#avatarUpload img').src = e.target.result;
          showToast('Foto profil berhasil diperbarui!');
        };
        reader.readAsDataURL(file);
      }
    });

    // Security Toggle
    function toggleSecurity(element) {
      element.classList.toggle('active');
      const isActive = element.classList.contains('active');
      const status = isActive ? 'diaktifkan' : 'dinonaktifkan';
      showToast(`Pengaturan keamanan ${status}!`);
    }

    // Password Toggle
    function togglePassword(inputId) {
      const input = document.getElementById(inputId);
      const icon = input.nextElementSibling.querySelector('i');
      
      if (input.type === 'password') {
        input.type = 'text';
        icon.className = 'ph-eye-slash';
      } else {
        input.type = 'password';
        icon.className = 'ph-eye';
      }
    }

    // Password Strength Checker
    function checkPasswordStrength(password) {
      const strengthBars = [1, 2, 3, 4].map(i => document.getElementById(`strength-${i}`));
      const strengthText = document.getElementById('strengthText');
      
      let strength = 0;
      const checks = [
        password.length >= 8,
        /[a-z]/.test(password),
        /[A-Z]/.test(password),
        /[0-9]/.test(password),
        /[^A-Za-z0-9]/.test(password)
      ];
      
      strength = checks.filter(check => check).length;
      
      // Reset all bars
      strengthBars.forEach(bar => {
        bar.className = 'h-2 flex-1 bg-slate-200 rounded-full transition-all duration-300';
      });
      
      // Update bars based on strength
      const colors = ['bg-red-500', 'bg-orange-500', 'bg-yellow-500', 'bg-green-500'];
      const texts = ['Sangat Lemah', 'Lemah', 'Sedang', 'Kuat', 'Sangat Kuat'];
      
      for (let i = 0; i < Math.min(strength, 4); i++) {
        strengthBars[i].className = `h-2 flex-1 ${colors[Math.min(strength - 1, 3)]} rounded-full transition-all duration-300`;
      }
      
      strengthText.textContent = password.length === 0 ? 'Masukkan password baru' : texts[strength];
      strengthText.className = `text-xs ${strength < 2 ? 'text-red-500' : strength < 4 ? 'text-orange-500' : 'text-green-500'}`;
    }

    // Toast Notification
    function showToast(message) {
      const toast = document.getElementById('toast');
      const toastMessage = document.getElementById('toastMessage');
      
      toastMessage.textContent = message;
      toast.classList.add('show');
      
      setTimeout(() => {
        toast.classList.remove('show');
      }, 3000);
    }

    // Activity Chart
    const ctx = document.getElementById('activityChart')?.getContext('2d');
    if (ctx) {
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
          datasets: [{
            label: 'Login',
            data: [12, 19, 15, 25, 22, 18, 8],
            borderColor: '#57b2ff',
            backgroundColor: 'rgba(87, 178, 255, 0.1)',
            fill: true,
            tension: 0.4
          }, {
            label: 'Actions',
            data: [8, 15, 12, 20, 18, 14, 5],
            borderColor: '#10b981',
            backgroundColor: 'rgba(16, 185, 129, 0.1)',
            fill: true,
            tension: 0.4
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false
            }
          },
          scales: {
            y: {
              beginAtZero: true,
              grid: {
                color: 'rgba(148, 163, 184, 0.1)'
              }
            },
            x: {
              grid: {
                color: 'rgba(148, 163, 184, 0.1)'
              }
            }
          },
          elements: {
            point: {
              radius: 4,
              hoverRadius: 6
            }
          }
        }
      });
    }

    // Real-time Clock
    function updateClock() {
      const now = new Date();
      const timeString = now.toLocaleTimeString('id-ID', { 
        hour: '2-digit', 
        minute: '2-digit' 
      });
      
      const lastLogin = document.getElementById('lastLogin');
      if (lastLogin && lastLogin.textContent === '08:32') {
        lastLogin.textContent = timeString;
      }
    }

    setInterval(updateClock, 1000);
    
    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
      // Add some interactive animations on load
      setTimeout(() => {
        document.querySelectorAll('.animate-slideUp').forEach((el, index) => {
          el.style.animationDelay = `${index * 0.1}s`;
        });
      }, 100);
      
      // Animate progress bars
      setTimeout(() => {
        document.querySelectorAll('.progress-fill').forEach(bar => {
          const width = bar.style.width;
          bar.style.width = '0%';
          setTimeout(() => {
            bar.style.width = width;
          }, 500);
        });
      }, 1000);
    });

    // Form Submissions
    document.querySelectorAll('form').forEach(form => {
      form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Simulate form submission
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        
        submitBtn.innerHTML = '<i class="ph-spinner animate-spin mr-2"></i>Memproses...';
        submitBtn.disabled = true;
        
        setTimeout(() => {
          submitBtn.innerHTML = originalText;
          submitBtn.disabled = false;
          
          // Close modal and show toast
          const modal = this.closest('.modal-backdrop');
          if (modal) {
            modal.classList.remove('active');
          }
          
          showToast('Perubahan berhasil disimpan!');
        }, 2000);
      });
    });
  </script>
</body>
</html>