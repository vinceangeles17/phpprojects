<?php
session_start();
include 'connection.php'; // Include the database connection

// Redirect to welcome.php if already logged in
if (isset($_SESSION['email'])) {
    header("Location: welcome.php");
    exit();
}

$error_message = ""; // Initialize error message

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the required fields are set
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']); // Hash the password

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['email'] = $email;
            header("Location: welcome.php");
            exit();
        } else {
            $error_message = "Invalid email or password.";
        }
        $stmt->close();
    } else {
        $error_message = "Please fill in all fields.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="">
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <input type="submit" value="Login">
        </form>
        
        <?php if ($error_message): ?>
            <div style="color: red; margin-top: 10px;"><?php echo htmlspecialchars($error_message); ?></div>
        <?php endif; ?>

        <a href="register.php">Don't have an account? Register here</a>
    </div>
</body>
</html>