<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Animals</title>
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
            margin-bottom: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .add-button {
            display: inline-block;
            background-color: #4a90e2;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .add-button:hover {
            background-color: #357abd;
        }

        .success-message {
            background-color: #e9f7e9;
            color: #2e7d32;
            border: 1px solid #2e7d32;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
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

        a {
            text-decoration: none;
            color: #4a90e2;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .delete-button {
            color: #dc3545;
        }

        .delete-button:hover {
            color: #b22a3c;
        }
    </style>
</head>
<body>
    <h1>Manage Animals</h1>
    <div class="container">
        <a href="/admin/animals/add" class="add-button">Add New Animal</a>
        <?php if (session()->getFlashdata('success')): ?>
            <p class="success-message"><?= session()->getFlashdata('success') ?></p>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Breed</th>
                    <th>Age</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($animals as $animal): ?>
                    <tr>
                        <td><?= esc($animal['id']) ?></td>
                        <td><?= esc($animal['name']) ?></td>
                        <td><?= esc($animal['breed']) ?></td>
                        <td><?= esc($animal['age']) ?></td>
                        <td><?= esc($animal['description']) ?></td>
                        <td>
                            <a href="/admin/animals/edit/<?= $animal['id'] ?>">Edit</a> | 
                            <a href="/admin/animals/delete/<?= $animal['id'] ?>" class="delete-button" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
