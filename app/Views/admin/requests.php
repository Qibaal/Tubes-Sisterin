<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Adoption Requests</title>
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

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 1rem;
        }

        table thead {
            background-color: #4a90e2;
            color: white;
        }

        table th, table td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        table th {
            font-weight: bold;
        }

        table tr:hover {
            background-color: #f1f9ff;
        }

        table td {
            color: #555;
        }

        .success-message {
            background-color: #e9f7e9;
            color: #2e7d32;
            border: 1px solid #2e7d32;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        button {
            background-color: #4a90e2;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #357abd;
        }

        .reject-button {
            background-color: #dc3545;
        }

        .reject-button:hover {
            background-color: #b22a3c;
        }

        .actions form {
            display: inline;
        }
    </style>
</head>
<body>
    <h1>Adoption Requests</h1>
    <div class="container">
        <?php if (session()->getFlashdata('success')): ?>
            <p class="success-message"><?= session()->getFlashdata('success') ?></p>
        <?php endif; ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Animal</th>
                    <th>Income</th>
                    <th>Living Type</th>
                    <th>Has Pets</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requests as $request): ?>
                    <tr>
                        <td><?= esc($request['id']) ?></td>
                        <td><?= esc($request['full_name']) ?></td>
                        <td><?= esc($request['animal_name']) ?></td>
                        <td><?= esc($request['income']) ?></td>
                        <td><?= esc($request['living_type']) ?></td>
                        <td><?= $request['has_pets'] ? 'Yes' : 'No' ?></td>
                        <td><?= esc($request['reason']) ?></td>
                        <td><?= ucfirst(esc($request['status'])) ?></td>
                        <td class="actions">
                            <form action="/admin/requests/update/<?= $request['id'] ?>/approved" method="post">
                                <button type="submit">Approve</button>
                            </form>
                            <form action="/admin/requests/update/<?= $request['id'] ?>/rejected" method="post">
                                <button type="submit" class="reject-button">Reject</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
