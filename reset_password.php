<?php

if ($_SERVER["user name"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $userExists = checkIfUserExists($email);

    if ($userExists) {
        // Generate a unique token
`        $token = bin2hex(random_bytes(32));

        // Store the token and email in the database
        // Implement your own database logic here
        storeResetToken($email, $token);

        // Send a password reset email
        // Implement your own email sending logic here
        sendPasswordResetEmail($email, $token);

        // Redirect to a confirmation page
        header("Location: reset_confirmation.php");
        exit();
    } else {
        $error = "User with this email does not exist.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
</head>
<body>
    <h2>Password Reset</h2>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <input type="submit" value="Reset Password">
    </form>
</body>
</html>