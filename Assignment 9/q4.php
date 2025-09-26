<?php
class PasswordException extends Exception {}
function validatePassword($password) {
    if (strlen($password) < 8) {
        throw new PasswordException("Password must be at least 8 characters long");
    }
    if (!preg_match("/[A-Z]/", $password)) {
        throw new PasswordException("Password must contain at least one uppercase letter");
    }
    if (!preg_match("/[0-9]/", $password)) {
        throw new PasswordException("Password must contain at least one digit");
    }
    if (!preg_match("/[@#$%]/", $password)) {
        throw new PasswordException("Password must contain at least one special character (@, #, $, %)");
    }
    return true;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Password Validation</title>
</head>
<body>
    <form method="post">
        Enter Password: <input type="password" name="password">
        <input type="submit" value="Validate">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $password = $_POST["password"];
        try {
            if (validatePassword($password)) {
                echo "<p style='color:green;'>Password is valid!</p>";
            }
        } catch (PasswordException $e) {
            echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
        }
    }
    ?>
</body>
</html>
