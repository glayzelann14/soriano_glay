<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create User</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body class="bg-gradient-to-br from-pink-200 via-pink-300 to-purple-400 min-h-screen flex items-center justify-center font-sans text-gray-800">

  <div class="bg-white/30 backdrop-blur-lg p-8 rounded-3xl shadow-2xl w-full max-w-md animate-fadeIn border border-white/40">
    <h1 class="text-3xl font-semibold text-center text-pink-700 mb-6">Create User</h1>

    <form id="user-form" action="<?=site_url('users/create/')?>" method="POST" class="space-y-5">

      <!-- Username -->
      <div>
        <input type="text" name="username" placeholder="Username" required
               value="<?= isset($username) ? html_escape($username) : '' ?>"
               class="w-full px-5 py-4 border border-white/50 bg-white/40 rounded-2xl focus:ring-2 focus:ring-pink-300 focus:outline-none text-gray-900 text-lg placeholder-gray-700 transition duration-200">
      </div>

      <!-- Email -->
      <div>
        <input type="email" name="email" placeholder="Email" required
               value="<?= isset($email) ? html_escape($email) : '' ?>"
               class="w-full px-5 py-4 border border-white/50 bg-white/40 rounded-2xl focus:ring-2 focus:ring-pink-300 focus:outline-none text-gray-900 text-lg placeholder-gray-700 transition duration-200">
      </div>

      <!-- Password with toggle -->
      <div class="relative">
        <input type="password" name="password" id="password" placeholder="Password" required
               class="w-full px-5 py-4 border border-white/50 bg-white/40 rounded-2xl focus:ring-2 focus:ring-pink-300 focus:outline-none text-gray-900 text-lg placeholder-gray-700 transition duration-200">
        <i class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer text-pink-600" id="togglePassword"></i>
      </div>

      <!-- Role -->
      <div>
        <select name="role" required
                class="w-full px-5 py-4 border border-white/50 bg-white/40 rounded-2xl focus:ring-2 focus:ring-pink-300 focus:outline-none text-gray-900 text-lg transition duration-200">
          <option value="" disabled selected>Select Role</option>
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <!-- Submit -->
      <button type="submit"
              class="w-full bg-gradient-to-r from-pink-500 to-purple-500 hover:from-pink-600 hover:to-purple-600 text-white font-medium py-4 rounded-2xl shadow-lg text-lg transition duration-300 transform hover:-translate-y-1">
        Create User
      </button>
    </form>

    <div class="text-center mt-6">
      <a href="<?=site_url('/users'); ?>" class="inline-block bg-pink-500 hover:bg-pink-600 text-white py-3 px-6 rounded-2xl shadow-md text-lg transition duration-200">
        ← Return to Home
      </a>
    </div>
  </div>

  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn { animation: fadeIn 0.8s ease; }
  </style>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const togglePassword = document.getElementById('togglePassword');
      const password = document.getElementById('password');

      if (togglePassword && password) {
        togglePassword.addEventListener('click', function () {
          const type = password.type === 'password' ? 'text' : 'password';
          password.type = type;
          this.classList.toggle('fa-eye');
          this.classList.toggle('fa-eye-slash');
        });
      }
    });
  </script>
</body>
</html>
