<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Animals</title>
</head>
<body>
    <h1>Manage Animals</h1>
    <a href="/admin/animals/create">Add New Animal</a>
    <?php if (session()->getFlashdata('success')): ?>
        <p><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
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
                        <a href="/admin/animals/edit/<?= $animal['id'] ?>">Edit</a>
                        <a href="/admin/animals/delete/<?= $animal['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
