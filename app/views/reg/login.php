<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #0f172a, #1e3a8a, #2563eb, #3b82f6);
      background-size: 400% 400%;
      animation: gradientFlow 12s ease infinite;
    }

    @keyframes gradientFlow {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .login {
      background: rgba(255,255,255,0.95);
      backdrop-filter: blur(6px);
      padding: 40px 35px;
      width: 420px;
      border-radius: 18px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.2);
      animation: fadeIn 0.8s ease-in-out;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .login h2 {
      text-align: center;
      font-size: 1.9em;
      font-weight: 600;
      color: #1e3a8a;
    }

    .inputBox {
      position: relative;
    }

    .login input {
      width: 100%;
      padding: 13px 18px;
      font-size: 1em;
      border-radius: 10px;
      border: 1px solid #cbd5e1;
      background: #f8fafc;
      color: #1e293b;
      outline: none;
      transition: all 0.2s ease;
    }

    .login input:focus {
      border-color: #2563eb;
      background: #fff;
      box-shadow: 0 0 6px rgba(37, 99, 235, 0.4);
    }

    .login input::placeholder {
      color: #64748b;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #2563eb;
    }

    #btn {
      width: 100%;
      padding: 14px;
      font-size: 1.1em;
      font-weight: 600;
      border: none;
      border-radius: 10px;
      background: linear-gradient(135deg, #2563eb, #1d4ed8);
      color: white;
      cursor: pointer;
      transition: transform 0.2s ease, box-shadow 0.3s ease;
    }

    #btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(37, 99, 235, 0.5);
    }

    .group {
      text-align: center;
      margin-top: 12px;
    }

    .group a {
      color: #2563eb;
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
  <section>
    <div class="login">
      <h2>Login</h2>

      <?php if (!empty($error)): ?>
        <div class="error-box">
          <?= $error ?>
        </div>
      <?php endif; ?>

      <form method="post" action="<?= site_url('reg/login') ?>">
        <div class="inputBox">
          <input type="text" placeholder="Username" name="username" required>
        </div>

        <div class="inputBox">
          <input type="password" placeholder="Password" name="password" id="password" required>
          <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
        </div>

        <button type="submit" id="btn">Login</button>
      </form>

      <div class="group">
        <p>Don't have an account? <a href="<?= site_url('reg/register'); ?>">Register here</a></p>
      </div>
    </div>
  </section>

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
