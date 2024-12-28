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
            <p><strong>Email:</strong> <span id="user-email"></span></p>
            <p><strong>Full Name:</strong> <span id="user-full-name"></span></p>
            <p><strong>Phone Number:</strong> <span id="user-phone"></span></p>
            <p><strong>Address:</strong> <span id="user-address"></span></p>
            <p><strong>Member Since:</strong> <span id="user-member-since"></span></p>
        </div>

        <!-- Update Profile Form -->
        <h2>Update Profile</h2>
        <form action="/profile/update" method="post">
            <div>
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" required minlength="3" maxlength="100">
            </div>

            <div>
                <label for="phone_number">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number" required minlength="10" maxlength="15">
            </div>

            <div>
                <label for="address">Address</label>
                <textarea id="address" name="address" required></textarea>
            </div>

            <button type="submit">Update Profile</button>
        </form>
    </div>

    <script>
        // Simulated user data (replace with actual data fetching logic)
        const userData = {
            email: 'user@example.com',
            full_name: 'John Doe',
            phone_number: '1234567890',
            address: '123 Main St, City, Country',
            member_since: '2023-01-01'
        };

        // Populate user profile
        document.getElementById('user-email').textContent = userData.email;
        document.getElementById('user-full-name').textContent = userData.full_name;
        document.getElementById('user-phone').textContent = userData.phone_number;
        document.getElementById('user-address').textContent = userData.address;
        document.getElementById('user-member-since').textContent = userData.member_since;

        // Populate form fields
        document.getElementById('full_name').value = userData.full_name;
        document.getElementById('phone_number').value = userData.phone_number;
        document.getElementById('address').value = userData.address;
    </script>
</body>
</html>