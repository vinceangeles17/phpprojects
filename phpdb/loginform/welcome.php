<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false){
    header("location: logout.php");
    exit;
}
?>
 
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style>
        body{ font: 24px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1> Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. mama mo website</h1>
    <p>
        <a href="logout.php">Log Out</a>
    </p>
</body>
</html>