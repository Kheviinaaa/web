<?php
session_start(); // Start session to check if admin is logged in
if (!isset($_SESSION['adm_username'])){
    header("location: adm_login.php"); // Redirect to login if not authenticated
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Page</title>
    <link rel="stylesheet" href="css/adm_hotel.css">
</head>
<body>
    <div class="background">
        <!-- Navbar Section -->
        <nav class="navbar">
            <ul>
                <li><a href="adm_home.php">Home</a></li>
                <li class="dropdown">
                    <a class="dropbtn" href="adm_hotel.php">Hotel</a>
                    <div class="dropdown-content">
                        <a href="add_hotel.php">Add Hotel</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a class="dropbtn" href="adm_activity.php">Activities</a>
                    <div class="dropdown-content">
                        <a href="adm_activity.php?type=1">Sea</a>
                        <a href="adm_activity.php?type=2">Nature</a>
                        <a href="add_activities.php">Add Activities</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a class="dropbtn" href="adm_cuisine.php">Cuisine</a>
                    <div class="dropdown-content">
                        <a href="add_cuisine.php">Add Cuisine</a>
                    </div>
                </li>
                <li><a href="adm_user.php">Users</a></li>
                <li><a href="adm_feedback.php">Feedback</a></li>
                <li><a href="adm_contact.php">Contact</a></li>
            </ul>
        </nav>
    </div>

<?php

// Database connection
include 'db_connect.php';

// Check if 'id' and 'action' are set in the URL
if(isset($_GET['id']) && isset($_GET['action'])){
    $id = $_GET['id'];
    $action = $_GET['action'];

    // Edit Action
    if($action == "edit"){
        // Fetch hotel details from the database
        $sql = "SELECT * FROM hotel WHERE id = '$id'";
        $result = $conn->query($sql);
        if ($result->num_rows <= 0 ){
            die("No hotel found"); // If no hotel found, show error
        }
        $result = $result->fetch_assoc();
        ?>
        <!-- Hotel Section -->
        <section class="hotels">
            <link rel="stylesheet" href="css/adm_hotel.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script src="my_jquery_functions.js"></script>
            <h1>Hotel</h1>
            <div class="hotels-grid">
                <div class="hotel-card">
                    <input id="id" style="display:none;" value="<?php echo $id; ?>">

                    <!-- Hotel Image -->
                    <img class="img_src" src="<?php echo $result['img_src']; ?>" alt="<?php echo $result['name']; ?>">
                    <br><br>

                    <!-- Image Edit Section -->
                    <div style="display:none;" class="img_src_det">
                        <textarea type="text" id="img_src"></textarea>
                        <button id="btnimg_src">Save</button>
                    </div>

                    <!-- Hotel Name -->
                    <h3 class="name"><?php echo $result['name']; ?></h3>
                    <div style="display:none;" class="name_det">
                        <textarea type="text" id="name"></textarea>
                        <button id="btnname">Save</button>
                    </div>

                    <!-- Picture Source -->
                    <h6 class="picture_src"><?php echo $result['picture_src']; ?></h6>
                    <div style="display:none;" class="picture_src_det">
                        <textarea type="text" id="picture_src"></textarea>
                        <button id="btnpicture_src">Save</button>
                    </div>

                    <!-- Hotel Star Rating -->
                    <p class="star"><?php echo $result['star']; ?></p>
                    <div style="display:none;" class="star_det">
                        <textarea type="text" id="star"></textarea>
                        <button id="btnstar">Save</button>
                    </div>

                    <!-- Hotel Description -->
                    <p class="description"><?php echo $result['description']; ?></p>
                    <div style="display:none;" class="description_det">
                        <textarea type="text" id="description"></textarea>
                        <button id="btndescription">Save</button>
                    </div>

                    <!-- Hotel Website -->
                    <div>
                        <a href = <?php echo $result['visit_web']; ?> class="visit">Visit Hotel's Website</a>
                        <div style="display:none;" class="visit_det">
                            <textarea type="text" id="visit"></textarea>
                            <button id="btnvisit">Save</button>
                        </div>
                    </div>

                    <!-- Hotel Booking -->
                    <a href=<?php echo $result['book'] ;?> class ="book" class="hotel-link">Book on Booking.com</a>
                    <div style="display:none;" class="book_det">
                        <textarea type="text" id="book"></textarea>
                        <button id="btnbook">Save</button>
                    </div>

                </div>
            </div>
        </section>
        <script>
            $(document).ready(function(){
                // Toggle the display of editable sections
                $(".img_src").click(function(){
                    $(".img_src_det").fadeToggle(1000); //show or hide the input field for image source
                });

                $(".name").click(function(){
                    $(".name_det").fadeToggle(1000);
                });

                $(".picture_src").click(function(){
                    $(".picture_src_det").fadeToggle(1000);
                });

                $(".star").click(function(){
                    $(".star_det").fadeToggle(1000);
                });

                $(".description").click(function(){
                    $(".description_det").fadeToggle(1000);
                });

                $(".visit").click(function(){
                    $(".visit_det").fadeToggle(1000);
                });

                $(".book").click(function(){
                    $(".book_det").fadeToggle(1000);
                });

                //ajax in javaScript and XML
                document.getElementById("btnimg_src").addEventListener("click", function(){

                    // Get the value of the image URL from the input field with id "img_src"
                    var img_src = document.getElementById("img_src").value;

                    // Get the value of the "id" from the hidden or visible input field with id "id"
                    var id = document.getElementById("id").value;

                    // Check if the image URL is empty
                    if(img_src == ""){
                        // If empty, alert the user that the image URL is missing
                        alert("The image URL is missing");
                    } else {
                        // If not empty, initiate a POST request using fetch
                        fetch("process_edit.php", {
                            method: "POST",  // HTTP method set to POST
                            body: new URLSearchParams({
                                // Send the data to the server including img_src, id, column name, and table name
                                data: img_src,
                                id: id,
                                column: "img_src",  // Column in the database to be updated
                                table: "hotel"      // Table in the database where the data will be updated
                            })
                        })
                        // Process the response from the server, expect the response to be in text format
                        .then(response => response.text())

                        // Handle the server response
                        .then(data => {
                            // If the response is "success", reload the page to reflect the changes
                            if(data === "success") {
                                location.reload();
                            } else {
                                // If not success, alert the user with the error message from the server
                                alert(data);
                            }
                        })

                        // Catch any errors that may occur during the fetch request
                        .catch(error => console.error("Error:", error));
                    }
                });



                //handle save for name
                $("#btnname").click(function(){
                    var name = $("#name").val();
                    var id = $("#id").val();
                    if(name == ""){
                        alert("The name is missing");
                    } else {
                        $.post("process_edit.php",{
                            data: name,
                            id: id,
                            column: "name",
                            table:"hotel"
                        },
                        function(data){
                            if(data == "success"){
                                location.reload();
                            } else {
                                alert(data);
                            }
                        });
                    }
                });

                $("#btnpicture_src").click(function(){
                    var picture_src = $("#picture_src").val();
                    var id = $("#id").val();
                    if(picture_src == ""){
                        alert("The picture source is missing");
                    } else {
                        $.post("process_edit.php",{
                            data: picture_src,
                            id: id,
                            column: "picture_src",
                            table:"hotel"
                        },
                        function(data){
                            if(data == "success"){
                                location.reload();
                            } else {
                                alert(data);
                            }
                        });
                    }
                });

                $("#btnstar").click(function(){
                    var star = $("#star").val();
                    var id = $("#id").val();
                    if(star == ""){
                        alert("The star emoji is missing");
                    } else {
                        $.post("process_edit.php",{
                            data: star,
                            id: id,
                            column: "star",
                            table:"hotel"
                        },
                        function(data){
                            if(data == "success"){
                                location.reload();
                            } else {
                                alert(data);
                            }
                        });
                    }
                });

                $("#btndescription").click(function(){
                    var description = $("#description").val();
                    var id = $("#id").val();
                    if(description == ""){
                        alert("The description is missing");
                    } else {
                        $.post("process_edit.php",{
                            data: description,
                            id: id,
                            column: "description",
                            table:"hotel"
                        },
                        function(data){
                            if(data == "success"){
                                location.reload();
                            } else {
                                alert(data);
                            }
                        });
                    }
                });

                $("#btnvisit").click(function(){
                    var visit = $("#visit").val();
                    var id = $("#id").val();
                    if(visit == ""){
                        alert("The visit URL is missing");
                    } else {
                        $.post("process_edit.php",{
                            data: visit,
                            id: id,
                            column: "visit",
                            table:"hotel"
                        },
                        function(data){
                            if(data == "success"){
                                location.reload();
                            } else {
                                alert(data);
                            }
                        });
                    }
                });

                $("#btnbook").click(function(){
                    var book = $("#book").val();
                    var id = $("#id").val();
                    if(book == ""){
                        alert("The booking URL is missing");
                    } else {
                        $.post("process_edit.php",{
                            data: book,
                            id: id,
                            column: "book",
                            table:"hotel"
                        },
                        function(data){
                            if(data == "success"){
                                location.reload();
                            } else {
                                alert(data);
                            }
                        });
                    }
                });
            });
        </script>
    <?php
    } elseif ($action == "delete") {
        // Handle delete action
        $sql = "DELETE FROM hotel WHERE id = '$id'";
        if($conn->query($sql)){
            header("location:adm_hotel.php"); // Redirect to hotel list after deletion
        } else {
            echo "Deletion error";
        }
    } else {
        die("<h1>404 URL NOT FOUND</h1>"); // If invalid action
    }
} else {
    // Handle case when 'id' and 'action' are not set
?>

</body>
<script>
</script>
</html>

<?php } ?>
