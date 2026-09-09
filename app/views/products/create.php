<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
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
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 0 20px;
        }
        .card {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .card h2 {
            margin-bottom: 20px;
            color: #2c3e50;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            font-size: 14px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        .form-group textarea {
            resize: vertical;
            height: 80px;
        }
        .btn-submit {
            width: 100%;
            background-color: #2ecc71;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn-submit:hover {
            background-color: #27ae60;
        }
        .btn-back {
            display: inline-block;
            margin-bottom: 15px;
            color: #3498db;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <nav>
        <h1>Product Dashboard</h1>
    </nav>

    <div class="container">
        <a href="<?= site_url('products'); ?>" class="btn-back">&larr; Back to Products</a>
        
        <div class="card">
            <h2>Add New Product</h2>

            <form action="<?= site_url('products/create'); ?>" method="POST">
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="product_name" placeholder="Enter product name" required>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" placeholder="Enter product description" required></textarea>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="number" step="0.01" name="price" placeholder="0.00" required>
                </div>

                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" placeholder="0" required>
                </div>

                <button type="submit" class="btn-submit">Save Product</button>
            </form>
        </div>
    </div>

</body>
</html>