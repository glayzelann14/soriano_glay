```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">
  <section class="w-full max-w-md p-8 bg-white rounded-xl shadow-lg border border-gray-200">
    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Login</h2>

    <form method="POST" action="<?= site_url('reg/loginAuth'); ?>" class="space-y-5">
      <input type="text" name="username" placeholder="Username"
        class="w-full px-4 py-3 border rounded-lg bg-gray-50 border-gray-300 text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-400">

      <div class="relative">
        <input type="password" id="password" name="password" placeholder="Password"
          class="w-full px-4 py-3 border rounded-lg bg-gray-50 border-gray-300 text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-400">
        <i class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 cursor-pointer" id="togglePassword"></i>
      </div>

      <button type="submit" class="w-full py-3 text-lg font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600 transition">
        Login
      </button>
    </form>

    <div class="text-center mt-5">
      <p class="text-sm text-gray-600">
        Don’t have an account?
        <a href="<?= site_url('reg/register'); ?>" class="font-medium text-blue-600 hover:underline">Register here</a>
      </p>
    </div>
  </section>

  <script>
    const togglePassword = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("password");

    togglePassword.addEventListener("click", () => {
      const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
      passwordInput.setAttribute("type", type);
      togglePassword.classList.toggle("fa-eye");
      togglePassword.classList.toggle("fa-eye-slash");
    });
  </script>
</body>
</html>
