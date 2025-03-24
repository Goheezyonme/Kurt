<?php
session_start();

// Destroy the session
session_unset();
session_destroy();

// Redirect to the landing page
header("Location: Landing page.html");
exit();
?>
