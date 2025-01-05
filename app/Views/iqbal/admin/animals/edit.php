<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Animal</title>
</head>
<body>
    <h1>Edit Animal</h1>
    <form action="/admin/animals/update/<?= $animal['id'] ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?= esc($animal['name']) ?>" required><br>
        <label for="type">Type:</label>
        <input type="text" name="type" id="type" value="<?= esc($animal['type']) ?>" required><br>
        <label for="age">Age:</label>
        <input type="number" name="age" id="age" value="<?= esc($animal['age']) ?>" required><br>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required><?= esc($animal['description']) ?></textarea><br>
        <button type="submit">Update Animal</button>
    </form>
</body>
</html>
