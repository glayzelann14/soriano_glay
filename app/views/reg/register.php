```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
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
      background: linear-gradient(135deg, #2b0040, #3b0a60, #5a189a, #7b2cbf);
      background-size: 400% 400%;
      animation: gradientFlow 12s ease infinite;
    }

    @keyframes gradientFlow {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .login {
      background: rgba(255, 255, 255, 0.12);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      padding: 40px 35px;
      width: 420px;
      border-radius: 18px;
      border: 1px solid rgba(255, 255, 255, 0.25);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
      animation: fadeIn 0.8s ease-in-out;
      color: #fff;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .login h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 700;
      color: #fff;
      margin-bottom: 25px;
    }

    .login input {
      width: 100%;
      padding: 13px 18px;
      margin-bottom: 18px;
      font-size: 1em;
      border-radius: 10px;
      border: 1px solid rgba(255, 255, 255, 0.4);
      background: rgba(255, 255, 255, 0.15);
      color: #fff;
      outline: none;
      transition: all 0.2s ease;
    }

    .login input:focus {
      border-color: #ff6a00;
      background: rgba(255, 255, 255, 0.25);
      box-shadow: 0 0 6px rgba(255, 106, 0, 0.5);
    }

    .login input::placeholder {
      color: #d1d5db;
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
      color: #ff6a00;
      font-size: 1.1em;
    }

    #btn {
      width: 100%;
      padding: 14px;
      font-size: 1.1em;
      font-weight: 600;
      border: none;
      border-radius: 10px;
      background: linear-gradient(90deg, #ff6a00, #ff3366);
      color: white;
      cursor: pointer;
      transition: transform 0.2s ease, box-shadow 0.3s ease;
    }

    #btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(255, 51, 102, 0.6);
    }

    .group {
      text-align: center;
      margin-top: 18px;
    }

    .group a {
      color: #ff6a00;
      text-decoration: none;
      font-weight: 500;
    }

    .group a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <section>
    <div class="login">
      <h2>Create Account</h2>
      <form method="POST" action="<?= site_url('reg/register'); ?>">

        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>

        <div class="password-box">
          <input type="password" id="password" name="password" placeholder="Password" required>
          <i class="fa-solid fa-eye" id="togglePassword"></i>
        </div>

        <div class="password-box">
          <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required>
          <i class="fa-solid fa-eye" id="toggleConfirmPassword"></i>
        </div>

        <!-- Hidden role (default = user) -->
        <input type="hidden" name="role" value="user">

        <button type="submit" id="btn">Register</button>
      </form>

      <div class="group">
        <p>Already have an account? <a href="<?= site_url('reg/login'); ?>">Login here</a></p>
      </div>
    </div>
  </section>

  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener('click', function () {
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }

    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');
  </script>
</body>
</html>
```
