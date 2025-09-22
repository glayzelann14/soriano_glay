<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Student's Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background: #f5f7fa;
      min-height: 100vh;
      margin: 0;
      padding: 30px;
      color: #212529;
    }

    /* Title */
    h1 {
      text-align: center;
      color: #0d6efd;
      margin-bottom: 35px; 
      font-size: 36px;
      font-weight: 800;
      letter-spacing: 1px;
    }

    /* Search Form */
    .search-form {
      display: flex;
      justify-content: flex-end;
      gap: 10px;              
      margin-bottom: 25px;  
    }

    .search-form input {
      width: 280px;           
      padding: 10px 12px;     
      border-radius: 8px;
      border: 1px solid #ced4da;
      font-size: 15px;
      box-shadow: inset 0 1px 3px rgba(0,0,0,0.08);
    }

    .search-form button {
      padding: 10px 18px;
      font-size: 15px;
      font-weight: 600;
      border-radius: 8px;
      background: #0d6efd;
      border: none;
      transition: all 0.3s ease;
    }

    .search-form button:hover {
      background: #0b5ed7;
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(13,110,253,0.3);
    }

    /* Table */
    table {
      width: 95%;
      margin: 0 auto 30px;
      border-collapse: collapse;
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 6px 20px rgba(0,0,0,0.08);
    }

    th, td {
      padding: 14px 16px;
      text-align: center;
    }

    th {
      background: #0d6efd; /* solid blue header */
      color: #fff;
      text-transform: uppercase;
      font-size: 14px;
      font-weight: 700;
      letter-spacing: 0.5px;
    }

    td {
      font-size: 15px;
      color: #495057;
    }

    tr:nth-child(even) {
      background-color: #f9fafb;
    }

    tr:hover {
      background-color: #f1f5ff;
      transition: background-color 0.3s ease;
    }

    /* Action Buttons */
    .action-btns {
      display: flex;
      justify-content: center;
      gap: 8px; /* maliit na pagitan lang */
    }

    a {
      text-decoration: none;
      font-weight: 500;
      font-size: 14px;
      padding: 6px 14px;
      border-radius: 6px;
      transition: all 0.3s ease;
      display: inline-block;
    }

    a[href*="update"] {
      color: #fff;
      background: #198754;
      box-shadow: 0 2px 6px rgba(25,135,84,0.3);
    }

    a[href*="update"]:hover {
      background: #157347;
      transform: scale(1.05);
    }

    a[href*="delete"] {
      color: #fff;
      background: #dc3545;
      box-shadow: 0 2px 6px rgba(220,53,69,0.3);
    }

    a[href*="delete"]:hover {
      background: #b02a37;
      transform: scale(1.05);
    }

    /* Create Button */
    .button-container {
      width: 100%;
      text-align: center;
      margin-top: 20px;
    }

    .btn-create {
      display: inline-block;
      padding: 14px 28px;
      background: #0d6efd;
      color: white;
      text-decoration: none;
      border-radius: 10px;
      font-weight: 600;
      font-size: 16px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(13,110,253,0.3);
    }

    .btn-create:hover {
      background: #0b5ed7;
      transform: translateY(-3px);
      box-shadow: 0 6px 15px rgba(13,110,253,0.4);
    }

    @media (max-width: 768px) {
      table {
        width: 100%;
        font-size: 14px;
      }

      th, td {
        padding: 10px;
      }

      .search-form {
        flex-direction: column;
        align-items: stretch;
      }

      .search-form input {
        width: 100%;
      }

      .btn-create {
        width: 90%;
      }
    }
  </style>
</head>
<body>
  <h1>Student's Info</h1>

  <!-- Search Form -->
  <form action="<?=site_url('users');?>" method="get" class="search-form">
    <?php
      $q = '';
      if(isset($_GET['q'])) {
        $q = $_GET['q'];
      }
    ?>
    <input class="form-control me-2" name="q" type="text" placeholder="Search" value="<?=html_escape($q);?>">
    <button type="submit" class="btn btn-primary">Search</button>	
  </form>

  <!-- Table -->
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Action</th>
    </tr>
    <?php foreach (html_escape($user) as $users): ?>
    <tr>
      <td><?=$users['id']; ?></td>
      <td><?=$users['username']; ?></td>
      <td><?=$users['email']; ?></td>
      <td>
        <div class="action-btns flex space-x-2">
  <a href="<?=site_url('/users/update/'.$users['id']);?>" 
     class="text-blue-600 hover:underline">Update</a>

  <a href="<?=site_url('users/delete/'.$users['id']);?>"
     onclick="return confirm('Are you sure you want to delete this user?')"
     class="text-red-600 hover:underline">Delete</a>
</div>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>

  <?php echo $page;?>

  <!-- Create Button -->
  <div class="button-container"> 
    <a href="<?=site_url('users/create'); ?>" class="btn-create">+ Create New User</a>
  </div>
</body>
</html>
