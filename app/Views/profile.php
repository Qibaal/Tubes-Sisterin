<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>

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
