<?php
session_start();
$_SESSION['selected_value'] = '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            display: grid;
            grid-template-columns: 300px auto;
            grid-template-columns: 1.02fr 4fr;
            /*change */
            grid-gap: 0.5rem;
            /* align-items: start; */
            /*change */
        }

        .item_left {
            /* position: static; */
            /* background-color: red; */
            /* border: 2px solid black; */
            height: 175vh;
            padding: 15px 5px;
            background-color: rgb(231, 197, 245);
            color: black;
        }

        .item_right {
            /* background-color: red; */
            /* border: 2px solid black; */
            height: 175vh;
            padding: 15px 5px;
            background-color: ghostwhite;
        }

        .table-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100%;
        }

        table {
            width: 70%;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid black;
            text-align: center;
        }

        th,
        td {
            font-size: 16px;
        }

        .button-container {
            position: absolute;
            top: 12px;
            right: 12px;
            /* padding: 10px; */
        }


        .button-container:hover {
            background-color: grey;
        }

        .top-right-button {
            background-color: #4CAF50;
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

        div a {
            text-decoration: none;
            color: black;
            font-size: 30px;
            /* border-bottom: 2px solid black; */
            display: flex;
            /* justify-content: center; */
            align-items: flex-start;
            height: 100%;
        }

        .item_left div {
            padding: 10px 0px 10px 0px;
        }


        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 40px;
            font-weight: bold;
        }



        #exception {
            padding-top: 30px;
        }

        tr:nth-child(even) {
            background-color: white;
        }

        tr th {
            background-color: white;
        }

        .img_set {
            display: flex;
            flex-direction: row;

        }
    </style>
</head>


<body>
    <?php
    ?>

    <!-- container is grid -->
    <div class="container">


        <!-- items inside the grid are called grid items -->
        <div class="item_left">
            <div class="content" style="border: 2px solid #9f16da;">
                AKAMA
            </div>
            <div class="img_set">
                <img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/login-screen-3-719763.png" alt="" style="height: 50px; width:50px;margin-top: 22px;">
                <a id="exception" href="dashboard.php" style="margin-left:15px;">Dashboard</a>
            </div>
            <div class="img_set">
                <img src="hotel1.jpg" alt="" style="height: 50px; width:50px;margin-top: 0px; border-radius: 25px;">
                <a href="sdb1v2.php" style="margin-top: 10px; margin-left:15px;">Fairmont Resorts</a>
            </div>
            <div class="img_set">
                <img src="hotel2.jpg" alt="" style="height: 50px; width:50px;margin-top: 0px; border-radius: 25px;">
                <a href="sdb2v2.php" style="margin-top: 10px; margin-left:15px;">Four Seasons Resorts</a>
            </div>

            <div class="img_set">
                <img src="warehouse.png" alt="" style="height: 50px; width:50px;margin-top: 0px; border-radius: 25px;">
                <a href="datawarehouse.php" style="margin-top: 10px; margin-left:15px;">Warehouse Reports</a>
            </div>
        </div>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_SESSION['selected_value'] = $_POST['query_selector']; // Store selected value in session
        }
        ?>
        <div class="item_right">
            <form action="dimensiontables.php" method="POST">
                <label for="query_selector" style="margin: 0px 0px 10px 0px; font-size: 18px">Pick a Dimension Table:</label>
                <select name="query_selector" style="margin: 0px 0px 10px 0px; font-size: 16px" id="queries">
                    <option value="empty" <?php echo ($_SESSION['selected_value'] == 'empty') ? 'selected' : 'selected'; ?>></option>
                    <option value="dim_guest" <?php echo ($_SESSION['selected_value'] == 'dim_guest') ? 'selected' : ''; ?>>Guest</option>
                    <option value="dim_room" <?php echo ($_SESSION['selected_value'] == 'dim_room') ? 'selected' : ''; ?>>Room</option>
                    <option value="dim_branch" <?php echo ($_SESSION['selected_value'] == 'dim_branch') ? 'selected' : ''; ?>>Branch</option>
                    <option value="dim_date" <?php echo ($_SESSION['selected_value'] == 'dim_date') ? 'selected' : ''; ?>>Date</option>

                </select>
                <input type="submit" value="Submit" style="cursor: pointer;">
            </form>

            <div class="button-container">
                <button class="top-right-button" onclick="window.location.href = 'datawarehouse.php';">Go Back</button>
            </div>

            <br>
            <br>
            <div class=" table-container">

                <?php
                if (isset($_POST['query_selector'])) {
                    $selectedValue = $_POST['query_selector'];

                    // Perform actions based on the selected value
                    switch ($selectedValue) {
                        case 'dim_guest':
                            include("dw.php");
                            $sql = "SELECT * FROM dim_guest";
                            $result = mysqli_query($conn, $sql);

                            if ($result->num_rows > 0) {
                                echo "<table border='1' style='width: 95%;'>";
                                echo "<tr><th>GuestID</th><th style='width: 13%;'>Name</th><th style='width: 13%;'>Phone</th><th>Email</th><th>Address</th><th>Nation</th><th style='width: 10%;'>Exit Date</th><tr>";
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["GuestID"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Phone"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Address"] . "</td><td>" . $row["Nation"] . "</td><td>" . $row["Exit_Date"] . "</td></tr>";
                                }
                                echo "</table >";
                            } else {
                                echo "0 results";
                            }
                            session_abort();
                            break;
                        case 'dim_room':
                            include("dw.php");
                            $sql = "SELECT * FROM dim_room";
                            $result = mysqli_query($conn, $sql);

                            if ($result->num_rows > 0) {
                                echo "<table border='1'>";
                                echo "<tr><th>RoomID</th><th>Room Type</th><th>Occupancy</th><th>Price Per Night</th><tr>";
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["RoomID"] . "</td><td>" . $row["RoomType"] . "</td><td>" . $row["Occupancy"] . "</td><td>" . $row["Price_Per_Night"] . "</td></tr>";
                                }
                                echo "</table >";
                            } else {
                                echo "0 results";
                            }
                            session_abort();
                            break;
                        case 'dim_branch':
                            include("dw.php");
                            $sql = "SELECT * FROM dim_branch";
                            $result = mysqli_query($conn, $sql);

                            if ($result->num_rows > 0) {
                                echo "<table border='1' style='width: 80%;'>";
                                echo "<tr><th>BranchID</th><th>Name</th><th>Location</th><th>Number Of Rooms</th><th>Contact</th><tr>";
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["BranchID"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Location"] . "</td><td>" . $row["Number_Of_Rooms"] . "</td><td>" . $row["Contact"] . "</td></tr>";
                                }
                                echo "</table >";
                            } else {
                                echo "0 results";
                            }
                            session_abort();
                            break;
                        case 'dim_date':
                            include("dw.php");
                            $sql = "SELECT * FROM dim_date";
                            $result = mysqli_query($conn, $sql);

                            if ($result->num_rows > 0) {
                                echo "<table border='1' style='width: 40%;'>";
                                echo "<tr><th>Date</th><th>Day</th><th>Month</th><th>Year</th><tr>";
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["DATE"] . "</td><td>" . $row["Day"] . "</td><td>" . $row["Month"] . "</td><td>" . $row["Year"] . "</td></tr>";
                                }
                                echo "</table >";
                            } else {
                                echo "0 results";
                            }
                            session_abort();
                            break;
                        default:
                            echo 'Use drop-down menu to print the selected dimension table';
                    }
                } else {
                    echo 'Use drop-down menu to print the selected dimension table';
                }
                ?>
            </div>
        </div>

    </div>

</body>

</html>