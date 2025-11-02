<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include jQuery from CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Include external JavaScript file with custom jQuery functions -->
    <script src="my_jquery_functions.js"></script>

    <!-- Meta tags for character encoding and responsive layout -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page Title -->
    <title>Sign Up Page</title>

    <!-- Internal CSS for styling the sign-up form -->
    <style>
        body {
            background-image: url('https://wallpaperaccess.com/full/359978.jpg'); /* Background image */
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .signup-box {
            background: rgba(255, 255, 255, 0.8); /* White background with 80% opacity */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 320px;
        }

        .signup-box h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .signup-box input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .signup-box button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .signup-box button:hover {
            background-color: #45a049;
        }

        .signup-box p {
            text-align: center;
            margin-top: 15px;
            color: #555;
        }

        .signup-box p a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <!-- Sign-Up Form Container -->
    <div class="signup-box">
        <h2>Sign Up</h2>

        <!-- User Input Fields -->
        <input type="text" name="firstname" id="firstname" placeholder="First Name" required>
        <input type="text" name="lastname" id="lastname" placeholder="Last Name" required>
        <input type="email" name="email" id="email" placeholder="Email Address" required>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <input type="password" name="confirmpassword" class="confirmpassword" placeholder="Confirm Password" required>

        <!-- Error message for password mismatch -->
        <p style="color:red; display:none;" id="Error_password">Incorrect password!</p>

        <!-- Submit Button -->
        <button id="submit">Create Account</button>

        <!-- Link to Log In Page -->
        <p>Already have an account? <a href="login.php">Log In</a></p>
    </div>

    <!-- jQuery Script to Handle Form Submission -->
    <script>
        $(document).ready(function () {
            // Handle submit button click
            $("#submit").click(function () {
                // Get input values
                var firstname = $("#firstname").val();
                var lastname = $("#lastname").val();
                var email = $("#email").val();
                var password = $("#password").val();
                var confirmpassword = $(".confirmpassword").val();

                // Send data using POST method to PHP backend
                $.post("process_signup.php", {
                    firstname: firstname,
                    lastname: lastname,
                    email: email,
                    password: password,
                    confirmpassword: confirmpassword
                },
                function (data) {
                    // Show error message if password is incorrect
                    if (data === "incorrect password!") {
                        $("#Error_password").slideDown(500);
                    } else {
                        // Alert response and reload page on success
                        alert(data);
                        location.reload();
                    }
                });
            });
        });
    </script>
</body>
</html>
