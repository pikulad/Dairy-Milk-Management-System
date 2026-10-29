<?php

function app_start_session()
{
    if (session_status() === PHP_SESSION_ACTIVE) {
        return;
    }

    ini_set('session.use_strict_mode', '1');
    ini_set('session.cookie_httponly', '1');
    ini_set('session.cookie_secure', isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? '1' : '0');

    if (PHP_VERSION_ID >= 70300) {
        session_set_cookie_params(array(
            'lifetime' => 0,
            'path' => '/',
            'secure' => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
            'httponly' => true,
            'samesite' => 'Lax'
        ));
    } else {
        session_set_cookie_params(0, '/', '', isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off', true);
    }

    session_start();
}

function app_csrf_token()
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function app_csrf_is_valid($token)
{
    return isset($_SESSION['csrf_token']) &&
        is_string($token) &&
        hash_equals($_SESSION['csrf_token'], $token);
}

function app_verify_password($plainPassword, $storedPassword)
{
    $info = password_get_info($storedPassword);
    if (isset($info['algo']) && $info['algo'] !== 0 && $info['algo'] !== null && $info['algo'] !== 'unknown') {
        return password_verify($plainPassword, $storedPassword);
    }

    if (preg_match('/^[a-f0-9]{32}$/i', $storedPassword)) {
        return hash_equals(strtolower($storedPassword), md5($plainPassword));
    }

    return hash_equals($storedPassword, $plainPassword);
}

function app_password_needs_upgrade($storedPassword)
{
    $info = password_get_info($storedPassword);
    return !isset($info['algo']) || $info['algo'] === 0 || $info['algo'] === null || $info['algo'] === 'unknown';
}

function app_upgrade_password($connection, $table, $id, $plainPassword)
{
    $allowedTables = array('tblcustomer', 'tblretailer', 'tblstaff');
    if (!in_array($table, $allowedTables, true)) {
        throw new InvalidArgumentException('Unsupported password table.');
    }

    $statement = mysqli_prepare($connection, "UPDATE `$table` SET password = ? WHERE id = ?");
    if (!$statement) {
        throw new RuntimeException('Unable to prepare password update.');
    }

    $passwordHash = password_hash($plainPassword, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($statement, 'si', $passwordHash, $id);
    $success = mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);

    if (!$success) {
        throw new RuntimeException('Unable to update password.');
    }
}
