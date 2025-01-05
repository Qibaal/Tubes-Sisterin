<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Animal</title>
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

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4a90e2;
            color: white;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #357abd;
        }

        .form-container p {
            text-align: center;
            font-size: 0.9rem;
            color: #555;
        }
    </style>
</head>
<body>
    <h1>Add New Animal</h1>
    <div class="form-container">
        <form action="/admin/animals/store" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" placeholder="Enter animal's name" required>

            <label for="type">Type:</label>
            <input type="text" name="type" id="type" placeholder="Enter animal's type (e.g., Dog, Cat)" required>

            <label for="age">Age:</label>
            <input type="number" name="age" id="age" placeholder="Enter animal's age in years" required>

            <label for="description">Description:</label>
            <textarea name="description" id="description" placeholder="Enter a brief description of the animal" required></textarea>

            <button type="submit">Add Animal</button>
        </form>
        <p>Ensure all fields are filled before submitting.</p>
    </div>
</body>
</html>
