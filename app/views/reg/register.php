
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Animated gradient background */
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

    /* Glassy shimmering effect */
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

    /* Shimmer overlay */
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
  </style>
</head>
<body class="min-h-screen flex items-center justify-center px-4 text-white font-sans">

  <div class="w-full max-w-4xl flex flex-col md:flex-row items-center gap-10 bg-transparent">
    
    <!-- Left Side: Welcome -->
    <div class="flex-1 text-center md:text-left">
      <h1 class="text-5xl font-bold mb-4">Welcome!</h1>
      <p class="text-gray-200 max-w-md">
        Create an account to manage users, explore features, and get started with your journey.
      </p>
      <button class="mt-6 bg-pink-600 hover:bg-pink-700 px-6 py-2 rounded-lg shadow-lg font-medium">
        Learn More
      </button>
    </div>

    <!-- Right Side: Register Form -->
    <div class="flex-1 glass rounded-2xl shadow-2xl p-8">
      <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>
      
      <form method="post" action="<?=site_url('reg/save');?>" class="space-y-4">
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
        <div>
          <label class="block text-sm font-medium mb-1">Password</label>
          <input type="password" name="password" required
            class="w-full px-4 py-2 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-500">
        </div>
        <div>
          <label class="block text-sm font-medium mb-1">Role</label>
          <select name="role"
            class="w-full px-4 py-2 rounded-lg bg-white/20 text-white focus:outline-none focus:ring-2 focus:ring-pink-500">
            <option value="user" class="text-black">User</option>
            <option value="admin" class="text-black">Admin</option>
          </select>
        </div>

        <button type="submit"
          class="w-full bg-gradient-to-r from-orange-500 to-pink-500 hover:opacity-90 text-white font-bold py-2 rounded-lg shadow-lg transition">
          Submit
        </button>
      </form>
    </div>
  </div>

</body>
</html>
