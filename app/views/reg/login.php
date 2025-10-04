<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #221432, #3a2257, #53317b, #6b3fa0);
      background-size: 400% 400%;
      animation: gradientMove 15s ease infinite;
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
      position: relative;
      overflow: hidden;
      border-radius: 20px;
      padding: 40px 35px;
      width: 400px;
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

    .glass h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 700;
      margin-bottom: 20px;
      color: white;
    }

    .inputBox {
      position: relative;
      margin-bottom: 18px;
    }

    .glass input {
      width: 100%;
      padding: 12px 16px;
      border-radius: 12px;
      border: 1px solid rgba(255,255,255,0.25);
      background: rgba(255,255,255,0.1);
      color: white;
      outline: none;
      transition: all 0.3s ease;
      font-size: 1em;
    }

    .glass input::placeholder {
      color: rgba(255,255,255,0.7);
    }

    .glass input:focus {
      border-color: #f472b6;
      background: rgba(255,255,255,0.15);
      box-shadow: 0 0 10px rgba(255,255,255,0.2);
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #f97316;
    }

    .btn-login {
      width: 100%;
      background: linear-gradient(to right, #fb923c, #f97316, #ea580c);
      padding: 14px;
      border-radius: 12px;
      font-size: 1.1em;
      font-weight: 700;
      color: white;
      border: none;
      cursor: pointer;
      box-shadow: 0 4px 15px rgba(255, 115, 0, 0.4);
      transition: all 0.4s ease-in-out;
    }

    .btn-login:hover {
      background: linear-gradient(to right, #f97316, #ec4899);
      transform: scale(1.05);
    }

    .group {
      text-align: center;
      margin-top: 15px;
    }

    .group a {
      color: #f97316;
      text-decoration: none;
      font-weight: 500;
    }

    .group a:hover {
      text-decoration: underline;
    }

    .error-box {
      background: rgba(255,0,0,0.08);
      color: #db2777;
      padding: 10px;
      border: 1px solid #db2777;
      border-radius: 8px;
      text-align: center;
      font-size: 0.95em;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="glass">
    <h2>Login</h2>

    <?php if (!empty($error)): ?>
      <div class="error-box"><?= $error ?></div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('reg/login') ?>">
      <div class="inputBox">
        <input type="text" placeholder="Username" name="username" required>
      </div>
      <div class="inputBox">
        <input type="password" placeholder="Password" name="password" id="password" required>
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>
      <button type="submit" class="btn-login">Login</button>
    </form>

    <div class="group">
      <p>Don't have an account? <a href="<?= site_url('reg/register'); ?>">Register here</a></p>
    </div>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>
</body>
</html>
