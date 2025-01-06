<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - PurrfectNeeds</title>
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
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2rem;
        }

        .product {
            background-color: #2a2a2a;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .product img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
        }

        .product-info {
            display: flex;
            flex-direction: column;
        }

        .product-info h2 {
            margin: 0 0 10px 0;
            font-size: 1.2rem;
        }

        .product-info p {
            margin: 0;
            color: #cccccc;
        }

        .product-info p.price {
            margin: 10px 0;
            font-size: 1.25rem;
            font-weight: bold;
        }

        .checkout-button {
            width: 100%;
            padding: 15px;
            background-color: #b8860b;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1rem;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .checkout-button:hover {
            background-color: #8b6508;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Checkout</h1>

        <?php if (!empty($food)): ?>
            <div class="product">
                <img src="<?= esc($food['image_url']) ?>" alt="<?= esc($food['name']) ?>">
                <div class="product-info">
                    <h2><?= esc($food['name']) ?></h2>
                    <p class="price">
                        <?php if (!empty($food['promo_applied']) && $food['promo_applied']): ?>
                            <span>Original Price: $<?= esc(round($food['original_price'], 2)) ?></span><br>
                            Discounted Price: $<?= esc(round($food['price'], 2)) ?>
                        <?php else: ?>
                            $<?= esc(round($food['price'], 2)) ?>
                        <?php endif; ?>
                    </p>
                </div>
            </div>

            <form method="POST" action="/thecatalogue/confirm-checkout">
                <input type="hidden" name="food_id" value="<?= esc($food['id']) ?>">
                <input type="hidden" name="price" value="<?= esc(round($food['price'], 2)) ?>"> <!-- Correct price sent -->
                <button type="submit" class="checkout-button">Confirm Purchase</button>
            </form>
        <?php else: ?>
            <p>No product selected for checkout.</p>
        <?php endif; ?>
    </div>
</body>
</html>


