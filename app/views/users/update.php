<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body class="bg-gradient-to-br from-indigo-600 via-indigo-500 to-blue-500 min-h-screen flex items-center justify-center font-sans text-gray-100">

  <div class="bg-white bg-opacity-90 backdrop-blur-md p-8 rounded-2xl shadow-2xl w-full max-w-md animate-fadeIn">
    <h2 class="text-2xl font-semibold text-center text-indigo-700 mb-6">📝 Update User</h2>

    <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST" class="space-y-5">
      
      <!-- Username -->
      <div>
        <label class="block text-indigo-700 mb-1">Username</label>
        <input type="text" name="username" value="<?= html_escape($user['username'])?>" required
               class="w-full px-4 py-3 border border-indigo-300 bg-indigo-50 rounded-xl focus:ring-2 focus:ring-indigo-400 focus:outline-none text-gray-800 transition duration-200">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-indigo-700 mb-1">Email Address</label>
        <input type="email" name="email" value="<?= html_escape($user['email'])?>" required
               class="w-full px-4 py-3 border border-indigo-300 bg-indigo-50 rounded-xl focus:ring-2 focus:ring-indigo-400 focus:outline-none text-gray-800 transition duration-200">
      </div>

      <!-- Role (only if admin) -->
      <?php if(!empty($logged_in_user) && $logged_in_user['role'] === 'admin'): ?>
        <div>
          <label class="block text-indigo-700 mb-1">Role</label>
          <select name="role" required
                  class="w-full px-4 py-3 border border-indigo-300 bg-indigo-50 rounded-xl focus:ring-2 focus:ring-indigo-400 focus:outline-none text-gray-800 transition duration-200">
            <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
          </select>
        </div>

        <!-- Password with toggle -->
        <div class="relative">
          <label class="block text-indigo-700 mb-1">Password</label>
          <input type="password" name="password" id="password"
                 class="w-full px-4 py-3 border border-indigo-300 bg-indigo-50 rounded-xl focus:ring-2 focus:ring-indigo-400 focus:outline-none text-gray-800 transition duration-200" required>
          <i class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer text-indigo-600" id="togglePassword"></i>
        </div>
      <?php endif; ?>

      <!-- Submit Button -->
      <button type="submit"
              class="w-full bg-gradient-to-r from-indigo-600 to-blue-500 hover:from-indigo-700 hover:to-blue-600 text-white font-medium py-3 rounded-xl shadow-lg transition duration-300 transform hover:-translate-y-1">
        Update User
      </button>
    </form>

    <!-- Return Button -->
    <a href="<?=site_url('/users');?>" class="mt-4 block text-center bg-indigo-500 hover:bg-indigo-600 text-white py-2 rounded-xl shadow-md transition duration-200">
      ⬅ Return to Home
    </a>
  </div>

  <!-- Password Toggle Script -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const togglePassword = document.getElementById('togglePassword');
      const password = document.getElementById('password');

      if (togglePassword && password) {
        togglePassword.addEventListener('click', function() {
          const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
          password.setAttribute('type', type);
          this.classList.toggle('fa-eye');
          this.classList.toggle('fa-eye-slash');
        });
      }
    });
  </script>

  <!-- Fade-in animation -->
  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn {
      animation: fadeIn 0.8s ease;
    }
  </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
</body>
</html>
