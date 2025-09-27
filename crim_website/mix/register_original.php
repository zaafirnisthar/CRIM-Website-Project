<?php
require_once __DIR__ . '/../config/db.php';
include __DIR__ . '/../includes/header.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($name === '' || $email === '' || $password === '') {
        $error = "All fields are required.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, 'user')");
        $stmt->bind_param("sss", $name, $email, $hashed_password);
        if ($stmt->execute()) {
            $success = "Registration successful. You can now <a href='login.php'>login</a>.";
        } else {
            $error = "Email already exists or database error.";
        }
    }
}
?>

<main class="container">
  <div class="card" style="max-width:400px;margin:auto;">
    <h2>Register</h2>
    <?php if ($error): ?><p style="color:red;"><?php echo $error; ?></p><?php endif; ?>
    <?php if ($success): ?><p style="color:green;"><?php echo $success; ?></p><?php endif; ?>
    <form method="POST">
      <label>Name:</label><br>
      <input type="text" name="name" required><br><br>
      <label>Email:</label><br>
      <input type="email" name="email" required><br><br>
      <label>Password:</label><br>
      <input type="password" name="password" required><br><br>
      <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
