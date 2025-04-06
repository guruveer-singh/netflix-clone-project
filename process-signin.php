<?php
session_start();
require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Debug: Print received values
    error_log("Email: " . $email);
    error_log("Password: " . $password);

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Debug: Print user data
    error_log("User found: " . ($user ? "Yes" : "No"));
    if ($user) {
        error_log("User ID: " . $user['id']);
        error_log("DB Password: " . $user['password']);
    }

    if ($user && $password === $user['password']) {
        // Password is correct
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        
        // Debug: Print session data
        error_log("Session data set:");
        error_log("user_id: " . $_SESSION['user_id']);
        error_log("email: " . $_SESSION['email']);
        error_log("first_name: " . $_SESSION['first_name']);
        
        // Set remember me cookie if checked
        if (isset($_POST['remember'])) {
            setcookie('remember_email', $email, time() + (30 * 24 * 60 * 60), '/');
        }
        
        // Redirect to dashboard
        error_log("Redirecting to dashboard.php");
        header("Location: dashboard.php");
        exit();
    } else {
        // Invalid credentials
        error_log("Invalid credentials");
        header("Location: signin.html?error=" . urlencode("Invalid email or password"));
        exit();
    }
} else {
    // Not a POST request
    error_log("Not a POST request");
    header("Location: signin.html");
    exit();
}
?>
