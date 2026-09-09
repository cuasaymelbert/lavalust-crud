<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #f4f6f9;
            color: #333;
        }
        nav {
            background-color: #2c3e50;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #fff;
        }
        nav h1 {
            font-size: 20px;
        }
        .btn-logout {
            background-color: #e74c3c;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }
        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .btn-add {
            background-color: #2ecc71;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            table-layout: fixed;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #34495e;
            color: #fff;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .action-btns a {
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 4px;
            color: white;
            font-size: 12px;
            margin-right: 5px;
        }
        .btn-edit { background-color: #3498db; }
        .btn-delete { background-color: #e74c3c; }
    </style>
</head>
<body>

    <nav>
        <h1>Product Dashboard</h1>
        <a href="<?= site_url('auth/logout'); ?>" class="btn-logout">Logout</a>
    </nav>

    <div class="container">
        <div class="header-actions">
            <h2>Product List</h2>
            <a href="<?= site_url('products/create'); ?>" class="btn-add">+ Add New Product</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($products)): ?>
                    <?php foreach($products as $product): ?>
                        <tr>
                            <td><?= $product['id']; ?></td>
                            <td><?= $product['product_name']; ?></td>
                            <td><?= $product['description']; ?></td>
                            <td>₱<?= number_format($product['price'], 2); ?></td>
                            <td><?= $product['quantity']; ?></td>
                            <td class="action-btns">
                                <a href="<?= site_url('products/edit/'.$product['id']); ?>" class="btn-edit">Edit</a>
                                <a href="<?= site_url('products/delete/'.$product['id']); ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this Product?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align: center; color: #888;">No Products found in Database.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>