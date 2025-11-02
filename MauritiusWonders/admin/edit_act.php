<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta information for character encoding and responsive layout -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activities<3</title>
    <!-- Link to external stylesheet -->
    <link rel="stylesheet" href="css/adm_hotel.css">
</head>
<body>
    <!-- Background container for page content -->
    <div class="background">
        <!-- Navigation bar with links and dropdown menus -->
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

    <!-- PHP section to fetch activity details -->
    <?php
        // Include database connection file
        include 'db_connect.php';

        // Query to fetch all activities
        $sql = "SELECT * FROM activity";
        $results = $conn->query($sql);

        // Check if any activity records are found
        if($results->num_rows <= 0) {
            die ("<h2>No activities found</h2>");
        }

        // Check if 'id' is set in the URL
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Query to fetch activity details based on the activity id
            $sql = "SELECT * FROM activity WHERE id = '$id'";
            $result = $conn->query($sql);
            $result = $result->fetch_assoc();
    ?>
    <!-- Activity Section -->
    <section class="hotels">
        <!-- Include external CSS and JS files -->
        <link rel="stylesheet" href="css/adm_hotel.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="my_jquery_functions.js"></script>

        <h1>Activity</h1>
        <div class="hotels-grid">
            <div class="hotel-card">
                <!-- Hidden input for activity id -->
                <input id="id" style="display:none;" value="<?php echo $id; ?>">

                <!-- Display activity image -->
                <img class="img_src" src="<?php echo $result['img_src']; ?>" alt="<?php echo $result['name']; ?>">
                <br><br>

                <!-- Editable image URL section -->
                <div style="display:none;" class="img_src_det">
                    <textarea type="text" id="img_src"></textarea>
                    <button id="btnimg_src">save</button>
                </div>

                <!-- Activity name -->
                <h3 class="name"><?php echo $result['name']; ?></h3>
                <div style="display:none;" class="name_det">
                    <textarea type="text" id="name"></textarea>
                    <button id="btnname">save</button>
                </div>

                <!-- Activity picture source -->
                <h6 class="picture_src"><?php echo $result['picture_src']; ?></h6>
                <div style="display:none;" class="picture_src_det">
                    <textarea type="text" id="picture_src"></textarea>
                    <button id="btnpicture_src">save</button>
                </div>

                <!-- Activity description -->
                <p class="description"><?php echo $result['description']; ?></p>
                <div style="display:none;" class="description_det">
                    <textarea type="text" id="description"></textarea>
                    <button id="btndescription">save</button>
                </div>

                <!-- Visit activity website -->
                <div>
                    <a class="visit">Visit Activity's Website</a>
                    <div style="display:none;" class="visit_det">
                        <textarea type="text" id="visit"></textarea>
                        <button id="btnvisit">save</button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- JQuery and AJAX scripts for handling updates -->
    <script>
        $(document).ready(function() {
            // Toggle visibility of editable sections on click
            $(".img_src").click(function() {
                $(".img_src_det").fadeToggle(1000);
            });

            $(".name").click(function() {
                $(".name_det").fadeToggle(1000);
            });

            $(".picture_src").click(function() {
                $(".picture_src_det").fadeToggle(1000);
            });

            $(".description").click(function() {
                $(".description_det").fadeToggle(1000);
            });

            $(".visit").click(function() {
                $(".visit_det").fadeToggle(1000);
            });

            // Function to save updated image source
            $("#btnimg_src").click(function() {
                var img_src = $("#img_src").val();
                var id = $("#id").val();
                if (img_src == "") {
                    alert("The image URL is missing");
                } else {
                    $.post("process_edit.php", {
                        data: img_src,
                        id: id,
                        column: "img_src",
                        table: "activity"
                    }, function(data) {
                        if (data == "success") {
                            location.reload();
                        } else {
                            alert(data);
                        }
                    });
                }
            });

            // Function to save updated name
            $("#btnname").click(function() {
                var name = $("#name").val();
                var id = $("#id").val();
                if (name == "") {
                    alert("The name is missing");
                } else {
                    $.post("process_edit.php", {
                        data: name,
                        id: id,
                        column: "name",
                        table: "activity"
                    }, function(data) {
                        if (data == "success") {
                            location.reload();
                        } else {
                            alert(data);
                        }
                    });
                }
            });

            // Function to save updated picture source
            $("#btnpicture_src").click(function() {
                var picture_src = $("#picture_src").val();
                var id = $("#id").val();
                if (picture_src == "") {
                    alert("The picture source is missing");
                } else {
                    $.post("process_edit.php", {
                        data: picture_src,
                        id: id,
                        column: "picture_src",
                        table: "activity"
                    }, function(data) {
                        if (data == "success") {
                            location.reload();
                        } else {
                            alert(data);
                        }
                    });
                }
            });

            // Function to save updated description
            $("#btndescription").click(function() {
                var description = $("#description").val();
                var id = $("#id").val();
                if (description == "") {
                    alert("The description is missing");
                } else {
                    $.post("process_edit.php", {
                        data: description,
                        id: id,
                        column: "description",
                        table: "activity"
                    }, function(data) {
                        if (data == "success") {
                            location.reload();
                        } else {
                            alert(data);
                        }
                    });
                }
            });

            // Function to save updated visit URL
            $("#btnvisit").click(function() {
                var visit = $("#visit").val();
                var id = $("#id").val();
                if (visit == "") {
                    alert("The visit URL is missing");
                } else {
                    $.post("process_edit.php", {
                        data: visit,
                        id: id,
                        column: "vist_web",
                        table: "activity"
                    }, function(data) {
                        if (data == "success") {
                            location.reload();
                        } else {
                            alert(data);
                        }
                    });
                }
            });
        });
    </script>

</body>
</html>

<?php } ?>
