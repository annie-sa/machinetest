<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <script>
        function capitalizeFirstLetter() {
            let input = document.getElementById('name');
            let value = input.value;
            input.value = value.charAt(0).toUpperCase() + value.slice(1);
        }
    </script>
</head>
<body>
    <h1>Add Product</h1>
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
            padding: 20px;
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
        .form-container input[type="text"], .form-container input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error-message {
            color: red;
            margin-top: 10px;
        }
        .button-add {
            background-color: green; /* Blue color for Add Product button */
        }
        .button-add:hover {
            background-color: #005580; /* Darker shade on hover */
        }
    </style>
    <script src="js/script.js"></script>
    <form method="post" action="index.php?action=add">
        <label>Name:</label><br>
        <input type="text" name="name" oninput="capitalizeFirstLetter()" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>"><br>
        <label>Price:</label><br>
        <input type="text" name="price" value="<?php echo isset($_POST['price']) ? htmlspecialchars($_POST['price']) : ''; ?>"><br>
        <?php if (!empty($errors)): ?>
            <div style="color: red;">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <br><input type="submit" value="Add Product"class="button-add">
    </form>
</body>
</html>