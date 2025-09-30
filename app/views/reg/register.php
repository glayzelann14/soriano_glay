```html
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
      background: radial-gradient(circle, rgba(255,255,255,0.15), transparent 70%);
      animation: shine 6s linear infinite;
    }

    @keyframes shine {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .eye-icon {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen">
  <div class="glass rounded-2xl p-10 w-full max-w-md text-white">
    
    <!-- Welcome Container -->
    <div class="text-center mb-8">
      <h1 class="text-4xl font-extrabold drop-shadow-lg">Welcome to Student Dashboard</h1>
      <p class="mt-2 text-gray-300">Create your account to get started.</p>
    </div>

    <!-- Register Form -->
    <form>
      <div class="mb-4 relative">
        <input type="text" placeholder="Username" class="w-full px-4 py-3 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400">
      </div>
      <div class="mb-4 relative">
        <input type="email" placeholder="Email" class="w-full px-4 py-3 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400">
      </div>
      <div class="password-box">
          <input type="password" id="password" name="password" placeholder="Password" required>
          <i class="fa-solid fa-eye" id="togglePassword"></i>
        </div>

        <div class="password-box">
          <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required>
          <i class="fa-solid fa-eye" id="toggleConfirmPassword"></i>
      </div>

      <button type="submit" class="w-full py-3 bg-purple-600 hover:bg-purple-700 rounded-lg font-semibold">Register</button>
      <p class="text-center text-sm mt-4">Already have an account? <a href="#" class="text-purple-400 hover:underline">Login</a></p>
    </form>
  </div>

  <script>
    function togglePassword() {
      const password = document.getElementById("password");
      password.type = password.type === "password" ? "text" : "password";
      input.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    }
  </script>
</body>
</html>
```
