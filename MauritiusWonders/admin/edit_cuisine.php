<?php
// Start the session and check if the admin is logged in
session_start();
if (!isset($_SESSION["adm_username"])) {
    header("location: adm_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activities<3</title>
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
</body>

<?php
// Connect to the database
include 'db_connect.php';

// Query to fetch cuisine data
$sql = "SELECT * FROM cuisine";
$results = $conn->query($sql);

// Check if there are no results
if ($results->num_rows <= 0) {
    die("<h2>No cuisine data found </h2>");
}

// Check if a specific cuisine ID is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query to fetch data for the specific cuisine
    $sql = "SELECT * FROM cuisine WHERE id = '$id'";
    $result = $conn->query($sql);
    $result = $result->fetch_assoc();
?>
    <!-- Cuisine Section -->
    <section class="hotels">
        <link rel="stylesheet" href="css/adm_hotel.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="my_jquery_functions.js"></script>
        
        <h1>Cuisine</h1>
        <div class="hotels-grid">
            <div class="hotel-card">
                <!-- Hidden input to hold the cuisine ID -->
                <input id="id" style="display:none;" value="<?php echo $id; ?>">

                <!-- Cuisine Image -->
                <img class="img_src" src="<?php echo $result['img_src']; ?>" alt="<?php echo $result['name']; ?>">
                <br><br>
                <!-- Editable Image URL -->
                <div style="display:none;" class="img_src_det">
                    <textarea type="text" id="img_src"></textarea>
                    <button id="btnimg_src">save</button>
                </div>

                <!-- Cuisine Name -->
                <h3 class="name"><?php echo $result['name']; ?></h3>
                <div style="display:none;" class="name_det">
                    <textarea type="text" id="name"></textarea>
                    <button id="btnname">save</button>
                </div>

                <!-- Cuisine Description -->
                <p class="description"><?php echo $result['description']; ?></p>
                <div style="display:none;" class="description_det">
                    <textarea type="text" id="description"></textarea>
                    <button id="btndescription">save</button>
                </div>

                <!-- Restaurant Link -->
                <div>
                    <a class="visit"><?php echo $result['restaurant']; ?></a>
                    <div style="display:none;" class="visit_det">
                        <textarea type="text" id="visit"></textarea>
                        <button id="btnvisit">save</button>
                    </div>
                </div>

                <!-- Dish Name -->
                <div>
                    <a class="dish"><?php echo $result['dish']; ?></a>
                    <div style="display:none;" class="dish_det">
                        <textarea type="text" id="dish"></textarea>
                        <button id="btndish">save</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // jQuery for toggling editable sections
        $(document).ready(function() {
            $(".img_src").click(function() {
                $(".img_src_det").fadeToggle(1000);
            });

            $(".name").click(function() {
                $(".name_det").fadeToggle(1000);
            });

            $(".dish").click(function() {
                $(".dish_det").fadeToggle(1000);
            });

            $(".description").click(function() {
                $(".description_det").fadeToggle(1000);
            });

            $(".visit").click(function() {
                $(".visit_det").fadeToggle(1000);
            });

            // Save changes for the Image URL
            $("#btnimg_src").click(function() {
                var img_src = $("#img_src").val();
                var id = $("#id").val();
                if (img_src == "") {
                    alert("The image url is missing");
                } else {
                    $.post("process_edit_cuisine.php", {
                        data: img_src,
                        id: id,
                        column: "img_src"
                    }, function(data) {
                        if (data == "success") {
                            location.reload();
                        } else {
                            alert(data);
                        }
                    });
                }
            });

            // Save changes for the Cuisine Name
            $("#btnname").click(function() {
                var name = $("#name").val();
                var id = $("#id").val();
                if (name == "") {
                    alert("The name is missing");
                } else {
                    $.post("process_edit_cuisine.php", {
                        data: name,
                        id: id,
                        column: "name"
                    }, function(data) {
                        if (data == "success") {
                            location.reload();
                        } else {
                            alert(data);
                        }
                    });
                }
            });

            // Save changes for the Dish Name
            $("#btndish").click(function() {
                var dish_src = $("#dish").val();
                var id = $("#id").val();
                if (dish_src == "") {
                    alert("The dish section is missing");
                } else {
                    $.post("process_edit_cuisine.php", {
                        data: dish_src,
                        id: id,
                        column: "dish"
                    }, function(data) {
                        if (data == "success") {
                            location.reload();
                        } else {
                            alert(data);
                        }
                    });
                }
            });

            // Save changes for the Cuisine Description
            $("#btndescription").click(function() {
                var description = $("#description").val();
                var id = $("#id").val();
                if (description == "") {
                    alert("The description is missing");
                } else {
                    $.post("process_edit_cuisine.php", {
                        data: description,
                        id: id,
                        column: "description"
                    }, function(data) {
                        if (data == "success") {
                            location.reload();
                        } else {
                            alert(data);
                        }
                    });
                }
            });

            // Save changes for the Restaurant Name
            $("#btnvisit").click(function() {
                var restaurant = $("#visit").val();
                var id = $("#id").val();
                if (restaurant == "") {
                    alert("The restaurant is missing");
                } else {
                    $.post("process_edit_cuisine.php", {
                        data: restaurant,
                        id: id,
                        column: "restaurant"
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
