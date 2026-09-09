<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #009670;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            background-color: #ffffff;
            padding: 40px 30px;
            border-radius: 8px;
            width: 100%;
            max-width: 380px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card h2 {
            font-size: 26px;
            color: #111;
            margin-bottom: 25px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            font-size: 14px;
            outline: none;
            color: #333;
        }

        .form-control::placeholder {
            color: #a0a0a0;
        }

        .form-control:focus {
            border-color: #009670;
        }

        .forgot-pass {
            display: block;
            text-align: left;
            font-size: 13px;
            color: #009670;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background-color: #009670;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background-color: #007a5b;
        }

        .footer-text {
            margin-top: 20px;
            font-size: 13px;
            color: #555;
        }

        .footer-text a {
            color: #009670;
            text-decoration: none;
            font-weight: 600;
        }

        .error-msg {
            color: #d9534f;
            font-size: 13px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <div class="card">
        <h2>Login</h2>

        <?php if(isset($error)): ?>
            <div class="error-msg"><?= $error; ?></div>
        <?php endif; ?>

        <form action="<?= site_url('auth/login'); ?>" method="POST">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
            </div>
            
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>

            <a href="#" class="forgot-pass">Forgot password?</a>

            <button type="submit" class="btn">Login</button>
        </form>

        <p class="footer-text">
            Don't have an account? <a href="<?= site_url('auth/register'); ?>">Signup</a>
        </p>
    </div>

</body>
</html>