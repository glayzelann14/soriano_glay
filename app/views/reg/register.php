
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    /* Animated gradient background */
    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #2b0040, #3b0a60, #5a189a, #7b2cbf);
      background-size: 400% 400%;
      animation: gradientMove 15s ease infinite;
      margin: 0;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* Glassy shimmering effect */
    .glass {
      width: 380px;
      padding: 35px;
      border-radius: 15px;
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.25);
      box-shadow: 0 0 25px rgba(255, 255, 255, 0.15), inset 0 0 20px rgba(255, 255, 255, 0.05);
      position: relative;
      overflow: hidden;
      color: #fff;
      box-sizing: border-box;
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
      margin-bottom: 20px;
      font-size: 28px;
      font-weight: bold;
      color: #fff;
    }

    .input-group {
      margin-bottom: 20px;
      position: relative;
    }

    .input-group input {
      width: 100%;
      padding: 12px 40px 12px 15px;
      border-radius: 8px;
      border: 2px solid transparent;
      outline: none;
      background: rgba(255, 255, 255, 0.1);
      color: #fff;
      font-size: 15px;
      box-sizing: border-box;
      transition: all 0.3s ease;
    }

    .input-group input::placeholder {
      color: rgba(255, 255, 255, 0.7);
    }

    /* Highlight effect on focus (orange) */
    .input-group input:focus {
      border: 2px solid #ff7e00;
      box-shadow: 0 0 10px rgba(255, 126, 0, 0.8);
      background: rgba(255, 255, 255, 0.15);
    }

    .input-group .toggle-password {
      position: absolute;
      top: 50%;
      right: 12px;
      transform: translateY(-50%);
      cursor: pointer;
      color: rgba(255, 255, 255, 0.7);
      font-size: 16px;
    }

    button {
      width: 100%;
      padding: 12px;
      border-radius: 8px;
      border: none;
      background: linear-gradient(135deg, #ff7e00, #ff4500);
      color: #fff;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s ease;
      box-sizing: border-box;
    }

    button:hover {
      background: linear-gradient(135deg, #ff914d, #ff5c33);
      box-shadow: 0 0 12px rgba(255, 126, 0, 0.8);
    }

    .links {
      text-align: center;
      margin-top: 15px;
    }

    .links a {
      color: #ff914d;
      text-decoration: underline;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="glass">
    <h2>Register</h2>
    <form>
      <div class="input-group">
        <input type="text" placeholder="Username" required>
      </div>
      <div class="input-group">
        <input type="email" placeholder="Email" required>
      </div>
      <div class="input-group">
        <input type="password" id="password" placeholder="Password" required>
        <i class="fa-solid fa-eye toggle-password" onclick="togglePassword()"></i>
      </div>
      <button type="submit">Register</button>
    </form>
    <div class="links">
      <a href="#">Already have an account? Login</a>
    </div>
  </div>

  <script>
    function togglePassword() {
      const password = document.getElementById("password");
      const icon = document.querySelector(".toggle-password");
      if (password.type === "password") {
        password.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
      } else {
        password.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
      }
    }
  </script>
</body>
</html>
