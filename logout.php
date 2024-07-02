<?php
session_start();

// Check if session is active
if(session_id() != '') {
    // Unset all session variables
    $_SESSION = array();
    
    // Destroy the session
    session_destroy();
}

// Redirect to index.html after logout
header("Location: index.html");
exit();
?>