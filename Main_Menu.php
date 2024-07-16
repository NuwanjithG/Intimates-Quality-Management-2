<?php
session_start(); // Initialize the session

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.html");
    exit();
}

// Include the HTML content
include 'Main_Menu.html';
?>
