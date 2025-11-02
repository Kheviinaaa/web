<!DOCTYPE html>
<html lang="en">
<head>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Custom jQuery functions -->
    <script src="my_jquery_functions.js"></script>

    <meta charset="UTF-8">
    <title>Contact Us - MauritiusWonders</title>

    <!-- Internal CSS Styling -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }
        header {
            background: url('https://images.unsplash.com/photo-1513415277900-a62401e19be4?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bWF1cml0aXVzfGVufDB8fDB8fHww') no-repeat center center/cover;
            color: white;
            text-align: center;
            padding: 100px 20px 60px;
        }
        header h1 {
            font-size: 2.5em;
        }
        header p {
            font-size: 1.2em;
        }
        .breadcrumb {
            text-align: center;
            margin: 20px 0;
            font-size: 1em;
            color: #666;
        }
        .breadcrumb span {
            color: #f5a623;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
        }
        .form-container h2 {
            color: #006400;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button {
            background-color: #006400;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        button:hover {
            background-color: #004d00;
        }
        .success {
            text-align: center;
            margin-top: 20px;
        }
        #success {
            color: green;
            display: none;
        }
    </style>
</head>

<body>

    <!-- Header Section -->
    <header>
        <h1>Contact Us</h1>
        <p>For any queries</p>
    </header>

    <!-- Breadcrumb Navigation -->
    <div class="breadcrumb">
        <a href="main_page.php">Home</a> | <span><a href="feedback.php">Feedback</a></span>
    </div>

    <!-- Success Message Section -->
    <div class="success">
        <h1 id="success">Thank You For Your Message!</h1>
    </div>

    <!-- Contact Form Section -->
    <div class="form-container">
        <h2>Contact</h2>
        <p>Please fill in the form below to send us a message</p>

        <input type="text" id="name" placeholder="Name" required />
        <input type="email" id="email" placeholder="Email" required />
        <textarea id="message" placeholder="Your Message" rows="5" required></textarea>
        <button type="submit">Send</button>
    </div>

</body>

<!-- jQuery Script for form submission -->
<script>
    // Will be executed when the page is fully loaded
    $(document).ready(function() {
        // When the Send button is clicked
        $("button").click(function() {
            // Retrieve values from input fields
            var name = $("#name").val();
            var email = $("#email").val();
            var message = $("#message").val();

            // Send the form data to process_contact.php using POST
            $.post("process_contact.php", {
                name: name,
                email: email,
                message: message
            },
            function(data) {
                // If the response is "empty", show error animation
                if (data == "empty") {
                    $("p").slideDown(1000);
                    $("p").slideUp(1000);
                }
                // If the response is "success", reset form and show thank you message
                else if (data == "success") {
                    $("#name").val("");
                    $("#email").val("");
                    $("#message").val("");
                    $("#success").fadeIn(1000);
                    $("#success").slideUp(2000);
                }
                // If there is an error, show an alert
                else {
                    alert(data);
                }
            });
        });
    });
</script>

</html>
