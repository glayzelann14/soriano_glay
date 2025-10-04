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
.password-box { position: relative; }
.password-box i {
  position: absolute;
  right: 15px;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
  color: #fb923c;
}
.btn-update {
  width: 100%;
  padding: 16px;
  font-weight: bold;
  font-size: 1.1rem;
  border: none;
  border-radius: 0.75rem;
  background: linear-gradient(to right, #f97316, #fb923c, #f97316);
  color: white;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
}
.btn-update:hover {
  transform: scale(1.05);
  background: linear-gradient(to right, #f97316, #f472b6);
}
.return-link {
  display: block;
  width: 100%;
  text-align: center;
  margin-top: 16px;
  color: #fb923c;
  font-weight: normal;
  text-decoration: none;
  font-size: 1rem;
  transition: color 0.3s ease;
}
.return-link:hover { color: #f97316; }
</style>
</head>
<body>

<div class="glass">
  <h2 class="text-2xl font-bold text-center mb-6">Update User</h2>

  <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST" class="space-y-5">

    <!-- Username -->
<div>
  <input type="text" name="username" placeholder="Username" required
         value="<?= html_escape($user['username'])?>"
         class="w-full px-4 py-3 border border-white/50 bg-transparent rounded-xl
                focus:ring-2 focus:ring-orange-400 focus:outline-none text-white placeholder-gray-300 transition duration-200">
</div>

<!-- Email -->
<div>
  <input type="email" name="email" placeholder="Email" required
         value="<?= html_escape($user['email'])?>"
         class="w-full px-4 py-3 border border-white/50 bg-transparent rounded-xl
                focus:ring-2 focus:ring-orange-400 focus:outline-none text-white placeholder-gray-300 transition duration-200">
</div>

<div>
        <label class="block text-sm font-medium mb-1">Role</label>
        <select name="role" required
          class="w-full px-4 py-2 rounded-lg bg-white/20 text-white cursor-pointer focus:outline-none focus:ring-2 focus:ring-pink-500">
          <option value="" disabled selected>Select Role</option>
          <option value="user" class="text-black">User</option>
          <option value="admin" class="text-black">Admin</option>
        </select>
      </div>




    <!-- Password -->
<div class="relative">
  <input type="password" name="password" id="password" placeholder="New Password (leave blank to keep current)"
         class="w-full px-4 py-3 border border-white/50 bg-transparent rounded-xl
                focus:ring-2 focus:ring-orange-400 focus:outline-none text-white placeholder-gray-300 transition duration-200">
  <i class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer text-white"
     onclick="toggleVisibility('password', this)"></i>
</div>



    <!-- Submit -->
    <button type="submit" class="btn-update">Update User</button>
  </form>

  <a href="<?=site_url('/users');?>" class="return-link">⬅ Return to Home</a>
</div>

<script>
function toggleVisibility(inputId, icon) {
  const input = document.getElementById(inputId);
  if(input.type==='password') {
    input.type='text';
    icon.classList.remove('fa-eye');
    icon.classList.add('fa-eye-slash');
  } else {
    input.type='password';
    icon.classList.remove('fa-eye-slash');
    icon.classList.add('fa-eye');
  }
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
</body>
</html>
