```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center font-sans text-gray-800">

  <div class="bg-white border border-gray-200 p-8 rounded-xl shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">📝 Update User</h2>

    <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST" class="space-y-5">
      
      <!-- Username -->
      <input type="text" name="username" value="<?= html_escape($user['username'])?>" required
             class="w-full px-4 py-3 border border-gray-300 bg-gray-50 rounded-lg placeholder-gray-500 focus:ring-2 focus:ring-blue-400 focus:outline-none">

      <!-- Email -->
      <input type="email" name="email" value="<?= html_escape($user['email'])?>" required
             class="w-full px-4 py-3 border border-gray-300 bg-gray-50 rounded-lg placeholder-gray-500 focus:ring-2 focus:ring-blue-400 focus:outline-none">

      <?php if(!empty($logged_in_user) && $logged_in_user['role'] === 'admin'): ?>
        <!-- Role Dropdown for Admins -->
        <select name="role" required
                class="w-full px-4 py-3 border border-gray-300 bg-gray-50 rounded-lg placeholder-gray-500 focus:ring-2 focus:ring-blue-400 focus:outline-none">
          <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
          <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
        </select>

        <!-- Password Field for Admins -->
        <div class="relative">
          <input type="password" name="password" id="password"
                 placeholder="Leave blank to keep current password"
                 class="w-full px-4 py-3 border border-gray-300 bg-gray-50 rounded-lg placeholder-gray-500 focus:ring-2 focus:ring-blue-400 focus:outline-none">
          <i class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 cursor-pointer" id="togglePassword"></i>
        </div>
      <?php endif; ?>

      <!-- Submit Button -->
      <button type="submit"
              class="w-full py-3 text-lg font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600 transition">
        Update User
      </button>
    </form>

    <!-- Return Button -->
    <a href="<?=site_url('/users');?>" 
       class="mt-4 block text-center px-5 py-2 text-sm font-medium text-blue-600 border border-blue-400 rounded-lg hover:bg-blue-50 transition">
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

</body>
</html>
```
