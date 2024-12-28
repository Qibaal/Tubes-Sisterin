<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt a Furry Friend - Sugency</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        h1 {
            color: #3a7bd5;
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 40px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        .adopt-button {
            display: inline-block;
            text-align: center;
            background-color: #3a7bd5;
            color: #ffffff;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            width: auto;
            margin-top: 15px;
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: block;
            text-align: center;
        }
        .adopt-button:hover {
            background-color: #2c5ea3;
            transform: scale(1.05);
        }
        .animal-list {
            list-style-type: none;
            padding: 0;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        .animal-item {
            background-color: #ffffff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .animal-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        .animal-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .animal-info {
            padding: 20px;
        }
        .animal-info h2 {
            color: #3a7bd5;
            margin-top: 0;
            font-size: 1.5rem;
        }
        .animal-info p {
            margin: 10px 0;
            color: #555;
        }
        .health-status {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.9rem;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Find Your Perfect Companion</h1>

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
                health_status: 'Healthy',
                image: '/asset/persian.png'
            },
            {
                id: 2,
                name: 'Buddy',
                breed: 'Golden Retriever',
                age: 2,
                description: 'An energetic and friendly Golden Retriever.',
                health_status: 'Vaccinated',
                image: '/asset/persian.png'
            }
        ];

        // Function to create animal item HTML
        function createAnimalItem(animal) {
            return `
                <li class="animal-item">
                    <img src="${animal.image}" alt="${animal.name}" class="animal-image">
                    <div class="animal-info">
                        <h2>${animal.name}</h2>
                        <p><strong>Breed:</strong> ${animal.breed}</p>
                        <p><strong>Age:</strong> ${animal.age} ${animal.age === 1 ? 'year' : 'years'}</p>
                        <p>${animal.description}</p>
                        <span class="health-status">${animal.health_status}</span>
                        <a href="adoption_info.php?id=${animal.id}" class="adopt-button">Adopt Me</a>
                    </div>
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