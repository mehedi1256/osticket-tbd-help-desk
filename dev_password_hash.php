<?php
// Simple local-only tool to see how osTicket hashes a plain password.
// Do NOT deploy this file to production.

require_once __DIR__ . '/bootstrap.php';

// Load config and core code (includes Passwd class) without opening DB connection
Bootstrap::loadConfig();
Bootstrap::loadCode();

$hash = null;
$plain = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $plain = isset($_POST['password']) ? (string)$_POST['password'] : '';
    $hash = $plain !== '' ? Passwd::hash($plain) : null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>osTicket Password Hash Tester</title>
</head>
<body>
    <h1>osTicket Password Hash Tester</h1>
    <form method="post">
        <label>
            Plain password:
            <input type="text" name="password" value="">
        </label>
        <button type="submit">Generate hash</button>
    </form>

<?php if ($hash !== null): ?>
    <h2>Result</h2>
    <p><strong>Plain:</strong> <?php echo htmlspecialchars($plain, ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>Hash:</strong> <code><?php echo htmlspecialchars($hash, ENT_QUOTES, 'UTF-8'); ?></code></p>
<?php endif; ?>
</body>
</html>

