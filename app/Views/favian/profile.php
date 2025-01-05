<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - PurrfectNeeds</title>
    <style>
        body {
            background: linear-gradient(135deg, #1a1a1a 25%, #2a2a2a 25%, #2a2a2a 50%, #1a1a1a 50%, #1a1a1a 75%, #2a2a2a 75%, #2a2a2a);
            background-size: 20px 20px; 
            color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2rem;
        }

        #user-profile {
            background-color: #2a2a2a;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
        }

        #user-profile p {
            margin: 10px 0;
            color: #cccccc;
        }

        #user-profile p strong {
            color: #ffffff;
        }

        form {
            background-color: #2a2a2a;
            border-radius: 10px;
            padding: 20px;
        }

        form h2 {
            margin: 0 0 20px 0;
            font-size: 1.5rem;
        }

        form label {
            display: block;
            margin-bottom: 5px;
            color: #cccccc;
        }

        form input, form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 1rem; 
            background-color: #4a4a4a;
            border: none;
            border-radius: 5px;
            color: white;
            box-sizing: border-box;
        }

        form textarea {
            min-height: 100px;
        }

        .button-container {
            display: flex;
            gap: 10px;
        }

        .button-container a {
            padding: 10px 20px;
            background-color: #4a4a4a;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 0.7rem;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s;
        }

        .button-container button {
            flex-grow: 1;
            padding: 10px 20px;
            background-color: #b8860b;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s;
        }

        .button-container a:hover {
            background-color: #6a6a6a;
        }
        
        .button-container button:hover {
            background-color: #8b6508;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Profile</h1>

        <!-- Display User Profile -->
        <div id="user-profile">
            <p><strong>Email:</strong> <?= esc($user['email']) ?></p>
            <p><strong>Full Name:</strong> <?= esc($user['full_name']) ?></p>
            <p><strong>Phone Number:</strong> <?= esc($user['phone_number']) ?></p>
            <p><strong>Address:</strong> <?= esc($user['address']) ?></p>
            <p><strong>Member Since:</strong> <?= esc($user['member_since']) ?></p>
        </div>

        <!-- Update Profile Form -->
        <h2>Update Profile</h2>
        <form action="/thecatalogue/profile/update" method="post">
            <div>
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" value="<?= esc($user['full_name']) ?>" required minlength="3" maxlength="100">
            </div>

            <div>
                <label for="phone_number">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number" value="<?= esc($user['phone_number']) ?>" required minlength="10" maxlength="15">
            </div>

            <div>
                <label for="address">Address</label>
                <textarea id="address" name="address" required><?= esc($user['address']) ?></textarea>
            </div>

            <div class="button-container">
                <a href="/thecatalogue/foods" class="return-button">Return to Foods</a>
                <button type="submit">Update Profile</button>
            </div>
        </form>
    </div>
</body>
</html>
