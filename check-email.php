<?php
// This is a simple example. In a real application, you'd want to use proper database checks
session_start();
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    
    try {
        // Check if email exists in database
        $stmt = $mysqli->prepare("SELECT COUNT(*) as count FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        if ($row['count'] > 0) {
            // User exists, redirect to sign in
            header("Location: signin.html?email=" . urlencode($email));
        } else {
            // New user, redirect to sign up
            header("Location: signup.html?email=" . urlencode($email));
        }
    } catch(PDOException $e) {
        die("Error: " . $e->getMessage());
    }
    exit();
}
?>
