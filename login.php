<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Duta Lite</title>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(circle at 10% 20%, rgba(240, 244, 250, 1) 0%, rgba(252, 243, 241, 1) 50%, rgba(253, 247, 240, 1) 100%);
        }
        .login-card {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            width: 100%;
            max-width: 400px;
            border: 1px solid rgba(234, 234, 234, 0.5);
        }
        h2 { text-align: center; margin-bottom: 25px; color: #1a1a1a; }
    </style>
</head>
<body>

    <div class="login-card">
        <h2>Admin Login</h2>
        <form action="sv_login.php" method="POST">
            
            <div class="form-group" style="margin-bottom: 20px;">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
            </div>

            <div class="form-group" style="margin-bottom: 30px;">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>

            <button type="submit" class="submit-btn">Login</button>
            
        </form>
    </div>

</body>
</html>