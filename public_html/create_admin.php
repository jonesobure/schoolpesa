<?php
require __DIR__ . "/includes/config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        $msg = "Username and password are required.";
    } else {
        // Check exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetch()) {
            $msg = "Username already exists.";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            // role can be Admin | Secretary | Teacher
            $stmt = $pdo->prepare("INSERT INTO users (username, password_hash, role, class_id, stream_id) VALUES (?, ?, 'Admin', NULL, NULL)");
            $stmt->execute([$username, $hash]);
            $msg = "Admin user created successfully! You can now log in. DELETE this file (create_admin.php).";
        }
    }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Create Admin</title></head>
<body>
<h2>Create Admin (run once)</h2>
<?php if (!empty($msg)) echo "<p><strong>".htmlspecialchars($msg)."</strong></p>"; ?>
<form method="post">
    <label>Username:<br><input name="username" required></label><br><br>
    <label>Password:<br><input name="password" type="password" required></label><br><br>
    <button type="submit">Create Admin</button>
</form>
<p style="color:#a00">Security: After success, delete <code>create_admin.php</code> from your server.</p>
</body>
</html>
