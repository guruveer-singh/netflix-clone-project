<?php
session_start();
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
    $lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $plan = filter_var($_POST['plan'], FILTER_SANITIZE_STRING);

    try {
        // Check if email already exists
        $check_email = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
        $check_email->bind_param("s", $email);
        $check_email->execute();
        $result = $check_email->get_result();

        if ($result->num_rows > 0) {
            die("Email already exists. Please <a href='signin.html?email=" . urlencode($email) . "'>sign in</a> instead.");
        }

        // Store user data without hashing password
        $sql = "INSERT INTO users (first_name, last_name, email, password, phone, plan) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);

        if (!$stmt) {
            die("SQL error");
        }

        $stmt->bind_param("ssssss", $firstName, $lastName, $email, $password, $phone, $plan);

        $stmt->execute();

        // Set session variables
        $_SESSION['user_id'] = $mysqli->insert_id;
        $_SESSION['email'] = $email;
        $_SESSION['first_name'] = $firstName;

        // Redirect to dashboard or home page
        header("Location: dashboard.php");
        exit();

    } catch(PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>
