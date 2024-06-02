<?php session_start();
function destroy_session_and_data() {
    session_unset();
    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), session_id(),time()-2592000, '/');
    session_destroy();
}
function count_requests() {
    if (!isset($_SESSION['requests']))
        $_SESSION['requests'] = 1;
    else 
        $_SESSION['requests']++;
    return $_SESSION['requests'];
} 

function set_time_cookie($session_timeout) {
    if (isset($_SESSION['last_activity'])) {
        $time_since_last_activity = time() - $_SESSION['last_activity'];

        if ($time_since_last_activity >= $session_timeout) {
            session_unset();
            session_destroy();
            
            if (isset($_COOKIE[session_name()])) {
                setcookie(session_name(), '', time() - 2592000, '/');
            }
            return false;
        }
    }
    
    $_SESSION['last_activity'] = time();
    return true;
}

?>