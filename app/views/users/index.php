<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Directory</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    /* Animated gradient background */
    body {
      min-height: 100vh;
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #2b0040, #3b0a60, #5a189a, #7b2cbf);
      background-size: 400% 400%;
      animation: gradientMove 15s ease infinite;
      color: white;
    }
    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* Glassy container */
    .glass {
      background: rgba(255,255,255,0.08);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(255,255,255,0.25);
      box-shadow: 0 0 25px rgba(255,255,255,0.15), inset 0 0 20px rgba(255,255,255,0.05);
      border-radius: 20px;
      padding: 40px;
      margin-top: 2rem;
      overflow: hidden;
      position: relative;
    }

    .glass::before {
      content: "";
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(
        120deg,
        rgba(255,255,255,0.05) 0%,
        rgba(255,255,255,0.2) 40%,
        rgba(255,255,255,0.05) 70%
      );
      transform: rotate(25deg);
      animation: shimmer 6s infinite linear;
    }

    @keyframes shimmer {
      0% { transform: translateX(-100%) rotate(25deg); }
      100% { transform: translateX(100%) rotate(25deg); }
    }

    h1, h2 {
      color: white;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      text-align: center;
    }

    th, td {
      padding: 12px;
    }

    thead tr {
      background: linear-gradient(to right, #fb923c, #f97316, #ea580c);
      color: white;
    }

    tbody tr:hover {
      background-color: rgba(255,255,255,0.1);
      transition: background-color 0.2s;
    }

    /* Buttons */
    .btn-orange {
      padding: 10px 20px;
      font-weight: 600;
      border-radius: 12px;
      background: linear-gradient(to right, #fb923c, #f97316, #ea580c);
      color: white;
      text-decoration: none;
      transition: all 0.3s ease-in-out;
      display: inline-block;
    }

    .btn-orange:hover {
      background: linear-gradient(to right,  #f97316, #ec4899);
      transform: scale(1.05);
    }

    /* Search Input */
    .search-input {
      padding: 10px 15px;
      border-radius: 12px 0 0 12px;
      border: 1px solid rgba(255,255,255,0.3);
      background: rgba(255,255,255,0.1);
      color: white;
      outline: none;
    }

    .search-btn {
      padding: 10px 15px;
      border-radius: 0 12px 12px 0;
      border: none;
      background: linear-gradient(to right, #fb923c, #f97316, #ea580c);
      color: white;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
    }

    .search-btn:hover {
      background: linear-gradient(to right, #f97316, #ec4899);
      transform: scale(1.05);
    }

  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="glass flex justify-between items-center px-6 py-4 shadow-lg">
    <a href="#" class="text-white font-semibold text-xl tracking-wide">User Management</a>
    <a href="<?=site_url('reg/logout');?>" class="btn-orange">Logout</a>
  </nav>

  <!-- Main Content -->
  <div class="max-w-6xl mx-auto px-4">
    <div class="glass">

      <!-- Logged In User Display -->
      <?php if(!empty($logged_in_user)): ?>
        <div class="mb-6 p-4 rounded-xl shadow-lg bg-gradient-to-r from-orange-400 via-orange-500 to-orange-600 text-white">
          <h2 class="text-2xl font-bold">Welcome, <?= html_escape($logged_in_user['username']); ?>!</h2>
          <p class="font-medium">Role: <?= html_escape($logged_in_user['role']); ?></p>
        </div>
      <?php endif; ?>

      <!-- Header + Search Bar -->
      <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
        <h1 class="text-2xl font-semibold flex items-center gap-2"><span>👥</span> User Directory</h1>
        <form method="get" action="<?=site_url('users');?>" class="flex w-full md:w-auto">
          <input type="text" name="q" value="<?=html_escape($_GET['q'] ?? '')?>" placeholder="Search user..." class="search-input">
          <button type="submit" class="search-btn">🔍</button>
        </form>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto rounded-xl">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Email</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach(html_escape($users) as $user): ?>
              <tr>
                <td><?=($user['id']);?></td>
                <td><?=($user['username']);?></td>
                <td><?=($user['email']);?></td>
                <td><?=($user['role']);?></td>
                <td class="space-x-2">
                  <?php if($logged_in_user['role'] === 'admin'): ?>
                    <a href="<?=site_url('users/update/'.$user['id']);?>" class="btn-orange text-sm px-3 py-1">✏️ Update</a>
                    <a href="<?=site_url('users/delete/'.$user['id']);?>" onclick="return confirm('Are you sure?');" class="btn-orange text-sm px-3 py-1">🗑️ Delete</a>
                  <?php else: ?>
                    <span class="px-3 py-1 rounded-lg bg-gray-500 text-gray-200">N/A</span>
                  <?php endif; ?>
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

      <!-- Create New User (only admin) -->
      <?php if($logged_in_user['role'] === 'admin'): ?>
        <div class="mt-6 text-center">
          <a href="<?=site_url('users/create')?>" class="btn-orange">➕ Create New User</a>
        </div>
      <?php endif; ?>

    </div>
  </div>
</body>
</html>
