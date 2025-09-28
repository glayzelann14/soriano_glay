<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-100 via-white to-gray-200 min-h-screen flex items-center justify-center font-sans text-gray-800">

  <div class="bg-white bg-opacity-90 backdrop-blur-md p-8 rounded-2xl shadow-xl w-full max-w-md animate-fadeIn">
    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">📝 Update User</h2>

    <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST" class="space-y-4">
      
      <!-- Username -->
      <div>
        <label class="block text-gray-700 mb-1">Username</label>
        <input type="text" name="username" value="<?= html_escape($user['username'])?>" required
               class="w-full px-4 py-3 border border-gray-300 bg-gray-50 rounded-xl focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none text-gray-800">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-gray-700 mb-1">Email Address</label>
        <input type="email" name="email" value="<?= html_escape($user['email'])?>" required
               class="w-full px-4 py-3 border border-gray-300 bg-gray-50 rounded-xl focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none text-gray-800">
      </div>

      <!-- Role & Password (only if admin) -->
      <?php if(!empty($logged_in_user) && $logged_in_user['role'] === 'admin'): ?>
        <div>
          <label class="block text-gray-700 mb-1">Role</label>
          <select name="role" required
                  class="w-full px-4 py-3 border border-gray-300 bg-gray-50 rounded-xl focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none text-gray-800">
            <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
          </select>
        </div>

        <!-- Password with eye toggle -->
        <div class="relative">
          <label class="block text-gray-700 mb-1">Password</label>
          <input type="password" name="password" id="password"
                 class="w-full px-4 py-3 border border-gray-300 bg-gray-50 rounded-xl focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none text-gray-800" required>
          <i class="fa-solid fa-eye absolute right-4 top-10 cursor-pointer text-gray-500" id="togglePassword"></i>
        </div>
      <?php endif; ?>

      <!-- Submit Button -->
      <button type="submit"
              class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded-xl shadow-md transition duration-200">
        Update User
      </button>
    </form>

    <!-- Return Button -->
    <a href="<?=site_url('/users');?>" class="mt-4 block text-center bg-gray-600 hover:bg-gray-700 text-white py-2 rounded-xl shadow transition">
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
          const type = password.type === 'password' ? 'text' : 'password';
          password.type = type;
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

  <!-- FontAwesome for eye icon -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
</body>
</html>
