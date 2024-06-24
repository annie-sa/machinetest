<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th {
            font-size: 18px; /* Adjust the font size as needed */
            text-align: center;
            padding: 8px;
            background-color: #f2f2f2;
            color: black;
        }
        td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: none;
            margin-bottom: 10px;
        }
        .button:hover {
            background-color: #45a049;
        }
        .button-delete {
            background-color: #f44336;
        }
        .button-delete:hover {
            background-color: #d32f2f;
        }
        .button-add {
            background-color: #008CBA; /* Blue color for Add Product button */
        }
        .button-add:hover {
            background-color: #005580; /* Darker shade on hover */
        }
    </style>
</head>
<body>
    <h1>Product List</h1>
    <a href="index.php?action=add"  class="button button-add">Add Product</a><br><br>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td><?php echo number_format($product['price'], 2); ?></td>
                <td>
                    <a href="index.php?action=edit&id=<?php echo $product['id']; ?>"class="button">Edit</a>
                    <a href="index.php?action=delete&id=<?php echo $product['id']; ?>"class="button button-delete">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>