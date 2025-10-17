<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>GOW INSIDE • Login</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

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
          },
          fontFamily: { pop: ['Poppins','ui-sans-serif','system-ui'] },
        }
      }
    }
  </script>

  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet" />
  <script src="https://unpkg.com/phosphor-icons"></script>

  <style>
    body{
      font-family:'Poppins',sans-serif; 
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .glass{ background:rgba(255,255,255,.95); border:1px solid rgba(255,255,255,.55); backdrop-filter:blur(24px) }
  </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4">
  
  <div class="w-full max-w-md">
    <!-- Logo dan Judul -->
    <div class="text-center mb-8">
      <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white shadow-lg mb-4">
        <img src="{{ asset('assets/smkn13.jpg.png') }}" alt="Logo" class="w-10 h-10 object-contain">
      </div>
      <h1 class="text-3xl font-extrabold text-white mb-2">GOW INSIDE</h1>
      <p class="text-white/80">Sistem Perizinan Siswa Digital</p>
    </div>

    <!-- Form Login -->
    <div class="glass rounded-3xl p-8 shadow-2xl">
      
      <!-- Alert Error -->
      @if ($errors->any())
      <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-xl">
        <div class="flex">
          <i class="ph-warning-circle text-red-400 mr-2"></i>
          <div class="text-sm text-red-600">
            @foreach ($errors->all() as $error)
              <p>{{ $error }}</p>
            @endforeach
          </div>
        </div>
      </div>
      @endif

      <!-- Alert Success -->
      @if (session('success'))
      <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-xl">
        <div class="flex">
          <i class="ph-check-circle text-green-400 mr-2"></i>
          <p class="text-sm text-green-600">{{ session('success') }}</p>
        </div>
      </div>
      @endif

      <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <div class="mb-6">
          <label for="username" class="block text-sm font-semibold text-gray-700 mb-2">
            <i class="ph-user mr-1"></i> Username
          </label>
          <input 
            type="text" 
            id="username" 
            name="username" 
            value="{{ old('username') }}"
            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('username') border-red-300 @enderror"
            placeholder="Masukkan username"
            required 
            autofocus
          >
        </div>

        <div class="mb-6">
          <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
            <i class="ph-lock mr-1"></i> Password
          </label>
          <div class="relative">
            <input 
              type="password" 
              id="password" 
              name="password" 
              class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('password') border-red-300 @enderror"
              placeholder="Masukkan password"
              required
            >
            <button 
              type="button" 
              id="togglePassword" 
              class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600"
            >
              <i class="ph-eye" id="eyeIcon"></i>
            </button>
          </div>
        </div>

        <button 
          type="submit" 
          class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold py-3 px-4 rounded-xl hover:from-blue-600 hover:to-purple-700 transition-all transform hover:scale-105 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
        >
          <i class="ph-sign-in mr-2"></i> Masuk
        </button>
      </form>

      <div class="mt-6 text-center text-sm text-gray-500">
        <p>SMKN 13 Bandung • Dashboard Piket</p>
      </div>
    </div>

    <!-- Info Akun Demo -->
    <div class="mt-6 glass rounded-2xl p-4 text-center">
      <h3 class="font-bold text-gray-700 mb-2">Akun Demo</h3>
      <div class="text-sm text-gray-600 space-y-1">
        <p><strong>Admin:</strong> admin / admin123</p>
        <p><strong>Guru Piket:</strong> guru_piket1 / password</p>
        <p><strong>Guru Pengajar:</strong> guru1 / password</p>
      </div>
    </div>

  </div>

  <script>
    // Toggle password visibility
    document.getElementById('togglePassword').addEventListener('click', function () {
      const passwordInput = document.getElementById('password');
      const eyeIcon = document.getElementById('eyeIcon');
      
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.className = 'ph-eye-slash';
      } else {
        passwordInput.type = 'password';
        eyeIcon.className = 'ph-eye';
      }
    });
  </script>

</body>
</html>