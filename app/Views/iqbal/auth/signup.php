<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Sugency</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f3ff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 400px;
        }
        h3 {
            color: #4a90e2;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #5a6c7d;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #b3d9ff;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4a90e2;
            color: #ffffff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #3a7bc8;
        }
        .text-center {
            text-align: center;
        }
        a {
            color: #4a90e2;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Sign Up for Sugency</h3>
        <form action="#" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="tel" id="phone_number" name="phone_number" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" rows="3" required></textarea>
            </div>
            <button type="submit">Sign Up</button>
        </form>
        <div class="text-center" style="margin-top: 15px;">
            <p>Already have an account? <a href="/sugency/login">Login</a></p>
        </div>
    </div>
</body>
</html>