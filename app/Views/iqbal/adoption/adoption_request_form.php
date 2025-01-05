<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Request - Sugency</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f3ff;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #4a90e2;
            text-align: center;
        }
        form {
            display: grid;
            gap: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #5a6c7d;
        }
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #b3d9ff;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .radio-group {
            display: flex;
            gap: 15px;
        }
        .radio-group label {
            display: inline;
            margin-left: 5px;
        }
        button {
            background-color: #4a90e2;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #3a7bc8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Request Adoption for <span id="animal-name"></span></h1>
        <form action="<?= base_url('adoption/request/' . $animal['id']) ?>" method="POST">
            <div>
                <label for="income">Monthly Income:</label>
                <input type="number" name="income" id="income" step="0.01" required>
            </div>

            <div>
                <label for="living_type">Living Type:</label>
                <select name="living_type" id="living_type" required>
                    <option value="house">House</option>
                    <option value="apartment">Apartment</option>
                </select>
            </div>

            <div>
                <label>Do you currently have pets?</label>
                <div class="radio-group">
                    <div>
                        <input type="radio" name="has_pets" value="true" id="has_pets_yes" required>
                        <label for="has_pets_yes">Yes</label>
                    </div>
                    <div>
                        <input type="radio" name="has_pets" value="false" id="has_pets_no" required>
                        <label for="has_pets_no">No</label>
                    </div>
                </div>
            </div>

            <div>
                <label for="reason">Why do you want to adopt this pet?</label>
                <textarea name="reason" id="reason" rows="5" required></textarea>
            </div>

            <button type="submit">Submit Request</button>
        </form>
    </div>

</body>
</html>