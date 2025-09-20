<?php
// includes/functions.php
function is_logged_in(): bool {
    return !empty($_SESSION['user']);
}

function require_login(): void {
    if (!is_logged_in()) {
        header("Location: /login.php");
        exit;
    }
}

function current_user() {
    return $_SESSION['user'] ?? null;
}
