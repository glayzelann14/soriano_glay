<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Directory</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      min-height: 100vh;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #0f172a, #1e3a8a, #2563eb, #3b82f6);
      background-size: 400% 400%;
      animation: gradientFlow 15s ease infinite;
    }

    @keyframes gradientFlow {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .card {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
      border-radius: 1.5rem;
      box-shadow: 0 10px 30px rgba(0,0,0,0.15);
      padding: 2rem;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(0,0,0,0.25);
    }

    table th {
      background: linear-gradient(to right, #2563eb, #1e40af);
      color: white;
    }

    .badge {
      background: linear-gradient(to right, #3b82f6, #2563eb);
      color: white;
      font-weight: 500;
      padding: 0.3rem 0.7rem;
      border-radius: 9999px;
      font-size: 0.85rem;
      transition: transform 0.2s ease;
    }
    .badge:hover {
      transform: scale(1.05);
    }

    .create-btn {
      background: linear-gradient(to right, #3b82f6, #2563eb);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .create-btn:hover {
      transform: translateY(-3px) scale(1.02);
      box-shadow: 0 10px 20px rgba(37, 99, 235, 0.5);
    }

    .table-row:hover {
      background: rgba(59, 130, 246, 0.1);
      transform: translateX(3px);
      transition: all 0.3s ease;
    }

    /* PAGINATION */
    .pagination {
      display: flex;
      gap: 0.5rem;
      justify-content: center;
      margin-top: 1.5rem;
      flex-wrap: nowrap;
    }

    .pagination a {
      display: inline-block;
      padding: 0.5rem 1rem;
      background-color: #2563eb;
      color: white;
      border-radius: 0.5rem;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      text-decoration: none;
      font-weight: 500;
      transition: background-color 0.2s ease-in-out;
    }

    .pagination a:hover {
      background-color: #1d4ed8;
    }

    .pagination strong {
      display: inline-block;
      padding: 0.5rem 1rem;
      background-color: #1e40af;
      color: white;
      border-radius: 0.5rem;
      font-weight: 600;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body class="text-gray-900">

  <!-- Navbar -->
  <nav class="bg-gradient-to-r from-blue-800 via-blue-900 to-indigo-800 shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <a href="#" class="text-white font-bold text-xl tracking-wide">📊 User Management</a>
      <a href="<?=site_url('reg/logout');?>" class="text-white font-medium hover:underline">Logout</a>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="max-w-6xl mx-auto mt-10 px-4">
    <div class="card space-y-6">

      <!-- Logged In User -->
      <?php if(!empty($logged_in_user)): ?>
        <div class="bg-blue-100 text-blue-800 px-4 py-3 rounded-xl shadow-md">
          <strong>Welcome:</strong> 
          <span class="font-medium"><?= html_escape($logged_in_user['username']); ?></span> 
          (Role: <span class="font-semibold"><?= html_escape($logged_in_user['role']); ?></span>)
        </div>
      <?php else: ?>
        <div class="bg-red-100 text-red-700 px-4 py-3 rounded-xl shadow-md">
          Logged in user not found
        </div>
      <?php endif; ?>

      <!-- Header & Search -->
      <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        <h1 class="text-3xl font-bold text-blue-700">👥 User Directory</h1>
        <form method="get" action="<?=site_url('users');?>" class="flex w-full md:w-auto">
          <input type="text" 
                 name="q" 
                 value="<?=html_escape($_GET['q'] ?? '')?>" 
                 placeholder="Search user..." 
                 class="w-full border border-gray-300 bg-gray-100 text-gray-900 rounded-l-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
          <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 rounded-r-xl transition">🔍</button>
        </form>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto rounded-xl border border-gray-300">
  <table class="w-full text-center border-collapse">
    <thead>
      <tr class="bg-gradient-to-r from-blue-600 to-blue-400 text-white">
        <th class="py-3 px-4">ID</th>
        <th class="py-3 px-4">Username</th>
        <th class="py-3 px-4">Email</th>
        <th class="py-3 px-4">Role</th>
        <th class="py-3 px-4">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach(html_escape($users) as $user): ?>
        <tr class="bg-blue-50">
          <td class="py-3 px-4"><?=($user['id']);?></td>
          <td class="py-3 px-4"><?=($user['username']);?></td>
          <td class="py-3 px-4"><?=($user['email']);?></td>
          <td class="py-3 px-4"><?=($user['role']);?></td>
          <td class="py-3 px-4 space-x-3">
            <a href="<?=site_url('users/update/'.$user['id']);?>" 
               class="px-4 py-2 text-sm font-medium rounded-lg bg-blue-500 text-white hover:bg-blue-600 transition shadow">✏️ Update</a>
            <a href="<?=site_url('users/delete/'.$user['id']);?>" 
               onclick="return confirm('Are you sure you want to delete this record?');"
               class="px-4 py-2 text-sm font-medium rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition shadow">🗑️ Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

      <!-- Pagination -->
      <div class="mt-6 flex justify-center">
        <div class="pagination">
          <?= $page; ?>
        </div>
      </div>

      <!-- Create New User -->
      <div class="text-center">
        <a href="<?=site_url('users/create')?>" 
           class="create-btn inline-block text-white font-medium px-6 py-3 rounded-xl shadow-md">
          ➕ Create New User
        </a>
      </div>

    </div>
  </div>

</body>
</html>
