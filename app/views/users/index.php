<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Students Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background: #ffffff;
      min-height: 100vh;
      margin: 0;
      padding: 20px;
      color: #212529;
    }

    h1 {
      text-align: center;
      color: #0d6efd;
      margin-bottom: 25px; 
      font-size: 32px;
      font-weight: 700;
    }

    /* Search Form */
    .search-form {
      display: flex;
      justify-content: flex-end;
      gap: 10px;              
      margin-bottom: 20px;  
    }

    .search-form input {
      width: 280px;           
      padding: 10px 12px;     
      border-radius: 6px;
      border: 1px solid #ced4da;
      font-size: 15px;
    }

    .search-form button {
      padding: 10px 16px;
      font-size: 15px;
      font-weight: 600;
      border-radius: 6px;
    }

    /* Table */
    table {
      width: 90%;
      margin: 0 auto 25px;
      border-collapse: collapse;
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    th, td {
      padding: 14px 16px;
      text-align: left;
    }

    th {
      background: #0d6efd;
      color: #fff;
      text-transform: uppercase;
      font-size: 14px;
      font-weight: 600;
    }

    td {
      font-size: 15px;
      color: #495057;
      border-bottom: 1px solid #e9ecef;
    }

    tr:last-child td {
      border-bottom: none;
    }

    tr:hover {
      background-color: #f8f9fa;
      transition: background-color 0.3s ease;
    }

    /* Action Buttons */
    a {
      margin: 0 6px;
      text-decoration: none;
      font-weight: 500;
      font-size: 14px;
      padding: 6px 12px;
      border-radius: 6px;
      transition: all 0.3s ease;
    }

    a[href*="update"] {
      color: #fff;
      background: #198754;
    }

    a[href*="update"]:hover {
      background: #157347;
    }

    a[href*="delete"] {
      color: #fff;
      background: #dc3545;
    }

    a[href*="delete"]:hover {
      background: #b02a37;
    }

    /* Create Button */
    .button-container {
      width: 100%;
      text-align: center;
      margin-top: 15px;
    }

    .btn-create {
      display: inline-block;
      padding: 12px 22px;
      background: #0d6efd;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-weight: 600;
      font-size: 15px;
      transition: all 0.3s ease;
    }

    .btn-create:hover {
      background: #0b5ed7;
      transform: translateY(-2px);
    }

    @media (max-width: 768px) {
      table {
        width: 100%;
        font-size: 14px;
      }

      th, td {
        padding: 10px;
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
        <a href="<?=site_url('/users/update/'.$users['id']);?>">Update</a>
        <a href="<?=site_url('/users/delete/'.$users['id']);?>">Delete</a>
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
