<?php
session_start();


// unset the variables
session_unset();
// Destroy the session
session_destroy();

// Redirect to login page
header("Location: carousel");
exit();
?>