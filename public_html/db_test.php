<?php
require __DIR__ . "/includes/config.php";

echo "<h2>Database Connection Test</h2>";

try {
    // Check if we can read something from your tables
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);

    echo "<p><strong>✅ Connected successfully!</strong></p>";
    echo "<p>Tables found in <code>$DB_NAME</code>:</p>";
    echo "<ul>";
    foreach ($tables as $t) {
        echo "<li>" . htmlspecialchars($t) . "</li>";
    }
    echo "</ul>";
} catch (Exception $e) {
    echo "<p style='color:red'>❌ Connection failed: " . htmlspecialchars($e->getMessage()) . "</p>";
}
