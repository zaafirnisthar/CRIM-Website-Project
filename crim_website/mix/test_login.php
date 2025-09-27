<?php
session_start();
require_once __DIR__ . '/config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    echo "<pre>DEBUG:
Email entered: '$email'
Password entered: '$password'
</pre>";

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        echo "<pre>DB Hash: {$user['password']}</pre>";

        if (password_verify($password, $user['password'])) {
            echo "<h3 style='color:green'>Login successful! Welcome {$user['name']} ({$user['role']})</h3>";
        } else {
            echo "<h3 style='color:red'>❌ Wrong password</h3>";
        }
    } else {
        echo "<h3 style='color:red'>❌ Email not found</h3>";
    }
}
?>

<form method="POST">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>
    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>
