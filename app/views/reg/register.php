
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background: linear-gradient(135deg, #2b0040, #3b0a60, #5a189a, #7b2cbf);
      background-size: 400% 400%;
      animation: gradientMove 15s ease infinite;
    }
    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .glass {
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.25);
      box-shadow: 0 0 25px rgba(255, 255, 255, 0.15),
                  inset 0 0 20px rgba(255, 255, 255, 0.05);
      position: relative;
      overflow: hidden;
    }

    .glass::before {
      content: "";
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(
        120deg,
        rgba(255, 255, 255, 0.05) 0%,
        rgba(255, 255, 255, 0.2) 40%,
        rgba(255, 255, 255, 0.05) 70%
      );
      transform: rotate(25deg);
      animation: shimmer 6s infinite linear;
    }

    @keyframes shimmer {
      0% { transform: translateX(-100%) rotate(25deg); }
      100% { transform: translateX(100%) rotate(25deg); }
    }

    .password-box {
      position: relative;
    }
    .password-box i {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #f472b6;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center px-4 text-white font-sans">


    <!-- Right Side: Register Form -->
    <div class="flex-1 glass rounded-2xl shadow-2xl p-8">
      <h2 class="text-2xl font-bold mb-6 text-center">Create Account</h2>
      
      <form method="post" action="<?=site_url('reg/register');?>" class="space-y-4">
        <div>
          <label class="block text-sm font-medium mb-1">Username</label>
          <input type="text" name="username" required
            class="w-full px-4 py-2 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-500">
        </div>
        <div>
          <label class="block text-sm font-medium mb-1">Email</label>
          <input type="email" name="email" required
            class="w-full px-4 py-2 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-500">
        </div>
        <div class="password-box">
          <label class="block text-sm font-medium mb-1">Password</label>
          <input type="password" id="password" name="password" required
            class="w-full px-4 py-2 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-500">
          <i class="fa-solid fa-eye" id="togglePassword"></i>
        </div>
        <div class="password-box">
          <label class="block text-sm font-medium mb-1">Confirm Password</label>
          <input type="password" id="confirmPassword" name="confirm_password" required
            class="w-full px-4 py-2 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-500">
          <i class="fa-solid fa-eye" id="toggleConfirmPassword"></i>
        </div>

        <button type="submit"
          class="w-full bg-gradient-to-r from-pink-500 to-purple-500 hover:opacity-90 text-white font-bold py-2 rounded-lg shadow-lg transition">
          Register
        </button>
      </form>

      <div class="text-center mt-4">
        <p>Already have an account? 
          <a href="<?=site_url('reg/login');?>" class="text-pink-400 hover:underline">Login</a>
        </p>
      </div>
    </div>
  </div>

  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener('click', function () {
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }

    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
</body>
</html>
