<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt a Furry Friend - Sugency</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
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
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        h1 {
            color: #3a7bd5;
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 40px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        .adopt-button {
            display: inline-block;
            text-align: center;
            background-color: #3a7bd5;
            color: #ffffff;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            width: auto;
            margin-top: 15px;
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: block;
            text-align: center;
        }
        .adopt-button:hover {
            background-color: #2c5ea3;
            transform: scale(1.05);
        }
        .animal-list {
            list-style-type: none;
            padding: 0;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        .animal-item {
            background-color: #ffffff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .animal-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        .animal-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .animal-info {
            padding: 20px;
        }
        .animal-info h2 {
            color: #3a7bd5;
            margin-top: 0;
            font-size: 1.5rem;
        }
        .animal-info p {
            margin: 10px 0;
            color: #555;
        }
        .health-status {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.9rem;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>Sugency</h1>
        <ul>
            <li class="auth-buttons"><a href="/adoption">Cats</a></li>
            <li class="auth-buttons"><a href="/adoption/history">History</a></li>
            <li class="auth-buttons"><a href="/profile">Profile</a></li>
            <li class="auth-buttons"><a href="/logout">Logout</a></li>
        </ul>
    </div>
    <div class="container">
        
        <h1>Find Your Perfect Companion</h1>

        <ul class="animal-list">
            <?php if (!empty($animals) && is_array($animals)): ?>
                <?php foreach ($animals as $animal): ?>
                    <li class="animal-item">
                        <img src="/asset/persian.png" alt="<?= esc($animal['name']) ?>" class="animal-image">
                        <div class="animal-info">
                            <h2><?= esc($animal['name']) ?></h2>
                            <p><strong>Breed:</strong> <?= esc($animal['breed']) ?></p>
                            <p><strong>Age:</strong> <?= esc($animal['age']) ?> <?= esc($animal['age'] == 1 ? 'year' : 'years') ?></p>
                            <p><?= esc($animal['description']) ?></p>
                            <span class="health-status"><?= esc($animal['health_status']) ?></span>
                            <a href="/adoption/info/<?= esc($animal['id']) ?>" class="adopt-button">Adopt Me</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No animals available for adoption at the moment.</p>
            <?php endif; ?>
        </ul>
    </div>
</body>
</html>
