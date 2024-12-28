<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Page</title>
    <link rel="stylesheet" href="/css/adoption.css">
</head>
<body>
    <div class="container">
        <h1>Available Animals for Adoption</h1>

        <?php if (!empty($animals) && is_array($animals)): ?>
            <ul class="animal-list">
                <?php foreach ($animals as $animal): ?>
                    <li class="animal-item">
                        <h2><?= esc($animal['name']) ?> (<?= esc($animal['breed']) ?>)</h2>
                        <p><strong>Age:</strong> <?= esc($animal['age']) ?> years</p>
                        <p><?= esc($animal['description']) ?></p>
                        <p><strong>Food:</strong> <?= esc($animal['food']) ?></p>
                        <p><strong>Food per Day:</strong> <?= esc($animal['food_per_day']) ?> servings</p>
                        <p><strong>Treatment:</strong> <?= esc($animal['treatment']) ?></p>
                        <p><strong>Accessories:</strong> <?= esc($animal['accessories']) ?></p>
                        <p><strong>Cage:</strong> <?= esc($animal['cage']) ?></p>
                        <form action="/adoption/request/<?= $animal['id'] ?>" method="post">
                            <button type="submit">Request Adoption</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No animals available for adoption at the moment.</p>
        <?php endif; ?>
    </div>
</body>
</html>