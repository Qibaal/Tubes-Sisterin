<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Request</title>
</head>
<body>
    <h1>Request Adoption for <?= esc($animal['name']) ?></h1>
    <form action="/adoption/request/<?= $animal['id'] ?>" method="post">
        <?= csrf_field() ?>
        <label for="income">Monthly Income:</label>
        <input type="number" name="income" id="income" step="0.01" required><br>

        <label for="living_type">Living Type:</label>
        <select name="living_type" id="living_type" required>
            <option value="house">House</option>
            <option value="apartment">Apartment</option>
        </select><br>

        <label for="has_pets">Do you currently have pets?</label>
        <input type="radio" name="has_pets" value="1" id="has_pets_yes" required>
        <label for="has_pets_yes">Yes</label>
        <input type="radio" name="has_pets" value="0" id="has_pets_no" required>
        <label for="has_pets_no">No</label><br>

        <label for="reason">Why do you want to adopt this pet?</label><br>
        <textarea name="reason" id="reason" rows="5" required></textarea><br>

        <button type="submit">Submit Request</button>
    </form>

</body>
</html>
