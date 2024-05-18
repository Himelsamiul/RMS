<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #71b7e6, #9b59b6); /* Gradient background */
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    @keyframes slideDown {
      from {
        transform: translateY(-100%);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .login-container {
      background-color: #d6e9f8;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 400px;
      animation: slideDown 1s ease-out;
    }

    .login-container h2 {
      margin-bottom: 20px;
      font-size: 28px;
      color: #8033FF;
      text-align: center;
      font-weight: bold;
      font-family: 'Algerian', sans-serif; /* Algerian font */
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
      color: #333;
    }

    input {
      width: 100%;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 16px;
      transition: border-color 0.3s;
    }

    input:focus {
      border-color: #9b59b6;
      outline: none;
      box-shadow: 0 0 8px rgba(155, 89, 182, 0.2);
    }

    button {
      width: 100%;
      padding: 15px;
      background-color: #9b59b6;
      color: #fff;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 18px;
      font-weight: bold;
      transition: background-color 0.3s, transform 0.2s;
    }

    button:hover {
      background-color: #8e44ad;
      transform: scale(1.05);
    }

    .error-message {
      color: #e74c3c;
      margin-top: 10px;
      text-align: center;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Admin Login</h2>
    <form action="{{ route('do.login') }}" method="post" id="login-form">
      @csrf
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit">Login</button>
    </form>
    <p id="error-message" class="error-message"></p>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('login-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var errorMessage = document.getElementById('error-message');

        // Email validation
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
          errorMessage.textContent = 'Please enter a valid email address.';
          return;
        }

        // Password validation
        if (password.length < 6) {
          errorMessage.textContent = 'Password must be at least 6 characters long.';
          return;
        }

        // If all validations pass, submit the form
        this.submit();
      });
    });
  </script>
</body>
</html>
