<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History - PurrfectNeeds</title>
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
            max-width: 1000px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2rem;
        }

        .table-container {
            background-color: #2a2a2a;
            border-radius: 10px;
            padding: 20px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        th, td {
            text-align: left;
            padding: 15px;
            border-bottom: 1px solid #4a4a4a;
        }

        th {
            color: #cccccc;
        }

        tbody tr:nth-child(even) {
            background-color: #3a3a3a;
        }

        .return-button {
            display: block;
            margin: 20px auto 0;
            text-align: center;
            background-color: #b8860b;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            width: fit-content;
            transition: background-color 0.3s;
        }

        .return-button:hover {
            background-color: #8b6508;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Order History</h1>

        <div class="table-container">
            <?php if (!empty($orders)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Food Name</th>
                            <th>Price</th>
                            <th>Order Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?= esc($order['id']) ?></td>
                                <td><?= esc($order['food_name']) ?></td>
                                <td>$<?= esc($order['price']) ?></td>
                                <td><?= esc($order['created_at']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="center">No orders found.</p>
            <?php endif; ?>
        </div>

        <a href="/thecatalogue/foods" class="return-button">Return</a>
    </div>
</body>
</html>
