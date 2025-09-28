```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 via-white to-gray-200">

  <section class="w-full flex justify-center items-center">
    <div class="bg-white w-full max-w-md rounded-2xl shadow-xl border border-gray-200 p-10 flex flex-col gap-6">

      <h2 class="text-2xl font-semibold text-gray-800 text-center">Register</h2>

      <?php if (!empty($error)): ?>
        <div class="bg-red-100 text-red-700 border border-red-400 rounded-lg p-3 text-center text-sm">
          <?= $error ?>
        </div>
      <?php endif; ?>

      <form method="post" action="<?= site_url('reg/register') ?>" class="flex flex-col gap-4">
        <!-- Full Name -->
        <div class="relative">
          <input 
            type="text" 
            placeholder="username" 
            name="username" 
            required 
            class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none"
          >
        </div>

        <!-- Username -->
        <div class="relative">
          <input 
            type="text" 
            placeholder="Username" 
            name="username" 
            required 
            class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none"
          >
        </div>

        <!-- Email -->
        <div class="relative">
          <input 
            type="email" 
            placeholder="Email" 
            name="email" 
            required 
            class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none"
          >
        </div>

        <!-- Password -->
        <div class="relative">
          <input 
            type="password" 
            placeholder="Password" 
            name="password" 
            id="password" 
            required 
            class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none"
          >
          <i class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 cursor-pointer" id="togglePassword"></i>
        </div>

        <!-- Confirm Password -->
        <div class="relative">
          <input 
            type="password" 
            placeholder="Confirm Password" 
            name="confirm_password" 
            id="confirm_password" 
            required 
            class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none"
          >
          <i class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 cursor-pointer" id="toggleConfirm"></i>
        </div>

        <!-- Button -->
        <button 
          type="submit" 
          id="btn" 
          class="w-full py-3 bg-blue-600 hover:bg-blue-700 transition text-white font-medium rounded-lg"
        >
          Register
        </button>
      </form>

      <div class="text-center text-sm text-gray-600">
        Already have an account? 
        <a href="<?= site_url('reg/login'); ?>" class="text-blue-600 font-medium hover:underline">Login here</a>
      </div>

    </div>
  </section>

  <script>
    // Password toggle for password + confirm password
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    const toggleConfirm = document.querySelector('#toggleConfirm');
    const confirmPassword = document.querySelector('#confirm_password');

    togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });

    toggleConfirm.addEventListener('click', function () {
      const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
      confirmPassword.setAttribute('type', type);
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>

</body>
</html>
