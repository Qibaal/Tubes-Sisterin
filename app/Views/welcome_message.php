<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sugency - Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f8ff;
        }

        /* Navbar Styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #4a90e2;
            color: white;
            padding: 10px 20px;
        }

        .navbar h1 {
            margin: 0;
            font-size: 1.5rem;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        .navbar ul li {
            margin: 0 10px;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 1rem;
        }

        .navbar ul li a:hover {
            background-color: #357abd;
        }

        .navbar .auth-buttons a {
            background-color: white;
            color: #4a90e2;
            font-weight: bold;
            padding: 8px 15px;
        }

        .navbar .auth-buttons a:hover {
            background-color: #e1eaf4;
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 100px 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin: 20px;
        }

        .hero h2 {
            color: #4a90e2;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .hero p {
            color: #555;
            font-size: 1.2rem;
            line-height: 1.5;
        }

        .hero button {
            background-color: #4a90e2;
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        .hero button:hover {
            background-color: #357abd;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #4a90e2;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <h1>Sugency</h1>
        <ul>
            <?php if (!session()->userdata('user_data')): ?>
                <!-- If not logged in -->
                <li class="auth-buttons"><a href="/signup">Sign Up</a></li>
                <li class="auth-buttons"><a href="/login">Login</a></li>
            <?php else: ?>
                <!-- If logged in -->
                <li><a href="/adoption">Cats</a></li>
                <li><a href="/adoption/history">History</a></li>
                <li><a href="/profile">Profile</a></li>
                <li><a href="/logout">Logout</a></li>
            <?php endif; ?>
        </ul>
    </div>

    <!-- Hero Section -->
    <div class="hero">
        <h2>Welcome to Sugency</h2>
        <p>
            Sugency is your one-stop solution for pet adoptions, offering a seamless platform for finding your perfect furry friend. 
            Whether you're looking to adopt, track your adoption history, or explore our wonderful collection of pets, Sugency has it all!
        </p>
        <button onclick="location.href='/signup'">Get Started</button>
    </div>

    <!-- Footer -->
    <footer>
        &copy; <?= date('Y') ?> Sugency. All Rights Reserved.
    </footer>
</body>
</html>
