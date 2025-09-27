<?php
session_start();
require_once __DIR__ . '/../config/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'fullname' => $user['fullname'],
                'email' => $user['email'],
                'role' => $user['role']
            ];
            if ($user['role'] === 'admin') {
                header("Location: ../admin/admin_dashboard.php");
                exit;
            } else {
                header("Location: ../user/user_dashboard.php");
                exit;
            }
        } else {
            $error = "Invalid email or password.";
        }
    } else {
        $error = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login - CRIM</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen p-6">

<div class="bg-gray-800 rounded-2xl shadow-xl p-10 max-w-md w-full text-center">
    <h1 class="text-4xl font-bold text-yellow-400 mb-8">CRIM Login</h1>

    <?php if ($error): ?>
        <p class="text-red-500 font-semibold mb-6"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>



    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
    <div class="mb-4 p-4 rounded-lg bg-green-600 text-white text-center font-semibold shadow-lg">
        🎉 Registration successful! Please login.
    </div>
<?php endif; ?>






    <form method="POST" class="space-y-6">
        <input type="email" name="email" placeholder="Email" required
            class="w-full p-4 rounded-xl bg-gray-700 text-yellow-100 border border-gray-600 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 transition" />

        <input type="password" name="password" placeholder="Password" required
            class="w-full p-4 rounded-xl bg-gray-700 text-yellow-100 border border-gray-600 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 transition" />

        <button type="submit"
            class="w-full p-4 rounded-xl bg-yellow-400 text-gray-900 font-bold text-lg hover:bg-yellow-500 transition transform hover:scale-105">
            Login
        </button>
    </form>

    <p class="mt-6 text-gray-300">Don't have an account? <a href="register.php" class="text-yellow-400 hover:text-yellow-500">Register</a></p>
</div>

</body>
</html>
