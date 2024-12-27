<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Animal</title>
</head>
<body>
    <h1>Add New Animal</h1>
    <form action="/admin/animals/store" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>
        <label for="type">Type:</label>
        <input type="text" name="type" id="type" required><br>
        <label for="age">Age:</label>
        <input type="number" name="age" id="age" required><br>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea><br>
        <button type="submit">Add Animal</button>
    </form>
</body>
</html>
