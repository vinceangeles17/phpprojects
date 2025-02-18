<?php
include 'connection.php';
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}
$username = "";
$password = "";
$error = "";
if (isset($_POST['Login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM try WHERE username = ? AND password = ?";
    $stmt = $link->prepare($sql);
    $passw = md5($password);
    $stmt->bind_param("ss", $username, $passw);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $row['username'];
        header("location: welcome.php");
        exit();
    }

    $error = "Invalid username or password.";
}
$link->close();
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <p>Enter Username and Password</p>
    <?php if (!empty($error)) echo '<p style="color: red;">' . $error . '</p>'; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label>Username</label>
        <input type="text" name="username">
        <br>
        <label>Password</label>
        <input type="password" name="password">
        <br>
        <input type="submit" name="Login" value="Login">
    </form>
</body>
</html>