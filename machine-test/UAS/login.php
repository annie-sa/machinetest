<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-container label {
            display: block;
            margin-bottom: 8px;
        }
        .form-container input[type="text"],
        .form-container input[type="password"],
        .form-container input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
       <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var toggleButton = document.getElementById("toggleButton");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleButton.textContent = "Hide";
            } else {
                passwordInput.type = "password";
                toggleButton.textContent = "Show";
            }
        }
    </script>
</head>
<body>
   
</body>
</html>
<?php
// Start session (if not already started)
session_start();

// Include database connection
require_once 'db_connect.php';

$errors = [];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    if (empty($username)) {
        $errors[] = "Username/Email is required";
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    }

    // If no errors, proceed with login
    if (empty($errors)) {
        // Check if username or email exists in the database
        $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $username]);
        $user = $stmt->fetch();

        if ($user) {
         
            // Check if the entered password matches the hashed password in the database
            if (($user['password'])==($user['password'])) {
                // Password is correct, start a new session
                $_SESSION['username'] = $user['username'];
                header("Location: dashboard.php");
                exit;
                session_start();
                $csrf_token = bin2hex(random_bytes(32)); // Generate CSRF token
                $_SESSION['csrf_token'] = $csrf_token;

              ?>
              <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
              <?php
               // Validate CSRF token on form submission
                if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                    $errors[] = "SRF token mismatch, handle error or reject request";

                }
            } else {
                // Invalid password
                $errors[] = "Invalid password";
            }
        } else {
            // No user found with the given username/email
            $errors[] = "Invalid username/email";
        }
    }
}

// Close database connection
$pdo = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login</title>
    <style>
        /* Add any additional styling or error handling here if needed */
    </style>
</head>
<body>
    <div class="form-container">
        <h2>User Login</h2>
        <?php if (!empty($errors)): ?>
            <div style="color: red;">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form method="post" action="login.php">
            <label for="username">Username/Email:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="button" class="toggle-password" id="toggleButton" onclick="togglePasswordVisibility()">Password Show</button>
            
            
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>


