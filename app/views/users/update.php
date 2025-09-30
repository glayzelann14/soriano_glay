<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    body {
      background: linear-gradient(135deg, #2b0040, #3b0a60, #5a189a, #7b2cbf);
      background-size: 400% 400%;
      animation: gradientMove 15s ease infinite;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: "Poppins", sans-serif;
      color: white;
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
      padding: 40px 30px;
      border-radius: 2rem;
      width: 100%;
      max-width: 450px;
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
    .password-box {
      position: relative;
    }
    .password-box i {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #f472b6;
    }
    input, select {
      width: 100%;
      padding: 16px 18px;
      border-radius: 14px;
      background: rgba(255,255,255,0.2);
      border: 1px solid rgba(255,255,255,0.3);
      color: white;
      outline: none;
      margin-bottom: 20px;
      font-size: 1.05rem;
    }
    input::placeholder, select::placeholder {
      color: rgba(255,255,255,0.7);
    }
    input:focus, select:focus {
      border-color: #f472b6;
      box-shadow: 0 0 6px rgba(244,114,182,0.5);
    }
    .btn-update {
      width: 100%;
      padding: 18px;
      margin-top: 10px;
      font-weight: bold;
      font-size: 1.15rem;
      border: none;
      border-radius: 14px;
      background: linear-gradient(to right, #f97316, #fb923c, #f97316);
      color: white;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
    }
    .btn-update:hover {
      transform: scale(1.05);
      background: linear-gradient(to right, #fb923c, #f97316, #f472b6);
    }
    .return-link {
      display: block;
      width: 100%;
      text-align: center;
      margin-top: 18px;
      color: #fb923c;
      font-weight: bold;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    .return-link:hover {
      color: #f97316;
    }
  </style>
</head>
<body>

  <div class="glass">
    <h2 class="text-2xl font-bold text-center mb-6">📝 Update User</h2>

    <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST">
      <div>
        <input type="text" name="username" value="<?= html_escape($user['username'])?>" placeholder="Username" required>
      </div>
      <div>
        <input type="email" name="email" value="<?= html_escape($user['email'])?>" placeholder="Email" required>
      </div>

      <?php if(!empty($logged_in_user) && $logged_in_user['role'] === 'admin'): ?>
        <div>
          <select name="role" required>
            <option value="user" <?= $user['role']==='user'?'selected':'';?>>User</option>
            <option value="admin" <?= $user['role']==='admin'?'selected':'';?>>Admin</option>
          </select>
        </div>

        <div class="password-box">
          <input type="password" name="password" id="password" placeholder="Password" required>
          <i class="fa-solid fa-eye" id="togglePassword"></i>
        </div>
      <?php endif; ?>

      <button type="submit" class="btn-update">Update User</button>
    </form>

    <a href="<?=site_url('/users');?>" class="return-link">⬅ Return to Home</a>
  </div>

  <script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    if(togglePassword && password) {
      togglePassword.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
</body>
</html>
