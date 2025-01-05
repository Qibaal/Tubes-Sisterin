<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Catalogue</title>
  <style>
    body {
     background: linear-gradient(135deg, #1a1a1a 25%, #2a2a2a 25%, #2a2a2a 50%, #1a1a1a 50%, #1a1a1a 75%, #2a2a2a 75%, #2a2a2a);
     background-size: 20px 20px; 
     min-height: 100vh;
     margin: 0;
     display: flex;
     flex-direction: column;
     align-items: center;
     justify-content: center;
     color: #ffffff;
     font-family: Arial, sans-serif;
    }
    .container {
      background-color: #2a2a2a;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      text-align: center;
      max-width: 400px;
      width: 100%;
    }
    .logo {
      margin-bottom: 1rem;
      max-width: 100px;
      height: auto;
    }
    h1 {
      margin-bottom: 1rem;
      font-size: 2.5rem;
    }
    h2 {
      margin-bottom: 0.5rem;
      font-size: 2rem;
    }
    p {
      margin-bottom: 2rem;
      color: #cccccc;
      font-size: 1.2rem;
    }
    .button-group {
      display: flex;
      justify-content: space-between;
    }
    .button {
      background-color: #b8860b;
      color: #ffffff;
      padding: 0.75rem 1.5rem;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
      font-size: 1rem;
      transition: background-color 0.3s;
    }
    .button:hover {
      background-color: #8b6508;
    }
  </style>
</head>
<body>
  <div class="container">
    <img src="/asset/tc_logo.png" alt="The Catalogue Logo" class="logo">
    <h3>WELCOME TO</h3>
    <h1>THE CATALOGUE</h1>
    <p>Your one-stop shop for all cat needs</p>
    <div class="button-group">
      <a href="/thecatalogue/login" class="button">Login</a>
      <a href="/thecatalogue/signup" class="button">Sign Up</a>
    </div>
  </div>
</body>
</html>
