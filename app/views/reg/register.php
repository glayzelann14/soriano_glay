
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #0f172a, #1e3a8a, #2563eb, #3b82f6);
      background-size: 400% 400%;
      animation: gradientFlow 12s ease infinite;
      font-family: "Poppins", sans-serif;
    }

    @keyframes gradientFlow {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .glass-container {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border-radius: 18px;
      padding: 40px 35px;
      width: 420px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2),
                  inset 0 0 30px rgba(255, 255, 255, 0.08);
      position: relative;
      overflow: hidden;
    }

    .glass-container::before {
      content: "";
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,255,255,0.15), transparent 70%);
      animation: shine 8s linear infinite;
    }

    @keyframes shine {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    h2 {
      text-align: center;
      font-size: 1.9em;
      font-weight: 600;
      color: #fff;
      margin-bottom: 25px;
      z-index: 2;
      position: relative;
    }

    .input-container {
      position: relative;
      margin-bottom: 18px;
    }

    .input-container input {
      width: 100%;
      padding: 13px 45px 13px 18px;
      border-radius: 10px;
      border: 1px solid rgba(255, 255, 255, 0.3);
      background: rgba(255, 255, 255, 0.15);
      color: #fff;
      outline: none;
      font-size: 1em;
      transition: all 0.3s ease;
    }

    .input-container input:focus {
      border-color: #60a5fa;
      box-shadow: 0 0 6px rgba(96, 165, 250, 0.5);
    }

    .input-container input::placeholder {
      color: rgba(255,255,255,0.7);
    }

    .input-container i {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #e2e8f0;
      font-size: 1.1em;
    }

    button {
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

    button:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(37, 99, 235, 0.5);
    }

    .group {
      text-align: center;
      margin-top: 18px;
    }

    .group a {
      color: #93c5fd;
      text-decoration: none;
      font-weight: 500;
    }

    .group a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="glass-container">
    <h2>Create Account</h2>
    <form>
      <div class="input-container">
        <input type="text" placeholder="Username" required>
      </div>
      <div class="input-container">
        <input type="email" placeholder="Email" required>
      </div>
      <div class="input-container">
        <input type="password" id="password" placeholder="Password" required>
        <i class="fa-solid fa-eye" id="togglePassword"></i>
      </div>
      <div class="input-container">
        <input type="password" id="confirmPassword" placeholder="Confirm Password" required>
        <i class="fa-solid fa-eye" id="toggleConfirmPassword"></i>
      </div>
      <button type="submit">Register</button>
      <div class="group">
        <p>Already have an account? <a href="#">Login here</a></p>
      </div>
    </form>
  </div>

  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener("click", function () {
        const type = input.getAttribute("type") === "password" ? "text" : "password";
        input.setAttribute("type", type);
        this.classList.toggle("fa-eye");
        this.classList.toggle("fa-eye-slash");
      });
    }

    toggleVisibility("togglePassword", "password");
    toggleVisibility("toggleConfirmPassword", "confirmPassword");
  </script>
</body>
</html>

