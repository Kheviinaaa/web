<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Link to custom jQuery functions (if any) -->
    <script src="my_jquery_functions.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mauritius Wonders Login</title>

    <style>
        /* Style for the entire page background and center alignment */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('https://wallpaperaccess.com/full/359978.jpg') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Login container styling */
        .login-container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        /* Heading style */
        .login-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        /* Input field styling */
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        /* Submit button styling */
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #0288d1;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        /* Hover effect on button */
        .login-container button:hover {
            background-color: #0277bd;
        }

        /* Paragraph text style */
        .login-container p {
            font-size: 14px;
            margin-top: 20px;
        }

        /* Link inside paragraph styling */
        .login-container p a {
            text-decoration: none;
            color: #0288d1;
        }

        /* Hover effect for link */
        .login-container p a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Login Form Container -->
    <div class="login-container">
        <h1>Welcome to Mauritius Wonders</h1>

        <!-- Username Input -->
        <input type="text" id="username" placeholder="Username" required>

        <!-- Password Input -->
        <input type="password" id="password" placeholder="Password" required>

        <!-- Error Message (Initially hidden) -->
        <p style="color:red; display:none;" id="error">Invalid Credentials</p>

        <!-- Submit/Login Button -->
        <button id="submit">Login</button>

        <!-- Link to Signup page -->
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>

<!--Ajax JavaScript code to handle login functionality-->
<script>
//Wait for the entire page content to load
document.addEventListener("DOMContentLoaded", function() {
    // When the submit button is clicked
    document.getElementById("submit").addEventListener("click", function() {
        // Get username and password values
        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;

        // Create form data to append username & password
        const formData = new FormData();
        formData.append("username", username);
        formData.append("password", password);

        // Send POST request to 'process_login.php'
        fetch("process_login.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // If login is successful(returns "true")
            if (data.trim() === "true") {
                window.location.href = "main_page.php";  //redirect user to the main page
            }
            // If login fails
            else {
                document.querySelector("p").style.display = "block";  //display error message
            }
        })
        // Catch and log any errors that occur during the fetch
        .catch(error => {
            console.error("Error:", error);
        });
    });
});
</script>
