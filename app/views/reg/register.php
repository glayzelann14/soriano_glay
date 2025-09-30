
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background: linear-gradient(135deg, #4B0082, #2E0854);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .glass-card {
      background: rgba(255, 255, 255, 0.05);
      border-radius: 15px;
      padding: 2rem;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      width: 100%;
      max-width: 400px;
    }
    input:focus {
      outline: none;
      border-color: #f97316 !important; /* orange-500 */
      box-shadow: 0 0 0 2px #fb923c; /* orange-400 */
    }
  </style>
</head>
<body>
  <div class="glass-card">
    <h2 class="text-2xl font-bold text-center text-white mb-6">Register</h2>
    
    <!-- FORM -->
    <form action="/register" method="POST" class="space-y-4">
      <input type="text" name="fullname" placeholder="Full Name"
        class="w-full px-4 py-2 rounded-lg bg-purple-800/30 border border-purple-500 text-white"/>

      <input type="email" name="email" placeholder="Email"
        class="w-full px-4 py-2 rounded-lg bg-purple-800/30 border border-purple-500 text-white"/>

      <div class="relative">
        <input type="password" name="password" placeholder="Password"
          class="w-full px-4 py-2 rounded-lg bg-purple-800/30 border border-purple-500 text-white"/>
        <span class="absolute right-3 top-2.5 cursor-pointer text-gray-400">👁</span>
      </div>

      <!-- REGISTER BUTTON -->
      <button type="submit" 
        class="w-full py-2 rounded-lg bg-orange-500 hover:bg-orange-600 text-white font-semibold transition">
        Register
      </button>
    </form>

    <!-- LOGIN LINK -->
    <p class="text-center mt-4 text-sm text-gray-300">
      Already have an account? 
      <a href="/login" class="text-orange-400 hover:underline">Login</a>
    </p>
  </div>
</body>
</html>
