<?php
require __DIR__ . "/includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SchoolPesa - Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9fafb;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .container {
            margin-top: 100px;
        }
        h1 {
            color: #2c3e50;
        }
        p {
            color: #34495e;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>✅ SchoolPesa is Live!</h1>
        <p>If you see this page, your deployment worked.</p>
        <p>Database in use: <strong><?php echo htmlspecialchars($DB_NAME); ?></strong></p>
        <p><a href="login.php">Go to Login</a></p>
    </div>
</body>
</html>
