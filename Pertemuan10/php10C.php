<?php
session_start();

$session_timeout = 60; 

function check_session() {
    global $session_timeout;

    if (isset($_SESSION['last_activity'])) {
        $session_lifetime = time() - $_SESSION['last_activity'];

        if ($session_lifetime >= $session_timeout) {
            session_unset();
            session_destroy();
            return false;
        }
    }

    $_SESSION['last_activity'] = time();
    return true;
}


$is_session_active = check_session();

if ($is_session_active) {
    if (isset($_REQUEST['address'])) {
        $_SESSION['address'] = $_REQUEST['address'];
    }
} else {
    echo "Your session has expired. Please go back and submit the form again.";
    exit();
}
?>
<!DOCTYPE html>
<html lang='en-GB'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP10C</title>
</head>
<body>
    <?php if ($is_session_active): ?>
        <?php
            echo htmlspecialchars($_SESSION['item']), "<br>";
            echo htmlspecialchars($_SESSION['address']);
        ?>
    <?php else: ?>
        <p>Your session has expired. Please go back and submit the form again.</p>
    <?php endif; ?>
</body>
</html>
