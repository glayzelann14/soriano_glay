<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Directory</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .pagination {
      display: flex;
      gap: 0.5rem;
      flex-wrap: wrap;
      justify-content: center;
      margin-top: 1.5rem;
    }
    .pagination a {
      display: inline-block;
      padding: 0.5rem 1rem;
      background: #2563eb;
      color: white;
      border-radius: 0.5rem;
      font-weight: 500;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      text-decoration: none;
      transition: background 0.2s ease-in-out;
    }
    .pagination a:hover { background: #1d4ed8; }
    .pagination strong {
      display: inline-block;
      padding: 0.5rem 1rem;
      background: #1d4ed8;
      color: white;
      border-radius: 0.5rem;
      font-weight: 600;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body class="min-h-screen font-sans text-gray-800 dark:text-gray-200 
             bg-gradient-to-tr from-blue-900 via-blue-800 to-indigo-900 transition-colors duration-500">

  <!-- Navbar -->
  <nav class="bg-gradient-to-r from-blue-800 via-blue-900 to-indigo-800 shadow-md transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <a href="#" class="text-white font-semibold text-xl tracking-wide">📊 User Management</a>
      <div class="flex items-center gap-4">
        <button id="toggleDark" class="bg-blue-700 hover:bg-blue-600 text-white px-3 py-1 rounded transition">🌓 Dark Mode</button>
        <a href="<?=site_url('reg/logout');?>" class="text-white font-medium hover:underline">Logout</a>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="max-w-6xl mx-auto mt-10 px-4">
    <div class="bg-white dark:bg-gray-900 bg-opacity-90 dark:bg-opacity-80 backdrop-blur-sm shadow-xl rounded-2xl p-6 space-y-6 transition-colors duration-500">

      <!-- Logged In User -->
      <?php if(!empty($logged_in_user)): ?>
        <div class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 px-4 py-3 rounded-lg shadow transition-colors duration-500">
          <strong>Welcome:</strong> 
          <span class="font-medium"><?= html_escape($logged_in_user['username']); ?></span> 
          (Role: <span class="font-semibold"><?= html_escape($logged_in_user['role']); ?></span>)
        </div>
      <?php else: ?>
        <div class="bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-200 px-4 py-3 rounded-lg shadow transition-colors duration-500">
          Logged in user not found
        </div>
      <?php endif; ?>

      <!-- Header & Search -->
      <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        <h1 class="text-2xl font-semibold text-blue-700 dark:text-blue-400">👥 User Directory</h1>
        <form method="get" action="<?=site_url('users');?>" class="flex w-full md:w-auto">
          <input type="text" 
                 name="q" 
                 value="<?=html_escape($_GET['q'] ?? '')?>" 
                 placeholder="Search user..." 
                 class="w-full border border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-200 rounded-l-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-colors duration-300">
          <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 rounded-r-xl transition">🔍</button>
        </form>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto rounded-xl border border-gray-300 dark:border-gray-700 transition-colors duration-500">
        <table class="w-full text-center border-collapse">
          <thead>
            <tr class="bg-gradient-to-r from-blue-700 to-indigo-700 dark:from-blue-900 dark:to-indigo-800 text-white">
              <th class="py-3 px-4">ID</th>
              <th class="py-3 px-4">Username</th>
              <th class="py-3 px-4">Email</th>
              <th class="py-3 px-4">Role</th>
              <th class="py-3 px-4">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            <?php foreach(html_escape($users) as $user): ?>
              <tr class="hover:bg-blue-50 dark:hover:bg-gray-800 transition duration-200">
                <td class="py-3 px-4"><?=($user['id']);?></td>
                <td class="py-3 px-4"><?=($user['username']);?></td>
                <td class="py-3 px-4">
                  <span class="bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-200 text-sm font-medium px-3 py-1 rounded-full transition-colors duration-500">
                    <?=($user['email']);?>
                  </span>
                </td>
                <td class="py-3 px-4 font-medium"><?=($user['role']);?></td>
                <td class="py-3 px-4 space-x-3">
                  <a href="<?=site_url('users/update/'.$user['id']);?>" 
                     class="px-4 py-2 text-sm font-medium rounded-lg bg-blue-500 dark:bg-blue-700 text-white hover:bg-blue-600 dark:hover:bg-blue-600 transition shadow">✏️ Update</a>
                  <a href="<?=site_url('users/delete/'.$user['id']);?>" 
                     onclick="return confirm('Are you sure you want to delete this record?');"
                     class="px-4 py-2 text-sm font-medium rounded-lg bg-indigo-600 dark:bg-indigo-800 text-white hover:bg-indigo-700 dark:hover:bg-indigo-700 transition shadow">🗑️ Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="flex justify-center">
        <div class="pagination"><?= $page; ?></div>
      </div>

      <!-- Create New User -->
      <div class="text-center">
        <a href="<?=site_url('users/create')?>" 
           class="inline-block bg-blue-600 dark:bg-blue-700 hover:bg-blue-700 dark:hover:bg-blue-600 text-white font-medium px-6 py-3 rounded-lg shadow-md transition">
          ➕ Create New User
        </a>
      </div>

    </div>
  </div>

  <script>
    const toggleBtn = document.getElementById('toggleDark');
    toggleBtn.addEventListener('click', () => {
      document.documentElement.classList.toggle('dark');
    });
  </script>
</body>
</html>
