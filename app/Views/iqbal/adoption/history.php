<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #4a90e2;
        }

        .history-container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .history-header {
            background-color: #4a90e2;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 1.5rem;
        }

        .table-wrapper {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f5f7fa;
            color: #333;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f9ff;
        }

        td {
            color: #555;
        }

        .status {
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            text-align: center;
        }

        .status-approved {
            background-color: #28a745;
        }

        .status-pending {
            background-color: #ffc107;
        }

        .status-rejected {
            background-color: #dc3545;
        }

        .note {
            background-color: #e3f2fd;
            color: #4a90e2;
            border: 1px solid #4a90e2;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
            text-align: center;
            font-size: 1rem;
        }

        .no-data {
            text-align: center;
            padding: 20px;
            color: #999;
        }

        .product-recommendations h2 {
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .product-container {
            display: flex;
            justify-content: space-around;
            gap: 1rem;
            padding: 1rem;
        }

        .product-card {
            width: 200px;
            border: 1px solid #ddd;
            border-radius: 8px;
            text-align: center;
            padding: 1rem;
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .product-card img {
            width: 100%;
            border-radius: 8px;
        }

        .product-card h3 {
            font-size: 1.2rem;
            margin: 0.5rem 0;
        }

        .product-card p {
            font-size: 0.9rem;
            color: #555;
            margin: 0.5rem 0;
        }

        .buy-button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            font-size: 0.9rem;
            cursor: pointer;
            text-transform: uppercase;
        }

        .buy-button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <h1>Your Adoption History</h1>
    <div class="history-container">
        <div class="history-header">Adoption Requests</div>
        <div class="table-wrapper">
            <?php if (!empty($requests) && is_array($requests)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Income</th>
                            <th>Living Type</th>
                            <th>Has Pets</th>
                            <th>Reason</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($requests as $request): ?>
                            <tr>
                                <td><?= esc($request['animal_id']) ?></td>
                                <td><?= esc($request['income']) ?></td>
                                <td><?= esc($request['living_type']) ?></td>
                                <td><?= $request['has_pets'] ? 'Yes' : 'No' ?></td>
                                <td><?= esc($request['reason']) ?></td>
                                <td>
                                    <span class="status 
                                        <?php if ($request['status'] === 'approved') echo 'status-approved'; ?>
                                        <?php if ($request['status'] === 'pending') echo 'status-pending'; ?>
                                        <?php if ($request['status'] === 'rejected') echo 'status-rejected'; ?>">
                                        <?= ucfirst(esc($request['status'])) ?>
                                    </span>
                                </td>
                            </tr>
                            <?php if ($request['status'] === 'approved'): ?>
                                <tr>
                                    <td colspan="7" class="note">
                                        Please go to the shelter to continue the adoption process.
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="product-recommendations">
                                        <h2>Recommended Products for Your New Companion</h2>
                                        <div class="product-container">
                                            <?php foreach ($products as $product): ?>
                                                <div class="product-card">
                                                    <img src="<?= $product['image']; ?>" alt="<?= $product['name']; ?>">
                                                    <h3><?= $product['name']; ?></h3>
                                                    <p><?= $product['description']; ?></p>
                                                    <button class="buy-button">Buy</button>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="no-data">No adoption requests found.</div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
