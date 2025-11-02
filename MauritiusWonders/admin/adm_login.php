<!DOCTYPE html>
<html lang="en">
<head>
    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Custom JavaScript Functions -->
    <script src="my_jquery_functions.js"></script>

    <!-- Meta tags for character set and viewport configuration -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page Title -->
    <title>Mauritius Wonders Login</title>

    <style>
        /* Body Styling */
        body {
            font-family: Arial, sans-serif; /* Font style for the body */
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
            background: url('https://wallpaperaccess.com/full/1703474.jpg') no-repeat center center/cover; /* Background image */
            height: 100vh; /* Full viewport height */
            display: flex; /* Use flexbox for centering */
            align-items: center; /* Vertically center content */
            justify-content: center; /* Horizontally center content */
        }

        /* Login Container Styling */
        .login-container {
            background: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
            border-radius: 10px; /* Rounded corners */
            padding: 20px; /* Padding inside the container */
            width: 300px; /* Fixed width */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Drop shadow effect */
            text-align: center; /* Center align text */
        }

        /* Header Styling Inside Login Container */
        .login-container h1 {
            font-size: 24px; /* Font size for the heading */
            margin-bottom: 20px; /* Margin below the heading */
            color: #333; /* Dark color for the text */
        }

        /* Input Fields Styling */
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%; /* Full width */
            padding: 10px; /* Padding inside the input fields */
            margin: 10px 0; /* Margin between the input fields */
            border-radius: 5px; /* Rounded corners */
            border: 1px solid #ccc; /* Light gray border */
        }

        /* Button Styling */
        .login-container button {
            width: 100%; /* Full width */
            padding: 10px; /* Padding inside the button */
            background-color: #0288d1; /* Blue background */
            color: white; /* White text */
            border: none; /* No border */
            border-radius: 5px; /* Rounded corners */
            font-size: 16px; /* Font size */
            cursor: pointer; /* Pointer cursor on hover */
        }

        /* Button Hover Effect */
        .login-container button:hover {
            background-color: #0277bd; /* Darker blue on hover */
        }

        /* Paragraph Styling for Error Message */
        .login-container p {
            font-size: 14px; /* Font size for the error message */
            margin-top: 20px; /* Margin above the paragraph */
        }

        /* Link Styling in Error Message */
        .login-container p a {
            text-decoration: none; /* No underline for the link */
            color: #0288d1; /* Blue color for the link */
        }

        /* Link Hover Effect */
        .login-container p a:hover {
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>
<body>
    <!-- Login Form Container -->
    <div class="login-container">
        <h1>Welcome to Mauritius Wonders</h1>

        <!-- Username Input Field -->
        <input type="text" id="username" placeholder="Username" required>

        <!-- Password Input Field -->
        <input type="password" id="password" placeholder="Password" required>

        <!-- Error Message (Hidden Initially) -->
        <p style="color:red;display:none;" id="error">Invalid Credentials</p>

        <!-- Login Button -->
        <button id="submit">Login</button>
    </div>

    <!-- jQuery Script for Handling Login Logic -->
    <script>
        $(document).ready(function(){
            // Event listener for login button click
            $("#submit").click(function(){
                // Get the values of username and password input fields
                const username = $("#username").val();
                const password = $("#password").val();

                // Send login data to the server via POST request
                $.post("adm_process_login.php",{
                    username: username,
                    password: password
                },
                function(data){
                    // Check if login is successful
                    if(data == "true") {
                        window.location.href = "adm_home.php"; // Redirect to home page
                    }
                    else {
                        $("p").show(); // Show the error message
                    }
                });
            });
        });
    </script>
</body>
</html>
