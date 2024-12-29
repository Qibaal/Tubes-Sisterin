
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption Info - Sugency</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --pastel-blue: #A7C7E7;
            --light-blue: #EAF6FF;
            --dark-blue: #4A6FA5;
            --text-color: #333;
        }
        body {
            font-family: 'Quicksand', sans-serif;
            background-color: var(--light-blue);
            color: var(--text-color);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 90%;
            max-width: 1000px;
            display: flex;
            flex-direction: column;
        }
        .header {
            background-color: var(--pastel-blue);
            color: var(--dark-blue);
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 2.5rem;
            font-weight: 700;
        }
        .pet-info {
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
        }
        .pet-image {
            flex: 1;
            min-width: 300px;
            max-width: 400px;
            margin-right: 20px;
        }
        .pet-image img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .pet-details {
            flex: 2;
            min-width: 300px;
        }
        .info-group {
            background-color: var(--light-blue);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
        }
        .info-group h2 {
            color: var(--dark-blue);
            margin-top: 0;
            font-size: 1.5rem;
            border-bottom: 2px solid var(--pastel-blue);
            padding-bottom: 5px;
        }
        .info-item {
            margin: 10px 0;
        }
        .info-item strong {
            color: var(--dark-blue);
            font-weight: 600;
        }
        .adoption-button {
            background-color: var(--dark-blue);
            color: #ffffff;
            border: none;
            padding: 15px 30px;
            font-size: 1.2rem;
            font-weight: 600;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: block;
            margin: 20px auto;
            text-align: center;
            text-decoration: none;
        }
        .adoption-button:hover {
            background-color: var(--pastel-blue);
            color: var(--dark-blue);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        @media (max-width: 768px) {
            .pet-info {
                flex-direction: column;
            }
            .pet-image {
                margin-right: 0;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Pet Adoption Information</h1>
        </header>
        <div class="pet-info">
            <div class="pet-image">
                <img src="/asset/persian.png" alt="<?= esc($animal['name']) ?>">
            </div>
            
            <div class="pet-details">
                <div class="info-group">
                    <h2>Basic Information</h2>
                    <div class="info-item"><strong>Name:</strong> <?= esc($animal['name']) ?></div>
                    <div class="info-item"><strong>Breed:</strong> <?= esc($animal['breed']) ?></div>
                    <div class="info-item"><strong>Age:</strong> <?= esc($animal['age']) ?> years</div>
                    <div class="info-item"><strong>Health Status:</strong> <?= esc($animal['health_status']) ?></div>
                </div>
                
                <?php if (isset($animal['description'])): ?>
                <div class="info-group">
                    <h2>Description</h2>
                    <p><?= esc($animal['description']) ?></p>
                </div>
                <?php endif; ?>

                <?php if (isset($catNeeds)): ?>
                <div class="info-group">
                    <h2>Breed-Specific Needs</h2>
                    <div class="info-item"><strong>Food:</strong> <?= esc($catNeeds['food']) ?></div>
                    <div class="info-item"><strong>Food per Day:</strong> <?= esc($catNeeds['food_per_day']) ?></div>
                    <div class="info-item"><strong>Treatment:</strong> <?= esc($catNeeds['treatment']) ?> years</div>
                    <div class="info-item"><strong>Accessories:</strong> <?= esc($catNeeds['accessories']) ?></div>
                    <div class="info-item"><strong>Cage:</strong> <?= esc($catNeeds['cage']) ?></div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <a href="../../adoption/request/<?= esc($animal['id']) ?>" class="adoption-button">Request Adoption</a>
    </div>

</body>
</html>