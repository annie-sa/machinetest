<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .confirmation-box {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .confirmation-box h1 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }
        .confirmation-box p {
            font-size: 18px;
            text-align: center;
            margin-bottom: 30px;
        }
        .confirmation-actions {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .confirmation-actions button,
        .confirmation-actions a {
            display: inline-block;
            padding: 12px 20px;
            margin: 0 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .confirmation-actions button {
            background-color: #f44336; /* Red color for Delete button */
            color: white;
        }
        .confirmation-actions button:hover {
            background-color: #d32f2f; /* Darker shade on hover */
        }
        .confirmation-actions a {
            background-color: #4CAF50; /* Green color for Cancel button */
            color: white;
        }
        .confirmation-actions a:hover {
            background-color: #45a049; /* Darker shade on hover */
        }
    </style>
</head>
<body>
<div class="confirmation-box">
        <h1>Delete Product</h1>
        <p>Are you sure you want to delete product: <?php echo htmlspecialchars($product['name']); ?>?</p>
        <div class="confirmation-actions">
            <form method="post" action="index.php?action=delete&id=<?php echo $product['id']; ?>">
                <input type="hidden" name="confirm" value="yes">
                <button type="submit">Yes, Delete</button>
            </form>
            <a href="index.php?action=index">Cancel</a>
        </div>
    </div>
</body>
</html>




