<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create User</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
    <!-- Title -->
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Create User</h1>

    <!-- Form -->
    <form action="<?=site_url('users/create');?>" method="POST" class="space-y-4">
      
      <!-- Username -->
      <div>
        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
        <input 
          type="text" 
          id="username" 
          name="username" 
          placeholder="Enter your username"
          required
          value="<?= isset($username) ? html_escape($username) : '' ?>"
          class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
        >
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input 
          type="email" 
          id="email" 
          name="email" 
          placeholder="Enter your email"
          required
          value="<?= isset($email) ? html_escape($email) : '' ?>"
          class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
        >
        <div id="email-error" class="text-red-500 text-xs mt-1 hidden">
          Please enter a valid email address.
        </div>
      </div>

      <!-- Submit -->
      <button 
        type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
        Create User
      </button>
    </form>

    <!-- Back to home -->
    <p class="text-center text-sm text-gray-600 mt-4">
      <a href="<?=site_url('/');?>" class="text-blue-600 hover:underline">← Return to Home</a>
    </p>
  </div>

</body>
</html>
