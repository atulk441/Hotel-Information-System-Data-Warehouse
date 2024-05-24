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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <style>
        .container {
            display: grid;
            grid-template-columns: 300px auto;
            grid-template-columns: 1.02fr 4fr;
            /*change */
            grid-gap: 0.5rem;
            /*change */
        }

        .item_left {
            /* background-color: red; */
            /* border: 2px solid black; */
            height: 120vh;
            padding: 15px 5px;
            background-color: rgb(231, 197, 245);
            color: black;

        }

        .item_right {
            /* background-color: red; */
            /* border: 2px solid black; */
            height: 120vh;
            padding: 15px 5px;
            /* lightsteelblue */
            background-color: ghostwhite;
        }

        div a {
            text-decoration: none;
            font-size: 30px;
            /* border-bottom: 2px solid black; */

            display: flex;
            /* justify-content: center; */
            align-items: flex-start;
            height: 100%;
            color: black;
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
            text-align: center;
        }



        #exception {
            padding-top: 30px;
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


        .table-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr 1.2fr 1fr;
            grid-gap: 1rem;

        }

        .grid_item {
            /* border: 2px solid black; */
            /* background-color: rgb(228, 188, 228); */
            padding: 5px;
            display: flex;
            justify-content: center;
        }

        .grid_item:first-child {
            grid-column-start: 1;
            grid-column-end: 3;

        }

        .grid_item:nth-child(2) {
            grid-row-start: 2;
            grid-row-end: 4;
        }

        table {
            width: 70%;
        }

        th,
        td {
            padding: 5px;
            border: 1px solid black;
            text-align: center;
        }

        th,
        td {
            font-size: 16px;
        }


        #guest table {
            width: 90%;
        }

        tr:nth-child(even) {
            background-color: white;
        }

        tr th {
            background-color: white;
        }

        #roominfo {
            height: auto;
        }

        #roominfo td,
        th {
            padding: 0px;
        }

        #roomdetails td {
            padding: 0px;
        }

        #reservation table {
            width: 75%;
        }

        #query2 {
            padding: 15px;
            height: 50px;
        }

        #query3 {}

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
            <form action="sdb1v2.php" method="POST">
                <label for="query_selector" style="margin: 0px 0px 10px 0px; font-size: 18px">Pick a query:</label>
                <select name="query_selector" style="margin: 0px 0px 10px 0px; font-size: 16px" id="queries">
                    <option value="empty" <?php echo ($_SESSION['selected_value'] == 'empty') ? 'selected' : 'selected'; ?>></option>
                    <option value="Query1" <?php echo ($_SESSION['selected_value'] == 'Query1') ? 'selected' : ''; ?>>Information about customers who stayed for more than ten days</option>
                    <option value="Query2" <?php echo ($_SESSION['selected_value'] == 'Query2') ? 'selected' : ''; ?>>Customer information who booked Single room and paid over $2000</option>
                    <option value="Query3" <?php echo ($_SESSION['selected_value'] == 'Query3') ? 'selected' : ''; ?>>Display number of each room types along with occupancy and price per night</option>
                </select>
                <input type="submit" value="Submit" style="cursor: pointer;">
            </form>

            <div class="button-container">
                <button class="top-right-button" onclick="window.location.href = 'insertdatasdb1.php';">INSERT DATA</button>
            </div>

            <br>
            <br>


            <?php

            include("database1.php");
            $sql = "DELETE g, r
                    FROM guest g
                    JOIN reservation r ON g.guestid = r.guestid
                    WHERE datediff(now(), r.check_out) > 20;";
            $result = mysqli_query($conn, $sql);
            $conn->close();


            if (isset($_POST['query_selector'])) {
                $selectedValue = $_POST['query_selector'];

                // Perform actions based on the selected value
                switch ($selectedValue) {
                    case 'empty':



                        echo '<div class="table-container">';
                        echo '<div class="grid_item" id="guest">';
                        include("database1.php");
                        // Following are two ways to connect to the MySQL database
                        // 1. MySQLi Extension
                        // PDO (PHP Data Objects)

                        $sql = "SELECT * FROM guest";

                        $result = mysqli_query($conn, $sql);

                        if ($result->num_rows > 0) {
                            echo "<table border='1'>";
                            echo '<caption style="font-weight: bold;">Guest</caption>';
                            echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Nation</th><th>Amount(&dollar;)</th></tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["GuestID"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Phone"] . "</td><td>" . $row["Address"] . "</td><td>" . $row["Nation"] . "</td><td>" . $row["Amount"] . "</td></tr>";
                            }
                            echo "</table >";
                        } else {
                            echo "0 results";
                        }

                        $conn->close();

                        echo "</div>";
                        echo '<div class="grid_item" id="roominfo">';
                        include("database1.php");
                        $sql = "SELECT * FROM roominfo";

                        $result = mysqli_query($conn, $sql);

                        if ($result->num_rows > 0) {
                            // echo "<table border='1'>";
                            echo "<table border='1'>";
                            echo '<caption style="font-weight: bold;">Room Info</caption>';
                            echo "<tr><th>Room ID</th><th>Room Type</th></tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["RoomID"] . "</td><td>" . $row["RoomType"] . "</td></tr>";
                            }
                            echo "</table >";
                        } else {
                            echo "0 results";
                        }
                        $conn->close();


                        echo '</div>';
                        echo '<div class="grid_item" id="reservation">';

                        include("database1.php");

                        $sql = "SELECT * FROM reservation";

                        $result = mysqli_query($conn, $sql);

                        if ($result->num_rows > 0) {
                            echo "<table border='1'>";
                            echo '<caption style="font-weight: bold;">Reservation</caption>';
                            echo "<tr><th>Guest ID</th><th>Room ID</th><th>Check-in</th><th>Check-out</th><th>Number Of Guests</th></tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["GuestID"] . "</td><td>" . $row["RoomID"] . "</td><td>" . $row["Check_in"] . "</td><td>" . $row["Check_out"] . "</td><td>" . $row["NumberOfGuests"] . "</td></tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "0 results";
                        }
                        $conn->close();

                        echo '</div>';

                        echo '<div class="grid_item" id="roomdetails">';
                        include("database1.php");
                        $sql = "SELECT * FROM roomdetails";

                        $result = mysqli_query($conn, $sql);

                        if ($result->num_rows > 0) {
                            echo "<table border='1'>";
                            echo '<caption style="font-weight: bold;">Room Details</caption>';
                            echo "<tr><th>Room Type</th><th>Occupancy</th><th>Availability</th><th>Price Per Night</th></tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["RoomType"] . "</td><td>" . $row["Occupancy"] . "</td><td>" . $row["Availability"] . "</td><td>" . $row["PricePerNight"] . "</td></tr>";
                            }
                            echo "</table >";
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                        echo '</div>';
                        echo '</div>';
                        session_abort();
                        break;

                    case 'Query1':
                        echo '<div class="grid_item" id="query1" style="height: 50%;">';
                        include("database1.php");
                        $sql = "Select g.Name, r.RoomID, g.Phone, r.NumberOfGuests from Guest g join reservation r on g.GuestID = r.GuestID where datediff(check_out, check_in)>10;";
                        $result = mysqli_query($conn, $sql);

                        if ($result->num_rows > 0) {
                            echo "<table border='1' style='width: 70%; height:40%;'>";
                            echo "<tr><th>Name</th><th>RoomID</th><th>Phone</th><th>Number Of Guests</th><tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["Name"] . "</td><td>" . $row["RoomID"] . "</td><td>" . $row["Phone"] . "</td><td>" . $row["NumberOfGuests"] . "</td></tr>";
                            }
                            echo "</table >";
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                        echo '</div>';
                        session_abort();
                        break;


                    case 'Query2':
                        echo '<div class="grid_item" id="query2" style="height: 25%;">';
                        include("database1.php");
                        $sql = 'Select g.GuestID, r.RoomID, g.Name,  ri.RoomType, g.Amount from Guest g inner join reservation r on g.GuestID=r.GuestID inner join roominfo ri on ri.RoomID = r.RoomID where ri.RoomType="Single" and g.Amount>2000;';
                        $result = mysqli_query($conn, $sql);

                        if ($result->num_rows > 0) {
                            echo "<table border='1' style='width: 70%; height:40%;'>";
                            echo "<tr><th>GuestID</th><th>RoomID</th><th>Name</th><th>Room Type</th><th>Amount(&dollar;)</th><tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["GuestID"] . "</td><td>" . $row["RoomID"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["RoomType"] . "</td><td>" . $row["Amount"] . "</td></tr>";
                            }
                            echo "</table >";
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                        echo '</div>';
                        session_abort();
                        break;

                    case 'Query3':
                        echo '<div class="grid_item" id="query3" style="height: 50%;">';
                        include("database1.php");
                        $sql = "Select ri.RoomType, count(ri.RoomType) as NumOfRooms, rd.Occupancy, rd.PricePerNight from roominfo ri join roomdetails rd on  ri.RoomType = rd.roomType group by RoomType;";
                        $result = mysqli_query($conn, $sql);

                        if ($result->num_rows > 0) {
                            echo "<table border='1' style='width: 70%; height:40%;'>";
                            echo "<tr><th>RoomType</th><th>Number Of Rooms</th><th>Occupancy</th><th>Price Per Night (&dollar;)</th><tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["RoomType"] . "</td><td>" . $row["NumOfRooms"] . "</td><td>" . $row["Occupancy"] . "</td><td>" . $row["PricePerNight"] . "</td></tr>";
                            }
                            echo "</table >";
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                        echo '</div>';
                        session_abort();
                        break;
                } //end switch


            } //end if
            else {
                echo '<div class="table-container">';
                echo '<div class="grid_item" id="guest">';
                include("database1.php");
                // Following are two ways to connect to the MySQL database
                // 1. MySQLi Extension
                // PDO (PHP Data Objects)

                $sql = "SELECT * FROM guest";

                $result = mysqli_query($conn, $sql);

                if ($result->num_rows > 0) {
                    echo "<table border='1'>";
                    echo '<caption style="font-weight: bold;">Guest</caption>';
                    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Nation</th><th>Amount(&dollar;)</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["GuestID"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Phone"] . "</td><td>" . $row["Address"] . "</td><td>" . $row["Nation"] . "</td><td>" . $row["Amount"] . "</td></tr>";
                    }
                    echo "</table >";
                } else {
                    echo "0 results";
                }

                $conn->close();

                echo "</div>";
                echo '<div class="grid_item" id="roominfo">';
                include("database1.php");
                $sql = "SELECT * FROM roominfo";

                $result = mysqli_query($conn, $sql);

                if ($result->num_rows > 0) {
                    echo "<table border='1' style='height:90%'>";
                    echo '<caption style="font-weight: bold;">Room Info</caption>';
                    echo "<tr><th>Room ID</th><th>Room Type</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["RoomID"] . "</td><td>" . $row["RoomType"] . "</td></tr>";
                    }
                    echo "</table >";
                } else {
                    echo "0 results";
                }
                $conn->close();


                echo '</div>';
                echo '<div class="grid_item" id="reservation">';

                include("database1.php");

                $sql = "SELECT * FROM reservation";

                $result = mysqli_query($conn, $sql);

                if ($result->num_rows > 0) {
                    echo "<table border='1'>";
                    echo '<caption style="font-weight: bold;">Reservation</caption>';
                    echo "<tr><th>Guest ID</th><th>Room ID</th><th>Check-in</th><th>Check-out</th><th>Number Of Guests</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["GuestID"] . "</td><td>" . $row["RoomID"] . "</td><td>" . $row["Check_in"] . "</td><td>" . $row["Check_out"] . "</td><td>" . $row["NumberOfGuests"] . "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                $conn->close();

                echo '</div>';

                echo '<div class="grid_item" id="roomdetails">';
                include("database1.php");
                $sql = "SELECT * FROM roomdetails";

                $result = mysqli_query($conn, $sql);

                if ($result->num_rows > 0) {
                    echo "<table border='1'  style='height:75%'>";
                    echo '<caption style="font-weight: bold;">Room Details</caption>';
                    echo "<tr><th>Room Type</th><th>Occupancy</th><th>Availability</th><th>Price Per Night</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["RoomType"] . "</td><td>" . $row["Occupancy"] . "</td><td>" . $row["Availability"] . "</td><td>" . $row["PricePerNight"] . "</td></tr>";
                    }
                    echo "</table >";
                } else {
                    echo "0 results";
                }
                $conn->close();




                echo '</div>';

                echo '</div>';
                session_abort();
            }


            ?>

        </div>

    </div>

</body>

</html>