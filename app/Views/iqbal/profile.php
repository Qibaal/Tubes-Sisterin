<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Sugency</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f3ff;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #4a90e2;
        }
        .profile-info {
            background-color: #f0f8ff;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .profile-info p {
            margin: 10px 0;
        }
        form div {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #5a6c7d;
        }
        input[type="text"], textarea {
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
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #3a7bc8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Profile</h1>

        <!-- Display User Profile -->
        <div id="user-profile" class="profile-info">
            <p><strong>Email:</strong> <span id="user-email"><?= esc($user['email']) ?></span></p>
            <p><strong>Full Name:</strong> <span id="user-full-name"><?= esc($user['full_name']) ?></span></p>
            <p><strong>Phone Number:</strong> <span id="user-phone"><?= esc($user['phone_number']) ?></span></p>
            <p><strong>Address:</strong> <span id="user-address"><?= esc($user['address']) ?></span></p>
            <p><strong>Member Since:</strong> <span id="user-member-since"><?= esc($user['member_since']) ?></span></p>
        </div>


        <!-- Update Profile Form -->
        <h2>Update Profile</h2>
        <form action="/profile/update" method="post">
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

            <button type="submit">Update Profile</button>
        </form>
    </div>
</body>
</html>