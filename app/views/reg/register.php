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

    .input-container {
      position: relative;
    }

    .input-container input {
      width: 100%;
      padding: 0.75rem 2.5rem 0.75rem 1rem; /* extra right padding for icon */
      border-radius: 0.5rem;
      background: rgba(255, 255, 255, 0.2);
      color: #fff;
      outline: none;
    }

    .input-container .toggle-password {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 1.2rem;
      cursor: pointer;
      color: #ddd;
    }

    .header {
      background: rgba(255, 255, 255, 0.15);
      border-bottom: 1px solid rgba(255, 255, 255, 0.25);
      padding: 1rem;
      text-align: center;
      border-radius: 0.75rem 0.75rem 0 0;
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen">
  <div class="glass rounded-2xl w-full max-w-md text-white">
    
    <!-- Header -->
    <div class="header">
      <h1 class="text-3xl font-bold">Welcome to Student Dashboard</h1>
      <p class="text-gray-200 text-sm mt-1">Create your account to get started</p>
    </div>

    <!-- Form -->
    <div class="p-8">
      <form>
        <div class="mb-4 input-container">
          <input type="text" placeholder="Username">
        </div>
        <div class="mb-4 input-container">
          <input type="email" placeholder="Email">
        </div>
        <div class="mb-6 input-container">
          <input type="password" id="password" placeholder="Password">
          <span class="toggle-password" onclick="togglePassword()">👁</span>
        </div>
        <button type="submit" class="w-full py-3 bg-purple-600 hover:bg-purple-700 rounded-lg font-semibold">Register</button>
        <p class="text-center text-sm mt-4">Already have an account? <a href="#" class="text-purple-400 hover:underline">Login</a></p>
      </form>
    </div>
  </div>

  <script>
    function togglePassword() {
      const password = document.getElementById("password");
      password.type = password.type === "password" ? "text" : "password";
    }
  </script>
</body>
</html>
```
