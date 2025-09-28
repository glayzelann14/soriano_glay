<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Directory</title>
  <link rel="stylesheet" href="<?=base_url();?>/public/style.css">
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

<body class="bg-gradient-to-br from-blue-100 via-sky-100 to-cyan-100 min-h-screen font-sans text-gray-800">

  <!-- Navbar -->
  <nav class="bg-gradient-to-r from-blue-600 to-sky-500 shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <div class="flex items-center gap-3">
        <img src="<?=base_url();?>/public/lavalust-logo.png" class="h-10 w-10" alt="LavaLust Logo">
        <span class="text-white font-semibold text-xl tracking-wide">User Management</span>
      </div>
      <a href="<?=site_url('reg/logout');?>"
         class="bg-red-500 hover:bg-red-600 text-white font-medium px-4 py-2 rounded-lg shadow transition duration-200">
         Logout
      </a>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="max-w-6xl mx-auto mt-10 px-4">
    <div class="bg-white bg-opacity-90 backdrop-blur-sm shadow-xl rounded-2xl p-6">

      <!-- Logged In User Display -->
      <?php if(!empty($logged_in_user)): ?>
        <div class="mb-6 bg-blue-100 text-blue-800 px-4 py-4 rounded-lg shadow flex items-center gap-3 text-lg font-semibold">
          <img src="<?=base_url();?>/public/lavalust-logo.png" class="h-8 w-8" alt="Logo">
          Welcome, <span><?= html_escape($logged_in_user['username']); ?></span> 
          (Role: <span class="font-bold"><?= html_escape($logged_in_user['role']); ?></span>)
        </div>
      <?php else: ?>
        <div class="mb-6 bg-red-100 text-red-700 px-4 py-3 rounded-lg shadow">
          Logged in user not found
        </div>
      <?php endif; ?>

      <!-- Header & Search -->
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-blue-600">👥 User Directory</h1>

        <form method="get" action="<?=site_url('users');?>" class="flex">
          <input 
            type="text" 
            name="q" 
            value="<?=html_escape($_GET['q'] ?? '')?>" 
            placeholder="Search user..." 
            class="w-full border border-blue-200 bg-blue-50 rounded-l-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300 text-gray-800">
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 rounded-r-xl transition">
            🔍
          </button>
        </form>
      </div>
      
      <!-- Table -->
      <div class="overflow-x-auto rounded-xl border border-blue-200">
        <table class="w-full text-center border-collapse">
          <thead>
            <tr class="bg-blue-500 text-white">
              <th class="py-3 px-4">ID</th>
              <th class="py-3 px-4">Username</th>
              <th class="py-3 px-4">Email</th>
              <th class="py-3 px-4">Role</th>
              <th class="py-3 px-4">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach(html_escape($users) as $user): ?>
              <tr class="hover:bg-blue-50 transition duration-200">
                <td class="py-3 px-4"><?=($user['id']);?></td>
                <td class="py-3 px-4"><?=($user['username']);?></td>
                <td class="py-3 px-4"><?=($user['email']);?></td>
                <td class="py-3 px-4 font-medium"><?=($user['role']);?></td>
                <td class="py-3 px-4 space-x-3">
                  <a href="<?=site_url('users/update/'.$user['id']);?>"
                     class="px-4 py-2 text-sm font-medium rounded-lg bg-green-500 text-white hover:bg-green-600 transition duration-200 shadow">
                    ✏️ Update
                  </a>
                  <a href="<?=site_url('users/delete/'.$user['id']);?>"
                     onclick="return confirm('Are you sure you want to delete this record?');"
                     class="px-4 py-2 text-sm font-medium rounded-lg bg-red-500 text-white hover:bg-red-600 transition duration-200 shadow">
                    🗑️ Delete
                  </a>
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
      <div class="mt-6 text-center">
        <a href="<?=site_url('users/create')?>"
           class="inline-block bg-green-500 hover:bg-green-600 text-white font-medium px-6 py-3 rounded-lg shadow-md transition duration-200">
          ➕ Create New User
        </a>
      </div>
    </div>
  </div>

</body>
</html>
