<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sugency - Cat Adoption</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f3ff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
        }
        h1 {
            color: #4a90e2;
            margin-bottom: 30px;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            margin: 10px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .signin {
            background-color: #b3d9ff;
            color: #2c3e50;
        }
        .signin:hover {
            background-color: #99ccff;
        }
        .signup {
            background-color: #4a90e2;
            color: #ffffff;
        }
        .signup:hover {
            background-color: #3a7bc8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Sugency</h1>
        <p style="color: #5a6c7d; margin-bottom: 30px;">Find your purr-fect feline companion</p>
        <a href="login" class="button signin">Login</a>
        <a href="signup" class="button signup">Sign Up</a>
    </div>
</body>
</html>