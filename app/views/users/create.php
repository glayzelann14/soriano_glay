<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create User</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
<style>
body {
  background: linear-gradient(135deg, #2b0040, #3b0a60, #5a189a, #7b2cbf);
  background-size: 400% 400%;
  animation: gradientMove 15s ease infinite;
  font-family: "Poppins", sans-serif;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  color: white;
}
@keyframes gradientMove {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}
.glass {
  background: rgba(255,255,255,0.08);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  border: 1px solid rgba(255,255,255,0.25);
  box-shadow: 0 0 25px rgba(255,255,255,0.15), inset 0 0 20px rgba(255,255,255,0.05);
  position: relative;
  overflow: hidden;
  padding: 40px;
  border-radius: 2rem;
  width: 100%;
  max-width: 450px;
}
.glass::before {
  content: "";
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: linear-gradient(120deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0.2) 40%, rgba(255,255,255,0.05) 70%);
  transform: rotate(25deg);
  animation: shimmer 6s infinite linear;
}
@keyframes shimmer {
  0% { transform: translateX(-100%) rotate(25deg); }
  100% { transform: translateX(100%) rotate(25deg); }
}
.password-box { position: relative; }
.password-box i {
  position: absolute;
  right: 15px;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
  color: #fb923c;
}
input, button {
  font-family: "Poppins", sans-serif;
}
</style>
</head>
<body>

<div class="glass">
  <h2 class="text-2xl font-bold text-center mb-6">Create User</h2>

  <form id="user-form" action="<?=site_url('users/create/')?>" method="POST" class="space-y-4">

    <!-- Username -->
    <div>
      <label class="block text-sm font-medium mb-1">Username</label>
      <input type="text" name="username" required
             value="<?= isset($username) ? html_escape($username) : '' ?>"
             class="w-full px-4 py-2 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-400">
    </div>

    <!-- Email -->
    <div>
      <label class="block text-sm font-medium mb-1">Email</label>
      <input type="email" name="email" required
             value="<?= isset($email) ? html_escape($email) : '' ?>"
             class="w-full px-4 py-2 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-400">
    </div>

    <!-- Password -->
    <div class="password-box">
      <label class="block text-sm font-medium mb-1">Password</label>
      <div class="relative">
        <input type="password" id="password" name="password" required
               class="w-full px-4 py-2 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-400">
        <i class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer text-orange-400"
           onclick="toggleVisibility('password', this)"></i>
      </div>
    </div>

    <!-- Confirm Password -->
    <div class="password-box">
      <label class="block text-sm font-medium mb-1">Confirm Password</label>
      <div class="relative">
        <input type="password" id="confirmPassword" name="confirm_password" required
               class="w-full px-4 py-2 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-400">
        <i class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer text-orange-400"
           onclick="toggleVisibility('confirmPassword', this)"></i>
      </div>
    </div>

    <!-- Role Dropdown -->
    <div class="relative">
      <button type="button" id="roleBtn"
              class="w-full px-5 py-4 bg-white/10 text-white rounded-2xl text-lg text-left focus:ring-2 focus:ring-orange-400 focus:outline-none flex justify-between items-center">
        <span id="selectedRole">Select Role</span>
        <i class="fa-solid fa-caret-down"></i>
      </button>
      <ul id="roleDropdown" class="absolute w-full mt-1 bg-white/10 text-white rounded-2xl shadow-lg hidden z-50 max-h-40 overflow-y-auto">
        <li class="px-5 py-3 hover:bg-orange-400/50 cursor-pointer" data-value="user">User</li>
        <li class="px-5 py-3 hover:bg-orange-400/50 cursor-pointer" data-value="admin">Admin</li>
      </ul>
      <input type="hidden" name="role" id="roleInput">
    </div>

    <!-- Submit Button -->
    <button type="submit"
            class="w-full bg-gradient-to-r from-orange-400 via-orange-500 to-orange-600 
                   hover:from-orange-500 hover:to-pink-500
                   transition-all duration-500 ease-in-out 
                   transform hover:scale-105
                   text-white font-bold py-2 rounded-lg shadow-lg">
      Create User
    </button>

  </form>

  <div class="text-center mt-4">
    <p>Already have an account? 
      <a href="<?=site_url('reg/login');?>" class="text-orange-400 hover:underline">Login</a>
    </p>
  </div>
</div>

<script>
function toggleVisibility(inputId, icon) {
  const input = document.getElementById(inputId);
  if(input.type === "password") {
    input.type = "text";
    icon.classList.remove("fa-eye");
    icon.classList.add("fa-eye-slash");
  } else {
    input.type = "password";
    icon.classList.remove("fa-eye-slash");
    icon.classList.add("fa-eye");
  }
}

// Role dropdown logic
const roleBtn = document.getElementById('roleBtn');
const roleDropdown = document.getElementById('roleDropdown');
const selectedRole = document.getElementById('selectedRole');
const roleInput = document.getElementById('roleInput');

roleBtn.addEventListener('click', () => {
  roleDropdown.classList.toggle('hidden');
});

roleDropdown.querySelectorAll('li').forEach(item => {
  item.addEventListener('click', () => {
    selectedRole.textContent = item.textContent;
    roleInput.value = item.getAttribute('data-value');
    roleDropdown.classList.add('hidden');
  });
});

// Close dropdown if clicked outside
document.addEventListener('click', e => {
  if (!roleBtn.contains(e.target) && !roleDropdown.contains(e.target)) {
    roleDropdown.classList.add('hidden');
  }
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
</body>
</html>
