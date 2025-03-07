<?php
session_start(); // Start a session to manage login state

// Check if the user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: view_dares.php"); // Redirect to the dares viewing page
    exit();
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check credentials
    if ($username === 'Dipin' && $password === 'Dipin@12') {
        $_SESSION['loggedin'] = true; // Set session variable
        header("Location: view_dares.php"); // Redirect to the dares viewing page
        exit();
    } else {
        $error = "Invalid ID or Password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'navigation.php'; ?>

    <h1>Admin Login</h1>
    <?php if ($error): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <div class="form-container">
        <form action="admin_login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>