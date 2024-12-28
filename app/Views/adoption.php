<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Page - Sugency</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f3ff;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 1000px;
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
        .animal-list {
            list-style-type: none;
            padding: 0;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .animal-item {
            background-color: #f0f8ff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .animal-item h2 {
            color: #4a90e2;
            margin-top: 0;
        }
        .animal-item p {
            margin: 5px 0;
        }
        button {
            background-color: #4a90e2;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
            margin-top: 10px;
        }
        button:hover {
            background-color: #3a7bc8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Available Animals for Adoption</h1>

        <ul class="animal-list" id="animal-list">
            <!-- Animal items will be populated here -->
        </ul>
    </div>

    <script>
        // Simulated animal data (replace with actual data fetching logic)
        const animals = [
            {
                id: 1,
                name: 'Fluffy',
                breed: 'Persian',
                age: 3,
                description: 'A lovely Persian cat with a gentle temperament.',
                food: 'Premium cat food',
                food_per_day: 2,
                treatment: 'Regular grooming',
                accessories: 'Scratching post, toys',
                cage: 'Large cat tree'
            },
            {
                id: 2,
                name: 'Buddy',
                breed: 'Golden Retriever',
                age: 2,
                description: 'An energetic and friendly Golden Retriever.',
                food: 'High-quality dog food',
                food_per_day: 3,
                treatment: 'Regular exercise',
                accessories: 'Leash, chew toys',
                cage: 'Large dog bed'
            }
        ];

        // Function to create animal item HTML
        function createAnimalItem(animal) {
            return `
                <li class="animal-item">
                    <h2>${animal.name} (${animal.breed})</h2>
                    <p><strong>Age:</strong> ${animal.age} years</p>
                    <p>${animal.description}</p>
                    <p><strong>Food:</strong> ${animal.food}</p>
                    <p><strong>Food per Day:</strong> ${animal.food_per_day} servings</p>
                    <p><strong>Treatment:</strong> ${animal.treatment}</p>
                    <p><strong>Accessories:</strong> ${animal.accessories}</p>
                    <p><strong>Cage:</strong> ${animal.cage}</p>
                    <form action="/adoption/request/${animal.id}" method="post">
                        <button type="submit">Request Adoption</button>
                    </form>
                </li>
            `;
        }

        // Populate animal list
        const animalList = document.getElementById('animal-list');
        animals.forEach(animal => {
            animalList.innerHTML += createAnimalItem(animal);
        });
    </script>
</body>
</html>