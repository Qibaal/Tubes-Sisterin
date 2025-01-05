<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cat Foods - PurrfectNeeds</title>
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

        h1 {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2rem;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .product-card {
            background-color: #2a2a2a;
            border-radius: 10px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            transition: transform 0.2s;
            cursor: pointer;
        }

        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        .product-card h2 {
            margin: 0 0 10px 0;
            font-size: 1.2rem;
        }

        .product-card p {
            margin: 0;
            color: #cccccc;
        }

        .product-card p.price {
            margin: 10px 0;
            font-size: 1.25rem;
            font-weight: bold;
        }

        .product-card button {
            width: 100%;
            padding: 10px;
            background-color: #b8860b;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .product-card button:hover {
            background-color: #8b6508;
        }

        .navigation-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .navigation-buttons a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #4a4a4a;
            color: white;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .navigation-buttons a:hover {
            background-color: #6a6a6a;
        }
    </style>
</head>
<body>
    <h1>Cat Food Products</h1>

    <div class="product-grid">
        <?php if (!empty($foods)): ?>
            <?php foreach ($foods as $food): ?>
                <div class="product-card">
                    <img src="<?= esc($food['image_url']) ?>" alt="<?= esc($food['name']) ?>">
                    <div>
                        <h2><?= esc($food['name']) ?></h2>
                        <p><?= esc($food['description']) ?></p>
                        <p class="price">$<?= esc($food['price']) ?></p>
                        <form method="POST" action="/thecatalogue/checkout">
                            <input type="hidden" name="food_id" value="<?= esc($food['id']) ?>">
                            <button type="submit">Add to Cart</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No products available.</p>
        <?php endif; ?>
    </div>

    <div class="navigation-buttons">
        <a href="/thecatalogue/history">Order History</a>
        <a href="/thecatalogue/profile">Profile</a>
    </div>
</body>
</html>
