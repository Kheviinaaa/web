<!-- CSS Styling -->
<style>

    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Body Styling */
    body {
        background-color: #f0f9f8;
        color: #333;
        padding: 20px;
    }

    /* Navigation Bar */
    ul {
        list-style-type: none;
        background-color: #008080;
        padding: 1rem;
        display: flex;
        gap: 1rem;
    }

    ul li {
        display: inline;
    }

    ul li a {
        text-decoration: none;
        color: white;
        padding: 10px 15px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    ul li a:hover {
        background-color: #00796b;
    }

    /* Page Headings */
    h1 {
        text-align: center;
        color: #00796b;
        margin-top: 20px;
    }

    h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #444;
    }

    /* Form Styling */
    .form {
        max-width: 600px;
        margin: 0 auto;
        background-color: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .form label {
        display: block;
        margin-top: 1rem;
        font-weight: bold;
    }

    .form input,
    .form textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 1rem;
    }

    textarea {
        resize: vertical;
        min-height: 120px;
    }

    /* Submit Button Styling */
    button[type="submit"] {
        margin-top: 1.5rem;
        padding: 0.75rem 1.5rem;
        background-color: #009688;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #00796b;
    }

    /* Success and Error Messages */
    .success {
        text-align: center;
        margin-top: 20px;
    }

    #success {
        color: green;
        display: none;
    }

    #empty {
        color: red;
        text-align: center;
        margin-top: 10px;
        font-weight: bold;
    }

    /* Footer Styling */
    footer {
        background-color: #004d40;
        color: white;
        padding: 2rem 1rem;
        margin-top: 50px;
        text-align: center;
    }

    .footer-container {
        max-width: 1200px;
        margin: auto;
    }

    .social-media p {
        margin-bottom: 10px;
    }

    .social-icon img {
        width: 30px;
        margin: 0 8px;
        transition: transform 0.3s;
    }

    .social-icon img:hover {
        transform: scale(1.2);
    }

    .footer-bottom {
        margin-top: 1rem;
        font-size: 0.9rem;
        color: #b2dfdb;
    }

    /* Responsive Design */
    @media (max-width: 600px) {
        .form {
            padding: 1rem;
        }

        ul {
            flex-direction: column;
            align-items: flex-start;
        }

        ul li {
            margin-bottom: 0.5rem;
        }
    }

</style>

<!-- HTML Document -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Custom jQuery Functions -->
    <script src="my_jquery_functions.js"></script>

    <title>Feedback - MauritiusWonders</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <!-- Navigation Bar -->
    <ul>
        <li><a href="main_page.php">Home</a></li>
        <li><a href="contact.php">Contact Us</a></li>
    </ul>

    <!-- Success Message Section -->
    <div class="success">
        <h1 id="success">Thank You For Your Feedback!</h1>
    </div>

    <!-- Feedback Form -->
    <h1>We Value Your Feedback</h1>
    <h2>Tell us what you think!</h2>

    <div class="form">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Your Name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Your Email" required>

        <label for="feedback">Your Feedback:</label>
        <textarea id="feedback" name="feedback" placeholder="Write your feedback here..." required></textarea>

        <!-- Error Message for Empty Fields -->
        <p id="empty" style="color:red; display:none;">Some fields are empty</p>

        <button type="submit">Submit Feedback</button>
    </div>

    <!-- Footer Section -->
    <footer>
        <div class="footer-container">
            <div class="social-media">
                <p>Follow us on social media:</p>
                <a href="#" class="social-icon"><img src="https://th.bing.com/th/id/OIP.ENIq-U2iyx2c51zh5Hv5aAAAAA?rs=1&pid=ImgDetMain" alt="Facebook"></a>
                <a href="#" class="social-icon"><img src="https://dailytrojan.com/wp-content/uploads/2017/11/instagram1.jpg" alt="Instagram"></a>
                <a href="#" class="social-icon"><img src="https://logohistory.net/wp-content/uploads/2023/02/Twitter-Log%D0%BE.svg" alt="Twitter"></a>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2024 MauritiusWonders. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>

<!-- jQuery for Form Submission -->
<script>
    // Executes when the page is fully loaded
    $(document).ready(function() {
        // When the Submit button is clicked
        $("button").click(function() {
            // Retrieve input values
            var name = $("#name").val();
            var email = $("#email").val();
            var message = $("#feedback").val();

            // Send data to server-side script
            $.post("process_contact.php", {
                name: name,
                email: email,
                feedback: message
            },
            function(data) {
                // If fields are empty
                if (data == "empty") {
                    $("p").slideDown(1000);
                    $("p").slideUp(1000);
                }
                // If feedback is submitted successfully
                else if (data == "success") {
                    $("#name").val("");
                    $("#email").val("");
                    $("#feedback").val("");
                    $("#success").fadeIn(1000);
                    $("#success").slideUp(2000);
                }
                // If any other error occurs
                else {
                    alert(data);
                    location.reload();
                }
            });
        });
    });
</script>

</html>
