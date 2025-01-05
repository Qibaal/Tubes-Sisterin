<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up for PurrfectNeeds</title>
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
      max-width: 400px;
      width: 100%;
    }
    h3 {
     margin-bottom: 0.5rem;
     font-size: 1.5rem;
     text-align: center;
    }
    h1 {
     margin-bottom: 1rem;
     font-size: 2.5rem;
     text-align: center;
    }
    form {
      display: flex;
      flex-direction: column;
    }
    label {
      margin-bottom: 0.5rem;
    }
    input, textarea {
      margin-bottom: 1rem;
      padding: 0.5rem;
      border-radius: 5px;
      border: none;
      background-color: #4a4a4a;
      color: #ffffff;
    }
    textarea {
      resize: vertical;
    }
    button {
      background-color: #b8860b;
      color: #ffffff;
      padding: 0.75rem;
      border-radius: 5px;
      border: none;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    button:hover {
      background-color: #8b6508;
    }
    p {
      margin-top: 1rem;
      text-align: center;
    }
    a {
      color: #ffffff;
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h3>SIGN UP FOR</h3>
    <h1>THE CATALOGUE</h1>
    <form action="<?= base_url('thecatalogue/signup') ?>" method="post">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        
        <label for="full_name">Full Name</label>
        <input type="text" id="full_name" name="full_name" required>
        
        <label for="phone_number">Phone Number</label>
        <input type="tel" id="phone_number" name="phone_number" required>
        
        <label for="address">Address</label>
        <textarea id="address" name="address" rows="3" required></textarea>
        <br>
        <button type="submit">Sign Up</button>
    </form>
    <p>
      Already have an account? <a href="/thecatalogue/login">Login</a>
    </p>
  </div>
</body>
</html>
